<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class SalesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
<<<<<<< HEAD
        $sales = new \App\Sales;

        list($sales, $counts) = $sales->get_sales();

        return view('sales.index', [
            'sales' => $sales,
            'i' => 0,
            'counts' => $counts,
        ]);
    }


=======
        $sales = \App\Sales::all();

        return view('sales.index', [
            'sales' => $sales,
        ]);
    }

>>>>>>> 3dde02f52e6cdaf56045571b8234863252a60a1e
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request, $id)
    {
        $site = \App\Site::find($id);

        $sum = $request->production_cost + $request->operating_cost;

        $site->sales()->create([
            'production_cost' => $request->production_cost,
            'operating_cost' => $request->operating_cost,
            'production_month' => $request->production_month,
            'operating_month' => $request->operating_month,
            'sum_cost' => $sum,
        ]);

        return redirect()->route('sales.edit', ['id' => $id]);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $site = \App\Site::find($id);
        $sales = $site->sales()->get();
        $sale[] = null;

        if (count($sales) != 0) {
            foreach ($sales as $sale) {
                $sale = $sale;
            }
            $flag = 0;
        } else {
            $flag = 1;
        }

        return view('sales.edit', ['site' => $site, 'sale' => $sale, 'flag' => $flag]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'production_month' => 'required',
            'operating_month' => 'required',
        ]);
        $sales = \App\Sales::findOrFail($id);

        $sum = $request->production_cost + $request->operating_cost;

        $sales->production_cost = $request->production_cost;
        $sales->operating_cost = $request->operating_cost;
        $sales->production_month = $request->production_month; //string
        $sales->operating_month = $request->operating_month; //string
        $sales->sum_cost = $sum;

        $sales->save();

        $id = $sales->site_id;

        return redirect()->route('sales.edit', ['id' => $id]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
