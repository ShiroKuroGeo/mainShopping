$(document).ready(function(){
    let tmp = localStorage.getItem('isloggedin');
    if (tmp == 404) {
        window.location.href = "../dashboard.php";
    }
    getEcoPost();
    doGetEcoPostNewFeed();
    commentRetrieve();
});

$('#btnPost').click(function(){
    doInsertEcoPost();
});

$('#btnChangeProfile').click(function(){
    doChangeProfile();
});

$('#btnSaveLink').click(function(){
    doGetMessageLink();
});

var doInsertEcoPost =()=>{
    //Get only the file name
    var photo = $('#photo').val();
    var photoName = photo.replace(/^.*[\\\/]/, '');
    var videos = $('#videos').val();
    var videosName = videos.replace(/^.*[\\\/]/, '');
    $.ajax({
        type: "POST",
        url: "../source/router.php",
        data: {choice: 'doInsertEcoPost', Description:$('#description').val(), photo:photoName, video:videosName, status:1},
        success: function(data){
            if(data == 'success'){
                alert("Inserted");
            }else{
                alert("Dont");
            }
        },
        error: function(xhr, ajaxOptions, thrownError){
          alert(thrownError);
        }
    });
}

var getEcoPost =()=>{
    $.ajax({
        type: "POST",
        url: "../source/router.php",
        data: {choice: 'doGetDataEcoPost'},
        success: function(data){
          var json = JSON.parse(data);
          var str = "";
          json.forEach(element => {
            str += `
                <figure class="figure">
                    <hr class="col-12">
                    <figcaption class="figure-caption" id="descriptionPosted">${element.caption}</figcaption>
                    <div class="row">`
                    if(element.image != null) { 
                        `
                        <img src="../images/${element.image}" class="rounded col-6" alt="${element.image}">
                        `
                    }
                    if(element.video != null) { //Validation of video is not null
                        `<video src="../images/${element.video}" controls class="rounded col-6" alt="${element.video}">
                            Your browser does not support the video tag.
                        </video>`
                    }
                        `
                    </div>
                </figure>`;
          });
          $('#mgaPostTime').append(str);
        },
        error: function(xhr, ajaxOptions, thrownError){
          alert(thrownError);
        }
    });
}

var doGetEcoPostNewFeed =()=>{
    $.ajax({
        type: "POST",
        url: "../source/router.php",
        data: {choice: 'doGetEcoPostNewFeed'},
        success: function(data){
          var json = JSON.parse(data);
          var str = "";
          json.forEach(element => {
              str += `
                <figure class="figure col-12" style="height:30vh;">
                <div value="${element.postId}">
                    <div class="row mt-3">
                        <img src="../images/${element.image}" class="rounded col-1" height="40" alt="${element.image}">
                        ${element.email}
                    </div>
                    <hr class="col-12">
                    <figcaption class="figure-caption" id="descriptionPosted">${element.caption}</figcaption>
                    <div class="row">
                        <img src="../images/${element.imagePost}" class="rounded col-6" alt="${element.imagePost}">
                        <img src="../images/${element.video}" class="rounded col-6" alt="${element.video}">
                    </div>
                </figure>
                <div class="commentsHere mt-5 ms-2">
                    <!-- ALL COMMENT OF USER IS HERE -->
                    <div id="appendAllComment"></div>
                </div>
                <div class="col-11 ms-5">
                    <div class="textCommentArea">
                    
                        <textarea name="commentTextArea" class="form-control" id="commentTextArea" rows="5" placeholder="Enter comments here"></textarea>
                        <button type="button" id="btnIdForUserComment" value="${element.postId}" onclick="commentOnThisPost(${element.postId})" class="btn btn-primary mt-2">Submit comment</button>
                    </div>
                </div></div>
                <hr class="col-12">
                `;
          });
          $('#mgaPost').append(str);
        },
        error: function(xhr, ajaxOptions, thrownError){
            alert(thrownError);
        }
    });
}

var doGetMessageLink =()=>{
    $.ajax({
        type: "POST",
        url: "../source/router.php",
        data: {choice: 'doGetMessageLink', linkMessage:$('#updateLinkMessage').val()},
        success: function(data){
            window.location.href = "timeline.html";
        },
        error: function(xhr, ajaxOptions, thrownError){
          alert(thrownError);
        }
    });
}

var doChangeProfile =()=>{
    //Get only the file name
    var photo = $('#photo').val();
    var photoName = photo.replace(/^.*[\\\/]/, '');
    $.ajax({
        type: "POST",
        url: "../source/router.php",
        data: {choice: 'doChangeProfile', photo:photoName},
        success: function(data){
            if(data == "success"){
                location.reload();
            }else{
                alert("Picture is not Uploaded");
            }
        },
        error: function(xhr, ajaxOptions, thrownError){
          alert(thrownError);
        }
    });
}

function commentOnThisPost(id){
    $.ajax({
        type: "POST",
        url: "../source/router.php",
        data: {choice: 'doAddCommentToAPost', ID:id, comment:$('#commentTextArea').val()},
        success: function(data){
            location.reload();
        },
        error: function(xhr, ajaxOptions, thrownError){
          alert(thrownError);
        }
    });
}

// function commentRetrieve(){
//     var sad = $('#valueId').val();
//     $.ajax({
//         type: "POST",
//         url: "../source/router.php",
//         data: {choice: 'doViewCommentOfThisPost', ID:$('#valueId').html()},
//         success: function(data){
//             var json = JSON.parse(data);
//             var str = "";
//             json.forEach(element => {
//             str += `
//             <div class="col-12 border">
//                 <div class="d-flex justify-content-between align-items-between col-11">
//                     <pre class="ms-3 mt-2">${element.email}</pre>
//                     <div class="text-end">
//                         <pre class="">${element.date_create}</pre>
//                         <button type="button" class="btn btn-danger btn-sm" onclick="deleteComment(${element.id})">Delete Comment</button>
//                     </div>
//                 </div>
//             <p class="border col-10 ms-5">${element.comments}</p>
//             </div>
//             `;
//         });
//         $('#appendAllComment').append(str);
//         },
//         error: function(xhr, ajaxOptions, thrownError){
//             alert(thrownError);
//         }
//     });
// }