
$('#btnRegister').click(function(){
    check();
});

var check=()=>{
    if($('#Firstname').val() != "" && $('#Lastname').val() != "" && $('#Email').val() != "" && $('#Username').val() != "" && $('#Address').val() != "" && $('#phone').val() != "" && $('#Password').val() != "" && $('#retypePassword').val() != ""){
        if($('#Password').val() == $('#retypePassword').val()){
            doRequest();
        }else{
            alert("The password does not match");
        }
    }else{
        alert("Suwati palihug");
    }
}

var doRequest =()=>{
    $.ajax({
        type: "POST",
        url: "./source/router.php",
        data: {choice:'register',Firsname:$('#Firstname').val(),Lastname:$('#Lastname').val(),Username:$('#Username').val(),Address:$('#Address').val(),Phone:$('#phone').val(),Email:$('#Email').val(),Password:$('#Password').val()},
            success: function(data){
                if (data == "success"){
                    window.location.href = "./";
                }else{
                    alert("Unsuccess");
                    location.reload();
                }
            },
            error: function (xhr,ajaxOptions,thrownError){
                alert(thrownError)
            }
        });
}