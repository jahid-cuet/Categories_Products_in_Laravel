<?php

namespace App\Http\Controllers;

use App\Models\Category;
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
            $page_title = 'Product';
            $info=new stdClass();
            $info->title = 'Add Products';
            $info->first_button_title = 'All Product';
            $info->first_button_route = 'products.index';
            $info->form_route = 'products.store';
            $categories = Category::all();
            return view('products.create',compact('page_title','info','categories'));
        }
    

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
{
    $validatedData = $request->validate([
        'name' => 'required|string|max:255',
        'category_id' => 'required|exists:categories,id',
        'small_description' => 'required|string',
        'price' => 'required|numeric|between:0.01,999999.99',
        'image' => 'nullable|image|max:2048', // Allowing image files with a maximum size of 2MB
    ]);

    $product = new Product();
    $product->name = $validatedData['name'];
    $product->category_id = $validatedData['category_id'];
    $product->small_description = $validatedData['small_description'];
    $product->price = $validatedData['price'];

    if ($request->hasFile('image')) {
        $imageName = time() . '.' . $request->image->extension();
        $request->image->move(public_path('pro'), $imageName);
        $product->image = $imageName;
    }

    $product->save();

    // Redirect or return a response
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
        $page_title = 'Product';
        $info=new stdClass();
        $info->title = 'Products';
        $info->first_button_title = 'Add Product';
        $info->first_button_route = 'products.create';
        $info->second_button_title = 'All Product';
        $info->second_button_route = 'products.index';
        $info->form_route = 'products.update';
        $info->route_destroy = 'products.destroy';
        $categories = Category::all();
        $data=Product::where('id',$id)->first();

        return view('products.edit',compact('page_title','info','data','categories'))->with('id',$id);
    }

    /**
     * Update the specified resource in storage.
     */

    public function update(Request $request, string $id)
    {

    $validatedData = $request->validate([
        'name' => 'required|string|max:255',
        'category_id' => 'required|exists:categories,id',
        'small_description' => 'required|string',
        'price' => 'required|numeric|between:0.01,999999.99',
        'image' => 'nullable|image|max:2048', // Allowing image files with a maximum size of 2MB
    ]);

    $product = Product::findOrFail($id);
    $product->name = $validatedData['name'];
    $product->category_id = $validatedData['category_id'];
    $product->small_description = $validatedData['small_description'];
    $product->price = $validatedData['price'];

    if ($request->hasFile('image')) {
        $imageName = time() . '.' . $request->image->extension();
        $request->image->move(public_path('pro'), $imageName);
        $product->image = $imageName;
    }

    $product->save();
    echo "Updated";

    // return redirect()->route('products.index')->with('success', 'Product updated successfully.');
}
    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $row=Product::where('id',$id)->first();

        // if($row==null || $row=='')
        // {
        //     return back()->with('warning','Id not Found');
        // }


        // if($row['image']!='')
        // {
        //     FileManager::deleteFile($row['image']);
        // }
        
        $row->delete();
        
        echo "deleted";

    
}
    }
