function dataReadyCallback(data) {
    // Ahora puedes acceder a 'data' después de que se haya cargado
    console.log(data);

    // También puedes utilizar 'data' en otras funciones o manipularlo según sea necesario
}

document.addEventListener("DOMContentLoaded", function () {
    const d = document;
    const cartas = d.querySelectorAll(".card");
    const cartasvg = d.querySelectorAll(".svg-color");
    
    dataReadyCallback(data);

    let modoOscuro = localStorage.getItem("modoOscuro") === "true"; // Inicialmente, obtenemos el valor almacenado en localStorage
    actualizarModo();

    d.addEventListener("click", e => {
        if (e.target.matches(".dark-mode") || e.target.matches(".dark-mode input")) {
            modoOscuro = !modoOscuro; // Invertimos el modo al hacer clic
            actualizarModo();
            localStorage.setItem("modoOscuro", modoOscuro); // Guardamos el estado en localStorage
        }
    });

    function actualizarModo() {
        const body = d.querySelector("body");

        if (modoOscuro) {
            body.style.backgroundColor = "#222";
            cartas.forEach(carta => {
                // carta.style.backgroundColor = "rgb(203, 201, 201)";
                // cartasvg.style.fill = "white";
                carta.style.backgroundColor = "rgb(57, 57, 57)";
                carta.style.color = "white";
            });
            cartasvg.forEach(svg =>{
                svg.style.fill ="white"
            })
        } else {
            body.style.backgroundColor = "white";
            cartas.forEach(carta => {
                carta.style.backgroundColor = "white";
                carta.style.color = "black";
            });
            cartasvg.forEach(svg =>{
                svg.style.fill ="black"
            })
        }
    }
    
});

