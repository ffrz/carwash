<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\ProductCategory;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class ProductCategoryController extends Controller
{
    private const INDEX_URL = '/admin/product-categories';

    public function index()
    {
        $items = ProductCategory::all();
        return view('admin.product-category.index', compact('items'));
    }

    public function edit(Request $request, $id = 0)
    {
        $item = $id ? ProductCategory::find($id) : new ProductCategory();
        if (!$item)
            return redirect(self::INDEX_URL)->with('warning', 'Kategori Produk tidak ditemukan.');

        if ($request->method() == 'POST') {
            $validator = Validator::make($request->all(), [
                'name' => 'required|unique:product_categories,name,' . $request->id . '|max:100',
            ], [
                'name.required' => 'Nama kategori harus diisi.',
                'name.unique' => 'Nama kategori sudah digunakan.',
                'name.max' => 'Nama kategori terlalu panjang, maksimal 100 karakter.',
            ]);

            if ($validator->fails())
                return redirect()->back()->withInput()->withErrors($validator);

            $item->fill($request->all());
            $item->save();

            return redirect(self::INDEX_URL)->with('info', 'Kategori produk telah disimpan.');
        }

        return view('admin.product-category.edit', compact('item'));
    }

    public function delete($id)
    {
        if (!$item = ProductCategory::find($id))
            $message = 'Kategori tidak ditemukan.';
        else if ($item->delete($id))
            $message = 'Kategori ' . $item->name . ' telah dihapus.';

        return redirect(self::INDEX_URL)->with('info', $message);
    }
}
