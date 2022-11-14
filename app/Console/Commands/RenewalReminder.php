<?php

namespace App\Console\Commands;

use App\Models\Profession;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Mail;

class RenewalReminder extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'send:reminder';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Sends out reminders for renewal subscriptions.';

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle()
    {
        $professions = Profession::all();
        foreach ($professions as $profession) {

            $date = date('m');


            if ($profession->expiry == $date) {
                $practitioner_professions = $profession->practitioner_professions;
                //Logic
                //Send Email

                foreach ($practitioner_professions as $practitioner_profession) {
                    $practitioner = $practitioner_profession->practitioner;
                    $practitioner_contact  = $practitioner->practitioner_contact;

                    try{
                        Log::info('I have sent the email to '. $practitioner_contact->email);
                        Mail::to($practitioner_contact->email)->queue(new \App\Mail\RenewalReminder());
                    } catch (\Exception $exception){
                        Log::error($exception);
                    }



                }

            }

        }
    }
}
