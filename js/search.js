$(document).ready(function(){
    $(document).on("click", "#search", function()
    {
        var form_data = $("#search_form").serialize();
        $.ajax
        ({
            method: "POST",
            url: "search/check",
            data: form_data,
            success: function(answer)
            {
                $("#bikes").html(answer);
            }
        });
    });
});