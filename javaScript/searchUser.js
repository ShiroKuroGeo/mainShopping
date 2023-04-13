$('#btnSearchUser').click(function(){
    doSearchUser();
});

var doSearchUser =()=>{
    $.ajax({
      type: "POST",
      url: "../source/router.php",
      data: {choice: 'doSearchUser', User:$('#searchUser').val()},
      success: function(data){
        var searchUser = $('#searchUser').val();
        window.location.href = 'searchUser.php?search='+searchUser+'&search_now=search';
      },
      error: function(xhr, ajaxOptions, thrownError){
        alert(thrownError);
      }
    });
}