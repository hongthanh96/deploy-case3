    var ObjService = ObjService || {};
    var url = location.origin;

    ObjService.openModal = function(){
        ObjService.reset();
        $('#addEditService').modal('show');
    }

    ObjService.showService = function(){
        $.ajax({
            url: url + "/services/getApi",
            type: 'GET',
            dataType: 'json',
            success:function(data){
                $('#tbody').empty();
                $.each(data,function(i,v){
                    $('#tbody').append(
                        `<tr>
                        <td>${v.id}</td>
                        <td>${v.name}</td>
                        <td>${v.description}</td>
                        <td>
                            <a href="javascript:;" onclick="ObjService.get(${v.id})" title="Edit"><i style="color: blue" class="fas fa-pen"></i></a>
                            <a href="javascript:;" onclick = "ObjService.delete(${v.id})" title="Delete"><i style="color: red" class="fas fa-trash-alt"></i></a>

                        </td>
                    </tr>`
                    )
                });
                $('#tbService').DataTable();
            }
        });

    }

    ObjService.save = function(){
        if($('#formService').valid()){
            // create
            if($('#idService').val() == 0){
                var formData = new FormData();
                formData.append('name',$("#nameService").val());
                formData.append('description',$("#descriptionService").val());
                $.ajax({
                    url: url + "/services/create",
                    type: 'POST',
                    contentType: false,
                    processData: false,
                    data: formData,
                    success:function(data){
                        ObjService.showService();
                        $('#addEditService').modal('hide');
                        alertify.success('Thêm album thành công!');
                    },
                    error:function(xhr){

                        var errors = xhr.responseJSON.errors;
                        $.each(errors,function(key,value){
                            $('#tbError').append(`<tr><td class="text-danger">${value}</td></tr>`)
                        });
                        alertify.error('Thêm album không thành công!');
                    }
                });
            }
            // update
            else{
                var objService = {};
                objService.name = $('#nameService').val();
                objService.description = $('#descriptionService').val();
                var uri = url + "/services/update/" + $('#idService').val();
                $.ajax({
                    url: uri,
                    type: 'put',
                    contentType:"application/json",
                    data: JSON.stringify(objService),
                    success:function(data){
                        console.log(data);
                        ObjService.showService();
                        $('#addEditService').modal('hide');
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

    ObjService.get = function(id){
        var formData = new FormData();
        formData.append('name',$('#nameService').val());
        formData.append('description',$('#descriptionService').val());
        $.ajax({
            url: url + "/services/edit/" + id,
            type: 'GET',
            contentType: false,
            processData: false,
            data: formData,
            success:function(data){
                $('#idService').val(data.id);
                $('#nameService').val(data.name);
                $('#descriptionService').val(data.description);
                $('#addEditService').find(".modal-title").text('Edit Dịch vụ');
                $('#addEditService').find("#buttonAD").text('Save change');
                $('#addEditService').modal('show');

            },
            error:function(){
                console.log('lỗi');
            }
        });

    }

    ObjService.delete = function(id){
        bootbox.confirm({
            title: "Xóa dịch vụ!",
            message: "Bạn chăc chắn muốn xóa dịch vụ này? ",
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
                        url: url + "/services/destroy/" + id,
                        type: 'DELETE',
                        dataType: 'json',
                        success:function(data){
                            ObjService.showService();
                            alertify.success('Xóa dịch vụ thành công!');
                        },
                        error:function(){
                            alertify.error('Xóa dịch vụ không thành công!');
                        }

                    });
                }
            }
        });

    }

    ObjService.reset = function(){
        $('#idService').val('0');
        $('#nameService').val("");
        $('#descriptionService').val("");
        $('#tbError').html('');

    }

    ObjService.init = function(){
        ObjService.showService();
    }

    $(document).ready(function(){
        ObjService.init();
    })

