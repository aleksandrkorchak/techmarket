$(document).ready(function() {
    $('#list').click(function(event){event.preventDefault();$('#products .item').addClass('list-group-item');$('#products .item').addClass('grid-group-item');});
    $('#grid').click(function(event){event.preventDefault();$('#products .item').removeClass('list-group-item');}); 
	
	$('#grid').click(function(event){event.preventDefault();$('#products .boot-in').addClass('grid');});
    $('#list').click(function(event){event.preventDefault();$('#products .boot-in').removeClass('grid');}); 
});