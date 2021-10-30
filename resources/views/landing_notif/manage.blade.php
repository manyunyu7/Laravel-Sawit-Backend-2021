@extends('template')

@section('page-heading')
    <div class="page-heading">
        <div class="page-title">
            <div class="row">
                <div class="col-12 col-md-6 order-md-1 order-last">
                    <h3>Landing Notification</h3>
                    <p class="text-subtitle text-muted">Manage Landing Notification</p>
                </div>
                <div class="col-12 col-md-6 order-md-2 order-first">
                    <nav aria-label="breadcrumb" class="breadcrumb-header float-start float-lg-end">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="{{ url('material/manage') }}">Landing Notification</a>
                            </li>
                            <li class="breadcrumb-item active" aria-current="page">Manage</li>
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
                <h4>Landing Notification</h4>
                <p>Pesan Ini akan ditampilkan di halaman home user untuk notifikasi</p>
            </div>

            <div class="card-body">
                <form action="{{ url('landing-notif/store') }}" enctype="multipart/form-data" method="post">
                    @csrf
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="basicInput">Judul Pesan</label>
                                <input type="text" name="title" required class="form-control"
                                       value="{{ old('title') }}" required id="basicInput"
                                       placeholder="Judul">
                            </div>

{{--                            <div class="form-group">--}}
{{--                                <label for="basicInput">Warna Latar Belakang Notifikasi</label>--}}
{{--                                <input type="color" name="color" required class="form-control"--}}
{{--                                       value="{{ old('color') }}" id=" basicInput"--}}
{{--                                       placeholder="">--}}

{{--                            </div>--}}

                            <div class="form-group">
                                <label for="">Isi Notifikasi</label>
                                <textarea class="form-control" name="content_message" id="" rows="3"></textarea>
                            </div>

                        </div>

                        <div class="col-md-6">

{{--                            <div class="form-group">--}}
{{--                                <label for="formFile" class="form-label">Photo</label>--}}
{{--                                <input name="photo" class="form-control" type="file" id="formFile">--}}
{{--                            </div>--}}

                            <img src="https://i.stack.imgur.com/y9DpT.jpg" style="border-radius: 20px" id="imgPreview"
                                 class="img-fluid" alt="Responsive image">
                        </div>

                        <div class="col-12">
                            <button type="submit" class="btn btn-primary">Add Data</button>
                        </div>
                    </div>

                </form>

            </div>
        </div>
    </section>

    <!-- Input Style start -->
    <section id="input-style">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <h4 class="card-title">Notifikasi Saat Ini</h4>
                    </div>

                    <div class="card-body">

                        <div class="table-responsive">

                            <div
                                class="dataTable-wrapper dataTable-loading no-footer sortable searchable fixed-columns">
                                <div class="dataTable-container">
                                    <table class="table table-striped dataTable-table" id="table_data">
                                        <thead>
                                        <tr>
                                            <th data-sortable="">Judul</th>
                                            <th data-sortable="">Content</th>
{{--                                            <th data-sortable="">Photo</th>--}}
                                            <th data-sortable="">Dibuat Pada</th>
                                            <th data-sortable="">Hapus</th>
                                        </tr>
                                        </thead>
                                        <tbody>
                                        @forelse ($datas as $data)
                                            <tr>
                                                <td>{{ $data->title }}</td>
                                                <td>{{ $data->content_message }}</td>
{{--                                                <td>--}}
{{--                                                    <div style="--}}
{{--                                                width: 50px;--}}
{{--                                                height: 20px;--}}
{{--                                                background-color: {{$data->color}}">--}}

{{--                                                    </div>--}}
{{--                                                </td>--}}
{{--                                                <td>--}}
{{--                                                    <img height="200px" style="border-radius: 20px"--}}
{{--                                                         src='{{asset("$data->photo")}}' alt="">--}}
{{--                                                </td>--}}

                                                <td>{{ $data->created_at }}</td>
                                                <td>
                                                    <a href='{{url("landing-notif/$data->id/delete")}}' id="{{ $data->id }}" type="button"
                                                            class="btn btn-danger btn-delete">Delete Data
                                                    </a>
                                                </td>
                                            </tr>
                                        @empty

                                        @endforelse

                                        </tbody>
                                    </table>
                                </div>

                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>


    <!-- Modal -->
    <div class="modal fade" id="destroy-modal" tabindex="-1" role="dialog" aria-labelledby="modelTitleId"
         aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header bg-danger">
                    <h5 class="modal-title white" id="myModalLabel120">
                        Apakah Anda Yakin ingin menghapus data ini ?
                    </h5>
                    <button type="button" class="close hide-modal" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    Aksi Ini Tidak Dapat Dibatalkan
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-light-secondary hide-modal" data-dismiss="modal">
                        <i class="bx bx-x d-block d-sm-none"></i>
                        <span class=" d-sm-block">Close</span>
                    </button>

                    <a class="btn-destroy" href="">
                        <button type="button" class="btn btn-danger ml-1 hide-modal " data-dismiss="modal">
                            <i class="bx bx-check d-block d-sm-none"></i>
                            <span class=" d-sm-block">Delete</span>
                        </button>
                    </a>

                </div>
            </div>
        </div>
    </div>


@endsection


@push('script')
    <script>
        var el = document.getElementById('formFile');
        el.onchange = function () {
            var fileReader = new FileReader();
            fileReader.readAsDataURL(document.getElementById("formFile").files[0])
            fileReader.onload = function (oFREvent) {
                document.getElementById("imgPreview").src = oFREvent.target.result;
            };
        }


        $(document).ready(function () {
            $.myfunction = function () {
                $("#previewName").text($("#inputTitle").val());
                var title = $.trim($("#inputTitle").val())
                if (title == "") {
                    $("#previewName").text("Judul")
                }
            };

            $("#inputTitle").keyup(function () {
                $.myfunction();
            });

        });

        $('body').on("click", ".btn-delete", function () {
            id = $(this).attr("id")
            // $(".btn-destroy").attr("href", window.location.origin + "/rs/" + id + "/delete")
            $("#destroy-modal").modal("show")
        });

    </script>
@endpush
