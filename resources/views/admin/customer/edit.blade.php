<?php
$title = ($item->id ? 'Edit' : 'Tambah') . ' Pelanggan';
?>

@extends('admin._layouts.default', [
    'title' => $title,
    'menu_active' => 'sales',
    'nav_active' => 'customer',
    'back_button_link' => url('/admin/customers/'),
])

@section('content')
  <div class="card card-light">
    <form class="form-horizontal quick-form" method="POST">
      @csrf
      @include('admin._components.card-header', ['title' => $title])
      <div class="card-body">
        <div class="form-row">
          <div class="form-group col-md-6">
            <label for="name">Nama</label>
            <input type="text" class="form-control @error('name') is-invalide @enderror" id="name" placeholder="Nama"
              name="name" value="{{ old('name', $item->name) }}">
            @error('name')
              <span class="text-danger">{{ $message }}</span>
            @enderror
          </div>
          <div class="form-group col-md-6">
            <label for="phone">No. HP</label>
            <input type="text" class="form-control" id="phone" placeholder="No. HP" name="phone"
              value="{{ old('phone', $item->phone) }}">
          </div>
        </div>
        <div class="form-row">
          <div class="form-group col-md-12">
            <label for="address">Alamat</label>
            <textarea class="form-control" id="address" placeholder="Alamat" name="address">{{ old('address', $item->address) }}</textarea>
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
  </div>
@endsection
