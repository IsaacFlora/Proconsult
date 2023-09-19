<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;
use Illuminate\Support\HtmlString;

class CadastroAnuncio extends Notification
{
    use Queueable;

    protected $anuncio, $usuario;

    /**
     * Create a new notification instance.
     *
     * @return void
     */
    public function __construct( $anuncio, $usuario )
    {
        $this->anuncio = $anuncio;
        $this->usuario = $usuario;
    }

    /**
     * Get the notification's delivery channels.
     *
     * @param  mixed  $notifiable
     * @return array
     */
    public function via($notifiable)
    {
        return ['mail'];
    }

    /**
     * Get the mail representation of the notification.
     *
     * @param  mixed  $notifiable
     * @return \Illuminate\Notifications\Messages\MailMessage
     */
    public function toMail($notifiable)
    {
        return (new MailMessage)
                    ->subject('Cadastro Anúncio Alugadrone')
                    ->line(new HtmlString('Olá <strong>'.$this->usuario->name.'</strong>, seu Anúncio <strong>'.$this->anuncio->titulo.'</strong> foi cadastrado com sucesso em nossa plataforma.'))
                    ->line('Obrigado por usar nossos serviços!');
    }

    /**
     * Get the array representation of the notification.
     *
     * @param  mixed  $notifiable
     * @return array
     */
    public function toArray($notifiable)
    {
        return [
            //
        ];
    }
}
