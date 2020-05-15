<?php

namespace App\Http\Controllers;
use App\Models\CategoriesModel;
use Illuminate\Http\Request;
use App\Models\SubModel;
use DB;
class HeaderController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
      $aCategories = CategoriesModel::select('categories.*', DB::raw('count(sub_categories.id)  as quantity_sub'), 'sub_categories.visible  as quantity_vis'))->leftjoin('sub_categories','categories.id','=','sub_categories.category_id')
      ->where('categories.visible', '=', '1')
      ->groupBy('categories.id')
      ->get();
      $aSubCategories = SubModel::where('sub_categories.visible' ,'=', '1')
      ->get();
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */

}
