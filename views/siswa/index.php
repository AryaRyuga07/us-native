<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>MyExam | Home</title>
	<link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Sharp:opsz,wght,FILL,GRAD@48,400,0,0" />
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
	<link rel="stylesheet" href="../../assets/css/home.css">
</head>
<body>
	
<header class="header">
	<a href="#" class="logo">
		<img src="../../assets/img/me.jpg" alt="logo">
	</a>

	<nav class="navbar">
		<a href="#home">Home</a>
		<a href="#about">Rules</a>
		<a href="#menu">Class</a>
		<a href="#products">Rank</a>
	</nav>

	<div class="icons">
		<div class="fas fa-search" id="search-btn"></div>
		<a href="../login/login.php"><span class="material-symbols-sharp logout" id="logout-btn">logout</span></a>
		<div class="fas fa-bars" id="menu-btn"></div>
	</div>

	<div class="search-form">
		<input type="search" id="search-box" placeholder="search here...">
		<label for="search-box" class="fas fa-search"></label>
	</div>
</header>


<section class="home" id="home">
	<div class="content">
		<h3>Welcome to <span>MyExam</span></h3>
		<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Quis reprehenderit dicta autem? Perspiciatis, ipsum, eveniet!</p>
	</div>
</section>

<section class="about" id="about">
	<h1 class="heading"> <span>Rules</span></h1>
	<div class="row">
		<div class="image">
			<img src="../../assets/img/Blue Poison.jpg" alt="about">
		</div>

		<div class="content">
			<h3>Peraturan selama ujian berlangsung</h3>
			<p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Quaerat earum incidunt consequatur blanditiis rem et animi impedit odit. Molestiae dolor sit nemo nisi eligendi sapiente cumque dolorem, iste explicabo eveniet.</p>
			<p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Laudantium eveniet voluptas in quibusdam nisi provident dignissimos molestiae doloribus sit? Ratione?</p>
			<a href="#" class="btn">learn more</a>
		</div>
	</div>
</section>

<section class="menu" id="menu">
	<h1 class="heading">Class</h1>
	<div class="box-container">
		<div class="box">
			<img src="../../assets/img/X.jpg" alt="menu1">
			<h3>RPL</h3>
			<div class="price"></div>
			<a href="#" class="btn">Start</a>
		</div>
		<div class="box">
			<img src="../../assets/img/XI.jpg" alt="menu2">
			<h3>TKJ</h3>
			<div class="price"></div>
			<a href="#" class="btn">Start</a>
		</div>
		<div class="box">
			<img src="../../assets/img/XII.jpg" alt="menu3">
			<h3>EIND</h3>
			<div class="price"></div>
			<a href="#" class="btn">Start</a>
		</div>
		<div class="box">
			<img src="../../assets/img/XII.jpg" alt="menu3">
			<h3>TPTU</h3>
			<div class="price"></div>
			<a href="#" class="btn">Start</a>
		</div>
	</div>
</section>

<section class="products" id="products">
	<h1 class="heading"><span>Rank</span></h1>
	<div class="box-container">
		<div class="box">
			<div class="icons">
				<a href="#" class="fas fa-eye"></a>
			</div>
			<div class="image">
				<img src="../../assets/img/kaito.jpg" alt="product1">
			</div>
			<div class="content">
				<h3>Rahmat Hidayat</h3>
				<div class="price"><span>900</span></div>
			</div>
		</div>
		<div class="box">
			<div class="icons">
				<a href="#" class="fas fa-eye"></a>
			</div>
			<div class="image">
				<img src="../../assets/img/aizen.jpg" alt="product2">
			</div>
			<div class="content">
				<h3>Irwan Gunawan</h3>
				<div class="price"><span>800</span></div>
			</div>
		</div>
		<div class="box">
			<div class="icons">
				<a href="#" class="fas fa-eye"></a>
			</div>
			<div class="image">
				<img src="../../assets/img/kuro.jpg" alt="product3">
			</div>
			<div class="content">
				<h3>Handoko Rahmat</h3>
				<div class="price"><span>690</span></div>
			</div>
		</div>
	</div>
</section>

<footer class="footer">
	<div class="credit">created by <span>Ryuga</span> | all rights reserved</div>
</footer>

<script src="../../assets/js/home.js"></script>
</body>
</html>