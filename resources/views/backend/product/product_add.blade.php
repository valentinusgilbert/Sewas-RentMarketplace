@extends('admin.admin_master')
@section('admin')

<!-- Content Wrapper. Contains page content -->
<div class="container-full">
    <!-- Content Header (Page header) -->

    <!-- Main content -->
    <section class="content">
        <div class="box">
            <div class="box-header with-border">
                <h3 class="box-title">Tambah Produk</h3>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
                <div class="row">
                    <div class="col">
                        <form method="post" action="{{ route('product.store') }}" enctype="multipart/form-data">
                            @csrf

                            <div class="row">
                                <div class="col-6">
                                    <div class="card-body">
                                        <div class="row">
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <h5>Nama Produk <span class="text-danger">*</span></h5>
                                                    <div class="controls">
                                                        <input type="text" name="product_name" placeholder="Nama Produk"
                                                            class="form-control">
                                                        @error('product_name')
                                                        <span class="text-danger">{{ $message }}</span>
                                                        @enderror
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <h5>Berat Produk <span class="text-danger">*</span></h5>
                                                    <div class="controls">
                                                        <input type="text" name="product_weight"
                                                            placeholder="Berat Produk" class="form-control">
                                                        @error('product_weight')
                                                        <span class="text-danger">{{ $message }}</span>
                                                        @enderror
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <h5>Kode Produk <span class="text-danger">*</span></h5>
                                                    <div class="controls">
                                                        <input type="text" name="product_code" placeholder="Barcode"
                                                            class="form-control">
                                                        @error('product_code')
                                                        <span class="text-danger">{{ $message }}</span>
                                                        @enderror
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <h5>Stok Produk <span class="text-danger">*</span></h5>
                                                    <div class="controls">
                                                        <input type="text" name="product_qty"
                                                            placeholder="Jumlah Stok Produk" class="form-control">
                                                        @error('product_qty')
                                                        <span class="text-danger">{{ $message }}</span>
                                                        @enderror
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                  
                                         
                                        <div class="row">
                                            
                                            {{-- <div class="col-md-6">
                                                <div class="form-group">
                                                    <h5>Produk Digital <span class="text-danger">pdf,xlx,csv*</span></h5>
                                                    <div class="controls">
                                                        <input type="file" name="file" class="form-control">
                                                    </div>
                                                </div>
                                            </div> --}}
                                        </div>
                                        <div class="row">
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <h5>Harga Produk <span class="text-danger">*</span></h5>
                                                    <div class="controls">
                                                        <input type="text" name="product_price"
                                                            placeholder="Harga Produk" class="form-control" required="">
                                                        @error('product_price')
                                                        <span class="text-danger">{{ $message }}</span>
                                                        @enderror
                                                    </div>
                                                </div>
                                            </div>
                                        
                                        </div>
                                        <div class="row">
                                            <div class="col-md-12">
                                                <div class="form-group">
                                                    <h5>Deskripsi Pendek (Short) <span class="text-danger">*</span></h5>
                                                    <div class="controls">
                                                        <textarea name="product_short_desc" id="textarea"
                                                            class="form-control" required
                                                            placeholder="Textarea text"></textarea>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-12">
                                                <div class="form-group">
                                                    <h5>Deskripsi Panjang (Long) <span class="text-danger">*</span></h5>
                                                    <div class="controls">
                                                        <textarea id="editor1" name="product_long_desc" rows="10"
                                                            cols="80" required="">Deskripsi Panjang (Long)</textarea>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div><!-- End col-7 -->
                                <div class="col-6">
                                    <div class="card-body">
                                        <div class="form-group">
                                            <div class="row">
                                                <div class="col-md-6">
                                                    <h5>Kategori<span class="text-danger">*</span></h5>
                                                    <div class="controls">
                                                        <select name="category_id" class="form-control">
                                                            <option value="" selected="" disabled="">Pilih Kategori
                                                            </option>
                                                            @foreach ($categories as $category)
                                                            <option value="{{ $category->id }}">
                                                                {{ $category->category_name }}</option>
                                                            @endforeach
                                                        </select>
                                                        @error('category_id')
                                                        <span class="text-danger">{{ $message }}</span>
                                                        @enderror
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <div class="row">
                                                <div class="col-md-6">
                                                    <h5>Sub Kategori <span class="text-danger">*</span></h5>
                                                    <div class="controls">
                                                        <select name="subcategory_id" class="form-control" required="">
                                                            <option value="" selected="" disabled="">Pilih Sub Kategori
                                                            </option>
                                                        </select>
                                                        @error('subcategory_id')
                                                        <span class="text-danger">{{ $message }}</span>
                                                        @enderror
                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <h5>Sub-Sub Kategori <span class="text-danger">*</span></h5>
                                                        <div class="controls">
                                                            <select name="subsubcategory_id" class="form-control"
                                                                required="">
                                                                <option value="" selected="" disabled="">Sub-Sub
                                                                    Kategori
                                                                </option>

                                                            </select>
                                                            @error('subsubcategory_id')
                                                            <span class="text-danger">{{ $message }}</span>
                                                            @enderror
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    
                                        <div class="form-group">
                                            <div class="row">
                                                <div class="col-md-6">
                                                    <h5>Produk (Thumbnail) <span class="text-danger">*</span></h5>
                                                    <div class="controls">
                                                        <input type="file" name="product_thambnail" class="form-control"
                                                            id="gambar" onChange="ThumbUrl(this)" required="">
                                                        @error('product_thambnail')
                                                        <span class="text-danger">{{ $message }}</span>
                                                        @enderror
                                                        <img src="" id="mainThmb">
                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <h5>Produk Galeri <span class="text-danger">*</span></h5>
                                                    <div class="controls">
                                                        <input type="file" name="multi_img[]" for="galeri"
                                                            class="form-control" id="multiImg" multiple required="">
                                                        @error('multi_img')
                                                        <span class="text-danger">{{ $message }}</span>
                                                        @enderror
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="row ml-1 mt-4">
                                                <div class="col-md-6">
                                                    <img src="" id="Thumb">
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="row ml-1" id="preview_img"></div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div> <!-- End col-5 -->
                            </div>
                            <div class="card-footer">
                                <div class="text-xs-right">
                                    <input type="submit" class="btn btn-md btn-primary mb-5" value="Tambah Produk">
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>

{{-- Ajax Sub Kategori, Sub-Sub Kategori --}}
<script type="text/javascript">
    // Ajax Sub Kategori
    $(document).ready(function () {
        $('select[name="category_id"]').on('change', function () {
            var category_id = $(this).val();
            if (category_id) {
                $.ajax({
                    url: "{{  url('/category/subcategory/ajax') }}/" + category_id,
                    type: "GET",
                    dataType: "json",
                    success: function (data) {
                        $('select[name="subsubcategory_id"]').html('');
                        var d = $('select[name="subcategory_id"]').empty();
                        $.each(data, function (key, value) {
                            $('select[name="subcategory_id"]').append(
                                '<option value="' + value.id + '">' + value
                                .subcategory_name + '</option>');
                        });
                    },
                });
            } else {
                alert('danger');
            }
        });

        // Ajax Sub-Sub Kategori
        $('select[name="subcategory_id"]').on('change', function () {
            var subcategory_id = $(this).val();
            if (subcategory_id) {
                $.ajax({
                    url: "{{  url('/category/sub-subcategory/ajax') }}/" + subcategory_id,
                    type: "GET",
                    dataType: "json",
                    success: function (data) {
                        var d = $('select[name="subsubcategory_id"]').empty();
                        $.each(data, function (key, value) {
                            $('select[name="subsubcategory_id"]').append(
                                '<option value="' + value.id + '">' + value
                                .subsubcategory_name + '</option>');
                        });
                    },
                });
            } else {
                alert('danger');
            }
        });
    });
</script>

{{-- Ajax Foto Thumbnail --}}
<script type="text/javascript">
    function ThumbUrl(input) {
        if (input.files && input.files[0]) {
            var reader = new FileReader();
            reader.onload = function (e) {
                $('#Thumb').attr('src', e.target.result).width(150).height(150);
            };
            reader.readAsDataURL(input.files[0]);
        }
    }
</script>

{{-- Ajax Galeri Foto --}}
<script>
    $(document).ready(function () {
        $('#multiImg').on('change', function () { //on file input change
            if (window.File && window.FileReader && window.FileList && window
                .Blob) //check File API supported browser
            {
                var data = $(this)[0].files; //this file data

                $.each(data, function (index, file) { //loop though each file
                    if (/(\.|\/)(gif|jpe?g|png)$/i.test(file
                            .type)) { //check supported file type
                        var fRead = new FileReader(); //new filereader
                        fRead.onload = (function (file) { //trigger function on successful read
                            return function (e) {
                                var img = $('<img/>').addClass('thumb').attr('src',
                                        e.target.result).width(75)
                                    .height(75); //create image element 
                                $('#preview_img').append(
                                    img); //append image to output element
                            };
                        })(file);
                        fRead.readAsDataURL(file); //URL representing the file's data.
                    }
                });

            } else {
                alert("Your browser doesn't support File API!"); //if File API is absent
            }
        });
    });
</script>

@endsection