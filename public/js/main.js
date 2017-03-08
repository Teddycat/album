$(document).ready(function () {

    $('.show-album').click(function () {
        $('#add-album').show();
    });

    $('.show-photo').click(function () {
        $('#add-photo').show();
    });

    $('.delete-album').click(function () {
        doAjax($(this).attr('album'), $(this).attr('token'), "/albums/delete/album");
    });

    $('.delete-photo').click(function () {
        doAjax($(this).attr('photo'), $(this).attr('token'), "/albums/delete/photo");
    });

    function doAjax(subject, token, link) {
        $.ajax({
            url: link,
            type: 'post',
            dataType: 'json',
            data: {
                "_token": token,
                "deleteSubject": subject
            },
            success: function (data) {
                if (data.result) {
                    window.location.reload();
                } else {
                    alert("Sorry, something going wrong");
                }
            }, error: function (data) {
                alert("Sorry, something going wrong");
                console.log(data);
            }
        });
    }
});