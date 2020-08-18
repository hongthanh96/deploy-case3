@extends('admin.layouts')
@section('content')
<div>
    <div class="mb-2">
        <a href="javascript:;" class="btn btn-success" onclick="album.openModal()">Add albums</a>
    </div>
    <div>
        <table class="table table-striped" id="tbAlbum">
            <thead>
                <th>id</th>
                <th>Loại album</th>
                <th>Action</th>
            </thead>
                <tbody>

                </tbody>
        </table>
    </div>


 <!-- Modal add edit-->
 <div class="modal fade" id="addEditAlbum" data-backdrop="static" data-keyboard="false" tabindex="-1" role="dialog"
 aria-labelledby="staticBackdropLabel" aria-hidden="true">
 <div class="modal-dialog">
     <div class="modal-content">
         <div class="modal-header">
             <h5 class="modal-title" id="staticBackdropLabel">Thêm loại album ảnh mới</h5>
             <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                 <span aria-hidden="true">&times;</span>
             </button>
         </div>

         <div class="erro_message">
            <table id="tbError">

            </table>

        </div>

         <div class="modal-body">
             <form id="fromAddEditAlbum">
                 <input type="hidden" id="idAlbum" name="idAlbum" value="0">
                 <div class="form-group row">
                     <label for="" class="col-sm-3 col-form-label">Tên loại album</label>
                     <div class="col-sm-9">
                         <input type="text" class="form-control" id="nameAlbum" name="nameAlbum" placeholder="Nhập tên loại album" data-rule-required="true"
                         data-msg-required="Loại album không được để trống!">
                     </div>
                 </div>
                 <div class="form-group row">
                     <div class="col-sm-9">
                         <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                         <a href="javascript:;" class="btn btn-primary" id = "buttonAD" onclick="album.save()">+ Add</a>
                     </div>
                 </div>
             </form>
         </div>
     </div>
 </div>
</div>

</div>

@endsection
@push('scripts')
<script src="{{ asset('js/adminAlbums.js') }}"></script>
@endpush
