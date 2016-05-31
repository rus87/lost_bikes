$(document).ready(function(){
    $("#bike .thumb").hover(
        function()
        {
            $(".thumb_menu").fadeIn(200);
        },
        function()
        {
            $(".thumb_menu").fadeOut(200);
        }
    );
    $(".thumb_menu a").click(function()
    {
        $(".thumb_menu").fadeOut(200);
    });
    
    
    $("#popup_photo #close").click(function()
    {
        $("#popup_photo").fadeOut(50);
        $("#dark_back").fadeOut(100);
    });
    
    $("#bike #thumb_photo").click(function()
    {
        $("#dark_back").fadeIn(100);
        $("#popup_photo").fadeIn(50);
        
    });
    
    
    $("#dark_back").click(function()
    {
        if($("#popup_photo").css("display") != "none")
        {
            $("#popup_photo").fadeOut(50);
            $("#dark_back").fadeOut(100);
        }
        
    });

});