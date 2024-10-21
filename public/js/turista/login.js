document.querySelector('form').addEventListener('submit', function (e) {
    e.preventDefault();

    Swal.fire({
        title: 'Enviando...',
        text: 'Por favor, aguarde enquanto processamos sua solicitação.',
        allowOutsideClick: false,
        didOpen: () => {
            Swal.showLoading();
        }
    });

    const formData = new FormData(this);

    fetch(this.action, {
        method: 'POST',
        headers: {
            'X-CSRF-TOKEN': '{{ csrf_token() }}',
        },
        body: formData
    })
        .then(response => response.json())
        .then(data => {
            Swal.close();

            if (data.success) {
                Swal.fire({
                    icon: 'success',
                    title: 'E-mail enviado!',
                    text: data.message,
                    confirmButtonText: 'Ok',
                    customClass: {
                        confirmButton: 'btn-custom-confirm'
                    }
                });
            } else {
                Swal.fire({
                    icon: 'error',
                    title: 'Erro!',
                    text: data.message || 'Ocorreu um erro ao enviar o e-mail.',
                    confirmButtonText: 'Ok'
                });
            }
        })
        .catch(error => {
            Swal.close();
            Swal.fire({
                icon: 'error',
                title: 'Erro!',
                text: 'Ocorreu um erro ao enviar o e-mail.',
                confirmButtonText: 'Ok'
            });
        });
});
