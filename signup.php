<?php

    require "include/head.php";
    require "include/nav.php";

?>

    <!-- Start Shop 
    ============================================= -->
    <div class="validtheme-shop-area default-padding">
        <div class="container">
            <div class="row">
                <div class="col-md-4 offset-md-4">
                    <h4 class="text-left">Login with your registered email</h4>
                    <form action="" method="post" id="signupForm">
                        <div class="form-group">
                            <li class="alert alert-success list-unstyled modalSuccess text-center" style="display:none;"></li>
                            <li class="alert alert-danger list-unstyled modalError text-center" style="display:none;"></li>
                        </div>
                        <div class="form-group mt-4">
                            <input type="text" name="full_name" placeholder="Full Name" class="form-control">
                        </div>
                        <div class="form-group mt-4">
                            <input type="email" name="email" placeholder="Email" class="form-control">
                        </div>
                        <div class="form-group mt-4">
                            <input type="number" name="phone_number" placeholder="Phone Number" class="form-control">
                        </div>
                        <div class="form-group mt-4">
                            <input type="text" name="address" placeholder="Delivery Address" class="form-control">
                        </div>
                        <div class="form-group mt-4">
                            <button type="submit" class="form-control btn btn-primary">Register</button>
                        </div>
                        <p class="text-left mt-4">Registered member? <a href="login">Login</a></p>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <!-- End Shop -->

<?php require "include/footer.php";?>

<script>
    $('#signupForm').submit(function (e) {
        e.preventDefault();
        const formData = new FormData(this);

        $.ajax({
            url: 'libs/fetchAjax.php?pg=206',
            method: 'POST',
            dataType: 'json',
            data: formData,
            contentType: false,
            processData: false,
            // cache: false,
            success: (param) => { 
                if (param.success) {
                    
                    $('.modalSuccess').fadeIn()
                    $('.modalSuccess').text(param.success);
                    setInterval(() => {
                        $('.modalSuccess').fadeOut();
                        location.href = 'login';
                    }, 6000);
                }else if(param.error){
                    $('.modalError').fadeIn()
                    $('.modalError').text(param.error);
                    setInterval(() => {
                        $('.modalError').fadeOut();
                    }, 6000);
                }
            },
        });
        return false;
    });
</script>