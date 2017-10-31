<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Controllers\Admin\Users;

class AdminPagesController extends Controller
{
    public function index(){
        return view('admin.home');
    }

    public function showUserRegistrationForm(){
        return view('admin.users.registerUserForm');
    }

    public function showUserRemovalForm(){
        $function = new Users();
        $calling = $function->removeUsers();
        return view('admin.users.removeUserForm', ["function" => $calling]);
    }

    public function showAllUsers(){
        return view('admin.users.viewAllUsers');
    }

    public function showCycles(){
        return view('admin.users.showCycles');
    }

    public function showAllTransactionHistory(){
        return view('admin.users.showAllTransactionHistory');
    }

    public function showAllWallet(){
        return view('admin.users.showAllWallet');
    }
}
