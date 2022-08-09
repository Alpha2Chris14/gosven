<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use Notification;
use App\Notifications\UserNotification;

class NotificationController extends Controller
{
    public function __construct(){
        $this->middleware('auth');
    }

    public function send(Request $request){
        $user = User::find(1);
        $details = ['greeting'=>'Hello This Is Just A Test',];
        Notification::send($user,new UserNotification($details));
        dd("Your Notification Was Sent Successfully!");
    }
}
