@extends('admin.layouts')
@section('content')
<div>
    <a href="javascript:;" class="btn btn-primary" onclick="albumDetail.openModal()">Thêm album</a>
    <table class="table table-striped" id="tbAlbum">
        <thead>
            <tr>
                <th>Mã album</th>
                <th>Tên album</th>
                <th>Mô tả</th>
                <th>Nổi bật</th>
                <th>Bộ album</th>
                <th>Ảnh album</th>
                <th>Action</th>

            </tr>
        </thead>
        <tbody id="table-data">

        </tbody>
    </table>

    <!-- Modal add edit-->
    <div class="modal fade" id="addEditAlbumDetail" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Thêm album mới</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                {{-- < action="{{ route('albumDetail.store') }}" method="POST"  enctype="multipart/form-data">
                    @csrf --}}

                    <div class="erro_message">
                        <table id="tbError">

                        </table>

                    </div>

                <div class="modal-body">
                    <form id="frAlbumDetail" >
                        <input type="hidden" id="idAlbumDetail" name="idAlbumDetail" value="0">
                        <div class="form-group row">
                            <label for="" class="col-sm-3 col-form-label">Tiêu đề album</label>
                            <div class="col-sm-9">
                                <input type="text" class="form-control" id="name" name="name" placeholder="Nhập tên album" data-rule-required="true"
                                data-msg-required="Tên album không được để trống!">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="" class="col-sm-3 col-form-label">Mô tả album</label>
                            <div class="col-sm-9">
                                <input type="text" class="form-control" id="description" name="description" placeholder="Nhập mô tả album" data-rule-required="true"
                                data-msg-required="Mô tả album không được để trống!">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="" class="col-sm-3 col-form-label">Album nổi bật</label>
                            <div class="col-sm-9">
                                <select name="isHot" id="isHot">
                                    <option value="1">Hot</option>
                                    <option value="0">No Hot</option>
                                </select>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="" class="col-sm-3 col-form-label">Hình ảnh</label>
                            <div class="col-sm-9">
                                <input type="file" class="form-control" id="image" name="image" data-rule-required="true"
                                data-msg-required="Ảnh không được để trống!">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="" class="col-sm-3 col-form-label">Album ảnh</label>
                            <div class="col-sm-9">
                                <input type="file" class="form-control" id="filename"  data-rule-required="true"
                                data-msg-required="file ảnh không được để trống!" name="filename[]" multiple >
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="" class="col-sm-3 col-form-label">Loại Album</label>
                            <div class="col-sm-9">
                                <select name="album_id" id="album_id">
                                    @forelse ($albumss as $album)
                                        <option value="{{ $album->id }}">{{ $album->name }}</option>
                                    @empty
                                        <option value="noHot">ko có</option>
                                    @endforelse
                                </select>
                            </div>
                        </div>
                </div>
                <div class="modal-footer">
                    <a href="javascript:;" class="btn btn-secondary" data-dismiss="modal">Close</a>
                    <a href="javascript:;" class="btn btn-primary" onclick="albumDetail.save()"  id="buttonAD">+ Add</a>
                </div>
            </form>
            </div>
        </div>
    </div>

</div>
@endsection


@push('scripts')
    <script src='{{ asset("js/adminDetailAlbum.js") }}'></script>
@endpush

