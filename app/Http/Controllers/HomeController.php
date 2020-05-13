<?php

namespace App\Http\Controllers;
use App\Models\CategoriesModel;
use App\Models\ProductsModel;
use Illuminate\Http\Request;
use App\Models\SubModel;
use DB;
class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        // $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $aCategories = CategoriesModel::select('categories.*', DB::raw('count(sub_categories.id)  as quantity_sub'))->leftjoin('sub_categories','categories.id','=','sub_categories.category_id')
        ->where('categories.visible', '=', '1')
        ->groupBy('categories.id')
        ->get();
        $aSubCategories = SubModel::where('sub_categories.visible' ,'=', '1')
        ->get();


        $aProducts = ProductsModel::where('products.news', '=', '1')
        ->get();
       

        return view('frontend/home.index',compact('aCategories','aSubCategories','aProducts'));
    }
}
