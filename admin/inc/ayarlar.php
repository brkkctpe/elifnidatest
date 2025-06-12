<?php !defined("ADMIN") ? die("Hacking?") : null; ?>

<?php if($ickisim==""){
	
}elseif($ickisim=="genel"){ ?>
<!--begin::Subheader-->
<div class="subheader py-2 py-lg-4 subheader-solid" id="kt_subheader">
	<div class="container-fluid d-flex align-items-center justify-content-between flex-wrap flex-sm-nowrap">
		<!--begin::Info-->
		<div class="d-flex align-items-center flex-wrap mr-2">
			<!--begin::Page Title-->
			<h5 class="text-dark font-weight-bold mt-2 mb-2 mr-5">Genel Ayarlar</h5>
			<!--end::Page Title-->
			<!--begin::Actions-->
			<div class="subheader-separator subheader-separator-ver mt-2 mb-2 mr-4 bg-gray-200"></div>
			<!--end::Actions-->
		</div>
		<!--end::Info-->
		<!--begin::Toolbar-->
		<div class="d-flex align-items-center">
			<!--begin::Actions-->
			<!--end::Actions-->
		</div>
		<!--end::Toolbar-->
	</div>
</div>
<!--end::Subheader-->
<!--begin::Entry-->
<div class="d-flex flex-column-fluid">
	<!--begin::Container-->
	<div class="container">
		<div class="card">
			<?php
			$voku=row(query("SELECT * FROM ".prefix."_ayarlar"));
			?>
			<form action="javascript:;" method="post" id="ayarlar" data-ajaxform="true">
			<input type="hidden" class="form-control" name="ickisim" value="genel">
			<input type="hidden" class="form-control" name="ilkkisim" value="ayarlar">
			
			<div class="card-body">
				<div class="row">
					<div class="col-md-12">
						<div class="form-group">
							<label>Site Title</label>
							<input type="text" class="form-control" name="ayarlar_sitetitle" value="<?=ss($voku["ayarlar_sitetitle"])?>" required>
						</div>
					</div>
					<div class="col-md-12">
						<div class="form-group">
							<label>Site Desc</label>
							<input type="text" class="form-control" name="ayarlar_sitedesc" value="<?=ss($voku["ayarlar_sitedesc"])?>" required>
						</div>
					</div>
					<div class="col-md-12">
						<div class="form-group">
							<label>Site Keyw</label>
							<input type="text" class="form-control" name="ayarlar_sitekeyw" value="<?=ss($voku["ayarlar_sitekeyw"])?>">
						</div>
					</div>
					<div class="col-md-12">
						<div class="form-group">
							<label>Site URL</label>
							<input type="text" class="form-control" name="ayarlar_siteurl" value="<?=ss($voku["ayarlar_siteurl"])?>" required>
						</div>
					</div>
					<div class="col-md-12">
						<div class="form-group">
							<label>Site Tema</label>
							<input type="text" class="form-control" name="ayarlar_sitetema" value="<?=ss($voku["ayarlar_sitetema"])?>" required>
						</div>
					</div>
					<div class="col-md-4">
						<div class="form-group">
							<label>Iyzico Api Key</label>
							<input type="text" class="form-control" name="ayarlar_iyzico_api_key" value="<?=vsc($voku["ayarlar_iyzico_api_key"])?>">
						</div>
					</div>
					<div class="col-md-4">
						<div class="form-group">
							<label>Iyzico Api Secret</label>
							<input type="text" class="form-control" name="ayarlar_iyzico_api_secret" value="<?=vsc($voku["ayarlar_iyzico_api_secret"])?>">
						</div>
					</div>
					<div class="col-md-4">
						<div class="form-group">
							<label>Iyzico Base Url</label>
							<input type="text" class="form-control" name="ayarlar_iyzico_base_url" value="<?=vsc($voku["ayarlar_iyzico_base_url"])?>">
						</div>
					</div>
					<div class="col-md-12">
						<div class="form-group">
							<label>Site Dil</label>
							<select class="form-control" name="ayarlar_sitedil" required>
								<?php
								$bak=query("SELECT * FROM ".prefix."_dil WHERE dil_durum='1'");
								while($yaz=row($bak)){
									?><option value="<?=ss($yaz["dil_id"])?>" <?=$yaz["dil_id"]==$voku["ayarlar_sitedil"] ? "selected" : ""?>><?=ss($yaz["dil_adi"])?></option><?php
								}
								?>
							</select>
						</div>
					</div>
					<div class="col-md-6">
						<div class="form-group">
							<label>Cache</label>
							<select class="form-control" name="ayarlar_sitecache" data-zorunlu="1" >	
								<option value="0" <?php if($voku["ayarlar_sitecache"]==0){echo "selected";} ?> ><?=pd("Cache Kapalı")?></option>
								<option value="1" <?php if($voku["ayarlar_sitecache"]==1){echo "selected";} ?> ><?=pd("1 Saat")?></option>
								<option value="3" <?php if($voku["ayarlar_sitecache"]==3){echo "selected";} ?> ><?=pd("3 Saat")?></option>
								<option value="6" <?php if($voku["ayarlar_sitecache"]==6){echo "selected";} ?> ><?=pd("6 Saat")?></option>
								<option value="12" <?php if($voku["ayarlar_sitecache"]==12){echo "selected";} ?> ><?=pd("12 Saat")?></option>
								<option value="24" <?php if($voku["ayarlar_sitecache"]==24){echo "selected";} ?> ><?=pd("24 Saat")?></option>
							</select>
						</div>
					</div>
					<div class="col-md-6">
						<div class="form-group">
							<label>Cache Temizle</label>
							<button type="button" class="btn btn-success btn-block" data-islem="cachetemizle" data-deger="1"><?=pd("Cache Temizle")?></button>
						</div>
					</div>
					<div class="col-md-6">
						<div class="form-group">
							<label>Lazy Load</label>
							<select class="form-control" name="ayarlar_sitelazy" data-zorunlu="1" >	
								<option value="0" <?php if($voku["ayarlar_sitelazy"]==0){echo "selected";} ?> ><?=pd("Kapalı")?></option>
								<option value="1" <?php if($voku["ayarlar_sitelazy"]==1){echo "selected";} ?> ><?=pd("Açık")?></option>
							</select>
						</div>
					</div>
					<div class="col-md-6">
						<div class="form-group">
							<label>HTML Minify</label>
							<select class="form-control" name="ayarlar_siteminify" data-zorunlu="1" >	
								<option value="0" <?php if($voku["ayarlar_siteminify"]==0){echo "selected";} ?> ><?=pd("Kapalı")?></option>
								<option value="1" <?php if($voku["ayarlar_siteminify"]==1){echo "selected";} ?> ><?=pd("Açık")?></option>
							</select>
						</div>
					</div>
					<div class="col-md-12">
						<div class="form-group">
							<label>Header (Ekstra style, meta vb. dosyalar)</label>
							<textarea class="form-control" name="ayarlar_siteheader" ><?=ss($voku["ayarlar_siteheader"])?></textarea>
						</div>
					</div>
					<div class="col-md-12">
						<div class="form-group">
							<label>Footer (Analytcs vb. kodlar)</label>
							<textarea class="form-control" name="ayarlar_sitefooter"><?=ss($voku["ayarlar_sitefooter"])?></textarea>
						</div>
					</div>
					<div class="col-md-12">
						<div class="form-group">
							<label>Şalter</label>
							<select class="form-control" name="ayarlar_bakimda" data-zorunlu="1" >	
								<option value="0" <?php if($voku["ayarlar_bakimda"]==0){echo "selected";} ?> >Bakımda Modu Kapalı</option>
								<option value="1" <?php if($voku["ayarlar_bakimda"]==1){echo "selected";} ?> >Bakımda Modu Açık</option>
							</select>
						</div>
					</div>
					<div class="col-md-3">
						<div class="form-group">
							<label>Renk1</label>
							<input type="text" class="form-control demo-input" id="demo-input" name="ayarlar_siterenk1" value="<?=ss($voku["ayarlar_siterenk1"])?>">
						</div>
					</div>
					<div class="col-md-3">
						<div class="form-group">
							<label>Renk2</label>
							<input type="text" class="form-control demo-input" id="demo-input" name="ayarlar_siterenk2" value="<?=ss($voku["ayarlar_siterenk2"])?>">
						</div>
					</div>
					<div class="col-md-3">
						<div class="form-group">
							<label>Renk3</label>
							<input type="text" class="form-control demo-input" id="demo-input" name="ayarlar_siterenk3" value="<?=ss($voku["ayarlar_siterenk3"])?>">
						</div>
					</div>
					<div class="col-md-3">
						<div class="form-group">
							<label>Renk4</label>
							<input type="text" class="form-control demo-input" id="" name="ayarlar_siterenk4" value="<?=ss($voku["ayarlar_siterenk4"])?>">
						</div>
					</div>
					<div class="col-md-12">
						<div class="sloader"></div>
						<div class="sonuc"></div>
					</div>
					<div class="col-md-12">
						<button type="submit" class="btn btn-block btn-success">KAYIT</button>
					</div>
				</div>
			</div>
			</form>
		</div>
	</div>	
	<!--end::Container-->
</div>
<!--end::Entry-->

<?php }elseif($ickisim=="logo"){ ?>
<!--begin::Subheader-->
<div class="subheader py-2 py-lg-4 subheader-solid" id="kt_subheader">
	<div class="container-fluid d-flex align-items-center justify-content-between flex-wrap flex-sm-nowrap">
		<!--begin::Info-->
		<div class="d-flex align-items-center flex-wrap mr-2">
			<!--begin::Page Title-->
			<h5 class="text-dark font-weight-bold mt-2 mb-2 mr-5">Logo Ayarları</h5>
			<!--end::Page Title-->
			<!--begin::Actions-->
			<div class="subheader-separator subheader-separator-ver mt-2 mb-2 mr-4 bg-gray-200"></div>
			<!--end::Actions-->
		</div>
		<!--end::Info-->
		<!--begin::Toolbar-->
		<div class="d-flex align-items-center">
			<!--begin::Actions-->
			<!--end::Actions-->
		</div>
		<!--end::Toolbar-->
	</div>
</div>
<!--end::Subheader-->
<!--begin::Entry-->
<div class="d-flex flex-column-fluid">
	<!--begin::Container-->
	<div class="container">
		<div class="card">
			<?php
			$voku=row(query("SELECT * FROM ".prefix."_ayarlar"));
			?>
			<form action="javascript:;" method="post" id="ayarlar" data-ajaxform="true">
			<input type="hidden" class="form-control" name="ickisim" value="logo">
			<input type="hidden" class="form-control" name="ilkkisim" value="ayarlar">
			
			<div class="card-body">
				<div class="row">
					<div class="col-md-6">
						<?=resimalan("ayarlar_logolight","Bilgisayardan Logo Light Seçin",$config["ayar"]["ayarlar_logolight"])?>
					</div>	
					<div class="col-md-6">
						<?=resimalan("ayarlar_logodark","Bilgisayardan Logo Dark Seçin",$config["ayar"]["ayarlar_logodark"])?>
					</div>	
					<div class="col-md-6">
						<?=resimalan("ayarlar_logolightmobil","Bilgisayardan Mobil Logo Light Seçin",$config["ayar"]["ayarlar_logolightmobil"])?>
					</div>	
					<div class="col-md-6">
						<?=resimalan("ayarlar_logodarkmobil","Bilgisayardan Mobil Logo Dark Seçin",$config["ayar"]["ayarlar_logodarkmobil"])?>
					</div>	
					<div class="col-md-6">
						<?=resimalan("ayarlar_favicon","Bilgisayardan Favicon Seçin",$config["ayar"]["ayarlar_favicon"])?>
					</div>	
					<div class="col-md-6">
						<?=resimalan("ayarlar_defaultresim","Bilgisayardan Logo Light Seçin",$config["ayar"]["ayarlar_defaultresim"])?>
					</div>	
					<div class="col-md-12">
						<div class="gloader"></div>
						<div class="sonuc"></div>
					</div>
					<div class="col-md-12">
						<button type="submit" class="btn btn-block btn-success">KAYIT</button>
					</div>
				</div>
			</div>
			</form>
		</div>
	</div>	
	<!--end::Container-->
</div>
<!--end::Entry-->

<?php }elseif($ickisim=="iletisim"){ ?>

<!--begin::Subheader-->
<div class="subheader py-2 py-lg-4 subheader-solid" id="kt_subheader">
	<div class="container-fluid d-flex align-items-center justify-content-between flex-wrap flex-sm-nowrap">
		<!--begin::Info-->
		<div class="d-flex align-items-center flex-wrap mr-2">
			<!--begin::Page Title-->
			<h5 class="text-dark font-weight-bold mt-2 mb-2 mr-5">İletişim Ayarları</h5>
			<!--end::Page Title-->
			<!--begin::Actions-->
			<div class="subheader-separator subheader-separator-ver mt-2 mb-2 mr-4 bg-gray-200"></div>
			<!--end::Actions-->
		</div>
		<!--end::Info-->
		<!--begin::Toolbar-->
		<div class="d-flex align-items-center">
			<!--begin::Actions-->
			<!--end::Actions-->
		</div>
		<!--end::Toolbar-->
	</div>
</div>
<!--end::Subheader-->
<!--begin::Entry-->
<div class="d-flex flex-column-fluid">
	<!--begin::Container-->
	<div class="container">
		<div class="card">
			<?php
			$voku=row(query("SELECT * FROM ".prefix."_ayarlar"));
			?>
			<form action="javascript:;" method="post" id="ayarlar" data-ajaxform="true">
			<input type="hidden" class="form-control" name="ickisim" value="iletisim">
			<input type="hidden" class="form-control" name="ilkkisim" value="ayarlar">
			
			<div class="card-body">
				<div class="row">
					<div class="col-md-12">
						<div class="form-group">
							<label>Facebook</label>
							<input type="text" class="form-control" name="ayarlar_facebook" value="<?=ss($voku["ayarlar_facebook"])?>">
						</div>
					</div>
					<div class="col-md-12">
						<div class="form-group">
							<label>Instagram</label>
							<input type="text" class="form-control" name="ayarlar_instagram" value="<?=ss($voku["ayarlar_instagram"])?>">
						</div>
					</div>
					<div class="col-md-12">
						<div class="form-group">
							<label>Twitter</label>
							<input type="text" class="form-control" name="ayarlar_twitter" value="<?=ss($voku["ayarlar_twitter"])?>">
						</div>
					</div>
					<div class="col-md-12">
						<div class="form-group">
							<label>Youtube</label>
							<input type="text" class="form-control" name="ayarlar_youtube" value="<?=ss($voku["ayarlar_youtube"])?>">
						</div>
					</div>
					<div class="col-md-12">
						<div class="form-group">
							<label>Pinterest</label>
							<input type="text" class="form-control" name="ayarlar_pinterest" value="<?=ss($voku["ayarlar_pinterest"])?>">
						</div>
					</div>
					<div class="col-md-12">
						<div class="form-group">
							<label>Linkedin</label>
							<input type="text" class="form-control" name="ayarlar_linkedin" value="<?=ss($voku["ayarlar_linkedin"])?>">
						</div>
					</div>
					<div class="col-md-12">
						<div class="form-group">
							<label>Whatsapp</label>
							<input type="text" class="form-control" name="ayarlar_whatsapp" value="<?=ss($voku["ayarlar_whatsapp"])?>">
						</div>
					</div>
					<div class="col-md-12">
						<div class="form-group">
							<label>Telefon 1</label>
							<input type="text" class="form-control" name="ayarlar_telefon1" value="<?=ss($voku["ayarlar_telefon1"])?>">
						</div>
					</div>
					<div class="col-md-12">
						<div class="form-group">
							<label>Telefon 2</label>
							<input type="text" class="form-control" name="ayarlar_telefon2" value="<?=ss($voku["ayarlar_telefon2"])?>">
						</div>
					</div>
					<div class="col-md-12">
						<div class="form-group">
							<label>Fax</label>
							<input type="text" class="form-control" name="ayarlar_fax" value="<?=ss($voku["ayarlar_fax"])?>">
						</div>
					</div>
					<div class="col-md-12">
						<div class="form-group">
							<label>E-Mail 1</label>
							<input type="text" class="form-control" name="ayarlar_mail" value="<?=ss($voku["ayarlar_mail"])?>">
						</div>
					</div>
					<div class="col-md-12">
						<div class="form-group">
							<label>E-Mail 2</label>
							<input type="text" class="form-control" name="ayarlar_mail2" value="<?=ss($voku["ayarlar_mail2"])?>">
						</div>
					</div>
					<div class="col-md-12">
						<div class="form-group">
							<label>Adres 1</label>
							<textarea class="form-control" name="ayarlar_adres" ><?=ss($voku["ayarlar_adres"])?></textarea>
						</div>
					</div>
					<div class="col-md-12">
						<div class="form-group">
							<label>Adres 2</label>
							<textarea class="form-control" name="ayarlar_adres2" ><?=ss($voku["ayarlar_adres2"])?></textarea>
						</div>
					</div>
					<div class="col-md-12">
						<div class="form-group">
							<label>Map Link - Yol Tarifi Al 1</label>
							<textarea class="form-control" name="ayarlar_maplink" ><?=ss($voku["ayarlar_maplink"])?></textarea>
						</div>
					</div>
					<div class="col-md-12">
						<div class="form-group">
							<label>Map Link - Yol Tarifi Al 2</label>
							<textarea class="form-control" name="ayarlar_maplink2" ><?=ss($voku["ayarlar_maplink2"])?></textarea>
						</div>
					</div>
					<div class="col-md-12">
						<div class="form-group">
							<label>Map İframe 1</label>
							<textarea class="form-control" name="ayarlar_mapiframe"><?=ss($voku["ayarlar_mapiframe"])?></textarea>
						</div>
					</div>
					<div class="col-md-12">
						<div class="form-group">
							<label>Map İframe 2</label>
							<textarea class="form-control" name="ayarlar_mapiframe2"><?=ss($voku["ayarlar_mapiframe2"])?></textarea>
						</div>
					</div>
					<div class="col-md-12">
						<div class="sloader"></div>
						<div class="sonuc"></div>
					</div>
					<div class="col-md-12">
						<button type="submit" class="btn btn-block btn-success">KAYIT</button>
					</div>
				</div>
			</div>
			</form>
		</div>
	</div>	
	<!--end::Container-->
</div>
<!--end::Entry-->

<?php }elseif($ickisim=="smtp"){ ?>

<!--begin::Subheader-->
<div class="subheader py-2 py-lg-4 subheader-solid" id="kt_subheader">
	<div class="container-fluid d-flex align-items-center justify-content-between flex-wrap flex-sm-nowrap">
		<!--begin::Info-->
		<div class="d-flex align-items-center flex-wrap mr-2">
			<!--begin::Page Title-->
			<h5 class="text-dark font-weight-bold mt-2 mb-2 mr-5">SMTP Ayarları</h5>
			<!--end::Page Title-->
			<!--begin::Actions-->
			<div class="subheader-separator subheader-separator-ver mt-2 mb-2 mr-4 bg-gray-200"></div>
			<!--end::Actions-->
		</div>
		<!--end::Info-->
		<!--begin::Toolbar-->
		<div class="d-flex align-items-center">
			<!--begin::Actions-->
			<!--end::Actions-->
		</div>
		<!--end::Toolbar-->
	</div>
</div>
<!--end::Subheader-->
<!--begin::Entry-->
<div class="d-flex flex-column-fluid">
	<!--begin::Container-->
	<div class="container">
		<div class="card">
			<?php
			$voku=row(query("SELECT * FROM ".prefix."_ayarlar"));
			?>
			<form action="javascript:;" method="post" id="ayarlar" data-ajaxform="true">
			<input type="hidden" class="form-control" name="ickisim" value="smtp">
			<input type="hidden" class="form-control" name="ilkkisim" value="ayarlar">
			
			<div class="card-body">
				<div class="row">
					<div class="col-md-6">
						<div class="form-group">
							<label>Host</label>
							<input type="text" class="form-control" name="ayarlar_mailhost" value="<?=ss($voku["ayarlar_mailhost"])?>">
						</div>
					</div>
					<div class="col-md-6">
						<div class="form-group">
							<label>Kullanıcı Adı</label>
							<input type="text" class="form-control" name="ayarlar_mailkadi" value="<?=ss($voku["ayarlar_mailkadi"])?>">
						</div>
					</div>
					<div class="col-md-6">
						<div class="form-group">
							<label>Parola</label>
							<input type="text" class="form-control" name="ayarlar_mailparola" value="<?=ss($voku["ayarlar_mailparola"])?>">
						</div>
					</div>
					<div class="col-md-6">
						<div class="form-group">
							<label>Port</label>
							<input type="text" class="form-control" name="ayarlar_mailport" value="<?=ss($voku["ayarlar_mailport"])?>">
						</div>
					</div>
					<div class="col-md-6">
						<div class="form-group">
							<label>SSL</label>
							<select class="form-control" name="ayarlar_mailssl">
								<option value="0" <?=ss($voku["ayarlar_mailssl"])==0 ? "selected" : ""?>>Hayır</option>
								<option value="1" <?=ss($voku["ayarlar_mailssl"])==1 ? "selected" : ""?>>Evet</option>
							</select>
						</div>
					</div>
					<div class="col-md-6">
						<div class="form-group">
							<label>Re Captche Sorsun</label>
							<select class="form-control" name="ayarlar_mailrecaptcha">
								<option value="0" <?=ss($voku["ayarlar_mailrecaptcha"])==0 ? "selected" : ""?>>Hayır</option>
								<option value="1" <?=ss($voku["ayarlar_mailrecaptcha"])==1 ? "selected" : ""?>>Evet</option>
							</select>
						</div>
					</div>
					<div class="col-md-6">
						<div class="form-group">
							<label>Recaptcha Site Key</label>
							<input type="text" class="form-control" name="ayarlar_recaptchaskey" value="<?=ss($voku["ayarlar_recaptchaskey"])?>">
						</div>
					</div>
					<div class="col-md-6">
						<div class="form-group">
							<label>Recaptcha Gizli Key</label>
							<input type="text" class="form-control" name="ayarlar_recaptchagkey" value="<?=ss($voku["ayarlar_recaptchagkey"])?>">
						</div>
					</div>
					<div class="col-md-4">
						<div class="form-group">
							<label>Maillerin Gideceği Adres 1</label>
							<input type="text" class="form-control" name="ayarlar_mailgit1" value="<?=ss($voku["ayarlar_mailgit1"])?>">
						</div>
					</div>
					<div class="col-md-4">
						<div class="form-group">
							<label>Maillerin Gideceği Adres 1</label>
							<input type="text" class="form-control" name="ayarlar_mailgit2" value="<?=ss($voku["ayarlar_mailgit2"])?>">
						</div>
					</div>
					<div class="col-md-4">
						<div class="form-group">
							<label>Maillerin Gideceği Adres 1</label>
							<input type="text" class="form-control" name="ayarlar_mailgit3" value="<?=ss($voku["ayarlar_mailgit3"])?>">
						</div>
					</div>
					<div class="col-md-12">
						<div class="sloader"></div>
						<div class="sonuc"></div>
					</div>
					<div class="col-md-12">
						<button type="submit" class="btn btn-block btn-success">KAYIT</button>
					</div>
					<div class="col-md-12">
						<button type="button" data-islem="testmail" data-deger="1" class="btn btn-block btn-primary mt-2">Test Maili Gönder</button>
					</div>
				</div>
			</div>
			</form>
		</div>
	</div>	
	<!--end::Container-->
</div>
<!--end::Entry-->

<?php }elseif($ickisim=="modul"){ ?>

<!--begin::Subheader-->
<div class="subheader py-2 py-lg-4 subheader-solid" id="kt_subheader">
	<div class="container-fluid d-flex align-items-center justify-content-between flex-wrap flex-sm-nowrap">
		<!--begin::Info-->
		<div class="d-flex align-items-center flex-wrap mr-2">
			<!--begin::Page Title-->
			<h5 class="text-dark font-weight-bold mt-2 mb-2 mr-5">Modul Ayarları</h5>
			<!--end::Page Title-->
			<!--begin::Actions-->
			<div class="subheader-separator subheader-separator-ver mt-2 mb-2 mr-4 bg-gray-200"></div>
			<!--end::Actions-->
		</div>
		<!--end::Info-->
		<!--begin::Toolbar-->
		<div class="d-flex align-items-center">
			<!--begin::Actions-->
			<a href="index.php?do=<?="ekalan_listele"?>" class="btn btn-clean btn-sm font-weight-bold font-size-base mr-1">Ek Alanlar</a>
			<a href="index.php?do=<?="ekalan_ekle"?>" class="btn btn-clean btn-sm font-weight-bold font-size-base mr-1">Ek Alan Ekle</a>
			<!--end::Actions-->
		</div>
		<!--end::Toolbar-->
	</div>
</div>
<!--end::Subheader-->
<!--begin::Entry-->
<div class="d-flex flex-column-fluid">
	<!--begin::Container-->
	<div class="container">
		<div class="card">
			<?php
			$voku=row(query("SELECT * FROM ".prefix."_ayarlar"));
			?>
			<form action="javascript:;" method="post" id="ayarlar" data-ajaxform="true">
			<input type="hidden" class="form-control" name="ickisim" value="modul">
			<input type="hidden" class="form-control" name="ilkkisim" value="ayarlar">
			
			<div class="card-body">
				<div class="row">
					<?php
						$ayarlar_sitemodul = unserialize($voku["ayarlar_sitemodul"]);
						
						$keyler = array();
						foreach($ayarlar_sitemodul as $key=>$deger){
							$keyler[$deger] = $key;
						}
						
						$dizin = "modul";
						$dizinac = opendir($dizin) or die("dizin açılamadı");
						while($dyaz=readdir($dizinac)){
							if(!strstr($dyaz,".")){
								$menubilgi = array();
								if(file_exists("modul/".$dyaz."/bilgi.php")){
									require "modul/".$dyaz."/bilgi.php";
								}
								if($menubilgi["sql"]!=""){
									if(in_array($menubilgi["sql"],$tableList)){
										$sqldosya = 1;
									}else{
										$sqldosya = 0;
									}
									$sqladi = str_replace("ekip_","",$menubilgi["sql"]);
								?>		
									<div class="col-md-6 pb-4 pt-4 border-bottom">
										<div class="form-row">
										  <label class="col-9 col-form-label">
											<b><?=$menubilgi["sql"]?></b>
											<br>
											<?php
											if($sqldosya==1){ echo "SQL Hazır";}
											else{ echo 'HATA : <a href="javascript:;" data-islem="modulsqlyukle" data-deger="'.$dyaz.'">SQL Dosyası Yükle</a>'; }
											?>
											<?php if(!file_exists("modul/".$dyaz."/bilgi.php")){ echo "<br>Hata : Bilgi dosyası eksik!";} ?>
											<?php if(!file_exists("modul/".$dyaz."/ajax.php")){ echo "<br>Hata : Ajax dosyası eksik!";} ?>
											<?php if(!file_exists("modul/".$dyaz."/inc.php")){ echo "<br>Hata : Inc dosyası eksik!";} ?>
											<?php if($sqldosya==1 and backupDatabaseTables($menubilgi["sql"],$sqladi)){ echo '<br>Bilgi : Mysql Eşleştirme Tamamlandı! <a href="javascript:;" data-islem="modulsqlsil" data-deger="'.$menubilgi["sql"].'">SQL Dosyası Sil</a>';} 
											?>
										  </label>
										  <div class="col-3 pt-3">
										   <span class="switch switch-outline switch-icon switch-<?=$sqldosya==1 ? "success" : "danger"?>">
											<label>
											 <input type="checkbox" <?=in_array($dyaz,$ayarlar_sitemodul) ? "checked" : ""?> name="ayarlar_sitemodul[]" value="<?=$dyaz?>"/>
											 <span></span>
											</label>
										   </span>
										   <input type="number" name="ayarlar_sitemodulsira[<?=$dyaz?>]" class="form-control" value="<?=$keyler[$dyaz]?>" placeholder="Sıra">
										  </div>
										</div>
									</div>
								<?php
								}
							}
						
						}
						
					?>		
					<div class="col-md-12">
						<div class="sloader"></div>
						<div class="sonuc"></div>
					</div>
					<div class="col-md-12">
						<button type="submit" class="btn btn-block btn-success">KAYIT</button>
					</div>
				</div>
			</div>
			</form>
		</div>
	</div>	
	<!--end::Container-->
</div>
<!--end::Entry-->

<?php }elseif($ickisim=="toplumail"){ ?>

<!--begin::Subheader-->
<div class="subheader py-2 py-lg-4 subheader-solid" id="kt_subheader">
	<div class="container-fluid d-flex align-items-center justify-content-between flex-wrap flex-sm-nowrap">
		<!--begin::Info-->
		<div class="d-flex align-items-center flex-wrap mr-2">
			<!--begin::Page Title-->
			<h5 class="text-dark font-weight-bold mt-2 mb-2 mr-5">Toplu Mail</h5>
			<!--end::Page Title-->
			<!--begin::Actions-->
			<div class="subheader-separator subheader-separator-ver mt-2 mb-2 mr-4 bg-gray-200"></div>
			<!--end::Actions-->
		</div>
		<!--end::Info-->
		<!--begin::Toolbar-->
		<div class="d-flex align-items-center">
			<!--begin::Actions-->
			<!--end::Actions-->
		</div>
		<!--end::Toolbar-->
	</div>
</div>
<!--end::Subheader-->
<!--begin::Entry-->
<div class="d-flex flex-column-fluid">
	<!--begin::Container-->
	<div class="container">
		<div class="card">
			<?php
			$voku=row(query("SELECT * FROM ".prefix."_ayarlar"));
			?>
			<form action="javascript:;" method="post" id="ayarlar" data-ajaxform="true">
			<input type="hidden" class="form-control" name="ickisim" value="toplumail">
			<input type="hidden" class="form-control" name="ilkkisim" value="ayarlar">
			
			<div class="card-body">
				<div class="row">
					<div class="col-md-12">
						<div class="form-group">
							<label>Mesajınız</label>
							<textarea class="form-control" name="mesaj" ></textarea>
						</div>
					</div>
					<div class="col-md-12">
						<div class="form-group">
							<label>Mail Listesi</label>
							<?php
								$liste = array();
								$bak=query("SELECT * FROM ".prefix."_ebulten WHERE ebulten_durum='1'");
								while($yaz=row($bak)){
									$liste[] = $yaz["ebulten_mail"];
								}
							?>
							<textarea class="form-control" name="liste"><?= implode(";",$liste)?></textarea>
							<small>Mailler arasında noktalı virgül koymalısınız. </small>
						</div>
					</div>
					<div class="col-md-12">
						<div class="sloader"></div>
						<div class="sonuc"></div>
					</div>
					<div class="col-md-12">
						<button type="submit" class="btn btn-block btn-success">KAYIT</button>
					</div>
				</div>
			</div>
			</form>
		</div>
	</div>	
	<!--end::Container-->
</div>
<!--end::Entry-->

<?php } ?>