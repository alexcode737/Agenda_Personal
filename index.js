$("#login").on("submit", function(event) {
    event.preventDefault();
    const username = document.getElementById("username").value;
    const password = document.getElementById("password").value;

    $.ajax({
        url: "./login.php",
        method: "POST",
        data: {
            username: username,
            password: password
        },
        dataType: "json"
    }).done(function(response) {
        if(response.success == false){
            Swal.fire({
                icon: 'error',
                title: 'Error',
                text: response.message,
            }); 
        } else if(response.success == true){
            $.ajax({
                url: "./session_usuario.php",
                method: "POST",
                dataType: "json",
                data: {
                  username: username,
                }
            }).done(function(res){
                if(res.mensaje == true){
                    window.location.href = './main.php';
                }
            });
        }
    });
});