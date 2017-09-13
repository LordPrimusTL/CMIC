<?php

namespace App\Jobs;

use App\Mail\email;
use App\mailers\AppMailer;
use App\mailers\MailFacade;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Mail\Mailer;
use Illuminate\Queue\SerializesModels;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Support\Facades\Log;

class SendEmails implements  ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    /**
     * Create a new job instance.
     *
     * @return void
     */

    protected $email;
    protected $msg;
    protected $sub;
    protected $mailer;

    public function __construct($email, $msg, $sub )
    {
        $this->email = $email;
        $this->msg = $msg;
        $this->sub = $sub;
    }

    /**
     * Execute the job.
     *
     * @return void
     */
    public function handle()
    {
        try{
            $email = $this->email;
            $msg = $this->msg;
            $sub = $this->sub;
            //\Mail::to($email)->send(new email($email,$msg,$sub));
            Log::info('start');
            $m = new MailFacade();
            $m->send($email, $msg, $sub);
            //$this->mailer->sendMail($email, $msg, $sub);
            Log::info('end');
        }
        catch(\Exception $ex){
            dd($ex, $email);
        }
    }
}
