@extends('layouts.app')

@section('content')
<div class="container-fluid">
    <div class="row mb-2">
        <div class="col-sm-6">
            <h1>Dashboard Inventory Toko</h1>
        </div>
        <div class="col-sm-6 text-right">
            <small>{{ date('d F Y') }}</small>
        </div>
    </div>

    <div class="row">
        <!-- Stok Masuk -->
        <div class="col-lg-3 col-6">
            <div class="small-box bg-success">
                <div class="inner">
                    <h3>{{ $totalStokMasuk }}</h3>
                    <p>Stok Masuk</p>
                </div>
                <div class="icon"><i class="fas fa-download"></i></div>
                <a href="{{ route('laporan.stok') }}" class="small-box-footer">Detail <i class="fas fa-arrow-circle-right"></i></a>
            </div>
        </div>

        <!-- Stok Keluar -->
        <div class="col-lg-3 col-6">
            <div class="small-box bg-danger">
                <div class="inner">
                    <h3>{{ $totalStokKeluar }}</h3>
                    <p>Stok Keluar</p>
                </div>
                <div class="icon"><i class="fas fa-upload"></i></div>
                <a href="{{ route('laporan.stok') }}" class="small-box-footer">Detail <i class="fas fa-arrow-circle-right"></i></a>
            </div>
        </div>

        <!-- Barang -->
        <div class="col-lg-3 col-6">
            <div class="small-box bg-info">
                <div class="inner">
                    <h3>{{ $jumlahBarang }}</h3>
                    <p>Barang</p>
                </div>
                <div class="icon"><i class="fas fa-boxes"></i></div>
                <a href="{{ route('laporan.stok') }}" class="small-box-footer">Detail <i class="fas fa-arrow-circle-right"></i></a>
            </div>
        </div>

        <!-- Kategori -->
        <div class="col-lg-3 col-6">
            <div class="small-box bg-warning">
                <div class="inner">
                    <h3>{{ $jumlahKategori }}</h3>
                    <p>Kategori</p>
                </div>
                <div class="icon"><i class="fas fa-tags"></i></div>
                <a href="{{ route('laporan.stok') }}" class="small-box-footer">Detail <i class="fas fa-arrow-circle-right"></i></a>
            </div>
        </div>
    </div>

    <!-- Grafik -->
    <div class="card shadow mb-4">
        <div class="card-header bg-primary text-white">📦 Grafik Stok Masuk & Keluar</div>
        <div class="card-body">
            <canvas id="columnChart" height="120"></canvas>
        </div>
    </div>

    <div class="card shadow">
        <div class="card-header bg-secondary text-white">💰 Grafik Total Nilai Barang</div>
        <div class="card-body">
            <canvas id="lineChart" height="120"></canvas>
        </div>
    </div>
</div>
@endsection
@push('scripts')
<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
<script>
    const labels = {!! json_encode($namaBarang) !!};

    const columnChart = new Chart(document.getElementById('columnChart'), {
        type: 'bar',
        data: {
            labels: labels,
            datasets: [
                {
                    label: 'Stok Masuk',
                    backgroundColor: 'rgba(40, 167, 69, 0.7)',
                    data: {!! json_encode($stokMasuk) !!}
                },
                {
                    label: 'Stok Keluar',
                    backgroundColor: 'rgba(220, 53, 69, 0.7)',
                    data: {!! json_encode($stokKeluar) !!}
                }
            ]
        },
        options: {
            responsive: true,
            plugins: {
                legend: { position: 'top' },
                title: { display: true, text: 'Column Chart - Stok Barang' }
            }
        }
    });

    const lineChart = new Chart(document.getElementById('lineChart'), {
        type: 'line',
        data: {
            labels: labels,
            datasets: [
                {
                    label: 'Total Nilai (Rp)',
                    borderColor: 'rgba(54, 162, 235, 1)',
                    backgroundColor: 'rgba(54, 162, 235, 0.2)',
                    fill: true,
                    data: {!! json_encode($totalNilai) !!}
                }
            ]
        },
        options: {
            responsive: true,
            plugins: {
                title: { display: true, text: 'Line Chart - Total Nilai Barang' },
                legend: { position: 'top' }
            },
            scales: {
                y: {
                    beginAtZero: true,
                    ticks: {
                        callback: function(value) {
                            return 'Rp' + value.toLocaleString('id-ID');
                        }
                    }
                }
            }
        }
    });
</script>
@endpush