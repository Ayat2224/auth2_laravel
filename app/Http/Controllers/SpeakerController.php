<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use App\Models\Speaker;
use App\Models\Event;
use App\Models\EventSpeaker;
use Redirect;
use Validator;
use App\Http\Requests\StoreSpeakers;

class SpeakerController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
       $arrspeakers =  Speaker::all();
       return view('backend.speakers.index',compact('arrspeakers'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('backend.speakers.create');

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreSpeakers $request)
    {
        //
        Speaker::create($request->all());
        return Redirect::back()->with('sucessMSG','Speaker Added Successfully !');
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
        $objSpeaker = Speaker::findOrFail($id);
        return view('backend.speakers.show',compact('objSpeaker'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
        $objSpeaker = Speaker::findOrFail($id);
        return view('backend.speakers.edit',compact('objSpeaker'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(StoreSpeakers $request, $id)
    {
        //
        $objSpeaker=Speaker::findOrFail($id);
        $objSpeaker->update($request->all());
        return Redirect::back()->with('sucessMSG','Speaker updated Added Successfully !');
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
        Speaker::findOrFail($id)->delete();
        return Redirect::back()->with('sucessMSG','Speaker deleted Added Successfully !');
    }
    public function EventSpeakers($speaker_id)
    {
        // show all speeaker depending on event
        $objSpeaker = Speaker::find($speaker_id);
        $arrEventsSpeakers = $objSpeaker->Events; 

        $arrevents = Event::all();

        return view('backend.speakers.events_speakers',compact('objSpeaker','arrEventsSpeakers','arrevents','speaker_id'));
    }

    public function StoreEventSpeakers(request $request)
    {
        EventSpeaker::create($request->all());
        return Redirect::back()->with('sucessMSG', 'Event Speaker Added Succesfully !');
    }

    public function DestroyEventSpeakers ($event_id,$speaker_id)
    {
        EventSpeaker::where('event_id',$event_id)
        ->where('speaker_id',$speaker_id)->first()->delete();

        return Redirect::back()->with('sucessMSG', 'Event Speaker Deleted Succesfully !');
    }
}
