<?php

namespace Rndwiga\Authentication\Http\Controllers;

use Illuminate\Http\Request;
use Carbon\Carbon;
use Illuminate\Support\Facades\DB;


class HomeController extends Controller
{
  private $offices;
  private $branch;
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
        $this->offices  = [1 => 'Head Office', 2 => 'Zimmerman', 3 => 'Gikomba',
            4 => 'Thika', 5 => 'Naivasha',6 => 'Kitengela', 7 => 'Kisii',8 => 'Donholm', 9 => 'Kariobangi',
            10 => 'Kawangware', 11 => 'Kiambu',12 => 'Machakos', 13 => 'Muranga',14 => 'Nakuru', 15 => 'Narok',
            16 => 'Rongai', 17 => 'Pilot',18 => 'Matuu', 19 => 'Molo',20 => 'Eldoret', 21 => 'HQ-Branch',
          ];
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
      $groupByDay = Charts::database(Cashflow::all(),'pie', 'google')
            ->elementLabel("Models")
            ->dimensions(1000,500)
            ->responsive(true)
            ->GroupByDay();
      $groupByOffice = Charts::database(Cashflow::all(), 'bar', 'google')
            ->elementLabel("Cashflow Loans")
            ->dimensions(1000, 500)
            ->responsive(true)
            ->groupBy('officeId', null, $this->offices);
      $groupByDayTrend = Charts::database(Cashflow::all(), 'line', 'google')
            ->title('Cashflow Loans')
            ->elementLabel('Cashflow Loans')
            ->dimensions(1000,500)
            ->groupByMonth()
            ->dateFormat('F Y')
            ->responsive(true);
      $widgets = (object)[
        'totalModels' => Cashflow::count(),
        'todayModels' => Cashflow::whereDate('created_at', '=', date('Y-m-d'))->count(),
        'lastWeekModels' => Cashflow::whereBetween('created_at', [(Carbon::today()->subWeeks(2)), Carbon::today()->subWeek() ])->count(),
        'thisWeekModels' => Cashflow::whereBetween('created_at', [(Carbon::today()->subWeek()), Carbon::today()])->count(),
        'topBranchInTheWeek' => $this->highActiveBranchInTheWeek(),
        'previousWeekTopBranch' => $this->highActiveBranchInThePreviousWeek()
      ];
        return view(config('cashflow.views.pages.home.home'), compact('groupByDay','groupByOffice', 'groupByDayTrend','widgets'));
    }
    /*
      This function returns branch name based on its officeId.
      @input array of branch name indexed by their ID
      @ Cashflow::groupBy('officeId')->pluck('officeId')->max() //gets the most common branch
    */
    private function getBranchByName($branch)
    {
      foreach ($this->offices as $key => $value) {
        if ($key == $branch ) {
          return $value;
        }
      }
    }
    /*
        The function below gets the best performing branch within the week depending on the number of loans submitted
    */
    private function highActiveBranchInTheWeek()
    {
        $models = DB::table('cashflows')
                         ->select(DB::raw('count(*) as branch, officeId'))
                         ->whereBetween('created_at', [(Carbon::today()->subWeek()), Carbon::today()])
                         ->groupBy('officeId')
                         ->orderBy('branch', 'desc')
                         ->get();
        foreach($models as $key => $value){
          if ($key == 0){
            return $this->getBranchByName($value->officeId) ;
          }
        }
    }
    /*
      * This function pulls highest active branch in the previous week based on the created at time stamp
      * @author Raphael Ndwiga
      * @return integer
      * @param null No impute required
     */
    private function highActiveBranchInThePreviousWeek()
    {
              $models = DB::table('cashflows')
                               ->select(DB::raw('count(*) as branch, officeId'))
                               ->whereBetween('created_at', [(Carbon::today()->subWeeks(2)), Carbon::today()->subWeek() ])
                               ->groupBy('officeId')
                               ->orderBy('branch', 'desc')
                               ->get();
              foreach($models as $key => $value){
                if ($key == 0){
                  return $this->getBranchByName($value->officeId) ;
                }
              }
    }
}
