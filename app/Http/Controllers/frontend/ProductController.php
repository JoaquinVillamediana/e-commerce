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

    public function index($id) {

        $aProducts = ProductsModel::where('id','=',$id)->get();
        
        $aCategories = DB::select('SELECT  categoriess.*, COUNT(sub_categoriess.id) AS countsub, COUNT(case sub_categoriess.visible when 1 then 1 else null end) AS countvis
        FROM    categories categoriess
        LEFT JOIN
                sub_categories sub_categoriess
        ON      sub_categoriess.category_id = categoriess.id
               
        WHERE   categoriess.visible = 1
              
        GROUP BY
                categoriess.id
        ');
        $aSubCategories = SubModel::where('sub_categories.visible' ,'=', '1')
        ->get();

        $aImage = ImageModel::select('images.image as image_dir')
        ->where('images.product_id', '=', $id)
        ->get();
       

        
        return view('frontend/product.index',compact('aCategories','aSubCategories','aProducts','aImage'));
    }

    public function show() {
        //
    }
    

}
