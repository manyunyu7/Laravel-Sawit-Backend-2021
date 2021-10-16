@extends('template')


@section('page-content')
    <section class="section">
        @include('components.message')
    </section>

    <section class="section">

        <div class="card">
            <div class="card-header">
                <h4 class="">Foto Permintaan Penjualan</h4>
            </div>
            <div class="card-body">
                <div id="carouselExampleCaptions" class="carousel slide" data-bs-ride="carousel">
                    <ol class="carousel-indicators">
                        <li data-bs-target="#carouselExampleCaptions" data-bs-slide-to="0" class=""></li>
                        <li data-bs-target="#carouselExampleCaptions" data-bs-slide-to="1"
                            class="active"></li>
                        <li data-bs-target="#carouselExampleCaptions" data-bs-slide-to="2"></li>
                        <li data-bs-target="#carouselExampleCaptions" data-bs-slide-to="3"></li>
                        <li data-bs-target="#carouselExampleCaptions" data-bs-slide-to="4"></li>
                        <li data-bs-target="#carouselExampleCaptions" data-bs-slide-to="5"></li>
                    </ol>
                    <div class="carousel-inner">
                        @forelse($data->photo_list as $item)
                            <div class="carousel-item @if($loop->iteration==1) active @endif">
                                <img height="200px" src="{{$item->photo_path}}" class="d-block w-100"
                                     alt="..." style="  object-fit: cover;">
                                <div class="carousel-caption d-none d-md-block">
                                    <p>Foto Penjualan Sawit</p>
                                </div>
                            </div>
                        @empty


                        @endforelse
                    </div>
                    <a class="carousel-control-prev" href="#carouselExampleCaptions" role="button"
                       data-bs-slide="prev">
                        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                        <span class="visually-hidden">Previous</span>
                    </a>
                    <a class="carousel-control-next" href="#carouselExampleCaptions" role="button"
                       data-bs-slide="next">
                        <span class="carousel-control-next-icon" aria-hidden="true"></span>
                        <span class="visually-hidden">Next</span>
                    </a>
                </div>
            </div>
        </div>

        <div class="row ">
            <div class="col-6 col-lg-3 col-md-6">
                <div class="card">
                    <div class="card-body px-3 py-4-5">
                        <div class="row">
                            <div class="col-md-4">
                                <div class="stats-icon purple">
                                    <i class="iconly-boldShow"></i>
                                </div>
                            </div>
                            <div class="col-md-8">
                                <h6 class="text-muted font-semibold">Harga TBS Saat Request</h6>
                                <h6 class="font-extrabold mb-0">Rp. {{$data->est_price}} </h6>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-6 col-lg-3 col-md-6">
                <div class="card">
                    <div class="card-body px-3 py-4-5">
                        <div class="row">
                            <div class="col-md-4">
                                <div class="stats-icon purple">
                                    <i class="iconly-boldShow"></i>
                                </div>
                            </div>
                            <div class="col-md-8">
                                <h6 class="text-muted font-semibold">Margin Jual Saat Request</h6>
                                <h6 class="font-extrabold mb-0">{{$data->est_margin*100}} % </h6>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-6 col-lg-3 col-md-6">
                <div class="card">
                    <div class="card-body px-3 py-4-5">
                        <div class="row">
                            <div class="col-md-4">
                                <div class="stats-icon purple">
                                    <i class="iconly-boldShow"></i>
                                </div>
                            </div>
                            <div class="col-md-8">
                                <h6 class="text-muted font-semibold">Harga Jual Saat Ini<br></h6>
                                <h6 class="font-extrabold mb-0">{{$price->price}}</h6>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-6 col-lg-3 col-md-6">
                <div class="card">
                    <div class="card-body px-3 py-4-5">
                        <div class="row">
                            <div class="col-md-4">
                                <div class="stats-icon purple">
                                    <i class="iconly-boldShow"></i>
                                </div>
                            </div>
                            <div class="col-md-8">
                                <h6 class="text-muted font-semibold">Margin TBS Saat Ini<br></h6>
                                <h6 class="font-extrabold mb-0">{{$price->margin*100}} % </h6>
                            </div>
                        </div>
                    </div>
                </div>
            </div>


        </div>

        <div class="card">
            <div class="card-header">
                <h3>Data User</h3>
            </div>
            <div class="card-body">
                <ul class="nav nav-tabs" id="myTab" role="tablist">
                    <li class="nav-item" role="presentation">
                        <a class="nav-link active" id="owner-tab"
                           data-bs-toggle="tab" href="#owner" role="tab" aria-controls="home" aria-selected="true">Pemilik
                            Kebun</a>
                    </li>
                    <li class="nav-item" role="presentation">
                        <a class="nav-link" id="driver-tab" data-bs-toggle="tab" href="#driver" role="tab"
                           aria-controls="driver" aria-selected="false">Driver</a>
                    </li>
                    <li class="nav-item" role="presentation">
                        <a class="nav-link" id="truck-tab" data-bs-toggle="tab" href="#truck" role="tab"
                           aria-controls="driver" aria-selected="false">Truck</a>
                    </li>
                    <li class="nav-item" role="presentation">
                        <a class="nav-link" id="staff-tab" data-bs-toggle="tab" href="#staff" role="tab"
                           aria-controls="staff" aria-selected="false">Staff</a>
                    </li>
                </ul>
                <div class="tab-content" id="myTabContent">
                    <div class="tab-pane fade active show" id="owner" role="tabpanel" aria-labelledby="owner-tab">
                        <div class="border p-3">
                            <div class="avatar avatar-xl mb-3">
                                <img src="{{$data->user_photo}}" alt="" srcset="">
                            </div>
                            <ul>
                                <li class="mt-3">Nama : {{$data->user_name}}</li>
                                <li>Email : {{$user_data->email}}</li>
                                <li>Contact : {{$user_data->contact}}</li>
                                <li>Kontak Darurat : {{$data->contact}}</li>
                            </ul>
                        </div>
                    </div>
                    <div class="tab-pane fade" id="staff" role="tabpanel" aria-labelledby="staff-tab">
                        <div class="border p-3">
                            @if($staff_data!=null)
                                <div class="avatar avatar-xl mb-3">
                                    <img src="{{$staff_data->photo_path}}" alt="" srcset="">
                                </div>
                                <ul>
                                    <li class="mt-3">Nama : {{$staff_data->name}}</li>
                                    <li>Email : {{$staff_data->email}}</li>
                                    <li>Contact : {{$staff_data->contact}}</li>
                                    <li>Kontak Darurat : {{$staff_data->contact}}</li>
                                </ul>

                            @else
                                <div class="alert alert-primary alert-dismissible fade show" role="alert">
                                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                    <strong>Belum Ada Staff</strong>
                                </div>

                                <script>
                                    $(".alert").alert();
                                </script>
                            @endif

                            @if($mobile_user->role!=3)
                                <form action="{{url('rs/change-staff')}}" method="post">
                                    @csrf
                                    <div class="form-group">
                                        <input hidden name="id" value="{{$data->id}}">
                                        <label for="">Pindah Tugaskan Ke : (Pilih Staff Baru)</label>
                                        <select class="form-control form-select" name="staff_id">
                                            <option value="">Pilih Staff</option>
                                            @forelse($staffs as $item)
                                                <option value="{{$item->id}}"> {{$item->name}}</option>
                                            @empty

                                            @endforelse
                                        </select>
                                        <button
                                            id="btn-save-change-staff"
                                            type="submit"
                                            class="btn btn-outline-primary mt-4">Simpan Perubahan
                                        </button>
                                    </div>
                                </form>
                            @endif


                        </div>
                    </div>
                    <div class="tab-pane fade" id="driver" role="tabpanel" aria-labelledby="driver-tab">
                        <div class="border p-3">
                            @if($driver_data!=null)
                                <div class="avatar avatar-xl mb-3">
                                    <img src="{{$driver_data->photo_path}}" alt="" srcset="">
                                </div>
                                <ul>
                                    <li class="mt-3">Nama : {{$driver_data->name}}</li>
                                    <li>Email : {{$driver_data->email}}</li>
                                    <li>Contact : {{$driver_data->contact}}</li>
                                    <li>Kontak Darurat : {{$driver_data->contact}}</li>
                                </ul>
                            @else
                                <div class="alert alert-primary alert-dismissible fade show" role="alert">
                                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                    <strong>Belum Ada Driver</strong>
                                </div>

                                <script>
                                    $(".alert").alert();
                                </script>
                            @endif

                            @if($mobile_user->role!=3)
                                <form action="{{url('rs/change-driver')}}" method="post">
                                    @csrf
                                    <div class="form-group">
                                        <input hidden name="id" value="{{$data->id}}">
                                        <label for="">Pindah Tugaskan Ke : (Pilih Driver Baru)</label>
                                        <select class="form-control form-select" name="staff_id">
                                            <option value="">Pilih Driver</option>
                                            @forelse($staffs as $item)
                                                <option value="{{$item->id}}"> {{$item->name}}</option>
                                            @empty

                                            @endforelse
                                        </select>
                                        <button
                                            id="btn-save-change-staff"
                                            type="submit"
                                            class="btn btn-outline-primary mt-4">Simpan Perubahan
                                        </button>
                                    </div>
                                </form>
                            @endif


                        </div>
                    </div>

                    <div class="tab-pane fade" id="truck" role="tabpanel" aria-labelledby="truck-tab">
                        <div class="border p-3">
                            @if($data->truck!=null)
                                <img height="300px" style="border-radius: 20px" src="{{$data->truck->photo}}" alt=""
                                     srcset="">
                                <ul>
                                    <li class="mt-3">Nama : {{$data->truck->name}}</li>
                                    <li>Nopol : {{$data->truck->nopol}}</li>
                                </ul>
                            @else
                                <div class="alert alert-primary alert-dismissible fade show" role="alert">
                                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                    <strong>Belum Ada Truck</strong>
                                </div>

                                <script>
                                    $(".alert").alert();
                                </script>
                            @endif

                            @if($mobile_user->role!=3)
                                <form action="{{url('rs/change-truck')}}" method="post">
                                    @csrf
                                    <div class="form-group">
                                        <input hidden name="id" value="{{$data->id}}">
                                        <label for="">Pindah Tugaskan Ke : (Pilih Truck Baru)</label>
                                        <select class="form-control form-select" required name="truck_id">
                                            <option value="">Pilih Truck</option>
                                            @forelse($trucks as $item)
                                                <option
                                                    value="{{$item->id}}"> {{$item->name}}  {{$item->nopol}}</option>
                                            @empty

                                            @endforelse
                                        </select>
                                        <button
                                            id="btn-save-change-staff"
                                            type="submit"
                                            class="btn btn-outline-primary mt-4">Simpan Perubahan
                                        </button>
                                    </div>
                                </form>
                            @endif


                        </div>
                    </div>


                </div>
            </div>
        </div>

        <div class="card">
            <div class="card-header">
                <h3 class="">Detail Permintaan Jual Sawit</h3>
            </div>

            <div class="card-body">
                <h5>Status Saat Ini :<br> {{$data->status_desc}}</h5>


                @if($mobile_user->role!=3)
                    <form action="{{ url('rs/change-status') }}" enctype="multipart/form-data" method="post">
                        @csrf
                        <input hidden name="id" value="{{$data->id}}">
                        <div class="form-group">
                            <label for="">Ubah Status</label>
                            <select required class="form-control form-select" name="status" id="">
                                <option>Pilih Status Baru</option>
                                <option value="3" {{ ($data->status) == 3 ? 'selected' : '' }}>Menunggu Diproses</option>
                                <option value="2" {{ ($data->status) == 2 ? 'selected' : '' }}>Diproses</option>
                                <option value="5" {{ ($data->status) == 5 ? 'selected' : '' }}>
                                    Sedang Dilokasi / Sedang Ditimbang
                                </option>
                                <option value="4" {{ ($data->status) == 4 ? 'selected' : '' }}>Dalam Penjemputan</option>
                                <option value="1" {{ ($data->status) == 1 ? 'selected' : '' }}>Sukses</option>
                                <option value="0" {{ ($data->status) == 0 ? 'selected' : '' }}>Dibatalkan</option>
                            </select>
                        </div>

                        <button type="submit" class="btn mt-1 mb-3 btn-outline-primary">
                            Simpan Perubahan Status
                        </button>

                    </form>
                @endif



                @csrf

                <div class="border p-3">
                    <h4>Perkiraan Harga Jual</h4>
                    <ul class="text-dark">
                        <li>Berat Sawit : {{$data->est_weight}} Kg</li>
                        <li>Harga Saat Request Dilakukan : Rp. {{number_format(($data->est_price) *
                                ($data->est_weight - ($data->est_weight*$data->est_margin)),2,',','.')}}</li>
                        <li>Harga Terbaru : Rp. {{number_format(($price->price) *
                                ($data->est_weight - ($data->est_weight*$price->margin)),2,',','.')}}</li>

                    </ul>
                </div>

                <div class="border p-3">
                    <ul class="text-dark">
                        <li>Email : {{$user_data->email}}</li>
                        <li>Contact : {{$user_data->contact}}</li>
                        <li>Kontak Darurat : {{$data->contact}}</li>
                        <li>Alamat Penjualan : <br> {{$data->address}}</li>
                    </ul>
                </div>

            </div>
        </div>

        @if($mobile_user->role!=3)
            <div class="card">
                <div class="card-header">
                    <h3 class="">Update Data</h3>
                </div>

                <div class="card-body">
                    <form action="{{ url('rs/change-major') }}" method="post">
                        <input type="hidden" name="id" value="{{$data->id}}">
                        @csrf
                        <div class="row">
                            <div class="col-md-12">
                                <ul>
                                    <li>Status Saat Ini : <strong>{{$data->status_desc}}</strong></li>
                                    <li>Driver Saat ini :</li>
                                    <li>Staff Saat Ini :</li>
                                    <li>Kendaraan Saat Ini :</li>
                                </ul>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="basicInput">Driver Saat Ini
                                        : {{$data->driver_name ?: "Belum Ada Driver"}}</label>
                                    <select class="form-control form-select" name="driver_id" id="">
                                        <option value="">Pilih Driver Baru</option>
                                        @forelse($staffs as $item)
                                            <option
                                                value="{{$item->id}}" {{ ($item->id) == ($data->driver_id) ? 'selected' : '' }}>
                                                {{$item->name}}
                                            </option>
                                        @empty

                                        @endforelse
                                    </select>
                                </div>

                                <div class="form-group">
                                    <label for="basicInput">{{$data->staff_name ?: "Belum Ada Staff"}}</label>
                                    <select class="form-control form-select" name="staff_id" id="">
                                        <option value="">Pilih Driver Baru</option>
                                        @forelse($staffs as $item)
                                            <option
                                                value="{{$item->id}}" {{ ($item->id) == ($data->staff_id) ? 'selected' : '' }}>
                                                {{$item->name}}
                                            </option>
                                        @empty

                                        @endforelse
                                    </select>
                                </div>
                            </div>

                            <div class="col-md-6">

                                <div class="form-group">
                                    <label for="basicInput">{{$data->truck_name ?: "Belum Ada Truck"}}</label>
                                    <select class="form-control form-select" name="truck_id" id="">
                                        <option value="">Pilih Truck Baru</option>
                                        @forelse($trucks as $item)
                                            <option
                                                value="{{$item->id}}" {{ ($item->id) == ($data->truck_id) ? 'selected' : '' }}>
                                                {{$item->name}}
                                            </option>
                                        @empty

                                        @endforelse
                                    </select>
                                </div>

                                <div class="form-group">
                                    <label for="">Ubah Status</label>
                                    <select class="form-control form-select" name="status" id="">
                                        <option value="">Pilih Status Baru</option>
                                        <option value="3" {{ ($data->status) == 3 ? 'selected' : '' }}>
                                            Menunggu Diproses
                                        </option>
                                        <option value="2" {{ ($data->status) == 2 ? 'selected' : '' }}>
                                            Diproses
                                        </option>
                                        <option value="4" {{ ($data->status) == 4 ? 'selected' : '' }}>
                                            Dalam Penjemputan
                                        </option>
                                        <option value="5" {{ ($data->status) == 5 ? 'selected' : '' }}>
                                            Sedang Dilokasi / Sedang Ditimbang
                                        </option>
                                        <option value="1" {{ ($data->status) == 1 ? 'selected' : '' }}>
                                            Sukses
                                        </option>
                                        <option value="1" {{ ($data->status) == 0 ? 'selected' : '' }}>
                                            Dibatalkan
                                        </option>
                                    </select>
                                </div>
                            </div>

                            <div class="col-12">
                                <button type="submit" class="btn btn-primary">Simpan Perubahan</button>
                            </div>
                        </div>

                    </form>

                </div>
            </div>
        @endif


        <div class="card">
            <div class="card-header">
                <h3 class="">Riwayat Proses Transaksi</h3>
            </div>

            <div class="card-body">
                <h5>Status Saat Ini : {{$data->status_desc}}</h5>

                @forelse($history_data as $item)
                    <div class="alert alert-light-success color-success"><i class="bi bi-check-circle"></i>
                        {!! $item->desc !!}
                    </div>
                @empty


                @endforelse
            </div>
        </div>
    </section>

@endsection

@push('page-style')
    <link rel="stylesheet" href="{{ asset('/frontend') }}/assets/vendors/summernote/summernote-lite.min.css">

@endpush

@push('script')
    <script src="{{ asset('/frontend') }}/assets/vendors/jquery/jquery.min.js"></script>
    <script src="{{ asset('/frontend') }}/assets/vendors/summernote/summernote-lite.min.js"></script>

    <script>
        $('#summernote').summernote({
            tabsize: 2,
            height: 120,
        })
        $("#hint").summernote({
            height: 500,
            toolbar: false,
            placeholder: 'type with apple, orange, watermelon and lemon',
            hint: {
                words: ['apple', 'orange', 'watermelon', 'lemon'],
                match: /\b(\w{1,})$/,
                search: function (keyword, callback) {
                    callback($.grep(this.words, function (item) {
                        return item.indexOf(keyword) === 0;
                    }));
                }
            }
        });
    </script>
@endpush
