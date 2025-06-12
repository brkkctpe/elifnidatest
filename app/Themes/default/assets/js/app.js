


// Example starter JavaScript for disabling form submissions if there are invalid fields
(function () {
  'use strict'

// Fetch all the forms we want to apply custom Bootstrap validation styles to
var forms = document.querySelectorAll('.needs-validation')

// Loop over them and prevent submission
Array.prototype.slice.call(forms)
.forEach(function (form) {
  form.addEventListener('submit', function (event) {
	if (!form.checkValidity()) {
	  event.preventDefault()
	  event.stopPropagation()
	}

	form.classList.add('was-validated')
  }, false)
})
})()



$(document).on('click','.solmenuac',function(){
	if($(this).hasClass('active')){
		$(this).removeClass('active');
		$('#acilanmenu').removeClass('active');
	}else{
		$(this).addClass('active');
		$('#acilanmenu').addClass('active');
	}
});

$("[data-liste]").hover(function() {
	var sayi = $(this).data("liste");
	var sectionid = $(this).parents("section").data("hoveralan");
	
	$("[data-hoveralan="+sectionid+"] [data-liste]").removeClass("active");
	$("[data-hoveralan="+sectionid+"] [data-liste="+sayi+"]").addClass("active");
	$("[data-hoveralan="+sectionid+"] [data-list]").removeClass("active");
	$("[data-hoveralan="+sectionid+"] [data-list="+sayi+"]").addClass("active");
	
});
$(document).on('click','#header .aramabuton',function(){
	if($('#header .arama').hasClass('active')){
		$('#header .arama').removeClass('active');
	}else{
		$('#header .arama').addClass('active');
	}
});

$(document).on('click','#mobilheader .aramabuton',function(){
	if($('#mobilheader .arama').hasClass('active')){
		$('#mobilheader .arama').removeClass('active');
	}else{
		$('#mobilheader .arama').addClass('active');
	}
});


AOS.init();
new WOW().init();

// Init fancyBox
$().fancybox({
  selector : '.slick-slide:not(.slick-cloned)',
  hash     : false
});

var instance_swiper = new Swiper(".slider", {
	pagination: {
	  el: ".slider-pagination"
	},
	autoplay: {
	  delay: 2500,
	  disableOnInteraction: false,
	},
	navigation: {
	  nextEl: ".slider-button-next",
	  prevEl: ".slider-button-prev",
	},
});
var instance_swiper = new Swiper(".faydalibilgiler", {
	pagination: {
	  el: ".faydalibilgiler-pagination"
	},
	autoplay: {
	  delay: 2500,
	  disableOnInteraction: false,
	},
	navigation: {
	  nextEl: ".faydalibilgiler-button-next",
	  prevEl: ".faydalibilgiler-button-prev",
	},
});

var swiper = new Swiper(".galeri", {
	slidesPerView: 1,
	spaceBetween: 10,
    centeredSlides: true,
	loop: true,
	pagination: {
	  el: ".galeri-pagination",
	},
	navigation: {
	  nextEl: ".galeri-button-next",
	  prevEl: ".galeri-button-prev",
	},
	breakpoints: {
	  350: {
		slidesPerView: 1,
		spaceBetween: 10,
	  },
	  640: {
		slidesPerView: 2,
		spaceBetween: 10,
	  },
	  768: {
		slidesPerView: 2,
		spaceBetween: 10,
	  },
	  1024: {
		slidesPerView: 4,
		spaceBetween: 10,
	  },
	},
  });
var swiper = new Swiper(".bloglar", {
	slidesPerView: 1,
	spaceBetween: 10,
	pagination: {
	  el: ".galeri-pagination",
	},
	navigation: {
	  nextEl: ".galeri-button-next",
	  prevEl: ".galeri-button-prev",
	},
	breakpoints: {
	  350: {
		slidesPerView: 1,
		spaceBetween: 10,
	  },
	  640: {
		slidesPerView: 2,
		spaceBetween: 10,
	  },
	  768: {
		slidesPerView: 2,
		spaceBetween: 10,
	  },
	  1024: {
		slidesPerView: 3,
		spaceBetween: 10,
	  },
	},
  });
var swiper = new Swiper(".tarifler", {
	slidesPerView: 1,
	spaceBetween: 10,
	pagination: {
	  el: ".tarifler-pagination",
	},
	navigation: {
	  nextEl: ".tarifler-button-next",
	  prevEl: ".tarifler-button-prev",
	},
	breakpoints: {
	  350: {
		slidesPerView: 1,
		spaceBetween: 10,
	  },
	  640: {
		slidesPerView: 2,
		spaceBetween: 10,
	  },
	  768: {
		slidesPerView: 2,
		spaceBetween: 10,
	  },
	  1024: {
		slidesPerView: 3,
		spaceBetween: 10,
	  },
	},
  });

var a = 0;
$(window).scroll(function() {


});

var input = document.querySelector("#phone");
window.intlTelInput(input, {
// allowDropdown: false,
// autoInsertDialCode: true,
// autoPlaceholder: "off",
// dropdownContainer: document.body,
// excludeCountries: ["us"],
// formatOnDisplay: false,
// geoIpLookup: function(callback) {
//   fetch("https://ipapi.co/json")
//     .then(function(res) { return res.json(); })
//     .then(function(data) { callback(data.country_code); })
//     .catch(function() { callback("us"); });
// },
hiddenInput: "full_number",
// initialCountry: "auto",
// localizedCountries: { 'de': 'Deutschland' },
// nationalMode: false,
// onlyCountries: ['us', 'gb', 'ch', 'ca', 'do'],
// placeholderNumberType: "MOBILE",
// preferredCountries: ['cn', 'jp'],
// separateDialCode: true,
// showFlags: false,
// useFullscreenPopup: true,
utilsScript: "utils.js"
});