<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class DocumentCreatedEmail extends Mailable
{
    use Queueable, SerializesModels;

    public $user;
    public $documentName;
    public $message;

    public function __construct($user, $documentName, $emailMessage)
    {
        $this->user = $user;
        $this->documentName = $documentName;
        $this->message = $emailMessage;
    }


    public function build()
    {
        return $this->view('emails.document_created')
            ->with([
                'userName' => $this->user->name,
                'documentName' => $this->documentName,
                'emailMessage' => $this->message,
            ])
            ->subject('Document Creation Notification');
    }

}
