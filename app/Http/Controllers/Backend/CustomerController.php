<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CustomerController extends Controller
{
    public function customerDashboard(Request $request , $name){
        $user  = User::where('name',$name)->firstOrFail();
        if(Auth::id() !== $user->id){
            abort(403);
        }
        return view('layouts.backend.customer.dashboard', compact('user'));
    }
}
