<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Notifications\Notification;
use Illuminate\Notifications\Messages\MailMessage;

class PasswordChangedNotification extends Notification
{
    use Queueable;

    /**
     * Create a new notification instance.
     *
     * @return void
     */
    public function __construct()
    {
        //
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
        if ($notifiable->products()->exists()) {
            // TODO verificar código do plano da ASPIN
            $codProduct = $notifiable->products[0]->crm_code;
            $product = $codProduct === '000004' ? 'Jornal Meia Hora' : 'Jornal o Dia';
        } else {
            $product = 'Jornal o Dia';
        }
        return (new MailMessage)->view(
            'emails.password-changed',
            [
                'user' => $notifiable,
                'product' => $product
            ]
        )
            ->from('naoresponda@odia.com.br', $product)
            ->subject('Alteração de Senha - DASHBOARD');
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
