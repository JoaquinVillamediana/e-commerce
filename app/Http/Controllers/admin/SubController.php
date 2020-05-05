<?php
namespace App\Http\Controllers\admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\SubModel;
use App\Models\ProductsModel;
use App\Models\CategoriesModel;

use Auth;
use App\User;
use DB;
class SubController extends Controller{

    public function index(){

        $aSub = SubModel::get();
        return view('admin/sub.index',compact('aSub'));
    }

  
    public function create() {
        
        // $aProvinces = ProvincesModel::get();
        // $aObj = ObjectivesModel::select('title','id')->get();
        // $aCategories = CategoriesModel::get();
        return view('admin/sub.create');
    }

    public function store(Request $request) {

        $aValidations = array(
            
            'name' => 'required|max:60',
            'description' => 'required|max:150',
            'category_id' => 'required|max:60'
           
        );

        

        $this->validate($request, $aValidations);

        $userEmail = SubModel::where('name', $request['name'])->first();

        if (!empty($userEmail->id)) {

            $error = \Illuminate\Validation\ValidationException::withMessages([
                        'duplicated_name_error' => ['DUPLICATED CATEGORIE']
            ]);

            throw $error;
        }   

    
        $request['name'] = ucwords($request['name']);
        
        $request['description'] = ucwords($request['description']);
        $request['category_id'] = ucwords($request['category_id']);
     
        SubModel::create($request->all());

        return redirect()->route('sub.index')->with('success', 'SubCatgorias actualizado satisfactoriamente');
    }

    public function show($id) {
        //
    }

    public function edit($id) {
        $aObj = ObjectivesModel::select('title','id')->get();
        $oUser = User::find($id);
        $aProvinces = ProvincesModel::get();
        return view('admin/user.edit', compact('oUser','aObj','aProvinces'));
    }

    public function update(Request $request, $id) {
        
        $aValidations = array(
            'type' => 'required',
            'name' => 'required|max:60',
            'last_name' => 'required|max:60',
            'email' => 'required|email|max:60',

            'dir' => 'required|max:60',
            'phone' => 'required|numeric',
            'province_id' => 'numeric'
        );

        if(!empty($request['city_id']))
        {
            $aValidations['city_id'] = 'numeric'; 
        }
        
        $this->validate($request, $aValidations);

        $userEmail = User::where('email', $request['email'])->where('id', '!=', $id)->first();

        if (!empty($userEmail->id)) {

            $error = \Illuminate\Validation\ValidationException::withMessages([
                        'duplicated_email_error' => ['DUPLICATED USER']
            ]);

            throw $error;
        }

        $request['name'] = ucwords($request['name']);

        $oUser = User::find($id);

        if (!empty($request['password'])) {

            $this->validate(
                    $request, [
                        'password' => 'required|min:8|max:32'
                    ]
            );

            $request['password'] = bcrypt($request['password']);
        } else {
            $request['password'] = $oUser->password;
        }
          
        $request['password'] = bcrypt($request['password']);
        $request['name'] = ucwords($request['name']);
        $request['last_name'] = ucwords($request['last_name']);
        $request['dir'] = ucwords($request['dir']);
        $request['business_name'] = ucwords($request['business_name']);
        $oUser->name = $request['name'];
        $oUser->last_name = $request['last_name'];
        $oUser->password = $request['password'];
        $oUser->email = $request['email'];
        $oUser->province_id = $request['province_id'];
        if(!empty($request['city_id']))
        {
        $oUser->city_id = $request['city_id'];
        }else{
            $oUser->city_id = null;
        }
        $oUser->dir = $request['dir'];
        $oUser->phone = $request['phone'];
        $oUser->business_name = $request['business_name'];
        $oUser->objective_id = $request['objective_id'];
        $oUser->save();

        return redirect()->route('user.index')->with('success', 'Registro actualizado satisfactoriamente');
    }

    public function destroy($id) {

        User::find($id)->delete();

        return redirect()->route('user.index')->with('success', 'Registro eliminado satisfactoriamente');
    }
    

}
















?>