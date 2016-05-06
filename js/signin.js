$(document).ready(function(){
    
    $(document).on("click", "#signin", function()
    {
        form_data = $("#sign_in_form").serialize();
        $.ajax
        ({
            method: "POST",
            url: "authorization/sign_in",
            data: form_data,
            success: function(answer)
            {
                var data = JSON.parse(answer);
                console.log(data);
                if(data.error != '')
                    {
                        $("#error_text").text(data.error);
                        $("#sign_in_error").slideDown();
                    }
                else
                    {
                        $("#sign_in_error").slideUp();
                        $("#user_panel").html(data.response);
                    }
            }
        }); 
        
    });
    
     
});