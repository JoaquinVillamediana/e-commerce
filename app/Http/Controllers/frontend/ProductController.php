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

        $aProducts = ProductsModel::where('products.id', '=', $id)
        ->get();

        return view('frontend/product.product',compact('aProducts'));
    }

    public function show() {
        //
    }
    

}
