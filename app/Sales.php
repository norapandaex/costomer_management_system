<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Sales extends Model
{
    protected $guarded = [
        'id',
        'site_id',
    ];

    public function site()
    {
        return $this->belongsTo(Site::class);
    }

    // public function get_sales()
    // {
    //     $sales = Sales::all();

    //     foreach ($sales as $sale) {

    //         $production_month = $sale->production_month;
    //         $operating_month = $sale->operating_month;
    //         $sum = $sale->production_cost + $sale->operating_cost;

    //         if ($production_month == $operating_month) {
    //             $sales_data[] = [
    //                 'month' => $production_month,
    //                 'costomer_name' => $sale->site->costomer->name,
    //                 'site_name' => $sale->site->name,
    //                 'production_cost' => $sale->production_cost,
    //                 'operating_cost' => $sale->operating_cost,
    //                 'site_id' => $sale->site_id,
    //                 'sum_cost' => $sale->production_cost + $sale->operating_cost,
    //             ];
    //         } else {
    //             if ($production_month != 0) {
    //                 $sales_data[] = [
    //                     'month' => $production_month,
    //                     'costomer_name' => $sale->site->costomer->name,
    //                     'site_name' => $sale->site->name,
    //                     'production_cost' => $sale->production_cost,
    //                     'operating_cost' => 0,
    //                     'site_id' => $sale->site_id,
    //                     'sum_cost' => $sale->production_cost,
    //                 ];
    //             }

    //             if ($operating_month != 0) {
    //                 $sales_data[] = [
    //                     'month' => $operating_month,
    //                     'costomer_name' => $sale->site->costomer->name,
    //                     'site_name' => $sale->site->name,
    //                     'production_cost' => 0,
    //                     'operating_cost' => $sale->operating_cost,
    //                     'site_id' => $sale->site_id,
    //                     'sum_cost' => $sale->operating_cost,
    //                 ];
    //             }
    //         }
    //     }

    //     asort($sales_data); //月が古い順にソート

    //     function array_to_object($array)
    //     {
    //         $obj = new \stdClass;
    //         foreach ($array as $k => $v) {
    //             if (strlen($k)) {
    //                 if (is_array($v)) {
    //                     $obj->{$k} = array_to_object($v); //RECURSION
    //                 } else {
    //                     $obj->{$k} = $v;
    //                 }
    //             }
    //         }
    //         return $obj;
    //     }

    //     return [array_to_object($sales_data), count($sales_data)];
    // }
}
