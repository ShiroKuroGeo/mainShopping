<?php
include "./includes/db_con.php";
session_start();
/* category funtion */
function getcategory(){
    global $conn;

    $select="SELECT * FROM category";
    $result=mysqli_query($conn,$select);
    while($row_data=mysqli_fetch_assoc($result)){
        $image=$row_data['image'];
        $category_title=$row_data['category_title'];
        $id=$row_data['id'];
        echo "  <div class='box-container'>
                    <div class='box'>
                        <a href='index.php?category=$id'> <img src='./user_dashboard/uploads/$image'></a>
                        <h3>$category_title</h3>
                    </div>
                </div>";
    }
}


function getcategories(){
    global $conn;

    $select="SELECT * FROM category";
    $result=mysqli_query($conn,$select);
    while($row_data = mysqli_fetch_assoc($result)){
        $image=$row_data['image'];
        $category_title=$row_data['category_title'];
        $id=$row_data['id'];
        echo "  <div class='box-container'>
                    <div class='box'>
                        <a href='shop.php?category=$id'> <img src='./user_dashboard/uploads/$image'></a>
                        <h3>$category_title</h3>
                    </div>
                </div>";
    }
}

                                

 


/* product function */

                            function getproducts(){
                                global $conn;

                                /* diri makita kong naka set ba sya or wala */

                                if(!isset($_GET['category'])){
                    /* 
                                $select = "SELECT * FROM `images`";
                                $result =mysqli_query($conn, $select);
                                while($row = mysqli_fetch_assoc($result)){
                                     $id = $row ['id'];
                                     $image = $row['images'];
                                     
                                }  */
                                
                                
                                $select ="SELECT * FROM `products` order by  title ";
                                $result=mysqli_query($conn,$select);
                                while($row=mysqli_fetch_assoc($result)){
                                    $id=$row['product_id'];
                                    $title=$row['title'];
                                    $price=$row['price'];
                                    $category=$row['category'];
                                    $description=$row['description'];
                                    $image_1=$row['image_1'];

                                    echo " ";
                                }
                            }
                            }

 /* mao ni result whenever mo click tas category */


                        function getcategory_name(){
                            global $conn;

                            /* diri makita kong naka set ba sya or wala */
                            
                            if(isset($_GET['category'])){
                            $category=$_GET['category'];
                            $select ="SELECT * FROM `products` WHERE category=$category";
                            $result=mysqli_query($conn,$select);
                            $num_rows=mysqli_num_rows($result);
                            if($num_rows==0){
                                echo "<script>alert('Sorry category not found.')</script>";
                                echo "<script>window.open('index.php','_self')</script>";

                            }
                            while($row=mysqli_fetch_assoc($result)){
                                $id=$row['product_id'];
                                $title=$row['title'];
                                $price=$row['price'];
                                $category=$row['category'];
                                $description=$row['description'];
                                $image_1=$row['image_1'];
                                echo "   <div class='col-md-2 mb-2 '>
                                <div class='card' >
                                <a href='product_details.php?product_id= $id'><img src='./user_dashboard/product_uploads/$image_1' class='card-img-top' alt='$title'></a> 
                                <div class='card-body'>
                                <h5 class='card-title'>$title</h5>

                                <p class='card-text'>₱$price</p>
                                <div class='stars m-2'>
                                <i class='fas fa-star'></i>
                                <i class='fas fa-star'></i>
                                <i class='fas fa-star'></i>
                                <i class='fas fa-star'></i>
                                <i class='fas fa-star-half-alt'></i>
                                </div>
                                <!-- <a href='#' class='btn btn-success'>Add to cart</a>-->
                                <!--     <a href=''product_details.php?id= $id class='btn btn-primary'>View me</a>-->   
                                </div>
                                </div>
                                </div>";
                            }
                        }
                        }

/* search funtion */
function getsearch(){  
    global $conn;

    if(isset ($_GET['search_now'])){
        $search =$_GET['search'];
    $search_query ="SELECT * FROM `products` WHERE title LIKE '%$search%'";
    $result=mysqli_query($conn,$search_query);
    $num_rows=mysqli_num_rows($result);
      if($num_rows==0){
              echo "<script>alert('Sorry $search is not found.')</script>";
                }
    while($row=mysqli_fetch_assoc($result)){
        $id=$row['product_id'];
        $title=$row['title'];
        $price=$row['price'];
        $category=$row['category'];
        $description=$row['description'];
        $image_1=$row['image_1'];
        echo "  
        <div class='col-md-2 mb-2 '>
        <div class='card' >
        <a href='product_details.php?product_id= $id'><img src='./user_dashboard/product_uploads/$image_1' class='card-img-top' alt='$title'></a> 
        <div class='card-body'>
        <h5 class='card-title'>$title</h5>

        <p class='card-text'>₱$price</p>
        <div class='stars m-2'>
        <i class='fas fa-sta'></i>
        <i class='fas fa-star'></i>
        <i class='fas fa-star'></i>
        <i class='fas fa-star'></i>
        <i class='fas fa-star-half-alt'></i>
        </div>
        <!-- <a href='#' class='btn btn-success'>Add to cart</a>-->
        <!--     <a href=''product_details.php?id= $id class='btn btn-primary'>View me</a>-->   
        </div>
        </div>
        </div>";
    }
}
}


/* product_details function */


function product_image_1(){
    global $conn;

    /* diri makita kong naka set ba sya or wala */
    if(isset($_GET['product_id'])){
    if(!isset($_GET['category'])){
        $product_id=$_GET['product_id'];
    $select ="SELECT * FROM `products` WHERE product_id=$product_id";
    $result=mysqli_query($conn,$select);
    while($row=mysqli_fetch_assoc($result)){ 
        $image_1=$row['image_1'];
        $title=$row['title'];
        $price=$row['price'];
        $description=$row['description'];



        echo "
              <div id='carouselExampleIndicators' class='carousel slide'>
  <div class='carousel-indicators'class='d-block w-40'>
    <button type='button' data-bs-target='#carouselExampleIndicators' data-bs-slide-to='0' class='active' aria-current='true' aria-label='Slide 1'></button>
    <button type='button' data-bs-target='#carouselExampleIndicators' data-bs-slide-to='1' aria-label='Slide 2'></button>
    <button type='button' data-bs-target='#carouselExampleIndicators' data-bs-slide-to='2' aria-label='Slide 3'></button>
  </div>
  <div class='carousel-inner'>
    <div class='carousel-item active '>
      <img src='./user_dashboard/product_uploads/$image_1' class='d-block w-100' alt='...' class='images'>
    </div>
  </div>
  <button class='carousel-control-prev' type='button' data-bs-target='#carouselExampleIndicators' data-bs-slide='prev'>
    <span class='carousel-control-prev-icon' aria-hidden='true'></span>
    <span class='visually-hidden'>Previous</span>
  </button>
  <button class='carousel-control-next' type='button' data-bs-target='#carouselExampleIndicators' data-bs-slide='next'>
    <span class='carousel-control-next-icon' aria-hidden='true'></span>
    <span class='visually-hidden'>Next</span>
  </button>
</div>
     <h5 class='text'>$title</h5>       
<p class='text-center ps-4'>₱$price</p>

<button type='button' onclick='toModal($product_id);' class='btn btn-outline-success'  data-bs-toggle='modal' data-bs-target='#addtocart'><svg xmlns='http://www.w3.org/2000/svg' width='20' height='20' fill='currentColor' class='bi bi-cart' viewBox='0 0 16 16'>
<path d='M0 1.5A.5.5 0 0 1 .5 1H2a.5.5 0 0 1 .485.379L2.89 3H14.5a.5.5 0 0 1 .491.592l-1.5 8A.5.5 0 0 1 13 12H4a.5.5 0 0 1-.491-.408L2.01 3.607 1.61 2H.5a.5.5 0 0 1-.5-.5zM3.102 4l1.313 7h8.17l1.313-7H3.102zM5 12a2 2 0 1 0 0 4 2 2 0 0 0 0-4zm7 0a2 2 0 1 0 0 4 2 2 0 0 0 0-4zm-7 1a1 1 0 1 1 0 2 1 1 0 0 1 0-2zm7 0a1 1 0 1 1 0 2 1 1 0 0 1 0-2z'/>
</svg>Add to cart</button>
</div
                        
      
        ";
    }
}
}
}


function product_image_2(){
    global $conn;

    if(isset($_GET['product_id'])){
    if(!isset($_GET['category'])){
        $product_id=$_GET['product_id'];
    $select ="SELECT * FROM `products` WHERE product_id=$product_id";
    $result=mysqli_query($conn,$select);
    while($row=mysqli_fetch_assoc($result)){
        $title=$row['title'];
        $price=$row['price'];
        $image_1=$row['image_1'];
        $image_2=$row['image_2'];
        $image_3=$row['image_3'];


        echo "
      
      
        </div>
        </div>
        <div >
        <p class='text-center'>₱$price</p>
        <h5 class='text'>$title</h5>

        
       <a href='index.php?cart=$product_id'> 
       <button type='button' class='btn btn-outline-success'><svg xmlns='http://www.w3.org/2000/svg' width='20' height='20' fill='currentColor' class='bi bi-cart' viewBox='0 0 16 16'>
        <path d='M0 1.5A.5.5 0 0 1 .5 1H2a.5.5 0 0 1 .485.379L2.89 3H14.5a.5.5 0 0 1 .491.592l-1.5 8A.5.5 0 0 1 13 12H4a.5.5 0 0 1-.491-.408L2.01 3.607 1.61 2H.5a.5.5 0 0 1-.5-.5zM3.102 4l1.313 7h8.17l1.313-7H3.102zM5 12a2 2 0 1 0 0 4 2 2 0 0 0 0-4zm7 0a2 2 0 1 0 0 4 2 2 0 0 0 0-4zm-7 1a1 1 0 1 1 0 2 1 1 0 0 1 0-2zm7 0a1 1 0 1 1 0 2 1 1 0 0 1 0-2z'/>
        </svg>Add to cart</button>
        </div
       </a> 
                                
        ";
    }
}
}
}




/* description */



function product_decription(){
    global $conn;

    /* diri makita kong naka set ba sya or wala */
    if(isset($_GET['product_id'])){
    if(!isset($_GET['category'])){
        $product_id=$_GET['product_id'];
    $select ="SELECT * FROM `products` WHERE product_id=$product_id";
    $result=mysqli_query($conn,$select);
    while($row=mysqli_fetch_assoc($result)){
        $description=$row['description'];



        echo "<p> $description</p> ";
    }
}
}
}


/* for getting user  */
function user(){
    global $conn;

    $select="SELECT * FROM tbl_user";
    $result=mysqli_query($conn,$select);
    while($row_data=mysqli_fetch_assoc($result)){
        $id=$row_data['user_id'];
        $name=$row_data['username'];
      
        echo " <a href='shop.php' class='shop'><svg xmlns='http://www.w3.org/2000/svg'fill='currentColor' class='bi bi-shop' viewBox='0 0 16 16'>
        <path d='M2.97 1.35A1 1 0 0 1 3.73 1h8.54a1 1 0 0 1 .76.35l2.609 3.044A1.5 1.5 0 0 1 16 5.37v.255a2.375 2.375 0 0 1-4.25 1.458A2.371 2.371 0 0 1 9.875 8 2.37 2.37 0 0 1 8 7.083 2.37 2.37 0 0 1 6.125 8a2.37 2.37 0 0 1-1.875-.917A2.375 2.375 0 0 1 0 5.625V5.37a1.5 1.5 0 0 1 .361-.976l2.61-3.045zm1.78 4.275a1.375 1.375 0 0 0 2.75 0 .5.5 0 0 1 1 0 1.375 1.375 0 0 0 2.75 0 .5.5 0 0 1 1 0 1.375 1.375 0 1 0 2.75 0V5.37a.5.5 0 0 0-.12-.325L12.27 2H3.73L1.12 5.045A.5.5 0 0 0 1 5.37v.255a1.375 1.375 0 0 0 2.75 0 .5.5 0 0 1 1 0zM1.5 8.5A.5.5 0 0 1 2 9v6h1v-5a1 1 0 0 1 1-1h3a1 1 0 0 1 1 1v5h6V9a.5.5 0 0 1 1 0v6h.5a.5.5 0 0 1 0 1H.5a.5.5 0 0 1 0-1H1V9a.5.5 0 0 1 .5-.5zM4 15h3v-5H4v5zm5-5a1 1 0 0 1 1-1h2a1 1 0 0 1 1 1v3a1 1 0 0 1-1 1h-2a1 1 0 0 1-1-1v-3zm3 0h-2v3h2v-3z'/>
      </svg>$name</a>";
    }

} 


/* ip address funtion */
 

 function getIPAddress() {  
    //whether ip is from the share internet  
     if(!empty($_SERVER['HTTP_CLIENT_IP'])) {  
                $ip = $_SERVER['HTTP_CLIENT_IP'];  
        }  
    //whether ip is from the proxy  
    elseif (!empty($_SERVER['HTTP_X_FORWARDED_FOR'])) {  
                $ip = $_SERVER['HTTP_X_FORWARDED_FOR'];  
     }  
//whether ip is from the remote address  
    else{  
             $ip = $_SERVER['REMOTE_ADDR'];  
     }  
     return $ip;  
} 

function carts(){
    if(isset($_GET['cart']))
     global $conn;

     $product_id = $_GET['cart'];
     $select= "SELECT * FROM ";
}
 
function cart(){

    if(isset($_GET['cart'])){
        global $conn;

        
    $select="SELECT * FROM tbl_user";
    $result=mysqli_query($conn,$select);
    while($row_data=mysqli_fetch_assoc($result)){
        $user=$row_data['user_id'];
        $username=$row_data['username'];
      
      
    
/*        $ip= getIPAddress();
 */        $product_id =$_GET['cart'];
        $select ="SELECT * FROM `products` WHERE product_id=$product_id ";
        $result=mysqli_query($conn,$select);
        while($row=mysqli_fetch_assoc($result)){
        $id=$row['product_id'];        
        $image=$row['image_1'];
        $title=$row['title'];
        $price=$row['price'];
        
        
                    $insert="INSERT INTO `carts` (product_id,user_id,image,title,price,Qt,total_price,username)
                    VALUES ($product_id,'$user','$image','$title','$price',0,0,'$username')";
                    $result=mysqli_query($conn,$insert);
                    if ($result) {
                        echo "<script>alert('Product has been added to your cart.')</script>";
                        echo "<script>window.open('index.php','_self')</script>";

                        } else{
                        echo "<script>alert('this item is already in your cart.')</script>";
                        echo "<script>window.open('index.php','_self')</script>";

                        }
        }
                }                       
                }
           
}

/* cart num */

function cart_num(){

    
    if(isset($_GET['cart'])){
        global $conn;
/*         $ip=  users();
 */        $select ="SELECT user_id FROM `carts`";
        $result=mysqli_query($conn,$select);
        $rowcount=mysqli_num_rows($result);

              }else{
                    global $conn;
/*                     $ip= users();
 */                    $select ="SELECT user_id FROM `carts`";
                    $result=mysqli_query($conn,$select);
                    $rowcount=mysqli_num_rows($result);
                    
                  
                }    
                echo  $rowcount;  
              
                
     }

    /*  function users(){
        global $conn;
    
    
        $select= "SELECT * FROM tbl_user";
        $result=mysqli_query($conn,$select);
        
        while($row = mysqli_fetch_array($result)) {
            $id= $row['user_id'];
        }
    } 
     */
    
/* total price */

function total_price(){
    global $conn;

    $ip=getIPAddress();
    $total=0;
    $select="SELECT * FROM `carts` WHERE user_id='$ip'";
    $result=mysqli_query($conn,$select);
    while($row=mysqli_fetch_array($result)){
        $product_id=$row['product_id'];
            $price=array($row['price']);
            $count_price=array_sum($price);
            $total+=$count_price; 
        }   
         echo $total;

    }
?> 