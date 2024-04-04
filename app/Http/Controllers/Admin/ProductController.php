<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Product;
use App\Models\ProductCategory;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class ProductController extends Controller
{
    protected $index_url = 'admin/products';

    public function index()
    {
        $items = Product::with('category')->orderBy('name', 'asc')->get();
        return view('admin.product.index', compact('items'));
    }

    public function edit(Request $request, $id = 0)
    {
        if ($id == 0) {
            $item = new Product();
            $item->active = true;
        } else {
            $item = Product::find($id);
            if (!$item) {
                return redirect($this->index_url)
                    ->with('warning', 'Produk tidak ditemukan.');
            }
        }

        if ($request->method() === 'POST') {
            $data = $request->all();

            if (!isset($data['active']))
                $data['active'] = false;

            if (empty($data['category_id']))
                $data['category_id'] = null;

            $validator = Validator::make($data, [
                'name' => 'required',
                'price' => 'required|min:0',
            ], [
                'name.required' => 'Nama Produk harus diisi.',
                'price.required' => 'Harga harus diisi.',
            ]);

            if ($validator->fails()) {
                return redirect()->back()->withInput()->withErrors($validator);
            }

            $item->fill($data);
            $item->save();

            return redirect($this->index_url)->with('info', 'Berhasil disimpan.');
        }

        $categories = ProductCategory::orderBy('name', 'asc')->get();

        return view('admin.product.edit', compact('item', 'categories'));
    }

    public function delete($id)
    {
        $item = Product::find($id);
        $item->delete();

        return redirect($this->index_url)->with('info', 'Produk telah dihapus.');
    }
}
