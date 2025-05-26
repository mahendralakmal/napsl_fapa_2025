<?php

namespace App\Rules;

use Illuminate\Contracts\Validation\Rule;

class ImageDimensions implements Rule
{
    protected $maxWidth;
    protected $maxHeight;

    public function __construct($maxWidth, $maxHeight)
    {
        $this->maxWidth = $maxWidth;
        $this->maxHeight = $maxHeight;
    }

    public function passes($attribute, $value)
    {
        if (!$value->isValid()) {
            return false;
        }

        [$width, $height] = getimagesize($value->getPathname());

        return $width <= $this->maxWidth && $height <= $this->maxHeight;
    }

    public function message()
    {
        return "The image dimensions must not exceed {$this->maxWidth}x{$this->maxHeight} pixels.";
    }
}
