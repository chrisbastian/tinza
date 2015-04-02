$(document).ready(function() {


    //Create - 
    $("input[name^='fiscal_info']" ).change(function() {
        if($(this).is(":checked")) {
            $( ".fiscal" ).show();
        } else {
            $( ".fiscal" ).hide();
        }
    });

    if( $( "[name^='id_user_type']" ).val() === "3" ) {
        $( ".fuente" ).show();
    }

    $( "[name^='id_user_type']" ).change(function() {
        if( $( "[name^='id_user_type']" ).val() === "3" ) {
            $( ".fuente" ).show();
        } else {
            $( ".fuente" ).hide();
        }
    });

    //INDEX - Mostrar dialog de inacticar o activar cliente  
    $( ".fa-pause" ).click(function() {
        //console.log($(this).attr('id'));
        $( "#dialog-active" ).dialog({
          resizable: false,
          height:140,
          width: 500,
          modal: true,
          buttons: {
            Aceptar: function() {
              $( this ).dialog( "close" );
            },
            Cancel: function() {
              $( this ).dialog( "close" );
            }
          }
        });
      });
});

//Javascript
$(function()
{
	 $( "input[name^='fuente']" ).autocomplete({
	  source: "../../../users/usersAutocomplete",
	  minLength: 2,
	  select: function(event, ui) {
	  	$( "input[name^='fuente']" ).val(ui.item.value);
        $("#hdn_id_fuente").val(ui.item.id);        
	  }
	});
});
