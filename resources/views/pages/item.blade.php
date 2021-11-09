@extends('layouts.app')

@section('main')
    <main role="main" class="flex-shrink-0">
        <div class="container">
            <div class="d-flex bd-highlight">
                <div class="p-2 flex-grow-1 bd-highlight">
                    <h2 class="mt-5">Data Barang</h2>
                </div>
                @can('create items')
                <div class="p-2 bd-highlight">
                    <button type="button" class="mt-5 btn btn-sm btn-success" data-toggle="modal" data-target="#create"> +
                    </button>
                </div>
                @endcan
            </div>

            <nav aria-label="breadcrumb">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href={{ route('home') }}>Home</a></li>
                    <li class="breadcrumb-item active" aria-current="page">Barang</li>
                </ol>
            </nav>
            <table class="table">
                <thead>
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col">Kode</th>
                        <th scope="col">Nama</th>
                        <th scope="col">Satuan</th>
                        <th scope="col">Stok</th>
                        <th scope="col">Action</th>
                    </tr>
                </thead>
                <tbody>
                    @php
                        $i = 0;
                    @endphp
                    @foreach ($items as $item)
                        @php
                            $i++;
                        @endphp
                        <tr>
                            <th scope="row">{{ $i }}</th>
                            <td>{{ $item->item_code }}</td>
                            <td>{{ $item->name }}</td>
                            <td>{{ $item->unit }}</td>
                            <td>{{ $item->stock }}</td>
                            <td>
                                <button type="button" class="btn btn-sm btn-outline-info" data-toggle="modal"
                                    data-target="#show{{ $item->id }}">Lihat</button>
                                @can('edit items')
                                    <button type="button" class="btn btn-sm btn-outline-primary" data-toggle="modal"
                                        data-target="#update{{ $item->id }}">Ubah</button>
                                @endcan
                                @can('delete items')
                                    <button type=" button" class="btn btn-sm btn-outline-danger" data-toggle="modal"
                                        data-target="#destroy{{ $item->id }}">Hapus</button>F
                                @endcan
                            </td>
                        </tr>
                        <!-- show -->
                        <div class="modal fade" id="show{{ $item->id }}" tabindex="-1"
                            aria-labelledby="exampleModalLabel" aria-hidden="true">
                            <div class="modal-dialog">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="exampleModalLabel">Detail Data</h5>
                                        <button type="button" class="close" data-dismiss="modal"
                                            aria-label="Close">
                                            <span aria-hidden="true">&times;</span>
                                        </button>
                                    </div>
                                    <div class="modal-body">
                                        <ul>
                                            <li>Kode :&nbsp;{{ $item->item_code }}</li>
                                            <li>Nama :&nbsp;{{ $item->name }}</li>
                                            <li>Stok :&nbsp;{{ $item->stock }}</li>
                                            <li>Satuan :&nbsp;{{ $item->unit }}</li>
                                        </ul>
                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- update -->
                        <div class="modal fade" id="update{{ $item->id }}" tabindex="-1"
                            aria-labelledby="exampleModalLabel" aria-hidden="true">
                            <div class="modal-dialog">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="exampleModalLabel">Ubah Data</h5>
                                        <button type="button" class="close" data-dismiss="modal"
                                            aria-label="Close">
                                            <span aria-hidden="true">&times;</span>
                                        </button>
                                    </div>
                                    <form action="{{ route('items.update', $item->id) }}" method="post">
                                        @csrf
                                        @method('put')
                                        <div class="modal-body">
                                            <div class="row">
                                                <div class="col-12">
                                                    <div class="form-group">
                                                        <input class="form-control" name="item_code" type="text"
                                                            placeholder="Kode Barang" value="{{ $item->item_code }}">
                                                    </div>
                                                    <div class="form-group">
                                                        <input class="form-control" name="name" type="text"
                                                            placeholder="Nama Barang" value="{{ $item->name }}">
                                                    </div>
                                                    <div class="form-group">
                                                        <input class="form-control" name="unit" type="text"
                                                            placeholder="Satuan Barang" value="{{ $item->unit }}">
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="modal-footer">
                                            <button class="btn btn-light" type="button" data-dismiss="modal">Batal</button>
                                            <button class="btn btn-primary" type="submit">Ubah</button>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                        <!-- destroy -->
                        <div class="modal fade" id="destroy{{ $item->id }}" tabindex="-1"
                            aria-labelledby="exampleModalLabel" aria-hidden="true">
                            <div class="modal-dialog">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="exampleModalLabel">Ubah Data</h5>
                                        <button type="button" class="close" data-dismiss="modal"
                                            aria-label="Close">
                                            <span aria-hidden="true">&times;</span>
                                        </button>
                                    </div>
                                    <form action="{{ route('items.destroy', $item->id) }}" method="post">
                                        @csrf
                                        @method('delete')
                                        <div class="modal-body">
                                            <div class="row">
                                                <div class="col-12">
                                                    <h3>Apakah anda yakin ingin menghapus {{ $item->name }} ?</h3>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="modal-footer">
                                            <button class="btn btn-light" type="button" data-dismiss="modal">Batal</button>
                                            <button class="btn btn-danger" type="submit">Hapus</button>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </tbody>
            </table>
        </div>
    </main>
@endsection

<!-- create -->
<div class="modal fade" id="create" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Tambah Data</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form action="{{ route('items.store') }}" method="post">
                @csrf
                <div class="modal-body">
                    <div class="row">
                        <div class="col-12">
                            <div class="form-group">
                                <input class="form-control" name="item_code" type="text" placeholder="Kode Barang">
                            </div>
                            <div class="form-group">
                                <input class="form-control" name="name" type="text" placeholder="Nama Barang">
                            </div>
                            <div class="form-group">
                                <input class="form-control" name="unit" type="text" placeholder="Satuan Barang">
                            </div>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button class="btn btn-light" type="button" data-dismiss="modal">Batal</button>
                    <button class="btn btn-primary" type="submit">Simpan</button>
                </div>
            </form>
        </div>
    </div>
</div>
