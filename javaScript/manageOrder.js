$(document).ready(function(){
    viewMyOrder();
});

var viewMyOrder =()=>{
    $.ajax({
        type: "POST",
        url: "userDashboardSource/router.php",
        data: {choice: 'doGetAllDataUserManageOrdered'},
        success: function(data){
            var json = JSON.parse(data);
            var str = "";
            json.forEach(element => {
                str +=
                `
                    <tr>
                        <th scope="row">${element.username}</th>
                        <td>${element.title}</td>
                        <td>${element.price}</td>
                        <td>${element.total_price}</td>
                        <td>${element.Qt}</td>
                        <td>${element.image}</td>
                        <td>${element.d_ordered}</td>
                        <td>${element.d_delivered}</td>
                        <td>${element.p_method}</td>
                        <td>
                            <button type="button" class="btn btn-sm btn-primary" onclick="approveOrder(${element.id})">Approve Order</button>
                        </td>
                    </tr>
                `;
            });
            $('#manageOrderTable').append(str);
        },
        error: function(xhr, ajaxOptions, thrownError){
            alert(thrownError);
        }
    });
}
