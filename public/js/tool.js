const btnActive = document.getElementById("active")

btnActive.addEventListener("click", actualizar);

async function actualizar(){
    document.getElementById("state").textContent = "Activo";
    const respuesta = await fetch("/active", { method: "POST"});
    const text = await respuesta.text();
    console.log(text);
    document.getElementById("state").textContent = text;
    setTimeout(() => {
        document.getElementById("state").textContent = "";
        location.reload();
    }, 3000);
}