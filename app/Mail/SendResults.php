<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;

class SendResults extends Mailable
{
    use Queueable, SerializesModels;

protected $exam;
    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($exam)
    {
        $this->exam = $exam;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->view('mail_results')
                ->with([
                  'result' => $this->exam,
                ])->subject('Fake Results!');
    }
}
