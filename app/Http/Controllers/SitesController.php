<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Carbon;

class SitesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $sites = \App\Site::all();
        
        return view('sites.index',[
            'sites' => $sites,
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $costomers = \App\Costomer::all();
        
        return view('sites.create',[
            'costomers' => $costomers,
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $rules = [
            'costomer_id' => ['required'],
        ];
        
        $id = $request->costomer_id;
        
        //$costomer = \App\Costomer::find($id);
        $costomer = \App\Costomer::findOrFail($id);
        
        $costomer->sites()->create([
            'name' => $request->name,
            'url' => $request->url,
            'contract_day' => $request->contract_day,
            'inside_staff' => $request->inside_staff,
            'outside_staff' => $request->outside_staff,
            'start' => $request->start,
            'open' => $request->open,
            'production_cost' => $request->production_cost,
            'operating_cost' => $request->operating_cost,
            'sponsor_cost' => $request->sponsor_cost,
            'costomer_id' => $request->costomer_id,
        ]);
        
        //\App\Site::create($request->all());
        
        return redirect()->route('sites.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $site = \App\Site::find($id);
        
        return view('sites.show',['site' => $site]);
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
        $costomers = \App\Costomer::all();
        
        return view('sites.edit', [
            'site' => $site,
            'costomers' => $costomers,
            ]);
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
        $site = \App\Site::findOrFail($id);
        
        $site->name = $request->name;
        $site->url = $request->url;
        $site->contract_day = $request->contract_day;
        $site->inside_staff = $request->inside_staff;
        $site->outside_staff = $request->outside_staff;
        $site->start = $request->start;
        $site->open = $request->open;
        $site->production_cost = $request->production_cost;
        $site->operating_cost = $request->operating_cost;
        $site->sponsor_cost = $request->sponsor_cost;
        $site->costomer_id = $request->costomer_id;
        
        $site->save();
        
        return redirect()->route('sites.show', ['site' => $id]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $site = \App\Site::findOrFail($id);
        
        $site->delete();
        
        return redirect()->route('sites.index');
    }
    
    public function pv_index($id){
        
        $site = \App\Site::find($id);
        $pvs = \App\Pv::all();
        
        $pvs = $site->pvs()->get();
        
        $data = [
                'site' => $site,
                'pvs' => $pvs,
            ];
        
        return view('sites.pv', $data);
    }
    
    public function pv_store(Request $request, $id){
        $rules = [
            'day' => ['required'],
            'pv' => ['required'],
        ];
        
        $site = \App\Site::find($id);
        
        $site->pvs()->create([
            'day' => $request->day,
            'pv' => $request->pv,
        ]);
        
        return redirect()->route('sites.pv', ['id' => $id]);
    }
}
