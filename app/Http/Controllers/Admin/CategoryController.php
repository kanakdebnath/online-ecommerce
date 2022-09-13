<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Models\Admin\Category;
use App\Http\Controllers\Controller;
use Intervention\Image\Facades\Image;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $categories = Category::all();

        return view('admin.category.index',compact('categories'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.category.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $model = new Category;
        $model->name = $request->name;
        $model->status = $request->status;

        if($request->hasFile('photo')){
            $file = $request->file('photo');
            $ext = $file->extension() ?:'png';
            $photo = Str::random(10) . '.' .$ext;

            // For Resize Image
            $resize = Image::make($file->getRealPath());
            $resize->resize(38,38);

            $path = public_path().'/uploads/category/';
            $resize->save($path.'/'.$photo);

            $model->icon = $photo;

        }
        $model->save();

        return redirect()->route('admin.category.index')->with('messege','Category Create Successfully');
        

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
        $category = Category::findOrFail($id);
        return view('admin.category.edit',compact('category'));
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
        
        $model = Category::findOrFail($id);
        if ($model) {
            $model->name = $request->name;
            $model->status = $request->status;
    
            if($request->hasFile('photo')){
                $file = $request->file('photo');
                $ext = $file->extension() ?:'png';
                $photo = Str::random(10) . '.' .$ext;
    
                // For Resize Image
                $resize = Image::make($file->getRealPath());
                $resize->resize(38,38);

                // Old FIle Deleted 
                if ($request->old_icon) {
                    $path = public_path().'/uploads/category/'.$request->old_icon;
                    unlink($path);
                }
    
                $path = public_path().'/uploads/category/';
                $resize->save($path.'/'.$photo);
    
                $model->icon = $photo;
    
            }
            $model->save();

            return redirect()->route('admin.category.index');
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function delete($id)
    {

        $model = Category::findOrFail($id);
        if($model){
            if ($model->icon) {
                $path = public_path().'/uploads/category/'.$model->icon;
                unlink($path);
            }

            $model->delete();
            return redirect()->route('admin.category.index');
        }
    }

    public function getcategory(){
        
    }
}
