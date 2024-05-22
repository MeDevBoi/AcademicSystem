<?php
      include('include/header.php');
      include('include/sidebar.php');
	  include('controllers/student.php');

     $obj = new student();
	 $data = $obj->assignedStudent();
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
                            <h4>View Assigned Students</h4>
                        </div>
                    </div>
                  
                </div>
				
			
				<div class="row">
					
					<div class="col-lg-12">
						<div class="row tab-content">
							<div id="list-view" class="tab-pane fade active show col-lg-12">
								<div class="card">
									<div class="card-header">
										<h4 class="card-title">Assigned Students  </h4>
									</div>
									<div class="card-body">
										<div class="table-responsive">
											<table id="example5" class="display" style="min-width: 845px">
												<thead>
													<tr>
														<th>#</th>
														<th>Group</th>
                                                        <th>Student Name</th>
														<th>Subject</th>
													
													</tr>
												</thead>
												<tbody>
													<?php
                                                       $sno =0;
													   while($row = mysqli_fetch_assoc($data))
													   {?>
                                                         <tr>
															<td><?php echo ++$sno; ?></td>
															<td><?php echo $row['groupName'].$row['groupCode']?></td>
															<td><?php echo $row['studentName']?></td>
															<td><?php echo $row['subjectName']?></td>
															<td><a href="delete-student.php?id=<?php echo $row['id'] ?>" class="btn btn-sm btn-danger"><i class="la la-trash-o"></i></a></td>
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