<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Role;
use Illuminate\Http\Request;

class RoleController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $role=Role::all();
        return response()->json([
            'roles'=>$role
        ]);
    }



    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'name'=>['required']
        ]);

        $role=new Role();
        $role->name=$request->name;

        $role->save();

        return response()->json([
            'role'=>$role
        ]);
    }

    /**
     * Display the specified resource.
     */
    public function show(Role $role)
    {

        return response()->json([
            'role'=>$role
        ]);
    }



    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request,Role $role)
    {
        $request->validate([
            'name'=>['required']
        ]);


        $role->name=$request->name;

        $role->save();

        return response()->json([
            'role'=>$role
        ]);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Role $role)
    {
        $role->delete();
        return response()->json([
            'role'=>$role
        ]);
    }
}
