jQuery(function ($) {
    $("#submitFormRegistration").click(function (event) {

        let form = $('#registration_form');
        let msg = form.serialize();

        $(".error_info_form").remove();
        $(".messagesApi").remove();

        let alert = $('#alertErrorInformation');

        $.ajax({
            type: 'POST',
            dataType: 'json',
            url: 'http://' + window.location.hostname + '/registration_user',
            data: msg,
            success: function (data) {
                //console.log(data)
                if (data.status === 401) {
                    $('#alertMessage').after('<span class="messagesApi"> '+data.message+'</span>')
                    alert.show()
                } else {
                    window.location.replace('http://' + window.location.hostname + '/' + data.page)
                    //content()
                }
            },
            error: function (logError) {
                $('#alertMessage').after('<span class="messagesApi"> An error has occurred, please try again later</span>')
                alert.show()
            }
        });
    })

    function content() {
        $('#maimContentRegistration').remove()
        $("#maimBlockRegistration").append('<h3 class="display-4">User is successfully registered !</h3>' +
            '<p class="text-muted mb-4">Go to the user view page? </p>' +
            '<a href="afterLogin"><button type="button" class="btn btn-primary btn-block text-uppercase mb-2 rounded-pill shadow-sm">User list page</button></a>')
    }

})