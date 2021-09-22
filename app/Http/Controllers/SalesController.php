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
        $productions = \App\Salesgraph::where('month', 'like', "%$this_year%")->where('production_cost', '<>', '0')->orderBy('month', 'asc')->get();
        $operatings = \App\Salesgraph::where('month', 'like', "%$this_year%")->where('operating_cost', '<>', '0')->orderBy('month', 'asc')->get();
        $sponsers = \App\Salesgraph::where('month', 'like', "%$this_year%")->where('sponserc', '<>', null)->orderBy('month', 'asc')->get();
        $additions = \App\Salesgraph::where('month', 'like', "%$this_year%")->where('additionc', '<>', null)->orderBy('month', 'asc')->get();
        $costs = \App\Salesgraph::where('month', 'like', "%$this_year%")->where('costc', '<>', null)->orderBy('month', 'asc')->get();

        $sites = \App\Site::all();

        $salesgraph = new \App\Salesgraph;

        $salesgraphs = \App\Salesgraph::orderBy('month', 'asc')->get();

        list($salesyears, $years) = $salesgraph->createYear($salesgraphs);

        return view('sales.index', [
            'sales' => $sales,
            'productions' => $productions,
            'operatings' => $operatings,
            'sponsers' => $sponsers,
            'additions' => $additions,
            'years' => $years,
            'this_year' => $this_year,
            'sites' => $sites,
            'costs' => $costs,
            'cos' => 0,
            //'counts' => $counts,
        ]);
    }

    public function year()
    {
        $sales = \App\Salesgraph::orderBy('month', 'asc')->get();

        $salesgraph = new \App\Salesgraph;

        list($salesyears, $years, $max) = $salesgraph->createYear($sales);

        return view('sales.year', [
            'sales' => $sales,
            'salesyears' => $salesyears,
            'years' => $years,
            'max' => $max,
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

        $costs = \App\Salesgraph::where('month', 'like', "%$request->year%")->where('costc', '<>', null)->orderBy('month', 'asc')->get();

        $salesgraph = new \App\Salesgraph;

        $salesgraphs = \App\Salesgraph::orderBy('month', 'asc')->get();

        list($salesyears, $years) = $salesgraph->createYear($salesgraphs);

        $this_year = $request->year;
        $cos = $request->site;

        return view('sales.index', [
            'sales' => $sales,
            'years' => $years,
            'this_year' => $this_year,
            'sites' => $sites,
            'costs' => $costs,
            'cos' => $cos,
            //'counts' => $counts,
        ]);
    }

    public function production()
    {
        $dt = new Carbon();
        $this_year = $dt->year;

        $sales = \App\Salesgraph::where('month', 'like', "%$this_year%")->where('production_cost', '<>', '0')->orderBy('month', 'asc')->get();
        $sites = \App\Site::all();

        $salesgraph = new \App\Salesgraph;

        $salesgraphs = \App\Salesgraph::orderBy('month', 'asc')->get();

        list($salesyears, $years) = $salesgraph->createYear($salesgraphs);

        return view('sales.index', [
            'sales' => $sales,
            'years' => $years,
            'this_year' => $this_year,
            'sites' => $sites,
            'costs' => [],
            'cos' => 0,
            //'counts' => $counts,
        ]);
    }

    public function productionYear()
    {
        $sales = \App\Salesgraph::where('production_cost', '<>', '0')->orderBy('month', 'asc')->get();
        $sites = \App\Site::all();

        $salesgraph = new \App\Salesgraph;

        list($salesyears, $years, $max) = $salesgraph->createYear($sales);

        //dd($salesyears, $years);

        return view('sales.year', [
            'sales' => $sales,
            'years' => $years,
            'salesyears' => $salesyears,
            'max' => $max,
        ]);
    }

    public function productionMonth(Request $request)
    {
        if ($request->site == 0) {
            $sales = \App\Salesgraph::where('month', 'like', "%$request->year%")->where('production_cost', '<>', '0')->orderBy('month', 'asc')->get();
            $sites = \App\Site::all();
        } else if ($request->site != 0) {
            $sales = \App\Salesgraph::where('month', 'like', "%$request->year%")->where('site_id', "$request->site")->where('production_cost', '<>', '0')->orderBy('month', 'asc')->get();
            $sites = \App\Site::all();
        }

        $salesgraph = new \App\Salesgraph;

        $salesgraphs = \App\Salesgraph::orderBy('month', 'asc')->get();

        list($salesyears, $years) = $salesgraph->createYear($salesgraphs);

        $this_year = $request->year;
        $cos = $request->site;

        return view('sales.index', [
            'sales' => $sales,
            'years' => $years,
            'this_year' => $this_year,
            'sites' => $sites,
            'costs' => [],
            'cos' => $cos,
            //'counts' => $counts,
        ]);
    }

    public function operating()
    {
        $dt = new Carbon();
        $this_year = $dt->year;

        $sales = \App\Salesgraph::where('month', 'like', "%$this_year%")->where('operating_cost', '<>', '0')->orderBy('month', 'asc')->get();
        $sites = \App\Site::all();

        $salesgraph = new \App\Salesgraph;

        $salesgraphs = \App\Salesgraph::orderBy('month', 'asc')->get();

        list($salesyears, $years) = $salesgraph->createYear($salesgraphs);

        return view('sales.index', [
            'sales' => $sales,
            'years' => $years,
            'this_year' => $this_year,
            'sites' => $sites,
            'costs' => [],
            'cos' => 0,
            //'counts' => $counts,
        ]);
    }

    public function operatingYear()
    {
        $sales = \App\Salesgraph::where('operating_cost', '<>', '0')->orderBy('month', 'asc')->get();
        $sites = \App\Site::all();

        $salesgraph = new \App\Salesgraph;

        list($salesyears, $years, $max) = $salesgraph->createYear($sales);

        //dd($salesyears, $years);

        return view('sales.year', [
            'sales' => $sales,
            'years' => $years,
            'salesyears' => $salesyears,
            'max' => $max,
        ]);
    }

    public function operatingMonth(Request $request)
    {
        if ($request->site == 0) {
            $sales = \App\Salesgraph::where('month', 'like', "%$request->year%")->where('operating_cost', '<>', '0')->orderBy('month', 'asc')->get();
            $sites = \App\Site::all();
        } else if ($request->site != 0) {
            $sales = \App\Salesgraph::where('month', 'like', "%$request->year%")->where('site_id', "$request->site")->where('operating_cost', '<>', '0')->orderBy('month', 'asc')->get();
            $sites = \App\Site::all();
        }

        $salesgraph = new \App\Salesgraph;

        $salesgraphs = \App\Salesgraph::orderBy('month', 'asc')->get();

        list($salesyears, $years) = $salesgraph->createYear($salesgraphs);

        $this_year = $request->year;
        $cos = $request->site;

        return view('sales.index', [
            'sales' => $sales,
            'years' => $years,
            'this_year' => $this_year,
            'sites' => $sites,
            'costs' => [],
            'cos' => $cos,
            //'counts' => $counts,
        ]);
    }

    public function sponser()
    {
        $dt = new Carbon();
        $this_year = $dt->year;

        $sales = \App\Salesgraph::where('month', 'like', "%$this_year%")->where('sponserc', '<>', null)->orderBy('month', 'asc')->get();
        $costomers = \App\Costomer::all();

        $salesgraph = new \App\Salesgraph;

        $salesgraphs = \App\Salesgraph::orderBy('month', 'asc')->get();

        list($salesyears, $years) = $salesgraph->createYear($salesgraphs);

        return view('sales.index', [
            'sales' => $sales,
            'years' => $years,
            'this_year' => $this_year,
            'costomers' => $costomers,
            'costs' => [],
            'cos' => 0,
            //'counts' => $counts,
        ]);
    }

    public function sponserYear()
    {

        $sales = \App\Salesgraph::where('sponserc', '<>', null)->orderBy('month', 'asc')->get();

        $salesgraph = new \App\Salesgraph;

        list($salesyears, $years, $max) = $salesgraph->createYear($sales);

        //dd($salesyears, $years);

        return view('sales.year', [
            'sales' => $sales,
            'years' => $years,
            'salesyears' => $salesyears,
            'max' => $max,
        ]);
    }

    public function sponserMonth(Request $request)
    {
        if ($request->costomer == 0) {
            $sales = \App\Salesgraph::where('month', 'like', "%$request->year%")->where('sponserc', '<>', '0')->orderBy('month', 'asc')->get();
            $costomers = \App\Costomer::all();
        } else if ($request->costomer != 0) {
            $salesgraphs = \App\Salesgraph::where('month', 'like', "%$request->year%")->where('payment_id', '<>', 'null')->where('sponserc', '<>', '0')->orderBy('month', 'asc')->get();
            foreach ($salesgraphs as $salesgraph) {
                if ($salesgraph->payment->sponser->costomer->id == $request->costomer) {
                    $sales[] = $salesgraph;
                }
            }
            $costomers = \App\Costomer::all();
        }

        $salesgraph = new \App\Salesgraph;

        $salesgraphs = \App\Salesgraph::orderBy('month', 'asc')->get();

        list($salesyears, $years) = $salesgraph->createYear($salesgraphs);

        $this_year = $request->year;
        $cos = $request->site;

        return view('sales.index', [
            'sales' => $sales,
            'years' => $years,
            'this_year' => $this_year,
            'costomers' => $costomers,
            'costs' => [],
            'cos' => $cos,
        ]);
    }

    public function addition()
    {
        $dt = new Carbon();
        $this_year = $dt->year;

        $sales = \App\Salesgraph::where('month', 'like', "%$this_year%")->where('additionc', '<>', null)->orderBy('month', 'asc')->get();
        $sites = \App\Site::all();

        $salesgraph = new \App\Salesgraph;

        $salesgraphs = \App\Salesgraph::orderBy('month', 'asc')->get();

        list($salesyears, $years) = $salesgraph->createYear($salesgraphs);

        return view('sales.index', [
            'sales' => $sales,
            'years' => $years,
            'this_year' => $this_year,
            'sites' => $sites,
            'costs' => [],
            'cos' => 0,
        ]);
    }

    public function additionYear()
    {

        $sales = \App\Salesgraph::where('additionc', '<>', null)->orderBy('month', 'asc')->get();

        $salesgraph = new \App\Salesgraph;

        list($salesyears, $years, $max) = $salesgraph->createYear($sales);

        //dd($salesyears, $years);

        return view('sales.year', [
            'sales' => $sales,
            'years' => $years,
            'salesyears' => $salesyears,
            'max' => $max,
        ]);
    }

    public function additionMonth(Request $request)
    {
        if ($request->site == 0) {
            $sales = \App\Salesgraph::where('month', 'like', "%$request->year%")->where('additionc', '<>', '0')->orderBy('month', 'asc')->get();
            $sites = \App\Site::all();
        } else if ($request->site != 0) {
            $salesgraphs = \App\Salesgraph::where('month', 'like', "%$request->year%")->where('addition_id', '<>', 'null')->where('additionc', '<>', '0')->orderBy('month', 'asc')->get();
            foreach ($salesgraphs as $salesgraph) {
                if ($salesgraph->addition->site->id == $request->site) {
                    $sales[] = $salesgraph;
                }
            }
            $sites = \App\Site::all();
        }

        $salesgraph = new \App\Salesgraph;

        $salesgraphs = \App\Salesgraph::orderBy('month', 'asc')->get();

        list($salesyears, $years) = $salesgraph->createYear($salesgraphs);

        $this_year = $request->year;
        $cos = $request->site;

        return view('sales.index', [
            'sales' => $sales,
            'years' => $years,
            'this_year' => $this_year,
            'sites' => $sites,
            'costs' => [],
            'cos' => $cos,
            //'counts' => $counts,
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

        $salesgraph->createDate($request, $id);

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

        $salesgraph->updateDate($request, $id);

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

    public function additionIndex($id)
    {
        $site = \App\Site::find($id);
        $additions = $site->additions()->orderBy('additions.day')->get();

        return view('sales.addition', [
            'site' => $site,
            'additions' => $additions
        ]);
    }

    public function additionCreate(Request $request, $id)
    {
        $site = \App\Site::find($id);

        $site->additions()->create([
            'day' => $request->day,
            'cost' => $request->cost,
            'content' => $request->content,
        ]);

        $additions = \App\Addition::get();

        $aid = 0;

        foreach ($additions as $addition) {
            if ($aid < $addition->id) {
                $aid = $addition->id;
            }
        }

        $salesgraph = new \App\Salesgraph;

        $salesgraph->createAddition($request, $aid);

        return redirect()->route('sales.addition_index', ['id' => $id]);
    }

    public function additionEdit($id)
    {
        $addition = \App\Addition::find($id);
        $site = \App\Site::find($addition->site_id);

        return view('sales.addition_edit', [
            'site' => $site,
            'addition' => $addition
        ]);
    }

    public function additionUpdate(Request $request, $id)
    {
        $addition = \App\Addition::find($id);

        $addition->day = $request->day;
        $addition->cost = $request->cost;
        $addition->content = $request->content;

        $addition->save();

        $m = new Carbon($request->day);

        $month = $m->format('Y-m');

        $salesgraph = \App\salesgraph::where('addition_id', "$id")->firstOrFail();

        $salesgraph->month = $month;
        $salesgraph->additionc = $request->cost;
        $salesgraph->sum_cost = $request->cost;

        $salesgraph->save();

        return redirect()->route('sales.addition_index', ['id' => $addition->site_id]);
    }

    public function additionDestroy($id)
    {
        $salesgraph = \App\Salesgraph::where('addition_id', "$id")->firstOrFail();

        $salesgraph->delete();

        $addition = \App\Addition::find($id);
        $id = $addition->site_id;

        $addition->delete();

        return redirect()->route('sales.addition_index', ['id' => $id]);
    }
}
