function soloLetras(input) {
    // Permitir solo letras y espacios
    input.value = input.value.replace(/[^a-zA-Z0-9\sÑñ-]/g, '');
}

function soloLetrasNumeros(input) {
    // Permitir solo letras, números y espacios, excluyendo caracteres especiales
    input.value = input.value.replace(/[^a-zA-Z0-9\s.-]/g, '');
}


$(document).ready(function() {

    // Crear ciclo, aplicando ajax aqui va en el formulario, es tipo id
    $('#create_ciclo').on('submit', function(e) {
        e.preventDefault();
        $.ajax({
            type: 'POST',
            url: $(this).attr('action'),
            data: $(this).serialize(),
            success: function(response) {
                Swal.fire({
                    icon: 'success',
                    title: 'Ciclo registrado exitosamente',
                    showConfirmButton: false,
                    timer: 1000
                }).then((result) => {
                    // Redirigir a la página de los registros hechos
                    window.location.href = "/ciclos";
                    
                });
            },
            error: function(error) {
                console.error(error);
                Swal.fire({
                    icon: 'error',
                    title: 'Error',
                    text: 'ERROR - CICLO EXISTENTE.',
                });
            }
        });
    });

    // Editar ciclo tipo class
    $('.edit_ciclo').on('submit', function(e) {
        e.preventDefault();
        let form = $(this);
        $.ajax({
            type: 'PUT',
            url: form.attr('action'),
            data: form.serialize(),
            success: function(response) {
                Swal.fire({
                    icon: 'success',
                    title: 'Ciclo editado exitosamente',
                    showConfirmButton: false,
                    timer: 1000
                }).then((result) => {
                    // Redirigir a la página de los registros hechos
                    window.location.href = "/ciclos";
                    
                });
            },
            error: function(error) {
                console.error(error);
                Swal.fire({
                    icon: 'error',
                    title: 'Error',
                    text: 'No se pudo editar el ciclo.',
                });
            }
        });
    });

    // Eliminar rol
    /* la siguiente script va directamente ubicada en el button (submit), es de tipo class

    */

    $('.delete_ciclo').on('submit', function(e) {
        e.preventDefault();
        let form = $(this);
        $.ajax({
            type: 'DELETE',
            url: form.attr('action'),
            data: form.serialize(),
            success: function(response) {
                Swal.fire({
                    icon: 'success',
                    title: 'Ciclo eliminado exitosamente',
                    showConfirmButton: false,
                    timer: 1000
                });
                setTimeout(() => {
                    location.reload();
                }, 1000);
            },
            error: function(error) {
                console.error(error);
                Swal.fire({
                    icon: 'error',
                    title: 'Error',
                    text: 'No se pudo eliminar el ciclo.',
                });
            }
        });
    });

 
});