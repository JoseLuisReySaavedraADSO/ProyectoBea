<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;

class CustomResetPasswordNotification extends Notification
{
    use Queueable;

    /**
     * Create a new notification instance.
     */
    protected $token;

    public function __construct($token)
    {
        $this->token = $token;
    }

    /**
     * Get the notification's delivery channels.
     *
     * @return array<int, string>
     */
    public function via(object $notifiable): array
    {
        return ['mail'];
    }

    /**
     * Get the mail representation of the notification.
     */
    public function toMail(object $notifiable): MailMessage
    {
        return (new MailMessage)
            ->subject('Recuperación de contraseña')
            ->greeting('¡Hola!') 
            ->line('Estás recibiendo este correo porque recibimos una solicitud para restablecer la contraseña de tu cuenta.')
            ->action('Recuperar Contraseña', url(config('app.url') . route('password.reset', $this->token, false)))
            ->line('Este enlace de restablecimiento de contraseña expirará en 60 minutos.')
            ->line('Si no solicitaste un restablecimiento de contraseña, no es necesario realizar ninguna acción.')
            ->line('Saludos, Equipo de Bea');
            // ->line('Si tienes problemas al hacer clic en el botón "Recuperar Contraseña", copia y pega la siguiente URL en tu navegador web:')
            // ->line(url(config('app.url').route('password.reset', $this->token, false)));
    }

    /**
     * Get the array representation of the notification.
     *
     * @return array<string, mixed>
     */
    public function toArray(object $notifiable): array
    {
        return [
            //
        ];
    }
}
