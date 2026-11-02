// Funciones de los formularios de ARCADIA
document.addEventListener("DOMContentLoaded", () => {
    const formularioSugerencias = document.querySelector("#formulario-sugerencias");

    if (formularioSugerencias) {
        formularioSugerencias.addEventListener("submit", (event) => {
            event.preventDefault();

            const nombre = document.querySelector("#nombre").value.trim();
            const sugerencia = document.querySelector("#sugerencia").value.trim();

            if (!nombre || !sugerencia) {
                alert("Completá todos los campos antes de enviar la sugerencia.");
                return;
            }

            alert(`Gracias, ${nombre}. Tu sugerencia fue enviada correctamente.`);
            formularioSugerencias.reset();
        });
    }

    const botonComunidad = document.querySelector("#boton-comunidad");

    if (botonComunidad) {
        botonComunidad.addEventListener("click", () => {
            const opcionSeleccionada = document.querySelector('input[name="contenido"]:checked');
            const motivo = document.querySelector("#motivo-comunidad").value.trim();

            if (!opcionSeleccionada) {
                alert("Seleccioná una opción de contenido.");
                return;
            }

            if (!motivo) {
                alert("Escribí el motivo de tu elección.");
                return;
            }

            alert(`Gracias por participar. Elegiste: ${opcionSeleccionada.value}`);

            document.querySelectorAll('input[name="contenido"]').forEach((radio) => {
                radio.checked = false;
            });

            document.querySelector("#motivo-comunidad").value = "";
        });
    }
});
