var banner_table;
$(document.body).on("click", ".get-content", function(){
    const select = document.getElementById('page');
    
    if(select.value == 'home'){
        loadHome();
    }
    else{
        $('.home-page').hide();
    }
});

$(".add-banner").on("click", function(){
    $.ajax({
        url : './php/classes/Pages.php',
        method : 'POST',
        data : new FormData($("#add-banner-form")[0]),
        contentType : false,
        cache : false,
        processData : false,
        success : function(response){
            console.log(response);
            var resp = $.parseJSON(response);
            if (resp.status == 200) {
                $("#add-banner-form").trigger("reset");
                $("#addHomeBanners").modal('hide');
                $(".modal-backdrop").remove();
                banner_table.ajax.reload();
                alert(resp.message);
            }else if(resp.status == 303){
                alert(resp.message);
                console.log(resp.message);
            }
        }
    })

});

//Delete Event
$(document.body).on('click', '.delete-banner', function(){
    // document.getElementById('vol-list').style.display = "none";
    var eid = $(this).attr('banner_id');
    var name = $(this).attr('name');
    if (confirm("Are you sure to delete " + name +"?")) {
        $.ajax({
            url : './php/classes/Pages.php',
            method : 'POST',
            data : {DELETE_BANNER: 1, eid:eid},
            success : function(response){
                var resp = $.parseJSON(response);
                if (resp.status == 200) {
                    banner_table.ajax.reload();
                    alert(resp.message);
                }else if (resp.status == 303) {
                    alert(resp.message);
                }
            }

        });
    }
});

//Edit Event Modal
$(document.body).on("click", ".edit-banner", function(){
    var banner = $.parseJSON($.trim($(this).children("span").html()));

    $("#editBanner #name").val(banner.Image); // Set banner name
    $("#editBanner #showMessage").prop('checked', banner.ShowMessage == 1); // Set ShowMessage switch
    $("#editBanner #status").prop('checked', banner.Status == 1); // Set Status switch

    // Optionally set the hidden input for banner ID
    $("#editBanner input[name='id']").val(banner.ID); 

    $("#editBanner").modal('show');
});

//Save Update Edit Blog Category Modal
$(".submitedit-banner").on('click', function(){
    $.ajax({
        url : './php/classes/Pages.php',
        method : 'POST',
        data : new FormData($("#edit-banner-form")[0]),
        contentType : false,
        cache : false,
        processData : false,
        success : function(response){
            var resp = $.parseJSON(response);
            if (resp.status == 200) {
                banner_table.ajax.reload();
                alert(resp.message);
                $("#edit-banner-form").trigger("reset");
                $("#editBanner").modal('hide');
            }else if(resp.status == 303){
                alert(resp.message);
                console.log(resp.message);
            }
        }
    })
});


function loadHome(){
    loadBanners();
    $('.home-page').show();
}

function loadBanners(){
    banner_table = $('#banners-list').DataTable({
        columnDefs: [
            {
            targets: 4,
            render: function(data, type, row){
                return ('<div class="">'+
                        '<button type="button" class="btn btn-outline-success edit-banner" id="'+row.ID+'"><span style="display:none;">'+JSON.stringify(row)+'</span>Edit</button>&nbsp&nbsp'+
                        '<button type="button" class="btn btn-outline-danger delete-banner" banner_id="'+row.ID+'"name="'+row.Image+'">Delete</button>'+
                        '</div>')
            }},
        ],
        "aLengthMenu": [[10, 20, 30, 50, 75, -1], [10, 20, 30, 50, 75, "All"]],
        "pageLength": 10,
        "ajax": {
            url:'./php/classes/Pages.php?GET_BANNERS=1',
            dataSrc:'data'
        },
        "fnRowCallback" : function(nRow, aData, iDisplayIndex){
            $("td:first", nRow).html(iDisplayIndex +1);
           return nRow;
        },
        "columns" : [
            { data: null },
            { data: "Image" },
            {data : function(row, type, val, met){
                if (row.Status == 0){
                    return '<span class="badge badge-danger">Inactive</span>';
                } else {
                    return '<span class="badge badge-success">Active</span>';
                }
            }},
            {data : function(row, type, val, met){
                if (row.ShowMessage == 0){
                    return '<span class="badge badge-danger">Inactive</span>';
                } else {
                    return '<span class="badge badge-success">Active</span>';
                }
            }},
            { data: null } 
        ]
    });
}

