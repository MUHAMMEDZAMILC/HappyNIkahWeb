<div id="app-sidepanel" class="app-sidepanel sidepanel-hidden">
			<div id="sidepanel-drop" class="sidepanel-drop"></div>
			<div class="sidepanel-inner d-flex flex-column">
				<a href="#" id="sidepanel-close" class="sidepanel-close d-xl-none">&times;</a>
				<div class="app-branding">
					<a class="app-logo" href="<?php echo site_url('admin/dashboard'); ?>"><img class="logo-icon me-2" src="<?php echo base_url(); ?>assets/images/logoring.png" alt="logo"><span class="logo-text" style="font-family:Comic Sans MS, Comic Sans, cursive;color:#ef2857;">Happy Nikah</span></a>

				</div>
				<!--//app-branding-->
				<nav id="" class="app-nav app-nav-main flex-grow-1">
					<ul class="app-menu list-unstyled accordion" id="menu-accordion">
						<li class="nav-item">
							<!--//Bootstrap Icons: https://icons.getbootstrap.com/ -->
							<a class="nav-link " href="<?php echo site_url('admin/dashboard'); ?> ">
								<span class="nav-icon">
									<svg width="1em" height="1em" viewBox="0 0 16 16" class="bi bi-house-door" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
										<path fill-rule="evenodd" d="M7.646 1.146a.5.5 0 0 1 .708 0l6 6a.5.5 0 0 1 .146.354v7a.5.5 0 0 1-.5.5H9.5a.5.5 0 0 1-.5-.5v-4H7v4a.5.5 0 0 1-.5.5H2a.5.5 0 0 1-.5-.5v-7a.5.5 0 0 1 .146-.354l6-6zM2.5 7.707V14H6v-4a.5.5 0 0 1 .5-.5h3a.5.5 0 0 1 .5.5v4h3.5V7.707L8 2.207l-5.5 5.5z" />
										<path fill-rule="evenodd" d="M13 2.5V6l-2-2V2.5a.5.5 0 0 1 .5-.5h1a.5.5 0 0 1 .5.5z" />
									</svg>
								</span>
								<span class="nav-link-text">Dashboard</span>
							</a>
							<!--//nav-link-->
						</li>
									
				  <li class="nav-item">
					<!--//Bootstrap Icons: https://icons.getbootstrap.com/ -->
					<a class="nav-link" href="<?php echo site_url('admin/search_profiles') ?>">
						<span class="nav-icon">
							<svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-search-heart" viewBox="0 0 16 16">
								<path d="M6.5 4.482c1.664-1.673 5.825 1.254 0 5.018-5.825-3.764-1.664-6.69 0-5.018Z" />
								<path d="M13 6.5a6.471 6.471 0 0 1-1.258 3.844c.04.03.078.062.115.098l3.85 3.85a1 1 0 0 1-1.414 1.415l-3.85-3.85a1.007 1.007 0 0 1-.1-.115h.002A6.5 6.5 0 1 1 13 6.5ZM6.5 12a5.5 5.5 0 1 0 0-11 5.5 5.5 0 0 0 0 11Z" />
							</svg>
						</span>
						<span class="nav-link-text">Search Profile</span>
					</a>
					<!--//nav-link-->
				</li>
				
					    
            <?php $userdata=$_SESSION["user_type"];?>
            <?php if($userdata!='4' && $userdata!='5' && $userdata!='0')
            {?>	   
            
            <li class="nav-item">
            <!--//Bootstrap Icons: https://icons.getbootstrap.com/ -->
            <a class="nav-link" href="<?php echo site_url('admin/quickcontact'); ?>">
            <span class="nav-icon">
            <svg width="1em" height="1em" viewBox="0 0 16 16" class="bi bi-card-list" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
            <path fill-rule="evenodd" d="M14.5 3h-13a.5.5 0 0 0-.5.5v9a.5.5 0 0 0 .5.5h13a.5.5 0 0 0 .5-.5v-9a.5.5 0 0 0-.5-.5zm-13-1A1.5 1.5 0 0 0 0 3.5v9A1.5 1.5 0 0 0 1.5 14h13a1.5 1.5 0 0 0 1.5-1.5v-9A1.5 1.5 0 0 0 14.5 2h-13z" />
            <path fill-rule="evenodd" d="M5 8a.5.5 0 0 1 .5-.5h7a.5.5 0 0 1 0 1h-7A.5.5 0 0 1 5 8zm0-2.5a.5.5 0 0 1 .5-.5h7a.5.5 0 0 1 0 1h-7a.5.5 0 0 1-.5-.5zm0 5a.5.5 0 0 1 .5-.5h7a.5.5 0 0 1 0 1h-7a.5.5 0 0 1-.5-.5z" />
            <circle cx="3.5" cy="5.5" r=".5" />
            <circle cx="3.5" cy="8" r=".5" />
            <circle cx="3.5" cy="10.5" r=".5" />
            </svg>
            </span>
            <span class="nav-link-text">Quick Profiles</span>
            </a>
            <!--//nav-link-->
            </li>
            <!--//nav-item-->
            <?php }?>
				
            <?php $userdata=$_SESSION["user_type"];?>
            <?php if($userdata!='4' && $userdata!='5')
            {?>
            <?php $user_id5=$this->session->userdata('user_id_admin');?>
            <?php if($user_id5!='2')
            {?>
				<li class="nav-item has-submenu">
					<!--//Bootstrap Icons: https://icons.getbootstrap.com/ -->
					<a class="nav-link submenu-toggle" href="#" data-bs-toggle="collapse" data-bs-target="#submenu-1" aria-expanded="true" aria-controls="submenu-1">
						<span class="nav-icon">
							<!--//Bootstrap Icons: https://icons.getbootstrap.com/ -->
							<svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-person-check" viewBox="0 0 16 16">
								<path d="M12.5 16a3.5 3.5 0 1 0 0-7 3.5 3.5 0 0 0 0 7Zm1.679-4.493-1.335 2.226a.75.75 0 0 1-1.174.144l-.774-.773a.5.5 0 0 1 .708-.708l.547.548 1.17-1.951a.5.5 0 1 1 .858.514ZM11 5a3 3 0 1 1-6 0 3 3 0 0 1 6 0ZM8 7a2 2 0 1 0 0-4 2 2 0 0 0 0 4Z" />
								<path d="M8.256 14a4.474 4.474 0 0 1-.229-1.004H3c.001-.246.154-.986.832-1.664C4.484 10.68 5.711 10 8 10c.26 0 .507.009.74.025.226-.341.496-.65.804-.918C9.077 9.038 8.564 9 8 9c-5 0-6 3-6 4s1 1 1 1h5.256Z" />
							</svg>
						</span>
						<span class="nav-link-text">Approvels</span>
						<span class="submenu-arrow">
							<svg width="1em" height="1em" viewBox="0 0 16 16" class="bi bi-chevron-down" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
								<path fill-rule="evenodd" d="M1.646 4.646a.5.5 0 0 1 .708 0L8 10.293l5.646-5.647a.5.5 0 0 1 .708.708l-6 6a.5.5 0 0 1-.708 0l-6-6a.5.5 0 0 1 0-.708z"></path>
							</svg>
						</span>
						<!--//submenu-arrow-->
					</a>
					<!--//nav-link-->
					<div id="submenu-1" class="collapse submenu submenu-1" data-bs-parent="#menu-accordion">
						<ul class="submenu-list list-unstyled">
							<li class="submenu-item"><a class="submenu-link" style="text-decoration: none;" href="<?php echo site_url('admin/users/profile_approval'); ?>"> Profile Approvels</a></li>
							<li class="submenu-item"><a class="submenu-link" style="text-decoration: none;" href="<?php echo site_url('admin/photoapprove'); ?>">Photo Approvels </a></li>
							<li class="submenu-item"><a class="submenu-link" style="text-decoration: none;" href="<?php echo site_url('admin/users/3'); ?>">Delete Confirmation</a></li>
							<li class="submenu-item"><a class="submenu-link" style="text-decoration: none;" href="<?php echo site_url('admin/users/1'); ?>">Approved calls
							</a></li>

						</ul>
					</div>
				</li>
				<?php }?>
				<?php }?>
								
				 <li class="nav-item has-submenu">
							<!--//Bootstrap Icons: https://icons.getbootstrap.com/ -->
							<a class="nav-link submenu-toggle" href="#" data-bs-toggle="collapse" data-bs-target="#submenu-11" aria-expanded="true" aria-controls="submenu-11">
								<span class="nav-icon">
									<!--//Bootstrap Icons: https://icons.getbootstrap.com/ -->
									<svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-pen" viewBox="0 0 16 16">
										<path d="m13.498.795.149-.149a1.207 1.207 0 1 1 1.707 1.708l-.149.148a1.5 1.5 0 0 1-.059 2.059L4.854 14.854a.5.5 0 0 1-.233.131l-4 1a.5.5 0 0 1-.606-.606l1-4a.5.5 0 0 1 .131-.232l9.642-9.642a.5.5 0 0 0-.642.056L6.854 4.854a.5.5 0 1 1-.708-.708L9.44.854A1.5 1.5 0 0 1 11.5.796a1.5 1.5 0 0 1 1.998-.001zm-.644.766a.5.5 0 0 0-.707 0L1.95 11.756l-.764 3.057 3.057-.764L14.44 3.854a.5.5 0 0 0 0-.708l-1.585-1.585z" />
									</svg>
								</span>
								<span class="nav-link-text">Paid Creation</span>
								<span class="submenu-arrow">
									<svg width="1em" height="1em" viewBox="0 0 16 16" class="bi bi-chevron-down" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
										<path fill-rule="evenodd" d="M1.646 4.646a.5.5 0 0 1 .708 0L8 10.293l5.646-5.647a.5.5 0 0 1 .708.708l-6 6a.5.5 0 0 1-.708 0l-6-6a.5.5 0 0 1 0-.708z"></path>
									</svg>
								</span>
								<!--//submenu-arrow-->
							</a>
							<!--//nav-link-->
							<div id="submenu-11" class="collapse submenu submenu-11" data-bs-parent="#menu-accordion">
								<ul class="submenu-list list-unstyled">
									<li class="submenu-item"><a class="submenu-link" style="text-decoration: none;" href="<?php echo site_url('admin/tdypaymentcreation'); ?>">Today's Sale
										</a></li>

								</ul>
								<ul class="submenu-list list-unstyled">
									<li class="submenu-item"><a class="submenu-link" style="text-decoration: none;" href="<?php echo site_url('admin/totalpaymentcreation'); ?>">Total Sale
										</a></li>

								</ul>
							</div>
						</li>
										
				 <li class="nav-item">
                <!--//Bootstrap Icons: https://icons.getbootstrap.com/ -->
                <a class="nav-link " href="<?php echo site_url('admin/assign_target'); ?>">
                <span class="nav-icon">
                
                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-wallet2" viewBox="0 0 16 16">
            <path d="M12.136.326A1.5 1.5 0 0 1 14 1.78V3h.5A1.5 1.5 0 0 1 16 4.5v9a1.5 1.5 0 0 1-1.5 1.5h-13A1.5 1.5 0 0 1 0 13.5v-9a1.5 1.5 0 0 1 1.432-1.499L12.136.326zM5.562 3H13V1.78a.5.5 0 0 0-.621-.484L5.562 3zM1.5 4a.5.5 0 0 0-.5.5v9a.5.5 0 0 0 .5.5h13a.5.5 0 0 0 .5-.5v-9a.5.5 0 0 0-.5-.5h-13z"/>
                </svg>
                </span>
                <span class="nav-link-text">Assign Target</span>
                </a>
                <!--//nav-link-->
                </li>
                
                
                 <li class="nav-item">
                <!--//Bootstrap Icons: https://icons.getbootstrap.com/ -->
                <a class="nav-link " href="<?php echo site_url('admin/assign_approve_calls'); ?>">
                <span class="nav-icon">
                
                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-wallet2" viewBox="0 0 16 16">
            <path d="M12.136.326A1.5 1.5 0 0 1 14 1.78V3h.5A1.5 1.5 0 0 1 16 4.5v9a1.5 1.5 0 0 1-1.5 1.5h-13A1.5 1.5 0 0 1 0 13.5v-9a1.5 1.5 0 0 1 1.432-1.499L12.136.326zM5.562 3H13V1.78a.5.5 0 0 0-.621-.484L5.562 3zM1.5 4a.5.5 0 0 0-.5.5v9a.5.5 0 0 0 .5.5h13a.5.5 0 0 0 .5-.5v-9a.5.5 0 0 0-.5-.5h-13z"/>
                </svg>
                </span>
                <span class="nav-link-text">Assign Approve Calls</span>
                </a>
                <!--//nav-link-->
                </li>
                
                
                 <li class="nav-item">
                <!--//Bootstrap Icons: https://icons.getbootstrap.com/ -->
                <a class="nav-link " href="<?php echo site_url('admin/assign_active_calls'); ?>">
                <span class="nav-icon">
                
                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-wallet2" viewBox="0 0 16 16">
              <path d="M12.136.326A1.5 1.5 0 0 1 14 1.78V3h.5A1.5 1.5 0 0 1 16 4.5v9a1.5 1.5 0 0 1-1.5 1.5h-13A1.5 1.5 0 0 1 0 13.5v-9a1.5 1.5 0 0 1 1.432-1.499L12.136.326zM5.562 3H13V1.78a.5.5 0 0 0-.621-.484L5.562 3zM1.5 4a.5.5 0 0 0-.5.5v9a.5.5 0 0 0 .5.5h13a.5.5 0 0 0 .5-.5v-9a.5.5 0 0 0-.5-.5h-13z"/>
                </svg>
                </span>
                <span class="nav-link-text">Assign Active Calls</span>
                </a>
                <!--//nav-link-->
                </li>
                    
                    <li class="nav-item has-submenu">
                    <a class="nav-link submenu-toggle" href="#" data-bs-toggle="collapse" data-bs-target="#submenu-12" aria-expanded="true" aria-controls="submenu-12">
                    <span class="nav-icon">
                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-pen" viewBox="0 0 16 16">
                    <path d="m13.498.795.149-.149a1.207 1.207 0 1 1 1.707 1.708l-.149.148a1.5 1.5 0 0 1-.059 2.059L4.854 14.854a.5.5 0 0 1-.233.131l-4 1a.5.5 0 0 1-.606-.606l1-4a.5.5 0 0 1 .131-.232l9.642-9.642a.5.5 0 0 0-.642.056L6.854 4.854a.5.5 0 1 1-.708-.708L9.44.854A1.5 1.5 0 0 1 11.5.796a1.5 1.5 0 0 1 1.998-.001zm-.644.766a.5.5 0 0 0-.707 0L1.95 11.756l-.764 3.057 3.057-.764L14.44 3.854a.5.5 0 0 0 0-.708l-1.585-1.585z" />
                    </svg>
                    </span>
                    <span class="nav-link-text">Data Report</span>
                    <span class="submenu-arrow">
                    <svg width="1em" height="1em" viewBox="0 0 16 16" class="bi bi-chevron-down" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                    <path fill-rule="evenodd" d="M1.646 4.646a.5.5 0 0 1 .708 0L8 10.293l5.646-5.647a.5.5 0 0 1 .708.708l-6 6a.5.5 0 0 1-.708 0l-6-6a.5.5 0 0 1 0-.708z"></path>
                    </svg>
                    </span>
                    <!--//submenu-arrow-->
                    </a>
                    <!--//nav-link-->
                    <div id="submenu-12" class="collapse submenu submenu-12" data-bs-parent="#menu-accordion">
                    <ul class="submenu-list list-unstyled">
                    <li class="submenu-item"><a class="submenu-link" style="text-decoration: none;" href="<?php echo site_url('admin/total_calls'); ?>">
                    Total Calls
                    </a></li>
                    
                    </ul>
                    <ul class="submenu-list list-unstyled">
                    <li class="submenu-item"><a class="submenu-link" style="text-decoration: none;" href="<?php echo site_url('admin/total_postpone'); ?>">
                    Total Postpone
                    </a></li>
                    
                    </ul>
                    </div>
                    </li>
                                       
                    <li class="nav-item has-submenu">
                    <a class="nav-link submenu-toggle" href="#" data-bs-toggle="collapse" data-bs-target="#submenu-17" aria-expanded="true" aria-controls="submenu-17">
                    <span class="nav-icon">
                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-pen" viewBox="0 0 16 16">
                    <path d="m13.498.795.149-.149a1.207 1.207 0 1 1 1.707 1.708l-.149.148a1.5 1.5 0 0 1-.059 2.059L4.854 14.854a.5.5 0 0 1-.233.131l-4 1a.5.5 0 0 1-.606-.606l1-4a.5.5 0 0 1 .131-.232l9.642-9.642a.5.5 0 0 0-.642.056L6.854 4.854a.5.5 0 1 1-.708-.708L9.44.854A1.5 1.5 0 0 1 11.5.796a1.5 1.5 0 0 1 1.998-.001zm-.644.766a.5.5 0 0 0-.707 0L1.95 11.756l-.764 3.057 3.057-.764L14.44 3.854a.5.5 0 0 0 0-.708l-1.585-1.585z" />
                    </svg>
                    </span>
                    <span class="nav-link-text">Support Admin</span>
                    <span class="submenu-arrow">
                    <svg width="1em" height="1em" viewBox="0 0 16 16" class="bi bi-chevron-down" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                    <path fill-rule="evenodd" d="M1.646 4.646a.5.5 0 0 1 .708 0L8 10.293l5.646-5.647a.5.5 0 0 1 .708.708l-6 6a.5.5 0 0 1-.708 0l-6-6a.5.5 0 0 1 0-.708z"></path>
                    </svg>
                    </span>
                    <!--//submenu-arrow-->
                    </a>
                    <!--//nav-link-->
                    <div id="submenu-17" class="collapse submenu submenu-17" data-bs-parent="#menu-accordion">
                  
                    <ul class="submenu-list list-unstyled">
                    <li class="submenu-item"><a class="submenu-link" style="text-decoration: none;" href="<?php echo site_url('admin/photoapprove'); ?>">
                    Photo Approvels
                    </a></li>
                    
                    </ul>
                    
                    
                    
                     <ul class="submenu-list list-unstyled">
                    <li class="submenu-item"><a class="submenu-link" style="text-decoration: none;" href="<?php echo site_url('admin/profile_approve_all'); ?>">
                    Approved Profile
                    </a></li>
                    
                    </ul>
                    
                    
                    <ul class="submenu-list list-unstyled">
                    <li class="submenu-item"><a class="submenu-link" style="text-decoration: none;" href="<?php echo site_url('admin/profile_deleted_all'); ?>">
                    Deleted Profile
                    </a></li>
                    
                    </ul>
                    
                    
                    <ul class="submenu-list list-unstyled">
                    <li class="submenu-item"><a class="submenu-link" style="text-decoration: none;" href="<?php echo site_url('admin/profilephoto_unavailable'); ?>">
                    Unavailbale Profile Photos
                    </a></li>
                    
                    </ul>
                    <ul class="submenu-list list-unstyled">
                    <li class="submenu-item"><a class="submenu-link" style="text-decoration: none;" href="<?php echo site_url('admin/reportid'); ?>">
                    Report ID's
                    </a></li>
                    
                    </ul>
                    <ul class="submenu-list list-unstyled">
                    <li class="submenu-item"><a class="submenu-link" style="text-decoration: none;" href="<?php echo site_url('admin/update_logs'); ?>">
                    Profile Verification
                    </a>
                    </li>
                    </ul>
                    
                    <!--<ul class="submenu-list list-unstyled">-->
                    <!--<li class="submenu-item">-->
                    <!--<a class="submenu-link" style="text-decoration: none;" href="<?php echo site_url('admin/otherstate'); ?>">-->
                    <!--Other State-->
                    <!--</a>-->
                    <!--</li>-->
                    <!--</ul>-->
                    
                     <ul class="submenu-list list-unstyled">
                    <li class="submenu-item">
                    <a class="submenu-link" style="text-decoration: none;" href="<?php echo site_url('admin/refer_and_earn'); ?>">
                    Refer And Earn
                    </a>
                    </li>
                    </ul>
                    
                    </div>
                    </li>
                    
                   <!-- <li class="nav-item has-submenu">-->
                   <!--  <a class="nav-link submenu-toggle" href="#" data-bs-toggle="collapse" data-bs-target="#submenu-22" aria-expanded="true" aria-controls="submenu-20">-->
                                      
                   <!-- <span class="nav-icon">-->
                   <!-- <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-pen" viewBox="0 0 16 16">-->
                   <!-- <path d="m13.498.795.149-.149a1.207 1.207 0 1 1 1.707 1.708l-.149.148a1.5 1.5 0 0 1-.059 2.059L4.854 14.854a.5.5 0 0 1-.233.131l-4 1a.5.5 0 0 1-.606-.606l1-4a.5.5 0 0 1 .131-.232l9.642-9.642a.5.5 0 0 0-.642.056L6.854 4.854a.5.5 0 1 1-.708-.708L9.44.854A1.5 1.5 0 0 1 11.5.796a1.5 1.5 0 0 1 1.998-.001zm-.644.766a.5.5 0 0 0-.707 0L1.95 11.756l-.764 3.057 3.057-.764L14.44 3.854a.5.5 0 0 0 0-.708l-1.585-1.585z" />-->
                   <!-- </svg>-->
                   <!-- </span>-->
                   <!-- <span class="nav-link-text">District Count</span>-->
                   <!-- <span class="submenu-arrow">-->
                   <!-- <svg width="1em" height="1em" viewBox="0 0 16 16" class="bi bi-chevron-down" fill="currentColor" xmlns="http://www.w3.org/2000/svg">-->
                   <!-- <path fill-rule="evenodd" d="M1.646 4.646a.5.5 0 0 1 .708 0L8 10.293l5.646-5.647a.5.5 0 0 1 .708.708l-6 6a.5.5 0 0 1-.708 0l-6-6a.5.5 0 0 1 0-.708z"></path>-->
                   <!-- </svg>-->
                   <!-- </span>-->
                    <!--//submenu-arrow-->
                   <!-- </a>-->
                    <!--//nav-link-->
                   <!-- <div id="submenu-29" class="collapse submenu submenu-29" data-bs-parent="#menu-accordion">-->
                  
                   <!-- <ul class="submenu-list list-unstyled">-->
                   <!-- <li class="submenu-item"><a class="submenu-link" style="text-decoration: none;" href="<?php echo site_url('admin/district_count_female'); ?>">-->
                   <!-- District Female-->
                   <!-- </a></li>-->
                    
                   <!-- </ul>-->
                   <!-- <ul class="submenu-list list-unstyled">-->
                   <!-- <li class="submenu-item"><a class="submenu-link" style="text-decoration: none;" href="<?php echo site_url('admin/district_count_male'); ?>">-->
                   <!--District Male-->
                   <!-- </a></li>-->
                    
                   <!-- </ul>-->
                   <!-- </div>-->
                   <!-- </li>-->
                    
                    
                    <li class="nav-item has-submenu">
                    <a class="nav-link submenu-toggle" href="#" data-bs-toggle="collapse" data-bs-target="#submenu-18" aria-expanded="true" aria-controls="submenu-18">
                    
                    <span class="nav-icon">
                    
                    <svg width="1em" height="1em" viewBox="0 0 16 16" class="bi bi-card-list" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                    <path fill-rule="evenodd" d="M14.5 3h-13a.5.5 0 0 0-.5.5v9a.5.5 0 0 0 .5.5h13a.5.5 0 0 0 .5-.5v-9a.5.5 0 0 0-.5-.5zm-13-1A1.5 1.5 0 0 0 0 3.5v9A1.5 1.5 0 0 0 1.5 14h13a1.5 1.5 0 0 0 1.5-1.5v-9A1.5 1.5 0 0 0 14.5 2h-13z" />
                    <path fill-rule="evenodd" d="M5 8a.5.5 0 0 1 .5-.5h7a.5.5 0 0 1 0 1h-7A.5.5 0 0 1 5 8zm0-2.5a.5.5 0 0 1 .5-.5h7a.5.5 0 0 1 0 1h-7a.5.5 0 0 1-.5-.5zm0 5a.5.5 0 0 1 .5-.5h7a.5.5 0 0 1 0 1h-7a.5.5 0 0 1-.5-.5z" />
                    <circle cx="3.5" cy="5.5" r=".5" />
                    <circle cx="3.5" cy="8" r=".5" />
                    <circle cx="3.5" cy="10.5" r=".5" />
                    </svg>
                    
                    </span>
								
                    <span class="nav-link-text">Profile Approval</span>
                    <span class="submenu-arrow">
                    <svg width="1em" height="1em" viewBox="0 0 16 16" class="bi bi-chevron-down" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                    <path fill-rule="evenodd" d="M1.646 4.646a.5.5 0 0 1 .708 0L8 10.293l5.646-5.647a.5.5 0 0 1 .708.708l-6 6a.5.5 0 0 1-.708 0l-6-6a.5.5 0 0 1 0-.708z"></path>
                    </svg>
                    </span>
                    <!--//submenu-arrow-->
                    </a>
                    <!--//nav-link-->
                    <div id="submenu-18" class="collapse submenu submenu-18" data-bs-parent="#menu-accordion">
                  
                    <ul class="submenu-list list-unstyled">
                    <li class="submenu-item"><a class="submenu-link" style="text-decoration: none;" href="<?php echo site_url('admin/quickregister'); ?>">
                    Quick Register
                    </a></li>
                    
                    </ul>
                    <ul class="submenu-list list-unstyled">
                    <li class="submenu-item"><a class="submenu-link" style="text-decoration: none;" href="<?php echo site_url('admin/stage_three'); ?>">
                    Stage Three
                    </a></li>
                    
                    </ul>
					<ul class="submenu-list list-unstyled">
                    <li class="submenu-item"><a class="submenu-link" style="text-decoration: none;" href="<?php echo site_url('admin/Gulfdata'); ?>">
                        Gulf Approvels
                    </a></li>
                    
                    </ul>	
                    
                      <ul class="submenu-list list-unstyled">
                    <li class="submenu-item">
                    <a class="submenu-link" style="text-decoration: none;" href="<?php echo site_url('admin/otherstate'); ?>">
                    Other State
                    </a>
                    </li>
                    </ul>
                    
                    </div>
                    </li>
                    
                    
                
                 <li class="nav-item has-submenu">
                    <a class="nav-link submenu-toggle" href="#" data-bs-toggle="collapse" data-bs-target="#submenu-28" aria-expanded="true" aria-controls="submenu-18">
                    
                 
                    
                    <span class="nav-icon">
                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-pen" viewBox="0 0 16 16">
                    <path d="m13.498.795.149-.149a1.207 1.207 0 1 1 1.707 1.708l-.149.148a1.5 1.5 0 0 1-.059 2.059L4.854 14.854a.5.5 0 0 1-.233.131l-4 1a.5.5 0 0 1-.606-.606l1-4a.5.5 0 0 1 .131-.232l9.642-9.642a.5.5 0 0 0-.642.056L6.854 4.854a.5.5 0 1 1-.708-.708L9.44.854A1.5 1.5 0 0 1 11.5.796a1.5 1.5 0 0 1 1.998-.001zm-.644.766a.5.5 0 0 0-.707 0L1.95 11.756l-.764 3.057 3.057-.764L14.44 3.854a.5.5 0 0 0 0-.708l-1.585-1.585z" />
                    </svg>
                    </span>
                    <span class="nav-link-text">ChatSupport Admin</span>
                    <span class="submenu-arrow">
                    <svg width="1em" height="1em" viewBox="0 0 16 16" class="bi bi-chevron-down" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                    <path fill-rule="evenodd" d="M1.646 4.646a.5.5 0 0 1 .708 0L8 10.293l5.646-5.647a.5.5 0 0 1 .708.708l-6 6a.5.5 0 0 1-.708 0l-6-6a.5.5 0 0 1 0-.708z"></path>
                    </svg>
                    </span>
                    <!--//submenu-arrow-->
                    </a>
                    <!--//nav-link-->
                    <div id="submenu-28" class="collapse submenu submenu-28" data-bs-parent="#menu-accordion">
                  
                    <ul class="submenu-list list-unstyled">
                    <li class="submenu-item"><a class="submenu-link" style="text-decoration: none;" href="<?php echo site_url('admin/doorstepcollection'); ?>">
                    Door Step Collection
                    </a></li>
                    
                    </ul>
                    <ul class="submenu-list list-unstyled">
                    <li class="submenu-item"><a class="submenu-link" style="text-decoration: none;" href="<?php echo site_url('admin/payvisitcount'); ?>">
                    Payment Page Visit
                    </a></li>
                    
                    </ul>
                    
                                        <!--<ul class="submenu-list list-unstyled">-->
                    <!--<li class="submenu-item"><a class="submenu-link" style="text-decoration: none;" href="<?php echo site_url('admin/paymentsupport'); ?>">-->
                    <!--  Payment Support-->
                    <!--</a></li>-->
                    
                    <!--</ul>          -->
                    
								
                    </div>
                    </li>
                    
                    <li class="nav-item has-submenu">
                    <a class="nav-link submenu-toggle" href="#" data-bs-toggle="collapse" data-bs-target="#submenu-29" aria-expanded="true" aria-controls="submenu-19">
                    
                    <span class="nav-icon">
                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-pen" viewBox="0 0 16 16">
                    <path d="m13.498.795.149-.149a1.207 1.207 0 1 1 1.707 1.708l-.149.148a1.5 1.5 0 0 1-.059 2.059L4.854 14.854a.5.5 0 0 1-.233.131l-4 1a.5.5 0 0 1-.606-.606l1-4a.5.5 0 0 1 .131-.232l9.642-9.642a.5.5 0 0 0-.642.056L6.854 4.854a.5.5 0 1 1-.708-.708L9.44.854A1.5 1.5 0 0 1 11.5.796a1.5 1.5 0 0 1 1.998-.001zm-.644.766a.5.5 0 0 0-.707 0L1.95 11.756l-.764 3.057 3.057-.764L14.44 3.854a.5.5 0 0 0 0-.708l-1.585-1.585z" />
                    </svg>
                    </span>
                    <span class="nav-link-text">District Count</span>
                    <span class="submenu-arrow">
                    <svg width="1em" height="1em" viewBox="0 0 16 16" class="bi bi-chevron-down" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                    <path fill-rule="evenodd" d="M1.646 4.646a.5.5 0 0 1 .708 0L8 10.293l5.646-5.647a.5.5 0 0 1 .708.708l-6 6a.5.5 0 0 1-.708 0l-6-6a.5.5 0 0 1 0-.708z"></path>
                    </svg>
                    </span>
                    <!--//submenu-arrow-->
                    </a>
                    <!--//nav-link-->
                    <div id="submenu-29" class="collapse submenu submenu-29" data-bs-parent="#menu-accordion">
                  
                    <ul class="submenu-list list-unstyled">
                    <li class="submenu-item"><a class="submenu-link" style="text-decoration: none;" href="<?php echo site_url('admin/district_count_female'); ?>">
                    District Female
                    </a></li>
                    
                    </ul>
                    <ul class="submenu-list list-unstyled">
                    <li class="submenu-item"><a class="submenu-link" style="text-decoration: none;" href="<?php echo site_url('admin/district_count_male'); ?>">
                   District Male
                    </a></li>
                    
                    </ul>
                    </div>
                    </li>
                    
                    
                   <li class="nav-item has-submenu">
                    <a class="nav-link submenu-toggle" href="#" data-bs-toggle="collapse" data-bs-target="#submenu-30" aria-expanded="true" aria-controls="submenu-21">
                                      
                    <span class="nav-icon">
                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-pen" viewBox="0 0 16 16">
                    <path d="m13.498.795.149-.149a1.207 1.207 0 1 1 1.707 1.708l-.149.148a1.5 1.5 0 0 1-.059 2.059L4.854 14.854a.5.5 0 0 1-.233.131l-4 1a.5.5 0 0 1-.606-.606l1-4a.5.5 0 0 1 .131-.232l9.642-9.642a.5.5 0 0 0-.642.056L6.854 4.854a.5.5 0 1 1-.708-.708L9.44.854A1.5 1.5 0 0 1 11.5.796a1.5 1.5 0 0 1 1.998-.001zm-.644.766a.5.5 0 0 0-.707 0L1.95 11.756l-.764 3.057 3.057-.764L14.44 3.854a.5.5 0 0 0 0-.708l-1.585-1.585z" />
                    </svg>
                    </span>
                    <span class="nav-link-text">Date Vise Profiles</span>
                    <span class="submenu-arrow">
                    <svg width="1em" height="1em" viewBox="0 0 16 16" class="bi bi-chevron-down" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                    <path fill-rule="evenodd" d="M1.646 4.646a.5.5 0 0 1 .708 0L8 10.293l5.646-5.647a.5.5 0 0 1 .708.708l-6 6a.5.5 0 0 1-.708 0l-6-6a.5.5 0 0 1 0-.708z"></path>
                    </svg>
                    </span>
                    <!--//submenu-arrow-->
                    </a>
                    <!--//nav-link-->
                    <div id="submenu-30" class="collapse submenu submenu-30" data-bs-parent="#menu-accordion">
                  
                    <ul class="submenu-list list-unstyled">
                    <li class="submenu-item"><a class="submenu-link" style="text-decoration: none;" href="<?php echo site_url('admin/date_count_female'); ?>">
                    Date Vise Female Profiles
                    </a></li>
                    
                    </ul>
                    <ul class="submenu-list list-unstyled">
                    <li class="submenu-item"><a class="submenu-link" style="text-decoration: none;" href="<?php echo site_url('admin/date_count_male'); ?>">
                    Date Vise Male Profiles
                    </a></li>
                    
                    </ul>
                    </div>
                    </li>  
            
             <li class="nav-item">           
            <a class="nav-link" href="<?php echo site_url('admin/multiple_contacts'); ?>">
            <span class="nav-icon">            
            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-person-check" viewBox="0 0 16 16">
            <path d="M12.5 16a3.5 3.5 0 1 0 0-7 3.5 3.5 0 0 0 0 7Zm1.679-4.493-1.335 2.226a.75.75 0 0 1-1.174.144l-.774-.773a.5.5 0 0 1 .708-.708l.547.548 1.17-1.951a.5.5 0 1 1 .858.514ZM11 5a3 3 0 1 1-6 0 3 3 0 0 1 6 0ZM8 7a2 2 0 1 0 0-4 2 2 0 0 0 0 4Z"></path>
            <path d="M8.256 14a4.474 4.474 0 0 1-.229-1.004H3c.001-.246.154-.986.832-1.664C4.484 10.68 5.711 10 8 10c.26 0 .507.009.74.025.226-.341.496-.65.804-.918C9.077 9.038 8.564 9 8 9c-5 0-6 3-6 4s1 1 1 1h5.256Z"></path>
            </svg>
            
            </span>
            <span class="nav-link-text">Customer Viewed Count</span>
            </a>
            <!--//nav-link-->
            </li>
            
            
            <li class="nav-item">           
            <a class="nav-link" href="<?php echo site_url('admin/staff_create'); ?>">
            <span class="nav-icon">            
            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-person-check" viewBox="0 0 16 16">
            <path d="M12.5 16a3.5 3.5 0 1 0 0-7 3.5 3.5 0 0 0 0 7Zm1.679-4.493-1.335 2.226a.75.75 0 0 1-1.174.144l-.774-.773a.5.5 0 0 1 .708-.708l.547.548 1.17-1.951a.5.5 0 1 1 .858.514ZM11 5a3 3 0 1 1-6 0 3 3 0 0 1 6 0ZM8 7a2 2 0 1 0 0-4 2 2 0 0 0 0 4Z"></path>
            <path d="M8.256 14a4.474 4.474 0 0 1-.229-1.004H3c.001-.246.154-.986.832-1.664C4.484 10.68 5.711 10 8 10c.26 0 .507.009.74.025.226-.341.496-.65.804-.918C9.077 9.038 8.564 9 8 9c-5 0-6 3-6 4s1 1 1 1h5.256Z"></path>
            </svg>
            
            </span>
            <span class="nav-link-text">Staff Creation</span>
            </a>
            <!--//nav-link-->
            </li>
            
            <li class="nav-item">           
            <a class="nav-link" href="<?php echo site_url('admin/invoice_creation'); ?>">
            <span class="nav-icon">            
            
            <svg width="1em" height="1em" viewBox="0 0 16 16" class="bi bi-card-list" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
            <path fill-rule="evenodd" d="M14.5 3h-13a.5.5 0 0 0-.5.5v9a.5.5 0 0 0 .5.5h13a.5.5 0 0 0 .5-.5v-9a.5.5 0 0 0-.5-.5zm-13-1A1.5 1.5 0 0 0 0 3.5v9A1.5 1.5 0 0 0 1.5 14h13a1.5 1.5 0 0 0 1.5-1.5v-9A1.5 1.5 0 0 0 14.5 2h-13z" />
            <path fill-rule="evenodd" d="M5 8a.5.5 0 0 1 .5-.5h7a.5.5 0 0 1 0 1h-7A.5.5 0 0 1 5 8zm0-2.5a.5.5 0 0 1 .5-.5h7a.5.5 0 0 1 0 1h-7a.5.5 0 0 1-.5-.5zm0 5a.5.5 0 0 1 .5-.5h7a.5.5 0 0 1 0 1h-7a.5.5 0 0 1-.5-.5z" />
            <circle cx="3.5" cy="5.5" r=".5" />
            <circle cx="3.5" cy="8" r=".5" />
            <circle cx="3.5" cy="10.5" r=".5" />
            </svg>
            
            </span>
            <span class="nav-link-text">Invoice Creation</span>
            </a>
            <!--//nav-link-->
            </li>
        
            <li class="nav-item">           
            <a class="nav-link" href="<?php echo site_url('admin/contact_viewed_search'); ?>">
            <span class="nav-icon">            
             <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-person-check" viewBox="0 0 16 16">
            <path d="M12.5 16a3.5 3.5 0 1 0 0-7 3.5 3.5 0 0 0 0 7Zm1.679-4.493-1.335 2.226a.75.75 0 0 1-1.174.144l-.774-.773a.5.5 0 0 1 .708-.708l.547.548 1.17-1.951a.5.5 0 1 1 .858.514ZM11 5a3 3 0 1 1-6 0 3 3 0 0 1 6 0ZM8 7a2 2 0 1 0 0-4 2 2 0 0 0 0 4Z"></path>
            <path d="M8.256 14a4.474 4.474 0 0 1-.229-1.004H3c.001-.246.154-.986.832-1.664C4.484 10.68 5.711 10 8 10c.26 0 .507.009.74.025.226-.341.496-.65.804-.918C9.077 9.038 8.564 9 8 9c-5 0-6 3-6 4s1 1 1 1h5.256Z"></path>
            </svg>        
            </span>
            <span class="nav-link-text">Viewed Contacts</span>
            </a>
            <!--//nav-link-->
            </li>


            <li class="nav-item">           
            <a class="nav-link" href="<?php echo site_url('admin/changepass2'); ?>">
            <span class="nav-icon">            
            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-key" viewBox="0 0 16 16">
            <path d="M0 8a4 4 0 0 1 7.465-2H14a.5.5 0 0 1 .354.146l1.5 1.5a.5.5 0 0 1 0 .708l-1.5 1.5a.5.5 0 0 1-.708 0L13 9.207l-.646.647a.5.5 0 0 1-.708 0L11 9.207l-.646.647a.5.5 0 0 1-.708 0L9 9.207l-.646.647A.5.5 0 0 1 8 10h-.535A4 4 0 0 1 0 8zm4-3a3 3 0 1 0 2.712 4.285A.5.5 0 0 1 7.163 9h.63l.853-.854a.5.5 0 0 1 .708 0l.646.647.646-.647a.5.5 0 0 1 .708 0l.646.647.646-.647a.5.5 0 0 1 .708 0l.646.647.793-.793-1-1h-6.63a.5.5 0 0 1-.451-.285A3 3 0 0 0 4 5z"/>
            <path d="M4 8a1 1 0 1 1-2 0 1 1 0 0 1 2 0z"/>
            </svg>            
            </span>
            <span class="nav-link-text">Change Password</span>
            </a>
            <!--//nav-link-->
            </li>
            
            
            </ul>
            </div>
            </li>
            
            
            
            </ul>
            <!--//app-menu-->
            </nav>
            <!--//app-nav-->
            
            </div>
            <!--//sidepanel-inner-->
            </div>


<!--//app-sidepanel-->
</header>
<!--//app-header-->

<script>
// this function used for active link css 
  $(function(){
    var current = location.pathname;
    $('#app-sidepanel li a').each(function(){
        var $this = $(this);
        // if the current path is like this link, make it active
        if($this.attr('href').indexOf(current) !== -1){
            $this.addClass('active');
        }
    })
})

</script>



