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
b				<div class="box-body table-responsive">
					<table id="example1" class="table table-bordered table-hover table-striped">
						<thead>
							<tr>
								<th width="10">#</th>
								<th width="180">First Name</th>
								<th width="180">Last name</th>
								<th width="180">User Name</th>
								<th width="150">Email</th>
								<th width="180">Address</th>
								<th>Status</th>
								<th width="150">Date Create</th>
								<th width="100">Change Status</th>
								<th width="100">Action</th>
							
							</tr>
						</thead>
						<tbody>
							
							<?php
							
							$i=0;
							$statement = $pdo->prepare("SELECT * FROM user ");
							$statement->execute();
							$result = $statement->fetchAll(PDO::FETCH_ASSOC);						
							foreach ($result as $row) {
								$i++;
								?>

								<tr class="<?php if($row['status']==1) {echo 'bg-g';}else {echo 'bg-r';} ?>">
									<td><?php echo $i; ?></td>
									<td><?php echo $row['fname']; ?></td>
									<td><?php echo $row['lname']; ?></td>
									<td><?php echo $row['username']; ?></td>
									<td><?php echo $row['email']; ?></td>
									<td><?php echo $row['address']; ?><br></td>
									<td><?php if($row['status']==1) {echo 'Active';} else {echo 'Inactive';} ?></td>
									<td><?php echo $row['date']; ?></td>
									<td>
										<a href="user-change-status.php?id=<?php echo $row['user_id']; ?>" class="btn btn-success btn-xs">Change Status</a>
									</td>

									<td>
										<a href="#" class="btn btn-danger btn-xs" data-href="user-delete.php?id=<?php echo $row['user_id']; ?>" data-toggle="modal" data-target="#confirm-delete">Delete</a>
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
                <p>Are you sure want to delete this User?</p>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">Cancel</button>
                <a class="btn btn-danger btn-ok">Delete</a>
            </div>
        </div>
    </div>
</div>


<?php include('footer.php'); ?>