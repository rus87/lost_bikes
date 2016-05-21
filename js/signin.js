$(document).ready(function(){
    
    $(document).on("click", "#show_login_popup", function()
    {
        $("#login_popup").toggle();
    });
    
    $(document).on("click", "#signin", function()
    {
        var form_data = $("#sign_in_form").serialize();
        $.ajax
        ({
            method: "POST",
            url: "http://lost-bikes.zzz.com.ua/authorization/sign_in",
            data: form_data,
            success: function(answer)
            {
                var data = JSON.parse(answer);
                console.log(data);
                if(data.error != '')
                    {
                        $("#error_text").text(data.error);
                        $("#user_error").slideDown();
                    }
                else
                    {
                        $("#user_error").slideUp();
                        $("#user_panel").html(data.response);
                    }
            }
        }); 
        
    });
    
     
});