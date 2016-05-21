$(document).ready(function(){
    
    $(document).on("click", "#logout", function()
    {
        $.ajax
        ({
            method: "POST",
            url: "http://lost-bikes.zzz.com.ua/authorization/log_out",
            success: function(answer)
            {
                $("#user_panel").html(answer);
            }
        }); 
        
    });
    
     
});