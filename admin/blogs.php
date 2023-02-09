<?php
    include "session.php";
    include "header.php";

?>

<!DOCTYPE html>
<html lang="en" dir="ltr">
<body class="ec-header-fixed ec-sidebar-fixed ec-sidebar-dark ec-header-light" id="body">

<!-- WRAPPER -->
<div class="wrapper">
    
    <!-- LEFT MAIN SIDEBAR -->
    <?php include "sidebar.php"?>

    <!-- PAGE WRAPPER -->
    <div class="ec-page-wrapper">

        <!-- Header -->
        <?php include "dashboard-header.php"?>

        <!-- CONTENT WRAPPER -->
        <div class="ec-content-wrapper ec-vendor-wrapper">
            <div class="content">
                <div class="breadcrumb-wrapper d-flex align-items-center justify-content-between">
                    <div>
                        <h1>Blogs</h1>
                        <p class="breadcrumbs"><span><a href="index.php">Home</a></span><span><i class="mdi mdi-chevron-right"></i></span> Webpage Content</p>
                    </div>

                    <div>
                        <button type="button" class="btn btn-primary" data-bs-toggle="modal"
                            data-bs-target="#addBlog"> Create New Blog
                        </button>
                        <button type="button" class="btn btn-primary" data-bs-toggle="modal"
                            data-bs-target="#addBlogCat"> Create New Blog Category
                        </button>
					</div>
                </div>
                <div class="row">
                    <div>
                        <h4>Blog Categories</h4>
                    </div>
                    <div class="col-12">
                        <div class="ec-vendor-list card card-default">
                            <div class="card-body">
                                <div class="table-responsive">
                                    <table id="category-list" class="table">
                                        <thead>
                                            <tr>
                                                <th>S/N</th>
                                                <th>Name</th>
                                                <th>Action</th>
                                            </tr>
                                        </thead>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
				</div>
                <br><br>
                <div class="row">
                    <div>
                        <h4>Blogs</h4>
                    </div>
                    <div class="col-12">
                        <div class="ec-vendor-list card card-default">
                            <div class="card-body">
                                <div class="table-responsive">
                                    <table id="blogs-list" class="table">
                                        <thead>
                                            <tr>
                                                <th>Title</th>
                                                <th>Date</th>
                                                <th>Time</th>
                                                <th>Author</th>
                                                <th>Category</th>
                                                <th>Content</th>
                                                <th>Preview Image</th>
                                                <th>Content Image</th>
                                                <th>Action</th>
                                            </tr>
                                        </thead>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
				</div>
                <!-- View Preview Image MOdal  -->
                <div class="modal fade modal-add-contact" id="viewImage1" tabindex="-1" role="dialog"
                    aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                    <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
                        <div class="modal-content">
                        <div class="image mb-3">  
                            <img id="modalImage1" src="" class="img-fluid rounded-circle"
                                alt="Blog Image">
                            </div>   
                        </div>
                    </div>
                </div>
                <!-- View Content Image MOdal  -->
                <div class="modal fade modal-add-contact" id="viewImage2" tabindex="-1" role="dialog"
                    aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                    <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
                        <div class="modal-content">
                        <div class="image mb-3">  
                            <img id="modalImage2" src="" class="img-fluid rounded-circle"
                                alt="Blog Image">
                            </div>   
                        </div>
                    </div>
                </div>
                <!-- Add Blog Modal  -->
                <div class="modal fade modal-add-contact" id="addBlog" tabindex="-1" role="dialog"
                    aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                    <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
                        <div class="modal-content">
                        <form id="add-blog-form" enctype="multipart/form-data">
                                <div class="modal-header px-4">
                                    <h5 class="modal-title" id="exampleModalCenterTitle">Add Blog</h5>
                                </div>
                                <div class="modal-body px-4">
                                    <div class="row mb-2">
                                        <div class="form-group">
                                            <input type="text" class="form-control" id="title" name="title" placeholder="Title">
                                        </div>
                                        <div class="form-group">
                                            <input type="date" class="form-control" id="date" name="date" placeholder="Date">
                                        </div>
                                        <div class="form-group">
                                            <input type="time" class="form-control" id="time" name="time" placeholder="Time">
                                        </div>
                                        <div class="form-group">
                                            <input type="text" class="form-control" id="author" name="author" placeholder="Author">
                                        </div>
                                        <div class="form-group">
                                            <select class="form-control category_list" name="category_id">
                                                <option value="">Select Category</option>
                                            </select>
                                        </div>
                                        <div class="form-group">
                  							<textarea type="text" class="form-control" id="content" name="content" placeholder="Content"></textarea>
                						</div>
                                        <div class="form-group">
                                            <label for="image">Select Blog Preview Image<small>(format: (jpg, jpeg, png) max size: 2MB)</small>:</label>
                                            <input type="file" class="form-control" id="image" name="blog_s_image">
                                        </div>
                                        <div class="form-group">
                                            <label for="image">Select Blog Content Image<small>(format: (jpg, jpeg, png) max size: 3MB)</small>:</label>
                                            <input type="file" class="form-control" id="image" name="blog_b_image">
                                        </div>
                                    </div>
                                </div>
                                <input type="hidden" name="add_blog" value="1">
                                <input type="hidden" name="id">
                                <div class="modal-footer px-4">
                                    <button type="button" class="btn btn-secondary btn-pill cancel-btn"
                                        data-bs-dismiss="modal">Cancel</button>
                                    <button type="button" class="btn btn-primary btn-pill add-blog">Save New Blog</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
                <!-- Edit Blog Modal  -->
                <div class="modal fade modal-add-contact" id="editBlog" tabindex="-1" role="dialog"
                    aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                    <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
                        <div class="modal-content">
                            <form id="edit-blog-form" enctype="multipart/form-data">
                                <div class="modal-header px-4">
                                    <h5 class="modal-title" id="exampleModalCenterTitle">Edit Blog</h5>
                                </div>
                                <div class="modal-body px-4">
                                    <div class="row mb-2">
                                        <div class="form-group">
                                            <input type="text" class="form-control" id="title" name="title" placeholder="Title">
                                        </div>
                                        <div class="form-group">
                                            <input type="date" class="form-control" id="date" name="date" placeholder="Date">
                                        </div>
                                        <div class="form-group">
                                            <input type="time" class="form-control" id="time" name="time" placeholder="Time">
                                        </div>
                                        <div class="form-group">
                                            <input type="text" class="form-control" id="author" name="author" placeholder="Author">
                                        </div>
                                        <div class="form-group">
                                            <select class="form-control category_list" name="category_id">
                                                <option value="">Select Category</option>
                                            </select>
                                        </div>
                                        <div class="form-group">
                  							<textarea type="text" class="form-control" id="content" name="content" placeholder="Content"></textarea>
                						</div>
                                        <div class="form-group">
                                            <label for="image">Select Blog Preview Image<small>(format: (jpg, jpeg, png) max size: 2MB)</small>:</label>
                                            <input type="file" class="form-control" id="image" name="blog_s_image">
                                            <img src="" class="img-fluid">
                                        </div>
                                        <div class="form-group">
                                            <label for="image">Select Blog Content Image<small>(format: (jpg, jpeg, png) max size: 3MB)</small>:</label>
                                            <input type="file" class="form-control" id="image" name="blog_b_image">
                                            <img src="" class="img-fluid">
                                        </div>
                                    </div>
                                </div>
                                <input type="hidden" name="edit_blog" value="1">
                                <input type="hidden" name="id">
                                <div class="modal-footer px-4">
                                    <button type="button" class="btn btn-secondary btn-pill cancel-btn"
                                        data-bs-dismiss="modal">Cancel</button>
                                    <button type="button" class="btn btn-primary btn-pill submitedit-blog">Save Blog</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
                <!-- Add Blog Category Modal  -->
                <div class="modal fade modal-add-contact" id="addBlogCat" tabindex="-1" role="dialog"
                    aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                    <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
                        <div class="modal-content">
                            <form id="add-blogcat-form" enctype="multipart/form-data">
                                <div class="modal-header px-4">
                                    <h5 class="modal-title" id="exampleModalCenterTitle">Add New Category</h5>
                                </div>
                                <div class="modal-body px-4">
                                    <div class="row mb-2">
                                        <div class="form-group">
                                            <input type="text" class="form-control" id="name" name="name" placeholder="Category Name">
                                        </div>
                                    </div>
                                </div>
                                <input type="hidden" name="add_blogcat" value="1">
                                <div class="modal-footer px-4">
                                    <button type="button" class="btn btn-secondary btn-pill cancel-btn"
                                        data-bs-dismiss="modal">Cancel</button>
                                    <button type="button" class="btn btn-primary btn-pill add-blogcat">Save New Blog Category</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
                <!-- Edit Blog Category Modal  -->
                <div class="modal fade modal-add-contact" id="editBlogcat" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                    <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
                        <div class="modal-content">
                            <form id="edit-blogcat-form" enctype="multipart/form-data">
                                <div class="modal-header px-4">
                                    <h5 class="modal-title" id="exampleModalCenterTitle">Edit BLog Category</h5>
                                </div>
                                <div class="modal-body px-4">
                                    <div class="row mb-2">
                                        <div class="form-group">
                                            <input type="text" class="form-control" id="name" name="name" placeholder="Category Name">
                                        </div>
                                    </div>
                                </div>
                                <input type="hidden" name="edit_blogcat" value="1">
                                <input type="hidden" name="id">
                                <div class="modal-footer px-4">
                                    <button type="button" class="btn btn-secondary btn-pill cancel-btn"
                                        data-bs-dismiss="modal">Cancel</button>
                                    <button type="button" class="btn btn-primary btn-pill submitedit-blogcat">Save Blog Category</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>

            </div> <!-- End Content -->
        </div> <!-- End Content Wrapper -->

    </div> <!-- End Page Wrapper -->
</div> <!-- End Wrapper -->
<!-- Common Javascript -->
<script src="assets/plugins/jquery/jquery-3.5.1.min.js"></script>
<script src="assets/js/bootstrap.bundle.min.js"></script>
<script src="assets/plugins/simplebar/simplebar.min.js"></script>
<script src="assets/plugins/jquery-zoom/jquery.zoom.min.js"></script>
<script src="assets/plugins/slick/slick.min.js"></script>

<!-- Data Tables -->
<script src='assets/plugins/data-tables/jquery.datatables.min.js'></script>
<script src='assets/plugins/data-tables/datatables.bootstrap5.min.js'></script>
<script src='assets/plugins/data-tables/datatables.responsive.min.js'></script>

<!-- Option Switcher -->
<!-- <script src="assets/plugins/options-sidebar/optionswitcher.js"></script> -->

<!-- Bank Ass Custom -->
<script src="assets/js/ncmea.js"></script>
<script src="assets/js/blogs.js"></script>
</body>


</html>