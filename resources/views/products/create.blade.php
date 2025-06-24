@extends('layouts.app')

@section('content')
  <div class="page-header d-print-none">
    <div class="container-xl">
      <div class="row g-2 align-items-center">
        <div class="col">
          <h2 class="page-title">Tambah Produk</h2>
        </div>
        <div class="col-auto ms-auto d-print-none">
          <a href="{{ route('products.index') }}" class="btn btn-secondary">
            Kembali
          </a>
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

          <form action="{{ route('products.store') }}" method="POST">
            @csrf
            <div class="mb-3">
              <label class="form-label">Nama Produk</label>
              <input type="text" name="nama" class="form-control" value="{{ old('nama') }}" placeholder="Masukkan nama produk">
            </div>
            <div class="mb-3">
              <label class="form-label">Harga</label>
              <input type="number" name="harga" class="form-control" value="{{ old('harga') }}" placeholder="Contoh: 10000">
            </div>
            <div class="mb-3">
              <label class="form-label">Stok</label>
              <input type="number" name="stok" class="form-control" value="{{ old('stok') }}" placeholder="Contoh: 50">
            </div>
            <div class="form-footer">
              <button type="submit" class="btn btn-primary">Simpan</button>
              <a href="{{ route('products.index') }}" class="btn btn-light">Batal</a>
            </div>
          </form>
        </div>
      </div>
    </div>
  </div>
@endsection
