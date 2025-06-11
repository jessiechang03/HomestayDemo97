<?PHP include('header.php');?>
<h2>Pilih Bilik</h2>
<p>Pilih Bilik Anda</p>
<p style='color:#030303'>| <a href='menuutamaadmin.php' style='color:#030303'>Menu Utama</a> | <a href='daftartempahan.php' style='color:#030303'>Kembali</a> |</p>
<div class="carousel-wrapper">
<div class="carousel" data-flickity='{ "wrapAround": true }'>
  <div class="carousel-cell">
    <div class="box">
	<div class="slide-img">
	  <img alt="2" src="images/137.png">
	  <div class="overlay"><a href="tempahanadmin.php?Z=137" class="buy-btn">Tempah</a></div>
	</div>
	<div class="detail-box">
	  <div class="type"><a>Bilik Bujang</a><span>[137] , 1 orang</span></div>
	  <a class="price">RM 80</a>	
	</div>
	</div>
  </div>

  <div class="carousel-cell">
    <div class="box">
	<div class="slide-img">
	  <img alt="3" src="images/205.png">
	  <div class="overlay"><a href="tempahanadmin.php?Z=205" class="buy-btn">Tempah</a></div>
	</div>
	<div class="detail-box">
	  <div class="type"><a>Bilik Double</a><span>[205] , 1-2 orang</span></div>
	  <a class="price">RM 100</a>	
	</div>
	</div>
  </div>

  <div class="carousel-cell">
    <div class="box">
	<div class="slide-img">
	  <img alt="4" src="images/245.png">
	  <div class="overlay"><a href="tempahanadmin.php?Z=245" class="buy-btn">Tempah</a></div>
	</div>
	<div class="detail-box">
	  <div class="type"><a>Bilik Double</a><span>[245] , 1-2 orang</span>
      </div>
	  <a class="price">RM 100</a>	
	</div>
	</div>
  </div>

  <div class="carousel-cell">
    <div class="box">
	<div class="slide-img">
	  <img alt="5" src="images/666.png">
	  <div class="overlay"><a href="tempahanadmin.php?Z=666" class="buy-btn">Tempah</a></div>
	</div>
	<div class="detail-box">
	  <div class="type"><a>Bilik Loteng</a><span>[666] , 4-6 orang</span></div>
	  <a class="price">RM 300</a>	
	</div>
	</div>
  </div>

  <div class="carousel-cell">
    <div class="box">
	<div class="slide-img">
	  <img alt="6" src="images/696.png">
	  <div class="overlay"><a href="tempahanadmin.php?Z=696" class="buy-btn">Tempah</a></div>
	</div>
	<div class="detail-box">
	  <div class="type"><a>Bilik Loteng</a><span>[696] , 4-6 orang</span></div>
	  <a class="price">RM 300</a>	
	</div>
	</div>
  </div>

  <div class="carousel-cell">
    <div class="box">
	<div class="slide-img">
	  <img alt="7" src="images/853.png">
	  <div class="overlay"><a href="tempahanadmin.php?Z=853" class="buy-btn">Tempah</a></div>
	</div>
	<div class="detail-box">
	  <div class="type"><a>Bilik Keluarga</a><span>[853] , 2-4 orang</span></div>
	  <a class="price">RM 200</a>	
	</div>
	</div>
  </div>

  <div class="carousel-cell">
    <div class="box">
	<div class="slide-img">
	  <img alt="8" src="images/857.png">
	  <div class="overlay"><a href="tempahanadmin.php?Z=857" class="buy-btn">Tempah</a></div>
	</div>
	<div class="detail-box">
	  <div class="type"><a>Bilik Keluarga</a><span>[857] , 2-4 orang</span></div>
	  <a class="price">RM 200</a>	
	</div>
	</div>
  </div>

  <div class="carousel-cell">
    <div class="box">
	<div class="slide-img">
	  <img alt="1" src="images/131.png">
	  <div class="overlay"><a href="tempahanadmin.php?Z=131" class="buy-btn">Tempah</a></div>
	</div>
	<div class="detail-box">
	  <div class="type"><a>Bilik Bujang</a><span>[131] , 1 orang</span></div>
	  <a class="price">RM 80</a>	
	</div>
	</div>
  </div>
</div>
</div>
<style>
h1 {
    font-weight: 700;
}
.box{
	width:300px;
	box-shadow: 2px 2px 30px rgba(0,0,0,0.2);
	border-radius: 10px;
	overflow: hidden;
	margin: 25px;
}
.slide-img{
	height: 150px;
	position:relative;
}
.slide-img img{
	width:100%;
	height: 100%;
	object-fit: cover;
	box-sizing: border-box;
}
.detail-box{
	width: 100%;
    display: flex;
	justify-content: space-between;
	align-items: center;
	padding: 10px 20px;
	box-sizing: border-box;
    font-family: calibri;
    height: 65px;
    background: rgb(220,248,248);
}
.type{
	display: flex;
	flex-direction: column;
}
.type a{
	color:#222222;
	margin: 5px 0px;
	font-weight: 700;
	letter-spacing: 0.5px;
	padding-right: 8px;
}
.type span{
    color:rgba(26,26,26,0.5);
    margin-left: 12px;
}
.price{
	color: #333333;
	font-weight: 600;
	font-size: 1.1rem;
	font-family: poppins;
	letter-spacing: 0.5px;
}
.overlay{
	position: absolute;
	left: 50%;
	top: 50%;
	transform: translate(-50%,-50%);
	width:100%;
	height: 100%;
	background-color: rgba(92,95,236,0.6);
	display: flex;
	justify-content: center;
	align-items: center;
}
.buy-btn{
	width:160px;
	height: 40px;
	display: flex;
	justify-content: center;
	align-items: center;
	background-color: #FFFFFF;
	color:#252525;
	font-weight: 700;
	letter-spacing: 1px;
	font-family: calibri;
	border-radius: 20px;
	box-shadow: 2px 2px 30px rgba(0,0,0,0.2);
}
.buy-btn:hover{
	color:#FFFFFF;
	background-color: #f15fa3;
	transition: all ease 0.3s;
}
.overlay{
	visibility: hidden;
}
.slide-img:hover .overlay{
	visibility: visible;
	animation:fade 0.5s;
}
 
@keyframes fade{
	0%{
		opacity: 0;
	}
	100%{
		opacity: 1;
	}
}
.carousel-wrapper{
    position: relative;
    width:99%;
    height: 200px;
    margin-top: 150px;
    left: 50%;
    transform: translate(-50%, -50%);
}
.carousel-wrapper .carousel{
    position: absolute;
    top: 50%;
    transform: translateY(-50%);
    width:99%;
    height: auto;
}
.carousel-wrapper .carousel .carousel-cell{
    border-radius: 5px;
    padding: 15px;
    width: 14%;
    height: auto;
    min-width: 120px;
    margin: 0 95px;
    transition: transform 500ms ease;
}
</style>
<?PHP include('footer.php');?>