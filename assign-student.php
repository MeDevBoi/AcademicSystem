<?php
      include('include/header.php');
      include('include/sidebar.php');

	  include('controllers/student.php');


	  $obj = new student(); // class object

	  $data = $obj->pendingStudent();

	   // insert record
	   if(isset($_POST['btn']))
	   {
		 $group = $_POST['group'];
		 $lecturer = $_POST['lecturer'];
		 $subject = $_POST['subject'];
		 $student = $_POST['student'];
		 $result = $obj->add($group, $lecturer,$subject , $student);
		 if($result)
		 {
			 echo "<script>alert('Student Assigned SuccessFully')</script>";
			 echo "<script>location.href='assign-student.php'</script>";
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
                            <h4>Assign Students</h4>
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
                                <form  method="post">
									<div class="row">
									    <div class="col-lg-6 col-md-6 col-sm-12">
									       <div class="form-group">
												<label class="form-label">Select Group</label>
												<select name="group" id="group" class="form-control">
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
												<label class="form-label">Select Subject</label>
												<select name="subject" id="subject" class="form-control">
												    <option value="">Select Subject</option>

													
												</select>
											</div>
										</div>
										<div class="col-lg-6 col-md-6 col-sm-12">
											<div class="form-group">
												<label class="form-label">Select lecturer</label>
												<select name="lecturer" id="lecturer" class="form-control">
												    <option value="">Select Lecturer</option>
												    
												</select>
											</div>
										</div>
										<div class="col-12 mt-2 mb-2">
											<h4>Select Students</h4>
											<div class="row">
												<?php
                                                   while($list = mysqli_fetch_assoc($data))
												   {?>
                                                       <div class="col-lg-2 col-md-3 col-sm-4">
														
													     <input type="checkbox" class="mr-1" value="<?php echo $list['id']; ?>"  name="student[]" id=""><?php echo $list['name']; ?>
												        </div>
												  <?php }
												?>
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
		
            </div>
        </div>
        <!--**********************************
            Content body end
        ***********************************-->


        <?php include('include/footer.php') ?>
		<script>
			$(document).ready(function() {
				$('#group').change(function() {
					var id = $(this).val();

					// Function to handle AJAX requests and update the select element
					function updateSelect(url, selectId, defaultText) {
						$.ajax({
							url: url,
							method: 'GET',
							data: { id: id },
							dataType: 'json',
							success: function(data) {
								var select = $(selectId);
								select.empty();

								// Add the default option
								var defaultOption = $('<option></option>').val('').text(defaultText).prop('selected', true).prop('disabled', true);
								select.append(defaultOption);

								// Add the rest of the options from the data
								$.each(data, function(index, item) {
									
									var option = $('<option></option>').val(item.id).text(item.name);
									select.append(option);
								});
							}
						});
					}

					// Call the function for both AJAX requests
					updateSelect('get-lecturer.php', '#lecturer', 'Select Lecturer');
					updateSelect('get-subject.php', '#subject', 'Select Subject');
				});
			});
		
		</script>


</body>
</html>