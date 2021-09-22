<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Carbon\Carbon;

class CostsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $costs = \App\Cost::all();

        return view('costs.index', ['costs' => $costs]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('costs.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $cost = new \App\Cost;

        // $cost->day = $request->day;
        // $cost->cost = $request->cost;
        // $cost->content = $request->content;

        $cost->create([
            'day' => $request->day,
            'cost' => $request->cost,
            'content' => $request->content,
        ]);

        $costs = \App\Cost::get();

        $cid = 0;

        foreach ($costs as $cost1) {
            if ($cid < $cost1->id) {
                $cid = $cost1->id;
            }
        }

        $salesgraph = new \App\Salesgraph;

        $salesgraph->create_cost($request, $cid);

        return redirect()->route('costs.index');
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
        $cost = \App\Cost::find($id);

        return view('costs.edit', ['cost' => $cost]);
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
        $cost = \App\Cost::find($id);

        $cost->day = $request->day;
        $cost->cost = $request->cost;
        $cost->content = $request->content;

        $cost->save();

        $salesgraph = \App\Salesgraph::where('cost_id', $id)->firstOrFail();;

        $m = new Carbon($request->day);

        $month = $m->format('Y-m');

        $salesgraph->month = $month;
        $salesgraph->costc = $request->cost;

        $salesgraph->save();

        return redirect()->route('costs.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $cost = \App\Cost::find($id);

        $cost->delete();

        return redirect()->route('costs.index');
    }
}
