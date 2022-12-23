<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailables\Address;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Queue\SerializesModels;

class MailTest extends Mailable
{
    use Queueable, SerializesModels;

   public $titulo;
   public $descripcion;
   public $tags;
   public $prioridad;
   public $name;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($titulo, $descripcion, $tags, $prioridad, $name)
    {
        $this->titulo = $titulo;
        $this->descripcion = $descripcion;
        $this->tags = array($tags);
        $this->prioridad = $prioridad;
        $this->name = $name;
    }

    /**
     * Get the message envelope.
     *
     * @return \Illuminate\Mail\Mailables\Envelope
     */
    public function envelope()
    {
        return new Envelope(
            from: new Address('dr.rabogrande@gmail.com', 'Nueva Tarea Registrada!!'),
            // replyTo: [
            //     new Address('dali.rangel98@gmail.com', 'Admin'),
            // ],
            
            subject: 'Tarea Agregada',
        );
    }

    /**
     * Get the message content definition.
     *
     * @return \Illuminate\Mail\Mailables\Content
     */
    public function content()
    {
        return new Content(
            view: 'mail',
        );
    }

    /**
     * Get the attachments for the message.
     *
     * @return array
     */
    public function attachments()
    {
        return [];
    }
}
