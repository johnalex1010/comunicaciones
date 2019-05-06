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
//IMPRESOS
$("#addIMP").click(function (e) {
	//Append a new row of code to the "#itemsDIG" div
	$("#itemsIMP").append('<div id="divIMP"><div class="cuadricula"><div class="celda celda90r"><table><tr><td><select name="ImpPieza[]"><option value="">- - Pieza - -</option>'+piezaImpEvento+'</select></td><td><select name="ImpAcabado[]"><option value="9">- - Acabado - -</option>'+acabadosImpEvento+'</select></td><td><select name="ImpTP[]"><option value="9">- - Tipo de papel - -</option>'+tipoPapelEvento+'</select></td><td><input type="text" name="IMPCant[]" value="" placeholder="Cantidad"></td></tr></table></div></div><button class="deleteIMP removeBTNS"></button></div>');
});
$("#itemsIMP").on("click", ".deleteIMP", function (e) {
	$(this).parent("#divIMP").remove();
});


//DIGITAL
$("#addDIG").click(function (e) {
	//Append a new row of code to the "#itemsDIG" div
	$("#itemsDIG").append('<div id="divDIG"><div class="cuadricula"><div class="celda celdax90r"><select name="inputDIG[]"><option value="">- - -</option>'+ tipoDigEvento +'</select></div></div><button class="deleteDIG removeBTNS"></button></div>');
});
$("#itemsDIG").on("click", ".deleteDIG", function (e) {
	$(this).parent("#divDIG").remove();
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
var piezaImpEvento = "<option value='1' >Afiche</option>";
piezaImpEvento += "<option value='2'>Brochure</option>";
piezaImpEvento += "<option value='3'>Cartilla</option>";
piezaImpEvento += "<option value='4'>Certificados</option>";
piezaImpEvento += "<option value='5'>Escarapelas</option>";
piezaImpEvento += "<option value='6'>Librillo</option>";
piezaImpEvento += "<option value='7'>Material POP</option>";
piezaImpEvento += "<option value='8'>Pendón</option>";
piezaImpEvento += "<option value='9'>Rompetráfico</option>";
piezaImpEvento += "<option value='10'>Volantes</option>";
piezaImpEvento += "<option value=''>Vacio</option>";

var acabadosImpEvento = "<option value='1' >Brillante</option>";
acabadosImpEvento += "<option value='2'>Mate</option>";
acabadosImpEvento += "<option value='3'>Plastificado</option>";
acabadosImpEvento += "<option value='4'>Vacio</option>";

var tipoPapelEvento = "<option value='1'>Autoadhesivo</option>";
tipoPapelEvento += "<option value='2'>Bond 70 gr</option>";
tipoPapelEvento += "<option value='3'>Bond 90 gr</option>";
tipoPapelEvento += "<option value='4'>Bond 115 gr</option>";
tipoPapelEvento += "<option value='5'>Ecológico</option>";
tipoPapelEvento += "<option value='6'>Lino</option>";
tipoPapelEvento += "<option value='7'>Propalcote gr 90</option>";
tipoPapelEvento += "<option value='8'>Propalcote de 115 gr</option>";
tipoPapelEvento += "<option value='9'>Propalcote de 150 gr</option>";
tipoPapelEvento += "<option value='10'>Propalcote de 200 gr</option>";
tipoPapelEvento += "<option value='11'>Propalcote de 300 gr</option>";
tipoPapelEvento += "<option value='12'>Propalmate 90 gr</option>";
tipoPapelEvento += "<option value='13'>Propalmate 240 gr</option>";
tipoPapelEvento += "<option value='14'>Opalina blanca 90 gr</option>";
tipoPapelEvento += "<option value='15'>Opalina blanca 180 gr</option>";
tipoPapelEvento += "<option value='16'>Opalina blanca 200 gr</option>";
tipoPapelEvento += "<option value='17'>Opalina blanca 240 gr</option>";
tipoPapelEvento += "<option value='18'>Opalina beige 90 gr</option>";
tipoPapelEvento += "<option value='19'>Opalina beige 180 gr</option>";
tipoPapelEvento += "<option value=''>Vacio</option>";

/*
========================
SELECT OPTION DE DIGITAL
========================
*/
var tipoDigEvento = "<option value='1' >Led</option>";
tipoDigEvento += "<option value='2' >Mailing</option>";
tipoDigEvento += "<option value='3' >Pantallas</option>";

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