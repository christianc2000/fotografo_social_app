<?php

namespace App\Notifications;

use App\Models\Evento;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;

class UserToEventoNotification extends Notification
{
    use Queueable;
    public $idAccion;
    public $titulo;
    public $imagen;
    public $tipo;
    /**
     * Create a new notification instance.
     */
    public function __construct($idAccion, $titulo, $imagen, $tipo)
    {
        $this->idAccion = $idAccion;
        $this->titulo = $titulo;
        $this->imagen = $imagen;
        $this->tipo = $tipo;
    }

    /**
     * Get the notification's delivery channels.
     *
     * @return array<int, string>
     */
    public function via(object $notifiable): array
    {
        return ['database'];
    }

    /**
     * Get the mail representation of the notification.
     */
    public function toMail(object $notifiable): MailMessage
    {
        return (new MailMessage)
            ->line('The introduction to the notification.')
            ->action('Notification Action', url('/'))
            ->line('Thank you for using our application!');
    }

    /**
     * Get the array representation of the notification.
     *
     * @return array<string, mixed>
     */
    public function toArray(object $notifiable): array
    {
        return [
            'id' => $this->idAccion,
            'titulo' => $this->titulo,
            'tipo' => $this->tipo,
            'imagen' => $this->imagen,
            'time' => Carbon::now()->toDateTimeString()
        ];
    }
}
