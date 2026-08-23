<?php

namespace App\Mail;

use App\Models\User;
use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Support\Collection;

class FinishSubmissionMail extends Mailable
{
    use Queueable, SerializesModels;

    public User $user;
    public Collection $entries;

    public function __construct(User $user, Collection $entries)
    {
        $this->user = $user;
        $this->entries = $entries;
    }

    public function build()
    {
        return $this->from(config('mail.from.address'), config('mail.from.name'))
            ->subject('FAPA Awards 2025 — Your Entry Confirmation')
            ->view('emails.finish_submission');
    }
}
