$(document).on('click','.number-group .arti',function(){
	var sayi = $(this).parent().find('input').val();
	var sayi = parseInt(sayi);
	var yenisayi = sayi + 1;
	$(this).parent().find('input').val(yenisayi).trigger('change');
});
$(document).on('click','.number-group .eksi',function(){
	var sayi = $(this).parent().find('input').val();
	var sayi = parseInt(sayi);
	var yenisayi = sayi - 1;
	if(yenisayi<0){
		var yenisayi = 0;
	}
	$(this).parent().find('input').val(yenisayi).trigger('change');
});


$(document).on('click','[data-yorumgaleriid]',function(){
	$('#yorummodal .carousel-inner').html('');
	
	var galeriid = $(this).data('yorumgaleriid');
	var galeriid = $(this).data('yorumgaleriid');
	var galeriyorum = $(this).data('yorumgaleriyorum');
	var galeriyildiz = $(this).data('yorumgaleriyildiz');
	var galeriadi = $(this).data('yorumgaleriadi');
	if(galeriyildiz>0){ var yildiz1 = "las"; }else{ var yildiz1 = "lar"; }
	if(galeriyildiz>0){ var yildiz2 = "las"; }else{ var yildiz2 = "lar"; }
	if(galeriyildiz>0){ var yildiz3 = "las"; }else{ var yildiz3 = "lar"; }
	if(galeriyildiz>0){ var yildiz4 = "las"; }else{ var yildiz4 = "lar"; }
	if(galeriyildiz>0){ var yildiz5 = "las"; }else{ var yildiz5 = "lar"; }
	var no = 0;
	$("[data-yorumgaleriid='"+galeriid+"']").each(function() {
		var sayi = $(this).index();
		var resim = $(this).find('img').attr('src');
		if(sayi < 1){
			
			
			$('#yorummodal .carousel-inner').html('<div class="carousel-item text-center active">\
					  <img src="'+resim+'" class="d-block" style="max-height:50vh;width:100%;object-fit:cover" alt="...">\
					</div>');
		}else{
			
			$('#yorummodal .carousel-inner').append('<div class="carousel-item text-center">\
					  <img src="'+resim+'" class="d-block" style="max-height:50vh;width:100%;object-fit:cover" alt="...">\
					</div>');
			
		}
		var no = no + 1;
    });
	
	$('#yorummodal .yazilar').html('<div class="puanlar">\
						<i class="'+yildiz1+' la-star"></i>\
						<i class="'+yildiz2+' la-star"></i>\
						<i class="'+yildiz3+' la-star"></i>\
						<i class="'+yildiz4+' la-star"></i>\
						<i class="'+yildiz5+' la-star"></i>\
						<span>'+galeriyildiz+'</span>\
					</div>\
					<div class="yazi">'+galeriyorum+'</div>\
					<div class="adi">'+galeriadi+'</div>');
	$('#yorummodalbuton').trigger('click');
});