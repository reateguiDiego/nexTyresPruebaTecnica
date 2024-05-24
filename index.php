<html>
    <head>
        <title></title>
        <meta charset="UTF-8">
    </head>
    <body>
        <h1>TT - Full Stack - NEX 2024</h1>
        <p>To-Do list:</p>
        <p>
            <?php

                $datos = json_decode(file_get_contents("../db.json"));
                echo "<ul>";
                foreach ($datos->tareas as $tarea) {
                    echo "<li>$tarea</li>";
                }
                echo "</ul>";
            ?>
        </p>
        
        <footer>        
            <p>NEX@<?=date('Y')?></p> - Consultas <a href="mailto:varanda@nex.es">varanda@nex.es</a></p>
        </footer>
    </body>
    
</html>
