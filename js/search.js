$(document).ready(function(){
    $(document).on("click", "#search", function()
    {
        if($("#search_input").val() != '')
            {
                var form_data = $("#search_form").serialize();
                $.ajax
                ({
                    method: "POST",
                    url: "http://127.0.0.1/lost_bikes/bikes/check",
                    data: form_data,
                    success: function(answer)
                    {
                        $("#bikes").html(answer);
                    }
                });
            }

    });
});