<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;
use Illuminate\Support\HtmlString;

class Cadastroempresa extends Notification
{
    use Queueable;

    protected $user;

    /**
     * Create a new notification instance.
     *
     * @return void
     */
    public function __construct( $user )
    {
        $this->user = $user;
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

        $url = url('/cms');


        return (new MailMessage)

                    ->subject('Cadastro AppJackPeças')
                    ->line(new HtmlString('Olá <strong>'.$this->user->name.'</strong> seja bem vindo ao AppJackPeças a maior plataforma de assistências técnicas de celular.'))
                    ->line('Agora você pode realizar login e cadastrar seus serviços.')
                    ->action('Painel Administrativo', url($url))
                    ->line('Seu cadastro será analizado e assim que for liberado você receberá um e-mail e seus serviços irão ser listados em nosso aplicativo.')
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
