$(function(){
    //Filtrado de tarjetas de Trabajo mediante JQuery
    $('.filter').click(function(){
        $(this).addClass('active').siblings().removeClass('active');
        let valor = $(this).attr('data-nombre');
        if(valor == 'todos'){
            $('.cont-work').show('1000');
        }else{
            $('.cont-work').not('.'+ valor).hide('1000');
            $('.cont-work').filter('.'+ valor).show('1000');
        }
    });

    //Declaración de variables usadas para los enlaces
    let campo = $('#campo').offset().top,
        servicio = $('#servicio').offset().top,
        trabajo = $('#trabajo').offset().top,
        contacto = $('#contacto').offset().top;    

    // Sustitución de valores almacenadas en las variables previamente declaradas
        window.addEventListener('resize', function(){
        let campo = $('#campo').offset().top,
        servicio = $('#servicio').offset().top,
        trabajo = $('#trabajo').offset().top,
        contacto = $('#contacto').offset().top;    
    });

    //Recorrido al Inicio de la página y desactivación del enlace
    $('#enlace-inicio').on('click', function(e){
        e.preventDefault();
        $('html, body').animate({
            scrollTop: 0
        }, 600);
    });
    //Recorrido a la apartado campo de trabajo y desactivación del enlace correspondiente
    $('#enlace-campo').on('click', function(e){
        e.preventDefault();
        $('html, body').animate({
            scrollTop: campo -100
        }, 600);
    });
    //Recorrido a la apartado Servicios y desactivación del enlace correspondiente
    $('#enlace-servicio').on('click', function(e){
        e.preventDefault();
        $('html, body').animate({
            scrollTop: servicio -100
        }, 600);
    });
    //Recorrido a la apartado Trabajo y desactivación del enlace correspondiente
    $('#enlace-trabajo').on('click', function(e){
        e.preventDefault();
        $('html, body').animate({
            scrollTop: trabajo -100
        }, 600);
    });
    //Recorrido a la apartado Contacto y desactivación del enlace correspondiente
    $('#enlace-contacto').on('click', function(e){
        e.preventDefault();
        $('html, body').animate({
            scrollTop: contacto -100
        }, 600);
    });
});