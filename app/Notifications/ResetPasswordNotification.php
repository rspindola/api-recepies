<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Notifications\Notification;
use Illuminate\Notifications\Messages\MailMessage;

class ResetPasswordNotification extends Notification
{
    use Queueable;

    private $token;

    /**
     * Create a new notification instance.
     *
     * @param string $token
     * @return void
     */
    public function __construct($token)
    {
        $this->token = $token;
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
            $codProduct = $notifiable->products[0]->crm_code;
            $product = $codProduct === '000004' ? 'Jornal Meia Hora' : 'Jornal o Dia';
        } else {
            $product = 'Jornal o Dia';
        }

        logger()->info('[TOKEN DE REDEFINIÇÃO DE SENHA]: ' . $notifiable->email . ' | ' . $this->token);

        return (new MailMessage)
            ->view('emails.reset-password', [
                'token' => $this->token,
                'user' => $notifiable,
                'product' => $product
            ])
            ->subject('Redefinição de Senha')
            ->from('naoresponda@odia.com.br', $product);
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
