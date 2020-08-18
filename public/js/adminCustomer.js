var url = location.origin;
 var ObjCustomer = ObjCustomer || {}

 ObjCustomer.showCustomer = function(){

    $.ajax({
        url: url + '/user/apiUser',
        type: 'GET',
        dataType:'json',
        success:function(data){
            $('#tbody').empty();
            console.log(data);
            $.each(data,function(i,v){
                var isAdmin = (v.isAdmin == 0) ? 'Customer' : 'Admin';
                var color = (v.isAdmin == 0) ? 'text-secondary' : 'text-success';
                var titleAD = (v.isAdmin == 0) ? 'Cấp Admin' : 'Xóa quyền Admin';
                var block = (v.block == '0') ? 'Open' : 'Banned';
                var colorb = (v.block == '0') ? 'btn btn-primary' : 'btn btn-danger';
                var titleB = (v.block == '0') ? 'Khóa tài khoản' : 'Mở tài khoản';
                var colorR = (v.role == 0) ? 'text-secondary' : 'text-warning';
                var titleR = (v.role == 0) ? 'Cấp quyền VIP' : 'Xóa thẻ VIP';

                $('#tbody').append(
                `  <tr>
                    <td>${v.id}</td>
                    <td><img src="${v.image}" alt="" srcset="" title= " Click để Xem thông tin khách hàng" class="rounded mx-auto d-block" style="width: 70px; height: 70px;" onclick="ObjCustomer.openModal(${v.id})"></td>
                    <td>${v.name}</td>
                    <td>${v.email}</td>
                    <td><a href="javascript:;" class="${color}" onclick="ObjCustomer.isAdmin(${v.isAdmin},${v.id})" title="${titleAD}">${isAdmin}</a></td>
                    <td><a href="javascript:;" onclick="ObjCustomer.role(${v.role},${v.id})" title="${titleR}"><i class="fas fa-crown ${colorR}" font-size: 30px"></i></a></td>
                    <td><a href="javascript:;" onclick="ObjCustomer.block(${v.block},${v.id})" class="${colorb}" title="${titleB}">${block}</a></td>
                 </tr>`
                )
            });
            $('#CustomerTB').DataTable();
        }

    });
 }

 ObjCustomer.openModal = function(id){
    $.ajax({
        url: url + '/user/show/' + id,
        type: 'GET',
        dataType: 'json',
        success:function(data){
            console.log(data);
            $.each(data,function(i,v){
                var gender = (v.gender == 0) ? 'Nữ' : 'Nam';
                $('#name').text(v.name);
                $('#gender').text(gender);
                $('#DOB').text(v.DOB);
                $('#phone').text(v.phone);
                $('#address').text(v.address);

            })
            $('#modalShow').modal('show');
        },
        error:function(){
            console.log('lỗi')
        }
    });
 }

 ObjCustomer.isAdmin = function(isAdmin, id){
    $.ajax({
        url: url + '/user/changeAdmin/' + id,
        method: 'PUT',
        dataType:'json',
        // contentType: "application/json",
        data: {
            isAdmin: isAdmin
        },
        success:function(data){
            console.log(data);
            ObjCustomer.showCustomer();
        }
    });
 }

 ObjCustomer.role = function(role,id){
     $.ajax({
         url: url + '/user/changeRole/' + id,
         method: 'PUT',
         dataType: 'json',
         data:{
             role: role
         },
         success:function(data){
             console.log(data);
             ObjCustomer.showCustomer();

         }
     });
 }

 ObjCustomer.block = function(block,id){
     $.ajax({
         url: url + '/user/changeBlock/' +id,
         method: 'PUT',
         dataType: 'json',
         data:{
            block: block
         },
         success:function(data){
             console.log(data);
             ObjCustomer.showCustomer();

         }
     });
 }

 ObjCustomer.init = function(){
     ObjCustomer.showCustomer();
 }
  $(document).ready(function(){
    ObjCustomer.init();
  });
