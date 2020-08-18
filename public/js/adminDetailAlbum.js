var albumDetail = albumDetail || {};
var url = location.origin;

albumDetail.showDetail = function(){
    $.ajax({
        url: url + "/albumDetail/apiDetailAlbum",
        type: 'GET',
        dataType: 'json',
        success:function(data){
            $("#table-data").empty();
            $.each(data, function(i,value){
                var isHot = (value.isHot == 1) ? 'Hot' : 'No Hot' ;
                // console.log(value.filename)
                $("#table-data").append(
                    `
                    <tr>
                        <td>${value.id}</td>
                        <td>${value.title}</td>
                        <td>${value.description}</td>
                        <td>${isHot}</td>
                        <td>${value.name}</td>
                        <td><img src='/upload/${value.image}' class='img-thumbnail' style="width: 70px; height: 70px;"/></td>
                        <td>
                        <a href="javascript:;" onclick="albumDetail.get(${value.id})" title="Edit"><i style="color: blue" class="fas fa-pen"></i></a>
                        <a href="javascript:;" onclick = "albumDetail.delete(${value.id})" title="Delete"><i style="color: red" class="fas fa-trash-alt"></i></a>

                        </td>
                    </tr>
                    `
                )
            });

            $('#tbAlbum').DataTable();
        }
    });
}


albumDetail.save = function(){
    if($('#frAlbumDetail').valid()){
         // create
        if($('#idAlbumDetail').val() == 0){

            var formData = new FormData();
            formData.append('title', $('#name').val());
            formData.append('description', $('#description').val());
            formData.append('isHot', $('#isHot').val());
            formData.append('image', $('#image')[0].files[0]);
            formData.append('album_id', $('#album_id').val());
            for(let i = 0 ; i< $('#filename')[0].files.length ; i++){
                formData.append("filename[]", $('#filename')[0].files[i]);
            }
            // formData.append('filename', $('#filename').files);
            $.ajax({
                url: url + "/albumDetail/create",
                type:'POST',
                // dataType: 'json',
                contentType: false,
                processData: false,
                data: formData,
                success:function(data){
                    console.log(data);
                    $('#addEditAlbumDetail').modal('hide');
                    albumDetail.showDetail();
                    alertify.success('Thêm album thành công!');
                },
                error:function(xhr){
                    // console.log('lỗi');
                    var errors = xhr.responseJSON.errors;
                        $.each(errors,function(key,error){
                            $('#tbError').append(`<tr><td class="text-danger">${error}</td></tr>`)
                        });
                    alertify.error('Thêm album không thành công!');
                }
            });

        }
        // update
        else{
            var formData = new FormData();
            var uri = url +  "/albumDetail/update/" + $('#idAlbumDetail').val();
            formData.append('id', $('#idAlbumDetail').val());
            formData.append('title', $('#name').val());
            formData.append('description', $('#description').val());
            formData.append('isHot', $('#isHot').val());
            formData.append('image', $('#image')[0].files[0]);
            formData.append('album_id', $('#album_id').val());
            for(let i = 0 ; i< $('#filename')[0].files.length ; i++){
                formData.append("filename[]", $('#filename')[0].files[i]);
            }
            $.ajax({
                url: uri ,
                method: PUT,
                // dataType: 'json',
                contentType: false,
                processData: false,
                data: formData,
                success:function(data){
                    // console.log(data);
                    $('#addEditAlbumDetail').modal('hide');
                    albumDetail.showDetail();
                    alertify.success('Update album thành công!');
                },
                error:function(xhr){
                    // console.log('lỗi');
                    var errors = xhr.responseJSON.errors;
                    $.each(errors,function(key,error){
                        $('#tbError').append(`<tr><td class="text-danger">${error}</td></tr>`)
                    });
                    alertify.error('Update album không thành công!');
                }
            });
        }
    }
}

albumDetail.openModal = function(){
    albumDetail.reset();
    $('#addEditAlbumDetail').modal('show');
}

albumDetail.reset = function(){
    $('#idAlbumDetail').val('0');
    $('#name').val("");
    $('#description').val("");
    $('#isHot').val("");
    $('#image').val('');
    $('#filename').val('');
    $('#tbError').html('');

}

albumDetail.get = function(id){
    $.ajax({
        url: url + '/albumDetail/edit/' + id,
        type:'GET',
        dataType: 'json',
        success:function(data){
            $('#idAlbumDetail').val(data.id);
            $('#name').val(data.title);
            $('#description').val(data.description);
            $('#isHot').val(data.isHot);
            $('#image').attr("src",data.image);
            $('#filename').attr("src",data.filename);
            $('#addEditAlbumDetail').find('.modal-title').text('Edit album!');
            $('#addEditAlbumDetail').find('#buttonAD').text('Save change');
            $('#addEditAlbumDetail').modal('show');
        }
    });
}

albumDetail.delete = function(id){
    bootbox.confirm({
        title: "Xóa alum này?",
        message: "Bạn chắc chắn muốn xóa?",
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
                    url: url + "/albumDetail/destroy/" + id,
                    type: 'DELETE',
                    dataType: 'json',
                    success:function(data){
                        console.log(data);
                        alertify.success('Đã xóa album thành công!');
                        albumDetail.showDetail();
                    },
                    error:function(){
                        alertify.error('Xóa album không thành công!')
                    }
                })
            }

        }
    });

}


albumDetail.showImage = function(id) {
    $.ajax({
        url: url + "/albumDetail/apiDetailAlbum/" + id,
        type: 'GET',
        dataType: 'json',
        success:function(data){
            console.log(data);
            // $("#table-data").empty();
            // $.each(data, function(i,value){
            //     console.log(da)

            // });
        }
    });
}
albumDetail.init = function(){
    albumDetail.showDetail();
}

$(document).ready( function () {
    albumDetail.init();
    // t =  $('#tbAlbum').DataTable();
} );
