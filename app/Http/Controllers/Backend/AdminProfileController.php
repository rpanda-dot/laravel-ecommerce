<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\Admin;
use Illuminate\Http\Request;

class AdminProfileController extends Controller
{
    public function adminProfile()
    {
        $single_admin = Admin::find(1);
        return view('admin.admin_profile', compact('single_admin'));
    }
    public function editAdmin()
    {
        $user = Admin::find(1);
        return view('admin.edit_profile', compact('user'));
    }
    public function updateProfile(Request $request)
    {
        $user = Admin::find(1);
        $user->name = $request->name;
        $user->email = $request->email;

        if (!empty($request->file('profile_photo_path'))) {
            $file = $request->file('profile_photo_path');
            @unlink(public_path('uploads/admin_profile/') . $user->profile_photo_path);
            $filename = date('YmdHi') . $file->getClientOriginalName();
            $file->move(public_path('uploads/admin_profile'), $filename);
            $user['profile_photo_path'] = $filename;
        }
        $user->save();
        $alert_message = [
            'message' => 'Admin Edited Successfully',
            'alert-type' => 'success'
        ];
        return redirect()->route('admin.profile')->with($alert_message);
    }
    public function changePassword()
    {
        $alert_message = [
            'message' => 'Password Changed Successfully',
            'alert-type' => 'success'
        ];
        return redirect()->route('admin.profile')->with($alert_message);
    }
    public function changePasswordView()
    {
        return view('admin.change_password');
    }
}
