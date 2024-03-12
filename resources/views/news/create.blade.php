@extends('template')

@section('page-heading')
    <div class="page-heading">
        <div class="page-title">
            <div class="row">
                <div class="col-12 col-md-6 order-md-1 order-last">
                    <h3>Feed Berita</h3>
                    <p class="text-subtitle text-muted">Tambah Berita Baru</p>
                </div>
                <div class="col-12 col-md-6 order-md-2 order-first">
                    <nav aria-label="breadcrumb" class="breadcrumb-header float-start float-lg-end">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="{{ url('material/manage') }}">Berita</a></li>
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
                <h4 class="card-title">Tambah Berita Baru</h4>
            </div>

            <div class="card-body">
                <form action="{{ url('news/store') }}" enctype="multipart/form-data" method="post">
                    @csrf
                    <div class="row">
                        <div class="col-md-6">

                            <div class="form-group">
                                <label for="basicInput">Judul Berita</label>
                                <input type="text" name="title" required class="form-control"
                                       value="{{ old('title') }}"
                                       placeholder="Judul Berita">
                            </div>

                            <div class="form-group">
                                <label for="basicInput">Penulis/Sumber Berita</label>
                                <input type="text" name="author" required class="form-control"
                                       value="{{ old('author') }}"
                                       placeholder="Sumber Berita">
                            </div>

                            <div class="form-group">
                                <label for="">Type</label>
                                <input type="text"
                                       class="form-control" name="type" id="" aria-describedby="helpId" placeholder="">
                                <small id="helpId" class="form-text text-muted">Type</small>
                            </div>



                        </div>

                        <div class="col-md-12">
                            <div class="form-group">
                                <label for="">Konten Berita</label>
                                <textarea class="form-control" name="news_content" id="summernote" rows="10"
                                          placeholder="Konten Berita">{{old('news_content')}}</textarea>
                            </div>

                        </div>

                        <div class="col-md-6">

                            <div class="form-group">
                                <label for="formFile" class="form-label">Foto Berita</label>
                                <input name="photo" class="form-control" type="file" id="formFile">
                            </div>

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
            callbacks: {
                onImageUpload: function(files, editor, welEditable) {
                    sendFile(files[0], editor, welEditable);
                },
                onMediaDelete : function(target) {
                    alert(target[0].src)
                    alert("On Media Delete")
                    deleteFile(target[0].src);
                }
            }
        })

        function deleteFile(src) {
            var host = window.location.origin;
            $.ajax({
                data: {src : src},
                type: "POST",
                url: host+"/summernote-image-delete", // replace with your url
                cache: false,
                success: function(resp) {
                    console.log(resp);
                    console.log("Success Delete Image")
                },
                error: function(jqXHR, textStatus, errorThrown) {
                    let error = (textStatus+" "+errorThrown);
                    console.log(error)
                    alert(error + jqXHR.responseText)
                }
            });
        }

        function sendFile(file, editor, welEditable) {

            var host = window.location.origin;
            data = new FormData();
            data.append("file", file);
            $.ajax({
                data: data,
                type: 'POST',
                url: host + '/summernote-image',
                cache: false,
                contentType: false,
                processData: false,
                success: function(url) {
                    alert(url)
                    var image = $('<img>').attr('src', url);
                    $('#summernote').summernote('insertImage', url, url);
                },
                error: function(jqXHR, textStatus, errorThrown) {
                    let error = (textStatus+" "+errorThrown);
                    console.log(error)
                    alert(error + jqXHR.responseText)
                }
            });
        }

        function progressHandlingFunction(e){

        }
    </script>
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
    </script>
@endpush
