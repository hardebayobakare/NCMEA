var formater = new Intl.NumberFormat('en-Us' , {
    currency: 'CAD', 
    style: 'currency',
});
//Update Donation Table
var table = $('#donation-list').DataTable({
    columnDefs: [{
        targets: 4,
        render: function(data, type, row){
            return ('<div class="">'+
                    '<a data-bs-toggle="modal" data-bs-target="#viewImage" href="#viewImage" class="view-image"><span style="display:none;">'+JSON.stringify(row)+'</span>View Image</a>'+
                    '</div>')
        }},
        {
        targets: 5,
        render: function(data, type, row){
            return ('<div class="">'+
                    '<button type="button" class="btn btn-outline-success edit-donation" id="'+row.Donation_ID+'"><span style="display:none;">'+JSON.stringify(row)+'</span>Edit</button>&nbsp&nbsp'+
                    '<button type="button" class="btn btn-outline-danger delete-donation" donation_id="'+row.Donation_ID+'"name="'+row.Donation_Title+'">Delete</button>'+
                    '</div>')
        },
        
    }],
    "aLengthMenu": [[10, 20, 30, 50, 75, -1], [10, 20, 30, 50, 75, "All"]],
    "pageLength": 10,
    "ajax": {
        url:'./php/classes/Donations.php?GET_DONATIONS=1',
        dataSrc:'data'
    },
    "columns" : [
        {data : "Donation_Title"},
        {data : "Donation_Content"},
        {data : function(row){
            return formater.format(row.Funds_Needed)
        }},
        {data : function(row){
            return formater.format(row.Funds_Received)
        }},
    ]
});

$(".add-modal").on("click", function(){
    $("#add-donation-form").trigger("reset");
    $(".modal-backdrop").remove();
});

//Add Donation Modal
$(".add-donation").on("click", function(){
    $.ajax({
        url : './php/classes/Donations.php',
        method : 'POST',
        data : new FormData($("#add-donation-form")[0]),
        contentType : false,
        cache : false,
        processData : false,
        success : function(response){
            var resp = $.parseJSON(response);
            if (resp.status == 200) {
                $("#add-donation-form").trigger("reset");
                $("#addDonation").modal('hide');
                $(".modal-backdrop").remove();
                table.ajax.reload();
                alert(resp.message);
            }else if(resp.status == 303){
                alert(resp.message);
                console.log(resp.message);
                // $("#add-event-form").trigger("reset");
            }
        }
    })

});

//Edit Donation Modal
$(document.body).on("click", ".edit-donation", function(){
    var donation = $.parseJSON($.trim($(this).children("span").html()));
    $("input[name='id']").val(donation.Donation_ID);
    $("input[name='title']").val(donation.Donation_Title);
    $("input[name='f_required']").val(donation.Funds_Needed);
    $("input[name='f_received']").val(donation.Funds_Received);
    $("textarea[name='content']").val(donation.Donation_Content);
    $("input[name='donation_image']").siblings("img").attr("src", "assets/img/donations/"+ donation.Donation_Image);
    $("#editDonation").modal('show');
});

//Save Update Edit Donation Modal
$(".submitedit-donation").on('click', function(){
    $.ajax({
        url : './php/classes/Donations.php',
        method : 'POST',
        data : new FormData($("#edit-donation-form")[0]),
        contentType : false,
        cache : false,
        processData : false,
        success : function(response){
            var resp = $.parseJSON(response);
            if (resp.status == 200) {
                table.ajax.reload();
                alert(resp.message);
                $("#edit-donation-form").trigger("reset");
                $("#editDonation").modal('hide');
                $(".modal-backdrop").remove();
            }else if(resp.status == 303){
                alert(resp.message);
                console.log(resp.message);
                // $("#add-event-form").trigger("reset");
            }
        }
    })
});

//Delete Donation
$(document.body).on('click', '.delete-donation', function(){
    var eid = $(this).attr('donation_id');
    var name = $(this).attr('name');
    if (confirm("Are you sure to delete " + name +"?")) {
        $.ajax({
            url : './php/classes/Donations.php',
            method : 'POST',
            data : {DELETE_DONATION: 1, eid:eid},
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
