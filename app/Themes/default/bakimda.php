<!DOCTYPE html>
<html lang="en">
<head>
	<title>Yapım Aşamasında</title>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
<!--===============================================================================================-->	
	<link rel="icon" type="image/png" href="<?=siteurl.themeurl?>/mainjscss/bakimda/images/icons/favicon.ico"/>
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="<?=siteurl.themeurl?>/mainjscss/bakimda/vendor/bootstrap/css/bootstrap.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="<?=siteurl.themeurl?>/mainjscss/bakimda/fonts/font-awesome-4.7.0/css/font-awesome.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="<?=siteurl.themeurl?>/mainjscss/bakimda/fonts/iconic/css/material-design-iconic-font.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="<?=siteurl.themeurl?>/mainjscss/bakimda/vendor/animate/animate.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="<?=siteurl.themeurl?>/mainjscss/bakimda/vendor/select2/select2.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="<?=siteurl.themeurl?>/mainjscss/bakimda/css/util.css">
	<link rel="stylesheet" type="text/css" href="<?=siteurl.themeurl?>/mainjscss/bakimda/css/main.css">
<!--===============================================================================================-->
</head>
<body>
	
	
	<div class="bg-g1 size1 flex-w flex-col-c-sb p-l-15 p-r-15 p-t-55 p-b-35 respon1">
		<span></span>
		<div class="flex-col-c p-t-50 p-b-50">
			<h3 class="l1-txt1 txt-center p-b-10">
				Bakımda
			</h3>

			<p class="txt-center l1-txt2 p-b-60">
			Sitemiz şuanda bakımda kısa bir süre sonra tekrar deneyin
			</p>

		
		</div>

		<span class="s1-txt3 txt-center">
			<?=info("sitetitle")?>
		</span>
		
	</div>

	

<!--===============================================================================================-->	
	<script src="<?=siteurl.themeurl?>/mainjscss/bakimda/vendor/jquery/jquery-3.2.1.min.js"></script>
<!--===============================================================================================-->
	<script src="<?=siteurl.themeurl?>/mainjscss/bakimda/vendor/bootstrap/js/popper.js"></script>
	<script src="<?=siteurl.themeurl?>/mainjscss/bakimda/vendor/bootstrap/js/bootstrap.min.js"></script>
<!--===============================================================================================-->
	<script src="<?=siteurl.themeurl?>/mainjscss/bakimda/vendor/select2/select2.min.js"></script>
<!--===============================================================================================-->
	<script src="<?=siteurl.themeurl?>/mainjscss/bakimda/vendor/countdowntime/moment.min.js"></script>
	<script src="<?=siteurl.themeurl?>/mainjscss/bakimda/vendor/countdowntime/moment-timezone.min.js"></script>
	<script src="<?=siteurl.themeurl?>/mainjscss/bakimda/vendor/countdowntime/moment-timezone-with-data.min.js"></script>
	<script src="<?=siteurl.themeurl?>/mainjscss/bakimda/vendor/countdowntime/countdowntime.js"></script>
	<script>
		$('.cd100').countdown100({
			// Set Endtime here
			// Endtime must be > current time
			endtimeYear: 0,
			endtimeMonth: 0,
			endtimeDate: 35,
			endtimeHours: 18,
			endtimeMinutes: 0,
			endtimeSeconds: 0,
			timeZone: "" 
			// ex:  timeZone: "America/New_York", can be empty
			// go to " http://momentjs.com/timezone/ " to get timezone
		});
	</script>
<!--===============================================================================================-->
	<script src="<?=siteurl.themeurl?>/mainjscss/bakimda/vendor/tilt/tilt.jquery.min.js"></script>
	<script >
		$('.js-tilt').tilt({
			scale: 1.1
		})
	</script>
<!--===============================================================================================-->
	<script src="<?=siteurl.themeurl?>/mainjscss/bakimda/js/main.js"></script>

</body>
</html>