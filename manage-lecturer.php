<?php
      include('include/header.php');
      include('include/sidebar.php');
	  include('controllers/lecturer.php');

	   $obj = new lecturer(); // class object

	   // insert record
	  if(isset($_POST['btn']))
	  {
		$groupId = $_POST['group'];
		$name = $_POST['name'];
		$email = $_POST['email'];
		$password = $_POST['password'];
		$date = $_POST['date'];
        $result = $obj->add($groupId,$name , $email,$password,$date);
		if($result)
		{
			echo "<script>alert('Lectures added SuccessFully')</script>";
		}else{
			echo "<script>alert('Something went wrong, try again')</script>";
		}
	  }

      
	  

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
                            <h4>Add/View Lectures</h4>
                        </div>
                    </div>
                  
                </div>
				
				<div class="row">
					<div class="col-xl-12 col-xxl-12 col-sm-12">
                        <div class="card">
                            <div class="card-header">
								<h5 class="card-title">Lecturer Info</h5>
							</div>
							<div class="card-body">
                                <form  method="post">
									<div class="row">
									   <div class="col-lg-6 col-md-6 col-sm-12">
											<div class="form-group">
												<label class="form-label">Select Group</label>
												<select required name="group" id="" class="form-control">
													<option value="" selected disabled>Select Group</option>
													<?php
													    $fetchGroup = $obj->getGroup();
                                                        while($list = mysqli_fetch_assoc($fetchGroup))
														{?>
                                                            <option value="<?php echo $list['id']; ?>"><?php echo $list['name'].$list['code'] ?></option>
														<?php }
													 ?>
												</select>
											</div>
										</div>
									
										<div class="col-lg-6 col-md-6 col-sm-12">
											<div class="form-group">
												<label class="form-label">Lecturer Name</label>
												<input type="text" required class="form-control" name="name">
											</div>
										</div>
										<div class="col-lg-6 col-md-6 col-sm-12">
											<div class="form-group">
												<label class="form-label">Email</label>
												<input type="email" required class="form-control" name="email">
											</div>
										</div>
                                        <div class="col-lg-6 col-md-6 col-sm-12">
											<div class="form-group">
												<label class="form-label">Password</label>
												<input type="password" required class="form-control" name="password">
											</div>
										</div>
                                        <div class="col-lg-6 col-md-6 col-sm-12">
											<div class="form-group">
												<label class="form-label">Joining Date</label>
												<input type="date" required class="form-control" name="date">
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
										<h4 class="card-title">All Lectures  </h4>
									</div>
									<div class="card-body">
										<div class="table-responsive">
											<table id="example5" class="display" style="min-width: 845px">
												<thead>
													<tr>
														<th>#</th>
                                                        <th>Group Name</th>
														<th>Lecturer Name</th>
														<th>Email</th>
														<th>Password</th>
														<th>Action</th>
													</tr>
												</thead>
												<tbody>
													
													<?php
														$data = $obj->fetch();
                                                        $sno =0;
                                                       while($list = mysqli_fetch_assoc($data))
													   {   ?>
														 <tr>
															<td><?php echo ++$sno; ?></td>
															<td><?php echo $list['groupName'].$list['code']?></td>
															<td><?php echo $list['name']; ?></td>
															<td><?php echo $list['email']; ?></td>
															<td><?php echo $list['password']; ?></td>
															<td>
																<a href="edit-lectures.php?id=<?php echo $list['id'] ?>" class="btn btn-sm btn-primary"><i class="la la-pencil"></i></a>
																<a href="delete-lecturer.php?id=<?php echo $list['id'] ?>" class="btn btn-sm btn-danger"><i class="la la-trash-o"></i></a>
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