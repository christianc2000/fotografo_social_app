function toggleTheme() {
    const body = document.body;

    // Toggle de la clase para cambiar el tema
    body.classList.toggle('theme-dark');

    // Guardar el estado del tema en el almacenamiento local
    const isDarkTheme = body.classList.contains('theme-dark');
    localStorage.setItem('theme', isDarkTheme ? 'dark' : 'light');
}

// Aplicar el tema almacenado al cargar la página
document.addEventListener('DOMContentLoaded', () => {
    const savedTheme = localStorage.getItem('theme');
    if (savedTheme === 'dark') {
document.body.classList.add('theme-dark');
    }
});

function testQuery(){
    console.log('test query working');
}