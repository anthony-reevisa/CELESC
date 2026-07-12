async function polling(){
    const respuesta = await fetch("/status", {method: "POST"});
    const resultado = await respuesta.json();

    if(resultado === false){
        document.getElementById("users").textContent = "base de datos sin datos";
    }

    else {
        const users = document.getElementById("users");
        users.innerHTML = "";
        users.innerHTML += `
            <div class="cliente">
                <h3>
                    <span id="name">${resultado.name}</span>
                    <span class="coop" id="coop">${resultado.coop}</span>
                    <p id="id">${resultado.id}</p>
                </h3>

                <h4 id="protocolo">
                    Protocolo/UC: ${resultado.protocolo}
                </h4>

                <img src="/media/leads/${encodeURIComponent(resultado.name)}.png" alt="">
            </div>
        `;

    }

}

setInterval(polling, 1000);

