<div class="dashboard-header">
	<nav class="navbar navbar-expand-lg bg-white fixed-top">
		<div class="collapse navbar-collapse " id="navbarSupportedContent">
			<ul class="navbar-nav">
				<li class="nav-item dropdown nav-user">
					<a class="nav-link" href="#" id="navbarDropdownMenuLink2" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><h3 class="mb-0 nav-user-name">
						<?php 

						$user = new Users;
						$userData = $user->getUserData($_SESSION['loggedInId']);
						echo '<img src="../../assets/images/avatar-1.jpg" alt="" class="user-avatar-md rounded-circle"> ';
						echo $userData['user_name'];

						?>
					</h3></a>
					<div class="dropdown-menu dropdown-menu-left nav-user-dropdown" aria-labelledby="navbarDropdownMenuLink2">
						<div class="nav-user-info">
							<span class="status"></span><span class="ml-2">User</span>
						</div>
						<a class="dropdown-item" href="?logout=1">Logout</a>
					</div>
				</li>
			</ul>
		</div>
	</nav>
</div>