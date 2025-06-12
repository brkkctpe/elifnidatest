		
		<div class="card mb-4">
			<div class="card-body">
				<h1>Yeni Ölçüm Gir</h1>
				<form action="javascript:;" method="post" id="olcum-gir" data-ajaxform="true">
				  <div class="form-group">
					<label>Ölçüm Tarihi</label>
					<input type="text" class="form-control tarih" name="olcum_tarih" data-zorunlu="1">
				  </div>
				  <div class="form-group">
					<label>Ağırlık(kg)</label>
					<input type="text" class="form-control" name="olcum_agirlik" data-zorunlu="1">
				  </div>
				  <div class="form-group">
					<label>Bel Çevresi(cm)</label>
					<input type="text" class="form-control" name="olcum_bel">
				  </div>
				  <div class="form-group">
					<label>Göbek Çevresi(cm)</label>
					<input type="text" class="form-control" name="olcum_gobek">
				  </div>
				  <div class="form-group">
					<label>Üst Kol Çevresi(cm)</label>
					<input type="text" class="form-control" name="olcum_ustkol">
				  </div>
				  <div class="form-group">
					<label>Üst Bacak Çevresi(cm)</label>
					<input type="text" class="form-control" name="olcum_ustbacak">
				  </div>
				  <div class="form-group">
					<label>Kalça Çevresi(cm)</label>
					<input type="text" class="form-control" name="olcum_kalca">
				  </div>
				  <div class="form-group">
					<label>Göğüs Çevresi(cm)</label>
					<input type="text" class="form-control" name="olcum_gogus">
				  </div>
				  <div class="form-group">
					<label>Boyun Çevresi(cm)</label>
					<input type="text" class="form-control" name="olcum_boyun">
				  </div>
				  <div class="form-group">
					<div class="custom-file">
					  <input type="file" class="custom-file-input" name="olcum_resim" id="customFile">
					  <label class="custom-file-label" for="customFile">Tartı Fotoğrafı</label>
					</div>
				  </div>
				  <h3 class="mt-2 mb-2 border-bottom">Haftanın Özeti</h3>
				  <small>Lütfen hafta içinde yaşadığınız durumları belirtiniz</small>
				  <div class="bg-info text-white p-2 mt-4 mb-2">Ekstra Durumlar</div>
				  <div class="form-row">
					<div class="col-md-3">
						<div class="custom-control custom-checkbox mb-3">
							<input type="checkbox" class="custom-control-input" name="olcum_odem" value="1" id="durum1">
							<label class="custom-control-label" for="durum1">Ödem ve Şişkinlik</label>
						</div>
					</div>
					<div class="col-md-3">
						<div class="custom-control custom-checkbox mb-3">
							<input type="checkbox" class="custom-control-input" name="olcum_kabizlik" value="1" id="durum2">
							<label class="custom-control-label" for="durum2">Kabızlık</label>
						</div>
					</div>
					<div class="col-md-3">
						<div class="custom-control custom-checkbox mb-3">
							<input type="checkbox" class="custom-control-input" name="olcum_regloncesi" value="1" id="durum3">
							<label class="custom-control-label" for="durum3">Regl Öncesi</label>
						</div>
					</div>
					<div class="col-md-3">
						<div class="custom-control custom-checkbox mb-3">
							<input type="checkbox" class="custom-control-input" name="olcum_reglsonrasi" value="1" id="durum4">
							<label class="custom-control-label" for="durum4">Regl Sonrası</label>
						</div>
					</div>
				  </div>
				  <div class="bg-info text-white p-2 mt-4 mb-2">Diyete Uyum Durumu</div>
				  <div class="form-row">
					<div class="col-md-3">
						<div class="custom-control custom-radio mb-3">
							<input type="radio" class="custom-control-input" name="olcum_uyum" value="5" id="uyum1">
							<label class="custom-control-label" for="uyum1">Diyet dışı kaçamak yapmadım</label>
						</div>
					</div>
					<div class="col-md-3">
						<div class="custom-control custom-radio mb-3">
							<input type="radio" class="custom-control-input" name="olcum_uyum" value="2" id="uyum2">
							<label class="custom-control-label" for="uyum2">2 veya daha az kaçamak</label>
						</div>
					</div>
					<div class="col-md-3">
						<div class="custom-control custom-radio mb-3">
							<input type="radio" class="custom-control-input" name="olcum_uyum" value="3" id="uyum3">
							<label class="custom-control-label" for="uyum3">2'den fazla kaçamak</label>
						</div>
					</div>
					<div class="col-md-3">
						<div class="custom-control custom-radio mb-3">
							<input type="radio" class="custom-control-input" name="olcum_uyum" value="4" id="uyum4">
							<label class="custom-control-label" for="uyum4">Diyete Neredeyse Hiç Uymadım</label>
						</div>
					</div>
				  </div>
				  <div class="bg-info text-white p-2 mt-4 mb-2">Haftalık Egzersiz Miktarları</div>
				  <div class="form-row">
					<div class="col-md-3">
						<div class="custom-control custom-radio mb-3">
							<input type="radio" class="custom-control-input" name="olcum_egzersiz" value="2" id="egzersiz1">
							<label class="custom-control-label" for="egzersiz1">Hiç</label>
						</div>
					</div>
					<div class="col-md-3">
						<div class="custom-control custom-radio mb-3">
							<input type="radio" class="custom-control-input" name="olcum_egzersiz" value="2" id="egzersiz2">
							<label class="custom-control-label" for="egzersiz2">1-2 kez</label>
						</div>
					</div>
					<div class="col-md-3">
						<div class="custom-control custom-radio mb-3">
							<input type="radio" class="custom-control-input" name="olcum_egzersiz" value="3" id="egzersiz3">
							<label class="custom-control-label" for="egzersiz3">3-4 kez</label>
						</div>
					</div>
					<div class="col-md-3">
						<div class="custom-control custom-radio mb-3">
							<input type="radio" class="custom-control-input" name="olcum_egzersiz" value="4" id="egzersiz4">
							<label class="custom-control-label" for="egzersiz4">5 kez ve üzeri</label>
						</div>
					</div>
				  </div>
				  <div class="bg-info text-white p-2 mt-4 mb-2">Mesajınız ve Özel İstekleriniz</div>
				  <div class="form-group">
					<textarea class="form-control" name="olcum_mesaj"></textarea>
				  </div>
				  <div class="loader"></div>
				  <div class="sonuc"></div>
				  <button type="submit" class="btn btn-success">Kayıt Et</button>
				</form>
			
			</div>
		</div>