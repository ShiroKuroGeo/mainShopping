$(document).ready(function(){
    let tmp = localStorage.getItem('isloggedin');
    if (tmp == 404) {
        window.location.href = "../dashboard.php";
    }
    doGetStudentInformationEcoPost();
    doGetStudentInformationEcoShop();
});

//Get Information of the User in Eco Shop
var doGetStudentInformationEcoShop =() =>{
    $.ajax({
      type: "POST",
      url: "./source/router.php",
      data: {choice: 'doGetInfoUser'},
      success: function(data){
        var json = JSON.parse(data);
        var str = "";
        var changeProfile = "";
        json.forEach(element => {
            str = element.email;
            changeProfile = `<img src="./images/${element.image}" height="50px" onclick="toggleMenu()"></a>`;
        });
        $('#nameOfUserES').append(str);
        $('.profilePic').append(changeProfile);
      }
    });
  }

  //Get Information of the User in Eco Post
var doGetStudentInformationEcoPost =() =>{
    $.ajax({
        type: "POST",
        url: "../source/router.php",
        data: {choice: 'doGetInfoUser'},
        success: function(data){
        var json = JSON.parse(data);
        var emailOfUser = "";
        var linkMessageOfUser = "";
        var changeProfile = "";
        json.forEach(element => {
            emailOfUser = element.email;
            linkMessageOfUser = `Message me in this link :<br> <a href="${element.messageLink}">${element.messageLink}</a>`;
            changeProfile = `<img src="../images/${element.image}" class="card-img-top" alt="...">`;
        });
        $('.nameOfUser').append(emailOfUser);
        $('.profName').append(emailOfUser);
        $('#linkMessage').append(linkMessageOfUser);
        $('#appendChangeProfile').append(changeProfile);
        $('.profiles').append(changeProfile);
        }
    });
}
  