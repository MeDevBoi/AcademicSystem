<?php
      include('include/header.php');
      include('include/sidebar.php');
	  include('controllers/group.php');

	   $obj = new group(); // class object

       //gettting data
       $id = $_GET['id'];
       $data = $obj->groupBYId($id);
       $result = mysqli_fetch_assoc($data);

	   // edit record
	  if(isset($_POST['btn']))
	  {
		$name = $_POST['name'];
		$code = $_POST['code'];
        $result = $obj->edit($id , $name , $code);
		if($result)
		{
			echo "<script>alert('Group Edit SuccessFully')</script>";
            echo "<script>location.href='manage-group.php'</script>";
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
                            <h4>Edit Groups</h4>
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
												<input type="text" value="<?php echo $result['name'] ?>" required class="form-control" name="name">
											</div>
										</div>
										<div class="col-lg-6 col-md-6 col-sm-12">
											<div class="form-group">
												<label class="form-label">Group Code</label>
												<input type="text" value="<?php echo $result['code'] ?>" required class="form-control" name="code">
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
