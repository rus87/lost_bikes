$(document).ready(function(){
    $(".parts_table tr").hover(
        function()
        {
            $(".edit_pen", this).css("visibility", "visible");
        },
        function()
        {
            $(".edit_pen", this).css("visibility", "hidden");
        }
    );
    $(".edit_pen").click(function(){
        $(".part_value", $(this).parent()).toggle();
        $(".part_edit_form", $(this).parent()).toggle();
    });

    $(document).on("click", ".edit_part_btn", function()
    {
        var part_key = $(this).attr('id');
        var bike_id = $(".bike_id").text();
        var part_value = $("input[name="+part_key+"]").val();
        $.ajax
        ({
            method: "POST",
            url: "http://lost-bikes.zzz.com.ua/bike/edit_part",
            data: "bike_id="+bike_id+"&part_value="+part_value+"&part_key="+part_key,
            success: function(answer)
            {
                $("span[id="+part_key+"]").text(part_value);
            }
        });
    });
});