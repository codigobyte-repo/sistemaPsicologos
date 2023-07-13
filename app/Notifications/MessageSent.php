<?php

namespace App\Notifications;

use App\Models\User;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;

class MessageSent extends Notification
{
    use Queueable;

    /**
     * Create a new notification instance.
     */
    public function __construct(public $message)
    {
        
    }

    /**
     * Get the notification's delivery channels.
     *
     * @return array<int, string>
     */
    public function via(object $notifiable): array
    {
        return ['mail', 'database'];
    }

    /**
     * Get the mail representation of the notification.
     */
    public function toMail(object $notifiable): MailMessage
    {
        return (new MailMessage)
                    ->subject('Tienes un nuevo mensaje de la Escuela de Psicología')
                    ->greeting('Hola licenciado')
                    ->line('Le hemos mandado una nueva notificación. Para leer tu mensaje haz clic en el botón a continuación.')
                    ->action('Ver mensaje', route('admin.messages.show', $this->message->id))
                    ->line('¡Muchas gracias!');
    }

    /**
     * Get the array representation of the notification.
     *
     * @return array<string, mixed>
     */
    public function toDatabase(object $notifiable): array
    {
        $notifiable->notification += 1;
        $notifiable->save();
        
        return [
            'url' => route('admin.messages.show', $this->message->id),
            'message' => 'Has recibido un mensaje de ' . User::find($this->message->from_user_id)->name
        ];
    }
}
