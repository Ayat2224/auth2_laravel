<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use App\Models\Event;
use App\Models\Speaker;
use App\Models\EventSpeaker;
use App\Models\EventPhoto;
use App\Models\EventRegister;
use App\Models\EventRegistrations;
use Redirect;
use Validator;
use Mail;
use App\Http\Requests\StoreEvents;

class EventController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()//Request $request)
    {
        //
        //$objevent = new Event();
        $arrevents =  Event::all();
       return view('backend.events.index',compact('arrevents'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('backend.events.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreEvents $request)
    {
        //
        Event::create($request->all());
        return Redirect::back()->with('sucessMSG','Event Added Successfully !');
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
        $objEvent = Event::findOrFail($id);
        return view('backend.events.show',compact('objEvent'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $objEvent = Event::findOrFail($id);
        return view('backend.events.edit',compact('objEvent'));

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(StoreEvents $request, $id)
    {
        //
        $objEvent=Event::findOrFail($id);
        $objEvent->update($request->all());
        return Redirect::back()->with('sucessMSG','Evnt updated Added Successfully !');
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
        Event::findOrFail($id)->delete();
        return Redirect::back()->with('sucessMSG','Evnt deleted Added Successfully !');
    }
    public function EventSpeakers($event_id)
    {
        // show all speeaker depending on event
        $objEvent = Event::find($event_id);
        $arrEventSpeakers = $objEvent->Speakers; 

        $arrSpeakers = Speaker::all();

        return view('backend.events.event_speakers',compact('objEvent','arrEventSpeakers','arrSpeakers','event_id'));
    }

    public function StoreEventSpeakers(request $request)
    {
        EventSpeaker::create($request->all());
        return Redirect::back()->with('sucessMSG', 'Event Speaker Added Succesfully !');
    }

    public function DestroyEventSpeakers ($speaker_id,$event_id)
    {
        EventSpeaker::where('speaker_id',$speaker_id)
        ->where('event_id',$event_id)->first()->delete();

        return Redirect::back()->with('sucessMSG', 'Event Speaker Deleted Succesfully !');
    }
    public function EventPhotos($event_id)
    {

        $objEvent = Event::find($event_id);
        $arrEventPhotos = $objEvent->Photos;
        return view('backend.events.event_photos',compact('event_id','arrEventPhotos'));  
    }

    public function StoreEventPhotos (request $request , $event_id)
    {
        $rules = $request->validate([
            'image' => 'required|mimes:jpeg,bmp,png',
        ]);


        $objEventPhoto = new EventPhoto();
        $objEventPhoto->event_id = $event_id;
        $objEventPhoto->type = $request->type;

        
        $image = $request->image;
        $image_name = time().".".$image->getClientOriginalExtension();
        $destination = "images/event_photos";
        $image->move($destination,$image_name);

        $objEventPhoto->photo = $destination."/".$image_name;
        $objEventPhoto->save();

        return Redirect::back()->with('sucessMSG', 'Event Photo Added Succesfully !');

    }
    public function DestroyEventPhotos($id)
    {
        //
        EventPhoto::findOrFail($id)->delete();
        return Redirect::back()->with('sucessMSG', 'Event Photo Deleted Succesfully !');
    }
    public function EventRegistrations($event_id)
    {
        $objEvent = Event::findOrFail($event_id);
        $arrRegistrations = $objEvent->Registrations;
        return view('backend.events.event_registrations',compact('event_id','arrRegistrations'));
    }
    public function UpdateEventRegister($event_registrations_id,$status)
    {
        $objEventRegisterations = EventRegistrations::findOrFail($event_registrations_id);

        $objEventRegisterations->status = $status;

         
        $objEventRegisterations->save();  /// update

        

        # to send email with gmail 

        # 1- create gmail account 
        # 2- setting  >> security (https://myaccount.google.com/security?gar=1)
        #3- search for Less secure app access and turn it on 
        $data = array();
        $strEmail = $objEventRegisterations->email;
        $data['name'] = $objEventRegisterations->name;
        Mail::send('emails.accepted', $data, function ($message)use($strEmail) {
            $message->subject('Accepted Register');
            $message->from('mahmoud.ali.29992@gmail.com', 'Mahmoud ali');
            $message->to($strEmail);
        });

        return Redirect::back()->with('sucessMSG', 'Event Registration Updated Succesfully !');



    
    }

    // public function EventRegisterationEdit($event_registrations_id,$status)
    // {
    //     // $objEventRegisterations = EventRegisterations::findOrFail($event_registrations_id);

    //     // $objEventRegisterations->status = $status;

    //     // $objEventRegisterations->save();  /// update

    //     // return Redirect::back()->with('sucessMSG', 'Event Registration Updated Succesfully !');

    //     # to send email with gmail 

    //     # 1- create gmail account 
    //     # 2- setting  >> security (https://myaccount.google.com/security?gar=1)
    //     #3- search for Less secure app access and turn it on 
    //     $data = array();
    //     $strEmail = "aya.2224@gmail.com";
    //     Mail::send('emails.accepted_event_register', $data, function ($message)use($strEmail) {
    //         $message->subject('Accepted Register');
    //         $message->from('aya.2224@gmail.com', 'Mahmoud ali');
    //         $message->to($strEmail);
    //     });


    // }
 
}
