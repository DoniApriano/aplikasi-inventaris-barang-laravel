<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\Role;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AdminController extends Controller
{
    public function index()
    {
        $name = Auth::user()->name;
        $role = Auth::user()->role->name;
        return view("page.dashboard", compact(['name', 'role']));
    }

    public function employeePage()
    {
        $name = Auth::user()->name;
        $role = Auth::user()->role->name;

        $roleToFind = 'Employee';
        $roleId = Role::where('name', $roleToFind)->first();

        $employees = User::where('role_id', $roleId->id)->where('id','!=', Auth::user()->id )->orderBy('created_at','ASC')->get();

        return view("page.employee", compact(['name', 'role', 'employees']));
    }


    public function employeeCreate(Request $request)
    {
        $this->validate($request, [
            'name' => 'required',
            'username' => 'required|min:3',
            'password' => 'required|min:8|max:14',
            'address' => 'required',
            'phone_number' => 'required|numeric',
        ]);

        $roleToFind = 'Employee';
        $roleId = Role::where('name', $roleToFind)->first();

        User::create([
            'name' => $request->name,
            'username' => $request->username,
            'password' => $request->password,
            'address' => $request->address,
            'phone_number' => $request->phone_number,
            'role_id' => $roleId->id
        ]);

        return redirect()->route('Admin.employeePage')->with('success','Berhasil menambah data petugas');
    }
    public function employeeUpdate(Request $request, $id)
    {
        $this->validate($request, [
            'name_update' => 'required',
            'address_update' => 'required',
            'phone_number_update' => 'required|numeric',
        ]);

        $roleToFind = 'Employee';
        $roleId = Role::where('name', $roleToFind)->first();

        $user = User::findOrFail($id);
        $user->update([
            'name' => $request->name_update,
            'address' => $request->address_update,
            'phone_number' => $request->phone_number_update,
            'role_id' => $roleId->id
        ]);

        return redirect()->route('Admin.employeePage')->with('success','Berhasil ubah data petugas');
    }

    public function employeeDelete($id)
    {
        $user = User::findOrFail($id);
        $user->delete();

        return redirect()->route('Admin.employeePage')->with('success','Berhasil hapus data petugas');
    }
}
