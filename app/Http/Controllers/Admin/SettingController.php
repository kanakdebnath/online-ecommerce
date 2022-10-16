<?php

namespace App\Http\Controllers\Admin;

use Carbon\Carbon;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Models\Admin\Setting;
use App\Http\Controllers\Controller;
use Intervention\Image\Facades\Image;

class SettingController extends Controller
{
    public function general()
    {
        $settings = Setting::all();

        return view('admin.setting.general',compact('settings'));
    }

    public function logo()
    {
        $settings = Setting::all();

        return view('admin.setting.logo',compact('settings'));
    }


    public function store()
    {

        foreach ($_POST as $key => $value) {

            if($key == '_token'){
                continue;
            }

            $data = array();
            $data['value'] = $value;
            $data['updated_at'] = Carbon::now();

            if (Setting::where('name',$key)->exists()) {
                Setting::where('name', '=' ,$key)->update($data);
            }else{
                $data['name'] = $key;
                $data['created_at'] = Carbon::now();
                Setting::insert($data);
            }  
        }

        return redirect()->back();

    }


    public function store_logo(Request $request)
    {


        if ($request->hasFile('logo')) {

            $file = $request->file('logo');
            $ext = $file->extension() ?:'png';
            $photo = Str::random(10) . '.' .$ext;

            // For Resize Image
            $resize = Image::make($file->getRealPath());
            $resize->resize(38,38);

            $path = public_path().'/uploads/setting/';
            $resize->save($path.'/'.$photo);

            $logo['name'] = 'logo';
			$logo['value'] = $photo;

            //if file chnage then delete old one
			$oldFile = $request->get('oldLogo', '');
			if ($oldFile) {
                $path = public_path().'/uploads/setting/'.$oldFile;
                unlink($path);
            }

            
		} else {
			$logo['name'] = 'logo';
			$logo['value'] = $request->get('oldLogo', '');
		}


        if ($request->hasFile('favicon')) {

            $file = $request->file('favicon');
            $ext = $file->extension() ?:'png';
            $photo = Str::random(10) . '.' .$ext;

            // For Resize Image
            $resize = Image::make($file->getRealPath());
            $resize->resize(16,16);

            $path = public_path().'/uploads/setting/';
            $resize->save($path.'/'.$photo);

            $favicon['name'] = 'favicon';
			$favicon['value'] = $photo;

            //if file chnage then delete old one
			$oldFile = $request->get('oldFavicon', '');
			if ($oldFile) {
                $path = public_path().'/uploads/setting/'.$oldFile;
                unlink($path);
            }

            
		} else {
			$favicon['name'] = 'favicon';
			$favicon['value'] = $request->get('oldFavicon', '');
		}





		if (Setting::where('name', "logo")->exists()) {
			Setting::where('name', '=', "logo")->update($logo);
		} else {
			$logo['created_at'] = Carbon::now();
			Setting::insert($logo);
		}

		if (Setting::where('name', "favicon")->exists()) {
			Setting::where('name', '=', "favicon")->update($favicon);
		} else {
			$favicon['created_at'] = Carbon::now();
			Setting::insert($favicon);
		}


        return redirect()->back();

    }
}
