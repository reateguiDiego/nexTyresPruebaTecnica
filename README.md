# Prueba Técnica NEX

Hola,
En primer lugar nos gustaría agradecerte que nos hayas prestado tu tiempo durante la entrevista, así como tu interés en Nex.

Como hemos hablado en la entrevista previa, esta es una  prueba  técnica estándar  para ver tu desempeño a nivel general con las herramientas básicas más habituales de desarrollo web (HTML, PHP, JS ….). Y que podemos contigo como Full Stack manejándote bien tanto en Front como en Back.

La prueba técnica en líneas generales es hacer una sencilla TO-DO app. Un pequeño gestor de tareas.

Te recuerdo que puedes hacer la  prueba  con cualquier tecnología con la que te sientas cómod@. Igualmente puedes darle la profundidad que consideres.

Tan pronto como resuelvas la  prueba, te agradeceríamos que nos la dejes repositada en GitHub (y a ser posible, documentada para poder ejecutarla) en un repositorio personal. Si tienes posibilidad de subirlo a algún entorno o server tuyo y pasarnos el acceso para verlo en funcionamiento, aún mejor (con esto también nos demuestras manejo de servers con esto).

Cualquier duda que pueda surgirte, no dudes en hacérnoslo saber en el email varanda@nex.es. ¡No nos vas a gustar menos por preguntar y resolver dudas!

Un saludo y suerte.

## Ficheros
 - index.php
 - db.json

## Ejecutar en local
php -S localhost:8000

## Tareas a realizar
 - Adapta esta página e introduce algún tipo de framework front o librerría de diseño como puede ser Bootstrap (o similar), con un diseño base en el que tengamos un menú de la izquierda de la página y un cuerpo central.
 - Modificar el código PHP (o la tecnología preferida) para que cada "tarea" de la "base de datos" tengo un valor que indique el orden (prioridad).
 - Mostrar el listado de tareas en base a ese orden.
 - Añadir posibilidad de crear una nueva tarea.
 - Posibilidad de editar/eliminar elementos.
 - Pasar la lógica de este index y de otras posibles páginas (añadir, bajar/subir, eliminar) a una clase externa, un controlador.
 - Instalar un sistema de templates (Mustache, Twig, etc). Conseguir pintar la página principal con este sistema de templates. Puede ser el propio framework (React, Extjs, Symfony...)
 - Desacoplar lógica de PHP del renderizado. Desde HTML (o tecnología de FRONT que se prefiera) se pedirá vía AJAX los datos a PHP, que responderá con JSONs (Si utilizas otra tecnología de back como puede ser ExpressJs o similar no hay problema)
