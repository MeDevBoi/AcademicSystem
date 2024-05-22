<?php
      include('include/header.php');
      include('include/sidebar.php');
	  include('controllers/student.php');

     $obj = new student();
	 $data = $obj->pendingStudent();
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
                            <h4>View Pending Students</h4>
                        </div>
                    </div>
                  
                </div>
				
			
				<div class="row">
					
					<div class="col-lg-12">
						<div class="row tab-content">
							<div id="list-view" class="tab-pane fade active show col-lg-12">
								<div class="card">
									<div class="card-header">
										<h4 class="card-title">Pending Students  </h4>
									</div>
									<div class="card-body">
										<div class="table-responsive">
											<table id="example5" class="display" style="min-width: 845px">
												<thead>
													<tr>
														<th>#</th>
                                                        <th>Student Name</th>
														<th>Email</th>
														<th>Password</th>
														<th>Joining Date</th>
														<th>Action</th>
													</tr>
												</thead>
												<tbody>
													<?php
                                                       $sno =0;
													   while($row = mysqli_fetch_assoc($data))
													   {?>
                                                         <tr>
															<td><?php echo ++$sno; ?></td>
															<td><?php echo $row['name']?></td>
															<td><?php echo $row['email']?></td>
															<td><?php echo $row['password']?></td>
															<td><?php echo $row['created_at']?></td>
															<td><a href="delete-pending-student.php?id=<?php echo $row['id'] ?>" class="btn btn-sm btn-danger"><i class="la la-trash-o"></i></a></td> 
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