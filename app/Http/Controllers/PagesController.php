<?php

namespace Todos\Http\Controllers;

use Illuminate\Http\Request;

class PagesController extends Controller
{
    public function new() {
        return view('new');
    }
}
