

<!doctype html>
<html>
	<head>
		<meta charset="utf-8">
		<title>store</title>
		<meta name="viewport" content="width=device-width , intial-scale=1">
		<link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
		<script src ="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
		<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
		<!--ink rel="stylesheet" href="./css/bootstrap.min.css">
		<script src="./js/bootstrap.min.js"></script>
		<script src="./js/jquery.min.js"></script>-->
		<link rel="stylesheet" href="style/style.css">
		
	</head>
 
	<body>
    <div class="content">
  	<!-- notification message -->
  	<?php if (isset($_SESSION['success'])) : ?>
      <div class="error success" >
      	<h3>
          <?php 
          	echo $_SESSION['success']; 
          	unset($_SESSION['success']);
          ?>
      	</h3>
      </div>
  	<?php endif ?>

    <!-- logged in user information -->

</div>
		
		<!--navbar-->
	<nav class="navbar navbar-inverse vn-navbar">

			<div class="container">
				<div class="navbar-header">
    <span class="navbar-nav"  style="color: white" >
    <?php  if (isset($_SESSION['username'])) : ?>
    	<p>Welcome <strong><?php echo $_SESSION['username']; ?></strong></p>
    	<p> <a href="index.php?logout='1'" style="color: red;">logout</a> </p>
    <?php endif ?></span>
					<button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#MyNavbar">
		 				<span class="icon-bar"></span>
						<span class="icon-bar"></span>
						<span class="icon-bar"></span>

						
					</button>

					<!--<a href="#" class="navbar-brand">christmas shopping</a>-->
				 </div>
				
				<div id="MyNavbar" class="collapse navbar-collapse ">
					<ul class="nav navbar-nav ">

				<li class="active"><a href="#">about us</a></li>
				<li><a href="#">product</a></li>
				<li><a href="#">contact us</a></li>
				
			</ul>
			<ul class="nav navbar-nav navbar-right">
			 <li><a href="login.php"><span class="glyphicon glyphicon-user"></span></a></li>
			 <li><a href="#"><span class="glyphicon glyphicon-shopping-cart"></span></a></li>
			 <li><a href="#"><span class="glyphicon glyphicon-search"></span></a></li>

			 </ul>
			 	</div>
			</div>

	</nav>
	
		<!--slide show-->
		<div>
			<div id ="myCarousel" data-ride="carousel" class="carousel slide">
				<ol class="carousel-indicators">
					<li data-target="#myCarousel" data-slide-to="0" class="active"></li>
					<li data-target="#myCarousel" data-slide-to="1" ></li>
					<li data-target="#myCarousel" data-slide-to="2" ></li>
					
					
					
				</ol>
				<div class="carousel-inner">
				<div class ="item active">

					<img src="images/1.jpg" alt="happy chrismas" style="width:100% ; height: 500px;">
				<div class="carousel-caption" "br-border">
						<h3>christmas shopping </h3>
						<p>Industries completely dependent on Christmas include Christmas cards, of which 1.9 billion are  </p>
				</div>
				</div>
								<div class ="item">

					<img src="images/2.jpg" alt="happy chrismas" style="width:100% ; height: 500px;">
				<div class="carousel-caption">
						<h3>christmas shopping </h3>
						<p>Industries completely dependent on Christmas include Christmas cards, of which 1.9 billion are  </p>
				</div>
				</div>
				<div class ="item">

					<img src="images/3.jpg" alt="happy chrismas" style="width:100% ; height: 500px;">
				<div class="carousel-caption">
						<h3>christmas shopping </h3>
						<p>Industries completely dependent on Christmas include Christmas cards, of which 1.9 billion are  </p>
				</div>
				</div>
				</div> 
				
					<a class="left carousel-control" href="#myCarousel" data-slide="prev">
					<span class="glyphicon glyphicon-chevron-left"></span>
					<span class="sr-only">previous</span>
					</a>
					<a class="right carousel-control" href="#myCarousel" data-slide="next">
					<span class="glyphicon glyphicon-chevron-right"></span>
					<span class="sr-only">next</span>
					</a>
				</div>
				</div>
		<!--about us-->
		<div class ="about-us">
		<div class="container">
			<div class ="img-about-us col-md-6">
			<img src ="images/4.jpg" width="100%" height="450px"; >
				<!-- <div style ="background-image : url('images/4.jpg'); width :100% ; height:200px ;"> </div> -->
			</div>
			<div class ="exp-about-us col-md-6" >
				<h2> <mark>christmas shopping </mark><small> nabiyan </small></h2>
				<p>
				Industries completely dependent on Christmas include Christmas cards, of which 1.9 billion are 
				sent in the United States each year, and live Christmas Trees, of which 20.8 <blockquote> million were cut in the U.S. in 2002.[7] In most Western nations, Christmas Day is the least active day of the year for business and commerce; almost all retail, commercial and institutional businesses are closed, and almost all industries cease activity (more than any other day of the year), whether laws require such or not. In England and Wales, the Christmas Day (Trading) Act 2004 prevents all large shops from trading on Christmas Day. Film studios release many high-budget movies during the holiday season, including Christmas films, fantasy movies or high-tone dramas with high production values 
				to hopes of maximizing the chance of nominations for the Academy Awards.</blockquote>
				</p>
				
			</div>
		</div>

			
		</div>
		<!--icons-->
		<div class="glyphicon-vn">
			<div class="container">
				<ul class="list-inline text-center">
					<li class="col-md-4"><i class="glyphicon glyphicon-shopping-cart"></i><p>1,500</p> </li>
					<li class="col-md-4"><i class="glyphicon glyphicon-user"></i><p>1,500</p> </li>
					<li class="col-md-4"><i class="glyphicon glyphicon-heart"></i><p>1,500</p> </li>
				</ul>
			</div>
		</div>
		<!--product-->
		<div class = "products">
			<div class="container">
				<div class="row">
					<div class="col-md-3 product" style=" background-image : url('images/6.jpg')">
						<a href="login.php"><span class="exp-products">price : 23$</span></a>
					</div>
					<div class="col-md-3 product" style=" background-image : url('images/7.jpg')">
						<a href="login.php"><span class="exp-products">price : 150$</span></a>
					</div>
					<div class="col-md-3 product" style=" background-image : url('images/8.jpg')">
						<a href="login.php"><span class="exp-products">price : 75$</span></a>
					</div>	
					<div class="col-md-3 product" style=" background-image : url('images/9.jpg')">
						<a href="login.php"><span class="exp-products">price : 70$</span></a>
					</div>	
					
				
				</div>
					<div class="row">
					<div class="col-md-3 product" style=" background-image : url('images/10.jpg')">
                    

                    
                    
                    
						<a href="login.php"><span class="exp-products">price : 20$</span></a>
					</div>
					<div class="col-md-3 product" style=" background-image : url('images/11.jpg')">
						<a href="login.php"><span class="exp-products">price : 11$</span></a>
					</div>
					<div class="col-md-3 product" style=" background-image : url('images/12.jpg')">
						<a href="login.php"><span class="exp-products">price : 13$</span></a>
					</div>	
					<div class="col-md-3 product" style=" background-image : url('images/13.jpg')">
						<a href="login.php"><span class="exp-products">price : 5$</span></a>
					</div>	
					</div>
					

				<div class="pagination-vn text-center">
					<ul class="pagination">
						<li class="active"><a href ="#">1</a></li>
						<li><a href ="#">2</a></li>
						<li><a href ="#">3</a></li>
						<li><a href ="#">4</a></li>
					</ul>
				
				</div>
				<div class="pager-vn">
					<ul class="pager">
					<li class="previous"><a href = "#">pre</a></li>
					<li class="next"><a href = "#">next</a></li>
					</ul>
				
				</div>
			</div>
		</div>

		
		<!--footer-->
		<div class="footer navbar-inverse text-center">
			<span class="">copyrighy @christmas_shopping 2018</span>
		</div>
		
		
	</body>
</html>
