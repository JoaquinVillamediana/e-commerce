<?php

namespace App\Http\Controllers\frontend;
use App\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\CategoriesModel;
use App\Models\ProductsModel;
use App\Models\SubModel;
use App\Models\Model;
use DB;
use Illuminate\Support\MessageBag;
use Auth;
use Hash;

use App\Models\ImageModel;





class HistoryController extends Controller {

    public function index() {

        $aProducts = DB::select('   SELECT p.*,
        MIN(i.image) image,c.*
        FROM products p
        LEFT JOIN images i ON p.id = i.product_id
        LEFT JOIN history h ON p.name LIKE concat("%",h.search,"%") 
        LEFT JOIN categories c ON p.category_id = c.id
        where i.deleted_at is null
        and h.deleted_at is null
        and p.deleted_at is null
        and c.id = p.category_id
        and p.visible = 1
        and h.user_id = 1
        GROUP BY p.id');

      

        $aCategories = DB::select('SELECT  categoriess.*, COUNT(sub_categoriess.id) AS countsub, COUNT(case sub_categoriess.visible when 1 then 1 else null end) AS countvis
        FROM    categories categoriess
        LEFT JOIN
                sub_categories sub_categoriess
        ON      sub_categoriess.category_id = categoriess.id
               
        WHERE   categoriess.visible = 1 and
        categoriess.deleted_at is null and
        sub_categoriess.deleted_at is null

              
        GROUP BY
                categoriess.id
        ');
        $aSubCategories = SubModel::where('sub_categories.visible' ,'=', '1')
        ->get();
        
        return view('frontend/history.index',compact('aCategories','aSubCategories','aProducts'));
    }

    public function show() {
        //
    }
    

}
