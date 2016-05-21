$(document).ready(function(){
    
    $(document).on("click", "#add_bike", function()
    {
        var form_data = new FormData($('form')[0]);
        $.ajax
        ({
            method: "POST",
            url: "add_bike/add",
            processData: false,
            contentType: false,
            data: form_data,
            success: function(answer)
            {
                
                if(answer != "OK")
                    {
                        console.log(answer);
                        $("#error_text").html(answer);
                        $("#user_error").slideDown();
                    }
                else
                    {
                        $("#user_error").slideUp();
                        $("#content").html("success!");
                    }
            }
        });
        //console.log(form_data);
    });
    
    $(document).on("click", "#show_parts_btn", function()
    {
        if( $("#parts").css('display') == 'none' ) $("#parts").slideDown(500);
        else $("#parts").slideUp(500);
    });
    
        $(document).on("click", "#hide_parts_btn", function()
    {
        $("#parts").slideUp(500);
    });


});