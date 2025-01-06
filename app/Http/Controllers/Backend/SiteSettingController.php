<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Intervention\Image\Facades\Image;
use App\Models\SiteSetting;
use App\Models\Seo;
use App\Models\SmtpSetting;

class SiteSettingController extends Controller
{
    public function SiteSetting(){

        $setting = SiteSetting::find(1);
        return view('backend.setting.setting_update',compact('setting'));

    } // End Method 


public function SiteSettingUpdate(Request $request){

        $setting_id = $request->id; 

        if ($request->file('logo')) {

        $image = $request->file('logo');
        $name_gen = hexdec(uniqid()).'.'.$image->getClientOriginalExtension();
        Image::make($image)->resize(180,56)->save('upload/logo/'.$name_gen);
        $save_url = 'upload/logo/'.$name_gen;


        SiteSetting::findOrFail($setting_id)->update([
            'support_phone' => $request->support_phone,
            'phone_one' => $request->phone_one,
            'email' => $request->email,
            'company_address' => $request->company_address,
            'facebook' => $request->facebook,
            'twitter' => $request->twitter,
            'youtube' => $request->youtube,
            'copyright' => $request->copyright, 
            'logo' => $save_url, 
        ]);

       $notification = array(
            'message' => 'Site Setting Updated with image Successfully',
            'alert-type' => 'success'
        );

        return redirect()->back()->with($notification); 

        } else {

            SiteSetting::findOrFail($setting_id)->update([
            'support_phone' => $request->support_phone,
            'phone_one' => $request->phone_one,
            'email' => $request->email,
            'company_address' => $request->company_address,
            'facebook' => $request->facebook,
            'twitter' => $request->twitter,
            'youtube' => $request->youtube,
            'copyright' => $request->copyright, 
        ]);

       $notification = array(
            'message' => 'Site Setting Updated without image Successfully',
            'alert-type' => 'success'
        );

        return redirect()->back()->with($notification); 

        } // end else

    }// End Method 

 //////////// Seo Setting /////////////

 public function SeoSetting(){

    $seo = Seo::find(1);
    return view('backend.seo.seo_update',compact('seo'));

} // End Method 


   public function SeoSettingUpdate(Request $request){
    $seo_id = $request->id;

    Seo::findOrFail($seo_id)->update([
        'meta_title' => $request->meta_title,
        'meta_author' => $request->meta_author,
        'meta_keyword' => $request->meta_keyword,
        'meta_description' => $request->meta_description, 
    ]);

   $notification = array(
        'message' => 'Seo Setting Updated Successfully',
        'alert-type' => 'success'
    );

    return redirect()->back()->with($notification);  

    }// End Method 

    public function SmtpSetting(){

        $smpt = SmtpSetting::find(1);
        return view('admin.backend.smpt_update',compact('smpt'));

    }// End Method 

    public function SmtpUpdate(Request $request){

        $smtp_id = $request->id;

        SmtpSetting::find($smtp_id)->update([
            'mailer' =>  $request->mailer,
            'host' =>  $request->host,
            'port' =>  $request->port,
            'username' =>  $request->username,
            'password' =>  $request->password,
            'encryption' =>  $request->encryption,
            'from_address' =>  $request->from_address, 
        ]);

        $notification = array(
            'message' => 'Smtp Setting Updated Successfully',
            'alert-type' => 'success'
        );
        return redirect()->back()->with($notification);  

    }// End Method 


}



