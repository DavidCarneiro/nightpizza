$(".nav").addClass("fechada");
	$(".nav").before("<button class=\"navbar-toggle type=\"button\"><span style=\"color\:#fff\;\float:right\">MENU</span></button>");
	
	$(".navbar-toggle").click(function() {
		var altura = $(".listaNav").height();
		if($(".nav").hasClass("fechada")) {
			$(".nav").animate({height:altura},{queue:false, duration:200}).removeClass("fechada");
		}
		else {
			$(".nav").animate({height:"0px"},{queue:false, duration:200}).addClass("fechada");
		}
	});
	
	$(window).resize(function() {
		var tamanhoViewport = $(window).width();
		if (tamanhoViewport > 800) {
			$(".nav").css("height","auto").addClass("fechada");
		} else {
			$(".nav").css("height","0px").addClass("fechada");
		}
	});
