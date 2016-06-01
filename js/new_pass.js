function send()
{
    var form = $("#new_pass_form").serialize();
    $.ajax
    ({
        method: "POST",
        url: "http://lost-bikes.zzz.com.ua/authorization/set_password",
        data: form,
        success: function (answer)
        {
            var response = JSON.parse(answer);
            if(response.status == 'error')
            {
                if(response.password_error != '')
                {
                    $("#password_error").text(response.password_error);
                    $("#password").addClass("has-error");
                    $("#password_error").show();
                }
                else
                {
                    $("#password_error").text('');
                    $("#password").removeClass("has-error");
                    $("#password").addClass("has-success");
                }

                if(response.passconf_error != '')
                {
                    $("#passconf_error").text(response.passconf_error);
                    $("#passconf").addClass("has-error");
                    $("#passconf_error").show();
                }
                else
                {
                    $("#passconf_error").text('');
                    $("#passconf").removeClass("has-error");
                    $("#passconf").addClass("has-success");
                }

            }
            if(response.status == 'OK')
            {
                $("#passconf_error").text('');
                $("#passconf").removeClass("has-error");
                $("#passconf").addClass("has-success");

                $("#password_error").text('');
                $("#password").removeClass("has-error");
                $("#password").addClass("has-success");
                $("#new_pass_form").slideUp();
                $("#success_msg").slideDown();
            }
        }
    });
}