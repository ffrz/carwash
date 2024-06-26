<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Setting;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;

class SettingController extends Controller
{
    public function edit(Request $request)
    {
        $data = [
            'business_name' => Setting::value('app.business_name', 'My Car Wash'),
            'business_address' => Setting::value('app.business_address', '')
        ];
        return view('admin.setting.edit', compact('data'));
    }

    public function save(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'business_name' => 'required'
        ], [
            'business_name.required' => 'Nama Usaha harus diisi.'
        ]);

        if ($validator->fails())
            return redirect()->back()->withInput()->withErrors($validator);

        DB::beginTransaction();
        Setting::setValue('app.business_name', $request->post('business_name', ''));
        Setting::setValue('app.business_address', $request->post('business_address', ''));
        DB::commit();

        return redirect('admin/settings')->with('info', 'Pengaturan telah disimpan.');
    }
}
