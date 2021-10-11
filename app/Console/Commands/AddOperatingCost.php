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
        //$sales = \App\Sales::get();
        $sites = \App\Site::get();
        //$count = $sales->count();

        //$sales2 = \App\Sales::where('site_id', '4')->get();

        $today = new Carbon();

        //$today = new Carbon('2021-10-01');

        //if ($today->day == 1) {
        //for ($i = 1; $i <= $count; $i++) {$i = 3;
        foreach ($sites as $site) {
            //dd($sale, $sales2);
            $sales = \App\Sales::where('site_id', $site->id)->get();
            $salesgraphs = \App\Salesgraph::where('site_id', $site->id)->get();
            //$salesgraphs = \App\Salesgraph::where('site_id', '2')->get();
            $key_month1 = array();
            $key_month2 = array();

            foreach ($sales as $sale) {
                $sale_month = new Carbon($sale->operating_month);
                $m1 = array();

                //新年の時に1月分を追加
                if ($sale_month->year != $today->year) {
                    for ($j = $sale_month->month; $j <= 12; $j++) {
                        $m1[] = $j;
                        foreach ($salesgraphs as $salesgraph) {
                            if ($salesgraph->operating_cost != 0) {
                                $graph_month = new Carbon($salesgraph->month);
                                if ($j == $graph_month->month) {
                                    $key_month1[] = $graph_month->month;
                                }
                            }
                        }
                    }
                    $diffs = array_diff($m1, $key_month1);
                    var_dump($site->id, $m1, $key_month1, $diffs);

                    if ($diffs != null) {
                        foreach ($diffs as $key => $value) {
                            $year = $sale_month->year;
                            $month = $value;
                            $mon1 = Carbon::createMidnightDate($year, $month, 1);
                            var_dump($mon1->format('Y-m'));
                            //$site = \App\Site::find($salesgraph->site_id);
                            $site->salesgraphs()->create([
                                'production_cost' => 0,
                                'operating_cost' => $salesgraph->operating_cost,
                                'production_month' => 0,
                                'month' => $mon1->format('Y-m'),
                                'sum_cost' => $salesgraph->operating_cost,
                            ]);
                            //echo $sale . $salesgraph . $value . '月';
                        }
                    }

                    $year = $today->year;
                    $month = 1;
                    $mon2 = Carbon::createMidnightDate($year, $month);
                    var_dump($mon2->format('Y-m'));
                    $s = \App\Salesgraph::where('site_id', $site->id)->where('month', $mon2->format('Y-m'))->get();
                    if (count($s) == 0) {
                        //$site = \App\Site::find($salesgraph->site_id);
                        $site->salesgraphs()->create([
                            'production_cost' => 0,
                            'operating_cost' => $salesgraph->operating_cost,
                            'production_month' => 0,
                            'month' => $mon2->format('Y-m'),
                            'sum_cost' => $salesgraph->operating_cost,
                        ]);
                    }
                }
            }

            foreach ($sales as $sale) {
                $sale_month = new Carbon($sale->operating_month);
                $m2 = array();

                $c = 0;
                $max_month = 1;
                $salesgraphs = \App\Salesgraph::where('site_id', $site->id)->get();
                foreach ($salesgraphs as $salesgraph) {
                    $dt = new Carbon($salesgraph->month);
                    if ($dt->year == $today->year) {
                        if ($c == 0) {
                            $dt1 = new Carbon($salesgraph->month);
                            $max_month = $dt1;
                            $c++;
                        }

                        if ($c != 0) {
                            $dt2 = new Carbon($salesgraph->month);

                            if ($dt1->gt($dt2)) {
                                $max_month = $dt1;
                            } else {
                                $max_month = $dt2;
                            }
                        }
                    }
                }

                dump($max_month->month);

                //当月までの分を追加
                for ($k = $max_month->month; $k <= $today->month; $k++) {
                    $m2[] = $k;
                    foreach ($salesgraphs as $salesgraph) {
                        if ($salesgraph->operating_cost != 0) {
                            $graph_month = new Carbon($salesgraph->month);
                            if ($graph_month->year == $today->year) {
                                if ($k == $graph_month->month) {
                                    $key_month2[] = $graph_month->month;
                                }
                            }
                        }
                    }
                }
                $diffs = array_diff($m2, $key_month2);
                var_dump($site->id, $m2, $key_month2, $diffs);

                if ($diffs != null) {
                    foreach ($diffs as $key => $value) {
                        $year = $today->year;
                        $month = $value;
                        $mon3 = Carbon::createMidnightDate($year, $month, 1);
                        var_dump($mon3->format('Y-m'));
                        //$site = \App\Site::find($salesgraph->site_id);
                        $site->salesgraphs()->create([
                            'production_cost' => 0,
                            'operating_cost' => $salesgraph->operating_cost,
                            'production_month' => 0,
                            'month' => $mon3->format('Y-m'),
                            'sum_cost' => $salesgraph->operating_cost,
                        ]);
                        //echo $sale . $salesgraph . $value . '月';
                    }
                }
                //} else {
                //}
            }
        }
    }
    //}
}
