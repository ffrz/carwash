<?php use App\Models\Product; ?>
<?php $title = ($item->id ? 'Edit' : 'Tambah') . ' Produk'; ?>

@extends('admin._layouts.default', [
    'title' => $title,
    'menu_active' => 'inventory',
    'nav_active' => 'product',
    'back_button_link' => url('/admin/products/'),
])

@section('content')
  <div class="card card-light">
    <form class="form-horizontal quick-form" method="POST">
      @csrf
      @include('admin._components.card-header', ['title' => $title])
      <div class="card-body">
        <div class="form-row">
          <div class="form-group col-md-4">
            <label for="type" class="">Jenis Produk / Layanan</label>
            <select class="form-control custom-select" id="type" name="type">
              {{-- <option value="{{ Product::TYPE_NON_STOCKED }}"
                {{ $item->type == Product::TYPE_NON_STOCKED ? 'selected' : '' }}>
                {{ format_product_type(Product::TYPE_NON_STOCKED) }}
              </option> --}}
              <option value="{{ Product::TYPE_STOCKED }}" {{ $item->type == Product::TYPE_STOCKED ? 'selected' : '' }}>
                {{ format_product_type(Product::TYPE_STOCKED) }}
              </option>
              <option value="{{ Product::TYPE_SERVICE }}" {{ $item->type == Product::TYPE_SERVICE ? 'selected' : '' }}>
                {{ format_product_type(Product::TYPE_SERVICE) }}
              </option>
              {{-- <option value="{{ Product::TYPE_COMPOSITE }}" {{ $item->type == Product::TYPE_COMPOSITE ? 'selected' : '' }}>
                {{ format_product_type(Product::TYPE_COMPOSITE) }}
              </option> --}}
            </select>
          </div>
          <div class="form-group col-md-8">
            <label for="name">Nama Produk / Layanan</label>
            <input type="text" class="form-control @error('name') is-invalide @enderror" id="name"
              placeholder="Nama" name="name" value="{{ old('name', $item->name) }}">
            @error('name')
              <span class="text-danger">{{ $message }}</span>
            @enderror
          </div>
        </div>
        <div class="form-row">
          <div class="form-group col-md-4">
            <label for="cost">Harga Beli</label>
            <input type="number" min="0" class="form-control" id="cost" placeholder="Harga" name="cost"
              step="" value="{{ old('cost', $item->cost) }}">
          </div>
          <div class="form-group col-md-4">
            <label for="price">Harga Jual</label>
            <input type="number" min="0" class="form-control" id="price" placeholder="Harga" name="price"
              step="" value="{{ old('price', $item->price) }}">
          </div>
        </div>
        <div class="form-row">
          <div class="form-group col-md-4">
            <label for="stock">Stok</label>
            <input type="number" class="form-control" id="stock" placeholder="Stok" name="stock"
              step="" value="{{ old('stock', $item->stock) }}">
          </div>
          <div class="form-group col-md-4">
            <label for="uom">Satuan</label>
            <input type="text" class="form-control" id="uom" placeholder="Satuan" name="uom"
              step="" value="{{ old('uom', $item->uom) }}">
          </div>
        </div>
        <div class="form-group row">
          <div class="col-sm-12">
            <div class="custom-control custom-checkbox">
              <input type="checkbox" class="custom-control-input " id="active" name="active" value="1"
                {{ $item->active ? 'checked="checked"' : '' }}>
              <label class="custom-control-label" for="active" title="Produk aktif dapat dijual">Aktif <span
                  class="text-muted">(Dapat Dijual)</span></label>
            </div>
          </div>
        </div>
        <div class="form-row">
          <div class="form-group col-md-12">
            <label for="notes">Catatan</label>
            <textarea class="form-control" id="notes" placeholder="Catatan" name="notes">{{ old('notes', $item->notes) }}</textarea>
          </div>
        </div>
      </div>
      <div class="card-footer">
        <button type="submit" class="btn btn-primary"><i class="fas fa-save mr-2"></i> Simpan</button>
      </div>
    </form>
  </div>
@endsection
