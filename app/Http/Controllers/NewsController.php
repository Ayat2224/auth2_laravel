<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\NewsValidate
use App\Models\News;
use Redirect;
use Validator;
use DB;

class NewsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
       $arrNews =  Category::all();
       return view('backend.news.index',compact('arrNews'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('backend.news.create');

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(NewsValidate $request)
    {
        //
        News::create($request->all());
        return Redirect::back()->with('sucessMSG','News Added Successfully !');
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
        $objNews = News::findOrFail($id);
        return view('backend.news.show',compact('objNews'));

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
        $objNews = Category::findOrFail($id);
        return view('backend.news.edit',compact('objNews'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(NewsValidate $request, $id)
    {
        //
        $objNews=News::findOrFail($id);
        $objNews->update($request->all());
        return Redirect::back()->with('sucessMSG','News updated Added Successfully !');
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
        News::findOrFail($id)->delete();
        return Redirect::back()->with('sucessMSG','News deleted Added Successfully !');
    }
}
