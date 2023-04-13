const savem =(data)=>{
    $.ajax({
        type: "POST",
        url: "userDashboardSource/router.php",
        data: { choice: 'saveMultiple', data: data },
        success: function (data) {
            location.reload();
        },
        error: function (xhr, ajaxOptions, thrownError) {
          alert(xhr + "|" + ajaxOptions + "|" + thrownError);
        },
    });
}