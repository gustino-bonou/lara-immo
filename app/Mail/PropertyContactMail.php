<?php

namespace App\Mail;

use App\Models\Property;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Queue\SerializesModels;

class PropertyContactMail extends Mailable
{
    use Queueable, SerializesModels;

    /* Queueable : ça peut etre mise en fil d'attente et etre envoyé plutard 
    SerializesModels: si on a de models à l'intérieur, il va etre sérialisé
    */

    /**
     * Create a new message instance.
     */
    public function __construct(public Property $property, public array $data)
    //ce constructeur permet d'envoyer des informations nécessaires à l'envoi de l'email

    //ici, il va falloir recuperer les informations ont l'on veut envoyer à la vue
    /* nous avons besoin du property concerné et des informations  envoyées par l'utilisateur
    Toutes ces propriétes sont en public afin d'etre accessible à la vue
    Ainsi, on ne les passe plus de manière explicite plustard*/
    {
        //
    }

    /**
     * Get the message envelope.
     */
    //L'envelope représente notre email, c' est là où on va mettre nos informations
    public function envelope(): Envelope
    {
        return new Envelope(
            subject: 'Property Contact Mail',
            to: ['address'=>'august@gmail.com', '']
        );
    }

    /**
     * Get the message content definition.
     */
    //Ce content permet de spécifier le contenu
    //On a trois solution pour generer notre contenu, 
    //on peut remplacer le markdown par text, html 
    public function content(): Content
    {
        return new Content(
            markdown: 'mails.property.contact',
        );
    }

    /**
     * Get the attachments for the message.
     *
     * @return array<int, \Illuminate\Mail\Mailables\Attachment>
     */

     //attachement ne nous servira pas que si on veut envoyer de fichier en plus
    public function attachments(): array
    {
        return [];
    }
}
