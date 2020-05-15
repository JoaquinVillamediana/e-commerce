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





class SubController extends Controller {

    public function index($id) {

        $aProducts = DB::select('   SELECT p.*,
        MIN(i.image) image
   FROM products p
LEFT JOIN images i ON p.id = i.product_id
where i.deleted_at is null
and p.subcategory_id = "'.$id.'"
and p.deleted_at is  null
GROUP BY p.id');
        
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
        
        $scategory_name = SubModel::select('sub_categories.name')
        ->where('id','=',$id)
        ->first();

        return view('frontend/sub.index',compact('aCategories','aSubCategories','aProducts','scategory_name'));
    }

    public function show() {
        //
    }
    

}
