<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Category;
use App\Models\Subcategory;
use App\Http\Requests\CategoryValidate;
use Redirect;
use Validator;
use DB;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
       $arrCategories =  Category::all();
       return view('backend.categories.index',compact('arrCategories'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('backend.categories.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(CategoryValidate $request)
    {
        //
        Category::create($request->all());
        return Redirect::back()->with('sucessMSG','Category Added Successfully !');
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
        $objCategory = Category::findOrFail($id);
        return view('backend.categories.show',compact('objCategory'));
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
        $objCategory = Category::findOrFail($id);
        return view('backend.categories.edit',compact('objCategory'));

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(CategoryValidate $request, $id)
    {
        //
        $objCategory=Category::findOrFail($id);
        $objCategory->update($request->all());
        return Redirect::back()->with('sucessMSG','Category updated Added Successfully !');
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
        Category::findOrFail($id)->delete();
        return Redirect::back()->with('sucessMSG','Category deleted Added Successfully !');
    }

    public function SubCategory($categorie_id)
    {

        $objSubCategory = Category::find($categorie_id);
        $arrSubCategories = $objSubCategory->Subcategories;
        return view('backend.categories.subcategories',compact('categorie_id','arrSubCategories'));  
    }

    public function StoreSubCategory (request $request,$categorie_id)
    {
       
        // $objSubCategory= new Subcategory();

        // $objSubCategory->categorie_id=$categorie_id;
        // $objSubCategory->name=$request->name;
        // $objSubCategory->save();
        Subcategory::create($request->all());
        //return  $request;
        return Redirect::back()->with('sucessMSG', 'SubCategory Added Succesfully !');

    }
    public function DestroySubCategory($id)
    {
        //
        SubCategory::findOrFail($id)->delete();
        return Redirect::back()->with('sucessMSG', 'SubCategory Deleted Succesfully !');
    }
}
