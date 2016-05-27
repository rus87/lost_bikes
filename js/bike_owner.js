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
    $(document).on("click", "#parts_add_btn", function()
    {

        if($("#parts_add_div").css('display') == 'none') $("#parts_add_div").slideDown(200);
        else $("#parts_add_div").slideUp(200);
        if($.trim($("#parts_add_div").html()) == '')
        {
            var filled_keys = $("td.part_key");
            var keys_output = [];
            for(key in filled_keys)
            {
                if(filled_keys[key].textContent != null || filled_keys[key].textContent != undefined)
                    keys_output[key] = filled_keys[key].textContent;
            }
            //console.log(keys_output);
            var keys_output_string = JSON.stringify(keys_output);
            $.ajax(
                {
                    method: "POST",
                    url: "http://lost-bikes.zzz.com.ua/bike/generate_empty_parts_form",
                    data: "data="+keys_output_string,
                    success: function(answer)
                    {
                        $("#parts_add_div").html(answer);

                    }
                });
        }

    });

    $(document).on("click", "#parts_send_btn", function()
    {
        var form_data = $("#parts_add_form").serialize();
        //alert(typeof (form_data));
        //console.log(form_data);
        $.ajax(
            {
                method: "POST",
                url: "http://lost-bikes.zzz.com.ua/bike/add_parts",
                data: form_data,
                success: function(answer)
                {


                }
            });

    });
});