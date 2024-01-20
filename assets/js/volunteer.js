//Add Volunteer
$(document.body).on("click", ".volunteer-btn", function(){
    $("input[name='id']").val(this.id);
    $("#addVolunteer").modal('show');
});


//Save Volunteer
$(".regiter-volunteer").on('click', function(){
    $.ajax({
        url : './config/db_function.php',
        method : 'POST',
        data : new FormData($("#reg-volunteer-form")[0]),
        contentType : false,
        cache : false,
        processData : false,
        success : function(response){
            var resp = $.parseJSON(response);
            if (resp.status == 200) {
                alert(resp.message);
                $("#reg-volunteer-form").trigger("reset");
                $("#addVolunteer").modal('hide');
            }else if(resp.status == 303){
                alert(resp.message);
                console.log(resp.message);
                // $("#add-event-form").trigger("reset");
            }
        }
    })
});