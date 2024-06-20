// public/js/roles.js
$(document).ready(function() {
    // Crear rol
    $('#createRoleForm').on('submit', function(e) {
        e.preventDefault();
        $.ajax({
            type: 'POST',
            url: $(this).attr('action'),
            data: $(this).serialize(),
            success: function(response) {
                Swal.fire({
                    icon: 'success',
                    title: 'Rol Registrado',
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
                    text: 'No se pudo crear el rol.',
                });
            }
        });
    });

    // Editar rol
    $('.editRoleForm').on('submit', function(e) {
        e.preventDefault();
        let form = $(this);
        $.ajax({
            type: 'PUT',
            url: form.attr('action'),
            data: form.serialize(),
            success: function(response) {
                Swal.fire({
                    icon: 'success',
                    title: 'Rol Editado',
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
                    text: 'No se pudo editar el rol.',
                });
            }
        });
    });

    // Eliminar rol
    $('.deleteRoleForm').on('submit', function(e) {
        e.preventDefault();
        let form = $(this);
        $.ajax({
            type: 'DELETE',
            url: form.attr('action'),
            data: form.serialize(),
            success: function(response) {
                Swal.fire({
                    icon: 'success',
                    title: 'Rol Eliminado',
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
                    text: 'No se pudo eliminar el rol.',
                });
            }
        });
    });

    $(document).ready(function() {
        $('#buscar').click(function() {
            var dni = $('#dni').val();
    
            $.ajax({
                url: '/buscar-por-dni',
                method: 'POST',
                data: {
                    _token: $('meta[name="csrf-token"]').attr('content'),
                    dni: dni
                },
                success: function(response) {
                    console.log(response); // Para depuración
                    if (response.success) {
                        $('#datos_estudiante').val(response.data.datos_estudiante.nombres + ' ' + response.data.datos_estudiante.apellidos);
                        $('#datos_apoderado').val(response.data.datos_apoderado.nombres + ' ' + response.data.datos_apoderado.apellidos);
                        $('#contacto_apoderado').val(response.data.contacto_apoderado);
                        $('#ciclo_contratado').val(response.data.ciclo_contratado);
                    } else {
                        alert(response.message);
                    }
                },
                error: function(xhr, status, error) {
                    console.error(xhr.responseText);
                }
            });
        });
    });
    
    
});
