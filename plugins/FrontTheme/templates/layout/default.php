<!DOCTYPE html>
<html lang="fr" class="no-js">

<head>
	<!-- Mobile Specific Meta -->
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	<!-- Favicon-->
	<link rel="shortcut icon" href="img/fav.png">
	<!-- Author Meta -->
	<meta name="Author" content="Van Ossel Grégory">
	<!-- Meta Description -->
	<meta name="description" content="Un site ecommerce de test">
	<!-- Meta Keyword -->
	<meta name="keywords" content="cake,shop,code,bake">
	<!-- meta character set -->
	<?= $this->Html->charset('utf-8'); ?>
	<!-- Site Title -->
	<title>Cake Shop</title>
	<!--
		CSS
		============================================= -->
        
        <?= $this->Html->css([
            'FrontTheme./css/linearicons',
            'FrontTheme./css/font-awesome.min',
            'FrontTheme./css/themify-icons',
            'FrontTheme./css/bootstrap',
            'FrontTheme./css/owl.carousel',
            'FrontTheme./css/nice-select',
            'FrontTheme./css/nouislider.min',
            'FrontTheme./css/ion.rangeSlider',
            'FrontTheme./css/ion.rangeSlider.skinFlat',
            'FrontTheme./css/magnific-popup.css',
            'FrontTheme./css/main.css'
        ]); ?> 
	
</head>

<body>
    
    <!--Contenu page-->
    <?= $this->fetch('content'); ?>
    
    <!--Menu-->
    <?= $this->Element('FrontTheme.layout/menu'); ?>
    
    <!--Contenu page-->
    <?= $this->fetch('content'); ?>

    <!--Footer-->
    <?= $this->Element('FrontTheme.layout/footer'); ?>  

    <!--Script Js-->
    <?= $this->Html->script([
        'FrontTheme./js/vendor/jquery-2.2.4.min',
        'FrontTheme./js/vendor/bootstrap.min',
        'FrontTheme./js/jquery.ajaxchimp.min',
        'FrontTheme./js/jquery.nice-select.min',
        'FrontTheme./js/jquery.sticky',
        'FrontTheme./js/nouislider.min',
        'FrontTheme./js/countdown.js',
        'FrontTheme./js/jquery.magnific-popup.min',
        'FrontTheme./js/owl.carousel.min',
        'FrontTheme./js/gmaps.min',
        'FrontTheme./js/main.js'
    ]); ?>

	<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.11.0/umd/popper.min.js" integrity="sha384-b/U6ypiBEHpOf/4+1nzFpr53nxSS+GLCkfwBdFNTxtclqqenISfwAzpKaMNFNmj4"
	 crossorigin="anonymous"></script>
	<script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyCjCGmQ0Uq4exrzdcL6rvxywDDOvfAu6eE"></script>

</body>
</html>
