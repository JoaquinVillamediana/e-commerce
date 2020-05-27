<?php

namespace App\Http\Controllers\admin;
use App\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use DB;

use App\Models\SliderModel;


class SliderController extends Controller {

    public function index() {

        $aSliders = SliderModel::get();
        
        return view('admin/slider.index',compact('aSliders'));
    }

    public function create() {

        return view('admin/slider.create');
    }

    public function store(Request $request) {
        
        $aValidations = array(
            
            'name' => 'required|max:45',
            'description' => 'required|max:45',
            'slider_image' => 'required|max:10240|mimes:jpeg,png,jpg,gif',
            'link' => 'max:255'
            
           
        );

        

        $this->validate($request, $aValidations);
    
        $request['name'] = ucwords($request['name']);
        
        $request['description'] = ucwords($request['description']);
           
        $image = $request['slider_image'];  

        $fileName = $image->getClientOriginalName();
        $storeImageName = uniqid(rand(0, 1000), true) . "-" . $fileName;
        $fileExtension = $image->getClientOriginalExtension();
        $realPath = $image->getRealPath();
        $fileSize = $image->getSize();
        $fileMimeType = $image->getMimeType();
        

        $destinationPath = 'uploads/slider';
        $image->move($destinationPath, $storeImageName);

        $data=array('link' => $request['link'],'image' => $storeImageName, 'name' => $request['name'],'description' => $request['description'],'created_at' => now() ,'updated_at' => now());
        SliderModel::insert($data);

        return redirect()->route('slider.index')->with('success', 'Slider actualizado satisfactoriamente');
    }

    public function show($id) {
        //
    }

    public function edit($id) {

    }

    public function update(Request $request, $id) {
  
    }

    public function destroy($id) {

        SliderModel::find($id)->delete();

        return redirect()->route('slider.index')->with('success', 'Categoria eliminada satisfactoriamente');
    }

   

}
