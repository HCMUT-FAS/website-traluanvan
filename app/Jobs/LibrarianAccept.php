<?php

namespace App\Jobs;

use App\Mail\IssuesAccept;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldBeUnique;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;
use Illuminate\Support\Facades\Mail;

class LibrarianAccept implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;
    public $email;

    /**
     * Create a new job instance.
     *
     * @return void
     */
    public function __construct($email)
    {
        $this->email = $email;
    }

    /**
     * Execute the job.
     *
     * @return void
     */
    public function handle()
    {
        date_default_timezone_set('Asia/Ho_Chi_Minh');
		$currentDate = date("Y-m-d H:i:s");
		$returnDate = date('Y-m-d H:i:s', strtotime("+2 weeks"));
        $dates = [
			'currentDate' => $currentDate,
			'expectedDate' => $returnDate,
		];
        Mail::to($this->email)->send(new IssuesAccept($dates));
    }
}
