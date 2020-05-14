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





class CateController extends Controller {

    public function index($id) {

        $aProducts = ProductsModel::where('category_id','=',$id)->get();
        $category_name = CategoriesModel::select('categories.name')
        ->where('id','=',$id)
        ->first();

        $aCategories = CategoriesModel::select('categories.*', DB::raw('count(sub_categories.id)  as quantity_sub'))->leftjoin('sub_categories','categories.id','=','sub_categories.category_id')
        ->where('categories.visible', '=', '1')
        ->groupBy('categories.id')
        ->get();
        $aSubCategories = SubModel::where('sub_categories.visible' ,'=', '1')
        ->get();
        
        return view('frontend/cate.index',compact('aCategories','aSubCategories','aProducts','category_name'));
    }

    public function show() {
        //
    }
    

}
