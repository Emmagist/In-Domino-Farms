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
                        <td>". ucwords($key['first_name']) ."</td>
                        <td>". ucwords($key['last_name']) ."</td>
                        <td>". $key['email'] ."</td>
                        <td>". $key['phone_number'] ."</td>
                        <td>". DataBase::dateFormat($key['created_at']) ."</td>
                        <td>
                        <button class='btn btn-sm'><i class='fa fa-eye text-warning' onclick='viewUserButton(". $key['id'] .")' style='font-size:15px'></i></button>
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
                    <input type="text" id="category" title="Edit '.$key['first_name'].'" class="form-control" name="" value="'.$key['first_name'].'">
                </div>
                <div class="form-group">
                    <input type="text" id="category" title="Edit '.$key['last_name'].'" class="form-control" name="" value="'.$key['last_name'].'">
                </div>
                <div class="form-group">
                    <input type="text" id="sub_category" title="Edit '.$key['email'].'" class="form-control" name="" value="'.$key['email'].'">
                </div>
                <div class="form-group">
                    <input type="text" id="sub_category" title="Edit '.$key['phone_number'].'" class="form-control" name="" value="'.$key['phone_number'].'">
                </div>
                <div class="form-group">
                    <input type="text" id="sub_category" title="Edit '.$key['gender'].'" class="form-control" name="" value="'.$key['gender'].'">
                </div>
                <div class="form-group">
                    <input type="text" id="sub_category" title="Edit '.$key['address'].'" class="form-control" name="" value="'.$key['address'].'">
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
                        <td>". ucwords($key['product']) ."</td>
                        <td><img src='../". $key['product_image'] ."' alt='". $key['product'] ."' style='width:50px; height:50px; border-radius:5px' /></td>
                        <td>&#8358;". $key['price'] ."</td>
                        <td>". $key['quantity'] ."</td>
                        <td>&#8358;". $key['total_price'] ."</td>
                        <td>". DataBase::dateFormat($key['ordered_date']) ."</td>
                        <td>
                        <button class='btn btn-sm'><i class='fa fa-eye text-warning' onclick='viewUserButton(". $key['id'] .")' style='font-size:15px'></i></button>
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
                                    <a onClick="cartModal()"><span>Add to cart</span></a>
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
                        <span>8 Review</span>
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

    //Shop product list
    if ($get == 210) {
        $outPut = '';
        if (Ajax::getAllProductRoundom()) {
            foreach (Ajax::getAllProductRoundom() as $key) {
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
                                    <a class="my-cart-btn sc-add-to-cart"  data-id="'.$key['id'].'" data-name="'.$key['product'].'" data-summary="'.$key['short_description'].'" data-price="'.$key['price'].'" data-quantity="1" data-image="'.$key['product_image'].'"  onClick="cartModal()"><span>Add to cart</span></a>
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
                        <span>8 Review</span>
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

    //Related product list
    if ($get == 211) {
        $id = $_GET['cat'];
        $outPut = ''; 
        if (Ajax::getRelatedProductRoundom($id)) {
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
                                                <a  onClick="cartModal()"><span>Add to cart</span></a>
                                            </li>
                                            <li class="wishlist">
                                                <a href="#"><span>Add to wishlist</span></a>
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                                <div class="product-caption">
                                    <div class="product-tags">
                                        <a href="#">Crop</a>
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
                                        <span>8 Review</span>
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
        if (Ajax::fetchCart($_GET['token'])) {
            foreach (Ajax::fetchCart($_GET['token']) as $key) {
                $outPut .= '
                
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown" >
                        <i class="far fa-shopping-cart my-cart-icon"></i>
                        <span class="badge my-cart-badge">'. $key['id']?count($key['id']):"0" .'</span>
                    </a>
                    <ul class="dropdown-menu cart-list">
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
                                <p>2x - <span class="price">'. $key['price'] .'</span></p>
                            </div>
                        </li>
                        <li class="total">
                            <span class="pull-right"><strong>Total</strong>: $'. $key['total'] .'</span>
                            <a href="#" class="btn btn-default btn-cart">Cart</a>
                            <a href="#" class="btn btn-default btn-cart">Checkout</a>
                        </li>
                    </ul>
                ';
            }
        }

        echo json_encode($outPut);

    }