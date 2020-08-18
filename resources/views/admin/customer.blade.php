@extends('admin.layouts')
@section('content')
    <div>
        <table class="table table-striped" id="CustomerTB">
            <thead>
                <th>Mã khách hàng</th>
                <th>Hình ảnh</th>
                <th>Tên</th>
                <th>Email</th>
                <th>Is Admin</th>
                <th>Phân quyền</th>
                <th>Trạng thái</th>
            </thead>
            <tbody id="tbody">
                {{-- <td><a href="" class="btn btn-primary" onclick="ObjCustomer.openModal()" title=""></a></td> --}}
            </tbody>
        </table>

        <!-- Modal -->
<div class="modal fade" id="modalShow" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Thông tin khách hàng</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
              <div class="row">
                  <div class="col-4">
                      <h4>Tên: </h4>
                      <p>Giới tính: </p>
                      <p>Ngày sinh: </p>
                      <p>Số điện thoại: </p>
                      <p>Địa chỉ: </p>
                  </div>
                  <div class="col-8">
                    <h4 id="name" class="text-danger"></h4>
                    <p id="gender" class="text-success"></p>
                    <p id="DOB" class="text-success"></p>
                    <p id="phone" class="text-success"></p>
                    <p id="address" class="text-success"></p>
                  </div>
              </div>

        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
          {{-- <button type="button" class="btn btn-primary">Save changes</button> --}}
        </div>
      </div>
    </div>
  </div>

    </div>
@endsection

@push('scripts')

<script src="{{ asset('js/adminCustomer.js') }}"></script>

@endpush
