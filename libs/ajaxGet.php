<?php

    require_once "ajaxRequest.php";

    if (isset($_GET['get'])) {
        $get = $_GET['get'];
    }

    // Fetch Category
    if ($get == 200) {

        $outPut = "";
        
        if (Ajax::getCategory()) {
            $count = 1;
            foreach (Ajax::getCategory() as $key) {
                $outPut .="
                    <tr>
                        <td>". $count++. "</td>
                        <td>". ucwords($key['category']) ."</td>
                        <td>". DataBase::dateFormat($key['created_at']) ."</td>
                        <td>
                        <button class='btn btn-sm'><i class='fa fa-pencil text-warning' onclick='editButton(". $key['id'] .")' style='font-size:15px'></i></button>
                        |<i class='fa fa-trash text-danger btn btn-sm' style='font-size:15px' onclick='deleteButton(". $key['id'] .")' id='deleteButton'></i>
                        </td>
                    </tr>
                ";
            }
        }else {
            $outPut .="
                <tr>
                    <td class='text-danger'>No Data Found!</td>
                </tr>
            ";
        }
        

        echo json_encode($outPut);
    }


    // Fetch Category Modal
    if ($get == 201) {
        $outPut = "";
        
        if (Ajax::getSingleCategory($_GET['editCat'])) {
            foreach (Ajax::getSingleCategory($_GET['editCat']) as $key) {
                $outPut .='
                <div class="form-group">
                <label for="category">Category</label>
                <input type="text" id="category" title="Edit '.$key['category'].'" class="form-control" name="category" value="'.$key['category'].'">
                <input type="hidden" class="form-control" name="id" value="'.$key['id'].'">
                </div>
                <label for="sub_category">SubCategory</label>
                <input type="text" id="sub_category" title="Edit '.$key['sub_category'].'" class="form-control" name="sub_category" value="'.$key['sub_category'].'"></div>
                <div class="form-group">
                    <label for="category">Description</label>
                    <input type="text" id="description" title="Edit Description" class="form-control description" name="description" value="'.$key['description'].'">
                </div>
                ';
            }
        }
        

        echo json_encode($outPut);
    }

    // Fetch Users
    if ($get == 202) {

        $outPut = "";
        
        if (Ajax::getAllUsers()) {
            $count = 1;
            foreach (Ajax::getAllUsers() as $key) {
                $outPut .="
                    <tr>
                        <td>". $count++. "</td>
                        <td>". ucwords($key['full_name']) ."</td>
                        <td>". $key['email'] ."</td>
                        <td>". $key['phone_number'] ."</td>
                        <td>". ucwords($key['gender']) ."</td>
                        <td>".$key['address']."</td>
                        <td>". DataBase::dateFormat($key['created_at']) ."</td>
                        <td>
                        <button class='btn btn-sm'><i class='fa fa-eye text-warning' onclick='viewUserButton(`". $key['user_guid'] ."`)' style='font-size:15px'></i></button>
                        </td>
                    </tr>
                ";
            }
        }else {
            $outPut .="
                <tr>
                    <td class='text-danger'>No Data Found!</td>
                </tr>
            ";
        }
        

        echo json_encode($outPut);
    }

    // Fetch User Modal
    if ($get == 203) {
        $id = $_GET['viewUser'];

        $outPut = "";
        
        if (Ajax::getSingleUser($id)) {
            foreach (Ajax::getSingleUser($id) as $key) {
                $outPut .='
                <div class="form-group">
                    <input type="text" id="category" title="'.$key['full_name'].'" class="form-control" name="" value="'.ucwords($key['full_name']).'" readOnly>
                </div>
                <div class="form-group">
                    <input type="text" id="sub_category" title="'.$key['email'].'" class="form-control" name="" value="'.$key['email'].'" readOnly>
                </div>
                <div class="form-group">
                    <input type="text" id="sub_category" title="'.$key['phone_number'].'" class="form-control" name="" value="'.$key['phone_number'].'" readOnly>
                </div>
                <div class="form-group">
                    <input type="text" id="sub_category" title="'.$key['gender'].'" class="form-control" name="" value="'.ucwords($key['gender']).'" readOnly>
                </div>
                <div class="form-group">
                    <input type="text" id="sub_category" title="'.$key['address'].'" class="form-control" name="" value="'.$key['address'].'" readOnly>
                </div>
                ';
            }
        }
        

        echo json_encode($outPut);
    }

    // Fetch Order
    if ($get == 204) {

        $outPut = "";
        
        if (Ajax::getAllOrders()) {
            $count = 1;
            foreach (Ajax::getAllOrders() as $key) {
                $outPut .="
                    <tr>
                        <td>". $count++. "</td>
                        <td>". ucwords($key['order_number']) ."</td>
                        <td><a  onclick='viewUserButton(`". $key['user_guid'] ."`)' style='color:#212529; text-decoration:underline; cursor:pointer'>". ucwords($key['full_name']) ."</a></td>
                        <td>". ucwords($key['product']) ."</td>
                        <td><img src='../". $key['product_image'] ."' alt='". $key['product'] ."' style='width:50px; height:50px; border-radius:5px' /></td>
                        <td>&#8358;". $key['price'] ."</td>
                        <td>". $key['quantity'] ."</td>
                        <td>&#8358;". $key['total_price'] ."</td>
                        <td>". DataBase::dateFormat($key['ordered_date']) ."</td>
                        <td>
                        <!--<button class='btn btn-sm'><i class='fa fa-eye text-warning'  style='font-size:15px'></i></button>
                        </td>-->
                    </tr>
                ";
            }
        }else {
            $outPut .="
                <tr>
                    <td class='text-danger'>No Data Found!</td>
                </tr>
            ";
        }
        

        echo json_encode($outPut);
    }

    // Fetch Category for product
    if ($get == 205) {

        $outPut = "";
        
        if (Ajax::getCategory()) {
            $outPut .='<option value="">Select Category</option>';
            foreach (Ajax::getCategory() as $key) {
                $outPut .='
                    <option value="'. $key['id'] .'">'. ucwords($key['category']) .'</option>
                ';
            }
        }else {
            $outPut .='
                <option value="">Select Category</option>
            ';
        }
        

        echo json_encode($outPut);
    }

    // Fetch Product
    if ($get == 206) {

        $outPut = "";
        
        if (Ajax::getAllProduc()) {
            $count = 1;
            foreach (Ajax::getAllProduc() as $key) {
                $outPut .="
                    <tr>
                        <td>". $count++. "</td>
                        <td>". ucwords($key['product']) ."</td>
                        <td>". $key['price'] ."</td>
                        <td><img src='../". $key['product_image'] ."' alt='". $key['product'] ."' style='width:50px; height:50px; border-radius:5px' /></td>
                        <td>". DataBase::dateFormat($key['created_at']) ."</td>
                        <td>
                        <button class='btn btn-sm'><i class='fa fa-eye text-success' onclick='viewProductButton(". $key['id'] .")' style='font-size:15px'></i></button>|<button class='btn btn-sm'><i class='fa fa-pencil text-warning' onclick='editProductButton(". $key['id'] .")' style='font-size:15px'></i></button>
                        |<i class='fa fa-trash text-danger btn btn-sm' style='font-size:15px' onclick='deleteProductButton(". $key['id'] .")' id='deleteButton'></i>
                        </td>
                    </tr>
                ";
            }
        }else {
            $outPut .="
                <tr>
                    <td class='text-danger'>No Data Found!</td>
                </tr>
            ";
        }
        

        echo json_encode($outPut);
    }

    // View Product Modal
    if ($get == 207) {
        $outPut = "";
        
        if (Ajax::getSingleProduct($_GET['viewprod'])) {
            foreach (Ajax::getSingleProduct($_GET['viewprod']) as $key) {
                $outPut .='
                <div class="form-group">
                    <label for="price">product</label>
                    <input type="text" id="product" title="Edit '.$key['product'].'" class="form-control" name="" value="'.$key['product'].'">
                </div>
                <div class="form-group">
                    <label for="price">Price</label>
                    <input type="text" id="price" title="Edit '.$key['price'].'" class="form-control" name="" value="'.$key['price'].'">
                </div>
                <div class="form-group">
                    <label for="weight">Weight</label>
                    <input type="text" id="weight" title="Edit '.$key['weight'].'" class="form-control" name="" value="'.$key['weight'].'">
                </div>
                <div class="form-group">
                    <label for="short_description">Short Description</label>
                    <input type="text" id="short_description" title="Edit '.$key['short_description'].'" class="form-control" name="" value="'.$key['short_description'].'">
                </div>
                <div class="form-group">
                    <img src="../'.$key['product_image'].'" alt="'.$key['product'].'" style="width:400px;height:400px;border-radius:10px;" />
                </div>
                <div class="form-group">
                    <label for="description">Description</label>
                    <textarea class="form-control" id="description" value="'.$key['description'].'" title="Edit Description">'.$key['description'].'</textarea>
                </div>
                ';
            }
        }
        

        echo json_encode($outPut);
    }

    // Edit Product Modal
    if ($get == 208) {
        $outPut = "";
        
        if (Ajax::getSingleProduct($_GET['editprod'])) {
            foreach (Ajax::getSingleProduct($_GET['editprod']) as $key) {
                $outPut .='
                <div class="form-group">
                    <label for="price">product</label>
                    <input type="text" id="product" title="Edit '.$key['product'].'" class="form-control" name="product" value="'.$key['product'].'">
                    <input type="hidden" class="form-control" name="id" value="'.$key['entity_guid'].'">
                </div>
                <div class="form-group">
                    <label for="price">Price</label>
                    <input type="text" id="price" title="Edit '.$key['price'].'" class="form-control" name="price" value="'.$key['price'].'">
                </div>
                <div class="form-group">
                    <label for="category">Category</label>
                    <select name="category" class="form-control">';
                        foreach(Ajax::getSingleCategory($key['category_id']) as $cat):
                        $outPut .='<option value="'.$cat['id'].'">'.$cat['category'].'</option>';
                        endforeach;
                    $outPut .='</select>
                </div>
                <div class="form-group">
                    <label for="weight">Weight</label>
                    <input type="text" id="weight" title="Edit '.$key['weight'].'" class="form-control" name="weight" value="'.$key['weight'].'">
                </div>
                <div class="form-group">
                    <label for="short_description">Short Description</label>
                    <input type="text" id="short_description" title="Edit '.$key['short_description'].'" class="form-control" name="short_description" value="'.$key['short_description'].'">
                </div>
                <div class="form-group">
                    <img src="../'.$key['product_image'].'" alt="'.$key['product'].'" style="width:400px;height:400px;border-radius:10px;" />
                    <input id="uploadFile"  class="form-control" name="fileUpload"  type="file">
                    <input type="hidden" id="upload_image" value="'.$key['product_image'].'" title="Edit Image" name="current_file">
                </div>
                <div class="form-group">
                    <label for="description">Description</label>
                    <textarea class="form-control" id="description" value="'.$key['description'].'" name="description" title="Edit Description">'.$key['description'].'</textarea>
                </div>
                ';
            }
        }
        

        echo json_encode($outPut);
    }

    //Index product list
    if ($get == 209) {
        $outPut = '';
        if (Ajax::getFrontProductRoundom()) {
            foreach (Ajax::getFrontProductRoundom() as $key) {
                $outPut .= '
                <li class="product">
                <div class="product-contents">
                    <div class="product-image">
                        <a href="product-details?pr='.$key['entity_guid'].'">
                            <img src="'.$key['product_image'].'" alt="Product">
                        </a>
                        <div class="shop-action">
                            <ul>
                                <li class="cart">
                                    <a onClick="cartModal(`' . $key['entity_guid'] . '`, 1, ` ' . $_SESSION['token'] . '`)"><span>Add to cart</span></a>
                                </li>
                                <li class="wishlist">
                                    <a href="#"><span>Add to wishlist</span></a>
                                </li>
                            </ul>
                        </div>
                    </div>
                    <div class="product-caption">
                        <div class="product-tags">
                            <a href="#">Shop</a>
                            <a href="#">Organic</a>
                        </div>
                        <h4 class="product-title">
                            <a href="product-details?pr='.$key['entity_guid'].'">'.$key['product'].'</a>
                        </h4>
                        <div class="review-count">
                        <div class="rating">
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star-half-alt"></i>
                        </div>
                        <!-- <span>8 Review</span> -->
                    </div>
                        <div class="price">
                            <span>&#8358;'.$key['price'].'</span>
                        </div>
                    </div>
                </div>
            </li>';
            }
        }

        echo json_encode($outPut);

    }

    //Shop product list login
    if ($get == 210) {
        // $_SESSION['token'];
        $limit = 32;
        $page = 0;
        if ($_GET['page']) {
            $page = $_GET['page'];
        }else {
            $page = 1;
        }

        $start_from = ($page - 1) * $limit;
        $outPut = '';
        if (Ajax::getAllProductLimit($start_from, $limit) && ! empty($_SESSION['token'])) {
            
                $outPut .= '
                <!-- Start Tab Content -->
                    <div class="tab-content tab-content-info text-center" id="shop-tabContent">

                        <!-- Strt Product Grid Vies -->
                        <div class="tab-pane fade show active" id="grid-tab" role="tabpanel" aria-labelledby="grid-tab-control">
                            <ul class="vt-products columns-4">
                            <!-- Single product -->';
                            foreach (Ajax::getAllProductLimit($start_from, $limit) as $key) {
                                $id = $key['entity_guid'];
                                $token = $_SESSION['token'];
                                $outPut .= '
                                    <li class="product">
                                    <div class="product-contents">
                                        <div class="product-image">
                                            <a href="product-details?pr='.$key['entity_guid'].'">
                                                <img src="'.$key['product_image'].'" alt="Product">
                                            </a>
                                            <div class="shop-action">
                                                <ul>
                                                    <li class="cart">
                                                        <a onClick="cartModal(`' . $id . '`, 1, ` ' . $token . '`)"><span>Add to cart</span></a>
                                                    </li>
                                                    <li class="wishlist">
                                                        <a href="#"><span>Add to wishlist</span></a>
                                                    </li>
                                                </ul>
                                            </div>
                                        </div>
                                        <div class="product-caption">
                                            <div class="product-tags">
                                                <a href="shop">Shop</a>';
                                                foreach (Ajax::getSingleCategory($key['category_id']) as $category) {
                                                    $outPut .= '<a >'.$category['category'].'</a>';
                                                }
                                                $outPut .= '
                                            </div>
                                            <h4 class="product-title">
                                                <a href="product-details?pr='.$key['entity_guid'].'">'.$key['product'].'</a>
                                            </h4>
                                            <div class="review-count">
                                            <div class="rating">
                                                <i class="fas fa-star"></i>
                                                <i class="fas fa-star"></i>
                                                <i class="fas fa-star"></i>
                                                <i class="fas fa-star"></i>
                                                <i class="fas fa-star-half-alt"></i>
                                            </div>
                                            <!-- <span>8 Review</span> -->
                                        </div>
                                            <div class="price">
                                                <span>&#8358;'.$key['price'].'</span>
                                            </div>
                                        </div>
                                    </div>
                                </li>';
                            }
                            $outPut .= '
                                <!-- Single product -->

                            </ul>
                        </div>
                        <!-- End Product Grid Vies -->

                    </div>
                    <!-- End Tab Content -->
                    <!-- Pgination -->
                    <nav class="woocommerce-pagination">
                        <ul class="page-numbers">';
                        $query = count(Ajax::getAllProduc());
                        $total_page = ceil($query / $limit);
                        // $total_page = 32;
                        if ($page > 1) {
                            $previous = $page - 1;
                            $outPut .='
                            <li><span class="previous page-numbers" data-id="'.$previous.'"><i class="fas fa-angle-left"></i></span></li>';
                        }
                        for ($i=1; $i <= $total_page; $i++) { 
                            $current = '';
                            if ($i == $page) {
                                $current = 'current';
                            }
                            $outPut .='
                            <li><span aria-current="page" id="page-numbers" class="page-numbers ' . $current . ' " data-id="'.$i.'" onclick="pagination()">'.$i.'</span></li>';
                        }
                        if ($page < $total_page) {
                            $page++;
                            $outPut .='
                            <li><span class="next page-numbers" data-id="'.$page.'"><i class="fas fa-angle-right"></i></span></li>';
                        }
                        $outPut .='
                        </ul>
                    </nav>';
            
        }else {
                $outPut .= '
                <!-- Start Tab Content -->
                    <div class="tab-content tab-content-info text-center" id="shop-tabContent">

                        <!-- Strt Product Grid Vies -->
                        <div class="tab-pane fade show active" id="grid-tab" role="tabpanel" aria-labelledby="grid-tab-control">
                            <ul class="vt-products columns-4">
                            <!-- Single product -->';
                            foreach (Ajax::getAllProductLimit($start_from, $limit) as $key) {
                                $outPut .= '
                                    <li class="product">
                                        <div class="product-contents">
                                            <div class="product-image">
                                                <a href="product-details?pr='.$key['entity_guid'].'">
                                                    <img src="'.$key['product_image'].'" alt="Product">
                                                </a>
                                                <div class="shop-action">
                                                    <ul>
                                                        <li class="cart">
                                                            <a onClick="checkLogin()"><span>Add to cart</span></a>
                                                        </li>
                                                        <li class="wishlist">
                                                            <a href="#"><span>Add to wishlist</span></a>
                                                        </li>
                                                    </ul>
                                                </div>
                                            </div>
                                            <div class="product-caption">
                                                <div class="product-tags">
                                                    <a href="#">Shop</a>';
                                                    foreach (Ajax::getSingleCategory($key['category_id']) as $category) {
                                                        $outPut .= '<a >'.$category['category'].'</a>';
                                                    }
                                                    $outPut .= '
                                                </div>
                                                <h4 class="product-title">
                                                    <a href="product-details?pr='.$key['entity_guid'].'">'.$key['product'].'</a>
                                                </h4>
                                                <div class="review-count">
                                                <div class="rating">
                                                    <i class="fas fa-star"></i>
                                                    <i class="fas fa-star"></i>
                                                    <i class="fas fa-star"></i>
                                                    <i class="fas fa-star"></i>
                                                    <i class="fas fa-star-half-alt"></i>
                                                </div>
                                                <!-- <span>8 Review</span> -->
                                            </div>
                                                <div class="price">
                                                    <span>&#8358;'.$key['price'].'</span>
                                                </div>
                                            </div>
                                        </div>
                                    </li>
                                ';
                            }
                            $outPut .= '
                                <!-- Single product -->

                            </ul>
                        </div>
                        <!-- End Product Grid Vies -->

                    </div>
                    <!-- End Tab Content -->

                    

                    <!-- Pgination -->
                    <nav class="woocommerce-pagination">
                        <ul class="page-numbers">';
                        $query = count(Ajax::getAllProduc());
                        $total_page = ceil($query / $limit);
                        // $total_page = 32;
                        if ($page > 1) {
                            $previous = $page - 1;
                            $outPut .='
                            <li><span class="previous page-numbers" data-id="'.$previous.'"><i class="fas fa-angle-left"></i></span></li>';
                        }
                        for ($i=1; $i <= $total_page; $i++) { 
                            $current = '';
                            if ($i == $page) {
                                $current = 'current';
                            }
                            $outPut .='
                            <li><span aria-current="page" id="page-numbers" class="page-numbers ' . $current . ' " data-id="'.$i.'" onclick="pagination()">'.$i.'</span></li>';
                        }
                        if ($page < $total_page) {
                            $page++;
                            $outPut .='
                            <li><span class="next page-numbers" data-id="'.$page.'"><i class="fas fa-angle-right"></i></span></li>';
                        }
                        $outPut .='
                        </ul>
                    </nav>';
        }

        echo json_encode($outPut);

    }

    //Related product list
    if ($get == 211) {
        $id = $_GET['cat'];
        $outPut = ''; 
        if (Ajax::getRelatedProductRoundom($id) && ! empty($_SESSION['token'])) {
            foreach (Ajax::getRelatedProductRoundom($id) as $key) {
                $outPut .= '
                    <div class="swiper-slide">
                        <div class="product">
                            <div class="product-contents">
                                <div class="product-image">
                                    <a href="product-details?pr='.$key['entity_guid'].'">
                                        <img src="'.$key['product_image'].'" alt="'.$key['product'].'">
                                    </a>
                                    <div class="shop-action">
                                        <ul>
                                            <li class="cart">
                                                <a  onClick="cartModal(`' . $key['entity_guid'] . '`, 1, ` ' . $_SESSION['token'] . '`)"><span>Add to cart</span></a>
                                            </li>
                                            <li class="wishlist">
                                                <a href="#"><span>Add to wishlist</span></a>
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                                <div class="product-caption">
                                    <div class="product-tags">
                                        <a href="#">Crop</a>';
                                        foreach (Ajax::getSingleCategory($key['category_id']) as $category) {
                                            $outPut .= '<a >'.$category['category'].'</a>';
                                        }
                                        $outPut .= '
                                    </div>
                                    <h4 class="product-title">
                                        <a href="product-details?pr='.$key['entity_guid'].'">'.$key['product'].'</a>
                                    </h4>
                                    <div class="review-count">
                                        <div class="rating">
                                            <i class="fas fa-star"></i>
                                            <i class="fas fa-star"></i>
                                            <i class="fas fa-star"></i>
                                            <i class="fas fa-star"></i>
                                            <i class="fas fa-star-half-alt"></i>
                                        </div>
                                        <!-- <span>8 Review</span> -->
                                    </div>
                                    <div class="price">
                                        <span>&#8358;'.$key['price'].'</span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>';
            }
        }else {
            foreach (Ajax::getRelatedProductRoundom($id) as $key) {
                $outPut .= '
                    <div class="swiper-slide">
                        <div class="product">
                            <div class="product-contents">
                                <div class="product-image">
                                    <a href="product-details?pr='.$key['entity_guid'].'">
                                        <img src="'.$key['product_image'].'" alt="'.$key['product'].'">
                                    </a>
                                    <div class="shop-action">
                                        <ul>
                                            <li class="cart">
                                                <a  onClick="checkLogin()"><span>Add to cart</span></a>
                                            </li>
                                            <li class="wishlist">
                                                <a href="#"><span>Add to wishlist</span></a>
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                                <div class="product-caption">
                                    <div class="product-tags">
                                        <a href="#">Crop</a>';
                                        foreach (Ajax::getSingleCategory($key['category_id']) as $category) {
                                            $outPut .= '<a >'.$category['category'].'</a>';
                                        }
                                        $outPut .= '
                                    </div>
                                    <h4 class="product-title">
                                        <a href="product-details?pr='.$key['entity_guid'].'">'.$key['product'].'</a>
                                    </h4>
                                    <div class="review-count">
                                        <div class="rating">
                                            <i class="fas fa-star"></i>
                                            <i class="fas fa-star"></i>
                                            <i class="fas fa-star"></i>
                                            <i class="fas fa-star"></i>
                                            <i class="fas fa-star-half-alt"></i>
                                        </div>
                                        <!-- <span>8 Review</span> -->
                                    </div>
                                    <div class="price">
                                        <span>&#8358;'.$key['price'].'</span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>';
            }
        }

        echo json_encode($outPut);

    }

    //Cart list
    if ($get == 212) {
        $outPut = '';
        $total = 0; var_dump(Ajax::fetchCart($_SESSION['token']));exit;
        if (! empty($_SESSION['token']) && Ajax::fetchCart($_SESSION['token'])) {
            $outPut .= '
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown" >
                        <i class="far fa-shopping-cart my-cart-icon"></i>
                        <span class="badge my-cart-badge">'.count(Ajax::fetchCart($_SESSION['token'])).'</span>
                    </a>
                    <ul class="dropdown-menu cart-list">';
                    foreach (Ajax::fetchCart($_SESSION['token']) as $key) {
                        $total += $key['total_price'];
                        $outPut .= '
                        <li>
                            <div class="thumb">
                                <a href="#" class="photo">
                                    <img src="'. $key['product_image'] .'" alt="Thumb">
                                </a>
                                <a href="#" class="remove-product">
                                    <i class="fas fa-times"></i>
                                </a>
                            </div>
                            <div class="info">
                                <h6><a href="#">'. $key['product'] .' </a></h6>
                                <p>2x - <span class="price">&#8358;'. $key['price'] .'</span></p>
                            </div>
                        </li>';
                    }
                    
                        $outPut .= '<li class="total">
                        <span class="pull-right"><strong>Total</strong>: &#8358;'. number_format($total)  .'</span>
                        <!--<a href="#" class="btn btn-default btn-cart">Cart</a>-->
                            <a href="#" class="btn btn-default btn-cart" onClick="payModal('.Ajax::totalCartPrice($_SESSION['token']).')">Checkout</a>
                        </li>
            
                    </ul>
                ';
        }else {
            $outPut .= '
                
            <a href="#" class="dropdown-toggle" data-toggle="dropdown" >
                <i class="far fa-shopping-cart my-cart-icon"></i>
                <span class="badge my-cart-badge">0</span>
            </a>
            <ul class="dropdown-menu cart-list">
                <li>
                    No product saved yet
                </li>
            </ul>
        ';
        }

        echo json_encode($outPut);

    }

    //Product Count
    if ($get == 213) {
        $outPut = '';
        $result = count(Ajax::getAllProduc());
        $outPut .= $result . ' products available';

        echo json_encode($outPut);
    }