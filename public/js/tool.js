const btnActive = document.getElementById("active")

btnActive.addEventListener("click", actualizar);

async function actualizar(){
    const respuesta = await fetch("/active", { method: "POST"});
    const text = await respuesta.text();
    console.log(text);
}