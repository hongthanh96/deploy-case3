var packlist = packlist || {};

var url = location.origin;
packlist.openModal = function(){
    packlist.reset();
    $('#addEditPackList').modal('show');
}

packlist.showPactlist = function(){
    $.ajax({
        url: url + "/packLists/apiPactlist",
        type: 'GET',
        dataType: 'json',
        success:function(data){
            console.log(data);
            t.clear().draw();
            $.each(data,function(i,v){
                    t.row.add( [
                        v.id,
                        v.name,
                       ` <a href="javascript:;" onclick="packlist.get(${v.id})" title="Edit"><i style="color: blue" class="fas fa-pen"></i></a>
                       <a href="javascript:;" onclick = "packlist.delete(${v.id})" title="Delete"><i style="color: red" class="fas fa-trash-alt"></i></a>`
                    ] ).draw( false );
            });
        }

    });
}


packlist.save = function(){
    if($('#frAddEditPacklist').valid()){
        // create
        if($('#idPactlist').val() == 0){
            var obj = {};
            obj.name = $('#namePacklist').val();
            $.ajax({
                url: url + '/packLists/create',
                type: 'POST',
                contentType:"application/json",
                data : JSON.stringify(obj),
                success:function(data){
                    $('#addEditPackList').modal('hide');
                    packlist.showPactlist();
                    alertify.success('Thêm loại gói thành công!');
                },
                error:function(){
                    alertify.warning('Thêm loại gói không thành công');
                }

            });
        }

    //update
    else{
        var objPacklist = {};
        objPacklist.id = $('#idPactlist').val();
        objPacklist.name = $('#namePacklist').val();
        let uri = url + '/packLists/update/' + objPacklist.id;
        $.ajax({
            url:uri,
            type: 'PUT',
            contentType:"application/json",
            data : JSON.stringify(objPacklist),
            success:function(data){
                packlist.showPactlist();
                $('#addEditPackList').modal('hide');
                alertify.success('Update loại gói thành công!');
            },
            error:function(){
                alertify.warning('Uppdate loại gói không thành công');
            }


        });

    }
}
}

packlist.get = function(id){
    $.ajax({
        url: url + "/packLists/edit/" + id,
        type: 'GET',
        dataType: 'json',
        success:function(data){
            console.log(data);
            $('#idPactlist').val(data.id);
            $('#namePacklist').val(data.name);
            $('#addEditPackList').find(".modal-title").text('Edit loại gói');
            $('#addEditPackList').find("#buttonAD").text('Save change');
            $('#addEditPackList').modal('show');
        }

    });
}


packlist.delete = function(id){
    bootbox.confirm({
        title: "xóa gói?",
        message: "Bạn chắc chắn muốn xóa gói này?",
        buttons: {
            cancel: {
                label: '<i class="fa fa-times"></i> NO'
            },
            confirm: {
                label: '<i class="fa fa-check"></i> YES'
            }
        },
        callback: function (result) {
            if(result){
                $.ajax({
                    url: url + "/packLists/destroy/" +id,
                    type: 'DELETE',
                    dataType: 'json',
                    success:function(data){
                        console.log(data);
                        alertify.success('Xóa gói thành công!');
                        packlist.showPactlist();
                    },
                    error:function(){
                        alertify.warning('Xóa gói thất bại!');
                    }
                });
            }
        }
    });
}

packlist.reset = function(){
    $('#namePacklist').val("");
    $('#idPactlist').val('0');
}

packlist.edit = function(){

}

packlist.init = function(){
    packlist.showPactlist();
}

$(document).ready( function () {

    packlist.init();
    t = $('#tbPacklist').DataTable();
} );
