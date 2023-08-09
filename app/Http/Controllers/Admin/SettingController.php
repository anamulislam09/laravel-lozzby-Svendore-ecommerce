<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Setting;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class SettingController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    // seo page show method 
    public function seo(){
        $data = DB::table('seos')->first();
        return view('admin.settings.seo', compact('data'));
    }

    // Update seo page 
    public function seoUpdate(Request $request, $id){
        $data = array();
        $data['meta_title']= $request->meta_title;
        $data['meta_author']= $request->meta_author;
        $data['meta_tag']= $request->meta_tag;
        $data['meta_keyword']= $request->meta_keyword;
        $data['google_verification']= $request->google_verification;
        $data['alexa_verification']= $request->alexa_verification;
        $data['meta_description']= $request->meta_description;
        $data['google_analytics']= $request->google_analytics;
        $data['google_adsense']= $request->google_adsense;

        $data = DB::table('seos')->where('id', $id)->update($data);

        $notification = array('message' => 'Seo Settings updated successfully.', 'alert_type' => 'success');
        return redirect()->route('seo.setting')->with($notification);
    }

    // smtp page show method 
    public function smtp(){
        $smtp = DB::table('smtp')->first();
        return view('admin.settings.smtp', compact('smtp'));
    }

    // Update smtp page 
    public function smtpUpdate(Request $request, $id){
        $data = array();
        $data['mailer']= $request->mailer;
        $data['host']= $request->host;
        $data['port']= $request->port;
        $data['user_name']= $request->user_name;
        $data['password']= $request->password;
      
        $data = DB::table('smtp')->where('id', $id)->update($data);

        $notification = array('message' => 'STP Setting updated successfully.', 'alert_type' => 'success');
        return redirect()->route('smtp.setting')->with($notification);
    }

}
