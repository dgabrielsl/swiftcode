function actualizar_hora() {
    const spanHora = document.getElementById('display-realtime-clock');
    if (spanHora) {
        const ahora = new Date();
        let opciones = { timeZone: 'America/Costa_Rica', year: 'numeric', month: '2-digit', day: '2-digit', hour: '2-digit', minute: '2-digit' };
        let horaCostaRica = ahora.toLocaleString('es-CR', opciones);
        spanHora.innerHTML = horaCostaRica.replace(',', '');
    }
}

actualizar_hora();

if (document.getElementById('display-realtime-clock')) {
    setInterval(actualizar_hora, 1000);
}