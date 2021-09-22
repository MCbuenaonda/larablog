<?php

namespace App\Listeners;

use App\Events\UserCreated;
use Illuminate\Support\Facades\Mail;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;

class SendEmailWelcomeUser
{
    private $event;
    /**
     * Handle the event.
     *
     * @param  UserCreated  $event
     * @return void
     */
    public function handle(UserCreated $event)
    {
        $data['title'] = 'Bienvenido '. $event->user->name;

        $this->event = $event;

        Mail::send('emails.email', $data, function ($message) {
            $message->from('ing.mcbuenaonda@gmail.com', 'Carlos Glez');
            $message->sender('john@johndoe.com', 'John Doe');
            $message->to($this->event->user->email, $this->event->user->name);
            // $message->cc('john@johndoe.com', 'John Doe');
            // $message->bcc('john@johndoe.com', 'John Doe');
            $message->replyTo('carlos_cerati@icg.com', 'John Doe');
            $message->subject('Gracias por la weed '.$this->event->user->name);
            // $message->priority(3);
            // $message->attach('pathToFile');
        });

        if (Mail::failures()) {
            return 'mensaje no enviado';
        }else{
            return 'mensaje enviado';
        }
    }
}
