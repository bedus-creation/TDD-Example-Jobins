<?php

namespace App\Http\Controllers;

use App\Http\Requests\RegistrationRequest;
use Illuminate\Http\Request;

class RegistrationController extends Controller
{
    public function __invoke(RegistrationRequest $registrationRequest)
    {
        // Your Logic

        return redirect()->back()->with("success", "User has been registered successfully.");
    }
}
