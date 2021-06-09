<?php

namespace App\Http\Controllers;

use App\Models\Event;
use Illuminate\Http\Request;

class EventController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $events = Event::all();
        return response()->json( $events, 200);

        // $data = [
        //     [
        //         'title' => 'The Title', // a property!
        //         'start' => '2021-06-01', // a property!
        //         'end' => '2021-06-31' // a property! ** see important note below about 'end' **

        //     ],
        //     [
        //         'title' => 'The Title', // a property!
        //         'start' => '2021-06-01', // a property!
        //         'end' => '2021-06-31' // a property! ** see important note below about 'end' **
        //     ],
        // ];

        // return response()->json($data, 200);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
        // return response()->json($request, 200);

        $event = new Event;
        $event->name = $request->event_name;
        $event->from = $request->from;
        $event->to = $request->to;
        $event->days = $request->days;
        $event->save();
        return response()->json(['status' => 'sucess', 'message' => 'Successfuly save.'], 200);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Event  $event
     * @return \Illuminate\Http\Response
     */
    public function show(Event $event)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Event  $event
     * @return \Illuminate\Http\Response
     */
    public function edit(Event $event)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Event  $event
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Event $event)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Event  $event
     * @return \Illuminate\Http\Response
     */
    public function destroy(Event $event)
    {
        //
    }
}
