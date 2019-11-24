<?php
require_once './vendor/autoload.php';

$helperLoader = new SplClassLoader('Helpers', './vendor');
$mailLoader   = new SplClassLoader('SimpleMail', './vendor');

$helperLoader->register();
$mailLoader->register();

use Helpers\Config;
use SimpleMail\SimpleMail;

$config = new Config;
$config->load('./config/config.php');
   
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $name    = stripslashes(trim($_POST['form-name']));
    $email   = stripslashes(trim($_POST['form-email']));
    $phone   = stripslashes(trim($_POST['form-phone']));
    $select   = stripslashes(trim($_POST['form-select']));
    $subject = stripslashes(trim($_POST['form-subject']));
    $message = stripslashes(trim($_POST['form-message']));
	$fname = stripslashes(trim($_POST['form-fname']));
    $fphone = stripslashes(trim($_POST['form-fphone']));
    $pattern = '/[\r\n]|Content-Type:|Bcc:|Cc:/i';

    if (preg_match($pattern, $name) || preg_match($pattern, $email) || preg_match($pattern, $subject)) {
        die("Header injection detected");
    }

    $emailIsValid = filter_var($email, FILTER_VALIDATE_EMAIL);

    if ($name && $email && $emailIsValid && $subject && $message) {
        $mail = new SimpleMail();

        $mail->setTo($config->get('emails.to'));
        $mail->setFrom($config->get('emails.from'));
        $mail->setSender($name);
        $mail->setSubject($config->get('subject.prefix') . ' ' . $subject);

        $body = "
        <!DOCTYPE html PUBLIC \"-//W3C//DTD XHTML 1.0 Transitional//EN\" \"http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd\">
        <html>
            <head>
                <meta charset=\"utf-8\">
            </head>
            <body>
                <h1>{$subject}</h1>
                <p><strong>{$config->get('fields.name')}:</strong> {$name}</p>
                <p><strong>{$config->get('fields.email')}:</strong> {$email}</p>
                <p><strong>{$config->get('fields.phone')}:</strong> {$phone}</p>
                 <p><strong>{$config->get('fields.subject')}:</strong> {$select }</p>
                <p><strong>{$config->get('fields.message')}:</strong> {$message}</p>
				 <p><strong>{$config->get('fields.fname')}:</strong> {$fname }</p>
                <p><strong>{$config->get('fields.fphone')}:</strong> {$fphone}</p>
            </body>
        </html>";

        $mail->setHtml($body);
        $mail->send();

        $emailSent = true;
    } else {
        $hasError = true;
    }
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <!--[if IE]>
        <meta http-equiv='X-UA-Compatible' content='IE=edge,chrome=1'>
        <![endif]-->
        <meta name="keywords" content="HTML5 Template" />
        <meta name="description" content="Be-Photography | Creative Photography Agency, Portfolio and Multipurpose HTML5 Responsive Template" />
        <meta name="author" content="itgeeksin.com" />
        <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
        <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
        <title>solar</title>
        <!-- Bootstrap -->
        <!-- Favicon -->
        <link rel="shortcut icon" href="assets/img/favicon.ico" type="image/x-icon">
        <link rel="icon" href="assets/img/favicon.ico" type="image/x-icon">
        <!-- Master Css -->
        <link href="assets/css/main.css" rel="stylesheet">
        <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
        <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
        <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
        <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
        <![endif]-->
    </head>
    <body>
        <!--//================preloader  start==============//--> 
      
        <!--//================preloader  end==============//-->  
        <!--//================Header start==============//-->  
         <header id="header">
            <div id="main-menu" class="wa-main-menu">
                <!-- Menu -->
                <div class="wathemes-menu relative">
                    <!-- navbar -->
                    <div class="navbar navbar-default mar0" role="navigation">
                        <div class="container-fluid">
                            <div class="row">
                                <div class="col-md-12 head-box">
                                    <div class="navbar-header">
                                        <!-- Button For Responsive toggle -->
                                        <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
                                        <span class="sr-only">Toggle navigation</span> 
                                        <span class="icon-bar"></span> 
                                        <span class="icon-bar"></span> 
                                        <span class="icon-bar"></span>
                                        </button> 
                                        <!-- Logo -->
                                       <a class="navbar-brand" href="index.html">
                                            
                                       <img class="site_logo" alt="Site Logo"  src="assets/img/sun1.jpg" />
                                        </a>
                                       
                                    </div>
                                    <!-- Navbar Collapse -->
                                    <div class="navbar-collapse collapse">
                                   <ul class="nav navbar-nav">
                                            <li><a href="index.html">Home</a></li>
                                           
                                             <li><a href="domentic.html">Domestic</a></li>
                                             <li><a href="commercila.html">Commercial</a></li>
                                            <li><a href="power.html">Power Plant</a></li>
                                              <li class="active"><a href="contact.php" >Contact</a></li>
                                             <li><a  class="btn btn-success" href="getstart.php">Get Started</a></li>
                                        </ul>
                                    </div>
                                    <!-- navbar-collapse -->
                                </div>
                                <!-- col-md-12 -->
                            </div>
                            <!-- row -->
                        </div>
                        <!-- container -->
                    </div>
                    <!-- navbar -->
                   
                </div>
                <!--  Menu -->
            </div>
        </header>
        <!--//================Header end==============//--> 
   <br>
        <div class="clear"></div>
        <!--//================Contact start==============//-->
        <div class="padB100 padT100">
            <div class="container">
                <!-- Theme Heading -->
                <div class="theme-heading">
                    <h1>Contact us</h1>
                    <h3><span class="heading-shape">Contact <strong>Us</strong></span></h3>
                  
                </div>
                <!-- Theme Heading -->
            </div>
            <div class="contact-us padT100 padB100">
                <div class="container">
					<div class="row">
						<div class="col-md-4 col-sm-6 col-xs-12">
							<div class="address">
								<h3>Contact</h3>
								<ul>
<li>R P Enterprises</li>
										<li><span>Address:</span>
29, Maruthinagara, Vajarhalli, Nelamangala, Bengaluru Karnataka</li>
									<li><span>Contact no:</span>+91 86609 63406, 7676396673 </li>
									<li><span>Email:</span>info@sungeetha.com</li>
								
								</ul>
							</div>
							
						</div>
						<div class="col-md-8 col-sm-6 col-xs-12">
						<div class="row">
						<div class="col-sm-12 col-md-12 offset-top-50 offset-md-top-0">
						<?php if(!empty($emailSent)): ?>
							<div class="col-md-12">
								<div class="alert alert-success text-center"><?php echo $config->get('messages.success'); ?>
							</div>
							</div>
							<?php endif; ?>
							<?php if(!empty($hasError)): ?>
							<div class="col-md-5 col-md-offset-4">
								<div class="alert alert-danger text-center"><?php echo $config->get('messages.error'); ?>
								</div>
							</div>
							<?php endif; ?>
						  </div>
						</div>
							<div class="row">
						
								<form class="theme-form" action="<?php echo $_SERVER['REQUEST_URI']; ?>" enctype="application/x-www-form-urlencoded" id="contact-form"  method="post">
									<div class="col-md-6 col-sm-6 col-xs-12">
										<input type="text" class="form-control" name="form-name" id="form-name" placeholder="<?php echo $config->get('fields.name'); ?>" required>
									</div>
									<div class="col-md-6 col-sm-6 col-xs-12">
										<input type="text"  class="form-control" name="form-email" id="form-email" placeholder="<?php echo $config->get('fields.email'); ?>" required>
									</div>
									<div class="col-md-6 col-sm-6 col-xs-12">
										<input type="text" class="form-control" name="form-phone" id="form-phone" placeholder="<?php echo $config->get('fields.phone'); ?>" required>
									</div>
									<div class="col-md-6 col-sm-6 col-xs-12">
										<input type="text"  class="form-control" name="form-subject" id="form-subject" placeholder="<?php echo $config->get('fields.subject'); ?>" required>
									</div>
									<div class="col-md-6 col-sm-6 col-xs-12">
										<input type="text"  class="form-control" name="form-fname" id="form-fname" placeholder="<?php echo $config->get('fields.fname'); ?>">
									</div>
									<div class="col-md-6 col-sm-6 col-xs-12">
										<input type="text"  class="form-control" name="form-fphone" id="form-fphone" placeholder="<?php echo $config->get('fields.fphone'); ?>">
									</div>
									<div class="col-md-12 col-sm-12 col-xs-12">
										<select id="form-select" name="form-select">
											<option value="">Select Option</option>
											<option value="CustomerEnquiry">Customer Enquiry</option>
											
										 </select>
										  
									</div>
									
									<div class="col-md-12 col-sm-12 col-xs-12">
									
										<textarea class="form-control" id="form-message" name="form-message" placeholder="<?php echo $config->get('fields.message'); ?>" required rows="8"></textarea>
									</div>
									<div class="col-md-6 col-sm-6 col-xs-12">
									<button type="submit" class="btn btn-success btn-lg"><?php echo $config->get('fields.btn-send'); ?></button>		

										
									</div>
								</form>
							</div>
						</div>
					</div>
                </div>
            </div>
			<div class="contact-map">
				<div class="container">						
					<div class="map-responsive">
						<iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3887.4323470793934!2d77.56936131482242!3d13.008116990831875!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x0%3A0x0!2zMTPCsDAwJzI5LjIiTiA3N8KwMzQnMTcuNiJF!5e0!3m2!1sen!2sau!4v1519308972544" id="map" frameborder="0" style="border:0" allowfullscreen></iframe>
                   
					</div>
				</div>
			</div>
            <div class="clear"></div>
        </div>
        <!--//================Contact end==============//-->
        <div class="clear"></div>
        <!--//================Footer start==============//-->
                           <footer class="main_footer">
            <div class="top_footer">
                <div class="container">
                    <div class="row">
                        <div class="footer-box">
                            <div class="col-md-4 col-sm-4 col-xs-12">
                                <div class="foot-sec">
                                     <a href="index.html" class="footer-logo">
                                        <h4 style="color:white;">Sungeetha </h4>
<!--                                        <img class="site_logo" alt="Site Logo"  src="assets/img/logo.png" />-->
                                    </a>
                                    <p>Sungeetha Green Energy Solutions Team has years of experience in Solar industry, providing professional advise and services with an outstanding reputation for high quality installation. We use only high quality components and our products are tested for high level of reliability and quality for serving Indian market.</p><ul class="social-icon">
                                      <li><a href="#"><span><i class="fa fa-facebook" aria-hidden="true"></i></span></a></li>
                                    </ul>
                                </div>
                            </div>
                             <div class="col-md-2 col-sm-3 col-xs-12">
                                <div class="foot-sec">
                                    <h4 style="color:white;">Company</h4><br>
                                     <ul>
                                        <li><a href="about.html" class="footera"><span><i class="fa fa-angle-double-right" aria-hidden="true"></i></span>About Us</a></li>
                                        <li><a href="why-solar.html" class="footera"><span><i class="fa fa-angle-double-right" aria-hidden="true"></i></span>Why Solar</a></li>
                                        <li><a href="Did-you-Know.html" class="footera"><span><i class="fa fa-angle-double-right" aria-hidden="true"></i></span>Did you Know</a></li>
                                        
                                        <li><a href="Economics-Of-Solar.html" class="footera"><span><i class="fa fa-angle-double-right" aria-hidden="true"></i></span>Economics Of Solar</a></li>
                                     <li><a href="How-Green-Are-Our-Systems.html" class="footera"><span><i class="fa fa-angle-double-right" aria-hidden="true"></i></span>How Green Are Our Systems</a></li>
                                   
									</ul>
                                </div>
                            </div>
                            <div class="col-md-2 col-sm-3 col-xs-12">
                                <div class="foot-sec">
                                    <h4 style="color:white;">Solutions</h4><br>
                                     <ul>
                                        <li><a href="domentic.html" class="footera"><span><i class="fa fa-angle-double-right" aria-hidden="true"></i></span>Domestic</a></li>
                                        <li><a href="commercila.html" class="footera"><span><i class="fa fa-angle-double-right" aria-hidden="true"></i></span>Commercial</a></li>
                                        <li><a href="power.html" class="footera"><span><i class="fa fa-angle-double-right" aria-hidden="true"></i></span>Power plant </a></li>
                                        
                                    </ul>
                                </div>
                            </div>
                            <div class="col-md-2 col-sm-3 col-xs-12">
                                 <div class="foot-sec">
                                   <h4 style="color:white;">Products</h4><br>
                                     <ul>
                                        <li><a href="solar-system.html" class="footera"><span><i class="fa fa-angle-double-right" aria-hidden="true"></i></span>Solar System</a></li>
                                        <li><a href="head-pump.html" class="footera"><span><i class="fa fa-angle-double-right" aria-hidden="true"></i></span>Heat Pump</a></li>
                                        <li><a href="Packages.html" class="footera"><span><i class="fa fa-angle-double-right" aria-hidden="true"></i></span>Special Packages</a></li>
                                       </ul>
                                </div>
                            </div>
                             <div class="col-md-2 col-sm-2 col-xs-12">
                                 <div class="foot-sec">
                                     <h4 style="color:white;">Contact us</h4><br>
                                      <ul>
                                        <li><a href="contact.php"  class="footera"><span><i class="fa fa-angle-double-right" aria-hidden="true"></i></span>Contact Us</a></li>
                                          <li><a href="contact.php"  class="footera"><span><i class="fa fa-angle-double-right" aria-hidden="true"></i></span>Customer Enquiry</a></li>
                                       
                                       </ul>
                                    
                               <p><a href="Friend.html" class="footera" style="text-align:center;"><img src="assets/img/blog/refer-a-friend-png-0.png" class="refrsima"/><br>Click here</a></p>
                                   
                                  </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
             <div class="top_footers">
                <div class="container">
                    <div class="row">
                        <div class="col-md-12 col-sm-12 col-xs-12 text-center">
                            <ul class="termandcondtiopn text-center">
                                        <li class="termandcondtiopn"><a href="terms-and-conditions.html" class="footera">Term & condtions</a></li>
                                        <li class="termandcondtiopn"><a href="privacy.html" class="footera">Privacy Statement</a></li>
                                         <li class="termandcondtiopn"><a href="complaint-process.html" class="footera">FQA</a></li>
                                         <li class="termandcondtiopn"><a href="dmca.html" class="footera">Warranty</a></li>
                                        <li class="termandcondtiopn"><a href="contact.html" class="footera">Feedback</a></li>
                                    </ul>
                        </div>
                    </div>
                </div>
            </div>
            <div class="bottom-footer padTB20">
                <div class="container">
                    <div class="row">
                        <div class="col-md-12 col-sm-12 col-xs-12 text-center">
                            <p>Copyright 2017  All Right Reserved <a href="http://www.svarks.com/"><span class="theme-color">Svarks</span></a></p>
                        </div>
                        
                    </div>
                </div>
            </div>
        </footer>
        <!--//================Footer end==============//--> 	
        <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
        <script src="assets/js/jquery.min.js"></script>
        <script src="assets/js/bootstrap.min.js"></script>
        <script src="assets/plugin/megamenu/js/hover-dropdown-menu.js"></script>
        <script src="assets/plugin/megamenu/js/jquery.hover-dropdown-menu-addon.js"></script>
        <script src="assets/plugin/owl-carousel/js/owl.carousel.min.js"></script>
        <script src="assets/plugin/fancyBox/js/jquery.fancybox.pack.js"></script>
        <script src="assets/plugin/fancyBox/js/jquery.fancybox-media.js"></script> 		
        <script src="assets/plugin/mixItUp/js/jquery.mixitup.js"></script>

        <script src="assets/js/main.js"></script>
    </body>


</html>