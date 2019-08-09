<?php

namespace App\Http\Controllers\API;

use Illuminate\Support\Facades\Notification;
use App\Notifications\HostAScreening;
use App\Notifications\Contact;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class EmailFireController extends Controller
{

  public function screenings(Request $request)
  {
      $when = now()->addMinutes(1);
      Notification::route('mail', 'pulauplastik@kopernik.info')->notify((new HostAScreening($request))->delay($when));
  }

  public function contact(Request $request)
  {
      $when = now()->addMinutes(1);
      Notification::route('mail', 'pulauplastik@kopernik.info ')->notify((new Contact($request))->delay($when));
  }

}
