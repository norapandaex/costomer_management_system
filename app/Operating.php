<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Carbon\Carbon;

class Operating extends Model
{
    protected $guarded = [
        'id',
        'site_id',
    ];

    public function site()
    {
        return $this->belongsTo(Site::class);
    }

    public function operecord()
    {
        return $this->belongsTo(Operecord::class);
    }

    public function salesgraphs()
    {
        return $this->hasMany(Salesgraph::class);
    }

    public function createDate($request, $id)
    {
        $site = \App\Site::find($id);

        $operecord = $site->operecords->last();

        $operecord->operatings()->create([
            'day' => $request->operating_month,
        ]);
    }

    public function addOperating()
    {
        $sites = \App\Site::get();

        $today = new Carbon();
        //$today = new Carbon('2021-06-01');

        foreach ($sites as $site) {
            $operecord = $site->operecords->last();
            $opes = \App\Operating::all();
            $operatings = array();
            foreach ($opes as $ope) {
                if ($ope->operecord->site->id == $site->id) {
                    $operatings[] = $ope;
                }
            }
            // if ($ope->operecord->site->id == 2) {
            //     var_dump($site->id);
            //     dd($operatings);
            // }

            if (count($operatings) != 0) {

                $sales = \App\Sales::where('site_id', $site->id)->get();
                foreach ($sales as $sale) {
                    $sale_month = new Carbon($sale->operating_month);
                    $m1 = array();
                    $key_month1 = array();

                    //新年の時に1月分を追加
                    if ($sale_month->year != $today->year) {
                        for ($j = $sale_month->month; $j <= 12; $j++) {
                            $m1[] = $j;
                            foreach ($operatings as $operating) {
                                $ope_month = new Carbon($operating->day);
                                if ($ope_month->year != $today->year) {
                                    //$graph_month = new Carbon($operating->day);
                                    if ($j == $ope_month->month) {
                                        $key_month1[] = $ope_month->month;
                                    }
                                }
                            }
                        }
                        $diffs = array_diff($m1, $key_month1);
                        //var_dump($site->id, $m1, $key_month1, $diffs);

                        if ($diffs != null) {
                            foreach ($diffs as $key => $value) {
                                $year = $sale_month->year;
                                $month = $value;
                                $mon1 = Carbon::createMidnightDate($year, $month, 1);
                                //var_dump($mon1->format('Y-m'));
                                //$site = \App\Site::find($salesgraph->site_id);
                                $operecord->operatings()->create([
                                    'day' => $mon1->format('Y-m'),
                                ]);
                                //echo $sale . $salesgraph . $value . '月';
                            }
                        }

                        $year = $today->year;
                        $month = 1;
                        $mon2 = Carbon::createMidnightDate($year, $month);
                        //var_dump($mon2->format('Y-m'));
                        $s = \App\Operating::where('operecord_id', $operecord->id)->where('day', $mon2->format('Y-m'))->get();
                        if (count($s) == 0) {
                            //$site = \App\Site::find($salesgraph->site_id);
                            $operecord->operatings()->create([
                                'day' => $mon2->format('Y-m'),
                            ]);
                        }
                    }
                    //dd($s);
                }

                foreach ($sales as $sale) {
                    $key_month2 = array();
                    $sale_month = new Carbon($sale->operating_month);
                    $m2 = array();

                    $c = 0;
                    $max_month = 1;
                    $opes = \App\Operating::all();
                    $operatings = [];
                    foreach ($opes as $ope) {
                        if ($ope->operecord->site->id == $site->id) {
                            $operatings[] = $ope;
                        }
                    }

                    foreach ($operatings as $operating) {
                        $dt = new Carbon($operating->day);
                        if ($dt->year == $today->year) {
                            if ($c == 0) {
                                $dt1 = new Carbon($operating->day);
                                $max_month = $dt1;
                                $c++;
                            }

                            if ($c != 0) {
                                $dt2 = new Carbon($operating->day);

                                if ($dt1->gt($dt2)) {
                                    $max_month = $dt1;
                                } else {
                                    $max_month = $dt2;
                                }
                            }
                        }
                    }

                    //当月までの分を追加
                    for ($k = $max_month->month; $k <= $today->month; $k++) {
                        $m2[] = $k;
                        foreach ($operatings as $operating) {
                            $graph_month = new Carbon($operating->day);
                            if ($graph_month->year == $today->year) {
                                if ($k == $graph_month->month) {
                                    $key_month2[] = $graph_month->month;
                                }
                            }
                        }
                    }
                    $diffs = array_diff($m2, $key_month2);
                    //dd($site->id, $m2, $key_month2, $diffs);

                    if ($diffs != null) {
                        foreach ($diffs as $key => $value) {
                            $year = $today->year;
                            $month = $value;
                            $mon3 = Carbon::createMidnightDate($year, $month, 1);
                            var_dump($mon3->format('Y-m'));

                            $operecord->operatings()->create([
                                'day' => $mon3->format('Y-m'),
                            ]);
                            //echo $sale . $salesgraph . $value . '月';
                        }
                    }
                    //} else {
                    //}
                }
            }
        }
    }
}
