
$(document).ready(function() {

    var x = 1;
    var maxField = 5 ;
    $(".add").click(function() {

        if ( x < maxField) {
            x++;
            var lastField = $("#buildyourform div:last");
            var ListFeild = $("<div class=\"form-label-group \" id=\"field" + lastField + "\"/>");
            var fileName = $("<input type=\"file\" class=\"form-control\" name='image["+x+"]'/>");
            var removeButton = $("<input type=\"button\" class=\"remove\" value=\"-\" />");
            removeButton.click(function () {
                $(this).parent().remove();
                x--;
            });

            ListFeild.append(fileName);
            ListFeild.append(removeButton);
            $("#buildyourform").append(ListFeild);

        }
    });
});
