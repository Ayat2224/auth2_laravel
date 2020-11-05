<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Testimonial;
use Redirect;
use Validator;
use App\Http\Requests\TestimonialsValidate;

class TestimonialController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
       $arrTestimonials =  Testimonial::all();
       return view('backend.testimonials.index',compact('arrTestimonials'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('backend.testimonials.create');

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(TestimonialsValidate $request)
    {
        //
        $objTestimonial = new Testimonial();
        $objTestimonial->name = $request->name;
        $objTestimonial->description = $request->description;
        $objTestimonial->position = $request->position;

        $photo="";
        $photo = $request->photo;
        $photo_name = time().".".$photo->getClientOriginalExtension();
        $destination = "images/testimonials_photos";
        $photo->move($destination,$photo_name);
        $objTestimonial->photo = $destination."/".$photo_name;
        
        $objTestimonial->save();
        return Redirect::back()->with('sucessMSG', 'Testimonial Added Succesfully !');
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
        $objTestimonial = Testimonial::findOrFail($id);
        return view('backend.testimonials.show',compact('objTestimonial'));
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
        $objTestimonial = Testimonial::findOrFail($id);
        return view('backend.testimonials.edit',compact('objTestimonial'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(TestimonialsValidate $request, $id)
    {
        //
        $objTestimonial = Testimonial::findOrFail($id);

        $objTestimonial->name = $request->name;
        $objTestimonial->description = $request->description;
        $objTestimonial->position = $request->position;

        if($request->hasFile('photo')){
            $photo = $request->photo;
            $photo_name = time().".".$photo->getClientOriginalExtension();
            $destination = "images/testimonials_photos";
            $photo->move($destination,$photo_name);
            $objTestimonial->photo = $destination."/".$photo_name;
        }
        $objTestimonial->save();

        return Redirect::back()->with('sucessMSG', 'Testimonial Updated Succesfully !');
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
        Testimonial::findOrFail($id)->delete();
        return Redirect::back()->with('sucessMSG', 'Testimonial Deleted Succesfully !');
    }
}
