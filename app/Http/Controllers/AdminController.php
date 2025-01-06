<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Notification;

class AdminController extends Controller
{
    public function AdminDashboard(){
        return view('admin.index');
    }

    public function AdminDestroy(Request $request){
        Auth::guard('web')->logout();

        $request->session()->invalidate();

        $request->session()->regenerateToken();

        return redirect('/admin/login');
    }

    public function AdminLogin(){
        return view('admin.admin_login');
    }

    public function AdminProfile(){

        $id = Auth::user()->id;
        $adminData = User::find($id);
        return view('admin.admin_profile_view',compact('adminData'));

    }

    public function AdminProfileStore(Request $request){

            $request->validate([
                'name' => 'required|string|max:255',
                'email' => 'required|email|max:255',
                'phone' => 'nullable|string|max:15',
                'address' => 'nullable|string|max:255',
                'photo' => 'nullable|image|mimes:jpg,jpeg,png,gif|max:2048', // Validate photo as an image
            ]);
        
            $id = Auth::user()->id;
            $data = User::find($id);
            $data->name = $request->name;
            $data->email = $request->email;
            $data->phone = $request->phone;
            $data->address = $request->address;
        if ($request->file('photo')) {
            $file = $request->file('photo');
            $filename = date('YmdHi').$file->getClientOriginalName();
            $file->move(public_path('upload/admin_images'),$filename);
            $data['photo'] = $filename;
        }

        $data->save();

        $notification = array(
            'message'=>'Profile Updated Successfully!',
            'alert-type'=>'success'        
        );

        return redirect()->back()->with($notification);
    }

    public function AdminChangePassword(){
        $id = Auth::user()->id;
        $adminData = User::find($id);
        return view('admin.admin_change_password',compact('adminData'));
    }

    public function AdminUpdatePassword(Request $request){
        // Validation
        $request->validate([
            'old_password' => 'required',
            'new_password' => 'required|confirmed',
        ]);

        // Match The Old Password
        if (!Hash::check($request->old_password, auth::user()->password)) {
            return back()->with("error", "Old Password Doesn't Match!!");
        }

        // Update The new password
        User::whereId(auth()->user()->id)->update([
            'password' => Hash::make($request->new_password)

        ]);
        return back()->with("status", " Password Changed Successfully");
    }



}
