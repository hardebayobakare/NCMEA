
//Update Event Table
var table = $('#event-list').DataTable({
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
                    '<button type="button" class="btn btn-outline-success edit-event" id="'+row.Event_ID+'"><span style="display:none;">'+JSON.stringify(row)+'</span>Edit</button>&nbsp&nbsp'+
                    '<button type="button" class="btn btn-outline-danger delete-event" event_id="'+row.Event_ID+'"name="'+row.Event_Title+'">Delete</button>'+
                    '</div>')
        },
        
    }],
    "aLengthMenu": [[10, 20, 30, 50, 75, -1], [10, 20, 30, 50, 75, "All"]],
    "pageLength": 10,
    "ajax": {
        url:'./php/classes/Events.php?GET_EVENTS=1',
        dataSrc:'data'
    },
    "columns" : [
        {data : "Event_Title"},
        {data : "Event_Content"},
        {data : "Event_Location"},
        {data : "Event_Date"},
    ]
});

//View Image Modal
$(document.body).on("click", ".view-image", function(){
    var event = $.parseJSON($.trim($(this).children("span").html()));
    console.log(event);
    document.getElementById('modalImage').src = "assets/img/events/" + event.Event_Image;
    $("#viewImage").modal('show');
});

//Add Event Modal
$(".add-event").on("click", function(){
    $.ajax({
        url : './php/classes/Events.php',
        method : 'POST',
        data : new FormData($("#add-event-form")[0]),
        contentType : false,
        cache : false,
        processData : false,
        success : function(response){
            var resp = $.parseJSON(response);
            if (resp.status == 200) {
                $("#add-event-form").trigger("reset");
                $("#addEvent").modal('hide');
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

//Edit Event Modal
$(document.body).on("click", ".edit-event", function(){
    var event = $.parseJSON($.trim($(this).children("span").html()));
    var time = event.Event_Time.slice(-8);
    $("input[name='id']").val(event.Event_ID);
    $("input[name='title']").val(event.Event_Title);
    $("input[name='date']").val(event.Event_Date);
    $("input[name='time']").val(time);
    $("input[name='location']").val(event.Event_Location);
    $("textarea[name='content']").val(event.Event_Content);
    $("input[name='event_image']").siblings("img").attr("src", "assets/img/events/"+ event.Event_Image);
    var video = document.getElementById('video');
    var sources = video.getElementsByTagName('source');
    sources[0].src = "assets/video/events/"+ event.Event_Video;
    video.load();
    $("#editEvent").modal('show');
});

//Save Update Edit Event Modal
$(".submitedit-event").on('click', function(){
    $.ajax({
        url : './php/classes/Events.php',
        method : 'POST',
        data : new FormData($("#edit-event-form")[0]),
        contentType : false,
        cache : false,
        processData : false,
        success : function(response){
            var resp = $.parseJSON(response);
            if (resp.status == 200) {
                table.ajax.reload();
                alert(resp.message);
                $("#edit-event-form").trigger("reset");
                $("#editEvent").modal('hide');
            }else if(resp.status == 303){
                alert(resp.message);
                console.log(resp.message);
                // $("#add-event-form").trigger("reset");
            }
        }
    })
});

//Delete Event
$(document.body).on('click', '.delete-event', function(){
    var eid = $(this).attr('event_id');
    var name = $(this).attr('name');
    if (confirm("Are you sure to delete " + name +"?")) {
        $.ajax({
            url : './php/classes/Events.php',
            method : 'POST',
            data : {DELETE_EVENT: 1, eid:eid},
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

