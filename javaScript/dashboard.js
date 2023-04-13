$(document).ready(function(){
    let tmp = localStorage.getItem('isloggedin');
    if (tmp == 404) {
        window.location.href = "./dashboard.php";
    }
    viewCategory();
    viewCartsNumber();
    doEcoProduct();
});

$('#btnSearch').click(function(){
  doSearch();
});

$('#addThisProductToCart').click(function(){
  if(confirm("Are you sure you want to add this product?")){
    prodcutAddThisToCart();
  }else{
    window.location.href = "dashboard.php";
  }
});

//Adding product
function prodcutAddThisToCart(){
  $.ajax({
    type: "POST",
    url: "./source/router.php",
    data: {choice:'doAddToCart',product:$('#productIDAddThisCart').val(),user:$('#usernameAddThisCart').val(),image:$('#imageAddThisCart').val(),title:$('#titleAddThisCart').val(),price:$('#priceAddThisCart').val(),qt:$('#quantityAddThisCart').val(),total:$('#totalAddThisCart').val()},
    success: function(data){
      if(data == 200){
        window.location.href = "dashboard.php";
      }else{
        alert("Something is wrong in adding this product!");
      }
    },
    error: function(xhr, ajaxOptions, thrownError){
      alert(thrownError);
    }
  });
}

//View Category
var viewCategory =()=>{
  $.ajax({
    type: "POST",
    url: "./source/router.php",
    data: {choice: 'category'},
    success: function(data){
      var json = JSON.parse(data);
      var str = "";
      json.forEach(element => {
          str += `<div class="hoverItemCat text-center m-1 p-2 border">
                    <a href='shop.php?category=${element.id}'> <img src='./user_dashboard/uploads/${element.image}' width="120"></a>
                    <p style="font-size: 10px;">${element.category_title}</p>
                  </div>`;
      });
      $('#getCategory').append(str);
    },
    error: function(xhr, ajaxOptions, thrownError){
      alert(thrownError);
    }
  });
}

//View Carts Number
var viewCartsNumber =()=>{
  $.ajax({
    type: "POST",
    url: "./source/router.php",
    data: {choice: 'cartsNumber'},
    success: function(data){
      var json = JSON.parse(data);
      $('#cartNumber').append(json.length);
    },
    error: function(xhr, ajaxOptions, thrownError){
      alert(thrownError);
    }
  });
}

//View Eco Products
var doEcoProduct =()=>{
  $.ajax({
    type: "POST",
    url: "./source/router.php",
    data: {choice: 'doEcoProduct'},
    success: function(data){
      var json = JSON.parse(data);
      var str = "";
      json.forEach(element => {
      str += `
      <div class="hoverItemCat col-2 text-center m-2 p-2 border">
        <a href='product_details.php?product_id= ${element.product_id}'><img src='./user_dashboard/product_uploads/${element.image_1}' width="120" class='card-img-top' alt='${element.title}'></a>
        <p style="font-size: 16px;">${element.title}</p>
        <p style="font-size: 16px;">${element.price}</p>
         <div class='stars m-2'>
            <i class='fas fa-star'></i>
            <i class='fas fa-star'></i>
            <i class='fas fa-star'></i>
            <i class='fas fa-star'></i>
            <i class='fas fa-star-half-alt'></i>
          </div>
          <div>'
            <button type="button" class='btn btn-success' onclick="toModal(${element.product_id});" data-bs-toggle="modal" data-bs-target="#addtocart">Add to cart</button>
            <a href='product_details.php?product_id= ${element.product_id}' class='btn btn-primary'>View me</a>
          </div>
      </div>`;
      });
      $('#getProducts').append(str);
    },
    error: function(xhr, ajaxOptions, thrownError){
      alert(thrownError);
    }
  });
}

function toModal(id){
  $.ajax({
    type: "POST",
    url: "./source/router.php",
    data: {choice: 'doClickProduct', Item:id},
    success: function(data){
      var json = JSON.parse(data);
      str = "";
      json.forEach(Element => {
        str = `
          <div class="input-group">
            <img src='./user_dashboard/product_uploads/${Element.image_1}' width="120" class='card-img-top' alt='${Element.title}'>
          </div>
          <p>Product Name: ${Element.title}</p>
          <p>Product Price: ${Element.price}</p>
          <div class="input-group">
            <input type="text" id="productIDAddThisCart" class="form-control visually-hidden" value="${Element.product_id}" disabled="disabled">
          </div>
          <div class="input-group mt-2">
            <input type="text" id="usernameAddThisCart" class="form-control visually-hidden" value="" placeholder="Enter Username">
          </div>
          <div class="input-group mt-2">
            <input type="text" id="imageAddThisCart" class="form-control visually-hidden" value="${Element.image_1}" disabled="disabled">
          </div>
          <div class="input-group mt-2">
            <input type="text" id="titleAddThisCart" class="form-control visually-hidden" value="${Element.title}" disabled="disabled">
          </div>
          <div class="input-group mt-2">
            <input type="text" id="priceAddThisCart" class="form-control visually-hidden" value="${Element.price}" disabled="disabled">
          </div>
          <div class="input-group mt-2">
            <input type="text" id="quantityAddThisCart" class="form-control visually-hidden" value="1" placeholder="Quantity value">
          </div>
          <div class="input-group mt-2">
            <input type="text" id="totalAddThisCart" class="form-control visually-hidden" value="${Element.price}" disabled="disabled">
          </div>
        `;
      });
      $('#addthisItemToCart').empty().append(str);
    },
    error: function(xhr, ajaxOptions, thrownError){
      alert(thrownError);
    }
  });
}
//View Get Products
var doSearch =()=>{
  $.ajax({
    type: "POST",
    url: "./source/router.php",
    data: {choice: 'doSearch', Item:$('#searchProduct').val()},
    success: function(data){
      var searchItem = $('#searchProduct').val();
      window.location.href = 'search.php?search='+searchItem+'&search_now=search';
    },
    error: function(xhr, ajaxOptions, thrownError){
      alert(thrownError);
    }
  });
}