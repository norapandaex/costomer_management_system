<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class CostomersController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $costomers = \App\Costomer::all();
        return view('costomers.index',[
            'costomers' => $costomers,
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('costomers.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'team_name' => 'required',
        ]);
        
        $costomers = new \App\Costomer;
        
        $costomers->team_name = $request->team_name;
        $costomers->relation = $request->relation;
        $costomers->category = $request->category;
        $costomers->staff = $request->staff;
        $costomers->address = $request->address;
        $costomers->prefecture = $request->prefecture;
        $costomers->city = $request->city;
        $costomers->other = $request->other;
        $costomers->email = $request->email;
        $costomers->tel = $request->tel;
        $costomers->save();
        
            
        return redirect()->route('costomers.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $costomer = \App\Costomer::find($id);
        
        return view('costomers.show', ['costomer' => $costomer]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $costomer = \App\Costomer::find($id);
        
        return view('costomers.edit', ['costomer' => $costomer]);
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
            'team_name' => 'required',
        ]);
        
        $costomer = \App\Costomer::findOrFail($id);
        
        $costomer->team_name = $request->team_name;
        $costomer->relation = $request->relation;
        $costomer->category = $request->category;
        $costomer->staff = $request->staff;
        $costomer->address = $request->address;
        $costomer->prefecture = $request->prefecture;
        $costomer->city = $request->city;
        $costomer->other = $request->other;
        $costomer->email = $request->email;
        $costomer->tel = $request->tel;
        
        $costomer->save();
            
        return redirect()->route('costomers.show', ['costomer' => $costomer]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $costomer = \App\Costomer::findOrFail($id);
        
        $costomer->delete();
        
        return redirect()->route('costomers.index');
    }
}
