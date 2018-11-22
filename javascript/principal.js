$(document).ready(function() 
{	// dialog que muestra el gif de espera, en las consultas
	$( "#dialog_carga" ).dialog(
	{
		autoOpen: false,
		width: 150,
		height: 130,
		modal: true,
		open:function()
		{
			$('.ui-button.ui-widget.ui-state-default.ui-corner-all.ui-button-icon-only.ui-dialog-titlebar-close').remove();
		},
		buttons: {}
	});
	$(document).ajaxStart(function(){$("#dialog_carga").dialog( "open" );});
	$(document).ajaxComplete(function(){$("#dialog_carga").dialog( "close" );});


});

function amdTodma(aux_fecha)
{
	var fecha_dma=aux_fecha.substr(8,2)+"/"+aux_fecha.substr(5,2)+"/"+aux_fecha.substr(0,4);
	return fecha_dma;
}