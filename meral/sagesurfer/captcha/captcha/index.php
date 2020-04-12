
<!DOCTYPE html>
<html>
<head>
<title>SageSurfer - Contact</title>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.0/jquery.min.js"></script>
<link rel="stylesheet" href="css/bootstrap.min.css">
<link rel="stylesheet" href="css/style.css">
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.2.0/css/font-awesome.min.css">
<link href='https://fonts.googleapis.com/css?family=Open+Sans' rel='stylesheet' type='text/css'>
<link rel="shortcut icon" href="favicon.ico">  
    <link href='http://fonts.googleapis.com/css?family=Roboto:400,400italic,500,500italic,700,700italic,900,900italic,300italic,300' rel='stylesheet' type='text/css'> 
    <link href='http://fonts.googleapis.com/css?family=Roboto+Slab:400,700,300,100' rel='stylesheet' type='text/css'>
	<link type="image/x-icon" href="./favicon.ico" rel="shortcut icon">
<script src="js/bootstrap.min.js"></script>
<script src="js/common.js"></script>
</head>
<body data-spy="scroll" data-target=".navbar" data-offset="50">
<script>
  (function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
  (i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
  m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
  })(window,document,'script','//www.google-analytics.com/analytics.js','ga');

  ga('create', 'UA-74585975-1', 'auto');
  ga('send', 'pageview');

</script><header class="header navbar-fixed-top" id="header">
        <div class="container">       
                <a href="index.php" class="pull-left"><img src="images/sagesurfer_logo.png" style="margin-top:6px;" alt="sagesurfer-logo"></a>
           <!--//logo-->
            <nav role="navigation" class="navbar main-nav navbar-right">
                <div class="navbar-header">
                    <button data-target="#navbar-collapse" data-toggle="collapse" type="button" class="navbar-toggle">
                        <span class="sr-only">Toggle navigation</span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                    </button><!--//nav-toggle-->
                </div><!--//navbar-header-->
                <div class="navbar-collapse collapse" id="navbar-collapse">
					<!--script>
						function myhome(){
							window.location="index.php";
						}
					</script-->
                    <ul class="nav navbar-nav">
						
						<li class="nav-item"><a href="index.php">Home</a></li>
                        <li class="nav-item"><a href="about.php">About</a></li>
                       
						<li class="nav-item"><a href="teams.php">Team</a></li>
						<li class="nav-item dropdown">
                            <a href="#" data-close-others="false" data-delay="0" data-hover="dropdown" data-toggle="dropdown" class="dropdown-toggle">Product <i class="fa fa-angle-down"></i></a>
                            <ul class="dropdown-menu">
                                <li><a href="whatweoffer.php">What We Offer</a></li>
                                <li ><a href="product_how_this_works.php">How This Works</a></li>
                                <li><a href="product_how_we_help.php">How We Help</a></li>
                                <!--li><a href="outcomes.php">Outcomes</a></li-->
                               <!-- <li><a href="product_why.php">Why We're Different</a></li>-->
                                <li><a href="testimonials.php">Testimonials</a></li>                    
							 <!--<li><a href="booking.php">Conf. Booking</a></li>-->
                            </ul>                            
                        </li><!--//dropdown-->  
						<li class=" active nav-item"><a href="contact.php">Contact</a></li>
						 <li class="nav-item"><a href="blog.php">Blog</a></li>
                    </ul><!--//nav-->
                </div><!--//navabr-collapse-->
            </nav><!--//main-nav-->                     
        </div><!--//container-->
		
    </header>
	<script>
	$(document).on('click',function(){
	$('.collapse').collapse('hide');
})
	$('ul.nav li.dropdown').hover(function() {
  $(this).find('.dropdown-menu').stop(true, true).delay(200).fadeIn(500);
}, function() {
  $(this).find('.dropdown-menu').stop(true, true).delay(200).fadeOut(500);
});
</script>

<!--	REQUREST A DEMO MODAL POPUP : CALLILNG FROM INDEX AND BLOG PAGE -->
<div class="modal fade" id="myModal" role="dialog">
    <div class="modal-dialog">
    
      <!-- Modal content-->
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h4 class="modal-title">Request A Demo</h4>
        </div>
        <div class="modal-body">
			<div class="row item request_section">
				<figure class="figure col-md-5 col-sm-4 col-xs-12  col-md-offset-1 col-sm-offset-0 col-xs-offset-0" style="margin: 0 0 2px 4px; padding-left: 0;">
                        <img class="img-responsive" src="images/girlfone2.jpg" alt="">
                    </figure>
                    <div class="content col-md-6 col-sm-7 col-xs-12 ">
                        <div class="desc">
                            <p class="padd10">We look forward to talking with you about <strong>Collaborative Care Connection</strong>. We will follow-up within 24 hours</p>
                        </div>
                    </div><!--//content-->
                    
                </div>
          <div class="form-container">
                                    <form metho="" id="enquiry-form" class="enquiry-form" novalidate="novalidate">
									<div class="form-group name">
                                            <label class="sr-only" for="enquiry-name">Name</label>
                                            <input type="text" name="enquiry-name" id="enquiry-name" class="form-control required" placeholder="Name" aria-required="true" maxlength="100">
                                        </div><!--//form-group-->									
                                        <div class="form-group email">
                                            <label class="sr-only" for="enquiry-email">Email</label>
                                            <input type="email" name="enquiry-email" id="enquiry-email" class="form-control required email" placeholder="Email" aria-required="true" maxlength="100">
                                        </div><!--//form-group-->
                                        <div class="form-group phone">
                                            <label class="sr-only" for="enquiry-phone">Phone number</label>
                                            <input type="text" name="enquiry-phone" id="enquiry-phone" class="form-control required number" placeholder="Phone number" aria-required="true" maxlength="20">
                                        </div>
										<!--Below code added by deva for captcha  start-->
										<div class="form-group phone">
											<!--<input type="text" id="txtInput11"  oninput="check(this)" style="width: 46%;" class="txtInput11 form-control pull-left">-->
											<input type="text" placeholder="fill the text shown in beside picture" class="form-control pull-left" id="txtInput_popup" name="txtInput_popup" style="width: 74%;" >
											<input type="text" style="width: 15%; margin-left:10px;" id="txtCaptcha_popup" readonly="" disabled="" class="form-control pull-left col-sm-4">
											<a class="fa fa-refresh btn btn-red btn-round" style="margin-top:8px;" id="bntRefresh_popup" aria-expanded="false"></a>
										</div>
										<!--Above code added by deva for captcha  start-->
										<!--//form-group-->
										<!--div class="form-group message">
                                            <label class="sr-only" for="enquiry-phone">Message</label>
                                            <textarea class="required" name="enquiry-message" id="enquiry-message" maxlength="1000" placeholder="Message" aria-required="true"></textarea>
                                        </div--><!--//form-group-->
									<div class="alert alert-success" id="succ-msg" style="display:none;" >
									  <strong>Thank you!</strong> we will update you soon
</div>
                                    </form>
                                </div>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-primary" id="contact_send" >Submit</button>
        </div>
      </div>
      
    </div>
  </div>
  	<div class="bg-slider-wrapper bg-slider-wrapper-contact respo_bg_slider_wrapper">
        <div class="flexslider bg-slider">
            <ul class="slides">
                <li class="slide slide-1" style="width: 100%; float: left; margin-right: -100%; position: relative; opacity: 0; display: block; z-index: 1;"></li>
            </ul>
        </div>
    </div>
	<section class="promo contact section-on-bg promo_respo_bg_slider_wrapper">
        <div class="container">                
            <h1 class="title">Let's Connect</h1>
        </div><!--//container-->
    </section>
<div class="sections-wrapper">   
        <section class="section how" id="how">
            <div class="container">
                <div class="row item press respo_press">
                    <div class="content col-md-6 col-sm-12 col-xs-12 ">
                        <div class="preview-pane respo_priew_pane_contact">
                        <h3 class="blue">Contact</h3>
                        <p>LET'S CONNECT</p>
						<a href="mailto:info@sagesurfer.com">info@sagesurfer.com</a>
						<hr class="colored">
						<p>GET SUPPORT</p>
						<a href="mailto:support@sagesurfer.com">support@sagesurfer.com</a>
                        <div class="social-media">
							<a target="_blank" href="https://www.linkedin.com/company/sagesurfer"><i class="fa fa-linkedin-square ln"></i></a>
							<a target="_blank" href="https://twitter.com/sagesurfer"><i class="fa fa-twitter-square tw"></i></a>
							<a target="_blank" href="https://www.facebook.com/SageSurfer-348873351796372/"><i class="fa fa-facebook-square fb"></i></a>
						</div>
                </div>
                    </div><!--//content-->
					<div class="content col-md-6 col-sm-12 col-xs-12 ">
                        <div class="preview-pane respo_priew_pane_contact">
                        <h3 class="blue">Got a Question?</h3>
                        <div class="form-container">
                                    <form class="contact-form" id="contact-form" >
									<div class="form-group name">
                                            <label for="contact-name" class="sr-only">Name</label>
                                            <input type="text" placeholder="Name" class="form-control" id="contact-name" name="contact-name" maxlength="100">
                                        </div><!--//form-group-->									
                                        <div class="form-group email">
                                            <label for="contact-email" class="sr-only">Email</label>
                                            <input type="email" placeholder="Email" class="form-control required email" id="contact-email" name="contact-email" maxlength="100">
                                        </div><!--//form-group-->
                                        <div class="form-group phone">
                                            <label for="contact-phone" class="sr-only">Phone number</label>
                                            <input type="text" placeholder="Phone number" class="form-control required number" id="contact-phone" name="contact-phone" maxlength="20">
                                        </div>
									<!--Below code added by deva for captcha  start-->
										<div class="form-group phone">
											<!--<input type="text" id="txtInput11"  oninput="check(this)" style="width: 46%;" class="txtInput11 form-control pull-left">-->
											<input type="text" placeholder="fill the text shown in beside picture" class="form-control pull-left" id="txtInput" name="txtInput" style="width: 74%;" >
											<input type="text" style="width: 15%; margin-left:10px;" id="txtCaptcha" readonly="" disabled="" class="form-control pull-left col-sm-4">
											<a class="fa fa-refresh btn btn-red btn-round" style="margin-top:8px;" id="bntRefresh" aria-expanded="false"></a>
										</div>
										<!--Above code added by deva for captcha  start-->
								<div class="clear"></div>
								
									<div class="alert alert-success" id="contact-msg" style="display:none;" >
									  <strong>Thank you!</strong> we will update you soon
</div>
										
                                        <button class="btn btn-cta-primary pull-left" type="button" id="contact_send_btn">SEND</button>
                                    </form>
                                </div>
                        
                </div>
                    </div><!--//content-->
                </div><!--//item-->
				
            </div><!--//container-->
        </section>
    </div>
	<div style="height:59px;"></div>
<footer class="footer">
	<div class="bottom-bar">
		<div class="container">
			<small class="copyright">Copyright @ 2016 <a target="_blank" href="http://www.sagesurfer.com/">sagesurfer.com</a></small>  
<div class="footer-col-inner pull-right">
						<ul class="social list-inline">
						   
							<li><a target="_blank" href="https://www.facebook.com/SageSurfer-348873351796372/"><i class="fa fa-facebook-square"></i></a></li> 
							<li><a target="_blank" href="https://twitter.com/sagesurfer"><i class="fa fa-twitter-square"></i></a></li>
							<li><a target="_blank" href="https://www.linkedin.com/company/sagesurfer"><i class="fa fa-linkedin-square"></i></a></li>
									  
						</ul>
					</div>				
		</div><!--//container-->
	</div><!--//bottom-bar-->
</footer>
<div id="topcontrol" style="position: fixed; bottom: 5px; right: 5px; opacity: 1; cursor: pointer;" title="Scroll Back to Top"><i class="fa fa-angle-up"></i></div>
<script src="js/main.js"></script>
<script src="https://code.highcharts.com/highcharts.js"></script>
<script src="https://code.highcharts.com/modules/exporting.js"></script>	<script src="./js/jquery.validate.min.js" ></script>
	<script>

	
		jQuery(document).ready(function(){
			
				var captchaVal = DrawCaptcha();
				$("#txtCaptcha").val(captchaVal);
				//added query rule for capcha
				jQuery('#contact-form').validate({
					  rules: {
						'contact-name': {
						  required: true,
						  rangelength: [3, 100]
						},
						'contact-phone': {
						required: true,
						 rangelength: [10, 20]
						},
						'txtInput': {
						required: true,
						equalTo: "#txtCaptcha".replace(/ /g,'')
						}
					  }
					});
				
				jQuery('#contact_send_btn').click(function(){
					
					
					if(jQuery('#contact-form').valid())
					{
						 $.post("ajax.php?action=contact",jQuery('#contact-form').serialize(),function(){
							
							jQuery('#contact-name').val('');
							jQuery('#contact-email').val('');
							jQuery('#contact-phone').val('');
							jQuery('#txtInput').val('');
							
							jQuery('#contact-msg').show()
							setTimeout("jQuery('#contact-msg').hide()",2000);
						}) 
					}
					
				})
		
		});
	
	$(document).on("click", "#bntRefresh", function()  {
		var txtInput = $("#txtInput");
		txtInput.val('');
		var captchaVal = DrawCaptcha();
		$("#txtCaptcha").val(captchaVal);
		$('#txtCaptcha').val().replace(/ +?/g, '');
	});
	
	


	
	</script>
</body>
</html>