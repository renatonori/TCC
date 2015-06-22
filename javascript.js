function showAdicionar(){
	document.getElementById("adicionarCultura").style.display = "block";
	document.createElement("boxTitle");
}
function hideAdicionar(){
	document.getElementById("adicionarCultura").style.display = "none";
}
function hideRemoveEditaCultura(){
	document.getElementById("editaRemoveCultura").style.display = "none";
}
function showRemoveEditaCultura(data,index){
	document.getElementById("editaRemoveCultura").style.display = "block";
	var JSONObject = JSON.parse(data);
   	document.getElementById("imageURLRemove").value = JSONObject["imgURL"];
	document.getElementById("nomeRemove").value = JSONObject["nome"];
	document.getElementById("nomeCientRemove").value = JSONObject["nomeCient"]; 
	document.getElementById("dataRemove").value = JSONObject["dataDePlantio"];
	document.getElementById("regiaoRemove").value = JSONObject["regiaoDePlantio"];
	document.getElementById("infoRemove").value = JSONObject["infAdc"];
	document.getElementById("hiddenIndex").value = index;
	document.createElement("boxTitle");

}
function mostrarNaTela(index){
			jQuery.ajax({
				type: "POST",
				url: "mostrarCultura.php",
				data: 'index=' + index,
				success: function(data)
				{
					showRemoveEditaCultura(data,index);	
				}
			});
}

function deletaOuRemove(buttonName,index){
		if(buttonName == '1'){
			jQuery.ajax({
				type: "POST",
				url: "deletarCultura.php",
				data: 'index=' + index,
				success: function(data)
				{
					if(data == "Cultura deletada com sucesso"){
						hideRemoveEditaCultura();
						window.location.reload();
					}
					alert(data);
				}
			});
		}

}

jQuery(document).ready(function(){
	jQuery('#adicionarForm').submit(function(){
		var dados = jQuery( this ).serialize();
		jQuery.ajax({
			type: "POST",
			url: "adicionarCultura.php",
			data: dados,
			success: function(data)
			{
				//alert(data);
				if(data == "Cultura adicionada com êxito"){
					hideAdicionar();
					window.location.reload();
				}
					
				alert(data);
			}
		});
		
		return false;
	});

	$('#removeEditaForm').submit(function() { 
		var dados = jQuery( this ).serialize();
		jQuery.ajax({
			type: "POST",
			url: "editarCultura.php",
			data: dados,
			success: function(data)
			{
				if(data == "Cultura alterado com sucesso" || data == " Cultura alterado com sucesso"){
					hideRemoveEditaCultura();
					window.location.reload();
				}
				alert(data);
			}
		});
		
		return false;
	}); 
});
$('div').click(function(){
	var index = $('div').index(this);
	var indexPrin = $('.principal').index();
	
	if(index > indexPrin){
		mostrarNaTela(index - 3);
	}
});

