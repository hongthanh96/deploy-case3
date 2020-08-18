var packDetail = packDetail || {};
var url = location.origin;

packDetail.openModal = function(){
    packDetail.reset();
    $('#addEditPackDetail').modal('show');
}

packDetail.showDetail = function(){
    $.ajax({
        url: url + "/packDetails/apiPacklDetail",
        type: 'GET',
        dataType: 'json',
        success:function(data){
            $('#tbody').empty();
            $.each(data,function(i,v){
            var service4 = (v.service4 != null) ? v.service4 : 'Không có';
            var service5 = (v.service5 != null) ? v.service5 : 'Không có';
                $('#tbody').append(
                    `<tr>
                    <td>${v.id}</td>
                    <td>${v.name}</td>
                    <td>${v.price}</td>
                    <td>${v.service1}</td>
                    <td>${v.service2}</td>
                    <td>${v.service3}</td>
                    <td>${service4}</td>
                    <td>${service5}</td>
                    <td>
                        <a href="javascript:;" onclick="packDetail.get(${v.id})" title="Edit" ><i style="color: blue" class="fas fa-pen"></i></a>
                        <a href="javascript:;" onclick = "packDetail.delete(${v.id})" title="Delete"><i style="color: red" class="fas fa-trash-alt"></i></a>

                    </td>
                </tr>`
                )
            });
            $('#tbPackDetail').DataTable();
        }
    });
}

packDetail.save = function(){
    if($('#frAddEditPackDetail').valid()){
        // create
        if($('#idPackDetail').val() == 0){
            var formData = new FormData();
            formData.append('name',$("#namePackDetail").val());
            formData.append('price',$("#pricePackDetail").val());
            formData.append('service1',$("#service1").val());
            formData.append('service2',$("#service2").val());
            formData.append('service3',$("#service3").val());
            formData.append('service4',$("#service4").val());
            formData.append('service5',$("#service5").val());
            $.ajax({
                url: url + "/packDetails/create",
                type: 'POST',
                contentType: false,
                processData: false,
                data: formData,
                success:function(data){
                    packDetail.showDetail();
                    $('#addEditPackDetail').modal('hide');
                    alertify.success('Thêm gói thành công!');
                },
                error:function(xhr){
                    var errors = xhr.responseJSON.errors;
                    $.each(errors,function(key,error){
                        $('#tbError').append(`<tr><td class="text-danger">${error}</td></tr>`)
                    });
                    alertify.error('Thêm gói không thành công!');
                }
            });
        }
        // update
        else{
            var ObjPackDetail = {};
            ObjPackDetail.name = $('#namePackDetail').val();
            ObjPackDetail.price = $('#pricePackDetail').val();
            ObjPackDetail.service1 = $('#service1').val();
            ObjPackDetail.service2 = $('#service2').val();
            ObjPackDetail.service3 = $('#service3').val();
            ObjPackDetail.service4 = $('#service4').val();
            ObjPackDetail.service5 = $('#service5').val();
            var uri = url + "/packDetails/update/" + $('#idPackDetail').val();
            $.ajax({
                url: uri,
                type: 'put',
                contentType:"application/json",
                data: JSON.stringify(ObjPackDetail),
                success:function(data){
                    packDetail.showDetail();
                    $('#addEditPackDetail').modal('hide');
                    alertify.success('Update dịch vụ thành công!');
                },
                error:function(xhr){
                    var errors = xhr.responseJSON.errors;
                    $.each(errors,function(key,error){
                        $('#tbError').append(`<tr><td class="text-danger">${error}</td></tr>`)
                    });
                    alertify.error('Update dịch vụ không thành công!');
                }
            });
        }
    }
}

packDetail.get = function(id){
    var formData = new FormData();
    formData.append('name',$('#namePackDetail').val());
    formData.append('price',$('#pricePackDetail').val());
    formData.append('service1',$('#service1').val());
    formData.append('service2',$('#service2').val());
    formData.append('service3',$('#service3').val());
    formData.append('service4',$('#service4').val());
    formData.append('service5',$('#service5').val());
    $.ajax({
        url: url + "/packDetails/edit/" + id,
        type: 'GET',
        contentType: false,
        processData: false,
        data: formData,
        success:function(data){
            $('#idPackDetail').val(data.id);
            $('#namePackDetail').val(data.name);
            $('#pricePackDetail').val(data.price);
            $('#service1').val(data.service1);
            $('#service2').val(data.service2);
            $('#service3').val(data.service3);
            $('#service4').val(data.service4);
            $('#service5').val(data.service5);
            $('#addEditPackDetail').find(".modal-title").text('Edit Gói');
            $('#addEditPackDetail').find("#buttonAD").text('Save change');
            $('#addEditPackDetail').modal('show');

        },
        error:function(){
            console.log('lỗi');
        }
    });

}

packDetail.delete = function(id){
    bootbox.confirm({
        title: "Xóa dịch vụ!",
        message: "Bạn chăc chắn muốn xóa gói này? ",
        buttons: {
            cancel: {
                label: '<i class="fa fa-times"></i> No'
            },
            confirm: {
                label: '<i class="fa fa-check"></i> Yes'
            }
        },
        callback: function (result) {
            if(result){
                $.ajax({
                    url: url + "/packDetails/destroy/" + id,
                    type: 'DELETE',
                    dataType: 'json',
                    success:function(data){
                        packDetail.showDetail();
                        alertify.success('Xóa gói thành công!');
                    },
                    error:function(){
                        alertify.error('Xóa gói không thành công!');
                    }

                });
            }
        }
    });

}

packDetail.reset = function(){
    $('#idPackDetail').val('0');
    $('#namePackDetail').val("");
    $('#pricePackDetail').val("");
    $('#service1').val("");
    $('#service2').val("");
    $('#service3').val("");
    $('#service4').val("");
    $('#service4').val("");
    $('#service5').val("");
    $('#tbError').html('');

}

packDetail.init = function(){
    packDetail.showDetail();
}

$(document).ready(function(){
    packDetail.init();
})
