<?php

namespace App\Services;

use Illuminate\Support\Facades\Http;

class JobsParser
{
    protected $response;

    public function __construct()
    {
        $this->response = Http::get("https://merojob.com")->json();
    }

    public function getResponse()
    {
        // Process Your logic
        //

        return $this->response;
    }
}
