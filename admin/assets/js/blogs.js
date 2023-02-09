//Update Blog Categories Table
var blogcat_table = $('#category-list').DataTable({
    columnDefs: [
        {
        targets: 2,
        render: function(data, type, row){
            return ('<div class="">'+
                    '<button type="button" class="btn btn-outline-success edit-blogcat" id="'+row.Blog_Cat_ID+'"><span style="display:none;">'+JSON.stringify(row)+'</span>Edit</button>&nbsp&nbsp'+
                    '<button type="button" class="btn btn-outline-danger delete-blogcat" blogcat_id="'+row.Blog_Cat_ID+'"name="'+row.Blog_Cat_Name+'">Delete</button>'+
                    '</div>')
        }},
        {
        targets: 1,
        render: function(data, type, row){
            return row.Blog_Cat_Name;
        }}
    ],
    "aLengthMenu": [[10, 20, 30, 50, 75, -1], [10, 20, 30, 50, 75, "All"]],
    "pageLength": 10,
    "ajax": {
        url:'./php/classes/Blogs.php?GET_BLOGCAT=1',
        dataSrc:'data'
    },
    "fnRowCallback" : function(nRow, aData, iDisplayIndex){
        $("td:first", nRow).html(iDisplayIndex +1);
       return nRow;
    },
    "columns" : [
        // {data : "Blog_Cat_ID" },
        {data : "Blog_Cat_Name"},
    ]
});

var blog_table = $('#blogs-list').DataTable({
    columnDefs: [
        {
        targets: 8,
        render: function(data, type, row){
            return ('<div class="">'+
                    '<button type="button" class="btn btn-outline-success edit-blog" id="'+row.Blog_ID+'"><span style="display:none;">'+JSON.stringify(row)+'</span>Edit</button>&nbsp&nbsp'+
                    '<button type="button" class="btn btn-outline-danger delete-blog" blog_id="'+row.Blog_ID+'"name="'+row.Blog_Title+'">Delete</button>'+
                    '</div>')
        }},
        {
        targets: 6,
        render: function(data, type, row){
            return ('<div class="">'+
                    '<a data-bs-toggle="modal" data-bs-target="#viewImage1" href="#viewImage1" class="view-image1"><span style="display:none;">'+JSON.stringify(row)+'</span>View Image</a>'+
                    '</div>')
        }},
        {
        targets: 7,
        render: function(data, type, row){
            return ('<div class="">'+
                    '<a data-bs-toggle="modal" data-bs-target="#viewImage2" href="#viewImage2" class="view-image2"><span style="display:none;">'+JSON.stringify(row)+'</span>View Image</a>'+
                    '</div>')
        }},
        {
        targets: 5,
        render: function(data, type, row, meta){
            content = row.Blog_Content.length
            if(content > 40){
                return ('<span>' + row.Blog_Content.substr( 0, 25 ) + '... </span>' +
                '<button class="more-button" onclick="showMore(this, ' + meta.row + ')">show more</button>') ;
            }else{
               return row.Blog_Content; 
            }

        }},
    ],
    "aLengthMenu": [[10, 20, 30, 50, 75, -1], [10, 20, 30, 50, 75, "All"]],
    "pageLength": 10,
    "ajax": {
        url:'./php/classes/Blogs.php?GET_BLOG=1',
        dataSrc:'data'
    },
    "columns" : [
        {data : "Blog_Title" },
        {data : "Date"},
        {data : function(row, type, val, met){
            var dateParts = new Date(Date.parse(row.Time.replace(/-/g, '/')));
            return formatAMPM(dateParts);
        }},
        {data : "Author"},
        {data : "Category"}
    ]
});

getBlogCategory();


//View Image Modal
$(document.body).on("click", ".view-image1", function(){
    var blog = $.parseJSON($.trim($(this).children("span").html()));
    document.getElementById('modalImage1').src = "assets/img/blogs/" + blog.Blog_Image_S;
    $("#viewImage1").modal('show');
});
$(document.body).on("click", ".view-image2", function(){
    var blog = $.parseJSON($.trim($(this).children("span").html()));
    console.log(blog);
    document.getElementById('modalImage2').src = "assets/img/blogs/" + blog.Blog_Image_B;
    $("#viewImage2").modal('show');
});

//Add Blog Modal
$(".add-blog").on("click", function(){
    $.ajax({
        url : './php/classes/Blogs.php',
        method : 'POST',
        data : new FormData($("#add-blog-form")[0]),
        contentType : false,
        cache : false,
        processData : false,
        success : function(response){
            console.log(response);
            var resp = $.parseJSON(response);
            if (resp.status == 200) {
                $("#add-blog-form").trigger("reset");
                $("#addBlog").modal('hide');
                $(".modal-backdrop").remove();
                blogcat_table.ajax.reload();
                getBlogCategory();
                alert(resp.message);
            }else if(resp.status == 303){
                alert(resp.message);
                console.log(resp.message);
                // $("#add-event-form").trigger("reset");
            }
        }
    })

});

//Add Blog category Modal
$(".add-blogcat").on("click", function(){
    $.ajax({
        url : './php/classes/Blogs.php',
        method : 'POST',
        data : new FormData($("#add-blogcat-form")[0]),
        contentType : false,
        cache : false,
        processData : false,
        success : function(response){
            var resp = $.parseJSON(response);
            if (resp.status == 200) {
                $("#add-blogcat-form").trigger("reset");
                $("#addBlogCat").modal('hide');
                $(".modal-backdrop").remove();
                blogcat_table.ajax.reload();
                getBlogCategory();
                alert(resp.message);
            }else if(resp.status == 303){
                alert(resp.message);
                console.log(resp.message);
                // $("#add-event-form").trigger("reset");
            }
        }
    })

});

//Edit BLog Category Modal
$(document.body).on("click", ".edit-blogcat", function(){
    var blogCat = $.parseJSON($.trim($(this).children("span").html()));
    $("input[name='id']").val(blogCat.Blog_Cat_ID);
    $("input[name='name']").val(blogCat.Blog_Cat_Name);
    $("#editBlogcat").modal('show');
});

//Edit BLog Category Modal
$(document.body).on("click", ".edit-blog", function(){
    var blog = $.parseJSON($.trim($(this).children("span").html()));
    var time = blog.Time.slice(-8);
    $("input[name='id']").val(blog.Blog_ID);
    $("input[name='title']").val(blog.Blog_Title);
    $("input[name='date']").val(blog.Date);
    $("input[name='time']").val(time);
    $("input[name='author']").val(blog.Author);
    $("textarea[name='content']").val(blog.Blog_Content);
    $("select[name='category_id']").val(blog.Blog_Cat_ID);
    $("input[name='blog_s_image']").siblings("img").attr("src", "assets/img/blogs/"+ blog.Blog_Image_S);
    $("input[name='blog_s_image']").siblings("img").attr("width", "200");
    $("input[name='blog_s_image']").siblings("img").attr("height", "200");
    $("input[name='blog_b_image']").siblings("img").attr("src", "assets/img/blogs/"+ blog.Blog_Image_B);
    $("input[name='blog_b_image']").siblings("img").attr("width", "200");
    $("input[name='blog_b_image']").siblings("img").attr("height", "200");
    // $("input[name='name']").val(blogCat.Blog_Cat_Name);
    $("#editBlog").modal('show');
});

//Save Update Edit Blog Category Modal
$(".submitedit-blogcat").on('click', function(){
    $.ajax({
        url : './php/classes/Blogs.php',
        method : 'POST',
        data : new FormData($("#edit-blogcat-form")[0]),
        contentType : false,
        cache : false,
        processData : false,
        success : function(response){
            var resp = $.parseJSON(response);
            if (resp.status == 200) {
                blogcat_table.ajax.reload();
                blog_table.ajax.reload();
                getBlogCategory();
                alert(resp.message);
                $("#edit-blogcat-form").trigger("reset");
                $("#editBlogcat").modal('hide');
            }else if(resp.status == 303){
                alert(resp.message);
                console.log(resp.message);
                // $("#add-event-form").trigger("reset");
            }
        }
    })
});

//Save Update Edit Blog Modal
$(".submitedit-blog").on('click', function(){
    $.ajax({
        url : './php/classes/Blogs.php',
        method : 'POST',
        data : new FormData($("#edit-blog-form")[0]),
        contentType : false,
        cache : false,
        processData : false,
        success : function(response){
            var resp = $.parseJSON(response);
            if (resp.status == 200) {
                blog_table.ajax.reload();
                alert(resp.message);
                $("#edit-blogform").trigger("reset");
                $("#editBlog").modal('hide');
            }else if(resp.status == 303){
                alert(resp.message);
                console.log(resp.message);
                // $("#add-event-form").trigger("reset");
            }
        }
    })
});

//Delete Blog Category
$(document.body).on('click', '.delete-blogcat', function(){
    var bid = $(this).attr('blogcat_id');
    var name = $(this).attr('name');
    if (confirm("Are you sure to delete " + name +"?")) {
        $.ajax({
            url : './php/classes/Blogs.php',
            method : 'POST',
            data : {DELETE_BLOGCAT: 1, bid:bid},
            success : function(response){
                var resp = $.parseJSON(response);
                if (resp.status == 200) {
                    blogcat_table.ajax.reload();
                    getBlogCategory();
                    alert(resp.message);
                }else if (resp.status == 303) {
                    alert(resp.message);
                }
            }

        });
    }
});

//GetBlogCategory
function getBlogCategory(){
    $.ajax({
        url : './php/classes/Blogs.php',
        method : 'GET',
        data : {GET_BLOGCAT: 1},
        success : function(response){;
            var resp = $.parseJSON(response);;
            var catSelectHTML = '<option value="">Select Category</option>';
            $.each(resp.data, function(index, value){
                catSelectHTML += '<option value="'+ value.Blog_Cat_ID +'">'+ value.Blog_Cat_Name +'</option>';
            });
            $(".category_list").html(catSelectHTML);
        }

    });
}

//Formate DateTime
function formatAMPM(date) {
    var hours = date.getHours();
    var minutes = date.getMinutes();
    var ampm = hours >= 12 ? 'pm' : 'am';
    hours = hours % 12;
    hours = hours ? hours : 12; // the hour '0' should be '12'
    minutes = minutes < 10 ? '0'+minutes : minutes;
    var strTime = hours + ':' + minutes + ' ' + ampm;
    return strTime;
}

//Show More Content 
function showMore(node, rowId) {
    var rowData = $('#blogs-list').DataTable().rows( rowId ).data().toArray()[0];
    var fullText = rowData["Blog_Content"];
    $( node.parentNode ).text( fullText );
}

