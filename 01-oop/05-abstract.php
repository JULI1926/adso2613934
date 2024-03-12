<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>03- Visibility</title>
    <link rel="stylesheet" href="css/master.css">
    <style>
        section {
            background-color: #0009;
            border-radius: 10px;
            display: flex;
            flex-direction: column;
            align-items: center;
            gap: 1rem;
            padding: 10px;

            h2 {
                margin: 0;
            }

            form {
                border: 2px solid #fff6;
                background-color: #fff3;
                border-radius: 8px;
                display: flex;
                flex-direction: column;
                padding: 10px;
                width: 300px;

                label {
                    display: flex;
                    justify-content: space-between;
                    gap: 1.4rem;
                }

                output {
                    font-size: 1.4rem;
                }

                button {
                    background-color: #994bde;
                    border: 2px solid #fff6;
                    border-radius: 8px;
                    color: #fff9;
                    cursor: pointer;
                    font-size: 1rem;
                    width: 300px;
                    padding: 1rem;
                }

            }
        }
    </style>
</head>

<body>
    <nav class="controls">
        <a href="index.html">
            <svg xmlns="http://www.w3.org/2000/svg"
                viewBox="0 0 512 512"><!--!Font Awesome Free 6.5.1 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license/free Copyright 2024 Fonticons, Inc.-->
                <path fill="#ffffff"
                    d="M512 256A256 256 0 1 0 0 256a256 256 0 1 0 512 0zM231 127c9.4-9.4 24.6-9.4 33.9 0s9.4 24.6 0 33.9l-71 71L376 232c13.3 0 24 10.7 24 24s-10.7 24-24 24l-182.1 0 71 71c9.4 9.4 9.4 24.6 0 33.9s-24.6 9.4-33.9 0L119 273c-9.4-9.4-9.4-24.6 0-33.9L231 127z" />
            </svg>
        </a>
    </nav>
    <main>
        <h1>05 - Abstract</h1>
        <section>
            <?php
            abstract class Database
            {
                // Atributos
                protected $host;
                protected $user;
                protected $pass;
                protected $dbname;
                protected $conx;

                // Método constructor
                public function __construct($dbname, $host = 'localhost', $user = 'root', $pass = '')
                {
                    $this->host = $host;
                    $this->user = $user;
                    $this->pass = $pass;
                    $this->dbname = $dbname;

                }

                // Método para conectarse a la base de datos
                public function connect()
                {
                    try {
                        $this->conx = new PDO("mysql:host=$this->host;dbname=$this->dbname", $this->user, $this->pass);
                        echo "Conexion establecida";
                    } catch (PDOException $e) {
                        echo $e->getMessage();
                    }
                }


            }

            class Pokemon extends Database
            {
                // Método para listar pokemones
                public function listPokemons()
                {
                    try {
                        $query = "SELECT * FROM pokemons";
                        $statement = $this->conx->prepare($query);
                        $statement->execute();
                        return $statement->fetchAll(PDO::FETCH_ASSOC);
                    } catch (PDOException $e) {
                        echo $e->getMessage();
                        return false;
                    }
                }
            }



            // Crear una instancia de Pokemon
            $db = new Pokemon('adso2613934');
            $db->connect();
            $pokemons = $db->listPokemons();



            ?>
        </section>
        <section class="pokemon-container">
            <table class="pokemon-table">
                <tr>
                    <th>Name</th>
                    <th>Type</th>
                    <th>Health</th>
                    <th>Image</th>
                </tr>
                <?php foreach ($pokemons as $pokemon): ?>
                    <tr>
                        <td>
                            <?php echo $pokemon['name']; ?>
                        </td>
                        <td>
                            <?php echo $pokemon['type']; ?>
                        </td>
                        <td>
                            <?php echo $pokemon['health']; ?>
                        </td>
                        <td><img src="<?php echo $pokemon['image']; ?>" alt="<?php echo $pokemon['name']; ?>"></td>
                    </tr>
                <?php endforeach; ?>
            </table>

        </section>


</body>

</html>