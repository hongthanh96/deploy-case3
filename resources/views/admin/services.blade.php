@extends('admin.layouts')
@section('content')
<div>
    <a href="javascript:;" class="btn btn-primary" onclick="ObjService.openModal()">Thêm dịch vụ</a>
    <table class="table table-striped" id="tbService">
        <thead>
            <tr>
                <th scope="col">Mã dịch vụ</th>
                <th scope="col">Tên dịch vụ</th>
                <th scope="col">Mô tả dịch vụ</th>
                <th scope="col">Action</th>
            </tr>
        </thead>
        <tbody id="tbody">

        </tbody>
    </table>

    <!-- Modal addedit -->
    <div class="modal fade" id="addEditService" data-backdrop="static" data-keyboard="false" tabindex="-1" role="dialog"
        aria-labelledby="staticBackdropLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="staticBackdropLabel">Thêm dịch vụ mới</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="erro_message">
                    <table id="tbError">

                    </table>

                </div>
                <div class="modal-body">
                    <form id="formService">
                        <input type="hidden" name="idService" id="idService" value="0">
                        <div class="form-group row">
                            <label for="" class="col-sm-3 col-form-label">Tên dịch vụ</label>
                            <div class="col-sm-9">
                                <input type="text" class="form-control" id="nameService" name="nameService" placeholder="Nhập tên dịch vụ" data-rule-required="true"
                                data-msg-required="Tên dịch vụ không được để trống!">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="" class="col-sm-3 col-form-label">Mô tả dịch vụ</label>
                            <div class="col-sm-9">
                                <input type="text" class="form-control" id="descriptionService" name="descriptionService" placeholder="Nhập mô tả dịch vụ" data-rule-required="true"
                                data-msg-required="mô tả dịch vụ không được để trống!">
                            </div>
                        </div>
                        <div class="form-group row">
                            <div class="col-sm-9">
                                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                <button type="button" class="btn btn-primary" id="buttonAD" onclick="ObjService.save()">+ Add</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <!-- Modal edit -->

</div>
@endsection

@push('scripts')
    <script src="{{ asset('js/adminService.js') }}"></script>
@endpush



