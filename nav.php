


<div class="container-fluid">
		<header class="container">
			<nav class="navbar navbar-default" role="navigation">

				<div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">

					<ul class="nav navbar-nav trai">

						<li class="active"><a href="#">
							<span class="glyphicon glyphicon-home"></span>

						</a></li>

						<li><a href="#">Hot<span class="glyphicon glyphicon-fire"></span></a></li>

						<li class="dropdown">

							<a href="#" class="dropdown-toggle" data-toggle="dropdown">Sneaker<span class="caret"></span></a>

							<ul class="dropdown-menu">


								<li class="divider"></li>

								<li class="divider"></li>

							</ul>

						</li>

					</ul>
					<div class="navbar-header">

						<button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">

							<span class="sr-only">Toggle navigation</span>

							<span class="icon-bar"></span>

							<span class="icon-bar"></span>

							<span class="icon-bar"></span>

						</button>

						<a class="navbar-brand" href="./index.php">
							<img src="img/brandsmall.png" width="240" height="97">
						</a>

					</div>

					<ul class="nav navbar-nav navbar-right">

						<li>
							<a href="./bag.php">
								<button type="button" class="btn btn-default btn-lg icon2">
									<span class="glyphicon glyphicon-shopping-cart"></span>
									<span class="caret"></span>
								</button>
							</a>
						</li>

						<li class="dropdown">

							<a href="#" class="dropdown-toggle" data-toggle="dropdown">
								<button type="button" class="btn btn-default btn-lg icon2">
									<span class="glyphicon glyphicon-user"></span>
									<span class="caret"></span>
								</button>
							</a>

							<ul class="dropdown-menu">
								<?php
                            	if(isset($_SESSION['username']) && $_SESSION['username']){
                            		$us=$_SESSION['username'];
                                    echo '<li><a href="#">Hi,bạn '. $us .'</a></li>';
                                    echo '<li><a href="./logOut.php">Đăng xuất</a></li>';
                                }
                                else{
                                    echo '<li><a href="./signIn.php">Đăng nhập</a></li>';
                                    echo '<li><a href="./signUp.php">Đăng kí</a></li>';
                                }
                        		?>

							</ul>

						</li>


					</ul>
					<form class="navbar-form navbar-right phai" role="search" action="search.php" method="GET">

						<div class="form-group">

							<input type="text" class="form-control" placeholder="Search" name="ok">

						</div>


						<button type="submit" class="btn btn-default btn-lg icon1">

							<span class="glyphicon glyphicon-search"></span> 

						</button>

					</form>
					

				</div>


			</nav>

		</header>
	</div>