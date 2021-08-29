	<!-- Sidebar -->
    <div class="sidebar sidebar-style-2">
			
			<div class="sidebar-wrapper scrollbar scrollbar-inner">
				<div class="sidebar-content">
						<div class="user">
						<div class="avatar-sm float-left mr-2">
							 <img src="<?php $image_src2 = $row['logoname']; echo "upload/".$image_src2.""; ?> " class="avatar-img rounded-circle" alt="...">
						</div>
					<div class="info">
							<a data-toggle="collapse" href="#collapseExample" aria-expanded="true">
								<span>
									SCORE
									<span class="user-level">Administrator</span>
									<span class="caret"></span>
								</span>
							</a>
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
							<a href="index.php">
								<i class="fas fa-home"></i>
								<p>Dashboard</p>
								
							</a>
							
						</li>  -->
						
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
							<li class="nav-item sub-menu" id="user" >
							<a data-toggle="collapse" href="#charts">
								<i class="far fa-user"></i>
								<p>Users</p>
								<span class="caret"></span>
							</a>
							<div class="collapse" id="charts">
								<ul class="nav nav-collapse ">
									<li class="user1">
										<a href="users.php">
											<span class="sub-item">Active Users</span>
										</a>
									</li>
									<li class="user2">
										<a href="inactive.php">
											<span class="sub-item">Inactive Users</span>
										</a>
									</li>
								</ul>
							</div>
						</li>
						
								<li class="nav-item">
							<a href="companies.php">
								<i class="fas fa-briefcase"></i>
								<p>Customers</p>
								
							</a>
						</li>
					
						
								<li class="nav-item">
							<a href="reports.php">
								<i class="fas fa-file-upload"></i>
								<p>Uploaded Documents</p>
								
							</a>
						</li>
						
								<li class="nav-item">
							<a href="generate.php">
								<i class="fas fa-file-download"></i>
								<p>Generate Report</p>
								
							</a>
						</li>
						
						
						
						<li class="nav-section">
							<span class="sidebar-mini-icon">
								<i class="fa fa-ellipsis-h"></i>
							</span>
							<h4 class="text-section">Configurations</h4>
						</li>
						
						<li class="nav-item">
							<a  href="services.php">
								<i class="fas fa-layer-group"></i>
								<p>Products / Services</p>
								
							</a>
							
						</li>
						
								<li class="nav-item">
							<a  href="branch.php">
								<i class="fas fa-map-marker-alt"></i>
								<p>Branches</p>
								
							</a>
							
					</li>
						<li class="nav-item">
							<a  href="cities.php">
								<i class="fas fa-globe"></i>
								<p>Cities</p>
								
							</a>
							
						</li>
				
						<li class="nav-item">
							<a href="designation.php">
								<i class="fa fa-id-card"></i>
								<p>Designations</p>
							
							</a>
						</li>
					
						
						<li class="nav-item">
							<a href="company_types.php">
								<i class="fas fa-folder"></i>
								<p>Customer Types</p>
								
							</a>
						</li>
						
							<li class="nav-item">
							<a href="settings.php">
								<i class="fas fa-wrench"></i>
								<p>Mail Settings</p>
							</a>
						</li>
						
					</ul>
				</div>
			</div>
		</div>