/*
===============================================
		
		Navicon Transformicons  
	
===============================================
*/		

jQuery( document ).ready( function( $ ) { // Wrap all scripts in this

    var anchor = document.querySelectorAll('button');
    
    [].forEach.call(anchor, function(anchor){
      var open = false;
      anchor.onclick = function(event){
        event.preventDefault();
        if(!open){
          this.classList.add('open');
          open = true;
        }
        else{
          this.classList.remove('open');
          open = false;
        }
      }
    }); 
}); // Wrap all scripts in this
