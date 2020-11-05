<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\CategoryGallery;
use App\Models\Gallery;
use Redirect;
use App\Http\Requests\CategoryGalleryValidate;


class CategoryGalleryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $arrCategoryGallery =CategoryGallery::all();
        return view('backend.categorygallery.index',compact('arrCategoryGallery'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('backend.categorygallery.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(CategoryGalleryValidate $request)
    {
        CategoryGallery::create($request->all());
        return Redirect::back()->with('sucessMSG','Category Gallery Added Successfully !');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $objCategoryGallery = CategoryGallery::findOrFail($id);
        return view('backend.categorygallery.show',compact('objCategoryGallery'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $objCategoryGallery = categorygallery::findOrFail($id);
        return view('backend.categorygallery.edit',compact('objCategoryGallery'));
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
        $objCategoryGallery = categorygallery::findOrFail($id);
        $objCategoryGallery ->update($request -> all());
        return Redirect::back()->with('sucessMSG', 'Category Gallery Updated Succesfully !');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        categorygallery::findOrFail($id)->delete();
        return Redirect::back()->with('sucessMSG','Main Category  deleted  Successfully !');
    }




    public function GalleryPhotos($cat_id)
    {
        $objCategoryGallery = categorygallery::find($cat_id);
        $arrGalleryPhoto = $objCategoryGallery->Gallery;
        return view('backend.categorygallery.galleryphoto',compact('cat_id','arrGalleryPhoto'));
    }

    public function StoreGalleryPhotos (Request $request , $cat_id)
    {
        $rules = $request->validate([
            'image' => 'required|mimes:jpeg,bmp,png',
        ]);
        $objGalleryPhoto = new Gallery();
        $objGalleryPhoto->cat_id = $cat_id;
       
        $image = $request->image;
        $image_name = time().".".$image->getClientOriginalExtension();
        $destination = "images/gallerys";
        $image->move($destination,$image_name);

        $objGalleryPhoto->image = $destination."/".$image_name;
        $objGalleryPhoto->save();

        return Redirect::back()->with('sucessMSG', 'Gallery Added Succesfully !');

    }

    public function DestroyGalleryPhotos($gallery_id)
    {
        //
        Gallery::findOrFail($gallery_id)->delete();
        return Redirect::back()->with('sucessMSG', 'Gallery Deleted Succesfully !');
    }
}
