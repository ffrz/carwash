<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Customer;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class CustomerController extends Controller
{
    protected $index_url = 'admin/customers';

    public function index()
    {
        $items = Customer::all();
        return view('admin.customer.index', compact('items'));
    }

    public function edit(Request $request, $id = 0)
    {
        if ($id == 0) {
            $item = new Customer();
        } else {
            $item = Customer::find($id);
            if (!$item) {
                return redirect($this->index_url)
                    ->with('warning', 'Pelanggan tidak ditemukan.');
            }
        }

        if ($request->method() === 'POST') {
            $data = $request->all();

            $validator = Validator::make($data, [
                'name' => 'required',
            ], [
                'name.required' => 'Nama Pelanggan harus diisi.',
            ]);

            if ($validator->fails()) {
                return redirect()->back()->withInput()->withErrors($validator);
            }

            $item->fill($data);
            $item->save();

            return redirect($this->index_url)->with('info', 'Berhasil disimpan.');
        }

        return view('admin.customer.edit', compact('item'));
    }

    public function delete($id)
    {
        $item = Customer::find($id);
        $item->delete();

        return redirect($this->index_url)->with('info', 'Rekaman telah dihapus.');
    }
}
