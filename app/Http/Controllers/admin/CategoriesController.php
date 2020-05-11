<?php

namespace App\Http\Controllers\admin;
use App\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use DB;
use App\Models\ProvincesModel;
use App\Models\CategoriesModel;
use App\Models\ObjectivesModel;

class CategoriesController extends Controller {

    public function index() {

        $aCategories = CategoriesModel::get();
        
        return view('admin/categories.index',compact('aCategories'));
    }

    public function create() {
        // $aProvinces = ProvincesModel::get();
        // $aObj = ObjectivesModel::select('title','id')->get();

        // $aCategories = CategoriesModel::get();
        return view('admin/categories.create');
    }

    public function store(Request $request) {

        $aValidations = array(
            
            'name' => 'required|max:60',
            'description' => 'required|max:150'
            
           
        );

        

        $this->validate($request, $aValidations);

        $userEmail = CategoriesModel::where('name', $request['name'])->first();

        if (!empty($userEmail->id)) {

            $error = \Illuminate\Validation\ValidationException::withMessages([
                        'duplicated_name_error' => ['DUPLICATED CATEGORIE']
            ]);

            throw $error;
        }   

    
        $request['name'] = ucwords($request['name']);
        
        $request['description'] = ucwords($request['description']);
           
        CategoriesModel::create($request->all());

        return redirect()->route('categories.index')->with('success', 'Catgorias actualizado satisfactoriamente');
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
        $request['news'] = ucwords($request['news']);
        $oCate->name = $request['name'];
        $oCate->description = $request['description'];
               
        $oCate->save();

        return redirect()->route('categories.index')->with('success', 'Categoria actualizada satisfactoriamente');
    }

    public function destroy($id) {

        CategoriesModel::find($id)->delete();

        return redirect()->route('categories.index')->with('success', 'Categoria eliminada satisfactoriamente');
    }

   

}
