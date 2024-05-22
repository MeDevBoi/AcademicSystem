<?php
      include('include/header.php');
      include('include/sidebar.php');

	  include('controllers/student.php');


	  $obj = new student(); // class object


	   // insert record
	   if(isset($_POST['btn']))
	   {
		 $group = $_POST['group'];
		 $student = $_POST['student'];
		 $subject = $_POST['subject'];
		 $grade = $_POST['grade'];
		 $result = $obj->assignGrade($group, $student,$subject , $grade);
		 if($result)
		 {
			 echo "<script>alert('Grade Assigned SuccessFully')</script>";
			 echo "<script>location.href='assign-grade.php'</script>";
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
                            <h4>Assign Grade</h4>
                        </div>
                    </div>
                  
                </div>
				
				<div class="row">
					<div class="col-xl-12 col-xxl-12 col-sm-12">
                        <div class="card">
                            <div class="card-header">
								<h5 class="card-title">Grade Info</h5>
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
                                                       $group = $_SESSION['group'];
													    $fetchGroup = $obj->groupId($group);
                                                        
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
												<label class="form-label">Select Student</label>
												<select name="student" id="student" class="form-control">
												    <option value="">Select Student</option>
												    
												</select>
											</div>
										</div>
                                        <div class="col-lg-6 col-md-6 col-sm-12">
											<div class="form-group">
												<label class="form-label">Select Grade</label>
												<select required name="grade" id="grade" class="form-control">
												    <option value="">Select Lecturer</option>
                                                    <option value="A">A</option>
                                                    <option value="B">B</option>
                                                    <option value="C">C</option>
                                                    <option value="D">D</option>
                                                    <option value="E">E</option>
                                                    <option value="F">F</option>
												    
												</select>
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
					updateSelect('get-student.php', '#student', 'Select Student');
					updateSelect('get-subject.php', '#subject', 'Select Subject');
				});
			});
		
		</script>


</body>
</html>