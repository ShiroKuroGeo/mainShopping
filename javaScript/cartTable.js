$(document).ready(function(){
    let tmp = localStorage.getItem('isloggedin');
    if (tmp == 404) {
        window.location.href = "./dashboard.php";
    }
    viewCarts();
    viewCartsNumber();
    doGetInfoUser();
    addCheckBox();
});

//Ongoing
function addCheckBox(){
    $('#checkPrice').on('click', function() {
        var selectedCheckboxes = $('input[type="checkbox"]:checked');
        var selectedValues = []; 
        var totalSum = 0;

        selectedCheckboxes.each(function() {
            var value = parseInt($(this).val());
            selectedValues.push(value);
            totalSum += value;
        });
        $('#totalSum').empty().append("P "+totalSum);
    });
}

$('#checkOutItem').click(function(){
    // doInsertOrder();
    $('#checkOutItem').on('click', function() {
        var selectedCheckboxes = $('input[type="checkbox"]:checked'); // Get all checked checkboxes
        var selectedValues = []; // Array to store selected checkbox values

        // Loop through each selected checkbox and push its value into the array
        selectedCheckboxes.each(function() {
            selectedValues.push($(this).val());
        });

        // Log the array of selected checkbox values
        $('#addthisItemToCart').empty().append(selectedValues);
    });
});

//Get Information of the User
var doGetInfoUser =() =>{
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
            changeProfile = `<img src="images/${element.image}" class="card-img-top" width="100" alt="..." onclick="toggleMenu()">`;
        });
        $('#nameOfUser').append(str);
        $('.profiles').append(changeProfile);
      },
      error: function(xhr, ajaxOptions, thrownError){
        alert(thrownError);
      }
    });
  }

var viewCarts =()=>{
    $.ajax({
    type: "POST",
    url: "./source/router.php",
    data: {choice: 'doGetCart'},
    success: function(data){
        var json = JSON.parse(data);
        var str = "";
        json.forEach(element => {
            str +=
            `
                <tr style="height: -10px;">
                    <th scope="row">${element.username}</th>
                    <td><input type="checkbox" class="checkboxValue" id="${element.id}" value="${element.price}"><img src="./user_dashboard/product_uploads/${element.image}" width="50"></td>
                    <td>${element.price}</td>
                    <td><input type="text" id="updateNumber" value="${element.Qt}"></td>
                    <td>${element.price * element.Qt}</td>
                    <td>
                        <button type="button" onclick="updateFunction(${element.id})" class="btn btn-sm btn-outline-info">Update</button>
                        <button class="btn btn-sm btn-outline-danger" onclick="deleteFunction(${element.id});">Delete</button>
                        <button class="btn btn-sm btn-outline-danger" onclick="toModal(${element.product_id});" data-bs-toggle="modal" data-bs-target="#addCheckOut">Add order</button>
                    </td>
                </tr>
            `;
        });
        $('#tblCart').append(str);
    },
    error: function(xhr, ajaxOptions, thrownError){
        alert(thrownError);
    }
    });
}

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
  
var updateFunction =(id)=>{
    if(confirm("Are you sure you want to update this item")){
        $.ajax({
            type: "POST",
            url: "./source/router.php",
            data: {choice: 'doUpdateCartQuery', Quantity:$('#updateNumber').val(), ID:id},
            success: function(data){
                if(data == 200){
                    window.location.href = "./dashCartTable.php";
                }else{
                    alert("Updated Failed!");
                }
            },
            error: function(xhr, ajaxOptions, thrownError){
              alert(thrownError);
            }
        });
    }else{
        window.location.href = "dashCartTable.html";
    }
}

var deleteFunction =(id)=>{
    if(confirm("Are you sure you want to delete this item")){
        $.ajax({
            type: "POST",
            url: "./source/router.php",
            data: {choice: 'doDeleteCartQuery', ID:id},
            success: function(data){
                if(data == 200){
                    window.location.href = "./dashCartTable.php";
                }else{
                    alert("Deleted Failed!");
                }
            },
            error: function(xhr, ajaxOptions, thrownError){
                alert(thrownError);
            }
        });
    }
}

var deleteAfterAddInOrder =(id)=>{
    $.ajax({
        type: "POST",
        url: "./source/router.php",
        data: {choice: 'doDeleteCartQuery', ID:id},
        success: function(data){
            if(data == 200){
                window.location.href = "./dashCartTable.php";
            }else{
                alert("Deleted Failed!");
            }
        },
        error: function(xhr, ajaxOptions, thrownError){
            alert(thrownError);
        }
    });
}

function onAddToOrder(title, total, qt){
    $.ajax({
      type: "POST",
      url: "./source/router.php",
      data: {choice:'doInsertOrder',title:title, total_price:total, Qt:qt, address:$('#addressOrder').val(), P_method:$('#paymentOrder').val(),status:1},
      success: function(data){
        location.reload();
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
        data: {choice: 'doCartTableToOrder', Item:id},
        success: function(data){
        var json = JSON.parse(data);
        str = "";
        json.forEach(element => {
            // str = element.product_id;
            str = `
                <div class="row border d-flex justify-content-center">
                    <div class="col-10">
                        <label for="">Address</label>
                        <div class="input-group-sm">
                                <input type="text" class="form-control" name="addressOrder" id="addressOrder" required>
                        </div>
                        <label for="">Payment Method</label>
                        <div class="input-group-sm">
                            <select name="paymentOrder" id="paymentOrder" required>
                                <option value="COD">Cash On Delivery</option>
                                <option value="gcash">Gcash</option>
                            </select>
                        </div>
                        <div class="d-flex justify-content-center">
                            <button type="button" class="btn btn-primary col-5 mt-3" id="sadsadsad" onclick="onAddToOrder('${element.title}', '${element.total_price}', '${element.Qt}'); deleteAfterAddInOrder(${element.id})">Place Order</button>
                        </div>
                    </div>
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