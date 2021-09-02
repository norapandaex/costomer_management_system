<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Carbon\Carbon;

class SalesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $dt = new Carbon();
        $this_year = $dt->year;

        $sales = \App\Salesgraph::where('month', 'like', "%$this_year%")->orderBy('month', 'asc')->get();
        $sites = \App\Site::all();

        $salesgraph = new \App\Salesgraph;

        list($salesyears, $years) = $salesgraph->create_year();

        return view('sales.index', [
            'sales' => $sales,
            'years' => $years,
            'this_year' => $this_year,
            'sites' => $sites,
            'cos' => 0,
            //'counts' => $counts,
        ]);
    }

    public function month(Request $request)
    {
        if ($request->site == 0) {
            $sales = \App\Salesgraph::where('month', 'like', "%$request->year%")->orderBy('month', 'asc')->get();
            $sites = \App\Site::all();
        } else if ($request->site != 0) {
            $sales = \App\Salesgraph::where('month', 'like', "%$request->year%")->where('site_id', "$request->site")->orderBy('month', 'asc')->get();
            $sites = \App\Site::all();
        }

        $salesgraph = new \App\Salesgraph;

        list($salesyears, $years) = $salesgraph->create_year();

        $this_year = $request->year;
        $cos = $request->site;

        return view('sales.index', [
            'sales' => $sales,
            'years' => $years,
            'this_year' => $this_year,
            'sites' => $sites,
            'cos' => $cos,
            //'counts' => $counts,
        ]);
    }

    public function year()
    {
        $sales = \App\Salesgraph::orderBy('month', 'asc')->get();

        $salesgraph = new \App\Salesgraph;

        list($salesyears, $years) = $salesgraph->create_year();

        return view('sales.year', [
            'sales' => $sales,
            'salesyear' => $salesyears,
            'years' => $years,
        ]);
    }


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

        $salesgraph = new \App\Salesgraph;

        $salesgraph->create_date($request, $id);

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

        $salesgraph = new \App\Salesgraph;

        $id = $sales->site_id;

        $salesgraph->update_date($request, $id);

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
