<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class UserMail extends Mailable
{
    use Queueable, SerializesModels;

    public $data;
    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($data)
    {
        $this->data = $data;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        $mail = $this->from(env('MAIL_FROM_ADDRESS'), env('MAIL_FROM_NAME'))
                 ->subject($this->data['subject'])
                 ->view($this->data['template'])
                 ->with([
                     'result' => $this->data['result']
                 ]);

        if (!empty($this->data['attachment'])) {
    
            if (!empty($this->data['attachment_name'])) {
                $mail->attach($this->data['attachment'], [
                    'as' => $this->data['attachment_name']
                ]);
            } else {
                $mail->attach($this->data['attachment']);
            }
    
        }
        return $mail;
    }
}
