<?php
      include('include/header.php');
      include('include/sidebar.php');
	  include('controllers/lecturer.php');

	   $obj = new lecturer(); // class object

        $id = $_GET['id'];
        $data =$obj->fetchById($id);
        $result = mysqli_fetch_assoc($data);
	   // insert record
	  if(isset($_POST['btn']))
	  {
	    $groupId = $_POST['group'];
		$name = $_POST['name'];
		$email = $_POST['email'];
		$password = $_POST['password'];
        $result = $obj->edit($id,$groupId, $name, $email, $password);
		if($result)
		{
		  echo "<script>alert('Lecturer edit SuccessFully')</script>";
		  echo "<script>location.href='manage-lecturer.php'</script>";
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
                            <h4>Edit Lecturer</h4>
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
													<option value="<?php echo $result['groupId']?>" selected ><?php echo $result['groupName'].$result['code']; ?></option>
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
												<input type="text" value="<?php echo $result['name']?>" required class="form-control" name="name">
											</div>
										</div>
										<div class="col-lg-6 col-md-6 col-sm-12">
											<div class="form-group">
												<label class="form-label">Email</label>
												<input type="email" required value="<?php echo $result['email']?>" class="form-control" name="email">
											</div>
										</div>
                                        <div class="col-lg-6 col-md-6 col-sm-12">
											<div class="form-group">
												<label class="form-label">Password</label>
												<input type="password" value="<?php echo $result['password']?>" required class="form-control" name="password">
											</div>
										</div>
                                     
										<div class="col-lg-12 col-md-12 col-sm-12">
											<button type="submit" name="btn" class="btn btn-primary">Save Changes</button>
										</div>
									</div>
								</form>
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