<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Console\Commands\AddOperatingCost;
use Carbon\Carbon;

class Salesgraph extends Model
{
    protected $guarded = [
        'id',
        'site_id',
        'payment_id',
    ];

    public function site()
    {
        return $this->belongsTo(Site::class);
    }

    public function payment()
    {
        return $this->belongsTo(Payment::class);
    }

    public function addition()
    {
        return $this->belongsTo(Addition::class);
    }

    public function cost()
    {
        return $this->belongsTo(Cost::class);
    }

    public function create($sales)
    {
        $counts = count($sales);
        $i = 0;
        $sales_data = [0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0];
        if ($sales != null) {
            foreach ($sales as $sale) {
                if (count($sales) == 1) {
                    $m = new Carbon($sale->month);
                    $mn = $m->month - 1;
                    $sales_data[$mn] = $sale->sum_cost;
                    $varJsSales = $sales_data;
                    $max = $sale->sum_cost;
                    return [$varJsSales, $max, $i];
                } else {
                    if ($i == 0) {
                        $month1 = $sale->month;
                        $month2 = null;
                        $cost2 = 0;
                        $cost = $sale->sum_cost;
                        $max = $sale->sum_cost;
                        $i++;
                    } else {
                        $month2 = $sale->month;
                        $cost2 = $sale->sum_cost;
                        $i++;
                    }

                    if ($i > 1) {
                        if ($month1 == $month2) {
                            $cost = $cost + $cost2;
                        } else {
                            $m = new Carbon($month1);
                            $mn = $m->month - 1;
                            $sales_data[$mn] = $cost;
                            $cost = $cost2;
                            $month1 = $month2;
                        }

                        if ($i == $counts) {
                            $m = new Carbon($month2);
                            $mn = $m->month - 1;
                            $sales_data[$mn] = $cost;
                        }

                        if ($max < $cost) {
                            $max = $cost;
                        }

                        if (count($sales_data) >= 1) {
                            $varJsSales = $sales_data;
                        }
                    }
                    //var_dump($cost, $month1, $i, $counts, $sales_data, $month_data);
                }
            }
            return [$varJsSales, $max, $i];
        }
    }

    public function createCostgraph($costs)
    {
        $counts = count($costs);
        $i = 0;
        $cost_data = [0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0];
        if ($costs != null) {
            foreach ($costs as $cost) {
                if (count($costs) == 1) {
                    $m = new Carbon($cost->month);
                    $mn = $m->month - 1;
                    $cost_data[$mn] = $cost->sum_cost;
                    $varJsCosts = $cost_data;
                    return $varJsCosts;
                } else {
                    if ($i == 0) {
                        $month1 = $cost->month;
                        $month2 = null;
                        $cost2 = 0;
                        $cost1 = $cost->costc;
                        $i++;
                    } else {
                        $month2 = $cost->month;
                        $cost2 = $cost->costc;
                        $i++;
                    }

                    if ($i > 1) {
                        if ($month1 == $month2) {
                            $cost1 = $cost1 + $cost2;
                        } else {
                            $m = new Carbon($month1);
                            $mn = $m->month - 1;
                            $cost_data[$mn] = $cost1;
                            $cost1 = $cost2;
                            $month1 = $month2;
                        }

                        if ($i == $counts) {
                            $m = new Carbon($month2);
                            $mn = $m->month - 1;
                            $cost_data[$mn] = $cost1;
                        }

                        if (count($cost_data) >= 1) {
                            $varJsCosts = $cost_data;
                        }
                    }
                    //var_dump($cost, $month1, $i, $counts, $sales_data, $month_data);
                }
            }
            return $varJsCosts;
        }
    }

    public function createDate($request, $id)
    {
        $site = \App\Site::find($id);
        $production_month = $request->production_month;
        $operating_month = $request->operating_month;
        $sum = $request->production_cost + $request->operating_cost;

        if ($production_month == $operating_month) {
            $site->salesgraphs()->create([
                'production_cost' => $request->production_cost,
                'operating_cost' => $request->operating_cost,
                'month' => $request->production_month,
                'sum_cost' => $sum,
            ]);
        } else {
            $site->salesgraphs()->create([
                'production_cost' => $request->production_cost,
                'operating_cost' => 0,
                'month' => $request->production_month,
                'sum_cost' => $request->production_cost,
            ]);

            $site->salesgraphs()->create([
                'production_cost' => 0,
                'operating_cost' => $request->operating_cost,
                'month' => $request->operating_month,
                'sum_cost' => $request->operating_cost,
            ]);
        }
    }

    public function updateDate($request, $id)
    {
        $salesgraphs = \App\Salesgraph::where('site_id', $id)->get();

        foreach ($salesgraphs as $salesgraph) {
            $salesgraph->delete();
        }

        $salesgraph = new \App\Salesgraph;

        $salesgraph->create_date($request, $id);

        $add = new \App\Console\Commands\AddOperatingCost;

        $add->handle();
    }

    public function createSponser($request, $pid)
    {
        $payment = \App\Payment::find($pid);

        $m = new Carbon($request->day);

        $month = $m->format('Y-m');

        $payment->salesgraphs()->create([
            'sponserc' => $request->amount,
            'month' => $month,
            'sum_cost' => $request->amount,
        ]);
    }

    public function createAddition($request, $id)
    {
        $addition = \App\Addition::find($id);

        $m = new Carbon($request->day);

        $month = $m->format('Y-m');

        $addition->salesgraphs()->create([
            'additionc' => $request->cost,
            'month' => $month,
            'sum_cost' => $request->cost,
        ]);
    }

    public function createCost($request, $id)
    {
        $cost = \App\Cost::find($id);

        $m = new Carbon($request->day);

        $month = $m->format('Y-m');

        $cost->salesgraphs()->create([
            'costc' => $request->cost,
            'month' => $month,
        ]);
    }

    public function createYear($salesgraphs)
    {
        //$salesgraphs = \App\Salesgraph::orderBy('month', 'asc')->get();
        $year1 = 0;
        $sale = 0;
        $data = count($salesgraphs);
        $max = 0;

        while ($data != 0) {
            $count = 0;
            foreach ($salesgraphs as $salesgraph) {
                if ($count == 0) {
                    $month1 = new Carbon($salesgraph->month);
                    $year1 = $month1->year;
                    $years[] = $year1;
                    $sale = $salesgraph->sum_cost;
                    $salesgraphs2 = [];
                    $count++;
                } else {
                    $month2 = new Carbon($salesgraph->month);
                    $year2 = $month2->year;

                    if ($year1 == $year2) {
                        $sale = $sale + $salesgraph->sum_cost;
                    } else {
                        $salesgraphs2[] = $salesgraph;
                    }
                    $count++;
                }

                if ($count == $data) {
                    $salesyears[] = $sale;
                    $salesgraphs = $salesgraphs2;
                    $data = count($salesgraphs);

                    if ($max < $sale) {
                        $max = $sale;
                    }
                }
            }
        }
        //dd($data, $salesgraphs, $sales, $years);

        return [$salesyears, $years, $max];
    }
}
