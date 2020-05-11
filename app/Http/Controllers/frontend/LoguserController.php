<?php

namespace App\Http\Controllers\frontend;
use App\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use DB;

class LoguserController extends Controller {

    public function index() {

        return view('frontend/login.index');
    }

    public function create() {
        return view('admin/user.create');
    }

    

}
