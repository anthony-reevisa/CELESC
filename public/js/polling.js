async function polling(){
    const respuesta = await fetch("/status", {method: "POST"});
    const resultado = await respuesta.json();

    if(resultado === false){
        console.log("base de datos sin datos");
    }
}

setInterval(polling, 1000);