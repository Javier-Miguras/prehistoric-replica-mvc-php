
document.addEventListener('DOMContentLoaded', () => {
    
    //Header Hamburguer

    const hamburguerButton = document.querySelector('#hamburguer-button');

    hamburguerButton.addEventListener('click', () => {
        const nav = document.querySelector('#nav');
        const openHamburguer = '☰';
        const closeHamburguer = '✕';
        nav.classList.toggle('hidden');
        if(hamburguerButton.textContent === openHamburguer){
            hamburguerButton.textContent = closeHamburguer;
        }else{
            hamburguerButton.textContent = openHamburguer;
        }
        
    });

    //Alertas

    const alertas = document.querySelectorAll('.alerta');

        alertas.forEach(function (alerta) {
            setTimeout(function () {
                alerta.style.opacity = '0'; // Configura la opacidad a cero
                alerta.style.transition = 'opacity 0.3s ease-out'; // Aplica la transición
                setTimeout(function () {
                    alerta.style.display = 'none'; // Oculta la alerta después de 0.3 segundos
                }, 300);
            }, 3000);
        });

});
