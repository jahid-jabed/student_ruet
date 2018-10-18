<?php

namespace App\Jobs;

use Illuminate\Bus\Queueable;
use App\Mail\SendResults;
use Illuminate\Support\Facades\Mail;
use Illuminate\Queue\SerializesModels;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;

class JobSendResults implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

protected $data, $exam;
    /**
     * Create a new job instance.
     *
     * @return void
     */
    public function __construct($data, $exam)
    {
        $this->data = $data;
        $this->exam = $exam;
    }

    /**
     * Execute the job.
     *
     * @return void
     */
    public function handle()
    {
        Mail::to($this->data->email, $this->data->name)->send(new SendResults($this->exam));
    }
}
