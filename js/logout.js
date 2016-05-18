$(document).ready(function(){
    
    $(document).on("click", "#logout", function()
    {
        $.ajax
        ({
            method: "POST",
            url: "http://127.0.0.1/lost_bikes/authorization/log_out",
            success: function(answer)
            {
                $("#user_panel").html(answer);
            }
        }); 
        
    });
    
     
});