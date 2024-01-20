//Update Event Table
var table = $('#scholar-list').DataTable({
    columnDefs: [{
        targets: 6,
        render: function(data, type, row){
            return ('<div class="">'+
                    '<a data-bs-toggle="modal" data-bs-target="#viewImage" href="#viewImage" class="view-image"><span style="display:none;">'+JSON.stringify(row)+'</span>View Image</a>'+
                    '</div>')
        }},
        {
        targets: 7,
        render: function(data, type, row){
            return ('<div class="">'+
                    '<button type="button" class="btn btn-outline-success edit-scholar" id="'+row.Scholar_ID+'"><span style="display:none;">'+JSON.stringify(row)+'</span>Edit</button>&nbsp&nbsp'+
                    '<button type="button" class="btn btn-outline-danger delete-scholar" scholar_id="'+row.Scholar_ID+'"name="'+row.Scholar_Name+'">Delete</button>'+
                    '</div>')
        },
        
    }],
    "aLengthMenu": [[10, 20, 30, 50, 75, -1], [10, 20, 30, 50, 75, "All"]],
    "pageLength": 10,
    "ajax": {
        url:'./php/classes/Scholars.php?GET_SCHOLARS=1',
        dataSrc:'data'
    },
    "columns" : [
        {data : "Scholar_Name"},
        {data : "Scholar_Description"},
        {data : "Scholar_Email"},
        {data : "Twitter"},
        {data : "Facebook"},
        {data : "Youtube"},
    ]
});

//View Image Modal
$(document.body).on("click", ".view-image", function(){
    var scholar = $.parseJSON($.trim($(this).children("span").html()));
    console.log(scholar);
    document.getElementById('modalImage').src = "assets/img/scholars/" + scholar.Scholar_Image;
    $("#viewImage").modal('show');
});

//Add Scholar Modal
$(".add-scholar").on("click", function(){
    $.ajax({
        url : './php/classes/Scholars.php',
        method : 'POST',
        data : new FormData($("#add-scholar-form")[0]),
        contentType : false,
        cache : false,
        processData : false,
        success : function(response){
            var resp = $.parseJSON(response);
            if (resp.status == 200) {
                $("#add-scholar-form").trigger("reset");
                $("#addScholar").modal('hide');
                $(".modal-backdrop").remove();
                table.ajax.reload();
                alert(resp.message);
            }else if(resp.status == 303){
                alert(resp.message);
                console.log(resp.message);
            }
        }
    })

});

//Edit Scholar Modal
$(document.body).on("click", ".edit-scholar", function(){
    var scholar = $.parseJSON($.trim($(this).children("span").html()));
    $("input[name='id']").val(scholar.Scholar_ID);
    $("input[name='name']").val(scholar.Scholar_Name);
    $("input[name='email']").val(scholar.Scholar_Email);
    $("input[name='twitter']").val(scholar.Twitter);
    $("input[name='facebook']").val(scholar.Facebook);
    $("input[name='youtube']").val(scholar.Youtube);
    $("textarea[name='description']").val(scholar.Scholar_Description);
    $("input[name='scholar_image']").siblings("img").attr("src", "assets/img/scholars/"+ scholar.Scholar_Image);
    $("#editScholar").modal('show');
});

//Save Update Edit Scholar Modal
$(".submitedit-scholar").on('click', function(){
    $.ajax({
        url : './php/classes/Scholars.php',
        method : 'POST',
        data : new FormData($("#edit-scholar-form")[0]),
        contentType : false,
        cache : false,
        processData : false,
        success : function(response){
            var resp = $.parseJSON(response);
            if (resp.status == 200) {
                table.ajax.reload();
                alert(resp.message);
                $("#edit-scholar-form").trigger("reset");
                $("#editScholar").modal('hide');
            }else if(resp.status == 303){
                alert(resp.message);
                console.log(resp.message);
                // $("#add-event-form").trigger("reset");
            }
        }
    })
});

//Delete Scholar
$(document.body).on('click', '.delete-scholar', function(){
    var sid = $(this).attr('scholar_id');
    var name = $(this).attr('name');
    if (confirm("Are you sure to delete " + name +"?")) {
        $.ajax({
            url : './php/classes/Scholars.php',
            method : 'POST',
            data : {DELETE_SCHOLAR: 1, sid:sid},
            success : function(response){
                var resp = $.parseJSON(response);
                if (resp.status == 200) {
                    table.ajax.reload();
                    alert(resp.message);
                }else if (resp.status == 303) {
                    alert(resp.message);
                }
            }

        });
    }
});

$(".add-scholar-modal").on("click", function(){
    $("#add-scholar-form").trigger("reset");
    $(".modal-backdrop").remove();
});
