<?php
namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class OtpMail extends Mailable
{
    use Queueable, SerializesModels;

    public $otp;
    public $name;

    public function __construct($otp, $name) {
        $this->otp = $otp;
        $this->name = $name;
    }

    public function build() {
        return $this->view('emails.otp')
                    ->subject('Your OTP Code')
                    ->with(['otp' => $this->otp, 'name' => $this->name ]);
    }
}
