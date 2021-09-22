@extends('template')

@section('page-heading')
    <div class="page-heading">
        <div class="page-title">
            <div class="row">
                <div class="col-12 col-md-6 order-md-1 order-last">
                    <h3>Detail Permintaan Jual Sawit</h3>
                    <p class="text-subtitle text-muted">Permintaan Jual Sawit</p>
                </div>
                <div class="col-12 col-md-6 order-md-2 order-first">
                    <nav aria-label="breadcrumb" class="breadcrumb-header float-start float-lg-end">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="{{ url('material/manage') }}">Permintaan Jual</a></li>
                            <li class="breadcrumb-item active" aria-current="page">Detail</li>
                        </ol>
                    </nav>
                </div>
            </div>
        </div>
    </div>
@endsection

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
                                <img height="300px" src="{{$item->photo_path}}" class="d-block w-100"
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

        <div class="row">
            <div class="col-6 col-lg-3 col-md-6">
                <div class="card">
                    <div class="card-body px-3 py-4-5">
                        <div class="row">
                            <div class="col-md-4">
                                <div class="stats-icon blue">
                                    <i class="iconly-boldProfile"></i>
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
                                <h6 class="font-extrabold mb-0">{{$price->price}} % </h6>
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
                                    <img src="{{$data->user_photo}}" alt="" srcset="">
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


                        </div>
                    </div>
                    <div class="tab-pane fade" id="driver" role="tabpanel" aria-labelledby="driver-tab">
                        <div class="border p-3">
                            @if($driver_data!=null)
                                <div class="avatar avatar-xl mb-3">
                                    <img src="{{$driver_data->user_photo}}" alt="" srcset="">
                                </div>
                                <ul>
                                    <li class="mt-3">Nama : {{$driver_data->name}}</li>
                                    <li>Email : {{$driver_data->email}}</li>
                                    <li>Contact : {{$driver_data->contact}}</li>
                                    <li>Kontak Darurat : {{$staff_data->contact}}</li>
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

                            <form action="{{url('rs/change-driver')}}" method="post">
                                @csrf
                                <div class="form-group">
                                    <input hidden name="id" value="{{$data->id}}">
                                    <label for="">Pindah Tugaskan Ke : (Pilih Driver Baru)</label>
                                    <select class="form-control form-select" name="staff_id">
                                        <option value="">Pilih Driver/option>
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
                <h5>Status Saat Ini : {{$data->status_desc}}</h5>

                <form action="{{ url('rs/change-status') }}" enctype="multipart/form-data" method="post">
                    @csrf
                    <input hidden name="id" value="{{$data->id}}">
                    <div class="form-group">
                        <label for="">Ubah Status</label>
                        <select required class="form-control form-select" name="status" id="">
                            <option>Pilih Status Baru</option>
                            <option value="3">Menunggu Diproses</option>
                            <option value="2">Diproses</option>
                            <option value="4">Dalam Penjemputan</option>
                            <option value="1">Sukses</option>
                            <option value="0">Dibatalkan</option>
                        </select>
                    </div>

                    <button type="submit" class="btn mt-1 mb-3 btn-outline-primary">
                        Simpan Perubahan Status
                    </button>

                </form>


                <form action="{{ url('news/store') }}" enctype="multipart/form-data" method="post">
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

                </form>


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
