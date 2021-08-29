@extends('template')

@section('page-heading')
    <div class="page-heading">
        <div class="page-title">
            <div class="row">
                <div class="col-12 col-md-6 order-md-1 order-last">
                    <h3>Armada</h3>
                    <p class="text-subtitle text-muted">Edit Armada</p>
                </div>
                <div class="col-12 col-md-6 order-md-2 order-first">
                    <nav aria-label="breadcrumb" class="breadcrumb-header float-start float-lg-end">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="{{ url('material/manage') }}">Armada</a></li>
                            <li class="breadcrumb-item active" aria-current="page">Tambah</li>
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
                <h4 class="card-title">Tambah Armada Baru</h4>
            </div>

            <div class="card-body">
                <form action="{{ url('armada/'.$data->id.'/update') }}" enctype="multipart/form-data" method="post">
                    @csrf
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="basicInput">Nama Armada</label>
                                <input type="text" name="armada_name" required class="form-control"
                                       value="{{ old('armada_name',$data->name) }}"
                                       placeholder="Nama Armada">
                            </div>

                            <div class="form-group">
                                <label for="basicInput">Nomor Polisi</label>
                                <input type="text" name="nopol" required class="form-control"
                                       value="{{ old('nopol',$data->nopol) }}"
                                       placeholder="Nomor Polisi">
                            </div>

                            <div class="form-group">
                                <label for="">Tipe Bahan Bakar</label>
                                <select class="form-control form-select" name="fuel_type" id="">
                                    <option value="">Pilih Bahan Bakar</option>
                                    <option value="Solar" @if($data->fuel_type=="Solar") selected @endif >Solar</option>
                                    <option value="Bensin"  @if($data->fuel_type=="Bensin") selected @endif >Bensin</option>
                                </select>
                            </div>

                            <div class="form-group">
                                <label for="">Deskripsi Armada</label>
                                <textarea class="form-control" name="description"  placeholder="Deskripsi Armada" rows="3">{{$data->description}}</textarea>
                            </div>


                        </div>

                        <div class="col-md-6">

                            <div class="form-group">
                                <label for="formFile" class="form-label">Ganti Foto</label>
                                <input name="photo" class="form-control" type="file" id="formFile">
                            </div>

                            <img src='{{asset($data->photo)}}' style="border-radius: 20px" id="imgPreview" class="img-fluid" alt="Responsive image">
                        </div>

                        <div class="col-12">
                            <button type="submit" class="btn btn-primary">Simpan Perubahan</button>
                        </div>
                    </div>

                </form>

            </div>
        </div>
    </section>

@endsection


@push('script')
    <script>
        var el = document.getElementById('formFile');
        el.onchange = function() {
            var fileReader = new FileReader();
            fileReader.readAsDataURL(document.getElementById("formFile").files[0])
            fileReader.onload = function(oFREvent) {
                document.getElementById("imgPreview").src = oFREvent.target.result;
            };
        }


        $(document).ready(function() {
            $.myfunction = function() {
                $("#previewName").text($("#inputTitle").val());
                var title = $.trim($("#inputTitle").val())
                if (title == "") {
                    $("#previewName").text("Judul")
                }
            };

            $("#inputTitle").keyup(function() {
                $.myfunction();
            });

        });
    </script>
@endpush
