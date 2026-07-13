async function polling(){
    const respuesta = await fetch("/status", {method: "POST"});
    const resultado = await respuesta.json();

    if(resultado.length < 1){
        document.getElementById("users").textContent = "base de datos sin datos";
    }

    else {
        console.log(resultado);

        const users = document.getElementById("users");
        users.innerHTML = "";

        for (const lead of resultado) {
            users.innerHTML += `
                <div class="cliente">
                    <h3>
                        <span class="name">${lead.name}</span>
                        <span class="coperative">${lead.coop}</span>
                        <p class="id">${lead.id}</p>
                    </h3>

                    <h4 class="protocolo">
                        Protocolo/UC: ${lead.protocolo}
                    </h4>

                    <img src="/media/leads/${encodeURIComponent(lead.name)}.png" alt="">
                </div>
            `;
        }
    }
}

polling();
setInterval(polling, 1000);

