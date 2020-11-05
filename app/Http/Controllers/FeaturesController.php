<?php
namespace App\Http\Controllers;

 

use Illuminate\Http\Request;
use App\Models\Feature;
use Redirect;
use App\Http\Requests\FeatureValidate;

 

class FeaturesController extends Controller
{
     /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $arrFeatures =  Feature::all();
        return view('backend.features.index',compact('arrFeatures'));
    }

 

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('backend.features.create');
    }

 

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(FeatureValidate $request)
    {
        Feature::create($request->all());
        return Redirect::back()->with('sucessMSG', 'Feature Added Succesfully !');
    }

 

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $objFeatures = Feature::findOrFail($id);
        return view('backend.features.show',compact('objFeatures'));
    }

 

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $objFeatures = Feature::findOrFail($id);
        return view('backend.features.edit',compact('objFeatures'));
    }

 

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(FeatureValidate $request, $id)
    {
        $objFeatures = Feature::findOrFail($id);
        $objFeatures->update($request->all());

 

        return Redirect::back()->with('sucessMSG', 'Feature Updated Succesfully !');
    }

 

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Feature::findOrFail($id)->delete();
        return Redirect::back()->with('sucessMSG', 'Feature Deleted Succesfully !');
    }
}

 

 

 

 


 
