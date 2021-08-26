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
    ];

    public function site()
    {
        return $this->belongsTo(Site::class);
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

        // dd($salesgraphs);

        // $count = 0;

        // foreach ($salesgraphs as $salesgraph) {

        //     if ($salesgraph->production_cost != 0 && $salesgraph->operating_cost != 0) {

        //         if ($request->operating_month != $request->production_month) {

        //             $salesgraph->delete();

        //             $site = \App\Site::find($id);

        //             $site->salesgraphs()->create([
        //                 'production_cost' => $request->production_cost,
        //                 'operating_cost' => 0,
        //                 'month' => $request->production_month,
        //                 'sum_cost' => $request->production_cost,
        //             ]);

        //             $site->salesgraphs()->create([
        //                 'production_cost' => 0,
        //                 'operating_cost' => $request->operating_cost,
        //                 'month' => $request->operating_month,
        //                 'sum_cost' => $request->operating_cost,
        //             ]);
        //         } else {

        //             $salesgraph->production_cost = $request->production_cost;
        //             $salesgraph->operating_cost = $request->operating_cost;
        //             $salesgraph->month = $request->production_month;
        //             $salesgraph->sum_cost = $request->production_cost + $request->operating_cost;

        //             $salesgraph->save();
        //         }
        //     } else {
        //         if ($request->operating_month == $request->production_month) {

        //             if ($count == 0) {
        //                 $salesgraph->delete();

        //                 $site = \App\Site::find($id);

        //                 $site->salesgraphs()->create([
        //                     'production_cost' => $request->production_cost,
        //                     'operating_cost' => $request->operating_cost,
        //                     'month' => $request->production_month,
        //                     'sum_cost' => $request->production_cost + $request->operating_cost,
        //                 ]);

        //                 $count++;
        //             } else {
        //                 $salesgraph->delete();
        //             }
        //         } else {
        //             if ($salesgraph->production_cost == 0) {

        //                 $salesgraph->operating_cost = $request->operating_cost;
        //                 $salesgraph->month = $request->operating_month;
        //                 $salesgraph->sum_cost = $request->operating_cost;

        //                 $salesgraph->save();
        //             } else if ($salesgraph->operating_cost == 0) {

        //                 $salesgraph->production_cost = $request->production_cost;
        //                 $salesgraph->month = $request->production_month;
        //                 $salesgraph->sum_cost = $request->production_cost;

        //                 $salesgraph->save();
        //             }
        //         }
        //     }
        // }
    }

    public function create_year()
    {
        $salesgraphs = \App\Salesgraph::orderBy('month', 'asc')->get();
        $year1 = 0;
        $sale = 0;
        $data = count($salesgraphs);

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
                }
            }
        }
        //dd($data, $salesgraphs, $sales, $years);

        return [$salesyears, $years];
    }
}
