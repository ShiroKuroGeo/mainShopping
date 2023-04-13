$(document).ready(function(){
    let tmp = localStorage.getItem('isloggedin');
    if (tmp == "200") {
        window.location.href = "dashboard.php";
    }
});

$('#btnLogin').click(function(){
    check();
});

var check =()=>{
    if($('#email').val() != "" && $('#password').val() != ""){
        doRequest();
    }else{
        alert("Fill up empty Fields!");
    }
}

var doRequest =()=>{
    $.ajax({
        type: "POST",
        url: "./source/router.php",
        data: {choice:'login',Email:$('#email').val(),Password:$('#password').val()},
            success: function(data){
                if (data == "200"){
                    localStorage.setItem('isloggedin','200');
                    // Check if user is admin or a normal user
                        $.ajax({
                            type: "POST",
                            url: "./source/router.php",
                            data: {choice: 'doGetInfoUser'},
                            success: function(data){
                                var json = JSON.parse(data);
                                var str = "";
                                json.forEach(element => {
                                    if(element.role == "admin"){
                                        str = "./admin/home.php";
                                    }else{
                                        str = "./eco-post/home.php";
                                    }
                            });
                                window.location.href = str;
                            }
                        });
                }else{
                    confirm("Something is wrong!");
                }
            },
            error: function (xhr,ajaxOptions,thrownError){
                alert(thrownError)
            }
        });
}