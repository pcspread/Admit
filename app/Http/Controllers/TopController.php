<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class TopController extends Controller
{
    /**
     * view表示
     * @param void
     * @return view
     */
    public function indexTop()
    {
        return view('top');
    }
}
