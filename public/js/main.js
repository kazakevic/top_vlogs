$('#confirm-delete').on('show.bs.modal', function(e) {
    $(this).find('.btn-ok').attr('href', $(e.relatedTarget).data('href'));
});


$('#check').click(function (e) {
    e.preventDefault();

    $.ajax({
        type: "POST",
        url: './check',
        data: {title: $('#title').val()},
        success: function( res ) {
            $("#loading").css("visibility", "hidden");
            if (res == 0)
            {
                $(".channel_form").css("visibility", "hidden")
                $('#info').html("");
                $('#info').html("<div class='alert alert-info' role='alert'>Channel not found... :(</div>");
            }
            else
            {
                $('#info').html("");
                obj = JSON.parse(res);

                $(".channel_form").css("visibility", "visible").hide().animate( { "opacity": "show", top:"100"} , 500 );
                $("#desc").val(obj.desc);
                $("#image").attr("src", obj.image);
                $("#image1").val(obj.image);
                $("#country1").html(obj.country);

            }
        },
        beforeSend: function( res ) {
            $("#loading").css("visibility", "visible");
        }

    });

});


$('#save').click(function (e) {
    e.preventDefault();

    var title = $('#title1').val();
    var desc = $('#desc').val();
    var image = $('#image1').val();
    var country = $('#country').val();

    $.ajax({
        type: "POST",
        url: './save',
        data: { title: title,
            desc: desc,
            image: image,
            country: country
        },

        success: function( res1 ) {
            $("#info").html("<div class='alert alert-success' role='alert'>Channel saved!</div>");
        },
        error :function( jqXhr ) {
            if( jqXhr.status === 422 ) {
                //process validation errors here.
                $errors = jqXhr.responseJSON; //this will get the errors response data.
                //show them somewhere in the markup
                //e.g
                errorsHtml = '<div class="alert alert-danger"><ul>';

                $.each( $errors, function( key, value ) {
                    errorsHtml += '<li>' + value[0] + '</li>'; //showing only the first error.
                });
                errorsHtml += '</ul></di>';

                $( '#info' ).html( errorsHtml ); //appending to a <div id="form-errors"></div> inside form
            } else {
                /// do some thing else
            }
        }

    });

});
/**
 * Created by Darjush on 8/27/2016.
 */
