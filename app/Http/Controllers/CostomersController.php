<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Carbon\Carbon;

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
        return view('costomers.index', [
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

        $costomers->name = $request->team_name;
        $costomers->relation = $request->relation;
        $costomers->category = $request->category;
        $costomers->staff = $request->staff;
        $costomers->mystaff = $request->mystaff;
        $costomers->address = $request->address;
        $costomers->prefecture = $request->prefecture;
        $costomers->city = $request->city;
        $costomers->other = $request->other;
        $costomers->email = $request->email;
        $costomers->tel = $request->tel;
        //$costomers->contract = $request->contract;
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

        $sites = $costomer->sites;

        $sponsers = \App\Sponser::where('costomer_id', "$id")->get();

        return view('costomers.show', ['costomer' => $costomer, 'sites' => $sites, 'count' => count($sponsers),]);
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

        $costomer->name = $request->team_name;
        $costomer->rank = $request->rank;
        $costomer->relation = $request->relation;
        $costomer->category = $request->category;
        $costomer->staff = $request->staff;
        $costomer->mystaff = $request->mystaff;
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

    public function meeting($id)
    {
        $costomer = \App\Costomer::findOrFail($id);
        $schedules = [];

        $sches = \App\Schedule::all();

        foreach ($sches as $sche) {
            $cid = $sche->costomer_id;

            if ($cid == $id) {
                $schedules[] = $sche;
            }
        }

        return view('costomers.meeting', ['schedules' => $schedules, 'costomer' => $costomer]);
    }


    public function sponserIndex($id)
    {
        $costomer = \App\Costomer::find($id);

        $sponsers = \App\Sponser::where('costomer_id', "$id")->get();

        $data = [
            'costomer' => $costomer,
            'sponsers' => $sponsers,
        ];

        return view('costomers.sponser', $data);
    }

    public function sponserCreate($id)
    {
        $costomer = \App\Costomer::find($id);

        $data = [
            'costomer' => $costomer,
        ];

        return view('costomers.sponser_create', $data);
    }

    public function sponserStore(Request $request, $id)
    {
        $request->validate([
            'name' => 'required',
        ]);

        $costomer = \App\Costomer::find($id);

        $costomer->sponsers()->create([
            'name' => $request->name,
            'cost' => $request->cost,
            'rate' => $request->rate,
            'start' => $request->start,
            'stop' => $request->stop,
        ]);

        return redirect()->route('costomers.sponser', ['id' => $costomer]);
    }

    public function sponserShow($id)
    {
        $sponser = \App\Sponser::find($id);

        $payments = \App\Payment::where('sponser_id', "$id")->get();

        $sum = 0;

        if (count($payments) != 0) {
            foreach ($payments as $payment) {
                $sum = $sum + $payment->amount;
            }
        }

        $data = [
            'sponser' => $sponser,
            'sum' => $sum,
        ];

        return view('costomers.sponser_show', $data);
    }

    public function sponserEdit($id, $costomer)
    {
        $sponser = \App\Sponser::find($id);

        $data = [
            'sponser' => $sponser,
            'id' => $costomer,
        ];

        return view('costomers.sponser_edit', $data);
    }

    public function sponserUpdate(Request $request, $id)
    {
        $sponser = \App\Sponser::find($id);

        $sponser->name = $request->name;
        $sponser->cost = $request->cost;
        $sponser->rate = $request->rate;
        $sponser->start = $request->start;
        $sponser->stop = $request->stop;

        $sponser->save();

        return redirect()->route('costomers.sponser_show', ['id' => $id]);
    }

    public function sponserDestroy($id)
    {
        $sponser = \App\Sponser::findOrFail($id);

        $id = $sponser->costomer_id;

        $sponser->delete();

        return redirect()->route('costomers.sponser', ['id' => $id]);
    }

    public function paymentIndex($id)
    {
        $sponser = \App\Sponser::findOrFail($id);

        $payments = \App\Payment::where('sponser_id', "$sponser->id")->orderBy('day', 'asc')->get();

        return view('costomers.payment', ['sponser' => $sponser, 'payments' => $payments]);
    }

    public function paymentStore(Request $request, $id)
    {
        $request->validate([
            'day' => 'required',
            'amount' => 'required',
        ]);

        $sponser = \App\Sponser::findOrFail($id);

        $sponser->payments()->create([
            'day' => $request->day,
            'amount' => $request->amount,
        ]);

        $payments = \App\Payment::get();

        $pid = 0;

        foreach ($payments as $payment) {
            if ($pid < $payment->id) {
                $pid = $payment->id;
            }
        }

        $salesgraph = new \App\Salesgraph;

        $salesgraph->create_sponser($request, $pid);

        return redirect()->route('costomers.payment', ['id' => $id]);
    }

    public function paymentEdit($id)
    {
        $payment = \App\Payment::findOrFail($id);

        return view('costomers.payment_edit', ['payment' => $payment]);
    }

    public function paymentUpdate(Request $request, $id)
    {
        $payment = \App\Payment::findOrFail($id);

        $payment->day = $request->day;
        $payment->amount = $request->amount;

        $payment->save();

        $m = new Carbon($request->day);

        $month = $m->format('Y-m');

        $salesgraph = \App\salesgraph::where('payment_id', "$id")->firstOrFail();

        $salesgraph->month = $month;
        $salesgraph->sponserc = $request->amount;
        $salesgraph->sum_cost = $request->amount;

        $salesgraph->save();

        return redirect()->route('costomers.payment', ['id' => $payment->sponser_id]);
    }

    public function paymentDestroy($id, $sponser)
    {
        $salesgraph = \App\salesgraph::where('payment_id', "$id")->firstOrFail();

        $salesgraph->delete();

        $payment = \App\Payment::findOrFail($id);

        $payment->delete();

        return redirect()->route('costomers.payment', ['id' => $sponser]);
    }
}
