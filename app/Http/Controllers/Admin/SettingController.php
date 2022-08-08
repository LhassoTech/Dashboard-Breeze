<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\UpdateSettingRequest;
use App\Models\Setting;
use Illuminate\Http\Request;

class SettingController extends Controller
{
    public function index()
    {
        $setting = Setting::find(1);
        return view('layouts.admin.settings.index', compact('setting'));
    }

    public function update(UpdateSettingRequest $request)
    {
        $destinationpath = 'uploads/settings/';

        $data = $request->except('_token', '_method', 'img_logo', 'img_fav');

        $logo = $request->img_logo;
        $fav = $request->img_fav;

        if ($logo) {
            $extension = strrchr($logo->getClientOriginalName(), '.');
            $new_file_name = "logo_" . time();
            $image = $logo->move($destinationpath, $new_file_name . $extension);
            $data['img_logo'] = isset($image) ? $new_file_name . $extension : null;
        }

        if ($fav) {
            $extension = strrchr($fav->getClientOriginalName(), '.');
            $new_file_name = "fav_" . time();
            $image = $fav->move($destinationpath, $new_file_name . $extension);
            $data['img_fav'] = isset($image) ? $new_file_name . $extension : null;
        }

        $setting = Setting::where(['id' => '1'])->update($data);

        if ($setting) {
            return redirect()->route('admin.setting.index')
                ->withSuccessMessage('Settings is saved successfully.');
        }
        return redirect()->back()->withInput()
            ->withWarningMessage('Settings can not be saved.');
    }
}
