/*
=====
MODAL
=====
*/
// Get the modal
$(document).ready(function(){
	var modal = document.getElementById('myModal');

	// Get the button that opens the modal
	var btn = document.getElementById("myBtn");

	// Get the <span> element that closes the modal
	var span = document.getElementsByClassName("close")[0];

	// When the user clicks the button, open the modal 
	btn.onclick = function() {
	    modal.style.display = "block";
	}

	// When the user clicks on <span> (x), close the modal
	span.onclick = function() {
	    modal.style.display = "none";
	}

	// When the user clicks anywhere outside of the modal, close it
	window.onclick = function(event) {
	    if (event.target == modal) {
	        modal.style.display = "none";
	    }
	}
});

/*
================
TOOGLE DE EVENTO
================
*/
$(document).ready(function(){
	$(".btnCheck1").click(function(){
		$(".p1").toggle();
	});
	$(".btnCheck2").click(function(){
		$(".p2").toggle();
	});
	$(".btnCheckImp").click(function(){
		$(".imp").toggle();
	});
	$(".btnCheckWeb").click(function(){
		$(".web").toggle();
	});
});


$('.btn-prevent').click(function(event){event.preventDefault();}); //Para prevenir envio de Button de agregar elementos
/*
=======================================
Adicionar o eliminar elemnetos IMPRESOS
=======================================
*/

/*
==================================
Adicionar o eliminar elemnetos WEB
==================================
*/ 
//DIGITAL
$("#addDIG").click(function (e) {
	//Append a new row of code to the "#itemsDIG" div
	$("#itemsDIG").append('<div id="div"><div class="cuadricula"><div class="celda celdax90r"><select name="inputDIG[]"><option value="">- - -</option>'+ tipoDigEvento +'</select></div><div class="celda celdax10r">			<button class="deleteDIG removeBTNS"></button></div></div></div>');
});
$("#itemsDIG").on("click", ".deleteDIG", function (e) {
	// $(this).parent("#div").remove();
	$("#div").remove();
});
/*
============================
BOTONES DE SIGUIENTE Y ATRAS
============================
*/
var current_fs, next_fs, previous_fs; //fieldsets
var left, opacity, scale; //fieldset properties which will animate
var animating; //flag to prevent quick multi-click glitches

$(".btn-next").click(function(){
	if(animating) return false;
	  animating = true;
	
	current_fs = $(this).parent();
	next_fs = $(this).parent().next();
	
	
	//show the next fieldset
	next_fs.show(); 
	//hide the current fieldset
	current_fs.animate({opacity: 0}, {
		step: function(now, mx) {
			//as the opacity of current_fs reduces to 0 - stored in "now"
			//1. scale current_fs down to 80%
			scale = 1 - (1 - now) * 0.2;
			//2. bring next_fs from the right(50%)
			left = (now * 50)+"%";
			//3. increase opacity of next_fs to 1 as it moves in
			opacity = 1 - now;
			current_fs.css({'transform': 'scale('+scale+')'});
			next_fs.css({'left': left, 'opacity': opacity});
		}, 
		duration: 800, 
		complete: function(){
			current_fs.hide();
			animating = false;
		}, 
		easing: 'easeInOutBack'
	});
});

$(".btn-prev").click(function() {
	if(animating) return false;
	animating = true;
	
	current_fs = $(this).parent();
	previous_fs = $(this).parent().prev();

	
	//show the previous fieldset
	previous_fs.show(); 
	//hide the current fieldset with style
	current_fs.animate({opacity: 0}, {
		step: function(now, mx) {
			//as the opacity of current_fs reduces to 0 - stored in "now"
			//1. scale previous_fs from 80% to 100%
			scale = 0.8 + (1 - now) * 0.2;
			//2. take current_fs to the right(50%) - from 0%
			left = ((1-now) * 50)+"%";
			//3. increase opacity of previous_fs to 1 as it moves in
			opacity = 1 - now;
			current_fs.css({'left': left});
			previous_fs.css({'transform': 'scale('+scale+')', 'opacity': opacity});
		}, 
		duration: 800, 
		complete: function(){
			current_fs.hide();
			animating = false;
		}, 
		easing: 'easeInOutBack'
	});
});

$(".submit").click(function(){
	return false;
});

/*
=======
TOOLTIP
=======
*/
tippy('.tooltip');


/*
=========================
SELECT OPTION DE IMPRESOS
=========================
*/
var piezaImpEvetno = "<option value='1' >piezaImpEvetno1</option>";
piezaImpEvetno += "<option value='2'>piezaImpEvetno2</option>";
piezaImpEvetno += "<option value='3'>piezaImpEvetno3</option>";
piezaImpEvetno += "<option value='4'>piezaImpEvetno4</option>";
piezaImpEvetno += "<option value='5'>piezaImpEvetno5</option>";
piezaImpEvetno += "<option value='6'>piezaImpEvetno6</option>";

var acabadosImpEvento = "<option value='1' >acabadosImpEvento1</option>";
acabadosImpEvento += "<option value='2'>acabadosImpEvento2</option>";
acabadosImpEvento += "<option value='3'>acabadosImpEvento3</option>";
acabadosImpEvento += "<option value='4'>acabadosImpEvento4</option>";
acabadosImpEvento += "<option value='5'>acabadosImpEvento5</option>";
acabadosImpEvento += "<option value='6'>acabadosImpEvento6</option>";

var tipoPapelEvento = "<option value='1' >tipoPapelEvento1</option>";
tipoPapelEvento += "<option value='2' >tipoPapelEvento2</option>";
tipoPapelEvento += "<option value='3' >tipoPapelEvento3</option>";
tipoPapelEvento += "<option value='4' >tipoPapelEvento4</option>";
tipoPapelEvento += "<option value='5' >tipoPapelEvento5</option>";
tipoPapelEvento += "<option value='6' >tipoPapelEvento6</option>";

/*
========================
SELECT OPTION DE DIGITAL
========================
*/
var tipoDigEvento = "<option value='1' >Tipo Pieza Digital 1</option>";
tipoDigEvento += "<option value='2' >Tipo Pieza Digital 2</option>";
tipoDigEvento += "<option value='3' >Tipo Pieza Digital 3</option>";
tipoDigEvento += "<option value='4' >Tipo Pieza Digital 4</option>";
tipoDigEvento += "<option value='5' >Tipo Pieza Digital 5</option>";
tipoDigEvento += "<option value='6' >Tipo Pieza Digital 6</option>";
tipoDigEvento += "<option value='7' >Tipo Pieza Digital 7</option>";
tipoDigEvento += "<option value='8' >Tipo Pieza Digital 8</option>";

/*
========================
BARRRA DE PROGRESO
========================
*/
function myFunction() {
  document.getElementById("enviar").innerHTML = "<div id='enviandoBOX'><div class='progresoBarra'><div class='cajaProgressBar'><div class='progress_container'><h3>Enviando...</h3><div class='progress progress-danger progress-striped active'><div class='bar' style='width: 100%'></div></div></div></div></div></div>";
}

/*
========================
MODAL ERRORES
========================
*/
$(document).ready(function()
{
$("#cerraModal").on( "click", function() {	 
    $('#modalError').toggle();
     });
});



/*
===============
TABS VERTICALES
===============
*/
$().ready(function(){
	$('.tab-title>a').click(function(e){
	e.preventDefault();
	var index = $(this).parent().index();
	$(this).parent().addClass('active')
	.siblings().removeClass('active')
	.parent('ul.tabs').siblings('.tabs-content').children('.contentTab').removeClass('active')
	.eq(index).addClass('active');
	});
})