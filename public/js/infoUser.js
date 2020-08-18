var ObjUser = ObjUser || {};
var url = location.origin;

ObjUser.getUser = function(id){
        $.ajax({
            type: "GET",
            url: url + "/user/edit/" + id,
            dataType: "json",
            success: function(data) {
                if(data != null){
                    $('#name').val(data[0].name);
                    $('#DOB').val(data[0].DOB);
                    $('#phone').val(data[0].phone);
                    $('#address').val(data[0].address);
                    $('#idUser').val(data[0].user_id);
                    $('#id').val(data[0].id);
                    var avatar = (data[0].image != null && data[0].image != '') ? data[0].image : 'image/noneAvt.png';
                    $('#avatar').attr("src",avatar);
                    $('#userModal').modal('show');
                }
            }
        });
}

ObjUser.save = function(){
    var objInfoUser = {};
    objInfoUser.id = $('#idUser').val();
    objInfoUser.idUser = $('#id').val();
    objInfoUser.name = $('#name').val();
    objInfoUser.DOB = $('#DOB').val();
    objInfoUser.phone = $('#phone').val();
    objInfoUser.address = $('#address').val();
    objInfoUser.avatar = $('#avatar').attr('src');
    $.ajax({
        type: "POST",
        url: url + "/user/update",
        data: JSON.stringify(objInfoUser),
        dataType: "json",
        contentType:"application/json",
        success: function (data) {
            console.log(data);
            $('#userModal').modal('hide');
            alertify.success('Đã thay đổi thông tin thành công!');
        },
        error:function(){
            console.log('lỗi');
        }
    });
}

ObjUser.uploadAvatar = function(element){
    var img = element.files[0];
    var reader = new FileReader();
    reader.onloadend = function() {
      $("#avatar").attr("src",reader.result);
    }
    reader.readAsDataURL(img);
}

// $(document).ready(function(){
//     ObjUser.getUser();
// })
