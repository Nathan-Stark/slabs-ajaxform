$(document).ready( function(){

    $('.form-ajax').on('submit',function (e) {
        var form = $(this),
            method=form.attr('method'),
            action=form.attr('action'),
            data=form.serialize();

        e.preventDefault();

        $.ajax({
            type: method,
            url: action,
            data: data,
            dataType: "json",
            success: function(data){
                var modal = $('.modal'),
                    modalBody = $('.modal .modal-content'),
                    content ='';

                $('.field > *').removeClass("error");

                if( data["error"] != undefined ){
                    var dataError = data["error"];

                    for(var val in dataError) {
                        $("[name="+val+"]").addClass("error");
                        content = content + dataError[val]+'<br>';
                    }

                }

                if( data["note"] != undefined ){
                    content = data["note"];
                    $('.field > *').val("");
                }

                modalBody.html(content);
                modal.modal();

            }
        });

    });

});