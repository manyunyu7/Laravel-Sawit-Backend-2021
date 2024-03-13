@extends('template')

@section('page-heading')
    <div class="page-heading">
        <div class="page-title">
            <div class="row">
                <div class="col-12 col-md-6 order-md-1 order-last">
                    <h3>Manage Permintaan</h3>
                    <p class="text-subtitle text-muted">Permintaan Saya</p>
                </div>
                <div class="col-12 col-md-6 order-md-2 order-first">
                    <nav aria-label="breadcrumb" class="breadcrumb-header float-start float-lg-end">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="#">Permintaan</a></li>
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

    <!-- Input Style start -->
    <section id="input-style">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <a href="{{url("/cmc/create-new")}}">
                            <div class="btn btn-outline-primary mb-3">Buat Permintaan Baru</div>
                        </a>
                        <h4 class="card-title">Lihat Seluruh Pemintaan Saya</h4>
                    </div>

                    <div class="card-body">


                        @if(count($datas) == 0)
                            <div class="text-center">
                                <iframe src="https://lottie.host/embed/b4d8d750-88a2-4492-a776-91de77675034/AKuJuLPq5m.json"></iframe>
                                <p class="text-black">Belum Ada Permintaan Yang Perlu Diproses</p>
                            </div>
                        @endif
                        <div class="table-responsive  @if(count($datas)==0) d-none @endif  ">
                            <div
                                class="dataTable-wrapper dataTable-loading no-footer sortable searchable fixed-columns">
                                <div class="dataTable-container">
                                    <table class="table table-striped dataTable-table" id="table_data">
                                        <thead>
                                        <tr>
                                            <th data-sortable="" class="text-nowrap">No</th>
                                            <th data-sortable="" class="text-nowrap">Nomor Surat Jalan</th>
                                            <th data-sortable="" class="text-nowrap">Dijual Kepada</th>
                                            <th data-sortable="" class="text-nowrap">Dikirim Ke</th>
                                            <th data-sortable="" class="text-nowrap">Alamat Pengambilan</th>
                                            <th data-sortable="" class="text-nowrap">Disiapkan Oleh</th>
                                            <th data-sortable="" class="text-nowrap">Tanggal</th>
                                            <th data-sortable="" class="text-nowrap"></th>
                                        </tr>
                                        </thead>
                                        <tbody>
                                        @forelse ($datas as $data)

                                            @php
                                                $disiapkanOlehName = \App\Models\User::findOrFail($data->disiapkan_oleh)->name;
                                            @endphp
                                            <tr>
                                                <td>{{ $loop->iteration }}</td>
                                                <td>{{ $data->nomor_surat_jalan }}</td>
                                                <td>{{ $data->dijual_kepada }}</td>
                                                <td>{{ $data->dikirim_ke }}</td>
                                                <td>{{ $data->alamat_pengambilan }}</td>
                                                <td>{{ $disiapkanOlehName }}</td>
                                                <td>{{ $data->created_at }}</td>
                                                <td>
                                                    <a href="{{url('cmc/'.$data->id.'/edit')}}">
                                                        <button id="{{ $data->id }}" type="button"
                                                                class="btn btn-primary text-nowrap">Edit Data
                                                        </button>
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
    <script type="text/javascript"
            src="https://cdn.datatables.net/v/bs4-4.1.1/jszip-2.5.0/dt-1.10.23/b-1.6.5/b-colvis-1.6.5/b-flash-1.6.5/b-html5-1.6.5/b-print-1.6.5/cr-1.5.3/r-2.2.7/sb-1.0.1/sp-1.2.2/datatables.min.js">
    </script>
    <script type="text/javascript" charset="utf8"
            src="https://cdn.datatables.net/buttons/1.6.5/js/dataTables.buttons.min.js"></script>
    <script type="text/javascript" charset="utf8" src="https://cdnjs.cloudflare.com/ajax/libs/jszip/3.1.3/jszip.min.js">
    </script>
    <script type="text/javascript" charset="utf8"
            src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/vfs_fonts.js">
    </script>
    <script type="text/javascript" charset="utf8"
            src="https://cdn.datatables.net/buttons/1.6.5/js/buttons.html5.min.js">
    </script>

    <script type="text/javascript">
        $(function () {
            var table = $('#table_data').DataTable({
                processing: true,
                serverSide: false,
                columnDefs: [{
                    orderable: true,
                    targets: 0
                }],
                dom: 'T<"clear">lfrtip<"bottom"B>',
                "lengthMenu": [
                    [10, 25, 50, -1],
                    [10, 25, 50, "All"]
                ],
                buttons: [
                    'copyHtml5',
                    {
                        extend: 'excelHtml5',
                        title: 'Data Export {{ \Carbon\Carbon::now()->year }}'
                    },
                    'csvHtml5',
                ],
            });


        });

        $('body').on("click", ".btn-delete", function () {
            var id = $(this).attr("id")
            $(".btn-destroy").attr("href", window.location.origin + "/armada/" + id + "/delete")
            $("#destroy-modal").modal("show")
        });
    </script>

@endpush
