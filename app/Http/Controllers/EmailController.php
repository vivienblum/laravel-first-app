<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use App\Jobs\SendEmailJob;

class EmailController extends Controller
{
    public function sendEmail()
    {
        SendEmailJob::dispatch()
            ->delay(now()->addSeconds(3));

        return redirect('/projects');
    }
}
