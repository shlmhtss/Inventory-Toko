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
        <!-- BOX 1 -->
        <div class="col-lg-3 col-6">
            <div class="small-box bg-success">
                <div class="inner">
                    <h3>150</h3>
                    <p>Stok Masuk</p>
                </div>
                <div class="icon">
                    <i class="fas fa-download"></i>
                </div>
                <a href="#" class="small-box-footer">Lihat Selengkapnya <i class="fas fa-arrow-circle-right"></i></a>
            </div>
        </div>

        <!-- BOX 2 -->
        <div class="col-lg-3 col-6">
            <div class="small-box bg-danger">
                <div class="inner">
                    <h3>53</h3>
                    <p>Stok Keluar</p>
                </div>
                <div class="icon">
                    <i class="fas fa-upload"></i>
                </div>
                <a href="#" class="small-box-footer">Lihat Selengkapnya <i class="fas fa-arrow-circle-right"></i></a>
            </div>
        </div>

        <!-- BOX 3 -->
        <div class="col-lg-3 col-6">
            <div class="small-box bg-info">
                <div class="inner">
                    <h3>200</h3>
                    <p>Barang</p>
                </div>
                <div class="icon">
                    <i class="fas fa-boxes"></i>
                </div>
                <a href="#" class="small-box-footer">Lihat Selengkapnya <i class="fas fa-arrow-circle-right"></i></a>
            </div>
        </div>

        <!-- BOX 4 -->
        <div class="col-lg-3 col-6">
            <div class="small-box bg-warning">
                <div class="inner">
                    <h3>5</h3>
                    <p>Kategori</p>
                </div>
                <div class="icon">
                    <i class="fas fa-users"></i>
                </div>
                <a href="#" class="small-box-footer">Lihat Selengkapnya <i class="fas fa-arrow-circle-right"></i></a>
            </div>
        </div>
    </div>
</div>
@endsection
