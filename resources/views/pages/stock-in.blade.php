@extends('layouts.app')

@section('main')
    <main role="main" class="flex-shrink-0">
        <div class="container">
            <div class="d-flex bd-highlight">
                <div class="p-2 flex-grow-1 bd-highlight">
                    <h2 class="mt-5">Stok Masuk</h2>
                </div>
                <div class="p-2 bd-highlight">
                    <a href={{ route('items.index') }} type="button" class="mt-5 btn btn-sm btn-success"> Lihat Stok
                    </a>
                </div>
            </div>

            <nav aria-label="breadcrumb">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href={{ route('home') }}>Home</a></li>
                    <li class="breadcrumb-item active" aria-current="page">Stok Masuk</li>
                </ol>
            </nav>
            @can('create item')
                <div class="card card-default">
                    <div class="card-body">
                        <form id="addStock" method="POST" action="">
                            <div class="form-row">
                                <div class="form-group col-md-6">
                                    <select class="form-control" id="itemSelect">
                                        <option value="">Pilih Barang...</option>
                                        @foreach ($items as $item)
                                            <option value="{{ $item->id }}">
                                                {{ $item->name }}
                                            </option>
                                        @endforeach
                                    </select>
                                </div>
                                <input type="hidden" id="name" name="name">
                                <input type="hidden" id="item_id" name="item_id">
                                <div class="form-group col-md-6">
                                    <input class="form-control" name="item_code" id="item_code" type="text"
                                        placeholder="Kode Barang">
                                </div>
                                <div class="form-group col-md-6">
                                    <input class="form-control" name="unit" id="unit" type="text" placeholder="Satuan">
                                </div>
                                <div class="form-group col-md-6">
                                    <input class="form-control" name="amount" id="amount" type="number" placeholder="Jumlah">
                                </div>
                                <div class="form-group col-md-6">
                                    <select class="form-control" id="itemSelect" name="status">
                                        <option value="">Pilih Status...</option>
                                        <option value="pembelian">Pembelian</option>
                                        <option value="pembelian">Retur</option>
                                    </select>
                                </div>
                            </div>
                            <button id="submitItem" type="button" class="btn btn-success mb-2">Submit</button>
                        </form>
                    </div>
                </div>
            @endcan


            <table class="table mt-2">
                <thead>
                    <tr>
                        <th scope="col">Tanggal</th>
                        <th scope="col">Kode Barang</th>
                        <th scope="col">Nama Barang</th>
                        <th scope="col">Jumlah</th>
                        <th scope="col">Satuan</th>
                        <th scope="col">Status</th>
                    </tr>
                </thead>
                <tbody id="tbody">

                </tbody>
            </table>
        </div>
    </main>
@endsection

@push('script')
    <script src="https://www.gstatic.com/firebasejs/5.10.1/firebase.js"></script>
    <script src="https://code.jquery.com/jquery-3.4.0.min.js"></script>
    <script>
        const getDate = () => {
            let today = new Date();
            let dd = today.getDate();
            let mm = today.getMonth() + 1;
            let yyyy = today.getFullYear();

            if (dd < 10) {
                dd = '0' + dd;
            }

            if (mm < 10) {
                mm = '0' + mm;
            }

            return today = dd + '-' + mm + '-' + yyyy;
        }

        $(document).ready(function() {
            $('#itemSelect').change(function() {
                let itemId = $(this).val()
                $.ajax({
                    type: "GET",
                    url: `{{ url('api/items/${itemId}') }}`,
                    data: "id=itemId",
                    dataType: "json",
                    success: (response) => {
                        console.log(response);
                        document.getElementById("item_id").value = response.data.id;
                        document.getElementById("name").value = response.data.name;
                        document.getElementById("item_code").value = response.data.item_code;
                        document.getElementById("unit").value = response.data.unit;
                    }
                });
            });
        });
    </script>
    <script>
        let config = {
            apiKey: "{{ config('services.firebase.api_key') }}",
            authDomain: "{{ config('services.firebase.auth_domain') }}",
            databaseURL: "{{ config('services.firebase.database_url') }}",
            storageBucket: "{{ config('services.firebase.storage_bucket') }}",
        };

        firebase.initializeApp(config);

        let database = firebase.database();

        let lastIndex = 0;

        // Get Data
        firebase.database().ref('stock-in/').on('value', function(snapshot) {
            var value = snapshot.val();
            var htmls = [];
            $.each(value, function(index, value) {
                if (value) {
                    htmls.push(
                        '<tr><td>' + value.date +
                        '</td><td>' + value.itemCode +
                        '</td><td>' + value.name +
                        '</td><td>' + value.amount +
                        '</td><td>' + value.unit +
                        '</td><td>' + value.status + '</td></tr>');
                }
                lastIndex = index;
            });
            $('#tbody').html(htmls);
            $("#submitUser").removeClass('desabled');
        });

        // Add Data
        $('#submitItem').on('click', () => {
            let values = $("#addStock").serializeArray();
            let name = values[0].value;
            let itemId = values[1].value;
            let itemCode = values[2].value;
            let unit = values[3].value;
            let amount = values[4].value;
            let status = values[5].value;
            let id = lastIndex + 1;

            console.log(amount);

            firebase.database().ref('stock-in/' + id).set({
                date: getDate(),
                itemCode: itemCode,
                name: name,
                unit: unit,
                amount: amount,
                status: status
            });

            $.ajax({
                type: "PUT",
                url: `{{ url('api/items/${itemId}/stocks/in') }}`,
                data: {
                    "amount": amount
                },
                dataType: "json",
                success: (response) => {
                    console.log("ok");
                },
                error: (error) => {
                    console.error(error.message);
                }
            });

            // Reassign lastID value
            lastIndex = id;
            $("#addStock input").val("");
        });
    </script>
@endpush
