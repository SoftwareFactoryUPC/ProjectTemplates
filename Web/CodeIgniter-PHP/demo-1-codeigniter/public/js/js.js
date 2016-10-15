$(document).ready(function () {

    $(window).scroll(function() {

      if($(this).scrollTop() >= 50) {
        
        $("nav").css("height","70px");
        $(".logo img").animate({width:'200px'},  {
          queue: false,
          duration: 400
        });

      }else {
      
        $("nav").css("height","70px");
        $(".logo img").animate({width:'200px'},  {
          queue: false,
          duration: 400
        });

      }

    })

    $('.menu').click(function(){
      var link   = $(this);
      var anchor = link.attr('href');
      var top = (anchor=='#content-slider') ? 150 : 108 ;

      if(anchor=='#content-slider'){
        //animacion_home(6,true);
      }else{
        //$(".rotado").stop();
      }

      $('.menu').removeClass('active');
      $(this).addClass('active');

      $('html, body').stop().animate({
        scrollTop: ($(anchor).offset().top)-top
      }, 1800);
      return false;
    });

    $('.menu_movil').click(function(){
      var link   = $(this);
      var anchor = link.attr('href');
      var top = (anchor=='#content-slider') ? 150 : 90 ;

      if(anchor=='#content-slider'){
        //animacion_home(6,true);
      }else{
        //$(".rotado").stop();
      }

      contador = 1;
      $('#menu_movil').animate({
        left: '-100%'
      }, function(){

        $('.menu_movil').removeClass('active');
        $(this).addClass('active');

        $('html, body').stop().animate({
          scrollTop: ($(anchor).offset().top)-top
        }, 1800);

      });

      
      return false;
    });

    var contador = 1;

    $('.menu_bar').click(function(){
      // $('nav').toggle(); 
   
      if(contador == 1){
        $('#menu_movil').animate({
          left: '0'
        });
        contador = 0;
      } else {
        contador = 1;
        $('#menu_movil').animate({
          left: '-100%'
        });
      }
   
    });

    ///setTimeout(function(){animacion_home(6,true)},700);

    $(".rec_6").click(function() {
      //$(this).removeClass("rotado_ant_6");
      //animacion_click($(this),"250px","23.4%","42%");
    });

    $(".rec_5").click(function() {
      //$(this).removeClass("rotado_ant_5");
      //animacion_click($(this),"250px","35.4%","37%");
    });

    $(".rec_4").click(function() {
      //$(this).removeClass("rotado_ant_4");
      //animacion_click($(this),"250px","47.4%","32%");
    });

    $(".rec_3").click(function() {
      //$(this).removeClass("rotado_ant_3");
      //animacion_click($(this),"250px","59.4%","27%");
    });

    $(".rec_2").click(function() {
      //$(this).removeClass("rotado_ant_2");
      //animacion_click($(this),"250px","70.9%","22.2%");
    });

    $(".rec_1").click(function() {
      //$(this).removeClass("rotado_ant_1");
      //animacion_click($(this),"250px","82.9%","17%");
    });

    $('#ca-container').contentcarousel();
    $('#ca-container_2').contentcarousel();
    $('#ca-container_3').contentcarousel();

    $(".ver_productos").click( function(){
      var ruta = $(this).attr("href");
      location.href = ruta;
    })


    $(".a_soluciones").click( function(){

      var obj = $(this);
      
      $(".detalle_soluciones").css("display","inline-block");

      $(".detalle_soluciones").find('img').eq(0).attr("src",'');
      $(".detalle_soluciones").find('h3').eq(0).text('');
      $(".detalle_soluciones").find('p').eq(0).html('');
      $(".a_regresar_soluciones").css("opacity",0);


      $(".detalle_soluciones").animate({
        left: parseInt($(".detalle_soluciones").css("left"))-parseInt($(".detalle_soluciones").outerWidth()),
        opacity:  1
      },
      {
        complete: function(){
            $.ajax({
              url: $("#base_url").val()+"ajax/get_detalle",
              type: "POST",
              data: "csrf_token_softwarefactory="+$('input[name=csrf_token_softwarefactory]').val()+"&id="+obj.attr("rel")+"&tabla=solucion",
              dataType: "json"
            }).done( function(res){

                $(".detalle_soluciones").find('img').eq(0).attr("src",$("#base_url").val()+"public/images/"+res.im_solucion);
                $(".detalle_soluciones").find('h3').eq(0).text(res.no_solucion);
                $(".detalle_soluciones").find('p').eq(0).html(removeHTML(res.tx_solucion));
                $(".a_regresar_soluciones").css("opacity",1);

            }).fail(function(jqXHR, textStatus, errorThrown){

              alert('Hubo un error al listar los datos: '+errorThrown);

            });
        }
      });


      $(".slide_soluciones").animate(
        {
          left: parseInt($(".slide_soluciones").css("left"))-parseInt($(".slide_soluciones").outerWidth()),
          opacity:  1
        },
        {
          complete: function() {
            $(this).css("display","none");
          }
        }
      );
    })


    $(".a_regresar_soluciones").click( function(){

      $(".slide_soluciones").css("display","inline-block");
      
      $(".slide_soluciones").animate({
        left: parseInt($(".slide_soluciones").css("left"))+parseInt($(".slide_soluciones").outerWidth()),
        opacity:  1
      });

      $(".detalle_soluciones").animate(
        {
          left: parseInt($(".detalle_soluciones").css("left"))+parseInt($(".detalle_soluciones").outerWidth()),
          opacity:  0
        },
        {
          complete: function() {
            $(this).css("display","none");
          }
        }
      );

    })


   


    $(".a_regresar_productos").click( function(){

      $(".slide_productos").css("display","inline-block");
      
      $(".slide_productos").animate({
        left: parseInt($(".slide_productos").css("left"))+parseInt($(".slide_productos").outerWidth()),
        opacity:  1
      });

      $(".detalle_productos").animate(
        {
          left: parseInt($(".detalle_productos").css("left"))+parseInt($(".detalle_productos").outerWidth()),
          opacity:  0
        },
        {
          complete: function() {
            $(this).css("display","none");
          }
        }
      );

    })


    $(".a_servicios").click( function(){

      var obj = $(this);
      
      $(".detalle_servicios").css("display","inline-block");

      $(".detalle_servicios").find('img').eq(0).attr("src",'');
      $(".detalle_servicios").find('h3').eq(0).text('');
      $(".detalle_servicios").find('p').eq(0).html('');
      $(".a_regresar_servicios").css("opacity",0);

      $(".detalle_servicios").animate({
        left: parseInt($(".detalle_servicios").css("left"))-parseInt($(".detalle_servicios").outerWidth()),
        opacity:  1
      },{
        complete: function(){
            $.ajax({
              url: $("#base_url").val()+"ajax/get_detalle",
              type: "POST",
              data: "csrf_token_softwarefactory="+$('input[name=csrf_token_softwarefactory]').val()+"&id="+obj.attr("rel")+"&tabla=servicio",
              dataType: "json"
            }).done( function(res){

                $(".detalle_servicios").find('img').eq(0).attr("src",$("#base_url").val()+"public/images/"+res.im_servicio);
                $(".detalle_servicios").find('h3').eq(0).text(res.no_servicio);
                $(".detalle_servicios").find('p').eq(0).html(removeHTML(res.tx_servicio));
                $(".a_regresar_servicios").css("opacity",1);

            }).fail(function(jqXHR, textStatus, errorThrown){

              alert('Hubo un error al listar los datos: '+errorThrown);

            });
        }
      });

      $(".slide_servicios").animate(
        {
          left: parseInt($(".slide_servicios").css("left"))-parseInt($(".slide_servicios").outerWidth()),
          opacity:  1
        },
        {
          complete: function() {
            $(this).css("display","none");
          }
        }
      );
    })


    $(".a_regresar_servicios").click( function(){

      $(".slide_servicios").css("display","inline-block");
      
      $(".slide_servicios").animate({
        left: parseInt($(".slide_servicios").css("left"))+parseInt($(".slide_servicios").outerWidth()),
        opacity:  1
      });

      $(".detalle_servicios").animate(
        {
          left: parseInt($(".detalle_servicios").css("left"))+parseInt($(".detalle_servicios").outerWidth()),
          opacity:  0
        },
        {
          complete: function() {
            $(this).css("display","none");
          }
        }
      );

    })


    $('[data-popup-target]').click(function () {
        $('html').addClass('overlay');
        var activePopup = $(this).attr('data-popup-target');
        $(activePopup).addClass('visible');
 
    });
 
    $(document).keyup(function (e) {
        if (e.keyCode == 27 && $('html').hasClass('overlay')) {
            clearPopup();
        }
    });
 
    $('.popup-exit').click(function () {
        clearPopup();
 
    });
 
    $('.popup-overlay').click(function () {
        clearPopup();
    });

    $('#new_captcha').click(function(event){
        event.preventDefault();
        $(".div_capcha").find("img").attr('src', $("#base_url").val()+'home/captcha_ajax');
    });


});


function clearPopup() {
    $('.popup.visible').addClass('transitioning').removeClass('visible');
    $('html').removeClass('overlay');

    setTimeout(function () {
        $('.popup').removeClass('transitioning');
    }, 200);
}

function animacion_home(rel,estado) {

  if(estado){

    var top = '';
    var lef = '';

    switch(rel){
      case 6 :
        top = '23.4%';
        lef = '42%';
        break;
      case 5 :
        top = '35.4%';
        lef = '37%';
        break;
      case 4 :
        top = '47.4%';
        lef = '32%';
        break;
      case 3 :
        top = '59.4%';
        lef = '27%';
        break;
      case 2 :
        top = '70.9%';
        lef = '22.2%';
        break;
      case 1 :
        top = '82.9%';
        lef = '17%';
        break;
    }

    $(".rec_"+rel).stop().animate({
      width: "250px",
      top  : top,
      left : lef
    }, 700, function(){
      var rel_2 = rel;

      switch(rel_2){
        case 6 :
          t = '19%';
          l = '42.7%';
          break;
        case 5 :
          t = '31%';
          l = '37.7%';
          break;
        case 4 :
          t = '43%';
          l = '32.8%';
          break;
        case 3 :
          t = '55%';
          l = '27.8%';
          break;
        case 2 :
          t = '66.5%';
          l = '23%';
          break;
        case 1 :
          t = '78.5%';
          l = '17.8%';
          break;
      }

      $(".rec_"+rel).stop().animate({
          width: "170px",
          top  : t,
          left : l
      }, 600);

      var param = ((rel-1)==0) ? 6 : (rel-1);

      animacion_home(param,true);

    });

  }else{
    return false;
  }

    
}

function animacion_click(obj,w,t,l)
{

  $(".rotado").stop();

  $(".bubble").stop().animate({opacity : "0"},500);

  //$('.bubble').css("opacity","0");
  
  if($(".rotado").hasClass("active_home")){

    var rel = $(".active_home").attr("rel");
    var top = '';
    var lef = '';
    $(".bubble").find('h3').eq(0).text('');
    $(".bubble").find('span').eq(0).text('');
    $(".bubble").find('p').eq(0).html(removeHTML(''));

    switch(rel){
      case '6' :
        top = '19%';
        lef = '42.7%';
        bor = '';
        break;
      case '5' :
        top = '31%';
        lef = '37.7%';
        break;
      case '4' :
        top = '43%';
        lef = '32.8%';
        break;
      case '3' :
        top = '55%';
        lef = '27.8%';
        break;
      case '2' :
        top = '66.5%';
        lef = '23%';
        break;
      case '1' :
        top = '78.5%';
        lef = '17.8%';
        break;
    }


    $(".active_home").stop().animate({
      width: "170px",
      top  : top,
      left : lef
    }, 700);

    $(".rotado").removeClass("active_home");
    $(".bubble").removeClass("bubble_"+rel);
  }

   

  obj.addClass("active_home");

  obj.stop().animate({
    width: w,
    top  : t,
    left : l
  }, 700, function(){

    $(".bubble").addClass("bubble_"+obj.attr('rel'));

    var options = { to: ".bubble", className: "ui-effects-transfer_"+obj.attr('rel') };

    $(".bubble").css({

    })

    obj.stop().effect("transfer", options, 800, function(){
      $(".bubble").css("opacity","0.1");
      $(".bubble").stop().animate({
        opacity : "0.9"
      },800, function(){

        $.ajax({
            url: $("#base_url").val()+"ajax/get_detalle",
            type: "POST",
            data: "csrf_token_softwarefactory="+$('input[name=csrf_token_softwarefactory]').val()+"&id="+obj.attr("rel")+"&tabla=home",
            dataType: "json"
          }).done( function(res){

              $(".bubble").find('h3').eq(0).text(res.no_home);
              $(".bubble").find('span').eq(0).text(res.no_home2);
              $(".bubble").find('p').eq(0).html(removeHTML(res.tx_home));

          }).fail(function(jqXHR, textStatus, errorThrown){

            alert('Hubo un error al listar los datos: '+errorThrown);

          });
        animacion()

      })
    });

    
   
  });

}

function animacion() {
    $('.bubble').stop().animate({
      marginTop: '+=30',
    }, 500, function() {
        $('.bubble').stop().animate({
          marginTop: '-=30',
        }, 500, function() {
          $('.bubble').stop().animate({
              marginTop: '+=30',
            }, 500, function() {
                $('.bubble').stop().animate({
                  marginTop: '-=30',
                }, 500)
            })
        });
    });
}


function animacion_close(obj,w,t,l)
{

  obj.animate({
    width: w,
    top  : t,
    left : l,
    opacity: 1,
  }, 500, function(){

      $(".bubble").animate({
        opacity : "0"
      },1000)

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

function removeHTML(palabra) {
    var strHtmlCode = palabra;

    /* It replaces escaped brackets with real ones,
     i.e. < is replaced with < and > is replaced with > */

    strHtmlCode = strHtmlCode.replace(/&(lt|gt);/g,
    function (strMatch, p1) {
        return (p1 == "lt") ? "<" : ">";
    });
    var strTagStrippedText = strHtmlCode.replace(/<\/?[^>]+(>|$)/g, "");
   return strTagStrippedText;
    //alert("Output text:\n" + strTagStrippedText);
    
}
function ImprimirObjeto(o) {
  var salida = '';
  for (var p in o) {
    salida += p + ': ' + o[p] + '\n';
  }
  alert(salida);
}