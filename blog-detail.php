<?php

    include "session.php";
    include "header.php";

    require_once './config/db_function.php';

    $db = new DB_Functions();

    $blog = $db->getBlog($_GET['id']);
    // $comments = $db->getBlogComments($_GET['id']);
    $categories = $db->getBlogCategories();
    $recent_post = $db->getRecentBlogs();
    $datetime = new DateTime($blog[0]['Time']);



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
                                <li><a href="index" title="">Home</a></li>
                                <li><a href="blogs" title="">Blog</a></li>
                                <li>Blog Details</li>
                            </ul>
                        </div><!-- Page Title Wrap -->
                    </div>
                </div>
            </section> 
            <section>
            <div class="gap">
                <div class="container">
                    <div class="blog-detail-wrp">
                        <div class="row">
                            <div class="col-md-9 col-sm-12 col-lg-9">
                                <div class="blog-detail">
                                    <div class="blog-detail-inf brd-rd5">
                                        <img src="admin/assets/img/blogs/<?php echo $blog[0]['Blog_Image_B']?>" alt="blog-detail-img.jpg">
                                        <div class="blog-detail-inf-inr">
                                            <h4><?php echo $blog[0]['Blog_Title']?></h4>
                                            <ul class="pst-mta">
                                                <li><i class="fa fa-calendar-o thm-clr"></i><?php echo $blog[0]['Date']?></li>
                                                <li><i class="fa fa-user-o thm-clr"></i><?php echo $blog[0]['Author']?></li>
                                                <li><i class="fa fa-clock-o thm-clr"></i><?php echo $datetime->format('l') . ', '. $datetime->format('h:i A')?></li>
                                            </ul>
                                        </div>
                                    </div>
                                    <div class="blog-detail-desc">
                                        <p><?php echo $blog[0]['Blog_Content']?></p>
                                        <p><?php echo $blog[0]['Paragraph_2']?></p>
                                        <?php if ($blog[0]["Special_Quote"] != null){?>
                                            <blockquote class="brd-rd5"><p><i class="fa fa-quote-left thm-clr"></i> <?php echo $blog[0]['Special_Quote']?></p></blockquote>
                                        <?php }?>
                                        <p><?php echo $blog[0]['Paragraph_3']?></p>
                                        <div class="pst-shr-tgs">
                                            <div class="team-scl float-left">
                                                <span>Share This:</span>
                                                <a href="https://www.twitter.com/intent/tweet?text=<?php echo $blog[0]['Blog_Title']?>&url=link" title="Twitter" target="_blank"><i class="fa fa-twitter"></i></a>
                                                <a href="https://www.facebook.com/share.php?u=link" title="Facebook" target="_blank"><i class="fa fa-facebook"></i></a>
                                                <a href="https://www.youtube.com/<?php echo $blog[0]['Blog_Title']?>" title="Youtube" target="_blank"><i class="fa fa-youtube"></i></a>
                                                <a href="https://www.instagram.com/<?php echo $blog[0]['Blog_Title']?>" title="Instagram" target="_blank"><i class="fa fa-instagram"></i></a>
                                            </div>
                                        </div>
                                        <!-- <div class="cmts-wrp">
                                            <h3>02 Comments</h3>
                                            <ul class="cmt-thrd">
                                                <li>
                                                    <div class="cmt-bx">
                                                        <img class="brd-rd50" src="assets/images/resources/cmt-img1.jpg" alt="cmt-img1.jpg">
                                                        <div class="cmt-inf">
                                                            <h6>Mike Stepliton</h6>
                                                            <span>Aug 14, 2018</span>
                                                            <p itemprop="description">Similique sunt in culpa qui officia.vero eos et accusamus et iusto odio dignissimos ducimuss qui blanditiis praesentium voluptatum deleniti atque corrupti quos dolores</p>
                                                            <a class="comment-reply-link thm-clr" href="#" title="">Reply</a>
                                                        </div>
                                                    </div>
                                                    <ul class="children">
                                                        <li>
                                                            <div class="cmt-bx">
                                                                <img class="brd-rd50" src="assets/images/resources/cmt-img2.jpg" alt="cmt-img2.jpg">
                                                                <div class="cmt-inf">
                                                                    <h6>Maria Stepliton</h6>
                                                                    <span>Aug 14, 2018</span>
                                                                    <p>Similique sunt in culpa qui officia.vero eos et accusamus et iusto odio dignissismos ducimuss qui blanditiis praesentium voluptatum.</p>
                                                                    <a class="comment-reply-link thm-clr" href="#" title="">Reply</a>
                                                                </div>
                                                            </div>
                                                        </li>
                                                    </ul>
                                                </li>
                                            </ul> Comment Thread
                                        </div>Comments Wrap -->
                                        <div class="cnt-frm cmt-frm">
                                            <h3>Leave Your Comments</h3>
                                            <form>
                                                <div class="row mrg20">
                                                    <div class="col-md-12 col-sm-6 col-lg-12">
                                                        <input type="text" placeholder="Name">
                                                    </div>
                                                    <div class="col-md-12 col-sm-6 col-lg-12">
                                                        <input type="email" placeholder="Email">
                                                    </div>
                                                    <div class="col-md-12 col-sm-12 col-lg-12">
                                                        <textarea placeholder="Message"></textarea>
                                                    </div>
                                                    <div class="col-md-12 col-sm-12 col-lg-12">
                                                        <button type="submit" class="thm-btn brd-rd40">POST COMMENT</button>
                                                    </div>
                                                </div>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-3 col-sm-6 col-lg-3">
                                <div class="sidebar-wrp">
                                    <!-- <div class="wdgt-box">
                                        <h4>Search</h4>
                                        <form class="srch-frm">
                                            <input type="text" placeholder="Search">
                                            <button type="submit" class="thm-clr"><i class="fa fa-search"></i></button>
                                        </form>
                                    </div> -->
                                    <div class="wdgt-box">
                                        <h4>Categories</h4>
                                        <ul class="cat-lst">
                                            <?php foreach ($categories as $cat) {?>
                                                <li><a href="blogs?cat=<?php echo $cat['Blog_Cat_ID']?>" title=""><?php echo $cat['Blog_Cat_Name']?></a><?php echo "(" .$cat['Number'] .")"?></li>
                                            <?php }?>
                                        </ul>
                                    </div>
                                    <div class="wdgt-box">
                                        <h4>Recent Posts</h4>
                                        <div class="rcnt-wrp">
                                            <?php foreach ($recent_post as $recent) {?>
                                                <div class="rcnt-bx">
                                                    <a href="blog-detail.html" title=""><img src="admin/assets/img/blogs/<?php echo $recent['Blog_Image_S']?>" alt="rcnt-img1.jpg"></a>
                                                    <div class="rcnt-inf">
                                                        <h6><a href="blog-detail?id=<?php echo $recent['Blog_ID']?>" title=""><?php echo $recent['Blog_Title']?></a></h6>
                                                        <span class="thm-clr"><i class="fa fa-calendar-o"></i><?php echo $recent['Date']?></span>
                                                    </div>
                                                </div>
                                            <?php } ?>
                                        </div>
                                    </div>
                                </div><!-- Sidebar Wrap -->
                            </div>
                        </div>
                    </div><!-- Blog Detail Wrap -->
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