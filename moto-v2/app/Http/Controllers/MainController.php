<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

/**
 *
 */
class MainController extends Controller
{
    /**
     * @return string
     */
    public function index() {
        return view('pages.index');
    }
}
