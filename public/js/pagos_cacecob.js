$(document).ready(function() {



    $('#create_comprobante_cacecob').on('submit', function(e) {
        e.preventDefault();
        $.ajax({
            type: 'POST',
            url: $(this).attr('action'),
            data: $(this).serialize(),
            success: function(response) {
               
                    // Redirigir a la página de los registros hechos
                    window.location.href = "/cacecobeirl/registrar/pago"; 
                
            },
            error: function(error) {
                console.error(error);
                Swal.fire({
                    icon: 'error',
                    title: 'Error',
                    text: 'ERROR COMPROBANTE YA REGISTRADO',
                });
            }
        });
    });

    $('#create_comprobante_cacecob_reinscripcion').on('submit', function(e) {
        e.preventDefault();
        $.ajax({
            type: 'POST',
            url: $(this).attr('action'),
            data: $(this).serialize(),
            success: function(response) {
               
                    // Redirigir a la página de los registros hechos
                    window.location.href = "/cacecobeirl/search/information/customers/nuevo/comprobante/detalle/pago"; 
                
            },
            error: function(error) {
                console.error(error);
                Swal.fire({
                    icon: 'error',
                    title: 'Error',
                    text: 'ERROR COMPROBANTE YA REGISTRADO',
                });
            }
        });
    });

    $('#create_nuevo_pago_reinscripcion').on('submit', function(e) {
        e.preventDefault();
        $.ajax({
            type: 'POST',
            url: $(this).attr('action'),
            data: $(this).serialize(),
            success: function(response) {
               
                    // Redirigir a la página de los registros hechos
                    window.location.href = "/cacecobeirl/search/information/customers/nueva/venta"; 
                
            },
            error: function(error) {
                console.error(error);
                Swal.fire({
                    icon: 'error',
                    title: 'Error',
                    text: 'ERROR',
                });
            }
        });
    });

    $('#create_pagocacecob').on('submit', function(e) {
        e.preventDefault();
        $.ajax({
            type: 'POST',
            url: $(this).attr('action'),
            data: $(this).serialize(),
            success: function(response) {
               
                    // Redirigir a la página de los registros hechos
                    window.location.href = "/cacecobeirl/registrar/ventas"; 
                
            },
            error: function(error) {
                console.error(error);
                Swal.fire({
                    icon: 'error',
                    title: 'Error',
                    text: 'ERROR',
                });
            }
        });
    });

    // Editar estudiante tipo class
    $('.edit_pago_cacecob').on('submit', function(e) {
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
                    timer: 500
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

   // Editar apoderado tipo class
    
});