		
		<div class="card mb-4">
			<div class="card-body">
			<h1>Kişisel Bilgilerim</h1>
			<form action="javascript:;" method="post" id="kisisel-bilgilerim" data-ajaxform="true">
				<div class="form-row">
					<div class="col-md-4">
						<div class="form-group">
							<label>Tc / Pasaport No</label>
							<input type="text" class="form-control" name="uye_tc" value="<?=$config["uye"]["uye_tc"]?>" data-zorunlu="1">
						</div>
					</div>
					<div class="col-md-4">
						<div class="form-group">
							<label>Ad</label>
							<input type="text" class="form-control" name="uye_ad" value="<?=$config["uye"]["uye_ad"]?>" data-zorunlu="1">
						</div>
					</div>
					<div class="col-md-4">
						<div class="form-group">
							<label>Soyad</label>
							<input type="text" class="form-control" name="uye_soyad" value="<?=$config["uye"]["uye_soyad"]?>" data-zorunlu="1">
						</div>
					</div>
					<div class="col-md-6">
						<div class="form-group">
							<label>Telefon </label>
							<input type="text" class="form-control telefon" name="uye_telefon" value="<?=$config["uye"]["uye_telefon"]?>" data-zorunlu="1">
						</div>
					</div>
					<div class="col-md-6">
						<div class="form-group">
							<label>Mail </label>
							<input type="text" class="form-control" name="uye_mail" value="<?=$config["uye"]["uye_mail"]?>" data-zorunlu="1">
						</div>
					</div>
				</div>
				<div class="form-row">
					<?php
					$dtbol = explode("/",$config["uye"]["uye_dogumtarihi"]);
					
					?>
					<div class="col-4">
						<div class="form-group">
							<select class="form-control" name="uye_dgun" data-zorunlu="1" required>
								<option>Gün</option>
								<?php for($i=1;$i<32;$i++){ ?>
								<option <?=$dtbol[0]==$i ? "selected" : "" ?> value="<?=$i?>"><?=$i?></option>
								<?php } ?>
							</select>
						</div>
					</div>
					<div class="col-4">
						<div class="form-group">
							<select class="form-control" name="uye_day" data-zorunlu="1" required>
								<option>Ay</option>
								<?php for($i=1;$i<13;$i++){ ?>
								<option <?=$dtbol[1]==$i ? "selected" : "" ?> value="<?=$i?>"><?=$i?></option>
								<?php } ?>
							</select>
						</div>
					</div>
					<div class="col-4">
						<div class="form-group">
							<select class="form-control" name="uye_dyil" data-zorunlu="1" required>
								<option>Yıl</option>
								<?php for($i=(date("Y")-68);$i<(date("Y")-17);$i++){ ?>
								<option <?=$dtbol[2]==$i ? "selected" : "" ?> value="<?=$i?>"><?=$i?></option>
								<?php } ?>
							</select>
						</div>
					</div>
				</div>
				<div class="form-row">
					<div class="col-md-12">
						<div class="form-group">
							<label>Adres</label>
							<textarea class="form-control" name="uye_adres" placeholder="Adres" data-zorunlu="1" required ><?=$config["uye"]["uye_adres"]?></textarea>
						</div>
					</div>
					<div class="col-6">
						<div class="form-group">
							<select class="form-control" name="uye_il" id="il" data-zorunlu="1">
								<option>İl</option>
								<?= iller($config["uye"]["uye_il"]); ?>
							</select>
						</div>
					</div>
					<div class="col-6">
						<div class="form-group">
							<select class="form-control" name="uye_ilce" id="ilce" data-zorunlu="1">
								<option>İlçe</option>
								<?= ilceler($config["uye"]["uye_ilce"],$config["uye"]["uye_il"]); ?>
							</select>
						</div>
					</div>
					<div class="col-6">
						<div class="form-group">
							<label>Meslek</label>
							<input type="text" class="form-control" name="uye_meslek" placeholder="Meslek" value="<?=$config["uye"]["uye_meslek"]?>">
						</div>
					</div>
					<div class="col-6">
						<div class="form-group">
							<label>Cinsiyet</label>
							<select class="form-control" name="uye_cinsiyet" data-zorunlu="1" required>
								<option <?=$config["uye"]["uye_cinsiyet"]=="Erkek" ? "selected" : ""?> value="Erkek">Erkek</option>
								<option <?=$config["uye"]["uye_cinsiyet"]=="Kadın" ? "selected" : ""?> value="Kadın">Kadın</option>
							</select>
						</div>
					</div>
					<div class="col-6">
						<div class="form-group">
							<label>Boy</label>
							<input type="text" class="form-control" name="uye_boy" placeholder="Boy (cm) * " value="<?=$config["uye"]["uye_boy"]?>" required>
						</div>
					</div>
					<div class="col-6">
						<div class="form-group">
							<label>Kilo</label>
							<input type="text" class="form-control" name="uye_kilo" placeholder="Kilo (kg) * " value="<?=$config["uye"]["uye_kilo"]?>" required>
						</div>
					</div>
					<div class="col-6">
						<div class="form-group">
							<label>Hedef Kilo</label>
							<input type="text" class="form-control" name="uye_hedefkilo" value="<?=$config["uye"]["uye_hedefkilo"]?>" placeholder="Hedef Kilo (kg) * " required>
						</div>
					</div>
					<div class="col-6">
						<div class="form-group">
							<label>Profil Fotoğrafı</label>
							<div class="custom-file">
								<input type="file" class="custom-file-input" name="uye_resim" id="validatedCustomFile" >
								<label class="custom-file-label" for="validatedCustomFile">Profil Fotoğrafı...</label>
							</div>
							<input type="hidden" name="uye_resimg" value="<?=$config["uye"]["uye_resim"]?>">
						</div>
					</div>
					<div class="col-md-12">
						<div class="form-group">
							<label>Alerjik Reaksiyonlarınız</label>
							<textarea class="form-control" name="uye_alerji" placeholder="Alerjik Reaksiyonlarınız" ><?=$config["uye"]["uye_alerji"]?></textarea>
						</div>
					</div>
					<div class="col-md-12">
						<div class="form-group">
							<label>Sevmediğiniz Yiyecek ve İçecekler</label>
							<textarea class="form-control" name="uye_sevmediginiz" placeholder="Sevmediğiniz Yiyecek ve İçecekler" ><?=$config["uye"]["uye_sevmediginiz"]?></textarea>
						</div>
					</div>
					<div class="col-md-12">
						<div class="form-group">
							<label>İlgilendiğiniz Spor Aktiviteleri</label>
							<textarea class="form-control" name="uye_ilgilenmediginiz" placeholder="İlgilendiğiniz Spor Aktiviteleri" ><?=$config["uye"]["uye_ilgilenmediginiz"]?></textarea>
						</div>
					</div>
					<div class="col-md-12">
						<div class="form-group">
							<label>Notlar</label>
							<textarea class="form-control" name="uye_notlar" placeholder="Notlar"><?=$config["uye"]["uye_notlar"]?></textarea>
						</div>
					</div>
					<div class="col-12">
						<div class="form-group">
							<div class="custom-file">
								<input type="file" class="custom-file-input" name="uye_tahlil[]" id="uye_tahlil" multiple>
								<label class="custom-file-label" for="uye_tahlil">Tahlil Yükle...</label>
							</div>
						</div>
					</div>
					<div class="col-12">
						<div class="row">
							<?php
							$u_tahlil = explode(",",$config["uye"]["uye_tahlil"]);
							for($i=0;$i<count($u_tahlil);$i++){
								if($u_tahlil[$i]!=""){
								?>
								<div class="col-md-3 pb-3">
									<img src="<?=url."app/Images/".$u_tahlil[$i]?>" style="width:100%;height:150px;object-fit:cover;">
									<div class="custom-control custom-switch">
									  <input type="checkbox" class="custom-control-input" name="tahlil[]" value="<?=$u_tahlil[$i]?>" id="tahlil<?=$i?>" checked>
									  <label class="custom-control-label" for="tahlil<?=$i?>"></label>
									</div>
								</div>
								<?php
								}
							}
							
							?>
						</div>
					</div>
					<div class="col-12">
						<div class="form-group">
							<div class="custom-file">
								<input type="file" class="custom-file-input" name="uye_resimler[]" id="uye_resimler" multiple>
								<label class="custom-file-label" for="uye_resimler">Fotoğraflar...</label>
							</div>
						</div>
					</div>
					<div class="col-12">
						<div class="row">
							<?php
							$u_resimler = explode(",",$config["uye"]["uye_resimler"]);
							for($i=0;$i<count($u_resimler);$i++){
								if($u_resimler[$i]!=""){
								?>
								<div class="col-md-3 pb-3">
									<img src="<?=url."app/Images/".$u_resimler[$i]?>" style="width:100%;height:150px;object-fit:cover;">
									<div class="custom-control custom-switch">
									  <input type="checkbox" class="custom-control-input" name="resimler[]" value="<?=$u_resimler[$i]?>" id="resimler<?=$i?>" checked>
									  <label class="custom-control-label" for="resimler<?=$i?>"></label>
									</div>
								</div>
								<?php
								}
							}
							?>
						</div>
					</div>
				</div>
				  <div class="loader"></div>
				  <div class="sonuc"></div>
				  <button type="submit" class="btn btn-success">Güncelle</button>
				</form>
			
			</div>
		</div>
		<div class="card mb-4">
			<div class="card-body">
				<h1>Parola</h1>
				<form action="javascript:;" method="post" id="paroladegis" data-ajaxform="true">
				  <div class="form-group">
					<label>Parola</label>
					<input type="password" class="form-control" name="uye_parola">
				  </div>
				  <div class="form-group">
					<label>Parola Yeni</label>
					<input type="password" class="form-control" name="uye_parolay">
				  </div>
				  <div class="form-group">
					<label>Parola Tekrar</label>
					<input type="password" class="form-control" name="uye_parolat">
				  </div>	
				  <div class="loader"></div>
				  <div class="sonuc"></div>
				  <button type="submit" class="btn btn-success">Güncelle</button>
				</form>
			</div>
		</div>