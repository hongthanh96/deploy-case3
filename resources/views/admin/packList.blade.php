@extends('admin.layouts')
@section('content')
<div>
    <div class="mb-2">
        <a href="javascript:;" class="btn btn-success" onclick="packlist.openModal()">Thêm loại gói </a>
    </div>
    <div>
        <table class="table table-striped" id="tbPacklist">
            <thead>
                <th>id</th>
                <th>Tên gói</th>
                <th>Action</th>
            </thead>
                <tbody>

                </tbody>
        </table>
    </div>


 <!-- Modal add edit-->
 <div class="modal fade" id="addEditPackList" data-backdrop="static" data-keyboard="false" tabindex="-1" role="dialog"
 aria-labelledby="staticBackdropLabel" aria-hidden="true">
 <div class="modal-dialog">
     <div class="modal-content">
         <div class="modal-header">
             <h5 class="modal-title" id="staticBackdropLabel">Thêm loại gói mới</h5>
             <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                 <span aria-hidden="true">&times;</span>
             </button>
         </div>
         <div class="modal-body">
             <form id="frAddEditPacklist">
                 <input type="hidden" id="idPactlist" name="idPactlist" value="0">
                 <div class="form-group row">
                     <label for="" class="col-sm-3 col-form-label">Tên loại gói</label>
                     <div class="col-sm-9">
                         <input type="text" class="form-control" id="namePacklist" name="namePacklist" placeholder="Nhập tên loại gói" data-rule-required="true"
                         data-msg-required="Loại gói không được để trống!">
                     </div>
                 </div>
                 <div class="form-group row">
                     <div class="col-sm-9">
                         <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                         <a href="javascript:;" class="btn btn-primary" id = "buttonAD" onclick="packlist.save()">+ ADD</a>
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
<script src="{{ asset('js/adminPackList.js') }}"></script>
@endpush
