ddsmoothmenu.init({
  mainmenuid: "smoothmenu1", //menu DIV id
  orientation: 'h', //Horizontal or vertical menu: Set to "h" or "v"
  classname: 'ddsmoothmenu', //class added to menu's outer DIV
  contentsource: "markup" //"markup" or ["container_id", "path_to_menu_file"]
})

tinymce.init({
    selector: "textarea.editor",
    language : "es",
    menubar: false,
    toolbar_items_size: 'small',
    plugins: [
        "advlist autolink lists link image charmap print preview anchor",
        "searchreplace visualblocks code fullscreen",
        "insertdatetime media table contextmenu paste"
    ],
    toolbar: "undo redo | styleselect | bold italic | alignleft aligncenter alignright alignjustify | bullist numlist outdent indent | link image"
});
$(document).ready(function () {

	$.datepicker.regional['es'] = {
        closeText: 'Cerrar',
        prevText: '<Ant',
        nextText: 'Sig>',
        currentText: 'Hoy',
        monthNames: ['ENERO', 'FEBRERO', 'MARZO', 'ABRIL', 'MAYO', 'JUNIO', 'JULIO', 'AGOSTO', 'SEPTIEMBRE', 'OCTUBRE', 'NOVIEMBRE', 'DICIEMBRE'],
        monthNamesShort: ['Ene','Feb','Mar','Abr', 'May','Jun','Jul','Ago','Sep', 'Oct','Nov','Dic'],
        dayNames: ['DOMINGO', 'LUNES', 'MARTES', 'MIERCOLES', 'JUEVES', 'VIERNES', 'SABADO'],
        dayNamesShort: ['Dom','Lun','Mar','Mie','Juv','Vie','Sab'],
        dayNamesMin: ['Do','Lu','Ma','Mi','Ju','Vi','Sá'],
        weekHeader: 'Sm',
        dateFormat: 'dd/mm/yy',
        firstDay: 1,
        isRTL: false,
        showMonthAfterYear: false,
        yearSuffix: ''
    };
  	$.datepicker.setDefaults($.datepicker.regional['es']);

  	$(".date").datepicker({
    	changeMonth: true,
      	changeYear: true,
      	yearRange: '-2:-0',
      	//showOn: "button",
      	buttonImage: $("#base_url").val()+"public/images/panel/calendar.png",
      	//buttonImageOnly: true,
      	dateFormat: 'yy/mm/dd',
      	altField: "",
      	altFormat: "yy/mm/dd",
      	showAnim: "show"
      /*dateFormat: 'DD, d MM, yy'*/
  	});


    $(".message").fadeIn(800);
    
  	setTimeout( function(){
  	  $(".message").animate({opacity:0}, function() {
  	    $(".message").slideUp("medium", function() {
  		    $(".message").css("opacity", '0');
  		  });
  	  });
    }, 6000);

 
    $('input:checkbox, input:radio, input:file').uniform();
   	$('.select').uniform();

    $("#chk_todos").click( function(){
      $('.chk_datos').attr('checked',($(this).is(':checked')) ? true:false);
      $.uniform.update(".chk_datos");
    })

    $('.tooltip').tipsy({gravity: 'n',fade: true});

    $.validator.messages.required = "";
    $('#form_registro').validate();


    $(".estado_grupo").click( function(){

      var id_grupo = $(this).parents('tr').attr('id');
      var estado   = ($(this).is(':checked')) ? 1 : 0 ;

      $.ajax({
        url: $("#base_url").val()+"panel/ajax/update_estado_grupo",
        type: "POST",
        data: "csrf_token_infobox="+$('input[name=csrf_token_infobox]').val()+"&id_grupo="+id_grupo+"&estado="+estado,
        dataType: "json"
      }).done( function(res){

        if(res.estado==0){
          var msg = (estado==0) ? 'Desactivado con exito!' : 'Activado con exito!';
          $(".msg_"+id_grupo).text(msg).addClass('verde').animate({opacity:1},1000);
          setTimeout( function(){
            $(".msg_"+id_grupo).animate({opacity:0}, function(){
              $(".msg_"+id_grupo).text('');
            });
          }, 3000);
          
        }

      }).fail(function(jqXHR, textStatus, errorThrown){

        _alert('Hubo un error al actualizar los datos: <b>'+errorThrown+'</b>');

      });

    })
  


 	$("#tx_usuario").autocomplete({
    	minLength: 2,
		  source: function(request, response) { 

  			jQuery.ajax({
  			   url: 	 $("#base_url").val()+"ajax/AutocompleteUsuarios",
  			   type: "POST",
  			   data:  {
  			   			empresa : $("#cb_cliente").val(),
  			   			valor : request.term
  			   	},
  			    dataType: "json",
  				success: function(data) 	{
  					response(data);
  			  	}	

  			})
 	    },
 	    select: function (e, ui) {

	     $("#tx_usucodigo").val(ui.item.codigo);
	       
	    }

  });

    $("#btn_buscar_comercio").click( function(){
    	$.ajax({
    		url: $("#base_url").val()+"ajax/BuscarComercios",
    		type: "POST",
    		data: "id_usuario="+$("#tx_usucodigo").val(),
    		dataType: "json",
    		success: function(data){

    			var tabla = '';

    			if(data.length >0){
    				for (var i = 0; i < data.length; i++) {
    					
    					var comentario = (data[i].Tx_EmpObs == null) ? 'Sin Observaciones' : data[i].Tx_EmpObs;
    					var codigo     = (data[i].No_EmpCodigo == null) ? '' : data[i].No_EmpCodigo;
    					var horario    = (data[i].No_EmpHorario == null) ? 'Sin Horario' : data[i].No_EmpHorario;

    					tabla += '<tr>';
    					tabla += '<td class="center">'+(i+1)+'</td>';
    					tabla += '<td>'+codigo+'</td>';
    					tabla += '<td>'+data[i].no_Tipo+'</td>';
    					tabla += '<td>'+data[i].No_Empresa+'</td>';
    					tabla += '<td>'+data[i].Tx_EmpDireccion+'</td>';
    					tabla += '<td>'+horario+'</td>';
    					tabla += '<td>'+comentario+'</td>';
    					tabla += '<td class="center"><a href="'+$("#base_url").val()+'solicitud/generar_ticket/'+data[i].Id_Empresa+'" class="ver"></a></td>';
    					tabla += '<tr>';

    				}
    			}

    			$("#tbody_comercios").html(tabla);
    		}
    	})
    })

	$("#cb_contacto").change( function(){

		var id = $(this).val();

		$.ajax({
    		url: $("#base_url").val()+"ajax/DatosContacto",
    		type: "POST",
    		data: "id_contacto="+id+"&id_comercio="+$("#id_comercio").val(),
    		dataType: "json",
    		success: function(data){

    			if(data.length >0){
	    			var tel = (data[0].No_PerTelefono == null) ? 'Sin Datos' : data[0].No_PerTelefono;
	    			var cor = (data[0].No_PerCorreo == null) ? 'Sin Datos' : data[0].No_PerCorreo;

	    			$(".telefono_contacto").text(tel);
	    			$(".correo_contacto").text(cor);
    			}else{
    				$(".telefono_contacto").text('');
    				$(".correo_contacto").text('');
    			}
    			
    		}
    	})

	})

	$("#cb_servicio").change( function(){

		var id = $(this).val();

		$.ajax({
    		url: $("#base_url").val()+"ajax/TiposServicios",
    		type: "POST",
    		data: "id_servicio="+id,
    		dataType: "json",
    		success: function(data){

    			var combo = '<option value="">Sin Tipo</option>';

    			if(data.length >0){
    				for (var i = 0; i < data.length; i++) {
    					
    			
    					combo = '<option value="'+data[i].Id_DetSerTipo+'">'+data[i].No_SerTipo+'</option>';

    				}
    			}

    			$("#cb_tipo").html(combo);

    			$.uniform.update("#cb_tipo");

          if(id==6){
            $("#tx_cantidad").val('1');
          }else{
            $("#tx_cantidad").val('');
          }
    			
    		}
    	})

	})

	$("#btn_generar_ticket").click( function(){

		var data = $("#form_solicitud").serialize();
		
		$.ajax({
    		url: $("#base_url").val()+"ajax/GenerarTickets",
    		type: "POST",
    		data: data,
    		dataType: "json",
    		success: function(data){

    			var tabla = '<thead><tr><th width="10%">N° Ticket</th><th width="20%">Servicio</th><th width="15%">Tipo</th><th width="35%">Descripción</th><th width="20%">Estado</th></tr></thead><tbody>';

    			if(data.length >0){
    				for (var i = 0; i < data.length; i++) {
    					
    					/*var comentario = (data[i].Tx_EmpObs == null) ? 'Sin Observaciones' : data[i].Tx_EmpObs;
    					var codigo     = (data[i].No_EmpCodigo == null) ? '' : data[i].No_EmpCodigo;
    					var horario    = (data[i].No_EmpHorario == null) ? 'Sin Horario' : data[i].No_EmpHorario;*/

    					tabla += '<tr>';
    					tabla += '<td class="center">'+data[i].No_Ticket+'</td>';
    					tabla += '<td>'+data[i].No_Servicio+'</td>';
    					tabla += '<td>'+data[i].No_SerTipo+'</td>';
    					/*tabla += '<td>'+data[i].Nu_TicCant+'</td>';*/
    					tabla += '<td>'+data[i].Tx_TicDes+'</td>';
    					tabla += '<td>'+data[i].No_Tipo+'</td>';
    					tabla += '<tr>';

    				}
    			}

    			tabla += '</tbody>';

    			$(".titulo_listado_tickets").show();

    			$(".tabla_tickets_generados").html(tabla);
    			
    		}
    	})

	})

  $("#cb_asignar_ticket").change( function(){

    var url   = $('#base_url').val()+'ajax/formularioAsignarTicket';
    var datos = $('#form_tickets').serialize();

    if($(this).val() != ''){
      if($(".chk_datos").length > 0 && $(".chk_datos").is(":checked")==true){

        AbrirPoputAjax('poput_asignar_ticket','Asignar Ticket','','','415',url,datos+"&id_estado="+$(this).val());
      
      }else{

        _alert("<b>ERROR :</b> Porfavor seleccione un Ticket");
        $("#cb_asignar_ticket option:first").attr("selected","selected");
        $.uniform.update("#cb_asignar_ticket");
      }
    }

  })

  $("#tx_tecnico").autocomplete({
      minLength: 2,
    source: function(request, response) { 

      jQuery.ajax({
         url:    $("#base_url").val()+"ajax/AutocompleteTecnicos",
         type: "POST",
         data:  {
              valor : request.term
          },
          dataType: "json",
        success: function(data)   {
          response(data);
          } 

      })
     },
     select: function (e, ui) {

          $("#tx_percodigo").val(ui.item.codigo);
         
      },
    });


  $("#tx_marca").autocomplete({
    minLength: 2,
    source: function(request, response) { 

      jQuery.ajax({
         url:    $("#base_url").val()+"ajax/AutocompleteMarcas",
         type: "POST",
         data:  {
              valor : request.term
          },
          dataType: "json",
        success: function(data)   {
          response(data);
          } 

      })
     },
     select: function (e, ui) {

          $("#tx_marcodigo").val(ui.item.codigo);
         
      },
  });

  $("#tx_modelo").autocomplete({
    minLength: 2,
    source: function(request, response) { 

      jQuery.ajax({
         url:    $("#base_url").val()+"ajax/AutocompleteModelos",
         type: "POST",
         data:  {
              id_marca : $("#tx_marcodigo").val(),
              valor : request.term
          },
          dataType: "json",
        success: function(data)   {
          response(data);
          } 

      })
     },
     select: function (e, ui) {

          $("#tx_modcodigo").val(ui.item.codigo);
         
      },
  });

  $("#btn_cancelar_ticket").click( function(){

    var estado  = $(this).attr('rel');
    $("#estado_form").val(estado);

    $("#form_tickets").submit();

  })

  $("#btn_asignar_ticket").click( function(){

    var estado  = $(this).attr('rel');
    $("#estado_form").val(estado);

    $("#form_tickets").submit();

  })

  $("#btn_devolver_ticket").click( function(){

    var estado  = $(this).attr('rel');
    $("#estado_form").val(estado);

    $("#form_tickets").submit();

  })

  $("#btn_proceso_ticket").click( function(){

    var estado  = $(this).attr('rel');
    $("#estado_form").val(estado);

    $("#form_tickets").submit();

  })

  $("#btn_pendiente_ticket").click( function(){

    var estado  = $(this).attr('rel');
    $("#estado_form").val(estado);

    $("#form_tickets").submit();

  })

  $("#btn_solucionado_ticket").click( function(){

    var estado  = $(this).attr('rel');
    $("#estado_form").val(estado);

    $("#form_tickets").submit();

  })

  $("#btn_cerrar_ticket").click( function(){

    var estado  = $(this).attr('rel');
    $("#estado_form").val(estado);

    $("#form_tickets").submit();

  })

  $("#btn_guardar_log").click( function(){
    $("#tx_log").val('1');
    confirmar_registro("<b>Advertencia: </b>¿Desea guardar el comentario?", enviar_form_ticket);
  })


  $("#galeria_producto li a").live("click",function(){
    var a = $(this);
    $.post($("#base_url").val()+'panel/ajax/eliminar_galeria/home',{id:a.attr("rel"), csrf_token_infobox:$('input[name=csrf_token_infobox]').val()},function(data){
      if(data==0){
        a.parent().animate({opacity: 0}, 1000);
        a.parent().effect("transfer", { to: $('#upload_galeria') }, 1000, function(){ a.parent().remove(); });
      }else{
        alert('No se pudo eliminar la imagen del servidor, intentelo mas tarde');
      }
        
    })
  })


});


function AbrirPoputAjax(id,title,h,w,mh,url,param)
{
  
  var o = $('<div id="'+id+'" title="'+title+'"></div>').appendTo('body');
  var h = (h=='')? 'auto' : h;
  var w = (w=='')? 'auto' : w;
  var mh = (mh=='')? 'auto' : '415px';

  o.dialog({
      autoOpen: false,
      resizable: false,
      draggable: false,
      height: h,
      width: w,
      modal: true,
      close: function(e,ui){
        o.dialog("destroy").remove();
      }
    }).css( { 'max-height' : ''+mh+'' } );

    $.ajax({
      url : url,
      type: 'POST',
      data: param // { var1: value1, var2: value2 }
    }).done(function(data){

    o.html(data);

    o.dialog('open');

    }).fail(function(jqXHR, textStatus, errorThrown){

      _alert('Hubo un error al abrir el poput: <b>'+errorThrown+'</b>');

    });

    
}

function _alert(msg,fx)
{

  var o = $('<div id="mensaje_alerta" title="Sistema Administrativo"><span class="icono"><span class="body_mensaje">'+msg+'</span></span></div>').appendTo('body');
  o.dialog({
      autoOpen: true,
        resizable: false,
        draggable: false,
        height: 'auto',
        width: 'auto',
        modal: true,
        close: function(e,ui){
          o.dialog("destroy").remove();
          fx();
        },
        buttons: {
          ACEPTAR: function() {
            $(this).dialog("close");
            fx();
          }
        }
    });
}

function confirmar_registro(msg,fx)
{

  var o = $('<div id="mensaje_alerta" title="Sistema Administrativo"><span class="icono"><span class="body_mensaje">'+msg+'</span></span></div>').appendTo('body');
  o.dialog({
      autoOpen: true,
        resizable: false,
        draggable: false,
        height: 'auto',
      width: 'auto',
        modal: true,
        close: function(e,ui){
          o.dialog("destroy").remove();
        },
        buttons: {
          ACEPTAR: function() {
            $(this).dialog("close");
            fx();
          },
          CANCELAR: function() {
            $(this).dialog("close");
          }
        }
    });
}

function confirmar_eliminacion(ruta)
{

  var msg = '<b>ADVERTENCIA:</b> ¿Desea eliminar este registro?';

  var o = $('<div id="mensaje_alerta" title="Sistema Administrativo"><span class="icono"><span class="body_mensaje">'+msg+'</span></span></div>').appendTo('body');
  o.dialog({
    autoOpen: true,
      resizable: false,
      draggable: false,
      height: 'auto',
      width: 'auto',
      modal: true,
      close: function(e,ui){
        o.dialog("destroy").remove();
        return false;
      },
      buttons: {
        ACEPTAR: function() {
          $(this).dialog("close");
          location.href= ruta;
        },
        CANCELAR: function() {
          $(this).dialog("close");
          return false;
        }
      }
  });


}


function recargar_pagina()
{
  location.reload();
}


function LimpiarControles(form)
{
  
  $(':input', form).each(function(i) {
    
    var type = this.type;
    var tag  = this.tagName.toLowerCase();

    if (type == 'text' || type == 'password' || tag == 'textarea'){
      this.value = "";
    }else if (type == 'checkbox' || type == 'radio'){
      this.checked = false;
      $.uniform.update(this);
    }else if (tag == 'select'){
      this.selectedIndex = 0;
      $.uniform.update(this);
    }

  });

}

function ImprimirObjeto(o) {
  var salida = '';
  for (var p in o) {
    salida += p + ': ' + o[p] + '\n';
  }
  alert(salida);
}