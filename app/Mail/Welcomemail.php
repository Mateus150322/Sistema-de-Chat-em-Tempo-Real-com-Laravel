<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class Welcomemail extends Mailable implements ShouldQueue
{
    use Queueable, SerializesModels;

    public $tries = 5;

    public function __construct()
    {
    }

    public function build()
    {
        return $this->subject('Seja bem-vindo ao nosso site, obrigado por se registrar!')
                    ->view('emails.welcome');
    }
}