<?php

    include "session.php";
    include "header.php";

    require_once './config/db_function.php';

    $db = new DB_Functions();

    if(isset($_POST["submit"])){
        $name = $_POST["name"];
        $email = $_POST["email"];
        $address = $_POST["address"];
        $phone = $_POST["phone"];

        $response = $db->registerUser($name, $email, $address, $phone);
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
                <div class="gap">
                <div class="container">
                    <h3 style="text-align: left;">Create an Account</h3>
                        <form method="POST">
                            <input type="text" name="name" placeholder="Full Name" required>
                            <input type="email" name="email" placeholder="Email Address" required>
                            <input type="text" name="phone" placeholder="Phone Number" required>
                            <textarea name="address" placeholder="Address" required></textarea>
                            <button type="submit" name="submit">REGISTER</button>
                            <div class="terms">
                                <input type="checkbox" name="terms" id="terms" required>
                                <label for="terms">
                                    By checking this box, I agree to receive notifications and reminders. Message data rates may apply. 
                                    View <a href="policy.php" target="_blank">Privacy Policy</a> and <a href="terms.php" target="_blank">Terms and Conditions</a>.
                                </label>
                            </div>
                    </form>
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