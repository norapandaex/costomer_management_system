<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Carbon\Carbon;

class AddOperatingCost extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'add:operating';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Command description';

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Execute the console command.
     *
     * @return mixed
     */
    public function handle()
    {
        $sales = \App\Sales::get();
        $count = $sales->count();

        //$sales2 = \App\Sales::where('site_id', '4')->get();

        $today = new Carbon();

        //$today = new Carbon('2021-10-01');

        //if ($today->day == 1) {
        for ($i = 1; $i <= $count; $i++) {
            //dd($sale, $sales2);
            $sales = \App\Sales::where('site_id', $i)->get();
            $salesgraphs = \App\Salesgraph::where('site_id', $i)->get();
            //$salesgraphs = \App\Salesgraph::where('site_id', '2')->get();
            $key_month = array();

            foreach ($sales as $sale) {
                $sale_month = new Carbon($sale->operating_month);
                $m = array();
                for ($j = $sale_month->month; $j <= $today->month; $j++) {
                    $m[] = $j;
                    foreach ($salesgraphs as $salesgraph) {
                        if ($salesgraph->operating_cost != 0) {
                            $graph_month = new Carbon($salesgraph->month);
                            if ($j == $graph_month->month) {
                                $key_month[] = $graph_month->month;
                            }
                        }
                    }
                }
                $diffs = array_diff($m, $key_month);
                //dd($i, $m, $key_month, $diffs);
                if ($diffs != null) {
                    foreach ($diffs as $key => $value) {
                        $year = $today->year;
                        $month = $value;
                        $mon = Carbon::createMidnightDate($year, $month);
                        $site = \App\Site::find($salesgraph->site_id);
                        $site->salesgraphs()->create([
                            'production_cost' => 0,
                            'operating_cost' => $salesgraph->operating_cost,
                            'production_month' => 0,
                            'month' => $mon->format('Y-m'),
                            'sum_cost' => $salesgraph->operating_cost,
                        ]);
                        //echo $sale . $salesgraph . $value . '月';
                    }
                } else {
                    //echo $sale . $salesgraph;
                }
            }
        }
        //}
    }
}
