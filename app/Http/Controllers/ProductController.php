<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;
use stdClass;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     */
  
        public function index(Request $request)
        {
            $page_title = 'Product';
            $info=new stdClass();
            $info->title = 'Products';
            $info->first_button_title = 'Add Product';
            $info->first_button_route = 'admin.products.create';
            $info->route_index = 'admin.products.index';
            $info->description = 'These all are Products';
    
    
            $with_data=[];
    
            $data = Product::query();
    
            // if(isset($request->search_table) && trim($request->search_table)!=''){
            //     $search_columns = ['id','name','price','discount'];
            //     $data=advanceSearch(
            //         $searh_key=$request->search_table,
            //         $columns_array=$search_columns,
            //         $model_query=$data
            //     );
            // }
    
    
    
            // if($request->export_table)
            // {
            //     $filePath='Products.csv';
            //     $export_data=$data->get();
            //     $excel_data=new ProductExport($export_data);
            //     return Excel::download($excel_data, $filePath);
            // }
            
            $data =$data->orderBy('id', 'DESC');
            $data =$data->paginate(15);
    
            return view('products.index', compact('page_title', 'data', 'info'))->with($with_data);
    
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
