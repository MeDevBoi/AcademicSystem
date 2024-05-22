<?php
      include('include/header.php');
      include('include/sidebar.php');
	  include('controllers/group.php');

	   $obj = new group(); // class object

	   // insert record
	  if(isset($_POST['btn']))
	  {
		$name = $_POST['name'];
		$code = $_POST['code'];
        $result = $obj->add($name , $code);
		if($result)
		{
			echo "<script>alert('Group added SuccessFully')</script>";
		}else{
			echo "<script>alert('Something went wrong, try again')</script>";
		}
	  }

	  // fetch record
	  $data = $obj->fetch();
	  
 ?>
        <!--**********************************
            Sidebar end
        ***********************************-->

		
		
        <!--**********************************
            Content body start
        ***********************************-->
        <div class="content-body">
            <!-- row -->
            <div class="container-fluid">
				    
                <div class="row page-titles mx-0">
                    <div class="col-sm-6 p-md-0">
                        <div class="welcome-text">
                            <h4>Add/View Groups</h4>
                        </div>
                    </div>
                  
                </div>
				
				<div class="row">
					<div class="col-xl-12 col-xxl-12 col-sm-12">
                        <div class="card">
                            <div class="card-header">
								<h5 class="card-title">Group Info</h5>
							</div>
							<div class="card-body">
                                <form  method="post">
									<div class="row">
									  
										<div class="col-lg-6 col-md-6 col-sm-12">
											<div class="form-group">
												<label class="form-label">Group Name</label>
												<input type="text" required class="form-control" name="name">
											</div>
										</div>
										<div class="col-lg-6 col-md-6 col-sm-12">
											<div class="form-group">
												<label class="form-label">Group Code</label>
												<input type="text" required class="form-control" name="code">
											</div>
										</div>
										
										<div class="col-lg-12 col-md-12 col-sm-12">
											<button type="submit" name="btn" class="btn btn-primary">Save Record</button>
										</div>
									</div>
								</form>
                            </div>
                        </div>
                    </div>
				</div>
				<div class="row">
					
					<div class="col-lg-12">
						<div class="row tab-content">
							<div id="list-view" class="tab-pane fade active show col-lg-12">
								<div class="card">
									<div class="card-header">
										<h4 class="card-title">All Groups  </h4>
									</div>
									<div class="card-body">
										<div class="table-responsive">
											<table id="example5" class="display" style="min-width: 845px">
												<thead>
													<tr>
														<th>#</th>
														<th>Group Name</th>
														<th>Group Code</th>
														<th>Action</th>
													</tr>
												</thead>
												<tbody>
											   <?php
											      $sno = 0; 
											      while($row = mysqli_fetch_assoc($data))
												  {?>
                                                    	<tr>
														<td><?php echo  ++$sno ?></td>
														<td><?php echo $row['name'] ?></td>
														<td><?php echo $row['code'] ?></td>
														
														<td>
															<a href="edit-group.php?id=<?php echo $row['id'] ?>" class="btn btn-sm btn-primary"><i class="la la-pencil"></i></a>
															<a href="delete-group.php?id=<?php echo $row['id'] ?>" class="btn btn-sm btn-danger"><i class="la la-trash-o"></i></a>
														</td>												
													</tr>
												 <?php }
											   
											   ?>
												
												
											
												</tbody>
											</table>
										</div>
									</div>
                                </div>
                            </div>
							
						</div>
					</div>
				</div>
            </div>
        </div>
        <!--**********************************
            Content body end
        ***********************************-->


        <?php include('include/footer.php') ?>


</body>
</html>
