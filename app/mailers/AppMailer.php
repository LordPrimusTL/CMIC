<?php
/**
 * Created by PhpStorm.
 * User: LordPrimusTL
 * Date: 9/12/2017
 * Time: 10:38 AM
 */

namespace App\mailers;

use App\Helper\Logger;
use Illuminate\Contracts\Mail\Mailer;

class AppMailer
{
    protected $mailer;
    protected $fromAddress = 'info@cmiclub.org';
    protected $fromName = 'Name Name';
    protected $to;
    protected $subject;
    protected $view;
    protected $data = [];

    private function Logger()
    {
        return new Logger();
    }
    public function __construct(Mailer $mailer)
    {
        $this->mailer = $mailer;
    }

    public function activateUser($user)
    {
        $this->to = $user->email;
        $this->subject = "Activate Your CMIClub Account";
        $this->view = 'User.Email.activate';
        $this->data = compact('user');
        return $this->deliver();
    }

    public function deliver()
    {
        try{
            $this->mailer->send($this->view, $this->data, function($message) {
                $message->from($this->fromAddress, $this->fromName)
                    ->to($this->to)->subject($this->subject);
            });
        }
        catch (\Exception $ex)
        {
            $this->Logger()->LogError('An Error Occured When Trying to Send Mail',$ex,['to' => $this->to
            , 'subj' => $this->subject,'data' => $this->data]);
        }
    }

    public function sendTicketComments($ticketOwner, $user, ticket $ticket, $comment)
    {
        $this->to = $ticketOwner->email;
        $this->subject = "RE: $ticket->title (Ticket ID: $ticket->ticket_id)";
        $this->view = 'Email.ticket_comments';
        $this->data = compact('ticketOwner', 'user', 'ticket', 'comment');

        return $this->deliver();
    }

    public function sendTicketStatusNotification($ticketOwner, ticket $ticket)
    {
        $this->to = $ticketOwner->email;
        $this->subject = "RE: $ticket->title (Ticket ID: $ticket->ticket_id)";
        $this->view = 'Email.ticket_status';
        $this->data = compact('ticketOwner', 'ticket');

        return $this->deliver();
    }
}