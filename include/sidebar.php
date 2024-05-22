<?php
          session_start();
          if(isset($_SESSION['admin']))
          {?>
        
        <div class="dlabnav">
            <div class="dlabnav-scroll">
                <ul class="metismenu" id="menu">
                    <li class="nav-label first">Main Menu</li>
                    <li><a class="has-arrow" href="index.php" aria-expanded="false">
							<i class="la la-home"></i>
							<span class="nav-text">Dashboard</span>
						</a>
                       
                    </li>
					
					<li><a class="has-arrow" href="javascript:void()" aria-expanded="false">
							<i class="la la-user"></i>
							<span class="nav-text">Subjects</span>
						</a>
                        <ul aria-expanded="false">
                            <li><a href="manage-subject.php">Manage Subject</a></li>
                            <!-- <li><a href="add-professor.html">Add Professor</a></li>
                            <li><a href="edit-professor.html">Edit Professor</a></li>
                            <li><a href="professor-profile.html">Professor Profile</a></li> -->
                        </ul>
                    </li>
					<li><a class="has-arrow" href="javascript:void()" aria-expanded="false">
							<i class="la la-users"></i>
							<span class="nav-text">Students</span>
						</a>
                        <ul aria-expanded="false">
                            <li><a href="pending-student.php">Pending Students</a></li>
                            <li><a href="assign-student.php">Assign Students</a></li>
                            <li><a href="view-student.php">View Students</a></li>
                        </ul>
                    </li>
					<li><a class="has-arrow" href="javascript:void()" aria-expanded="false">
							<i class="la la-graduation-cap"></i>
							<span class="nav-text">Lecturer</span>
						</a>
                        <ul aria-expanded="false">
                            <li><a href="manage-lecturer.php">Manage Lecturer</a></li>
                          
                        </ul>
                    </li>
					<li><a class="has-arrow" href="javascript:void()" aria-expanded="false">
							<i class="la la-book"></i>
							<span class="nav-text">Groups</span>
						</a>
                        <ul aria-expanded="false">
                            <li><a href="manage-group.php">Manage Group</a></li>
                        </ul>
                    </li>
			
                    
				</ul>
            </div>
        </div>

        <?php  }

        if(isset($_SESSION['student']))
        {?>
           <div class="dlabnav">
            <div class="dlabnav-scroll">
                <ul class="metismenu" id="menu">
                    
					<li><a class="has-arrow" href="javascript:void()" aria-expanded="false">
							<i class="la la-users"></i>
							<span class="nav-text">My Grades</span>
						</a>
                        <ul aria-expanded="false">
                            <li><a href="student-grade.php">View Grades</a></li>
                         
                        </ul>
                    </li>
				
			
                    
				</ul>
            </div>
        </div>

       <?php }

       if(isset($_SESSION['lecturer']))
       {?>
          <div class="dlabnav">
            <div class="dlabnav-scroll">
                <ul class="metismenu" id="menu">
                    <li class="nav-label first">Main Menu</li>
               
					<li><a class="has-arrow" href="javascript:void()" aria-expanded="false">
							<i class="la la-user"></i>
							<span class="nav-text">Manage Grade</span>
						</a>
                        <ul aria-expanded="false">
                            <li><a href="assign-grade.php">Assign Grade</a></li>
                            <li><a href="view-Grade.php">View Grade</a></li>
                           
                        </ul>
                    </li>
					
			
                    
				</ul>
            </div>
        </div>

      <?php }

   ?>