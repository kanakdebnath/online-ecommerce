<?php

namespace App\Http\Controllers\Admin;

use App\Models\Admin\Brand;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Models\Admin\Product;
use App\Models\Admin\Category;
use App\Http\Controllers\Controller;
use Intervention\Image\Facades\Image;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
       $models = Product::with('category','sub_category','brand','user')->get();
       return view('admin.product.index',compact('models'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $category = Category::where('status','active')->get();
        $brand = Brand::where('status','active')->get();
        return view('admin.product.create',compact('category','brand'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $model = new Product;
        $model->name = $request->name;
        $model->user_id = Auth()->user()->id;
        $model->category_id  = $request->category;
        $model->subcategory_id  = $request->sub_category;
        $model->brand_id  = $request->brand;
        $model->description  = $request->description;
        $model->short_description  = $request->short_description;
        $model->price  = $request->price;
        $model->discount  = $request->discount;
        $model->discount_type  = $request->discount_type;
        $model->stock  = $request->stock;
        $model->status  = $request->status;
        $model->meta_title  = $request->name;
        $model->meta_description  = $request->short_description;
        
        if($request->hasFile('photo')){
            $file = $request->file('photo');
            $ext = $file->extension() ?:'png';
            $photo = Str::random(10) . '.' .$ext;

            // For Resize Image
            $resize = Image::make($file->getRealPath());
            $resize->resize(1100,1100);

            $path = public_path().'/uploads/product/';
            $resize->save($path.'/'.$photo);

            $model->photo = $photo;
            $model->meta_photo = $photo;

        }

        $model->save();

        return redirect()->route('admin.product.index')->with('messege','Product Upload Successfully');
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
        //
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
    }
}
