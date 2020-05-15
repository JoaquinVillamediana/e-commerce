<?php

namespace App\Http\Controllers\admin;
use App\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use DB;
use Illuminate\Support\MessageBag;
use Auth;
use Hash;
use App\Models\ProductsModel;
use App\Models\ImageModel;
use App\Models\CategoriesModel;


class ProductsController extends Controller {

    public function index() {
        $aProducts = ProductsModel::select('products.*','categories.name as category_name','sub_categories.name as subcategory_name')->leftjoin('categories','products.category_id','=','categories.id')->leftjoin('sub_categories','products.subcategory_id','=','sub_categories.id')->get();
        return view('admin/products.index',compact('aProducts'));
    }

    public function create() {
        $aCategories = CategoriesModel::get();
        $aImage = ImageModel::get();
        return view('admin/products.create',compact('aCategories','aImage'));
    }

    public function store(Request $request) {

        $aValidations = array(
            
            'name' => 'required|max:60',
            'news' => 'required|max:60',
            'description' => 'required|max:150',
            'price' => 'required|numeric',
            'stock' => 'required|numeric',
            'category_id' => 'required|numeric',
           
        );

        

        $this->validate($request, $aValidations);

        $request['name'] = ucwords($request['name']);

        if(!empty($request['news'])){
            $request['news'] = ucwords($request['news']);

        }
else{
    $request['news'] = ucwords($request['news']);


}

        $request['description'] = ucwords($request['description']);
        ProductsModel::create($request->all());         
        $product_id = ProductsModel::max('id');
        return redirect()->route('indexImages' , $product_id);
    }
    

    public function show($id) {
        //
    }

    public function edit($id) {
        $oProduct = ProductsModel::where('id',$id)->first();
        
        $aCategories = CategoriesModel::get();
        $aImages  = ImageModel::where('product_id',$id)->get();
     
        return view('admin/products.edit', compact('oProduct','aCategories', 'aImages'));
    }

    public function update(Request $request, $id) {
        
        $aValidations = array(
            
            'name' => 'required|max:60',
              
            'news' => 'required|max:60',
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
        $request['news'] = ucwords($request['news']);
        $request['description'] = ucwords($request['description']);

        $oProduct->name = $request['name'];

        if(!empty($request['news'])){
            $oProduct->news = $request['news'];

        }
else{
    $oProduct->news= $request['news'];


}

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

        return redirect()->back();
    }

    public function destroy($id) {

        ProductsModel::find($id)->delete();

        return redirect()->route('products.index')->with('success', 'Registro eliminado satisfactoriamente');
    }

    public function addImage(Request $request)
    {



        $aValidations = array(
            'image' => 'required|max:10240|mimes:jpeg,png,jpg,gif,mp4'
        );

        $this->validate($request , $aValidations);

        if (!empty($request['image'])) {

            $image = $request['image'];
            $fileName = $image->getClientOriginalName();
            $storeImageName = uniqid(rand(0, 1000), true) . "-" . $fileName;
            $fileExtension = $image->getClientOriginalExtension();
            $realPath = $image->getRealPath();
            $fileSize = $image->getSize();
            $fileMimeType = $image->getMimeType();
            $product_id = $request['product_id'];

            $destinationPath = 'uploads/products';
            $image->move($destinationPath, $storeImageName);

            $data=array('image' => $storeImageName,'product_id' => $product_id);
            ImageModel::insert($data);
            
            
        }

        return redirect()->back()->with('product_id' , $product_id);
    	
    }
    
    public function indexImages($product_id)
    {
        $aImages = ImageModel::select('images.*','products.name as product_name')
        ->leftjoin('products','products.id','=','images.product_id')
        ->where('product_id','=',$product_id)
        ->get();
        return view('admin/products.image',compact('aImages'))->with('product_id',$product_id);
    }
    
    public function deleteImage($id)
    {
        ImageModel::find($id)->delete();
        return redirect()->back();
    }




}
