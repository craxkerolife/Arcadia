
# 🎮 ARCADIA

## Descripción del proyecto

ARCADIA es un sitio web dedicado al mundo de los videojuegos y la tecnología. El objetivo es ofrecer información sobre juegos, emuladores, simuladores y aplicaciones, además de contar con un espacio para compartir opiniones y sugerencias.

El proyecto comenzó como una página desarrollada con HTML y CSS y luego fue migrado a PHP para incorporar contenido dinámico y mejorar la organización del código.


## Tecnologías utilizadas

- HTML5: estructura de las páginas.
- CSS3: diseño y estilos.
- Bootstrap: adaptación responsive.
- JavaScript: interacciones.
- PHP 8.x: procesamiento del lado del servidor.
- XAMPP: entorno de desarrollo local.
- Git y GitHub: control de versiones.

## Estructura del proyecto

- index.php: página principal.
- includes/: contiene los archivos reutilizables.
- header.php: encabezado.
- nav.php: menú de navegación.
- footer.php: pie de página.
- clase5/: actividades de procesamiento de formularios.
- estilos.css: estilos de la página.
- imagenes/: imágenes utilizadas.

## Modularización con PHP (SSI)

Se utilizaron las instrucciones include y require para separar partes del sitio y evitar repetir código.

Los componentes principales son:

- Encabezado.
- Menú de navegación.
- Pie de página.

También se incorporó renderizado del lado del servidor (SSR), permitiendo generar contenido dinámico desde PHP.

## Formularios y procesamiento de datos

En la carpeta clase5 se trabaja con formularios HTML y procesamiento mediante PHP.

**Método POST:**
Se utiliza para enviar opiniones y sugerencias de los usuarios.

**Método GET:**
Se utiliza para realizar búsquedas y enviar información mediante la URL.

Se incorporan validaciones para controlar los datos recibidos, utilizando herramientas como:

- trim()
- htmlspecialchars()
- filter_var()

También se muestran mensajes para indicar si los datos fueron recibidos correctamente o si existe algún error.


## Configuración

El proyecto incluye un archivo .env.example como ejemplo de configuración de variables de entorno.

No se deben publicar contraseñas ni datos privados en GitHub.
