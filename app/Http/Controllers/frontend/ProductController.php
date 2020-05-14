<?php

namespace App\Http\Controllers\frontend;
use App\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\CategoriesModel;
use App\Models\ProductsModel;
use App\Models\SubModel;
use DB;







use Illuminate\Support\MessageBag;
use Auth;
use Hash;

use App\Models\ImageModel;





class ProductController extends Controller {

    public function index() {

        $aCategories = CategoriesModel::select('categories.*', DB::raw('count(sub_categories.id)  as quantity_sub'))->leftjoin('sub_categories','categories.id','=','sub_categories.category_id')
        ->where('categories.visible', '=', '1')
        ->groupBy('categories.id')
        ->get();
        $aSubCategories = SubModel::where('sub_categories.visible' ,'=', '1')
        ->get();

        $aProducts = ProductsModel::where('products.id', '=', '1')
        ->get();

        return view('frontend/product.product',compact('aCategories','aSubCategories','aProducts'));
    }

    public function show() {
        //
    }
    

}
