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





class FavoritesController extends Controller {

    public function index() {
    

        $user=Auth::user()->id;

        $aProducts = DB::select('   SELECT p.*,
        MIN(i.image) image
        FROM products p
        LEFT JOIN images i ON p.id = i.product_id
         LEFT JOIN favoritos c ON p.id = c.product_id 
        where i.deleted_at is null
       and  c.user_id = "'.$user.'"
        and p.deleted_at is  null
        and p.visible = 1
        and c.status = 1
        GROUP BY c.id');

      

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
        
        return view('frontend/carrito.index',compact('aCategories','aSubCategories','aProducts'));
    }

    public function show() {
        //
    }
    public function store($id){
        $user=Auth::user()->id;
        $aProducts = DB::select('   SELECT p.*,
        MIN(i.image) image
        FROM products p
        LEFT JOIN images i ON p.id = i.product_id
        where i.deleted_at is null
       
        and p.deleted_at is  null
        and p.visible = 1
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


        $aCarrito = DB::select('SELECT id, COUNT(*) AS count_carrito FROM carrito WHERE user_id = "'.$user.'" and product_id =  "'.$id.'"  GROUP BY id;');

        $aFavoritos = DB::select('SELECT id, COUNT(*) AS count_fav FROM favoritos WHERE user_id = "'.$user.'" and product_id =  "'.$id.'"  GROUP BY id;');
        
                DB::insert('insert into carrito (product_id, user_id) values ("'.$id.'", "'.$user.'")');
                return view('frontend/product.index',compact('aCategories','aSubCategories','aProducts','aCarrito','aFavoritos'));
              //  return view('frontend/carrito.index',compact('aCategories','aSubCategories','aProducts'));
            }



            public function addfavoritos($id){
                $user=Auth::user()->id;
                $aProducts = DB::select('   SELECT p.*,
                MIN(i.image) image
                FROM products p
                LEFT JOIN images i ON p.id = i.product_id
                where i.deleted_at is null
                and p.subcategory_id = "'.$id.'"
                and p.deleted_at is  null
                and p.visible = 1
                GROUP BY p.id');
        
                $aCarrito = DB::select('SELECT id, COUNT(*) AS count_carrito FROM carrito WHERE user_id = "'.$user.'" and product_id =  "'.$id.'"  GROUP BY id;');
              
        
                $aFavoritos = DB::select('SELECT id, COUNT(*) AS count_fav FROM favoritos WHERE user_id = "'.$user.'" and product_id =  "'.$id.'"  GROUP BY id;');
        
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
                
                        DB::insert('insert into favoritos (product_id, user_id,status) values ("'.$id.'", "'.$user.'",1)');
                        return back()->withInput();
            }

            public function deleteFav($id){
                $user=Auth::user()->id;

                DB::delete('delete from carrito where product_id = "'.$id.'" and user_id = "'.$user.'"');
                return back()->withInput();
            }
            
    

}
