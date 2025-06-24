@extends('layouts.app')

@section('content')
  <div class="page-header d-print-none">
    <div class="container-xl">
      <div class="row g-2 align-items-center">
        <div class="col">
          <h2 class="page-title">List Pembelian</h2>
        </div>
      </div>
    </div>
  </div>

  <div class="page-body">
    <div class="container-xl">
      <div class="card">
        <div class="col-auto ms-auto d-print-none">
            <a href="{{ route('purchases.create') }}" class="btn btn-primary">
                Tambah Pembelian
            </a>
        </div>

        <div class="table-responsive">
          <table class="table table-vcenter card-table">
            <thead>
              <tr>
                <th>Produk</th>
                <th>Jumlah</th>
                <th>Total Harga</th>
                <th>Tanggal</th>
              </tr>
            </thead>
            <tbody>
              @forelse($purchases as $purchase)
                <tr>
                  <td>{{ $purchase->product->nama }}</td>
                  <td>{{ $purchase->jumlah }}</td>
                  <td>Rp {{ number_format($purchase->total_harga, 0, ',', '.') }}</td>
                  <td>{{ $purchase->created_at->format('d-m-Y H:i') }}</td>
                </tr>
              @empty
                <tr>
                  <td colspan="4" class="text-center">Belum ada pembelian</td>
                </tr>
              @endforelse
            </tbody>
          </table>
        </div>
      </div>
    </div>
  </div>
@endsection
