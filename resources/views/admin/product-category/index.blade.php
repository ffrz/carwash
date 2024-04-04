@extends('admin._layouts.default', [
    'title' => 'Kategori Produk',
    'menu_active' => 'inventory',
    'nav_active' => 'product-category'
])

@section('right-menu')
  <li class="nav-item">
    <a href="<?= url('/admin/product-categories/edit/0') ?>" class="btn plus-btn btn-primary mr-2" title="Baru"><i
        class="fa fa-plus"></i></a>
  </li>
@endSection

@section('content')
<div class="card card-light">
  <div class="card-body">
    <div class="row">
      <div class="col-md-12">
        <table class="data-table display table table-bordered table-striped table-condensed center-th"
          style="width:100%">
          <thead>
            <tr>
              <th style="width:30%">Nama Kategori</th>
              <th>Deskripsi</th>
              <th style="width:5%">Aksi</th>
            </tr>
          </thead>
          <tbody>
            @foreach ($items as $item)
            <tr>
              <td>{{ $item->name }}</td>
              <td>{{ $item->description }}</td>
              <td class="text-center">
                <div class="btn-group">
                  <a href="{{ url("/admin/product-categories/edit/$item->id") }}" class="btn btn-default btn-sm"><i
                      class="fa fa-edit"></i></a>
                  <a onclick="return confirm('Anda yakin akan menghapus rekaman ini?')"
                    href="{{ url("/admin/product-categories/delete/$item->id") }}" class="btn btn-danger btn-sm"><i
                      class="fa fa-trash"></i></a>
                </div>
              </td>
            </tr>
            @endforeach
          </tbody>
        </table>
      </div>
    </div>
  </div>
</div>
@endSection
@section('footscript')
<script>
  $(function() {
    DATATABLES_OPTIONS.order = [
      [0, 'asc']
    ];
    DATATABLES_OPTIONS.columnDefs = [{
      orderable: false,
      targets: 2
    }];
    $('.data-table').DataTable(DATATABLES_OPTIONS);
  });
</script>
@endSection
