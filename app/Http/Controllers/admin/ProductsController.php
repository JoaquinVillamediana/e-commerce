<?php

namespace App\Http\Controllers\admin;
use App\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use DB;
use App\Models\ProductsModel;
use App\Models\CategoriesModel;


class ProductsController extends Controller {

    public function index() {
        $aProducts = ProductsModel::select('products.*','categories.name as category_name','sub_categories.name as subcategory_name')->leftjoin('categories','products.category_id','=','categories.id')->leftjoin('sub_categories','products.subcategory_id','=','sub_categories.id')->get();
        return view('admin/products.index',compact('aProducts'));
    }

    public function create() {
        $aCategories = CategoriesModel::get();
        return view('admin/products.create',compact('aCategories'));
    }

    public function store(Request $request) {

        $aValidations = array(
            
            'name' => 'required|max:60',
            'description' => 'required|max:150',
            'price' => 'required|numeric',
            'stock' => 'required|numeric',
            'category_id' => 'required|numeric',
           
        );

        

        $this->validate($request, $aValidations);

        $request['name'] = ucwords($request['name']);
        
        $request['description'] = ucwords($request['description']);
     
        ProductsModel::create($request->all());

        return redirect()->route('products.index')->with('success', 'Catgorias actualizado satisfactoriamente');
    }

    public function show($id) {
        //
    }

    public function edit($id) {
        $oProduct = ProductsModel::where('id',$id)->first();
        $aCategories = CategoriesModel::get();
        return view('admin/products.edit', compact('oProduct','aCategories'));
    }

    public function update(Request $request, $id) {
        
        $aValidations = array(
            
            'name' => 'required|max:60',
            'description' => 'required|max:150',
            'price' => 'required|numeric',
            'stock' => 'required|numeric',
            'category_id' => 'required|numeric',
           
        );

        
        if(!empty($request['subcategory_id']))
        {
            $aValidations['subcategory_id'] = 'numeric'; 
        }

        $this->validate($request, $aValidations);

        $oProduct = ProductsModel::find($id);
          
        $request['name'] = ucwords($request['name']);
        $request['description'] = ucwords($request['description']);

        $oProduct->name = $request['name'];
        $oProduct->description = $request['description'];
        if(!empty($request['subcategory_id']))
        {
        $oProduct->subcategory_id = $request['subcategory_id'];
        }else{
            $oProduct->subcategory_id = null;
        }
        $oProduct->price = $request['price'];
        $oProduct->stock = $request['stock'];
        $oProduct->category_id = $request['category_id'];
        $oProduct->save();

        return redirect()->route('products.index')->with('success', 'Registro actualizado satisfactoriamente');
    }

    public function destroy($id) {

        ProductsModel::find($id)->delete();

        return redirect()->route('products.index')->with('success', 'Registro eliminado satisfactoriamente');
    }

}
