<?php

namespace App\Jobs;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;
use Illuminate\Support\Facades\Mail;
use App\Mail\UserVerifyOtpMail;

class UserVerifyMail implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    public $user;
    public $otp;

    /**
     * Create a new job instance.
     *
     * @param array $user
     * @param int $otp
     */
    public function __construct($user, $otp)
    {
        $this->user = $user;
        $this->otp = $otp;
    }

    /**
     * Execute the job.
     */
    public function handle(): void
    {

        // sleep(10);
        // sending mail data to UserVerifyOtpMail Mail file
        Mail::to($this->user['email'])->send(new UserVerifyOtpMail($this->user, $this->otp));
    }
}
