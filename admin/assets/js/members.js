
//Update Event Table
var new_table = $('#new-member-list').DataTable({
    columnDefs: [{
        targets: 5,
        render: function(data, type, row){
            return ('<div class="">'+
                    '<button type="button" class="btn btn-outline-primary view-member" id="'+row.User_ID+'"><span style="display:none;">'+JSON.stringify(row)+'</span>View</button>&nbsp&nbsp'+
                    '<button type="button" class="btn btn-outline-success confirm-member" member_id="'+row.User_ID+'"name="'+row.Name+'">Confirm</button>'+
                    '</div>')
        },
        
    }],
    "aLengthMenu": [[10, 20, 30, 50, 75, -1], [10, 20, 30, 50, 75, "All"]],
    "pageLength": 10,
    "ajax": {
        url:'./php/classes/Members.php?GET_NEW_MEMBERS=1',
        dataSrc:'data'
    },
    "columns" : [
        {data : "Name"},
        {data : "Email"},
        {data : "Phone"},
        {data : "Address"},
        {data : "Reg_Date"}
    ]
});

var old_table = $('#old-member-list').DataTable({
    dom: 'Bfrtip',
    buttons: [
        "excel", "pdf"
    ],
    columnDefs: [{
        targets: 5,
        render: function(data, type, row){
            return ('<div class="">'+
                    '<button type="button" class="btn btn-outline-danger delete-member" member_id="'+row.User_ID+'"name="'+row.Name+'">Delete</button>'+
                    '</div>')
        },
        
    }],
    "aLengthMenu": [[10, 20, 30, 50, 75, -1], [10, 20, 30, 50, 75, "All"]],
    "pageLength": 10,
    "ajax": {
        url:'./php/classes/Members.php?GET_OLD_MEMBERS=1',
        dataSrc:'data'
    },
    "columns" : [
        {data : "Name"},
        {data : "Email"},
        {data : "Phone"},
        {data : "Address"},
        {data : "Reg_Date"}
    ]
});
//View Member Modal

$(document.body).on("click", ".view-member", function(){
    var member = $.parseJSON($.trim($(this).children("span").html()));
    $("input[name='id']").val(member.User_ID);
    $("input[name='name']").val(member.Name);
    $("input[name='email']").val(member.Email);
    $("input[name='phone']").val(member.Phone);
    $("input[name='date']").val(member.Reg_Date);
    $("textarea[name='address']").val(member.Address);
    $("#viewMember").modal('show');
});

//Confirm Member Modal
$(".confirm-member-form").on('click', function(){
    var data = $("#view-member-form").serializeArray();
    var mid = data[6]["value"];
    var name = data[0]["value"];
    if (confirm("Are you sure to confirm " + name +"?")) {
        $.ajax({
            url : './php/classes/Members.php',
            method : 'POST',
            data : {CONFIRM_MEMBER: 1, mid:mid},
            success : function(response){
                var resp = $.parseJSON(response);
                if (resp.status == 200) {
                    new_table.ajax.reload();
                    old_table.ajax.reload();
                    $("#viewMember").modal('hide');
                    alert(resp.message);
                }else if (resp.status == 303) {
                    alert(resp.message);
                }
            }

        });
    }


});

//Confirm Member
$(document.body).on('click', '.confirm-member', function(){
    var mid = $(this).attr('member_id');
    var name = $(this).attr('name');
    if (confirm("Are you sure to confirm " + name +"?")) {
        $.ajax({
            url : './php/classes/Members.php',
            method : 'POST',
            data : {CONFIRM_MEMBER: 1, mid:mid},
            success : function(response){
                var resp = $.parseJSON(response);
                if (resp.status == 200) {
                    new_table.ajax.reload();
                    old_table.ajax.reload();
                    alert(resp.message);
                }else if (resp.status == 303) {
                    alert(resp.message);
                }
            }

        });
    }
});

//Delete Member
$(document.body).on('click', '.delete-member', function(){
    var mid = $(this).attr('member_id');
    var name = $(this).attr('name');
    if (confirm("Are you sure to delete " + name +"?")) {
        $.ajax({
            url : './php/classes/Members.php',
            method : 'POST',
            data : {DELETE_MEMBER: 1, mid:mid},
            success : function(response){
                var resp = $.parseJSON(response);
                if (resp.status == 200) {
                    new_table.ajax.reload();
                    old_table.ajax.reload();
                    alert(resp.message);
                }else if (resp.status == 303) {
                    alert(resp.message);
                }
            }

        });
    }
});

