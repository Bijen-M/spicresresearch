<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;

class Subscriber extends Mailable implements ShouldQueue
{
    use Queueable, SerializesModels;
    
    public $news;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($news)
    {
        $this->news = $news;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        $email = $this->view('emails.subscriber');
        if($this->news->picture){
            foreach($this->news->picture as $file){
                $email->attach($file->upload.$file->url);
            }
        }
        return $email;
    }
}
