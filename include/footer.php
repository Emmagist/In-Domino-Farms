 <style>
    #link-ul > li {
        display: inline-block !important;
        padding: 0 15px;
    }
 </style>
 <!-- Start Footer 
    ============================================= -->
    <footer class="bg-dark text-light" style="">
    <!-- background-image: url(assets/img/shape/brush-down.png); -->
        <div class="container">
            <div class="f-items default-padding">
                <div class="row">
                    
                    <!-- Single Itme -->
                    <div class="col-lg-4 col-md-6 item">
                        <div class="footer-item about">
                            <!-- <img class="logo" src="assets/img/logo.png" alt="Logo"> -->
                            <form action="#">
                                <input type="email" placeholder="Your Email" class="form-control" name="email">
                                <button type="submit"> Go</button>  
                            </form>
                        </div>
                    </div>
                    <!-- End Single Itme -->

                    <!-- Single Itme -->
                    <div class="col-lg-3 col-md-6 item">
                        <div class="footer-item link">
                            <h4 class="widget-title">Find Us On</h4>
                            <div class="widget social">
                            <ul class="link" id="link-ul">
                                <li><a href="#"><i class="fab fa-facebook-f"></i></a></li>
                                <li><a href="#"><i class="fab fa-twitter"></i></a></li>
                                <li><a href="#"><i class="fab fa-linkedin-in"></i></a></li>
                                <li><a href="https://www.instagram.com/in.domino"><i class="fab fa-instagram"></i></a></li>
                            </ul>
                        </div>
                        </div>
                    </div>
                    <!-- End Single Itme -->

                    <!-- Single Itme -->
                    <div class="col-lg-4 col-md-6 item">
                        <div class="footer-item contact">
                            <h4 class="widget-title">Customer Care</h4>
                            <ul>
                                <li>
                                    <div class="icon">
                                        <i class="fas fa-home"></i>
                                    </div>
                                    <div class="content">
                                        <strong>Address:</strong>
                                        Idanre Village, Kilometer 46, Sagamu-Benin Express Way, Ijebu Imusin, Ogun State.
                                    </div>
                                </li>
                                <li>
                                    <div class="icon">
                                        <i class="fas fa-envelope"></i>
                                    </div>
                                    <div class="content">
                                        <strong>Email:</strong>
                                        <a href="info@indominofarms.com">info@indominofarms.com</a>
                                    </div>
                                </li>
                            </ul>
                        </div>
                    </div>
                    <!-- Single Itme -->
                    
                </div>
            </div>
            <!-- Start Footer Bottom -->
            <div class="footer-bottom">
                <div class="row">
                    <div class="col-lg-6">
                        <p>&copy; Copyright 2024. All Rights Reserved In Domino Farms</p>
                    </div>
                    <div class="col-lg-6 text-end">
                        <ul>
                            <li>
                                <a href="about-us.html">Terms</a>
                            </li>
                            <li>
                                <a href="about-us.html">Privacy</a>
                            </li>
                            <li>
                                <a href="contact-us.html">Support</a>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
            <!-- End Footer Bottom -->
        </div>
        <!-- <div class="shape-right-bottom">
            <img src="assets/img/shape/10.png" alt="Image Not Found">
        </div>
        <div class="shape-left-bottom">
            <img src="assets/img/shape/11.png" alt="Image Not Found">
        </div> -->
    </footer>
    <!-- End Footer -->

    <?php require "modal/modal.php"?>

    <form action="" method="post" id="addToCart">
        <input type="hidden" name="product_id" id="product_id">
        <input type="hidden" name="quantity" id="product_quantity">
        <input type="hidden" name="user" id="user_id">
        <button type="submit" id="addToCartButton" style="display:none">submit</button>
    </form>
    
    <!-- jQuery Frameworks
    ============================================= -->
    <script src="assets/js/jquery-3.6.0.min.js"></script>
    <script src="assets/js/bootstrap.bundle.min.js"></script>
    <script src="assets/js/jquery.appear.js"></script>
    <script src="assets/js/jquery.easing.min.js"></script>
    <script src="assets/js/jquery.magnific-popup.min.js"></script>
    <script src="assets/js/modernizr.custom.13711.js"></script>
    <script src="assets/js/swiper-bundle.min.js"></script>
    <script src="assets/js/wow.min.js"></script>
    <script src="assets/js/progress-bar.min.js"></script>
    <script src="assets/js/circle-progress.js"></script>
    <script src="assets/js/isotope.pkgd.min.js"></script>
    <script src="assets/js/imagesloaded.pkgd.min.js"></script>
    <script src="assets/js/jquery.nice-select.min.js"></script>
    <script src="assets/js/count-to.js"></script>
    <script src="assets/js/jquery.scrolla.min.js"></script>
    <script src="assets/js/YTPlayer.min.js"></script>
    <script src="assets/js/TweenMax.min.js"></script>
    <script src="assets/js/loopcounter.js"></script>
    <script src="assets/js/validnavs.js"></script>
    <script src="assets/js/main.js"></script>
    <script src="https://js.paystack.co/v1/inline.js"></script>

    <script>
            // const formData = new FormData(this);
        function cartModal(id, quantity, user) {
            $('#product_id').val(id);
            $('#product_quantity').val(quantity);
            $('#user_id').val(user);

            const user_id = $('#user_id').val();

            if (user_id != '') { //alert(user_id)
                $('#addToCartButton').click();
            }
        }

        $('#addToCart').submit(function (event) {
            event.preventDefault();
            const formData = new FormData(this);
            $.ajax({
                url: 'libs/fetchAjax.php?pg=208',
                method: 'POST',
                dataType: 'json',
                data: formData,
                contentType: false,
                processData: false,
                // cache: false,
                success: (param) => { 
                    if (param) {
                        
                    }
                },
            });
            return false;
        })

        $( document ).ready(function() {
            $.ajax({
                url: 'libs/ajaxGet.php?get=212',
                method: 'GET',
                dataType: 'json',
                data: 212,
                contentType: false,
                processData: false,
                // cache: false,
                success: (param) => { 
                    if (param) {console.log(param);
                        $('.shop-badge').html(param);
                    }
                },
            });
            
            return false;
        });

        function payModal(param){
            $('#exampleModalPay').modal('show');
            $('#amount').val(param);
        }

        // paystack
        const token_id = "<?=$_SESSION['token']?>";
        const invoice = $('#invoice').val();
        const paymentForm = document.getElementById('paymentForm');
        paymentForm.addEventListener("submit", payWithPaystack, false);

        function payWithPaystack(e) {
            e.preventDefault();

            let handler = PaystackPop.setup({
                key: '<?=PAY_KEY?>', // Replace with your public key
                email: document.getElementById("email-address").value,
                amount: document.getElementById("amount").value * 100,
                ref: 'IDF'+Math.floor((Math.random() * 1000000000) + 1),
                onClose: function(){
                alert('Window closed.');
                },
                callback: function(response){
                let message = 'Payment complete! Reference: ' + response.reference;
                //   alert(message);
                  location.href = "reference?ref="+response.reference;
                }
            });

            handler.openIframe();
        }


       
    </script>
    

</body>
</html>