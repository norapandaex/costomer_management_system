<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

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

        $sum = $request->production_cost + $request->operating_cost;

        $count = 0;

        foreach ($salesgraphs as $salesgraph) {

            if ($salesgraph->production_cost != 0 && $salesgraph->operating_cost != 0) {

                if ($request->operating_month != $request->production_month) {

                    $salesgraph->delete();

                    $site = \App\Site::find($id);

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
                } else {
                    $salesgraph->production_cost = $request->production_cost;
                    $salesgraph->operating_cost = $request->operating_cost;
                    $salesgraph->month = $request->production_month;
                    $salesgraph->sum_cost = $sum;

                    $salesgraph->save();
                }
            } else {
                if ($request->operating_month == $request->production_month) {

                    if ($count == 0) {
                        $salesgraph->delete();

                        $site = \App\Site::find($id);

                        $site->salesgraphs()->create([
                            'production_cost' => $request->production_cost,
                            'operating_cost' => $request->operating_cost,
                            'month' => $request->production_month,
                            'sum_cost' => $sum,
                        ]);

                        $count++;
                    } else {
                        $salesgraph->delete();
                    }
                } else {
                    if ($salesgraph->production_cost == 0) {

                        $salesgraph->operating_cost = $request->operating_cost;
                        $salesgraph->month = $request->operating_month;
                        $salesgraph->sum_cost = $sum;

                        $salesgraph->save();
                    } else if ($salesgraph->operating_cost == 0) {

                        $salesgraph->production_cost = $request->production_cost;
                        $salesgraph->month = $request->production_month;
                        $salesgraph->sum_cost = $sum;

                        $salesgraph->save();
                    }
                }
            }
        }
    }
}
