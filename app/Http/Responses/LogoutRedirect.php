<?php

namespace App\Http\Responses;

use Laravel\Fortify\Contracts\LogoutResponse as LogoutRedirectContract;

class LogoutRedirect implements LogoutRedirectContract
{

  public function toResponse($request)
  {
    return redirect('/login');
  }
}
