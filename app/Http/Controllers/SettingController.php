<?php

namespace App\Http\Controllers;

use App\Setting;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\File;

class SettingController extends Controller
{
    public function updated(Request $request)
    {
        $validate = $this->validate($request, [
            'sitelogo' => 'image',
            'faviconSite' => 'image',
            'emailContact' => 'email'
        ]);


        $sitename = $request->input('sitename');
        $sitelogo = $request->file('sitelogo');
        $faviconSite = $request->file('faviconSite');
        $emailContact = $request->input('emailContact');
        $primarycolor = $request->input('primarycolor');
        $secundarycolor = $request->input('secundarycolor');
        $token_nicho = $request->input('token_nicho');
        $tag_amazon = $request->input('tag_amazon');
        $google_analytics = $request->input('google_analytics');

        $setting = Setting::first();

        $setting->name_page = $sitename;

        if ($sitelogo) {
            $sitelogo_name = $request->file('sitelogo')->getClientOriginalName();
            Storage::disk('images')->put($sitelogo_name, File::get($sitelogo));
            $setting->path_logo = $sitelogo_name;
        }

        if ($faviconSite) {
            $faviconSite_name = $request->file('sitelogo')->getClientOriginalName();
            Storage::disk('images')->put($faviconSite_name, File::get($faviconSite));
            $setting->path_favicon = $faviconSite_name;
        }

        $setting->contact_email = $emailContact;
        $setting->color_primary = $primarycolor;
        $setting->secondary_color = $secundarycolor;
        $setting->token_nichoclub = $token_nicho;
        $setting->id_amazon = $tag_amazon;
        $setting->id_analytics = $google_analytics;

        $setting->update();

        return redirect()->route('admin.settings')->with(
            'message',
            '¡Los ajustes se han actualizado con éxito!'
        );
    }
}
