@extends('layouts.app')

@section('content')
<div class="container-fluid py-4">
  <div class="row mb-4">
    <div class="col-lg-4 col-md-6 mb-3">
      <div class="card shadow-sm border-0">
        <div class="card-body text-center">
          <h6 class="mb-0 text-uppercase text-muted">Pending Payments</h6>
          <h3 class="text-warning mt-1">{{ $pendingCount }}</h3>
        </div>
      </div>
    </div>
    <div class="col-lg-4 col-md-6 mb-3">
      <div class="card shadow-sm border-0">
        <div class="card-body text-center">
          <h6 class="mb-0 text-uppercase text-muted">Completed Transactions</h6>
          <h3 class="text-success mt-1">{{ $completedCount }}</h3>
        </div>
      </div>
    </div>
    <div class="col-lg-4 col-md-12 mb-3">
      <div class="card shadow-sm border-0">
        <div class="card-body text-center">
          <h6 class="mb-0 text-uppercase text-muted">Total Products</h6>
          <h3 class="text-primary mt-1">{{ $productCount }}</h3>
        </div>
      </div>
    </div>
  </div>

  {{-- Produk Terpopuler --}}
  <div class="row mb-4">
    <div class="col-lg-6">
      <div class="card shadow-sm border-0">
        <div class="card-header">
          <h6 class="mb-0">Produk Terpopuler</h6>
        </div>
        <div class="table-responsive">
          <table class="table table-hover mb-0">
            <thead>
              <tr>
                <th>Produk</th>
                <th>Total Dibeli</th>
              </tr>
            </thead>
            <tbody>
              @foreach ($popularProducts as $product)
                <tr>
                  <td>{{ $product->nama }}</td>
                  <td>{{ $product->total_pembelian }}</td>
                </tr>
              @endforeach
            </tbody>
          </table>
        </div>
      </div>
    </div>

    {{-- Pembelian Harian --}}
    <div class="col-lg-6">
      <div class="card shadow-sm border-0">
        <div class="card-header">
          <h6 class="mb-0">Pembelian 7 Hari Terakhir</h6>
        </div>
        <div class="card-body">
          <canvas id="dailyChart"></canvas>
        </div>
      </div>
    </div>
  </div>

  {{-- Grafik Bulanan & Tahunan --}}
  <div class="row">
    <div class="col-lg-6 mb-4">
      <div class="card shadow-sm border-0">
        <div class="card-header">
          <h6 class="mb-0">Pembelian Bulanan ({{ date('Y') }})</h6>
        </div>
        <div class="card-body">
          <canvas id="monthlyChart"></canvas>
        </div>
      </div>
    </div>
    <div class="col-lg-6 mb-4">
      <div class="card shadow-sm border-0">
        <div class="card-header">
          <h6 class="mb-0">Pembelian Tahunan</h6>
        </div>
        <div class="card-body">
          <canvas id="yearlyChart"></canvas>
        </div>
      </div>
    </div>
  </div>
</div>
@endsection

@section('scripts')
<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
<script>
  const dailyChart = new Chart(document.getElementById('dailyChart'), {
    type: 'bar',
    data: {
      labels: {!! json_encode($dailyLabels) !!},
      datasets: [{
        label: 'Total Pembelian (Rp)',
        data: {!! json_encode($dailyValues) !!},
        backgroundColor: '#5e72e4'
      }]
    },
    options: { responsive: true }
  });

  const monthlyChart = new Chart(document.getElementById('monthlyChart'), {
    type: 'line',
    data: {
      labels: {!! json_encode($monthlyLabels) !!},
      datasets: [{
        label: 'Total Pembelian (Rp)',
        data: {!! json_encode($monthlyValues) !!},
        borderColor: '#2dce89',
        backgroundColor: 'rgba(45, 206, 137, 0.2)',
        fill: true,
        tension: 0.3
      }]
    },
    options: { responsive: true }
  });

  const yearlyChart = new Chart(document.getElementById('yearlyChart'), {
    type: 'bar',
    data: {
      labels: {!! json_encode($yearlyLabels) !!},
      datasets: [{
        label: 'Total Pembelian (Rp)',
        data: {!! json_encode($yearlyValues) !!},
        backgroundColor: '#f5365c'
      }]
    },
    options: { responsive: true }
  });
</script>
@endsection
