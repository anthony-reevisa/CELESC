let ultimoResultado = "";
const users = document.getElementById("users");
users.textContent = "Base de datos sin datos";

async function polling() {
    while (true) {
        try {
            const respuesta = await fetch("/status", {
                method: "POST"
            });

            const resultado = await respuesta.json();

            const actual = JSON.stringify(resultado);

            if (actual !== ultimoResultado) {
                ultimoResultado = actual;
                render(resultado);
            }

        } catch (err) {
            console.error(err);
            await new Promise(r => setTimeout(r, 1000));
        }
    }
}

function render(resultado) {
    if (resultado.length === 0) {
        users.textContent = "Base de datos sin datos";
        return;
    }

    let html = "";

    for (const lead of resultado) {
        html += `
            <div class="cliente">
                <h3>
                    <span class="name">${lead.name}</span>
                    <span class="coperative">${lead.coop}</span>
                    <p class="id">${lead.id}</p>
                </h3>

                <h4 class="protocolo">
                    Protocolo/UC: ${lead.protocolo}
                </h4>

                <img src="/media/leads/${encodeURIComponent(lead.name)}.png">
            </div>
        `;
    }

    users.innerHTML = html;
}

polling();