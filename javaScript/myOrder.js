$(document).ready(function(){
    viewMyOrder();
});

var viewMyOrder =()=>{
    $.ajax({
    type: "POST",
    url: "userDashboardSource/router.php",
    data: {choice: 'doGetAllDataUserOrdered'},
    success: function(data){
        var json = JSON.parse(data);
        var str = "";
        json.forEach(element => {
            str +=
            `
                <tr>
                    <th scope="row">${element.lname}, ${element.fname}</th>
                    <td>${element.title}</td>
                    <td>${element.total_price}</td>
                    <td>${element.Qt}</td>
                    <td>${element.address}</td>
                    <td>${element.D_ordered}</td>
                    <td>${element.D_deliver}</td>
                    <td>${element.P_method}</td>
                    <td>
                        <button type="button" class="btn btn-sm btn-danger" onclick="cancelOrder(${element.id})">Cancel Order</button>
                    </td>
                </tr>
            `;
        });
        $('#addTableToAppend').append(str);
    },
    error: function(xhr, ajaxOptions, thrownError){
        alert(thrownError);
    }
    });
}
