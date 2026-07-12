const form = document.getElementById("create_user");
const btn = document.getElementById("submit");

btn.addEventListener("click", async (evento) =>{
    evento.preventDefault();
    const datos = new FormData(form);
    const respuesta = await fetch("/guardar", {
        method: "POST",
        body: datos
    });
    const texto = await respuesta.text();
    console.log(texto);
});