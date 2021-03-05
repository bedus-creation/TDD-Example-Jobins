<?php

namespace App\Http\Controllers;

use App\Http\Requests\PostStoreRequest;
use Illuminate\Http\Request;

class PostController extends Controller
{
    public function __invoke(PostStoreRequest $storeRequest)
    {
        // Your Logic

        return redirect()->back()->with("success", "Post has been created.");
    }
}
