<?php

namespace Rndwiga\Gatekeeper\Http\Controllers;

use Illuminate\Http\Request;

class ModuleController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function dashboard(){

    }
}
