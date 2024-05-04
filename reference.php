<?php
    require_once "libs/users.php";
    if (isset($_SESSION['token'])) {
        $token = $_SESSION['token'];
    }
    require "include/head.php";
    require "include/nav.php";

?>
    <!-- End Header -->

    <!-- Start
    ============================================= -->
    <div class="error-page-area default-padding text-center">
        <div class="container">
            <div class="error-box">
                <div class="row">
                    <div class="col-lg-8 offset-lg-2">
                        <?php if(Users::orderComplete($_SESSION['token'], $_GET['ref'])):?>
                            <h2>Payment Successful</h2>
                            <p>
                            Payment complete! Reference: <?=$_GET['ref']?> <br>
                            We are processing your order.
                            </p>
                        <?php else: echo "Something went wrong! <br>"; endif; ?>
                        <a class="btn mt-20 btn-md btn-theme secondary" href="/">Back to home</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- End 404 -->

    <!-- Start Footer 
    ============================================= -->
<?php require "include/footer.php";?>