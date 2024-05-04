<?php
    // require_once "libs/user_process.php";
    require "include/head.php";
    require "include/nav.php";

?>

    <!-- Start Shop 
    ============================================= -->
    <div class="validtheme-shop-area default-padding">
        <div class="container">
            <div class="row p-4">
                <div class="col-md-4 offset-md-4">
                    <h4 class="text-left">Login with your registered email</h4>
                    <form action="" method="post" class="loginForm">
                        <div class="form-group">
                            <li class="alert alert-danger list-unstyled modalError text-center" style="display:none;"></li>
                        </div>
                        <div class="form-group mt-4">
                            <input type="email" name="email" placeholder="Email" class="form-control">
                        </div>
                        <div class="form-group mt-4">
                            <button type="submit" name="userLogin" class="form-control btn btn-primary">Login</button>
                        </div>
                        <p class="text-left mt-4">Not registered <a href="signup">Signup</a></p>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <!-- End Shop -->

<?php require "include/footer.php";?>

<script>
    $('.loginForm').submit(function (e) {
        e.preventDefault();
        const formData = new FormData(this);

        $.ajax({
            url: 'libs/fetchAjax.php?pg=207',
            method: 'POST',
            dataType: 'json',
            data: formData,
            contentType: false,
            processData: false,
            // cache: false,
            success: (param) => { 
                if (param.success) {
                    
                    location.href = "shop";
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