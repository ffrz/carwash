@extends('admin._layouts.default', [
    'title' => 'Pengaturan',
    'menu_active' => 'system',
    'nav_active' => 'settings',
])
@section('content')
<div class="card card-light">
    <form class="form-horizontal quick-form" method="POST" action="{{ url('admin/settings/save') }}">
        @include('admin._components.card-header', ['title' => 'Pengaturan', 'description' =>
            'Ini adalah halaman Pengaturan Sistem. Anda dapat memperbarui nama usaha dan alamat bisnis anda pada halaman ini.'])
        <div class="card-body">
            @csrf
            <div class="form-group row">
                <label for="business_name" class="col-sm-2 col-form-label">Nama Usaha</label>
                <div class="col-sm-10">
                    <input type="text" autofocus class="form-control @error('business_name') is-invalid @enderror"
                        id="business_name" placeholder="Nama Usaha" name="business_name" value="{{ $data['business_name'] }}">
                </div>
                @error('business_name')
                    <span class="offset-sm-2 col-sm-10 error form-error">
                        {{ $message }}
                    </span>
                @enderror
            </div>
            <div class="form-group row">
                <label for="business_address   " class="col-sm-2 col-form-label">Alamat</label>
                <div class="col-sm-10">
                    <textarea class="form-control" id="business_address" name="business_address">{{ $data['business_address'] }}</textarea>
                </div>
            </div>
        </div>
        <div class="card-footer">
            <button type="submit" class="btn btn-primary"><i class="fas fa-save mr-2"></i> Simpan</button>
        </div>
    </form>
</div>
@endSection