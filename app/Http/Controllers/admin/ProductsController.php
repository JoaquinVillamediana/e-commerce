<?php

namespace App\Http\Controllers\admin;
use App\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use DB;
use Illuminate\Support\MessageBag;
use Auth;
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
            'image' => 'required|max:10240|mimes:jpeg,png,jpg,gif',
            'news' => 'required|max:150'
           
        );

        //$aProducts = ProductsModel::where('name',Auth::user()->name)->get()

        $this->validate($request, $aValidations);

         $request['name'] = ucwords($request['name']);
         $name = $request['name'];

        $request['description'] = ucwords($request['description']);
        $description=$request['description'];

        $request['price'] = ucwords($request['price']);
        $price=$request['price'];

        $request['stock'] = ucwords($request['stock']);
        $stock=$request['stock'];
        $request['news'] = ucwords($request['news']);
        $news=$request['news'];


        // $request['category_id'] = ucwords($request['category_id']);
        // $category_id=$request['category_id'];

        // $request['subcategory_id'] = ucwords($request['subcategory_id']);
        // $subcategory_id=$request['subcategory_id'];


        if (!empty($request['image'])) {

            $image = $request['image'];
            $fileName = $image->getClientOriginalName();
            $storeImageName = uniqid(rand(0, 1000), true) . "-" . $fileName;
            $fileExtension = $image->getClientOriginalExtension();
            $realPath = $image->getRealPath();
            $fileSize = $image->getSize();
            $fileMimeType = $image->getMimeType();
            
            $destinationPath = 'uploads/products';
            $image->move($destinationPath, $storeImageName);
          
           
            
        }
       

        $aData = array('name' => $name , 'subcategory_id' =>  $request['subcategory_id'] ,'news' =>  $request['news'] , 'category_id' =>$request['category_id'] ,'image' => $storeImageName,'description' => $description, 'stock' => $stock, 'price' => $price);
        
         DB::table('products')->insert($aData);
     
        //ProductsModel::create($request->all());

        return redirect()->route('products.index')->with('success', 'Productos actualizado satisfactoriamente');
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
            'image' => 'required|max:10240|mimes:jpeg,png,jpg,gif',
            'news' => 'required|max:150'
           
        );

        
        if(!empty($request['subcategory_id']))
        {
            $aValidations['subcategory_id'] = 'numeric'; 
        }

        $this->validate($request, $aValidations);

        $oProduct = ProductsModel::find($id);
          
        $request['name'] = ucwords($request['name']);
        $request['description'] = ucwords($request['description']);
        $request['news'] = ucwords($request['news']);

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
        $oProduct->news = $request['news'];
        $oProduct->category_id = $request['category_id'];
        $oProduct->save();

        return redirect()->route('products.index')->with('success', 'Registro actualizado satisfactoriamente');
    }

    public function destroy($id) {

        ProductsModel::find($id)->delete();

        return redirect()->route('products.index')->with('success', 'Registro eliminado satisfactoriamente');
    }

}
