const botonCerrarSesion = document.getElementById('btnCS');

botonCerrarSesion.addEventListener('click', function() {
    Swal.fire({
        title: 'Seguro que quieres cerrar sesión?',
        showCancelButton: true,
        confirmButtonText: 'Si',
    }).then((result) => {
        if (result.isConfirmed) {
            $.ajax({
                url: "./session_usuario.php",
                method: "POST",
                data: {
                    sesion: false
                },
                dataType: "json"
            }).done(function(response) {
                 if(response.mensaje == true){
                   
                    window.location.href = './index.html';
                 }
            })
        }
    })
})