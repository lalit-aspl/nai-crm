<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Inertia\Inertia;
class UserController extends Controller
{
    public function customer_index(Request $request)
    {
        return Inertia::render('Admin/User/Customer');
    }
}
