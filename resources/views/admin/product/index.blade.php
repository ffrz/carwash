@extends('admin._layouts.default', [
    'title' => 'Produk',
    'menu_active' => 'inventory',
    'nav_active' => 'product',
])

@section('right-menu')
  <li class="nav-item">
    <a href="<?= url('admin/products/edit/0') ?>" class="btn plus-btn btn-primary mr-2" title="Baru"><i
        class="fa fa-plus"></i></a>
  </li>
@endsection

@section('content')
  <div class="card card-light">
    @include('admin._components.card-header', ['title' => 'Daftar Produk'])
    <div class="card-body">
      <div class="row">
        <div class="col-md-12 table-responsive">
          <table class="data-table display table table-bordered table-striped table-condensed center-th"
            style="width:100%">
            <thead>
              <tr>
                <th class="text-left">Nama Produk / Layanan</th>
                <th>Jenis</th>
                <th>Stok</th>
                <th>Satuan</th>
                @if (Auth::user()->is_admin)
                  <th>Harga Beli</th>
                @endif
                <th>Harga Jual</th>
                <th>Aksi</th>
              </tr>
            </thead>
            <tbody>
              @foreach ($items as $item)
                <tr>
                  <td>
                    {{ $item->name }}
                    @if (!$item->active)
                      <span class="badge badge-secondary">Nonaktif</span>
                    @endif
                  </td>
                  <td class="text-center">{{ format_product_type($item->type) }}</td>
                  <td class="text-right">{{ format_number($item->stock) }}</td>
                  <td class="text-center">{{ $item->uom }}</td>
                  @if (Auth::user()->is_admin)
                    <td class="text-right">{{ format_number($item->cost) }}</td>
                  @endif
                  <td class="text-right">{{ format_number($item->price) }}</td>
                  <td class="text-center">
                    <div class="btn-group">
                      <a href="{{ url("/admin/products/edit/$item->id") }}" class="btn btn-default btn-sm">
                        <i class="fa fa-edit"></i>
                      </a>
                      <a onclick="return confirm('Hapus item?')" href="{{ url("/admin/products/delete/$item->id") }}"
                        class="btn btn-danger btn-sm">
                        <i class="fa fa-trash"></i>
                      </a>
                    </div>
                  </td>
                </tr>
              @endforeach
            </tbody>
            <thead>
              <tr>
                <th class="text-left">Nama Produk / Layanan</th>
                <th>Stok</th>
                <th>Satuan</th>
                <th>Jenis</th>
                @if (Auth::user()->is_admin)
                  <th>Harga Beli</th>
                @endif
                <th>Harga Jual</th>
                <th>Aksi</th>
              </tr>
            </thead>
          </table>
        </div>
      </div>
    </div>
  </div>
@endsection
@section('footscript')
  <script>
    $(function() {
      DATATABLES_OPTIONS.order = [
        [0, 'asc']
      ];
      DATATABLES_OPTIONS.columnDefs = [{
          orderable: false,
          targets: {{ Auth::user()->is_admin ? '4' : '3' }}
        },
        // {
        //   targets: 2,
        //   render: $.fn.dataTable.render.number('.', ',', 0, '')
        // }
      ];
      $('.data-table').DataTable(DATATABLES_OPTIONS);
    });
  </script>
@endsection
