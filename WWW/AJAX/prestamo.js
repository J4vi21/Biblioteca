const botonesDevolver = document.querySelectorAll('.btnDevolver');


botonesDevolver.forEach(boton=> {
    boton.addEventListener('click', async() => {
        const id = boton.dataset.id;

        const confirmar = confirm("¿Marcar este prestamo como devuelto?");
        if(!confirmar) return;

        try {
            const respuesta = await fetch("servicios/devolver.php", {
                method: "POST",
                headers: {"content-type": "application/x-www-form-urlencoded"},
                body: `id=${encodeURIComponent(id)}`
                
            });
       console.log(respuesta);
            const data = await respuesta.json();
 console.log(data);
            if (data.exito){
                const fila =document.getElementById('fila_${id_prestamo}');
                fila.style.transition = "opacity 0.5s ease";
                fila.style.opacity = "0";
                setTimeout(() => fila.remove(), 500);
                
            }else{
                alert("No se puedo marcar como devuelto.");
            }
        }catch(error){
            console.error("Error:", error);
            alert("Ocurrio un error al procesar la devolucion")
        }

    });
})



