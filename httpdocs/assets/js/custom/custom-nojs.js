/*
===============================================
		
		Remove "no-js" class  
	
===============================================
*/	

jQuery( document ).ready( function( $ ) {
	document.documentElement.className = 
       document.documentElement.className.replace("no-js","js");
});
