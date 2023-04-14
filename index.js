$("#login").on("submit", function(event) {
    event.preventDefault();
    const username = document.getElementById("username").value;
    const password = document.getElementById("password").value;
    console.log(`${username} ${password}`)

    $.ajax({
        url: "./index.php",
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
            Swal.fire({
                title: 'Exito',
                showDenyButton: true,
                confirmButtonText: 'Ok',
            }).then((result) => {
                if (result.isConfirmed) {
                  $.ajax({
                    url: "./main.php",
                    method: "POST",
                    dataType: "json",
                    data: {
                        username: username,
                    }
                  })
                }
            })
        }
    });
});