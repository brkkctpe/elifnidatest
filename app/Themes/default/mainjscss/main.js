$(document).ready(function(){
$('.telefon').mask('(000) 000-00-00');
$('.telefon_maskeli').mask('0000000000',{placeholder:"5xxxxxxxx"});
$('.tarih').mask("00/00/0000", {placeholder: "__/__/____"});
$('#sepetgetir').trigger('click');
});

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
	$('#'+id+' button[type="submit"]').attr('disabled', 'disabled');
	formgonder(id,adata);
});
$(document).on("keyup","[data-changeform] input,[data-changeform=true] textarea,[data-changeform=true] select", delay(function (e) {
	var id = $(this).parents('form').attr('id');
	var myForm = document.getElementById(id);
	var adata = new FormData(myForm);
	$('#'+id+' button[type="submit"]').attr('disabled', 'disabled');
	formgonder(id,adata);
}, 300));
$(document).on("change","input[data-changeform=true],textarea[data-changeform=true],select[data-changeform=true]", function (e) {
	var id = $(this).parents('form').attr('id');
	var myForm = document.getElementById(id);
	var adata = new FormData(myForm);
	$('#'+id+' button[type="submit"]').attr('disabled', 'disabled');
	formgonder(id,adata);
});
$(document).on("change","input[data-changeislem],textarea[data-changeislem],select[data-changeislem]", function (e) {
	var sayfa = $(this).attr('data-changeislem');
	var deger = $(this).attr('data-changedeger');
	var value = $(this).val();
	if(value!=""){
		deger = deger+"{:}"+value;
	}
	var buton = "";
	islemyap(sayfa,deger,buton);
});
$(document).on("keyup","input[data-keyupislem],textarea[data-keyupislem]", delay(function (e) {
	var sayfa = $(this).attr('data-keyupislem');
	var deger = $(this).attr('data-keyupdeger');
	var value = $(this).val();
	if(value!=""){
		deger = deger+"{:}"+value;
	}
	var buton = "";
	islemyap(sayfa,deger,buton);
}, 300));

$(document).on("change","select[data-changeislem]", function (e) {
	var sayfa = $(this).attr('data-changeislem');
	var deger = $(this).attr('data-changedeger');
	var value = $(this).val();
	if(value!=""){
		deger = deger+"{:}"+value;
	}
	
	var buton = "";
	islemyap(sayfa,deger,buton);	
});
$(document).on("change","input[data-onizleme]", function (event) {
	var preview = $(this).attr('data-onizleme');
	var input = $(event.currentTarget);
	var file = input[0].files[0];
	var reader = new FileReader();
	reader.onload = function(e){
	image_base64 = e.target.result;
	$('#'+preview+' img').attr("src",image_base64);
	};
	reader.readAsDataURL(file);	
});

$(function() {
    // Multiple images preview in browser
    var imagesPreview = function(input, placeToInsertImagePreview) {
        if (input.files) {
			$(placeToInsertImagePreview).html("");
            var filesAmount = input.files.length;
            for (i = 0; i < filesAmount; i++) {
                var reader = new FileReader();
                reader.onload = function(event) {
					image_base64 = event.target.result;
					$(placeToInsertImagePreview).prepend("<img src='"+image_base64+"' style='width:100%;object-fit:cover;'/>");
                }
                reader.readAsDataURL(input.files[i]);
            }
        }
    };

    $('[data-resimonizle=true]').on('change', function() {
		var hedef = "#onizle"+$(this).attr('name');
        imagesPreview(this, hedef);
    });
});
function formgonder(id,adata){	
	var url = $('body').attr('data-url');
	loader('#'+id+' .loader',1);
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
		url: url+"app/Jquery/index.php?page="+id,
		data: adata,
		contentType: false,
		processData: false,
		type: "POST",
		dataType: "json",
		success: function (sonuc) {
			if(sonuc.tikla!="" && typeof sonuc.tikla != "undefined"){
				tikla(sonuc.tikla);	
			}	
			if(sonuc.sil!="" && typeof sonuc.sil != "undefined"){
				$('#'+id+' input:not([type="hidden"])').val('');
				$('#'+id+' textarea').val('');			
			}			
			if(sonuc.git!="" && typeof sonuc.git != "undefined"){
				git(sonuc.git);					
			}
			if(sonuc.swaluyari!="" && typeof sonuc.swaluyari != "undefined"){					
				swal(sonuc.swaluyari, {
					  icon: sonuc.swalrenk,
				});				
			}		
			if(sonuc.tost!="" && typeof sonuc.tost != "undefined"){	
				tostmesaj(sonuc.tost,sonuc.tostb,sonuc.mesaj);			
			}
			
			$('#'+id+' button[type="submit"]').removeAttr('disabled');	
			loader('#'+id+' .loader',0);			
			$('#'+id+' .sonuc').html(sonuc.uyari);										
			
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
				degisattr(sonuc.degisattr,sonuc.etiket,sonuc.degisattrdeger);	
			}		
			if(sonuc.classekle!="" && typeof sonuc.classekle != "undefined"){
				classekle(sonuc.classekle,sonuc.classekledeger);	
			}	
			if(sonuc.classcikar!="" && typeof sonuc.classcikar != "undefined"){
				classcikar(sonuc.classcikar,sonuc.classcikardeger);	
			}	
			if(sonuc.ortamlistele!="" && typeof sonuc.ortamlistele != "undefined"){
				ortamlistele();	
			}							
		}
	  });			
}

$(document).on("click","[data-islem]", function (e) {
	var sayfa = $(this).attr('data-islem');
	var deger = $(this).attr('data-deger');
	var emin = $(this).attr('data-eminmisin');
	var buton = $(this).html();
	
	if(emin){
		
		swal({
		  title: "Emin misin?",
		  text: "Bu işlemi yaptığınızda geri gönüşü olmayacak eminmisiniz",
		  icon: "warning",
		  buttons: ["Vazgeç", "Eminim"],
		})
		.then((willDelete) => {
		  if (willDelete) {
			$(this).attr('disabled', 'disabled');
			islemyap(sayfa,deger,buton);
		  } else {
		  }
		});			
		
	}else{		
		$(this).attr('disabled', 'disabled');
		islemyap(sayfa,deger,buton);
	}
});
function islemyap(sayfa,deger,buton){
	var url = $('body').attr('data-url');
	var degerler = "deger="+deger;
	$.ajax({						
		type: "post",
		url: url+"app/Jquery/index.php?page="+sayfa,
		data: degerler,
		dataType: "json",
		success: function (sonuc){
			if(sonuc.tikla!="" && typeof sonuc.tikla != "undefined"){
				tikla(sonuc.tikla);	
			}	

			if(sonuc.uyari!="" && typeof sonuc.uyari != "undefined"){
				swal(sonuc.uyari, {
					icon: sonuc.renk,
				});				
			}	
			if(sonuc.tost!="" && typeof sonuc.tost != "undefined"){	
				tostmesaj(sonuc.tost,sonuc.tostb,sonuc.mesaj);			
			}
			if(sonuc.sil!="" && typeof sonuc.sil != "undefined"){
				sil(sonuc.sil);					
			}
			if(sonuc.git!="" && typeof sonuc.git != "undefined"){
				git(sonuc.git);					
			}	
			$('[data-islem="'+sayfa+'"][data-deger="'+deger+'"]').html(buton).removeAttr('disabled');
			
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
			if(sonuc.classekle!="" && typeof sonuc.classekle != "undefined"){
				classekle(sonuc.classekle,sonuc.deger);	
			}	
			if(sonuc.classcikar!="" && typeof sonuc.classcikar != "undefined"){
				classcikar(sonuc.classcikar,sonuc.deger);	
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
function classekle(hedef,deger){
	$(hedef).addClass(deger);
}
function classcikar(hedef,deger){
	$(hedef).removeClass(deger);
}

function loader(alan,durum){
	if(durum>0){
		$(alan).html('<div class="loaders"><div class="loader-inner ball-pulse"><div></div><div></div><div></div></div></div>');
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
		toastr.success(mesaj,baslik,toastroptions);
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
		toastr.info(mesaj,baslik,toastroptions);
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
		toastr.warning(mesaj,baslik,toastroptions);
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
		toastr.error(mesaj,baslik,toastroptions);
	}
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
			url: url+"app/Jquery/index.php?page=ilceler",
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
			url: url+"app/Jquery/index.php?page=ulkeler",
			data: "ulke_id="+ulke_id,
			type: "POST",
			success: function (sonuc) {
				$('#il').html(sonuc);
			}
		});		
	}