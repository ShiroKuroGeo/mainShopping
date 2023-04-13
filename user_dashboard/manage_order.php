<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Customers Order</title>
    <link rel="stylesheet" href="../css/c_order.css">
    <link rel="stylesheet" href="../css/style.css">
    <link rel="stylesheet" href="../css/sell.css">
    <!-- bootstrap -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css">
    <!-- font awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.1/css/all.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.1/css/all.min.css">

</head>
<body>
<div class="container">
    <div class="row">
    <table class="table bg-light">
  <thead>
    <tr>
      <th scope="col">Customer</th>
      <th scope="col">Product name</th>
      <th scope="col">Price</th>
      <th scope="col">total price</th>
      <th scope="col">Qt</th>
      <th scope="col">Image</th>
      <th scope="col">Date Ordered</th>
      <th scope="col">Date Deliver</th>
      <th scope="col">Type of Payment</th>
      <th scope="col">Action</th>
    </tr>
  </thead>
    <tbody id="manageOrderTable">
            
    </tbody>
  </table>
    </div>
</div>
</body>
  <script src="../javaScript/jquery.js"></script>
  <script src="../javaScript/manageOrder.js"></script>
</html>