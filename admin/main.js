
function delay(callback, ms) {
  var timer = 0;
  return function() {
    var context = this, args = arguments;
    clearTimeout(timer);
    timer = setTimeout(function () {
      callback.apply(context, args);
    }, ms || 0);
  };
}
$(document).on("submit","[data-ajaxform=true]", function (e) {
	var id = $(this).attr('id');
	var adata = new FormData(this);
	formgonder(id,adata);
});
$(document).on("keyup","[data-changeform] input,[data-changeform=true] textarea,[data-changeform=true] select", function (e) {
	var id = $(this).parents('form').attr('id');
	var myForm = document.getElementById(id);
	var adata = new FormData(myForm);
	formgonder(id,adata);
});

$(document).on("keyup","[data-keyupislem]", delay(function (e) {
	var sayfa = $(this).attr('data-keyupislem');
	var deger = $(this).attr('data-keyupdeger');
	var ickisim = $(this).attr('data-keyupickisim');
	var value = $(this).val();
	if(value!=""){
		deger = deger+"{:}"+value;
	}
	var buton = "";
	islemyap(sayfa,deger,buton,ickisim);
}, 300));
$(document).on("change","input[data-changeislem],textarea[data-changeislem]", function (e) {
	var sayfa = $(this).attr('data-changeislem');
	var deger = $(this).attr('data-changedeger');
	var ickisim = $(this).attr('data-changeickisim');
	var value = $(this).val();
	if(value!=""){
		deger = deger+"{:}"+value;
	}
	
	var buton = "";
	islemyap(sayfa,deger,buton,ickisim);
});

$(document).on("change","select[data-changeislem]", function (e) {
	var sayfa = $(this).attr('data-changeislem');
	var deger = $(this).attr('data-changedeger');
	var ickisim = $(this).attr('data-changeickisim');
	var value = $(this).val();
	if(value!=""){
		deger = deger+"{:}"+value;
	}
	
	var buton = "";
	islemyap(sayfa,deger,buton,ickisim);	
});


function formgonder(id,adata){	
	var url = $('body').attr('data-url');
	loader('#'+id+' .gloader',1);
	$('#'+id+' .sonuc').html('');
	
	$('#'+id+' [data-zorunlu=1]').each(function( index ) {
		var val = $(this).val();
		if(val==""){
			$(this).addClass("border-danger");
		}else{
			$(this).removeClass("border-danger");
		}
	});   
	  $.ajax({
		url: "Ajax/index.php?page="+id,
		data: adata,
		contentType: false,
		processData: false,
		type: "POST",
		dataType: "json",
		success: function (sonuc) {
			if(sonuc.sil!="" && typeof sonuc.sil != "undefined"){
				$('#'+id+' input:not([type="hidden"])').val('');
				$('#'+id+' textarea').val('');			
			}			
			if(sonuc.git!="" && typeof sonuc.git != "undefined"){
				git(sonuc.git);					
			}
			if(sonuc.tikla!="" && typeof sonuc.tikla != "undefined"){
				tikla(sonuc.tikla);					
			}	
			if(sonuc.swaluyari!="" && typeof sonuc.swaluyari != "undefined"){		
				swal({
					title: sonuc.swaluyari,
					type: sonuc.swalrenk,
				});					
			}	
			if(sonuc.tost!="" && typeof sonuc.tost != "undefined"){	
				tostmesaj(sonuc.tost,"",sonuc.mesaj);			
			}
				
			loader('#'+id+' .gloader',0);			
			$('#'+id+' .sonuc').html(sonuc.uyari);										
			
			if(sonuc.degis!="" && typeof sonuc.degis != "undefined"){
				degis(sonuc.degis,sonuc.degisicerik);	
			}			
			if(sonuc.basaekle!="" && typeof sonuc.basaekle != "undefined"){
				basaekle(sonuc.basaekle,sonuc.basaekleicerik);	
			}			
			if(sonuc.sonaekle!="" && typeof sonuc.sonaekle != "undefined"){
				sonaekle(sonuc.sonaekle,sonuc.sonaekleicerik);	
			}			
			if(sonuc.degisattr!="" && typeof sonuc.degisattr != "undefined"){
				degisattr(sonuc.degisattr,sonuc.etiket,sonuc.deger);	
			}		
			if(sonuc.ortamlistele!="" && typeof sonuc.ortamlistele != "undefined"){
				ortamlistele();	
			}							
		}
	  });			
}

$(document).on("click","[data-islem]", function (e) {
	var sayfa = $(this).data('islem');
	var deger = $(this).data('deger');
	var ickisim = $(this).data('ickisim');
	var emin = $(this).data('eminmisin');
	var buton = $(this).html();
	
	if(emin){
		
		swal({
		  title: "Emin misin?",
		  text: "Bu işlemi yaptığınızda geri gönüşü olmayacak eminmisiniz",
		  type: "warning",
		  buttons: ["Vazgeç", "Eminim"],
		})
		.then((willDelete) => {
		  if (willDelete) {
			$(this).html('').attr('disabled', 'disabled').html('İşlem Yapılıyor');
			islemyap(sayfa,deger,buton,ickisim);
		  } else {
		  }
		});			
		
	}else{		
		islemyap(sayfa,deger,buton,ickisim);
	}
});
function islemyap(sayfa,deger,buton,ickisim){
	var url = $('body').attr('data-url');
	var degerler = "deger="+deger+"&ickisim="+ickisim;
	$.ajax({						
		type: "post",
		url: "Ajax/index.php?page="+sayfa,
		data: degerler,
		dataType: "json",
		success: function (sonuc){
			if(sonuc.uyari!="" && typeof sonuc.uyari != "undefined"){
				swal({
					title: sonuc.uyari,
					type: sonuc.renk,
				});				
			}
			if(sonuc.tost!="" && typeof sonuc.tost != "undefined"){	
				tostmesaj(sonuc.tost,"",sonuc.mesaj);			
			}
			if(sonuc.sil!="" && typeof sonuc.sil != "undefined"){
				sil(sonuc.sil);					
			}
			if(sonuc.git!="" && typeof sonuc.git != "undefined"){
				git(sonuc.git);					
			}	
			if(sonuc.tikla!="" && typeof sonuc.tikla != "undefined"){
				tikla(sonuc.tikla);					
			}	
			
			if(sonuc.degis!="" && typeof sonuc.degis != "undefined"){
				degis(sonuc.degis,sonuc.degisicerik);	
			}	
			if(sonuc.degis2!="" && typeof sonuc.degis2 != "undefined"){
				degis(sonuc.degis2,sonuc.degisicerik2);	
			}			
			if(sonuc.basaekle!="" && typeof sonuc.basaekle != "undefined"){
				basaekle(sonuc.basaekle,sonuc.basaekleicerik);	
			}			
			if(sonuc.sonaekle!="" && typeof sonuc.sonaekle != "undefined"){
				sonaekle(sonuc.sonaekle,sonuc.sonaekleicerik);	
			}			
			if(sonuc.degisattr!="" && typeof sonuc.degisattr != "undefined"){
				degisattr(sonuc.degisattr,sonuc.etiket,sonuc.deger);	
			}		
			if(sonuc.ortamlistele!="" && typeof sonuc.ortamlistele != "undefined"){
				ortamlistele();	
			}
			
		}					
	});				
}
function sil(hedef){
	$(hedef).hide(500);
}
function tikla(hedef){
	$(hedef).trigger('click');
}
function git(hedef){
	window.location.href = hedef;
}
function degis(hedef,icerik){
	$(hedef).html(icerik);
}
function sonaekle(hedef,icerik){
	$(hedef).append(icerik);
}
function basaekle(hedef,icerik){
	$(hedef).prepend(icerik);
}
function degisattr(hedef,etiket,deger){
	$(hedef).attr(etiket,deger);
}

function loader(alan,durum){
	if(durum>0){
		$(alan).html('<div id="loaderCSS"></div>');
	}else{
		$(alan).html('');
	}
}

function tostmesaj(tur,baslik,mesaj) {
	if(tur=="success"){
		toastroptions = {
		  "closeButton": true,
		  "debug": false,
		  "progressBar": false,
		  "positionClass": "toast-top-right",
		  "onclick": null,
		  "showDuration": "300",
		  "hideDuration": "1000",
		  "timeOut": "2000",
		  "extendedTimeOut": "1000",
		  "showEasing": "swing",
		  "hideEasing": "linear",
		  "showMethod": "fadeIn",
		  "hideMethod": "fadeOut"
		}
		toastr.success(mesaj,"Başarılı",toastroptions);
	}
	if(tur=="info"){
		toastroptions = {
		  "closeButton": true,
		  "debug": false,
		  "progressBar": false,
		  "positionClass": "toast-top-right",
		  "onclick": null,
		  "showDuration": "300",
		  "hideDuration": "1000",
		  "timeOut": "5000",
		  "extendedTimeOut": "1000",
		  "showEasing": "swing",
		  "hideEasing": "linear",
		  "showMethod": "fadeIn",
		  "hideMethod": "fadeOut"
		}
		toastr.info(mesaj,"Uyarı",toastroptions);
	}
	if(tur=="warning"){
		toastroptions = {
		  "closeButton": true,
		  "debug": false,
		  "progressBar": false,
		  "positionClass": "toast-top-right",
		  "onclick": null,
		  "showDuration": "300",
		  "hideDuration": "1000",
		  "timeOut": "5000",
		  "extendedTimeOut": "1000",
		  "showEasing": "swing",
		  "hideEasing": "linear",
		  "showMethod": "fadeIn",
		  "hideMethod": "fadeOut"
		}
		toastr.warning(mesaj,"Dikkat",toastroptions);
	}
	if(tur=="danger"){
		toastroptions = {
		  "closeButton": true,
		  "debug": false,
		  "progressBar": false,
		  "positionClass": "toast-top-right",
		  "onclick": null,
		  "showDuration": "300",
		  "hideDuration": "1000",
		  "timeOut": "5000",
		  "extendedTimeOut": "1000",
		  "showEasing": "swing",
		  "hideEasing": "linear",
		  "showMethod": "fadeIn",
		  "hideMethod": "fadeOut"
		}
		toastr.error(mesaj,"Hata",toastroptions);
	}
}

$(document).on("change",".resimupload",function(){
	var inputid = $(this).find("input").attr('id');
	var fileInput = document.getElementById(inputid);   
	var filename = fileInput.files[0].name;
	$(this).find("span").html(filename);
});

// $( document ).ready(function() {
    // $('.resimupload').each(function(){
		// var inputid = $(this).find("input").attr('id');
		// var inputid = $(this).find("input").attr('id');
		// $(this).append('<input type="text" id="'+inputid+'ortam" name="'+inputid+'ortam" value="">');
	// });
// });

function yazdir(alanID){
	//yazdırılacak nesneyi seçme
	let yazilacakAlan = document.querySelector(alanID);

	//yeni pencere aç, yazdırma alanını ekle
	//yazdır ve pencereyi kapat
	pencere=window.open();
	pencere.document.body.innerHTML=yazilacakAlan.innerHTML; 
	pencere.print();
	pencere.close();
}
/*---------------- İl İlçe Getirme (.js dosyasına eklenmeli)-----------------------*/
	$('#ulke').on('change',function(e){
		var value = $(this).val();
		ilgetir(value);
	});	
	$('#il').on('change',function(e){
		var value = $(this).val();
		ilcegetir(value);
	});
	function ilcegetir(il_id){
		var url = $('body').attr('data-url');
		$.ajax({
			url: "Ajax/index.php?page=ilceler",
			data: "il_id="+il_id,
			type: "POST",
			success: function (sonuc) {
				$('#ilce').html(sonuc);
			}
		});		
	}
	function ilgetir(ulke_id){
		var url = $('body').attr('data-url');
		$.ajax({
			url: "Ajax/index.php?page=ulkeler",
			data: "ulke_id="+ulke_id,
			type: "POST",
			success: function (sonuc) {
				$('#il').html(sonuc);
			}
		});		
	}