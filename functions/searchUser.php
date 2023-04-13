<?php
include "../includes/db_con.php";
session_start();

function getsearch(){  
    global $conn;

    if(isset ($_GET['search_now'])){
        $search =$_GET['search'];
        $search_query = "SELECT * FROM `tbl_user` WHERE email LIKE '%$search%'";
        $result = mysqli_query($conn,$search_query);
        $num_rows = mysqli_num_rows($result);
        if($num_rows == 0){
                echo "<script>alert('Sorry $search is not found.')</script>";
            }
        while($row=mysqli_fetch_assoc($result)){
            $id = $row['user_id'];
            $fname = $row['fname'];
            $lname = $row['lname'];
            $email = $row['email'];
            $username = $row['username'];
            $phone = $row['phone'];
            $messageLink = $row['messageLink'];
            $image = $row['image'];

            echo "
                <div class='col-3 ms-1 border'>
                    <img src='../images/$image' class='col-12 p-2' alt='$image'><br>
                    <p>Name : $lname, $fname</p>
                    <p>Email: $email</p>
                    <p>Message me :<pre><a href='$messageLink'>$messageLink</a></pre></p>
                </div>
            ";
        }
    }
}
?>