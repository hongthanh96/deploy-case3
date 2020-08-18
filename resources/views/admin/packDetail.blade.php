@extends('admin.layouts')
@section('content')
<div>
    <div class="mb-2">
        <a href="javascript:;" class="btn btn-success" onclick="packDetail.openModal()">Thêm gói mới</a>
    </div>
    <div>
        <table class="table table-striped" id="tbPackDetail">
            <thead>
                <th>id</th>
                <th>Tên gói</th>
                <th>Giá tiền</th>
                <th>Dịch vụ 1</th>
                <th>Dịch vụ 2</th>
                <th>Dịch vụ 3</th>
                <th>Dịch vụ 4</th>
                <th>Dịch vụ 5</th>
                <th>Action</th>
            </thead>
                <tbody id="tbody">

                </tbody>
        </table>
    </div>


 <!-- Modal add edit-->
 <div class="modal fade" id="addEditPackDetail" data-backdrop="static" data-keyboard="false" tabindex="-1" role="dialog"
 aria-labelledby="staticBackdropLabel" aria-hidden="true">
 <div class="modal-dialog">
     <div class="modal-content">
         <div class="modal-header">
             <h5 class="modal-title" id="staticBackdropLabel">Thêm gói mới</h5>
             <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                 <span aria-hidden="true">&times;</span>
             </button>
         </div>

         <div class="erro_message">
            <table id="tbError">

            </table>

        </div>

         <div class="modal-body">
             <form id="frAddEditPackDetail">
                 <input type="hidden" id="idPackDetail" name="idPackDetail" value="0">
                 <div class="form-group row">
                     <label for="" class="col-sm-3 col-form-label">Tên gói</label>
                     <div class="col-sm-9">
                         <input type="text" class="form-control" id="namePackDetail" name="namePackDetail" placeholder="Nhập tên gói album" data-rule-required="true"
                         data-msg-required="Tên gói không được để trống!">
                     </div>
                 </div>
                 <div class="form-group row">
                    <label for="" class="col-sm-3 col-form-label">Giá tiền</label>
                    <div class="col-sm-9">
                        <input type="text" class="form-control" id="pricePackDetail" name="pricePackDetail" placeholder="Nhập giá gói" data-rule-required="true"
                        data-msg-required="Giá gói không được để trống!">
                    </div>
                </div>
                <div class="form-group row">
                    <label for="" class="col-sm-3 col-form-label">Dịch vụ 1</label>
                    <div class="col-sm-9">
                        <input type="text" class="form-control" id="service1" name="service1" placeholder="Nhập tên dịch vụ" data-rule-required="true"
                        data-msg-required="Dịch vụ này không được để trống!">
                    </div>
                </div>
                <div class="form-group row">
                    <label for="" class="col-sm-3 col-form-label">Dịch vụ 2</label>
                    <div class="col-sm-9">
                        <input type="text" class="form-control" id="service2" name="service2" placeholder="Nhập tên dịch vụ" data-rule-required="true"
                        data-msg-required="Dịch vụ này không được để trống!">
                    </div>
                </div>
                <div class="form-group row">
                    <label for="" class="col-sm-3 col-form-label">Dịch vụ 3</label>
                    <div class="col-sm-9">
                        <input type="text" class="form-control" id="service3" name="service3" placeholder="Nhập tên dịch vụ" data-rule-required="true"
                        data-msg-required="Dịch vụ này không được để trống!">
                    </div>
                </div>
                <div class="form-group row">
                    <label for="" class="col-sm-3 col-form-label">Dịch vụ 4 (nếu có)</label>
                    <div class="col-sm-9">
                        <input type="text" class="form-control" id="service4" name="service4" placeholder="Nhập tên dịch vụ" >
                    </div>
                </div>
                <div class="form-group row">
                    <label for="" class="col-sm-3 col-form-label">Dịch vụ 5 (nếu có)</label>
                    <div class="col-sm-9">
                        <input type="text" class="form-control" id="service5" name="service5" placeholder="Nhập tên dịch vụ">
                    </div>
                </div>
                 <div class="form-group row">
                     <div class="col-sm-9">
                         <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                         <a href="javascript:;" class="btn btn-primary" id = "buttonAD" onclick="packDetail.save()">+ Add</a>
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
<script src="{{ asset('js/AdminpackListDetail.js') }}"></script>
@endpush
