<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use DateTime;
use App\Mail\TestMail;
use Illuminate\Support\Facades\Mail;

class SchedulesController extends Controller
{
    public function home()
    {
        $data = [];
        if (\Auth::check()) {
            $user = \Auth::user();

            $day = new DateTime();
            $d1 = $day->format('Y-m-d');

            $schedules = $user->schedules()->where('day', 'like', '%' . $d1 . '%')->latest()->get();

            $data = [
                'user' => $user,
                'schedules' => $schedules,
            ];
        }

        return view('welcome', $data);
    }

    public function homeMonth()
    {
        $data = [];
        if (\Auth::check()) {
            $user = \Auth::user();

            $day = new DateTime();
            $d1 = $day->format('Y-m');

            $schedules = $user->schedules()->where('day', 'like', '%' . $d1 . '%')->latest()->get();

            $data = [
                'user' => $user,
                'schedules' => $schedules,
            ];
        }

        return view('welcome', $data);
    }

    public function homeNext()
    {
        $data = [];
        if (\Auth::check()) {
            $user = \Auth::user();

            $day = new DateTime();
            $d1 = $day->modify('first day of next month')->format('Y-m');

            $schedules = $user->schedules()->where('day', 'like', '%' . $d1 . '%')->latest()->get();

            $data = [
                'user' => $user,
                'schedules' => $schedules,
            ];
        }

        return view('welcome', $data);
    }

    public function index()
    {
        $data = [];
        if (\Auth::check()) {
            $user = \Auth::user();
            //$schedules = $user->schedules()->oderBy('created_at', 'desc');
            //$schedules = $user->schedules()->latest()->get();
            $schedules = [];

            $sches = \App\Schedule::all();
            $uid = $user->id;

            foreach ($sches as $sche) {
                $sid = $sche->user_id;

                if ($sid == $uid || $sid == null) {
                    $schedules[] = $sche;
                }
            }
            //dd($schedules);

            $data = [
                'user' => $user,
                'schedules' => $schedules,
            ];
        }

        return view('schedules.index', $data);
    }

    public function show($id)
    {

        $schedule = \App\Schedule::find($id);

        return view('schedules.show', ['schedule' => $schedule]);
    }

    public function create()
    {
        $costomers = \App\Costomer::all();

        return view('schedules.create', [
            'costomers' => $costomers,
        ]);
    }

    public function store(Request $request)
    {

        $request->validate([
            'day' => 'required',
            'title' => 'required',
            'content' => 'required',
            'reminder' => 'required',
        ]);

        $id = $request->costomer_id;

        if ($id != null) {
            $costomer = \App\Costomer::find($id);
            $costomer->schedules()->create([
                'costomer_id' => $request->costomer_id,
                'day' => $request->day,
                'title' => $request->title,
                'content' => $request->content,
                'reminder' => $request->reminder,
                'term' => $request->term,
            ]);
        } else {
            $request->user()->schedules()->create([
                'day' => $request->day,
                'title' => $request->title,
                'content' => $request->content,
                'reminder' => $request->reminder,
            ]);
        }

        return redirect()->route('schedules.index');
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'day' => 'required',
            'title' => 'required',
            'content' => 'required',
            'reminder' => 'required',
        ]);

        $schedule = \App\Schedule::findOrFail($id);

        $schedule->day = $request->day;
        $schedule->title = $request->title;
        $schedule->content = $request->content;
        $schedule->reminder = $request->reminder;
        $schedule->term = $request->term;

        $schedule->save();

        return redirect()->route('schedules.show', ['id' => $id]);
    }

    public function destroy($id)
    {
        $schedule = \App\Schedule::findOrFail($id);

        if (\Auth::id() === (int)$schedule->user_id) {
            $schedule->delete();
        }

        return redirect()->route('schedules.index');
    }

    public function edit($id)
    {
        $schedule = \App\Schedule::findOrFail($id);

        $day = Carbon::parse($schedule->day)->format('Y-m-d\TH:i');

        return view('schedules.edit', [
            'schedule' => $schedule,
            'day' => $day,
        ]);
    }

    public function status($id, $status)
    {
        $schedule = \App\Schedule::findOrFail($id);

        if ($status == 0) {
            $schedule->status = 1;
            $schedule->save();
        } else if ($status == 1) {
            $schedule->status = 0;
            $schedule->save();
        }

        return back();
    }

    public function document($id, $document)
    {
        $schedule = \App\Schedule::findOrFail($id);

        if ($document == 0) {
            $schedule->document = 1;
            $schedule->save();
        } else if ($document == 1) {
            $schedule->document = 0;
            $schedule->save();
        }

        return back();
    }

    public function reminder($id, $reminder)
    {
        $schedule = \App\Schedule::findOrFail($id);

        if ($reminder == 0) {
            $schedule->reminder = 1;
            $schedule->save();
        } else if ($reminder == 1) {
            $schedule->reminder = 0;
            $schedule->save();
        }

        return back();
    }
}
