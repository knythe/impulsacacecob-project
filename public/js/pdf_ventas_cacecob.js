document.getElementById('save-button').addEventListener('click', function(event) {
    event.preventDefault();
    const { jsPDF } = window.jspdf;
    const pdf = new jsPDF('landscape'); // Establecer orientación a horizontal
    const cardBody = document.getElementById('container-impulsa'); // Selector del card-body

    // Aplicar la clase para ocultar elementos no deseados y cambiar apariencia de inputs
    document.querySelectorAll('.hide-on-pdf').forEach(element => element.classList.add('hidden-during-pdf'));
    document.querySelectorAll('input, textarea').forEach(element => element.classList.add('pdf-friendly-input'));

    html2canvas(cardBody).then(canvas => {
        const imgData = canvas.toDataURL('image/png');
        const imgWidth = pdf.internal.pageSize.getWidth(); // Ancho de la página PDF
        const imgHeight = canvas.height * imgWidth / canvas.width;

        pdf.addImage(imgData, 'PNG', 0, 0, imgWidth, imgHeight); // Alinear la imagen en toda la hoja
        const logoImg = '';
        const logoWidth = 20; // Ancho del logo
        const logoHeight = 20; // Altura del logo
        pdf.addImage(logoImg, 'PNG', pdf.internal.pageSize.getWidth() - logoWidth - 10, 10, logoWidth, logoHeight);
    
        // Añadir fecha y hora en la parte inferior
        const date = new Date();
        const dateString = date.toLocaleString();
        pdf.setFontSize(10);
        pdf.text(dateString, 10, pdf.internal.pageSize.getHeight() - 10);
    
        // Añadir sección con texto y firma
        // Reemplaza con el DNI correcto
        const signatureImg = '';
        const signatureWidth = 50; // Ancho de la firma
        const signatureHeight = 30; // Altura de la firma

        // Posición de la firma y del texto
        const signatureX = pdf.internal.pageSize.getWidth() - 70; // Mueve la firma 10 unidades más a la derecha
        const signatureY = pdf.internal.pageSize.getHeight() - 40; // Ajusta según sea necesario
        const textX = pdf.internal.pageSize.getWidth() - 78; // Posición del texto permanece igual
        const textY = signatureY + signatureHeight + 0.001; // Coloca el texto justo debajo de la firma

        // Añadir firma
        pdf.addImage(signatureImg, 'PNG', signatureX, signatureY, signatureWidth, signatureHeight);

        // Ajustar tamaño de la fuente y añadir texto
        pdf.setFontSize(10); // Tamaño para el nombre
        pdf.text('DIRECTOR DE LA ACADEMIA IMPULSA', textX, textY);
        pdf.setFontSize(10); // Tamaño para el nombre
        pdf.text('Dr. Walter Enrique Moncada Alburqueque', textX, textY + 3);

        pdf.save('detalle_matricula.pdf');

        // Remover la clase después de generar el PDF
        document.querySelectorAll('.hide-on-pdf').forEach(element => element.classList.remove('hidden-during-pdf'));
        document.querySelectorAll('input, textarea').forEach(element => element.classList.remove('pdf-friendly-input'));
       
        const form = document.getElementById('create_ventacacecob');
        $.ajax({
            type: 'POST',
            url: form.action,
            data: $(form).serialize(),
            success: function(response) {
                // Redirigir a la página de los registros hechos
                window.location.href = "/cacecobeirl/registrar/clientes";
            },
            error: function(error) {
                console.error(error);
                Swal.fire({
                    icon: 'error',
                    title: 'Error',
                    text: 'ERROR: VENTA YA REGISTRADA',
                });
            }
        });

    });
});
