$(document).ready(function(){
    let tmp = localStorage.getItem('isloggedin');
    if (tmp == 404) {
        window.location.href = "./";
    }
});

$('#btnLogout').click(function(){
    logoutEcoShop();
});
$('#btnLogoutPost').click(function(){
    logoutEcoPost();
});

var logoutEcoShop =()=>{
    $.ajax({
        type: "POST",
        url: "./source/router.php",
        data: {choice:'logout'},
        success: function(data){
            if (data == "success") {
                localStorage.setItem('isloggedin','404');
                window.location.href = "./";
            }else{
                alert("Something is wrong!");
                location.reload();
            }
        }, 
        error: function (xhr, ajaxOptions, thrownError) {
            alert(thrownError);
        }
    });
}

var logoutEcoPost =()=>{
    $.ajax({
        type: "POST",
        url: "../source/router.php",
        data: {choice:'logout'},
        success: function(data){
            if (data == "success") {
                localStorage.setItem('isloggedin','404');
                window.location.href = "../.";
            }else{
                alert("Something is wrong!");
                location.reload();
            }
        }
    });
}