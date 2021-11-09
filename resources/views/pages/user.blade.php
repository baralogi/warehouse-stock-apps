@extends('layouts.app')

@section('main')
    <main role="main" class="flex-shrink-0">
        <div class="container">
            <div class="d-flex bd-highlight">
                <div class="p-2 flex-grow-1 bd-highlight">
                    <h2 class="mt-5">Data Pengguna</h2>
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
                    <li class="breadcrumb-item active" aria-current="page">Pengguna</li>
                </ol>
            </nav>
            <table class="table">
                <thead>
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col">Nama</th>
                        <th scope="col">Email</th>
                        <th scope="col">Jabatan</th>
                    </tr>
                </thead>
                <tbody>
                    @php
                        $i = 0;
                    @endphp
                    @foreach ($users as $user)
                        @php
                            $i++;
                        @endphp
                        <tr>
                            <th scope="row">{{ $i }}</th>
                            <td>{{ $user->name }}</td>
                            <td>{{ $user->email }}</td>
                            @foreach ($user->roles as $role)
                                <td>{{ $role->name }}</td>
                            @endforeach
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </main>
@endsection
