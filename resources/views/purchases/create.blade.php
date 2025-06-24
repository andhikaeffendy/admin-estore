@extends('layouts.app')

@section('content')
  <div class="page-header d-print-none">
    <div class="container-xl">
      <div class="row g-2 align-items-center">
        <div class="col">
          <h2 class="page-title">Tambah Pembelian</h2>
        </div>
        <div class="col-auto ms-auto d-print-none">
          <a href="{{ route('purchases.index') }}" class="btn btn-secondary">Kembali</a>
        </div>
      </div>
    </div>
  </div>

  <div class="page-body">
    <div class="container-xl">
      <div class="card">
        <div class="card-body">
          @if ($errors->any())
            <div class="alert alert-danger">
              <ul class="mb-0">
                @foreach ($errors->all() as $error)
                  <li>{{ $error }}</li>
                @endforeach
              </ul>
            </div>
          @endif

          <form action="{{ route('purchases.store') }}" method="POST">
            @csrf
            <div class="mb-3">
              <label class="form-label">Produk</label>
              <select name="product_id" class="form-select">
                <option value="">-- Pilih Produk --</option>
                @foreach ($products as $product)
                  <option value="{{ $product->id }}" {{ old('product_id') == $product->id ? 'selected' : '' }}>
                    {{ $product->nama }} (Rp {{ number_format($product->harga, 0, ',', '.') }})
                  </option>
                @endforeach
              </select>
            </div>
            <div class="mb-3">
              <label class="form-label">Jumlah</label>
              <input type="number" name="jumlah" class="form-control" value="{{ old('jumlah') }}" placeholder="Contoh: 3">
            </div>
            <div class="form-footer">
              <button type="submit" class="btn btn-primary">Simpan Pembelian</button>
              <a href="{{ route('purchases.index') }}" class="btn btn-light">Batal</a>
            </div>
          </form>
        </div>
      </div>
    </div>
  </div>
@endsection
