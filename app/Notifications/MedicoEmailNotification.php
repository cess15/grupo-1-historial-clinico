<?php

namespace App\Notifications;

use Illuminate\Auth\Notifications\VerifyEmail;
use Illuminate\Bus\Queueable;
use Illuminate\Notifications\Messages\MailMessage;

class MedicoEmailNotification extends VerifyEmail
{
    use Queueable;

    public $usuario;
    public $password;

    /**
     * Create a new notification instance.
     *
     * @return void
     */
    public function __construct($usuario,$password)
    {
        $this->usuario=$usuario;
        $this->password=$password;
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
            ->subject('Verificación de correo electrónico')
            ->line('Por favor intente acceder al sistema con sus credenciales para verificar sus datos en el sistema y después intente verificar su correo')
            ->line('Nombre de usuario: '.$this->usuario)
            ->line('Contraseña: '.$this->password)
            ->line('')
            ->line('Haga clic en el botón de abajo para verificar su dirección de correo electrónico.')
            ->action('Verificar correo electrónico', $this->verificationUrl($notifiable))
            ->line('')
            ->line('Si no creó una cuenta, no es necesario realizar ninguna otra acción.');
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
