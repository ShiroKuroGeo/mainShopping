<?php include('header.php'); ?>

<section class="content-header">
	<div class="content-header-left">
		<h1>View Customers</h1>
	</div>
</section>

<section class="content">
	<div class="row">
		<div class="col-md-12">
			<div class="box box-info">
				<div class="box-body table-responsive">
					<table id="example1" class="table table-bordered table-hover table-striped">
						<thead>
						<tr>
								<th width="10">#</th>
								<th>Photo</th>
								<th width="220">Product Name</th>
								<th width="70">Price</th>
 								<th width="70">Quantity</th>
								<th>Status</th>
								<th width="100">Change Status</th>
								<th width="90">Date & Time</th>
								<th>Category</th>
 								<th width="80">Action</th>
 							</tr>
						</thead>
						<tbody>
							<?php
							$i=0;
							$statement = $pdo->prepare("SELECT t1.product_id, t1.title, t1.price, t1.qty, t1.image_1, t1.date, t1.status, t1.category,
        												t2.id, t2.category_title FROM products t1 JOIN category t2 ON t1.category = t2.id ORDER BY product_id DESC ");														
							
							$statement->execute();
							 $result = $statement->fetchAll(PDO::FETCH_ASSOC); 
							 foreach ($result as $row) {
								 $i++;
								 ?>
								<tr class="<?php if($row['status']==1) {echo '';}else {echo 'bg-r';} ?>">
									<td><?php echo $i; ?></td>
									<td style="width:82px;"><img src="../images/<?php echo $row['image_1']; ?>" alt="<?php echo $row['title']; ?>" style="width:80px;"></td>
									<td><?php echo $row['title']; ?></td>
									<td>₱<?php echo $row['price']; ?></td>
									<td><?php echo $row['qty']; ?></td> 
									<td>
										<?php if($row['status']==1) {echo 'Post';} else {echo 'Pending';} ?></td>
									<td>
										<a href="product-change-status.php?id=<?php echo $row['product_id']; ?>" class="btn btn-success btn-xs">Change Status</a>
									</td>
									<td>
										<?php echo $row['date']; ?>
						         	</td>
									<td>
										<?php echo $row['category_title']; ?>
									</td>
						  			<td>										
										<a href="#" class="btn btn-danger btn-xs" data-href="product-delete.php?id=<?php echo $row['product_id']; ?>" data-toggle="modal" data-target="#confirm-delete">Delete</a>  
									</td> 
								</tr>
								<?php
							}
							?>							
						</tbody>
					</table>
				</div>
			</div>
		</div>
	</div>


</section>


<div class="modal fade" id="confirm-delete" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                <h4 class="modal-title" id="myModalLabel">Delete Confirmation</h4>
            </div>
            <div class="modal-body">
                <p>Are you sure want to delete this Product?</p>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">Cancel</button>
                <a class="btn btn-danger btn-ok">Delete</a>
            </div>
        </div>
    </div>
</div>


<?php include('footer.php'); ?>