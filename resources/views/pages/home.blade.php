@extends('layouts.app')

@section('main')
    <main role="main" class="flex-shrink-0">
        <div class="container">
            <h1 class="mt-5">Warehouse Stock App</h1>
            <p class="lead">Sistem informasi pengelolaan stok gudang. 
                Fungsi: manajemen data user, manajemen data barang, informasi log aktivitas barang (barang masuk dan keluar)</p>
            <div class="row">
                <div class="col-md-3">
                    <div class="card mb-4">
                        {{-- <img src="..." class="card-img-top" alt="..."> --}}
                        <div class="card-body">
                            <h5 class="card-title">Master User</h5>
                            <p class="card-text">Manajemen master user</p>
                            <a href={{ route('users.index') }} class="btn btn-primary">See</a>
                        </div>
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="card mb-4">
                        {{-- <img src="..." class="card-img-top" alt="..."> --}}
                        <div class="card-body">
                            <h5 class="card-title">Master Barang</h5>
                            <p class="card-text">Manajemen master barang</p>
                            <a href={{ route('items.index') }} class="btn btn-primary">See</a>
                        </div>
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="card mb-4">
                        {{-- <img src="..." class="card-img-top" alt="..."> --}}
                        <div class="card-body">
                            <h5 class="card-title">Barang Masuk</h5>
                            <p class="card-text">Daftar barang masuk</p>
                            <a href={{ route('stock-in.index') }} class="btn btn-primary">See</a>
                        </div>
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="card mb-4">
                        {{-- <img src="..." class="card-img-top" alt="..."> --}}
                        <div class="card-body">
                            <h5 class="card-title">Barang Keluar</h5>
                            <p class="card-text">Daftar barang keluar</p>
                            <a href={{ route('stock-out.index') }} class="btn btn-primary">See</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </main>
@endsection
