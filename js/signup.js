$(document).ready(function(){
    
    $("#send").click(function()
    {
        form_data = $("#signup").serialize();
        $.ajax
        ({
            method: "POST",
            url: "sign_up/validate",
            data: form_data,
            success: function(answer)
            {
                if(answer != 'OK')
                    {
                        var errors = JSON.parse(answer);
                        console.log(errors);
                        for(key in errors)
                            {
                                if(errors[key] != '')
                                    {
                                        $("#"+key+"_error").html(errors[key]);
                                        $("#signup_"+key).addClass("has-error");
                                        $("#"+key+"_error").show();    
                                    }
                                else
                                    {
                                        $("#signup_"+key).removeClass("has-error");
                                        $("#"+key+"_error").html(null);
                                        $("#signup_"+key).addClass("has-success");
                                        $("#signup_"+key).addClass("has-feedback");
                                    }
                                
                            }
                            
                    }
                else
                    {
                        $("#signup_form").fadeOut(200);
                        $("#reg_success").fadeIn(200);
                    }
                


                
            }
        });
    });   
});