// Declaración de Variables
let nav = document.getElementById('nav');
let menu = document.getElementById('enlaces');
let abrir = document.getElementById('open');
let Nombre = document.getElementById('nombre');
let botones = document.getElementsByClassName('btn-header');
let cerrado = true;

let cerrarModal1 = document.querySelectorAll(".close1")[0];
let cerrarModal2 = document.querySelectorAll(".close2")[0];
let cerrarModal3 = document.querySelectorAll(".close3")[0];
let cerrarModal4 = document.querySelectorAll(".close4")[0];
let abrirModal1 = document.querySelectorAll(".cc1")[0];
let abrirModal2 = document.querySelectorAll(".cc2")[0];
let abrirModal3 = document.querySelectorAll(".cc3")[0];
let abrirModal4 = document.querySelectorAll(".cc4")[0];
let modal1 = document.querySelectorAll(".modal1")[0];
let modal2 = document.querySelectorAll(".modal2")[0];
let modal3 = document.querySelectorAll(".modal3")[0];
let modal4 = document.querySelectorAll(".modal4")[0];
let modalC1 = document.querySelectorAll(".modal-container1")[0];
let modalC2 = document.querySelectorAll(".modal-container2")[0];
let modalC3 = document.querySelectorAll(".modal-container3")[0];
let modalC4 = document.querySelectorAll(".modal-container4")[0];

// Función de uso  barra de navegación transparente o degradada dependiendo de la posición de desplazamiento de la página
function menus(){
    let Desplazamiento_Actual = window.pageYOffset;

    if(Desplazamiento_Actual <= 300){
        nav.classList.remove('nav2');
        nav.className = ('nav1');    
        nav.style.transition = '1s';
        menu.style.top = '80px';
        abrir.style.color = "#fff"
        Nombre.style.color = "#fff"
    }else{
        nav.classList.remove('nav1');
        nav.className = ('nav2');
        nav.style.transition = '1s';
        menu.style.top = '100px';        
    }
}

// Captura de evento Scroll para ejecución de función de carga de barra de navegación
window.addEventListener('scroll', function(){
    menus();
});

// Captura de evento de carga inicial o refresh de la página para ejecución de función de barra de navegación
window.addEventListener('load', function(){
    $('#onload').fadeOut();
    $('body').removeClass('hidden');
    menus();
});

// Captura de evento de cambio de tamaño de ventana para cambio de tipo de barra de navegación
window.addEventListener('resize', function(){
    if(screen.width>=700){
        cerrado = true;
        menu.style.removeProperty('overflow');
        menu.style.removeProperty('width');
    }
});

// Función de apertura y cierre de menú desplegable
function apertura(){
    if(cerrado){
        menu.style.width = '70vw';
        cerrado = false;
    }else{
        menu.style.width = '0%';
        menu.style.overflow = 'hidden';
        cerrado = true;
    }
}

// Captura de evento de click en ícono de menú para ejecución de función apertura de menú desplegable
abrir.addEventListener('click', function(){
    apertura();
});

// Captura de evento de click en ciertas secciones de la página para ejecución de función cierre de menú desplegable
window.addEventListener('click', function(e){
    if(cerrado == false){
        let span = document.querySelector('span');
        if(e.target !== span && e.target !== abrir){
            menu.style.width = '0%';
            menu.style.overflow = 'hidden';
            cerrado = true;
        }
    }
});

// Ventana Emergente 1//
abrirModal1.addEventListener("click", function(e){
    e.preventDefault();
    modalC1.style.opacity = "1";
    modalC1.style.visibility = "visible";
    modal1.classList.toggle("modal-close1");
});
cerrarModal1.addEventListener("click", function(e){
    modal1.classList.toggle("modal-close1");    
    setTimeout(function(){
        modalC1.style.opacity = "0";
        modalC1.style.visibility = "hidden";
    },850)
});
window.addEventListener("click", function(e){
    if(e.target == modalC1){
        modal1.classList.toggle("modal-close1");    
        setTimeout(function(){
            modalC1.style.opacity = "0";
            modalC1.style.visibility = "hidden";
    },850)
    }    
});

// Ventana Emergente 2//
abrirModal2.addEventListener("click", function(e){
    e.preventDefault();
    modalC2.style.opacity = "1";
    modalC2.style.visibility = "visible";
    modal2.classList.toggle("modal-close2");
});
cerrarModal2.addEventListener("click", function(e){
    modal2.classList.toggle("modal-close2");    
    setTimeout(function(){
        modalC2.style.opacity = "0";
        modalC2.style.visibility = "hidden";
    },850)
});
window.addEventListener("click", function(e){
    if(e.target == modalC2){
        modal2.classList.toggle("modal-close2");    
        setTimeout(function(){
            modalC2.style.opacity = "0";
            modalC2.style.visibility = "hidden";
    },850)
    }    
});

// Ventana Emergente 3//
abrirModal3.addEventListener("click", function(e){
    e.preventDefault();
    modalC3.style.opacity = "1";
    modalC3.style.visibility = "visible";
    modal3.classList.toggle("modal-close3");
});
cerrarModal3.addEventListener("click", function(e){
    modal3.classList.toggle("modal-close3");
    setTimeout(function(){
        modalC3.style.opacity = "0";
        modalC3.style.visibility = "hidden";
    },850)
});
window.addEventListener("click", function(e){
    if(e.target == modalC3){
        modal3.classList.toggle("modal-close3");    
        setTimeout(function(){
            modalC3.style.opacity = "0";
            modalC3.style.visibility = "hidden";
    },850)
    }    
});

// Ventana Emergente 4//
abrirModal4.addEventListener("click", function(e){
    e.preventDefault();
    modalC4.style.opacity = "1";
    modalC4.style.visibility = "visible";
    modal4.classList.toggle("modal-close4");
});
cerrarModal4.addEventListener("click", function(e){
    modal4.classList.toggle("modal-close4");
    setTimeout(function(){
        modalC4.style.opacity = "0";
        modalC4.style.visibility = "hidden";
    },850)
});
window.addEventListener("click", function(e){
    if(e.target == modalC4){
        modal4.classList.toggle("modal-close4");    
        setTimeout(function(){
            modalC4.style.opacity = "0";
            modalC4.style.visibility = "hidden";
    },850)
    }    
});
