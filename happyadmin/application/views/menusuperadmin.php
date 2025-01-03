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
						<!--//nav-item-->
							<!--<li class="nav-item">
					       
					        <a class="nav-link" href="docs.html">
						        <span class="nav-icon">
						        <svg width="1em" height="1em" viewBox="0 0 16 16" class="bi bi-folder" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
										<path d="M9.828 4a3 3 0 0 1-2.12-.879l-.83-.828A1 1 0 0 0 6.173 2H2.5a1 1 0 0 0-1 .981L1.546 4h-1L.5 3a2 2 0 0 1 2-2h3.672a2 2 0 0 1 1.414.586l.828.828A2 2 0 0 0 9.828 3v1z"/>
										<path fill-rule="evenodd" d="M13.81 4H2.19a1 1 0 0 0-.996 1.09l.637 7a1 1 0 0 0 .995.91h10.348a1 1 0 0 0 .995-.91l.637-7A1 1 0 0 0 13.81 4zM2.19 3A2 2 0 0 0 .198 5.181l.637 7A2 2 0 0 0 2.826 14h10.348a2 2 0 0 0 1.991-1.819l.637-7A2 2 0 0 0 13.81 3H2.19z"/>
										</svg>
						         </span>
		                         <span class="nav-link-text">Docs</span>
					        </a>
					    </li> -->
		 		
		    		 <!--//nav-item-->
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
				
		 
		 
		 <?php if($_SESSION['user_type']==='13')
		 {?>
		 
		 
		    <!--    <li class="nav-item has-submenu">-->
					
						<!--	<a class="nav-link submenu-toggle" href="#" data-bs-toggle="collapse" data-bs-target="#submenu-1" aria-expanded="true" aria-controls="submenu-1">-->
						<!--		<span class="nav-icon">-->
						
						<!--			<svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-pen" viewBox="0 0 16 16">-->
						<!--				<path d="m13.498.795.149-.149a1.207 1.207 0 1 1 1.707 1.708l-.149.148a1.5 1.5 0 0 1-.059 2.059L4.854 14.854a.5.5 0 0 1-.233.131l-4 1a.5.5 0 0 1-.606-.606l1-4a.5.5 0 0 1 .131-.232l9.642-9.642a.5.5 0 0 0-.642.056L6.854 4.854a.5.5 0 1 1-.708-.708L9.44.854A1.5 1.5 0 0 1 11.5.796a1.5 1.5 0 0 1 1.998-.001zm-.644.766a.5.5 0 0 0-.707 0L1.95 11.756l-.764 3.057 3.057-.764L14.44 3.854a.5.5 0 0 0 0-.708l-1.585-1.585z" />-->
						<!--			</svg>-->
						<!--		</span>-->
						<!--		<span class="nav-link-text">Paid Creation</span>-->
						<!--		<span class="submenu-arrow">-->
						<!--			<svg width="1em" height="1em" viewBox="0 0 16 16" class="bi bi-chevron-down" fill="currentColor" xmlns="http://www.w3.org/2000/svg">-->
						<!--				<path fill-rule="evenodd" d="M1.646 4.646a.5.5 0 0 1 .708 0L8 10.293l5.646-5.647a.5.5 0 0 1 .708.708l-6 6a.5.5 0 0 1-.708 0l-6-6a.5.5 0 0 1 0-.708z"></path>-->
						<!--			</svg>-->
						<!--		</span>-->
					
						<!--	</a>-->
			
						<!--	<div id="submenu-1" class="collapse submenu submenu-1" data-bs-parent="#menu-accordion">-->
						<!--		<ul class="submenu-list list-unstyled">-->
						<!--			<li class="submenu-item"><a class="submenu-link" style="text-decoration: none;" href="<?php echo site_url('admin/tdypaymentcreation'); ?>">Today's Sale-->
						<!--				</a></li>-->

						<!--		</ul>-->
						<!--		<ul class="submenu-list list-unstyled">-->
						<!--			<li class="submenu-item"><a class="submenu-link" style="text-decoration: none;" href="<?php echo site_url('admin/totalpaymentcreation'); ?>">Total Sale-->
						<!--				</a></li>-->

						<!--		</ul>-->
						<!--	</div>-->
						<!--</li>-->
						
						
                 <?php }?>






             
              <?php if($_SESSION['user_type']==='13')
		 {?>
		    <!--    <li class="nav-item has-submenu">-->
				
						<!--	<a class="nav-link submenu-toggle" href="#" data-bs-toggle="collapse" data-bs-target="#submenu-2" aria-expanded="true" aria-controls="submenu-2">-->
						<!--		<span class="nav-icon">-->
								
									
					
      <!--                  <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-person-square" viewBox="0 0 16 16">-->
      <!--                  <path d="M11 6a3 3 0 1 1-6 0 3 3 0 0 1 6 0z"/>-->
      <!--                  <path d="M2 0a2 2 0 0 0-2 2v12a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V2a2 2 0 0 0-2-2H2zm12 1a1 1 0 0 1 1 1v12a1 1 0 0 1-1 1v-1c0-1-1-4-6-4s-6 3-6 4v1a1 1 0 0 1-1-1V2a1 1 0 0 1 1-1h12z"/>-->
      <!--                  </svg> -->
                        
									
									
						<!--		</span>-->
						<!--		<span class="nav-link-text">Customer Creation</span>-->
						<!--		<span class="submenu-arrow">-->
						<!--			<svg width="1em" height="1em" viewBox="0 0 16 16" class="bi bi-chevron-down" fill="currentColor" xmlns="http://www.w3.org/2000/svg">-->
						<!--				<path fill-rule="evenodd" d="M1.646 4.646a.5.5 0 0 1 .708 0L8 10.293l5.646-5.647a.5.5 0 0 1 .708.708l-6 6a.5.5 0 0 1-.708 0l-6-6a.5.5 0 0 1 0-.708z"></path>-->
						<!--			</svg>-->
						<!--		</span>-->
						
						<!--	</a>-->
					
						<!--	<div id="submenu-2" class="collapse submenu submenu-2" data-bs-parent="#menu-accordion">-->
						<!--		<ul class="submenu-list list-unstyled">-->
						<!--			<li class="submenu-item"><a class="submenu-link" style="text-decoration: none;" href="<?php echo site_url('admin/todaycreation'); ?>">Today's Creation-->
						<!--				</a></li>-->

						<!--		</ul>-->
						<!--		<ul class="submenu-list list-unstyled">-->
						<!--			<li class="submenu-item"><a class="submenu-link" style="text-decoration: none;" href="<?php echo site_url('admin/profile_approvals_all'); ?>">Total Creation-->
						<!--				</a></li>-->

						<!--		</ul>-->
						<!--	</div>-->
						<!--</li>-->
                 <?php }?>
                 
                 
                 
                 
    <!--             	<li class="nav-item has-submenu">-->
			
				<!--	<a class="nav-link submenu-toggle" href="#" data-bs-toggle="collapse" data-bs-target="#submenu-3" aria-expanded="true" aria-controls="submenu-3">-->
				<!--		<span class="nav-icon">-->
				
				<!--			<svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-person-check" viewBox="0 0 16 16">-->
				<!--				<path d="M12.5 16a3.5 3.5 0 1 0 0-7 3.5 3.5 0 0 0 0 7Zm1.679-4.493-1.335 2.226a.75.75 0 0 1-1.174.144l-.774-.773a.5.5 0 0 1 .708-.708l.547.548 1.17-1.951a.5.5 0 1 1 .858.514ZM11 5a3 3 0 1 1-6 0 3 3 0 0 1 6 0ZM8 7a2 2 0 1 0 0-4 2 2 0 0 0 0 4Z" />-->
				<!--				<path d="M8.256 14a4.474 4.474 0 0 1-.229-1.004H3c.001-.246.154-.986.832-1.664C4.484 10.68 5.711 10 8 10c.26 0 .507.009.74.025.226-.341.496-.65.804-.918C9.077 9.038 8.564 9 8 9c-5 0-6 3-6 4s1 1 1 1h5.256Z" />-->
				<!--			</svg>-->
				<!--		</span>-->
				<!--		<span class="nav-link-text">Approvels</span>-->
				<!--		<span class="submenu-arrow">-->
				<!--			<svg width="1em" height="1em" viewBox="0 0 16 16" class="bi bi-chevron-down" fill="currentColor" xmlns="http://www.w3.org/2000/svg">-->
				<!--				<path fill-rule="evenodd" d="M1.646 4.646a.5.5 0 0 1 .708 0L8 10.293l5.646-5.647a.5.5 0 0 1 .708.708l-6 6a.5.5 0 0 1-.708 0l-6-6a.5.5 0 0 1 0-.708z"></path>-->
				<!--			</svg>-->
				<!--		</span>-->
				
				<!--	</a>-->
				
				<!--	<div id="submenu-3" class="collapse submenu submenu-3" data-bs-parent="#menu-accordion">-->
				<!--		<ul class="submenu-list list-unstyled">-->
				<!--			<li class="submenu-item"><a class="submenu-link" style="text-decoration: none;" href="<?php echo site_url('admin/photoapprove'); ?>">Photo Approvels </a></li>-->
							
				<!--		<li class="submenu-item"><a class="submenu-link" style="text-decoration: none;" href="<?php echo site_url('admin/users/profile_approval'); ?>">Profile Approvels </a></li>	-->
				<!--			<li class="submenu-item"><a class="submenu-link" style="text-decoration: none;" href="<?php echo site_url('admin/profile_deleted_all'); ?>">Deleted Profile</a></li>-->


    <!-- 	<li class="submenu-item"><a class="submenu-link" style="text-decoration: none;" href="<?php echo site_url('admin/profilephoto_unavailable'); ?>">Unavailbale Profile Photos </a></li>-->
     	
    <!-- 	<li class="submenu-item"><a class="submenu-link" style="text-decoration: none;" href="<?php echo site_url('admin/profilephoto_deleted'); ?>">Deleted Profile Photos</a></li>-->

				<!--		</ul>-->
				<!--	</div>-->
				<!--</li>-->
				
				
				
				<!--	<li class="nav-item has-submenu">-->

				<!--	<a class="nav-link submenu-toggle" href="#" data-bs-toggle="collapse" data-bs-target="#submenu-4" aria-expanded="true" aria-controls="submenu-4">-->
				<!--	 <span class="nav-icon">-->
    <!--                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-person-fill-up" viewBox="0 0 16 16">-->
    <!--                            <path d="M12.5 16a3.5 3.5 0 1 0 0-7 3.5 3.5 0 0 0 0 7Zm.354-5.854 1.5 1.5a.5.5 0 0 1-.708.708L13 11.707V14.5a.5.5 0 0 1-1 0v-2.793l-.646.647a.5.5 0 0 1-.708-.708l1.5-1.5a.5.5 0 0 1 .708 0ZM11 5a3 3 0 1 1-6 0 3 3 0 0 1 6 0Z" />-->
    <!--                            <path d="M2 13c0 1 1 1 1 1h5.256A4.493 4.493 0 0 1 8 12.5a4.49 4.49 0 0 1 1.544-3.393C9.077 9.038 8.564 9 8 9c-5 0-6 3-6 4Z" />-->
    <!--                        </svg>-->
    <!--                    </span>-->
				<!--		<span class="nav-link-text">Followup</span>-->
				<!--		<span class="submenu-arrow">-->
				<!--			<svg width="1em" height="1em" viewBox="0 0 16 16" class="bi bi-chevron-down" fill="currentColor" xmlns="http://www.w3.org/2000/svg">-->
				<!--				<path fill-rule="evenodd" d="M1.646 4.646a.5.5 0 0 1 .708 0L8 10.293l5.646-5.647a.5.5 0 0 1 .708.708l-6 6a.5.5 0 0 1-.708 0l-6-6a.5.5 0 0 1 0-.708z"></path>-->
				<!--			</svg>-->
				<!--		</span>-->
		
				<!--	</a>-->
		
				<!--	<div id="submenu-4" class="collapse submenu submenu-4" data-bs-parent="#menu-accordion">-->
				<!--		<ul class="submenu-list list-unstyled">-->
				<!--			<li class="submenu-item"><a class="submenu-link" style="text-decoration: none;" href="<?php echo site_url('admin/todayfollowup_all');?>">Today Followup </a></li>-->
				<!--			<li class="submenu-item"><a class="submenu-link" style="text-decoration: none;" href="<?php echo site_url('admin/pendingfollowup_all'); ?>">Pending Followup</a></li>-->
			
				<!--			</a></li>-->

				<!--		</ul>-->
				<!--	</div>-->
				<!--</li>-->
				
				
				<!--	<li class="nav-item has-submenu">-->

				<!--	<a class="nav-link submenu-toggle" href="#" data-bs-toggle="collapse" data-bs-target="#submenu-5" aria-expanded="true" aria-controls="submenu-5">-->
				<!--	 <span class="nav-icon">-->
    <!--                         <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-telephone-plus" viewBox="0 0 16 16">-->
    <!--                            <path d="M3.654 1.328a.678.678 0 0 0-1.015-.063L1.605 2.3c-.483.484-.661 1.169-.45 1.77a17.568 17.568 0 0 0 4.168 6.608 17.569 17.569 0 0 0 6.608 4.168c.601.211 1.286.033 1.77-.45l1.034-1.034a.678.678 0 0 0-.063-1.015l-2.307-1.794a.678.678 0 0 0-.58-.122l-2.19.547a1.745 1.745 0 0 1-1.657-.459L5.482 8.062a1.745 1.745 0 0 1-.46-1.657l.548-2.19a.678.678 0 0 0-.122-.58L3.654 1.328zM1.884.511a1.745 1.745 0 0 1 2.612.163L6.29 2.98c.329.423.445.974.315 1.494l-.547 2.19a.678.678 0 0 0 .178.643l2.457 2.457a.678.678 0 0 0 .644.178l2.189-.547a1.745 1.745 0 0 1 1.494.315l2.306 1.794c.829.645.905 1.87.163 2.611l-1.034 1.034c-.74.74-1.846 1.065-2.877.702a18.634 18.634 0 0 1-7.01-4.42 18.634 18.634 0 0 1-4.42-7.009c-.362-1.03-.037-2.137.703-2.877L1.885.511z" />-->
    <!--                            <path fill-rule="evenodd" d="M12.5 1a.5.5 0 0 1 .5.5V3h1.5a.5.5 0 0 1 0 1H13v1.5a.5.5 0 0 1-1 0V4h-1.5a.5.5 0 0 1 0-1H12V1.5a.5.5 0 0 1 .5-.5z" />-->
    <!--                        </svg>-->
    <!--                    </span>-->
				<!--		<span class="nav-link-text">Calls</span>-->
				<!--		<span class="submenu-arrow">-->
				<!--			<svg width="1em" height="1em" viewBox="0 0 16 16" class="bi bi-chevron-down" fill="currentColor" xmlns="http://www.w3.org/2000/svg">-->
				<!--				<path fill-rule="evenodd" d="M1.646 4.646a.5.5 0 0 1 .708 0L8 10.293l5.646-5.647a.5.5 0 0 1 .708.708l-6 6a.5.5 0 0 1-.708 0l-6-6a.5.5 0 0 1 0-.708z"></path>-->
				<!--			</svg>-->
				<!--		</span>-->
			
				<!--	</a>-->
		
				<!--	<div id="submenu-5" class="collapse submenu submenu-5" data-bs-parent="#menu-accordion">-->
				<!--		<ul class="submenu-list list-unstyled">-->
				<!--			<li class="submenu-item"><a class="submenu-link" style="text-decoration: none;" href="<?php echo site_url('admin/approvecalls_all');?>">Approve calls </a></li>-->
				<!--			<li class="submenu-item"><a class="submenu-link" style="text-decoration: none;" href="<?php echo site_url('admin/activecalls_all'); ?>">Active calls</a></li>-->
				<!--			<li class="submenu-item"><a class="submenu-link" style="text-decoration: none;" href="<?php echo site_url('admin/expirycalls') ?>">Expiry calls-->
				<!--			</a></li>-->

				<!--		</ul>-->
				<!--	</div>-->
				<!--</li>-->
				
                 
    <!--            <li class="nav-item has-submenu">-->
          
    <!--            <a class="nav-link submenu-toggle" href="#" data-bs-toggle="collapse" data-bs-target="#submenu-6" aria-expanded="true" aria-controls="submenu-1">-->
    <!--            <span class="nav-icon">-->
       
    <!--            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-cash-coin" viewBox="0 0 16 16">-->
    <!--            <path fill-rule="evenodd" d="M11 15a4 4 0 1 0 0-8 4 4 0 0 0 0 8zm5-4a5 5 0 1 1-10 0 5 5 0 0 1 10 0z" />-->
    <!--            <path d="M9.438 11.944c.047.596.518 1.06 1.363 1.116v.44h.375v-.443c.875-.061 1.386-.529 1.386-1.207 0-.618-.39-.936-1.09-1.1l-.296-.07v-1.2c.376.043.614.248.671.532h.658c-.047-.575-.54-1.024-1.329-1.073V8.5h-.375v.45c-.747.073-1.255.522-1.255 1.158 0 .562.378.92 1.007 1.066l.248.061v1.272c-.384-.058-.639-.27-.696-.563h-.668zm1.36-1.354c-.369-.085-.569-.26-.569-.522 0-.294.216-.514.572-.578v1.1h-.003zm.432.746c.449.104.655.272.655.569 0 .339-.257.571-.709.614v-1.195l.054.012z" />-->
    <!--            <path d="M1 0a1 1 0 0 0-1 1v8a1 1 0 0 0 1 1h4.083c.058-.344.145-.678.258-1H3a2 2 0 0 0-2-2V3a2 2 0 0 0 2-2h10a2 2 0 0 0 2 2v3.528c.38.34.717.728 1 1.154V1a1 1 0 0 0-1-1H1z" />-->
    <!--            <path d="M9.998 5.083 10 5a2 2 0 1 0-3.132 1.65 5.982 5.982 0 0 1 3.13-1.567z" />-->
    <!--            </svg>-->
    <!--            </span>-->
    <!--            <span class="nav-link-text">Postpone Payment</span>-->
    <!--            <span class="submenu-arrow">-->
    <!--            <svg width="1em" height="1em" viewBox="0 0 16 16" class="bi bi-chevron-down" fill="currentColor" xmlns="http://www.w3.org/2000/svg">-->
    <!--            <path fill-rule="evenodd" d="M1.646 4.646a.5.5 0 0 1 .708 0L8 10.293l5.646-5.647a.5.5 0 0 1 .708.708l-6 6a.5.5 0 0 1-.708 0l-6-6a.5.5 0 0 1 0-.708z"></path>-->
    <!--            </svg>-->
    <!--            </span>-->
    <!--            </a>-->

    <!--            <div id="submenu-6" class="collapse submenu submenu-6" data-bs-parent="#menu-accordion">-->
    <!--            <ul class="submenu-list list-unstyled">-->
    <!--            <li class="submenu-item"><a class="submenu-link" style="text-decoration: none;" href="<?php echo site_url('admin/calllogs_all') ?>"> Call Logs</a></li>-->
    <!--            <li class="submenu-item"><a class="submenu-link" style="text-decoration: none;" href="<?php echo site_url('admin/todaypostpone_all') ?>">Today Postpone </a></li>-->
                
    <!--            </ul>-->
    <!--            </div>-->
    <!--            </li>-->

              
                <!--<li class="nav-item">-->
                <!--<a class="nav-link " href="<?php echo site_url('admin/target'); ?>">-->
                <!--<span class="nav-icon">-->
                
                <!--<svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-wallet2" viewBox="0 0 16 16">-->
                <!--<path d="M12.136.326A1.5 1.5 0 0 1 14 1.78V3h.5A1.5 1.5 0 0 1 16 4.5v9a1.5 1.5 0 0 1-1.5 1.5h-13A1.5 1.5 0 0 1 0 13.5v-9a1.5 1.5 0 0 1 1.432-1.499L12.136.326zM5.562 3H13V1.78a.5.5 0 0 0-.621-.484L5.562 3zM1.5 4a.5.5 0 0 0-.5.5v9a.5.5 0 0 0 .5.5h13a.5.5 0 0 0 .5-.5v-9a.5.5 0 0 0-.5-.5h-13z"/>-->
                <!--</svg>-->
                <!--</span>-->
                <!--<span class="nav-link-text">Target</span>-->
                <!--</a>-->
                
                <!--</li>-->
						
						

                <!--<li class="nav-item">-->
                <!--<a class="nav-link " href="<?php echo site_url('admin/doorstepcollection'); ?>">-->
                <!--<span class="nav-icon">-->
                <!--<svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-door-open-fill" viewBox="0 0 16 16">-->
                <!--<path d="M1.5 15a.5.5 0 0 0 0 1h13a.5.5 0 0 0 0-1H13V2.5A1.5 1.5 0 0 0 11.5 1H11V.5a.5.5 0 0 0-.57-.495l-7 1A.5.5 0 0 0 3 1.5V15H1.5zM11 2h.5a.5.5 0 0 1 .5.5V15h-1V2zm-2.5 8c-.276 0-.5-.448-.5-1s.224-1 .5-1 .5.448.5 1-.224 1-.5 1z" />-->
                <!--</svg>-->
                <!--</span>-->
                <!--<span class="nav-link-text">Door Step Collection</span>-->
                <!--</a>-->
                <!--</li>-->
						
                
                <!--<li class="nav-item">-->
         
                <!--<a class="nav-link" href="<?php echo site_url('admin/payvisitcount'); ?>">-->
                <!--<span class="nav-icon">-->
                <!--<svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-currency-rupee" viewBox="0 0 16 16">-->
                <!--<path d="M4 3.06h2.726c1.22 0 2.12.575 2.325 1.724H4v1.051h5.051C8.855 7.001 8 7.558 6.788 7.558H4v1.317L8.437 14h2.11L6.095 8.884h.855c2.316-.018 3.465-1.476 3.688-3.049H12V4.784h-1.345c-.08-.778-.357-1.335-.793-1.732H12V2H4v1.06Z" />-->
                <!--</svg>-->
                <!--</span>-->
                <!--<span class="nav-link-text">Payment Page Visit</span>-->
                <!--</a>-->
                <!--</li>-->
                
                

    <!--        	<li class="nav-item">-->
		
				<!--	<a class="nav-link" href="<?php echo site_url('admin/quickcontact'); ?>">-->
				<!--		<span class="nav-icon">-->
				<!--			<svg width="1em" height="1em" viewBox="0 0 16 16" class="bi bi-card-list" fill="currentColor" xmlns="http://www.w3.org/2000/svg">-->
				<!--				<path fill-rule="evenodd" d="M14.5 3h-13a.5.5 0 0 0-.5.5v9a.5.5 0 0 0 .5.5h13a.5.5 0 0 0 .5-.5v-9a.5.5 0 0 0-.5-.5zm-13-1A1.5 1.5 0 0 0 0 3.5v9A1.5 1.5 0 0 0 1.5 14h13a1.5 1.5 0 0 0 1.5-1.5v-9A1.5 1.5 0 0 0 14.5 2h-13z" />-->
				<!--				<path fill-rule="evenodd" d="M5 8a.5.5 0 0 1 .5-.5h7a.5.5 0 0 1 0 1h-7A.5.5 0 0 1 5 8zm0-2.5a.5.5 0 0 1 .5-.5h7a.5.5 0 0 1 0 1h-7a.5.5 0 0 1-.5-.5zm0 5a.5.5 0 0 1 .5-.5h7a.5.5 0 0 1 0 1h-7a.5.5 0 0 1-.5-.5z" />-->
				<!--				<circle cx="3.5" cy="5.5" r=".5" />-->
				<!--				<circle cx="3.5" cy="8" r=".5" />-->
				<!--				<circle cx="3.5" cy="10.5" r=".5" />-->
				<!--			</svg>-->
				<!--		</span>-->
				<!--		<span class="nav-link-text">Quick Profiles</span>-->
				<!--	</a>-->
				
				<!--</li>-->



    <!--            <li class="nav-item">-->
				
				<!--	<a class="nav-link" href="<?php echo site_url('admin/register'); ?>">-->
				<!--		<span class="nav-icon">-->
				<!--			<svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-pencil-square" viewBox="0 0 16 16">-->
				<!--				<path d="M15.502 1.94a.5.5 0 0 1 0 .706L14.459 3.69l-2-2L13.502.646a.5.5 0 0 1 .707 0l1.293 1.293zm-1.75 2.456-2-2L4.939 9.21a.5.5 0 0 0-.121.196l-.805 2.414a.25.25 0 0 0 .316.316l2.414-.805a.5.5 0 0 0 .196-.12l6.813-6.814z"></path>-->
				<!--				<path fill-rule="evenodd" d="M1 13.5A1.5 1.5 0 0 0 2.5 15h11a1.5 1.5 0 0 0 1.5-1.5v-6a.5.5 0 0 0-1 0v6a.5.5 0 0 1-.5.5h-11a.5.5 0 0 1-.5-.5v-11a.5.5 0 0 1 .5-.5H9a.5.5 0 0 0 0-1H2.5A1.5 1.5 0 0 0 1 2.5v11z"></path>-->
				<!--			</svg>-->
				<!--		</span>-->
				<!--		<span class="nav-link-text">User Registrations</span>-->
				<!--	</a>-->
				
				<!--</li>-->



            <!--<li class="nav-item">-->
            <!--<a class="nav-link" href="<?php echo site_url('admin/pdfcreation'); ?>">-->
            <!--<span class="nav-icon">-->
            
            <!--<svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-file-pdf" viewBox="0 0 16 16">-->
            <!--<path d="M4 0a2 2 0 0 0-2 2v12a2 2 0 0 0 2 2h8a2 2 0 0 0 2-2V2a2 2 0 0 0-2-2H4zm0 1h8a1 1 0 0 1 1 1v12a1 1 0 0 1-1 1H4a1 1 0 0 1-1-1V2a1 1 0 0 1 1-1z"></path>-->
            <!--<path d="M4.603 12.087a.81.81 0 0 1-.438-.42c-.195-.388-.13-.776.08-1.102.198-.307.526-.568.897-.787a7.68 7.68 0 0 1 1.482-.645 19.701 19.701 0 0 0 1.062-2.227 7.269 7.269 0 0 1-.43-1.295c-.086-.4-.119-.796-.046-1.136.075-.354.274-.672.65-.823.192-.077.4-.12.602-.077a.7.7 0 0 1 .477.365c.088.164.12.356.127.538.007.187-.012.395-.047.614-.084.51-.27 1.134-.52 1.794a10.954 10.954 0 0 0 .98 1.686 5.753 5.753 0 0 1 1.334.05c.364.065.734.195.96.465.12.144.193.32.2.518.007.192-.047.382-.138.563a1.04 1.04 0 0 1-.354.416.856.856 0 0 1-.51.138c-.331-.014-.654-.196-.933-.417a5.716 5.716 0 0 1-.911-.95 11.642 11.642 0 0 0-1.997.406 11.311 11.311 0 0 1-1.021 1.51c-.29.35-.608.655-.926.787a.793.793 0 0 1-.58.029zm1.379-1.901c-.166.076-.32.156-.459.238-.328.194-.541.383-.647.547-.094.145-.096.25-.04.361.01.022.02.036.026.044a.27.27 0 0 0 .035-.012c.137-.056.355-.235.635-.572a8.18 8.18 0 0 0 .45-.606zm1.64-1.33a12.647 12.647 0 0 1 1.01-.193 11.666 11.666 0 0 1-.51-.858 20.741 20.741 0 0 1-.5 1.05zm2.446.45c.15.162.296.3.435.41.24.19.407.253.498.256a.107.107 0 0 0 .07-.015.307.307 0 0 0 .094-.125.436.436 0 0 0 .059-.2.095.095 0 0 0-.026-.063c-.052-.062-.2-.152-.518-.209a3.881 3.881 0 0 0-.612-.053zM8.078 5.8a6.7 6.7 0 0 0 .2-.828c.031-.188.043-.343.038-.465a.613.613 0 0 0-.032-.198.517.517 0 0 0-.145.04c-.087.035-.158.106-.196.283-.04.192-.03.469.046.822.024.111.054.227.09.346z"></path>-->
            <!--</svg>-->
            
            <!--</span>-->
            <!--<span class="nav-link-text">PDF Creation</span>-->
            <!--</a>-->
            <!--</li>-->
            
            
            
                <!--<li class="nav-item">-->
                <!--<a class="nav-link" href="<?php echo site_url('admin/changepass'); ?>">-->
                <!--<span class="nav-icon">-->
                
                <!--<svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-key" viewBox="0 0 16 16">-->
                <!--<path d="M0 8a4 4 0 0 1 7.465-2H14a.5.5 0 0 1 .354.146l1.5 1.5a.5.5 0 0 1 0 .708l-1.5 1.5a.5.5 0 0 1-.708 0L13 9.207l-.646.647a.5.5 0 0 1-.708 0L11 9.207l-.646.647a.5.5 0 0 1-.708 0L9 9.207l-.646.647A.5.5 0 0 1 8 10h-.535A4 4 0 0 1 0 8zm4-3a3 3 0 1 0 2.712 4.285A.5.5 0 0 1 7.163 9h.63l.853-.854a.5.5 0 0 1 .708 0l.646.647.646-.647a.5.5 0 0 1 .708 0l.646.647.646-.647a.5.5 0 0 1 .708 0l.646.647.793-.793-1-1h-6.63a.5.5 0 0 1-.451-.285A3 3 0 0 0 4 5z"/>-->
                <!--<path d="M4 8a1 1 0 1 1-2 0 1 1 0 0 1 2 0z"/>-->
                <!--</svg>-->
                
                <!--</span>-->
                <!--<span class="nav-link-text">Change Password</span>-->
                <!--</a>-->
                <!--</li>-->



                
                <!--<li class="nav-item">-->
                <!--//Bootstrap Icons: https://icons.getbootstrap.com/ -->
                <!--<a class="nav-link" href="<?php echo site_url('admin/todaycreation'); ?>">-->
                <!--<span class="nav-icon">-->
                <!--<svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-calendar2-heart-fill" viewBox="0 0 16 16">-->
                <!--<path d="M4 .5a.5.5 0 0 0-1 0V1H2a2 2 0 0 0-2 2v11a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V3a2 2 0 0 0-2-2h-1V.5a.5.5 0 0 0-1 0V1H4V.5Zm-2 4v-1c0-.276.244-.5.545-.5h10.91c.3 0 .545.224.545.5v1c0 .276-.244.5-.546.5H2.545C2.245 5 2 4.776 2 4.5Zm6 3.493c1.664-1.711 5.825 1.283 0 5.132-5.825-3.85-1.664-6.843 0-5.132Z"></path>-->
                <!--</svg>-->
                <!--</span>-->
                <!--<span class="nav-link-text">Today's Creation</span>-->
                <!--</a>-->
              
                <!--</li>-->
				
				
				
				    <!--<li class="nav-item">-->
                <!--//Bootstrap Icons: https://icons.getbootstrap.com/ -->
        <!--        <a class="nav-link" href="<?php echo site_url('admin/totalcreationall'); ?>">-->
        <!--        <span class="nav-icon">-->
        <!--        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-calendar2-heart-fill" viewBox="0 0 16 16">-->
        <!--        <path d="M4 .5a.5.5 0 0 0-1 0V1H2a2 2 0 0 0-2 2v11a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V3a2 2 0 0 0-2-2h-1V.5a.5.5 0 0 0-1 0V1H4V.5Zm-2 4v-1c0-.276.244-.5.545-.5h10.91c.3 0 .545.224.545.5v1c0 .276-.244.5-.546.5H2.545C2.245 5 2 4.776 2 4.5Zm6 3.493c1.664-1.711 5.825 1.283 0 5.132-5.825-3.85-1.664-6.843 0-5.132Z"></path>-->
        <!--        </svg>-->
        <!--        </span>-->
        <!--        <span class="nav-link-text">Total Creation</span>-->
        <!--        </a>-->
                <!--//nav-link-->
        <!--        </li>		-->
						


            
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

