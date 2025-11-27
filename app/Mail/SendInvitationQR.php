<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class SendInvitationQR extends Mailable
{
    use Queueable, SerializesModels;

    public $nama;
    public $code;
    public $qrPath;

    public function __construct($nama, $code, $qrPath)
    {
        $this->nama = $nama;
        $this->code = $code;
        $this->qrPath = $qrPath;
    }


    public function build()
    {
        return $this->subject('Undangan Kehadiran')
            ->view('emails.invitation_qr')
            ->with([
                'nama' => $this->nama,
                'code' => $this->code,
                'qrPath' => $this->qrPath,
            ]);
    }

}

