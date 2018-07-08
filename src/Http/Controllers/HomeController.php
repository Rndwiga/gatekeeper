<?php

namespace Rndwiga\Authentication\Http\Controllers;

use Illuminate\Http\Request;
use Carbon\Carbon;
use Illuminate\Support\Facades\DB;


class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $dashboard = env('BASE_DASHBOARD_ROUTE') ? env('BASE_DASHBOARD_ROUTE') : 'admin.mifos.mmt.index';

        return redirect()->route($dashboard);
    }
}
