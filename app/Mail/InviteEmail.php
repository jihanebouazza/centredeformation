<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class InviteEmail extends Mailable
{
    use Queueable, SerializesModels;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public $first_name;
    public $last_name;

    /**
     * Create a new message instance.
     */
    public function __construct($first,$last)
    {
        $this->first_name=$first;
        $this->last_name=$last;
    }

    public function build()
    {
        return $this->subject('no reply')
                ->view('emails.invite')
                ->with([
                    'first_name' => $this->first_name ,
                    'last_name' => $this->last_name ,
                ]);
    }
}
