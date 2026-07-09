// esperar a que el DOM esté listo
document.addEventListener('DOMContentLoaded',()=>{
    const formulario = document.getElementById('form-contacto');
});

// interceptar el envío del formulario
formulario.addEventListener('submit', async(e)=>{
    // evita la recarga
    e.preventDefault();
    
    // crea de cero un FormData
    const datos = new FormData(formulario);
    // pedir datos al servidor
    try {
        // recoge todos los datos del FormData
        const resp = await fetch('guardar.php', {
            method: 'POST',
            body:datos // FormData que se encarga del formato
        });
        // extraer respuesta (objeto Response) como Objeto JS
        const json = await resp.json();

        const msg = document.getElementById('mensaje');
        if (json.ok){
            msg.innerHTML = '<div>'+json.mensaje+'</div>';
            formulario.reset();
            cargarContactos(); // refrescar la lista
        }
        else {
            msg.innerHTML = '<div>'+json.error+'</div>';
        }
    }
    catch (error){
        console.log('Error:', error);
    }
});

// cargar contactos al iniciar la página
// llamar a la función asíncrona
cargarContactos();

// declarar la función como async
async function cargarContactos() {
    try {
        // usar await para esperar la respuesta
        const resp = await fetch('listar.php');
        // usar await para extraer el JSON
        const contactos = await resp.json();
        // usar los datos
        const lista = document.getElementById('lista');
    }
    catch (error){
        console.error('Error cargando contactos:', error);
    }
};

// siempre usar try/catch para manejar los errores