$(document).ready(function(){

    // Sign In Button
    $(".signin-btn").on("click", function(){
        $.ajax({
            url : './php/classes/Credentials.php',
            method : "POST",
            data : $("#sign-in-form").serialize(),
            success : function(response){
                console.log(response);
                var resp = $.parseJSON(response);
                if (resp.status == 200) {
                    // Get the base URL dynamically
                    var baseUrl = window.location.origin + window.location.pathname.substring(0, window.location.pathname.lastIndexOf('/'));

                    // Redirect to baseUrl + '/admin/index.php'
                    window.location.href = baseUrl + "/index.php";
                    console.log(window.location.href);
                } else if (resp.status == 303){
                    $(".message").html('<span class="text-danger">'+resp.message+'</span>');
                }
            }
        });
    });

});
