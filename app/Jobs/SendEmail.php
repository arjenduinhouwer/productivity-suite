<?php

namespace App\Jobs;

use Mail;
use Illuminate\Bus\Queueable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;

class SendEmail implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    protected $emails;

    /**
     * Create a new job instance.
     *
     * @return void
     */
    public function __construct($emails)
    {
        $this->emails = $emails;
    }

    /**
     * Execute the job.
     *
     * @return void
     */
    public function handle()
    {
        foreach ($this->emails as $email)
        {
            Mail::send('emails.test', [], function($m) use ($email){
               $m->from('inof@nothing.nl', 'Just an App');
               $m->to($email)->subject('Just testing');
            });
        }
    }
}
