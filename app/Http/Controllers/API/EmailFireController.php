<?php

namespace App\Http\Controllers\API;

use Illuminate\Support\Facades\Notification;
use App\Notifications\HostAScreening;
use App\Notifications\Contact;
use App\Notifications\Buy;
use App\Notifications\BuyerNotification;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class EmailFireController extends Controller
{

  public function screenings(Request $request)
  {
      $when = now();
      Notification::route('mail', 'pulauplastik@kopernik.info')->notify((new HostAScreening($request))->delay($when));
  }

  public function contact(Request $request)
  {
      $when = now();
      Notification::route('mail', 'pulauplastik@kopernik.info')->notify((new Contact($request))->delay($when));
  }

  public function buying(Request $request)
  {
      $when = now();
      Notification::route('mail', 'pulauplastik@kopernik.info')->notify((new Buy($request))->delay($when));
      Notification::route('mail', $request->email)->notify((new BuyerNotification($request))->delay($when));
  }

}
