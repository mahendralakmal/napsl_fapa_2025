<?php

namespace App\Rules;

use Illuminate\Contracts\Validation\Rule;
use Illuminate\Http\UploadedFile;

class ValidExhibitionJpeg implements Rule
{
    protected string $message = 'The image is invalid.';

    public function passes($attribute, $value): bool
    {
        if (!$value instanceof UploadedFile || !$value->isValid()) {
            $this->message = 'Image is required.';
            return false;
        }

        // JPEG only
        $mime = strtolower((string) $value->getMimeType());
        $ext = strtolower((string) $value->getClientOriginalExtension());
        $allowedMimes = ['image/jpeg', 'image/jpg', 'image/pjpeg'];
        if (!in_array($mime, $allowedMimes, true) || !in_array($ext, ['jpg', 'jpeg'], true)) {
            $this->message = 'Image must be a JPEG file (.jpg / .jpeg).';
            return false;
        }

        // Max 2 MB
        if ($value->getSize() > 2 * 1024 * 1024) {
            $this->message = 'Image should not exceed 2 MB.';
            return false;
        }

        $path = $value->getRealPath();
        $size = @getimagesize($path);
        if ($size === false || empty($size[0]) || empty($size[1])) {
            $this->message = 'Unable to read image dimensions. Upload a valid JPEG.';
            return false;
        }

        [$width, $height] = $size;
        if ($width > 1920 || $height > 1080) {
            $this->message = 'Image dimensions must not exceed 1920px width and 1080px height.';
            return false;
        }

        if (!$this->isSrgb($path)) {
            $this->message = 'Image must be in the sRGB color space.';
            return false;
        }

        return true;
    }

    public function message(): string
    {
        return $this->message;
    }

    /**
     * Prefer ImageMagick identify; fall back to ICC/sRGB markers in the JPEG bytes.
     */
    protected function isSrgb(string $path): bool
    {
        $identify = trim((string) shell_exec(
            'identify -quiet -format "%[colorspace]|%[profile:icc]" '
            . escapeshellarg($path) . ' 2>/dev/null'
        ));

        if ($identify !== '') {
            [$colorspace, $icc] = array_pad(explode('|', $identify, 2), 2, '');
            $colorspace = strtolower(trim($colorspace));
            $icc = strtolower(trim($icc));

            if (in_array($colorspace, ['srgb', 'rgb'], true)) {
                // Non-sRGB ICC profile names should fail
                if ($icc !== '' && !str_contains($icc, 'srgb') && !str_contains($icc, 'iec61966')) {
                    return false;
                }
                return true;
            }

            return false;
        }

        // Fallback: no Imagick identify — inspect file bytes
        $data = @file_get_contents($path, false, null, 0, 512 * 1024);
        if ($data === false) {
            return false;
        }

        $hasIcc = stripos($data, 'ICC_PROFILE') !== false;
        $hasSrgbMarker = stripos($data, 'sRGB') !== false
            || stripos($data, 'IEC 61966-2.1') !== false
            || stripos($data, 'IEC61966') !== false;

        // JPEGs without an ICC profile are treated as sRGB (web default)
        if (!$hasIcc) {
            return true;
        }

        return $hasSrgbMarker;
    }
}
