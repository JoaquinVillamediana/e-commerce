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
            'slider_image' => 'required|max:10240|mimes:jpeg,png,jpg,gif'
            
           
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

        $data=array('image' => $storeImageName, 'name' => $request['name'],'description' => $request['description'],'created_at' => now() ,'updated_at' => now());
        SliderModel::insert($data);

        return redirect()->route('slider.index')->with('success', 'Slider actualizado satisfactoriamente');
    }

    public function show($id) {
        //
    }

    public function edit($id) {
      //  $aObj = CategoriesModel::select('title','id')->get();
        $oCate = CategoriesModel::find($id);
       // $aProvinces = ProvincesModel::get();
        return view('admin/categories.edit', compact('oCate'));
    }

    public function update(Request $request, $id) {
        
        $aValidations = array(
            
            'name' => 'required|max:60',
            'description' => 'required|max:150'
                   );

        
       

        $this->validate($request, $aValidations);

        $oCate = CategoriesModel::find($id);
          
        $request['name'] = ucwords($request['name']);
        $request['description'] = ucwords($request['description']);

if(!empty($request['prom'])){
    $request['prom'] = ucwords($request['prom']);
    $oCate->prom = $request['prom'];
}

        
        $oCate->name = $request['name'];
        $oCate->description = $request['description'];
               
        $oCate->save();

        return redirect()->route('categories.index')->with('success', 'Categoria actualizada satisfactoriamente');
    }

    public function destroy($id) {

        CategoriesModel::find($id)->delete();

        return redirect()->route('categories.index')->with('success', 'Categoria eliminada satisfactoriamente');
    }

    public function setCategoryVisible(Request $request){
        $aReturn = array();
        $oCategory = CategoriesModel::find($request['categoryId']);

        if (empty($oCategory->visible)) {
            $oCategory->visible = 1;
            $oCategory->visible_at = date('Y-m-d H:i:s');
        } else {
            $oCategory->visible = 0;
        }

        $oCategory->save();

        $aReturn['categoryId'] = $request['categoryId'];
        $aReturn['visible'] = $oCategory->visible;

        echo json_encode($aReturn);
    }
   

}
