<?php

namespace App\Http\Controllers\frontend;
use App\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\CategoriesModel;
use App\Models\SubModel;
use DB;
use Sentinel;
use Mail;


class ForgotPasswordController extends Controller {

    public function forgot() {

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

        return view('frontend/login.resetpassword',compact('aCategories','aSubCategories'));
    }

    public function store(Request $request) {
        $aValidations = array(
            'phone' => 'required|max:25',
            'name' => 'required|max:60',
            'last_name' => 'required|max:60',
            'email' => 'required|email|max:60',
            'password' => 'required|min:8|max:32',
            'verif_password' => 'required|min:8|max:32',
        );

        

        $this->validate($request, $aValidations);

        $userEmail = User::where('email', $request['email'])->first();

        if (!empty($userEmail->id)) {

            $error = \Illuminate\Validation\ValidationException::withMessages([
                        'duplicated_email_error' => ['DUPLICATED USER']
            ]);

            throw $error;
        }   

        if($request['verif_password'] != $request['password'])
        {
            $error = \Illuminate\Validation\ValidationException::withMessages([
                'passowrd_not_equals' => ['INCORRECT PASSWORD']
            ]       );

            throw $error;
        }
        $request['password'] = bcrypt($request['password']);
        $request['name'] = ucwords($request['name']);
        $request['phone'] = ucwords($request['phone']);
        $request['last_name'] = ucwords($request['last_name']);

        User::create($request->all());

        $oUser = new User();
        

        $oUser->type = 2;
        $oUser->phone = $request['phone'];
        $oUser->email = $request['email'];
        $oUser->name = $request['name'];
        $oUser->last_name = $request['last_name'];
        $oUser->password = $request['password'];
        $oUser->save();

        return redirect()->route('home')->with('success', 'Usuario creado correctamente');
        
    }



    public function password(Request $request)
    {
       $user = User::whereEmail($request->email)->first();

       if(count($user) < 1)
       {
           return redirect()->back()->with(['error' => 'Email not exist']);
       } 

    $user = Sentinel::findById($user->id);
    $reminder = Reminder::exists($user) ? : Reminder::create($user);
    $this->sendEmail($user, $reminder->code);

    return redirect()->back()->with(['succes' => 'Reset code sent']);

      

    }
    

    public function sendEmail($user, $code)
    {
        Mail::send('email.forgot',
        [
          'user'  => $user, 'code'  => $code
        ],
        function($message) use ($user){
            $message->to($user->email);
            $message->subject(" $user->name", "reset your password");
        }
        );

    }

}
