<?php
      include('include/header.php');
      include('include/sidebar.php');
	  include('controllers/student.php');

     $obj = new student();
     $id = $_SESSION['student'];
	 $data = $obj->studentbyId($id);
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
                            <h4>View Students Grade</h4>
                        </div>
                    </div>
                  
                </div>
				
			
				<div class="row">
					
					<div class="col-lg-12">
						<div class="row tab-content">
							<div id="list-view" class="tab-pane fade active show col-lg-12">
								<div class="card">
									<div class="card-header">
										<h4 class="card-title">Students Grade  </h4>
									</div>
									<div class="card-body">
										<div class="table-responsive">
											<table id="example5" class="display" style="min-width: 845px">
												<thead>
													<tr>
														<th>#</th>
														<th>Subject</th>
                                                        <th>Grade</th>
													
													</tr>
												</thead>
												<tbody>
													<?php
                                                       $sno =0;
													   while($row = mysqli_fetch_assoc($data))
													   {?>
                                                         <tr>
															<td><?php echo ++$sno; ?></td>
															<td><?php echo $row['subjectName'].$row['subjectCode']?></td>
                                                            <td><?php echo $row['grade']?></td>
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