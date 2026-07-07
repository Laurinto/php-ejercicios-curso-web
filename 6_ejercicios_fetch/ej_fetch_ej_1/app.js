// esperar a que el DOM esté listo
document.addEventListener('DOMContentLoaded',()=>{
    const formulario = document.getElementById('form-contacto');
});

// interceptar el envío del formulario
formulario.addEventListener('submit', async(e)=>{
    // evita la recarga
    e.preventDefault();

    const datos = new FormData(formulario);
    try {
        const resp = await fetch('guardar.php', {
            method: 'POST',
            body:datos
        });
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
cargarContactos();

async function cargarContactos() {
    try {
        const resp = await fetch('listar.php');
        const contactos = await resp.json();
        const lista = document.getElementById('lista');
    }
    catch (error){
        console.error('Error cargando contactos:', error);
    }
};