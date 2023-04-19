
$("#registrarse").on("submit", function(event) {
    event.preventDefault();
    const username = document.getElementById("username").value;
    const names = document.getElementById("name").value;
    const password = document.getElementById("password").value;
    console.log(`${username} ${names} ${password}`)

    if(username.length < 5 || names.length < 5 || password.length < 5){
        Swal.fire({
            icon: 'error',
            title: 'Error',
            text: 'Todos los campos deben ser rellenados',
        }); 
    } else {
        $.ajax({
            url: "../login-registro/registrarse.php",
            method: "POST",
            dataType: "json",
            data: {
                username: username,
                name: names,
                password: password
            }         
        }).done(function(response){
            Swal.fire({
                icon: response.type,
                title: response.title,
                text: response.message,
            });
        });
    }
});
  