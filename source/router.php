<?php
session_start();
require("user.php");
if (isset($_POST['choice'])) {
    switch ($_POST['choice']) {
        case 'login':
            $backend = new user();
            echo $backend->doLogin($_POST['Email'], $_POST['Password']);
            break;
        case 'register':
            $backend = new user();
            echo $backend->doRegister($_POST['Firsname'],$_POST['Lastname'],$_POST['Username'],$_POST['Address'],$_POST['Phone'],$_POST['Email'],$_POST['Password']);
            break;
        case 'doGetInfoUser':
            $backend = new user();
            echo $backend->doGetInfoUser();
            break;
        case 'doAddToCart':
            $backend = new user();
            echo $backend->doAddToCart($_POST['product'], $_POST['user'], $_POST['image'], $_POST['title'], $_POST['price'], $_POST['qt'], $_POST['total']);
            break;
        case 'doClickProduct':
            $backend = new user();
            echo $backend->doClickProduct($_POST['Item']);
            break;
        case 'doCartTableToOrder':
            $backend = new user();
            echo $backend->doCartTableToOrder($_POST['Item']);
            break;
        case 'category':
            $backend = new user();
            echo $backend->doGetCategories();
            break;
        case 'cartsNumber':
            $backend = new user();
            echo $backend->doGetNumber();
            break;
        case 'doEcoProduct':
            $backend = new user();
            echo $backend->doEcoProduct();
            break;
        case 'doSearch':
            $backend = new user();
            echo $backend->doSearch($_POST['Item']);
            break;
        case 'doGetCart':
            $backend = new user();
            echo $backend->doGetCart();
            break;
        case 'doUpdateCartQuery':
            $backend = new user();
            echo $backend->doUpdateCartQuery($_POST['Quantity'], $_POST['ID']);
            break;
        case 'doDeleteCartQuery':
            $backend = new user();
            echo $backend->doDeleteCartQuery($_POST['ID']);
            break;
        case 'doInsertEcoPost':
            $backend = new user();
            echo $backend->doInsertEcoPost($_POST['Description'],$_POST['photo'],$_POST['video'],$_POST['status'],);
            break;
        case 'doGetDataEcoPost':
            $backend = new user();
            echo $backend->doGetDataEcoPost();
            break;
        case 'doGetEcoPostNewFeed':
            $backend = new user();
            echo $backend->doGetEcoPostTimeline();
            break;
        case 'doGetMessageLink':
            $backend = new user();
            echo $backend->doGetMessageLink($_POST['linkMessage']);
            break;
        case 'doChangeProfile':
            $backend = new user();
            echo $backend->doChangeProfile($_POST['photo']);
            break;
        case 'doSearchUser':
            $backend = new user();
            echo $backend->doSearchUser($_POST['User']);
            break;
        case 'doInsertOrder':
            $backend = new user();
            echo $backend->doInsertOrder($_POST['title'],$_POST['total_price'],$_POST['Qt'],$_POST['address'],$_POST['P_method'],$_POST['status']);
            break;
        case 'doCommentInsert':
            $backend = new user();
            echo $backend->doCommentInsert($_POST['productId'],$_POST['comment']);
            break;
        case 'doViewCommentOfThisProduct':
            $backend = new user();
            echo $backend->doViewCommentOfThisProduct($_POST['productId']);
            break;
        case 'doDeleteComment':
            $backend = new user();
            echo $backend->doDeleteComment($_POST['ID']);
            break;
        case 'doAddCommentToAPost':
            $backend = new user();
            echo $backend->doAddCommentToAPost($_POST['ID'],$_POST['comment']);
            break;
        case 'doViewCommentOfThisPost':
            $backend = new user();
            echo $backend->doViewCommentOfThisPost($_POST['ID']);
            break;
        case 'logout':
            session_unset();
            session_destroy();
            echo "success";
            break;
        default:
            echo "404";
            break;
    }
}