//Jquery Validate
$.validate({
	lang: 'fr',
	form : '#modif_book'
});

$.validate({
	lang: 'fr',
	form : '#new_book'
});

$.validate({
	lang: 'fr',
	form : '#new_comment'
});

$( document ).ready(function() {
});

//Initialize FooTable
jQuery(function($){
	$('.table').footable();
});

//Cart functions
function add (id){
	$('#cart').load('cart.php?action=0&id='+id, function() {
		
	});
}
function remove (id){
	$('#cart').load('cart.php?action=1&id='+id, function() {
		
	});
}
function increase (id){
	$('#cart').load('cart.php?action=2&id='+id, function() {
		
	});
}
function decrease (id){
	$('#cart').load('cart.php?action=3&id='+id, function() {
		
	});
}