function fonctionpanier(trace) {
	var httpRequest = new XMLHttpRequest();

	httpRequest.onreadystatechange = function(){
			if (httpRequest.readyState === 4){
				var tab=httpRequest.responseText;
				console.log(typeof tab);
				console.log(tab);
						if(tab.toLowerCase() === " false"){
							 window.alert("vous avez déja enregistré ce produit!");
						}
	                   
						else
							{
							 //window.alert(tab);
							
							document.querySelector("#total").innerHTML=tab;
							
							}
							
	                    
	                   
	                   //location.reload();

			}
	};

	httpRequest.open('GET',trace,true);
	httpRequest.send();
	
	
		  
}

function effacerpanier(trace,url1,url2){
	var httpRequest = new XMLHttpRequest();
	httpRequest.onreadystatechange = function(){
		if (httpRequest.readyState === 4){						 					
						document.querySelector("#"+trace).innerHTML="";	
						
						var b=0.0;
						var a = document.querySelectorAll(".prix");
							for(var i=0;i<a.length; i++){		 
								  b+=parseFloat(a[i].innerText);
							}
						document.querySelector("#total_prix1").innerText=b;

		}
};

httpRequest.open('GET',url1,true);
httpRequest.send();

function panier(url1) {
	$.ajax({
		type: 'GET', //La méthode cible (POST ou GET)
		url : url1, //Script Cible
		asynch : true
	}).done(function(code_html){ //code_html contient le HTML renvoyé

		if(code_html.toLowerCase() === " false")
		{
			window.alert("vous avez déja enregistré ce produit!");
		}else
		{
			//Afficher la somme des produits commandés dans la barre de navigation
			$("#total").html(code_html);
		}
	});
}

}
//Les écouteurs

