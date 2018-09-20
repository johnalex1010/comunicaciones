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

/*
=======================================
Adicionar o eliminar elemnetos IMPRESOS
=======================================
*/
var intTextBoxIMP=1;
//FUNCTION TO ADD File BOX ELEMENT
function add_trIMP(){
    if(intTextBoxIMP<10){
 
intTextBoxIMP = intTextBoxIMP + 1;

var contentIDIMP = document.getElementById('row_divIMP');
var newtr = document.createElement('tr');
newtr.setAttribute('id','floorstrText'+intTextBoxIMP);
newtr.innerHTML = "<td><div class='group'><select name='selectPiezaIMPEvento[]'><option value='' disable selected>- - -</option>"+ piezaImpEvetno +"</select><span class='bar'></span><label>Seleccione pieza</label></div></td><td><div class='group'><select name='acabadoIMPEvento[]'><option value='' disable selected>- - -</option>"+ acabadosImpEvento +"</select><span class='bar'></span><label>Seleccione Acabados</label></div></td><td><div class='group'><select name='tipoPapelIMPEvento[]'><option value='' disable selected>- - -</option>"+ tipoPapelEvento +"</select><span class='bar'></span><label>Tipo de papel</label></div></td><td><div class='group'><input type='text' name='cantidadIMPEvento[]'><span class='bar'></span><label>Cantidad</label></div></td>";
contentIDIMP.appendChild(newtr);
    }
    else{
        alert("Solo se puedes agregar 10 elementos");
    }
}
 
//FUNCTION TO REMOVE TEXT BOX ELEMENT
function remove_trIMP(){
	if(intTextBoxIMP != 0){
	    var contentIDIMP = document.getElementById('row_divIMP');
	    contentIDIMP.removeChild(document.getElementById('floorstrText'+intTextBoxIMP));
	    intTextBoxIMP = intTextBoxIMP-1;
    }
}
/*
==================================
Adicionar o eliminar elemnetos WEB
==================================
*/
 
var intTextBoxDIG=1;
//FUNCTION TO ADD File BOX ELEMENT
function add_trWEB(){
    if(intTextBoxDIG<10){
 
intTextBoxDIG = intTextBoxDIG + 1;
var contentID = document.getElementById('row_divDIG');
var newtr = document.createElement('div');
newtr.setAttribute('id','floorstrTextDig'+intTextBoxDIG);
newtr.innerHTML = "<div class='group'><select name='tipoDIGEvento[]'><option value='' disable selected>- - -</option>"+ tipoDigEvento +"</select><span class='bar'></span><label>Seleccione pieza</label></div>";
contentID.appendChild(newtr);
    }
    else{
        alert("you will save only 10 reports at a time so please save the u have entered reports");
    }
}
 
//FUNCTION TO REMOVE TEXT BOX ELEMENT
function remove_trWEB(){
	if(intTextBoxDIG != 0){
	    var contentID = document.getElementById('row_divDIG');
	    contentID.removeChild(document.getElementById('floorstrTextDig'+intTextBoxDIG));
	    intTextBoxDIG = intTextBoxDIG-1;
    }
}
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
var piezaImpEvetno = "<option value='piezaImpEvetno1' >piezaImpEvetno1</option>";
piezaImpEvetno += "<option value='piezaImpEvetno2' >piezaImpEvetno2</option>";
piezaImpEvetno += "<option value='piezaImpEvetno3' >piezaImpEvetno3</option>";

var acabadosImpEvento = "<option value='acabadosImpEvento1' >acabadosImpEvento1</option>";
acabadosImpEvento += "<option value='acabadosImpEvento2' >acabadosImpEvento2</option>";
acabadosImpEvento += "<option value='acabadosImpEvento3' >acabadosImpEvento3</option>";

var tipoPapelEvento = "<option value='tipoPapelEvento1' >tipoPapelEvento1</option>";
tipoPapelEvento += "<option value='tipoPapelEvento2' >tipoPapelEvento2</option>";
tipoPapelEvento += "<option value='tipoPapelEvento3' >tipoPapelEvento3</option>";

/*
========================
SELECT OPTION DE DIGITAL
========================
*/
var tipoDigEvento = "<option value='tipo digital 1' >tipo digital 1</option>";
tipoDigEvento += "<option value='tipo digital 2' >tipo digital 2</option>";
tipoDigEvento += "<option value='tipo digital 3' >tipo digital 3</option>";
tipoDigEvento += "<option value='tipo digital 4' >tipo digital 4</option>";

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