<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>FAPA Awards 2025 Entry Confirmation</title>
</head>
<body style="margin:0;padding:0;background:#f4f6f8;font-family:Arial,Helvetica,sans-serif;color:#222;">
<table role="presentation" width="100%" cellspacing="0" cellpadding="0" style="background:#f4f6f8;padding:24px 12px;">
    <tr>
        <td align="center">
            <table role="presentation" width="640" cellspacing="0" cellpadding="0" style="max-width:640px;width:100%;background:#ffffff;border-radius:8px;overflow:hidden;">
                <tr>
                    <td style="background:#020251;color:#fff;padding:18px 24px;font-size:18px;font-weight:bold;">
                        FAPA Awards 2025 — Entry Confirmation
                    </td>
                </tr>
                <tr>
                    <td style="padding:24px;">
                        <p style="margin:0 0 12px;">Dear {{ optional($user->fapa)->name ?? $user->name }},</p>
                        <p style="margin:0 0 12px;">
                            Thank you for submitting your images to <strong>FAPA Awards 2025</strong>.
                            Your submission has been locked and can no longer be changed.
                        </p>
                        <p style="margin:0 0 20px;">
                            Below are the details of the entries we received:
                        </p>

                        @php
                            $grouped = $entries->groupBy('section');
                        @endphp

                        @forelse($grouped as $section => $sectionEntries)
                            <h3 style="margin:20px 0 10px;padding:8px 12px;background:#2781d9;color:#fff;font-size:15px;">
                                {{ $section }}
                            </h3>
                            @foreach($sectionEntries->sortBy('count') as $entry)
                                @php
                                    $relative = $entry->image;
                                    $imagePath = null;

                                    if ($relative && $relative !== '0') {
                                        $candidate = \Illuminate\Support\Facades\Storage::disk('public')->path($relative);
                                        if (is_file($candidate)) {
                                            $imagePath = $candidate;
                                        } else {
                                            $fallback = storage_path('app/public/' . ltrim($relative, '/'));
                                            if (is_file($fallback)) {
                                                $imagePath = $fallback;
                                            }
                                        }
                                    }
                                @endphp
                                <table role="presentation" width="100%" cellspacing="0" cellpadding="0" style="margin:0 0 16px;border:1px solid #e5e7eb;border-radius:6px;">
                                    <tr>
                                        <td style="padding:12px;width:180px;vertical-align:top;">
                                            @if($imagePath)
                                                <img src="{{ $message->embed($imagePath) }}" alt="{{ $entry->image_caption }}" width="160" style="max-width:160px;max-height:120px;width:auto;height:auto;display:block;border:1px solid #ddd;">
                                            @else
                                                <span style="color:#999;font-size:12px;">Image unavailable</span>
                                            @endif
                                        </td>
                                        <td style="padding:12px;vertical-align:top;">
                                            <div style="font-size:12px;color:#666;margin-bottom:4px;">Entry #{{ $entry->count }}</div>
                                            <div style="font-size:16px;font-weight:bold;">{{ $entry->image_caption }}</div>
                                        </td>
                                    </tr>
                                </table>
                            @endforeach
                        @empty
                            <p style="color:#b91c1c;">No entries were found on your account.</p>
                        @endforelse

                        <p style="margin:24px 0 8px;">
                            Results will be notified after judging.<br>
                            Wish you all the best.
                        </p>
                        <p style="margin:16px 0 0;font-size:13px;line-height:1.5;color:#444;">
                            Wimal Amaratunge. EFIAP, Hon.FNAPSL, Hon.FISLP, Hon.MICS, Hon.FAPU<br>
                            Exhibition Chairman<br>
                            National Association of Photographers - Sri Lanka (NAPSL)<br>
                            290, D. R. Wijewardena Mawatha,<br>
                            Colombo 10, Sri Lanka<br>
                            +94 (11) 2444336, (11) 3370844, 77 7790626, 71 5523682
                        </p>
                    </td>
                </tr>
            </table>
        </td>
    </tr>
</table>
</body>
</html>
