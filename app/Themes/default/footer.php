<?php
if(
	$urlget[0]=="kisisel-bilgilerim"
	or $urlget[0]=="olcum-gir"
	or $urlget[0]=="olcumlerim"
	or $urlget[0]=="diyetlerim"
	or $urlget[0]=="randevular"
	or $urlget[0]=="odemelerim"
	or $urlget[0]=="onemli-notlar"
	or $urlget[0]=="olcum-duzenle"
	or $urlget[0]=="olcum-goruntule"
	or $urlget[0]=="diyetdetay"
	or $urlget[0]=="diyetnot"
){
?>
	</main>
  </div>
</div> 
  
    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
	<?=$siteayar["ayarlar_sitefooter"]?>
	

    <script src="<?=siteurl.themeurl?>/assetspanel/js/jquery-3.4.1.min.js"></script>
    <script src="<?=siteurl.themeurl?>/assetspanel/js/bootstrap.bundle.min.js"></script>
    <script src="<?=siteurl.themeurl?>/assetspanel/js/lightslider.js"></script>
    <script src="<?=siteurl.themeurl?>/assetspanel/js/lity.min.js"></script>
    <script src="<?=siteurl.themeurl?>/assetspanel/js/moment.min.js"></script>
    <script src="<?=siteurl.themeurl?>/assetspanel/js/fullcalendar.min.js"></script>
	
	<?php if($siteayar["ayarlar_mailrecaptcha"]==1){ ?>
	<script src='https://www.google.com/recaptcha/api.js?hl=<?=paneldil?>'></script>	
	<?php } ?>
	<?php if($siteayar["ayarlar_mailrecaptcha"]==1){ ?>
	<!--<div class="g-recaptcha" data-sitekey="<?=$siteayar["ayarlar_recaptchaskey"]?>"></div>	-->
	<?php } ?>	
	<script src="<?=siteurl.themeurl?>/mainjscss/jquery.mask.js"></script>
	<script src="<?=siteurl.themeurl?>/mainjscss/toastr-master/toastr.js"></script>
	<script src="<?=siteurl.themeurl?>/mainjscss/lazyload.min.js"></script>
	<script src="<?=siteurl.themeurl?>/mainjscss/main.js"></script>
	<script src="<?=siteurl.themeurl?>/mainjscss/app.js"></script>
	<?php if($siteayar["ayarlar_sitelazy"]>0){ ?>
    <script>
		$("img").lazyload();
	</script>
	<?php } ?>
	<script language="JavaScript">
		function yazdir() {
		var yazdirilacakAlan= document.getElementById('yazdirilacakBolge').innerHTML;
		var orjinalSayfa= document.body.innerHTML;
		document.body.innerHTML = yazdirilacakAlan;
		window.print();
		document.body.innerHTML = orjinalSayfa;
		}
		
		$(document).ready(function() {
			$('#sondurum').html('<?=$sonagirlikfark?>');
		});
		$(document).on('click','#menuac',function(){
			$('.menualan').toggle();
		});
	</script>
	
		<script>

  $(document).ready(function() {

    $('#calendar').fullCalendar({       
	monthNames: ['Ocak','Şubat','Mart','Nisan','Mayıs','Haziran','Temmuz','Ağustos','Eylül','Ekim','Kasım','Aralık'],
	monthNamesShort: ['Ocak','Şubat','Mart','Nisan','Mayıs','Haziran','Temmuz','Ağustos','Eylül','Ekim','Kasım','Aralık'],
	dayNames: ['Pazar','Pazartesi','Salı','Çarşamba','Perşembe','Cuma','Cumartesi'],
	dayNamesShort: ['Pazar','Pazartesi','Salı','Çarşamba','Perşembe','Cuma','Cumartesi'],
	buttonText: {
		today:    'Bugün',
		month:    'Ay',
		week:     'Hafta',
		day:      'Gün',
		list:     'Liste',
		listMonth: 'Aylık Liste',
		listYear: 'Yıllık Liste',
		listWeek: 'Haftalık Liste',
		listDay: 'Günlük Liste'
	},
	header: {
	left: 'prev,next today',
	center: 'title',
	right: 'month,basicWeek,basicDay'
	},
	navLinks: true, // can click day/week names to navigate views
	editable: true,
	eventLimit: true, // allow "more" link when too many events
	defaultDate: '<?=date("Y-m-d")?>',
	editable: true,
	eventLimit: true, // allow "more" link when too many events
	events: [
		<?=implode(",",$calendar);?>
	]
    });

  });

</script>
  </body>
</html> 

<?php
}else{
?>	

		<section id="footer">
			<div class="ust">
				<div class="container">
					<a href="<?=sabit("Footer Üst")?>" class="tanis">
						<?=sabit("Footer Üst",2)?>
					</a>
				</div>
			</div>
			<div class="orta">
				<div class="container">
					<div class="row">
						<div class="col-md-2">
							<a href="<?=url?>" class="logo">
								<img src="<?=info("logodark")?>">
							</a>
						</div>
						<div class="col-md-10">
							<div class="row">
								<div class="col-md-3">
									<?=menu("Footer Menü 1","",4)?>
								</div>
								<div class="col-md-3">
									<div class="menubas"><?=pd("LOKASYON")?></div>
									<a href="<?=info("maplink")?>" target="_blank" class="menulink"><?=info("adres")?></a>
									<div class="mb-3 text-center">
	                                <a href="<?=info("maplink")?>" target="_blank">
                                  	<button type="submit" style="padding:0px 15px; height: 40px;" class="btn btn-ana"><?=pd("Yol Tarifi Al")?></button>
	                                </a>
	                                </div>
								</div>
								<div class="col-md-3">
									<div class="menubas"><?=pd("BİZE ULAŞIN")?></div>
									<a href="tel:<?=info("telefon1")?>" class="menulink"><?=info("telefon1")?></a>
									<a href="mailto:<?=info("mail")?>" class="menulink"><?=info("mail")?></a>
								</div>
								<div class="col-md-3">
									<div class="menubas"><?=pd("SOSYAL MEDYA")?></div>
									<div class="sosyal">
										<?php if(info("facebook")!=""){ ?>
										<a href="<?=info("facebook")?>" target="_blank" rel="nofollow"><i class="fa-brands fa-facebook-f"></i></a>
										<?php } ?>
										<?php if(info("linkedin")!=""){ ?>
										<a href="<?=info("linkedin")?>" target="_blank" rel="nofollow"><i class="fa-brands fa-linkedin"></i></a>
										<?php } ?>
										<?php if(info("instagram")!=""){ ?>
										<a href="<?=info("instagram")?>" target="_blank" rel="nofollow"><i class="fa-brands fa-instagram"></i></a>
										<?php } ?>
										<?php if(info("youtube")!=""){ ?>
										<a href="<?=info("youtube")?>" target="_blank" rel="nofollow"><i class="fa-brands fa-youtube"></i></a>
										<?php } ?>
								        <?php if(info("whatsapp")!=""){ ?>
				                        <a href="https://wa.me/<?=info("whatsapp")?>" target="_blank" rel="nofollow"><i class="fab fa-whatsapp"></i></a>
				                        <?php } ?>
										<?php if(info("twitter")!=""){ ?>
				                        <a href="<?=info("twitter")?>" target="_blank" rel="nofollow"><i class="fa-brands fa-x-twitter"></i></a>
				                        <?php } ?>
									</div>
								</div>
							</div>
							<div class="altmenu">
								<?=menu("Footer Menü 2","",4)?>
							</div>
							<div class="altmenu">
								<img src="<?=sabitr("Footer Logolar")?>" style="width:100%;">
							</div>
						</div>
					</div>
				</div>
			</div>
			<div class="alt">
				<div class="container">
					<div class="altic">
						<div class="copy"><?=sabit("Copyright")?></div>
						<a href="<?=sabit("Copyright",2)?>" target="_blank" class="fav"><?=sabit("Copyright",3)?></a>
					</div>
				</div>
			</div>
		</section>
		
	</main>
	
<?php if (info("whatsapp") != "") { ?>
	<section id="whatsapp">
		<div class="sohbet shadow">
			<div class="ust">
				<div class="avatar">
					<img src="<?= info("favicon") ?>">
				</div>
				<div class="isim"><?= info("sitetitle") ?></div>
				<div class="cevap"><?= pd("Yaklaşık 1 saat içerisinde cevap verebilir.") ?></div>
				<a href="javascript:;" class="kapat" onclick="$('#whatsapp .sohbet').hide();" title="whatsapp"><i class="fas fa-times"></i></a>
			</div>
			<div class="orta">
				<div class="baloncuk">
					<div class="isim"><?= info("sitetitle") ?></div>
					<?= pd("Merhaba, Size nasıl yardımcı olabilirim?") ?>
					<div class="saat"><?= date("H:i") ?></div>
				</div>
			</div>
			<div class="alt">
				<a href="https://api.whatsapp.com/send?phone=<?= info("whatsapp") ?>&text=<?= pd("Merhaba") ?>" target="_blank" class="btn btn-success btn-block" title="whatsapp"><?= pd("Bilgi Al") ?></a>
			</div>
		</div>
		<a href="javascript:;" class="buton" onclick="$('#whatsapp .sohbet').toggle();" title="whatsapp"><i class="la la-whatsapp"></i></a>
	</section>
<?php } ?>	


    <section id="yukari">
		<a href="#header" class="buton" ><i class="fa fa-arrow-up"></i></a>
	</section>
	
	<section id="yukarimobil">
		<a href="https://elifnidazafer.com/tr/#slider" class="buton" ><i class="fa fa-arrow-up"></i></a>
	</section>
	
	
<!--	<?php if($_COOKIE["cerezpolitikasi"]!=1){ ?>
	<div class="cerezpolitikasi">
		<?=sabit("Çerez Politikası")?><br><br>
		<a href="javascript:;" class="btn btn-light" onclick="$('.cerezpolitikasi').remove();" data-islem="cerezpolitikasi" data-deger="1"><?=pd("Kabul Ediyorum")?></a>
	</div>
	<?php } ?> -->

	
	<?=$siteayar["ayarlar_sitefooter"]?>
	

    <script src="<?=siteurl.themeurl?>/assets/js/jquery-3.6.0.min.js"></script>
    <script src="<?=siteurl.themeurl?>/assets/js/bootstrap.bundle.min.js"></script>
    <script src="<?=siteurl.themeurl?>/assets/js/swiper-bundle.min.js"></script>
    <script src="<?=siteurl.themeurl?>/assets/js/wow.min.js"></script>
    <script src="<?=siteurl.themeurl?>/assets/js/lity.min.js"></script>
    <script src="<?=siteurl.themeurl?>/assets/js/aos.js"></script>
    <script src="<?=siteurl.themeurl?>/assets/js/fancybox.js"></script>
    <script src="<?=siteurl.themeurl?>/assets/js/all.min.js"></script>
    <script src="<?=siteurl.themeurl?>/assets/js/intlTelInput.js"></script>
    <script src="<?=siteurl.themeurl?>/assets/js/app.js"></script>
	
	<?php if($siteayar["ayarlar_mailrecaptcha"]==1){ ?>
	<script src='https://www.google.com/recaptcha/api.js?hl=<?=paneldil?>'></script>	
	<?php } ?>
	<?php if($siteayar["ayarlar_mailrecaptcha"]==1){ ?>
	<!--<div class="g-recaptcha" data-sitekey="<?=$siteayar["ayarlar_recaptchaskey"]?>"></div>	-->
	<?php } ?>	
	<script src="<?=siteurl.themeurl?>/mainjscss/jquery.mask.js"></script>
	<script src="<?=siteurl.themeurl?>/mainjscss/toastr-master/toastr.js"></script>
	<script src="<?=siteurl.themeurl?>/mainjscss/lazyload.min.js"></script>
	<script src="<?=siteurl.themeurl?>/mainjscss/main.js"></script>
	<script src="<?=siteurl.themeurl?>/mainjscss/app.js"></script>
	<?php if($siteayar["ayarlar_sitelazy"]>0){ ?>
    <script>
		$("img").lazyload();
	</script>
	<?php } ?>
  </body>
</html>
<?php } ?>