   function readURL(input) {
       $("#prev_div").hide();
        if (input.files && input.files[0]) {
            var reader = new FileReader();
            reader.onload = function (e) {
                $('#prev_img').attr('src', e.target.result);
            } 
            reader.readAsDataURL(input.files[0]);
        }
    }
    
    function preview() {
        var name = $("#name").val();
        var text = $("#text").val();
        var email = $("#email").val();
        $("#prev_name").html("<b>User: </b>" + name);
        $("#prev_text").text(text);
        $("#prev_email").html("<b>E-mail: </b>" + email);
        $("#prev_div").show();
    }
    
    $( document ).ready(function() {
        $("#prev_div").hide();
});
    