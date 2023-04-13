// doCommentInsert
$(document).ready(function(){
    let tmp = localStorage.getItem('isloggedin');
    if (tmp == 404) {
        window.location.href = "../dashboard.php";
    }
    viewCommentOfThisProducts();
});

$('#btnCommentHere').click(function(){
    insertCommentToAProduct();
});

//Function for commenting a product
function insertCommentToAProduct(){
    var url = window.location.href;
    var productValue = getQueryParamValue(url, 'product_id');
    $.ajax({
        type: "POST",
        url: "./source/router.php",
        data: {choice: 'doCommentInsert', productId:productValue, comment:$('#commentTextArea').val()},
        success: function(data){
            location.reload();
        },
        error: function(xhr, ajaxOptions, thrownError){
            alert(thrownError);
        }
    });
}

var viewCommentOfThisProducts =()=>{
    var url = window.location.href;
    var productValue = getQueryParamValue(url, 'product_id');
    $.ajax({
    type: "POST",
    url: "./source/router.php",
    data: {choice: 'doViewCommentOfThisProduct', productId:productValue},
    success: function(data){
        var json = JSON.parse(data);
        var str = "";
        json.forEach(element => {
            str += 
            `
                <div class="col-12 border">
                    <div class="d-flex justify-content-between align-items-between col-11">
                        <pre class="ms-3 mt-2">${element.email}</pre>
                        <div class="text-end">
                            <pre class="">${element.date_create}</pre>
                            <button type="button" class="btn btn-danger btn-sm" onclick="deleteComment(${element.id})">Delete Comment</button>
                        </div>
                    </div>
                <p class="border col-10 ms-5">${element.comments}</p>
                </div>
            `;
        });
        $('#appendAllComment').append(str);
    },
    error: function(xhr, ajaxOptions, thrownError){
        alert(thrownError);
    }
    });
}

var deleteComment =(id)=>{
    $.ajax({
        type: "POST",
        url: "./source/router.php",
        data: {choice: 'doDeleteComment', ID:id},
        success: function(data){
            if(confirm("Are you sure you want to delete this comment?")){
                location.reload();
            }
        },
        error: function(xhr, ajaxOptions, thrownError){
            alert(thrownError);
        }
    });
}

//Get the data from the url
function getQueryParamValue(url, product_id) {
    product_id = product_id.replace(/[\[]/, '\\[').replace(/[\]]/, '\\]');
    var regex = new RegExp('[\\?&]' + product_id + '=([^&#]*)');
    var results = regex.exec(url);
    return results === null ? '' : decodeURIComponent(results[1].replace(/\+/g, ' '));
}