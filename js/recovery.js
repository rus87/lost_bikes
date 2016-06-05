
    function send()
    {
        var form = $("#recovery_form").serialize();

        $.ajax
        ({
            method: "POST",
            url: "http://lost-bikes.zzz.com.ua/authorization/recovery",
            data: form,
            success: function (answer)
            {
                if(answer == "error")
                {
                    $("#recovery_error").slideDown();
                }
                if(answer == 'OK')
                {
                    $("#recovery_error").slideUp();
                    $("#recovery_success").slideDown();
                }
            }
        });
    }

