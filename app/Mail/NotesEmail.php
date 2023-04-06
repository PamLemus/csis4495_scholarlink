<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class NotesEmail extends Mailable
{
    use Queueable, SerializesModels;

    public $pdfData;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($pdfData)
    {
        $this->pdfData = $pdfData;
    }

    public function build()
    {
        return $this->view('emails.notes')
            ->subject('Your Lecture Notes')
            ->attachData($this->pdfData, 'lecture_notes.pdf', [
                'mime' => 'application/pdf',
            ]);
    }
}
