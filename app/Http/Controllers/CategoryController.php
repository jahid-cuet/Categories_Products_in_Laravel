<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;
use stdClass;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $page_title ='Category';
        $info=new stdClass();
        $info->title = 'Categories';
        $info->first_button_title = 'Add Category';
        $info->first_button_route = 'admin.categories.create';
        $info->route_index ='admin.categories.index';
        $info->description ='These all are Categories';

        $with_data=[];

        $data = Category::query();

        $data =$data->orderBy('id', 'DESC');
        $data =$data->get();

        return view('categories.index', compact('page_title', 'data', 'info'))->with($with_data);
        // return view('categories.index',compact('info'));

    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
