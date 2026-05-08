const canvas = document.getElementById('matrix-canvas');
const ctx = canvas.getContext('2d');

// Ajustar el tamaño del canvas a la ventana
canvas.width = window.innerWidth;
canvas.height = window.innerHeight;

// Caracteres: Katakana + Alfabeto latino + Números
const katakana = 'アァカサタナハマヤャラワガザダバパイィキシチニヒミリヰギジヂビピウゥクスツヌフムユュルグズブヅプエェケセテネヘメレゲゼデベペオォコソトノホモヨョロゴゾドボポヴッン';
const latin = 'ABCDEFGHIJKLMNOPQRSTUVWXYZ';
const nums = '0123456789';
const alphabet = katakana + latin + nums;

const fontSize = 16;
const columns = canvas.width / fontSize;

// Array para rastrear la posición Y de cada columna
const rainDrops = [];
for (let x = 0; x < columns; x++) {
    rainDrops[x] = 1;
}

const draw = () => {
    // Fondo translúcido para crear la estela de las letras
    ctx.fillStyle = 'rgba(5, 5, 5, 0.05)';
    ctx.fillRect(0, 0, canvas.width, canvas.height);

    ctx.font = fontSize + 'px monospace';

    for (let i = 0; i < rainDrops.length; i++) {
        const text = alphabet.charAt(Math.floor(Math.random() * alphabet.length));
        
        // 95% de las letras en azul, 5% en rosa como destellos
        if (Math.random() > 0.95) {
            ctx.fillStyle = '#ff00cc'; // Tu Rosa neón
        } else {
            ctx.fillStyle = '#3333ff'; // Tu Azul eléctrico
        }

        ctx.fillText(text, i * fontSize, rainDrops[i] * fontSize);

        // Reiniciar la gota al llegar abajo con un poco de aleatoriedad
        if (rainDrops[i] * fontSize > canvas.height && Math.random() > 0.975) {
            rainDrops[i] = 0;
        }
        rainDrops[i]++;
    }
};

// Velocidad de la lluvia
setInterval(draw, 35);

// Reajustar si el usuario cambia el tamaño de la ventana
window.addEventListener('resize', () => {
    canvas.width = window.innerWidth;
    canvas.height = window.innerHeight;
});