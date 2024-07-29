t1.addEventListener("click", function () {
    mostrarDificultad('acentuacion');
});

t2.addEventListener("click", function () {
    mostrarDificultad('letras');
});

t3.addEventListener("click", function () {
    mostrarDificultad('concordancia');
});

t4.addEventListener("click", function () {
    mostrarDificultad('gramaticaGeneral');
});

function mostrarDificultad(tema) {
    Swal.fire({
        title: 'Selecciona la dificultad',
        input: 'select',
        inputOptions: {
            'facil': 'Fácil',
            'medio': 'Medio',
            'dificil': 'Difícil'
        },
        inputPlaceholder: 'Selecciona una opción',
        showCancelButton: true,
        cancelButtonText: 'Cancelar',
        confirmButtonText: 'Aceptar',
        inputValidator: (value) => {
            return new Promise((resolve) => {
                if (value !== '') {
                    resolve()
                } else {
                    resolve('Debes seleccionar una opción')
                }
            })
        }
    }).then((result) => {
        if (result.isConfirmed) {
            localStorage.setItem('tema', tema);
            localStorage.setItem('dificltad', result
                .value); // Guardar la dificultad seleccionada en localStorage
            const url = `/sala/global/juego/sala-global?tema=${tema}&dificultad=${result.value}`;
            window.location.href = url;
        }
    })
}