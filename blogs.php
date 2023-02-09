<?php

    include "session.php";
    include "header.php";

    require_once './config/db_function.php';

    $db = new DB_Functions();

    $blogs = $db->getBlogs();

?>
<!DOCTYPE html>
<html lang="en">
    <body>
        <main>
            <?php include "dashboard_header.php"?>  
            <section>
            <div class="gap remove-bottom black-layer2 opc85">
                <div class="fixed-bg" style="background-image: url(assets/img/resources/slider1.jpg);"></div>
                <div class="container">
                    <div class="page-title-wrap">
                        <h1><img src="assets/img/resources/ayat-txt.png" alt="page-title-ayat.png"></h1>
                        <h2>Blog</h2>
                        <ul class="breadcrumbs">
                            <li><a href="index.php" title="">Home</a></li>
                            <li>Blog</li>
                        </ul>
                    </div><!-- Page Title Wrap -->
                </div>
            </div>
        </section>
        <section>
            <div class="gap">
                <div class="container">
                    <div class="blog-wrap remove-ext7">
                        <div class="row mrg40">
                        <?php if ($blogs != null) {
                            foreach ($blogs as $blog) {?>
                                <div class="col-md-4 col-sm-6 col-lg-4 fadeIn" data-wow-duration=".8s" data-wow-delay=".2s">
                                    <div class="blog-box">
                                        <div class="blog-thmb">
                                            <a href="blog-detail.html" title=""><img src="admin/assets/img/blogs/<?php echo $blog['Blog_Image_S']?>" alt="post-img1.jpg"></a>
                                        </div>
                                        <div class="blog-info">
                                            <ul class="pst-mta2">
                                                <li><a href="#" title=""><?php echo $blog['Blog_Cat_Name']?></a></li>
                                            </ul>
                                            <h4><a href="blog-detail.php?id=<?php echo $blog['Blog_ID']?>" title=""><?php echo $blog['Blog_Title']?></a></h4>
                                            <p><?php echo substr($blog['Blog_Content'], 0, 200) . "..."?></p>
                                            <a href="blog-detail.php?id=<?php echo $blog['Blog_ID']?>" title="">Read More</a>
                                        </div>
                                    </div>
                                </div>
                            <?php }
                        } else { ?> 
                            <div class="col-md-6 col-sm-6 col-lg-6">
                                <div class="evnt-box">
                                    <div class="evnt-info">
                                        <h4><a href="#" title="">No Blogs Available</a></h4>
                                    </div>
                                </div>
                            </div>
                        <?php } ?>
                        </div>
                    </div><!-- Blog Wrap -->
                    <!-- <div class="pagination-wrap text-center">
                        <ul class="pagination">
                            <li><a href="#" title="">1</a></li>
                            <li class="active"><a href="#" title="">2</a></li>
                            <li><a href="#" title="">3</a></li>
                            <li>................</li>
                            <li><a href="#" title="">10</a></li>
                        </ul>
                    </div>Pagination Wrap -->
                </div>
            </div>
        </section>         
            <?php include "footer.php"?> 
        </main><!-- Main Wrapper -->

        <script src="assets/js/jquery.min.js"></script>
        <script src="assets/js/bootstrap.min.js"></script>
        <script src="assets/js/downCount.js"></script>
        <script src="assets/js/fancybox.min.js"></script>
        <script src="assets/js/isotope.pkgd.min.js"></script>
        <script src="assets/js/perfectscrollbar.min.js"></script>
        <script src="assets/js/wow.min.js"></script>
        <script src="assets/js/owl.carousel.min.js"></script>
        <script src="assets/js/jquery.circliful.min.js"></script>
        <script src="assets/js/custom-scripts.js"></script>
        <script src="assets/js/ncmea.js"></script>
    </body>
</html>