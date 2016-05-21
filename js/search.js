$(document).ready(function(){
    $(document).on("click", "#search", function()
    {
        if($("#search_input").val() != '')
            {
                var form_data = $("#search_form").serialize();
                $.ajax
                ({
                    method: "POST",
                    url: "http://lost-bikes.zzz.com.ua/bikes/check",
                    data: form_data,
                    success: function(answer)
                    {
                        if(answer != 'nothing found')
                        {
                            if($("#info_message").css("display") == "block") $("#info_message").hide();
                            $("#bikes").html(answer);
                        }
                        else
                        {
                            $("#bikes").html('');
                            $("#message_text").text('Ничего не найдено');
                            $("#info_message").slideDown();
                        }
                    }
                });
            }

    });
});