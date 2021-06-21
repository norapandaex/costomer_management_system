<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use DateTime;

class ProceedingController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index($id)
    {
        $costomer = \App\Costomer::find($id);

        $proceedings = $costomer->proceedings()->orderBy('proceedings.day')->get();

        $data = [
            'costomer' => $costomer,
            'proceedings' => $proceedings,
        ];

        return view('proceedings.index', $data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create($id)
    {
        $costomers = \App\Costomer::all();
        $costomer = \App\Costomer::find($id);

        return view('proceedings.create', [
            'costomer' => $costomer,
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
        $request->validate([
            'day' => 'required',
            'content' => 'required',
        ]);

        $id = $request->costomer;

        $costomer = \App\Costomer::find($id);


        $costomer->proceedings()->create([
            'day' => $request->day,
            'content' => $request->content,
        ]);

        return redirect()->route('proceedings.index', ['id' => $id]);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $proceeding = \App\Proceeding::find($id);

        return view('proceedings.show', ['proceeding' => $proceeding]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $proceeding = \App\Proceeding::find($id);

        $day = Carbon::parse($proceeding->day)->format('Y-m-d\TH:i');

        return view('proceedings.edit', [
            'proceeding' => $proceeding,
            'day' => $day,
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
        $request->validate([
            'day' => 'required',
            'content' => 'required',
        ]);

        $proceeding = \App\Proceeding::findOrFail($id);

        $proceeding->day = $request->day;
        $proceeding->content = $request->content;

        $proceeding->save();

        return redirect()->route('proceedings.show', ['id' => $id]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $proceeding = \App\Proceeding::findOrFail($id);

        $id = $proceeding->costomer_id;

        $proceeding->delete();

        return redirect()->route('proceedings.index', ['id' => $id]);
    }
}
