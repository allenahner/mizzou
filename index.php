<!DOCTYPE html>
<html lang="en">
<?php
session_start('Mizzou');

$content = (isset($_POST['content'])) ? $_POST['content'] : "home";

switch($content){
		case 'home':
			$index = 1;
		break;
		case 'request':
			$index = 2;
		break;
		case 'employment':
			$index = 3;
		break;
    default:
        $index = 1;
}
$i = 1;
while($i <=4){
	if($i != $index){
		$array[$i] = '<li>';
	}
	else{
		$array[$i] = '<li class="active">';
	}
	$i = $i +1;
}

?>


<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Mizzou</title>

	<script src="//code.jquery.com/jquery-1.9.1.js"></script>
	<script src="//code.jquery.com/ui/1.10.4/jquery-ui.js"></script>
	<link rel="stylesheet" href="//code.jquery.com/ui/1.10.4/themes/smoothness/jquery-ui.css">
	<script src="dist/js/bootstrap.min.js"></script>
	<script src="js/css3-mediaqueries.js"></script>
	<script src="js/respond.js"></script>
	<script src="js/global.js"></script>
	<script src="js/<?php echo $content; ?>.js"></script>
    <!-- Bootstrap core CSS -->
    <link href="dist/css/bootstrap.css" rel="stylesheet">
    <!-- Custom styles for this template -->
    <link href="carousel.css" rel="stylesheet">
	<link rel="stylesheet" type="text/css" href="css/mystyle.css">
	<!--[if lt IE 10]>
		<link rel="stylesheet" type="text/css" href="css/ie.css">
	<![endif]-->
	
	<style id="holderjs-style" type="text/css"></style>
		
</head>
<body>
	<div class="navbar-wrapper">
      <div class="container">
        <div class="navbar navbar-inverse navbar-static-top" role="navigation">
          <div class="container">
            <div class="navbar-header">
			    <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
				<!--[if lt IE 9]>
						<link rel="stylesheet" type="text/css" href="css/ie8.css">
						<?php require_once('ie/ie8.inc.php'); ?>
				<![endif]-->
            </div>
				
            <div class="navbar-collapse collapse">
				<form action="#" method="post" name="nav_form">
					<input type="hidden" name="content" />
					<ul class="nav navbar-nav pull-right">
						<?php echo $array[1];?><a href="#" onclick="formSubmit('nav_form', 'home');">Home</a></li>
						<li data-toggle="modal" data-target="#myModal"><a class="navBlack" href="#">Apply Here!</a></li>
						<?php echo $array[3];?><a href="#" onclick="formSubmit('nav_form', 'employment');">Employment</a></li>
					</ul>
				 </form>
            </div>
          </div>
        </div>
      </div>
    </div>
    <!-- Carousel
    ================================================== -->
    <div id="myCarousel" class="carousel slide" data-ride="carousel">
      <!-- Indicators -->
      <ol class="carousel-indicators">
        <li data-target="#myCarousel" data-slide-to="0" class=""></li>
        <li data-target="#myCarousel" data-slide-to="1" class="active"></li>
        <li data-target="#myCarousel" data-slide-to="2"></li>
      </ol>
      <div class="carousel-inner">
        <div class="item">
		<img data-src="" alt="Second slide" src="pictures/slide3.jpg">          
		<div class="container">
            <div class="carousel-caption">
              <h1></h1>
            </div>
          </div>
        </div>
        <div class="item active">
		<img data-src="" alt="Second slide" src="pictures/slide2.jpg">
          <div class="container">
            <div class="carousel-caption">
              <h1></h1>
            </div>
          </div>
        </div>
        <div class="item">
		<img data-src="" alt="Second slide" src="pictures/slide1.jpg">
		<div class="container">
            <div class="carousel-caption">
              <h1></h1>
            </div>
          </div>
        </div>
      </div>
      <a class="left carousel-control" href="#myCarousel" data-slide="prev"><span class="glyphicon glyphicon-chevron-left"></span></a>
      <a class="right carousel-control" href="#myCarousel" data-slide="next"><span class="glyphicon glyphicon-chevron-right"></span></a>
    </div><!-- /.carousel -->


    <!-- Marketing messaging and featurettes
    ================================================== -->
    <!-- Wrap the rest of the page in another container to center all the content. -->

    
<?php 
include_once("includes/".$content.".inc.php"); 
require_once('includes/requestModal.inc.php');
?>
	<?php if($content !== 'contact'){ ?>
      <!-- FOOTER -->
      <footer>
        <p class="pull-right"><a href="#">Back to top</a></p>
        
      </footer>
	<?php } ?>
</body>
</html>
