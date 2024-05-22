<?php
      include('include/header.php');
      include('include/sidebar.php');
	  include('controllers/subject.php');

      $id = $_GET['id'];
	  $obj = new subject(); // class object
	  
	   // insert record
	   if(isset($_POST['btn']))
	   {
		 $group = $_POST['group'];
		 $lecturer = $_POST['lecturer'];
		 $name = $_POST['name'];
		 $code = $_POST['code'];
		 $result = $obj->edit($id,$group, $lecturer,$name , $code);
		 if($result)
		 {
			 echo "<script>alert('Subject Edit SuccessFully')</script>";
			 echo "<script>location.href='manage-subject.php'</script>";
		 }else{
			 echo "<script>alert('Something went wrong, try again')</script>";
		 }
	   }
 
	   // fetch record
	   $data = $obj->fetchbyId($id);
       $row = mysqli_fetch_assoc($data);
	  
 ?>
        <div class="content-body">
            <!-- row -->
            <div class="container-fluid">
				    
                <div class="row page-titles mx-0">
                    <div class="col-sm-6 p-md-0">
                        <div class="welcome-text">
                            <h4>Add/View Subject</h4>
                        </div>
                    </div>
                  
                </div>
				
				<div class="row">
					<div class="col-xl-12 col-xxl-12 col-sm-12">
                        <div class="card">
                            <div class="card-header">
								<h5 class="card-title">Subject Info</h5>
							</div>
							<div class="card-body">
                                <form action="#" method="post">
									<div class="row">
									   <div class="col-lg-6 col-md-6 col-sm-12">
											<div class="form-group">
												<label class="form-label">Select Group</label>
												<select name="group" id="group" class="form-control">
												<option value="<?php echo $row['group_id'] ?>" selected ><?php echo $row['groupName'].$row['groupCode'] ?></option>
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
												<label class="form-label">Select lecturer</label>
												<select name="lecturer" id="lecturer" class="form-control">
												<option value="<?php echo $row['lecturer_id'];?>" selected ><?php echo $row['lecturerName'];?></option>
													
												</select>
											</div>
										</div>
										<div class="col-lg-6 col-md-6 col-sm-12">
											<div class="form-group">
												<label class="form-label">Subject Name</label>
												<input type="text" value="<?php echo $row['name'];?>" class="form-control" name="name" id="name">
											</div>
										</div>
										<div class="col-lg-6 col-md-6 col-sm-12">
											<div class="form-group">
												<label class="form-label">Subject Code</label>
												<input type="text" value="<?php echo $row['code'];?>" class="form-control" name="code" id="code">
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
        <script>
			$(document).ready(function(){
				$('#group').change(function(){
					var id = $(this).val();
					
					$.ajax({
						url: 'get-lecturer.php',
						method: 'GET',
						data: {id: id},
						dataType: 'json',
						success: function(data) {
						var select = $('#lecturer');
						select.empty();

						// Add the default "Select Lecturer" option
						var defaultOption = $('<option></option>').val('').text('Select Lecturer').prop('selected', true).prop('disabled', true);
						select.append(defaultOption);

						// Add the rest of the options from the data
						$.each(data, function(index, item) {
							var option = $('<option></option>').val(item.id).text(item.name);
							select.append(option);
						});
					},

						error: function(xhr, status, error) {
							console.error('AJAX Error: ' + status + ' ' + error);
						}
					});
				});
			});
	
       </script>
	  


</body>
</html>