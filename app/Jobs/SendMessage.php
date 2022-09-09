<?php

namespace App\Jobs;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;
use Illuminate\Support\Facades\Log;
use App\User;
class SendMessage implements ShouldQueue
{
	
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;
     public $user_id;
	 public $quotation_id;
    /**
     * Create a new job instance.
     *
     * @return void
     */
    public function __construct($user_id,$quotation_id)
    {
		$this->user_id=$user_id;
		$this->quotation_id=$quotation_id;
        //
    }

    /**
     * Execute the job.
     *
     * @return void
     */
    public function handle()
    {
		notify_vendor_for_new_quotation($this->user_id,$this->quotation_id);
		Log::channel('job')->info($this->user_id.'--'.$this->quotation_id);
        //
    }
}
