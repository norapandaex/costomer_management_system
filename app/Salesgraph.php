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

    public function create_date($request, $id)
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

    public function update_date($request, $id)
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

    public function create_sponser($request, $pid)
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

    public function create_addition($request, $id)
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

    public function create_year($salesgraphs)
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
