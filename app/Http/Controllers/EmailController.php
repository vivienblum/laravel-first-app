<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use App\Jobs\SendEmailJob;

class EmailController extends Controller
{
    public function sendEmail()
    {
        // $emailJob = (new SendEmailJob())->delay(now()->addSeconds(3));
        //
        // dispatch($emailJob);

        SendEmailJob::dispatch()
            ->delay(now()->addSeconds(3));

        echo 'email sent';
    }
}
