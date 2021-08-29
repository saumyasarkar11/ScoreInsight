	<!-- Sidebar -->
    <div class="sidebar sidebar-style-2">
			
			<div class="sidebar-wrapper scrollbar scrollbar-inner">
				<div class="sidebar-content">
						<div class="user">
						<div class="avatar-sm float-left mr-2">
							 <img src="<?php $image_src2 = $row['logoname']; echo "../admin/upload/".$image_src2.""; ?> " class="avatar-img rounded-circle" alt="...">
						</div>
					<div class="info">
							<a data-toggle="collapse" href="#collapseExample" aria-expanded="true">
								<span>
									SCORE
									<span class="user-level">User</span>
									<span class="caret"></span>
								</span>
							</a>
							<div class="clearfix"></div>

							<div class="collapse in" id="collapseExample">
								<ul class="nav">
									<li>
										<a href="profile.php">
											<span class="link-collapse">My Profile</span>
										</a>
									</li>
								
									<li>
										
									</li>
								</ul>
							</div>
						</div>
					</div>   


					<ul class="nav nav-primary" id="nav">
					<!--	<li class="nav-item">
							<a href="index.html">
								<i class="fas fa-home"></i>
								<p>Dashboard</p>
								
							</a>
							
						</li>   -->
						
						<li class="nav-item" id="prospect">
							<a data-toggle="collapse" href="#base">
								<i class="fas fa-file"></i>
								<p>Prospects</p>
								<span class="caret"></span>
							</a>
							<div class="collapse" id="base">
								<ul class="nav nav-collapse">
									<li class="p1">
										<a href="overview.php">
											<span class="sub-item">Overview</span>
										</a>
									</li>
									<li class="p2">
										<a href="unsure.php">
											<span class="sub-item">New Prospects</span>
										</a>
									</li>
									<li class="p3">
										<a href="open.php">
											<span class="sub-item">Open Prospects</span>
										</a>
									</li>
									<li class="p4">
										<a href="wip.php">
											<span class="sub-item">Work In Progress (WIP)</span>
										</a>
									</li>
									<li class="p5">
										<a href="closed.php">
											<span class="sub-item">Closed Prospects</span>
										</a>
									</li>
									
									
								</ul>
							</div>
						</li>
							<li class="nav-item" id="user" >
							<a href="users.php">
								<i class="far fa-user"></i>
								<p>Team Members</p>
							
							</a>
						
						</li>
					
							<li class="nav-item">
							<a href="companies.php">
								<i class="fas fa-briefcase"></i>
								<p>Customers</p>
								</a>
						</li>
						
							<li class="nav-item">
							<a href="report.php">
								<i class="fas fa-upload"></i>
								<p>Uploads</p>
								</a>
						</li>
						
						<li class="nav-item">
							<a href="generate.php">
								<i class="fas fa-download"></i>
								<p>Generate Report</p>
								</a>
						</li>
						
						
					</ul>
				</div>
			</div>
		</div>