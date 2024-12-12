<?php
// app/Notifications/PrivateChatNotification.php
use Illuminate\Notifications\Notification;
use Illuminate\Notifications\Messages\MailMessage;

class PrivateChatNotification extends Notification
{
  protected $message;

  public function __construct($message)
  {
    $this->message = $message;
  }

  public function toMail($notifiable)
  {
    return (new MailMessage)
      ->line('You have a new private chat message.')
      ->line($this->message);
  }

  // Kamu bisa menambahkan metode lain seperti toDatabase, toArray, dsb.
}
