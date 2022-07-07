<?php

namespace App\Http\Controllers;
use App\Models\Permissions;
use Illuminate\Http\Request;

class PermissionController extends Controller
{
    //
    public function index()
    {
        $permissions = \App\Models\Permission::all();
        return view('permission.index', compact('permissions')); 
    }
}
