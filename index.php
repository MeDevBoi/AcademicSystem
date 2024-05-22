<?php
      include('include/header.php');
      include('include/sidebar.php');
      include('controllers/report.php');

      $obj = new report();


 ?>

        <!--**********************************
            Content body start
        ***********************************-->
        <div class="content-body">
            <!-- row -->
            <div class="container-fluid">
            <div class="row">
					<div class="col-xl-3 col-xxl-3 col-sm-6">
						<div class="widget-stat card bg-primary overflow-hidden">
							<div class="card-header">
								<h3 class="card-title text-white">Total Groups</h3>
								<h5 class="text-white mb-0"><i class="fa fa-caret-up"></i> 
                                <?php
                                    $group = $obj->totalgroups();
                                    $rowGroup = mysqli_fetch_assoc($group);

                                    echo $rowGroup['COUNT(id)'];
                                 ?>

                            </h5>
							</div>
							<div class="card-body text-center mt-3">
								<div class="ico-sparkline">
									<div id="sparkline12"></div>
								</div>
							</div>
						</div>
					</div>
					<div class="col-xl-3 col-xxl-3 col-sm-6">
						<div class="widget-stat card bg-success overflow-hidden">
							<div class="card-header">
								<h3 class="card-title text-white">Total Lecturers</h3>
								<h5 class="text-white mb-0"><i class="fa fa-caret-up"></i> 
                                <?php
                                    $lecturer = $obj->totalLecturers();
                                    $rowLecturer = mysqli_fetch_assoc($lecturer);

                                    echo $rowLecturer['COUNT(id)'];
                                 ?>
                            </h5>
							</div>
							<div class="card-body text-center mt-4 p-0">
								<div class="ico-sparkline">
									<div id="spark-bar-2"></div>
								</div>
							</div>
						</div>
					</div>
					<div class="col-xl-3 col-xxl-3 col-sm-6">
						<div class="widget-stat card bg-secondary overflow-hidden">
							<div class="card-header pb-3">
								<h3 class="card-title text-white">Total Students</h3>
								<h5 class="text-white mb-0"><i class="fa fa-caret-up"></i> 
                                <?php
                                    $student = $obj->totalStudents();
                                    $rowStudent = mysqli_fetch_assoc($student);

                                    echo $rowStudent['COUNT(id)'];
                                 ?>
                            </h5>
							</div>
							
						</div>
					</div>
					<div class="col-xl-3 col-xxl-3 col-sm-6">
						<div class="widget-stat card bg-danger overflow-hidden">
							<div class="card-header pb-3">
								<h3 class="card-title text-white">Total Subjects</h3>
								<h5 class="text-white mb-0"><i class="fa fa-caret-up"></i> 
                                <?php
                                    $subject = $obj->totalsubjects();
                                    $rowSubject = mysqli_fetch_assoc($subject);

                                    echo $rowSubject['COUNT(id)'];
                                 ?>
                            </h5>
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