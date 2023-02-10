<?php

    include "session.php";
    include "header.php";

    require_once './config/db_function.php';

    $db = new DB_Functions();

    if(isset($_POST["submit"])){
        $name = $_POST["name"];
        $email = $_POST["email"];
        $password = $_POST["password"];
        $address = $_POST["address"];
        $phone = $_POST["phone"];

        $response = $db->registerUser($name, $email, $password, $address, $phone);
        if($response["status"] == 200){?>
            <script>
                window.alert('<?php echo $response['message']?>');
                window.location='index.php';
            </script>
        <?php }else{ ?>
            <script>
                window.alert('<?php echo $response['message']?>');
                window.location='register.php';
            </script>
        <?php } 
    }

?>

<!DOCTYPE html>
<html lang="en">
    <body>
        <main>
            <?php include "dashboard_header.php"?>  
            <section>
                <br>
                <div class="gap">
                    <div class="container">
                        <div class="cnt-frm cmt-frm">
                            <h3>Create an Account</h3>
                            <form method="POST">
                                <div class="row mrg20">
                                    <div class="col-md-12 col-sm-12 col-lg-12">
                                        <input type="text" placeholder="Name" name="name" required>
                                    </div>
                                    <div class="col-md-12 col-sm-12 col-lg-12">
                                        <input type="email" placeholder="Email" name="email" required>
                                    </div>
                                    <div class="col-md-12 col-sm-12 col-lg-12">
                                        <input type="text" placeholder="Phone Number" name="phone" required>
                                    </div>
                                    <div class="col-md-12 col-sm-12 col-lg-12">
                                        <input type="password" placeholder="Password" name="password" required>
                                    </div>
                                    <div class="col-md-12 col-sm-12 col-lg-12">
                                        <textarea placeholder="Address" name="address" required></textarea>
                                    </div>
                                    <div class="col-md-12 col-sm-12 col-lg-12">
                                        <button type="submit" name="submit" class="thm-btn brd-rd40">REGISTER</button>
                                    </div>
                                </div>
                            </form>
                        </div>
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