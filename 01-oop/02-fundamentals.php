<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Runner Animation</title>
    <link rel="stylesheet" href="css/master.css">
</head>
<body>
    <main>
        <h1>Runner Animation</h1>
        <section>
            <figure id="runner-container" class="<?php echo isset($runner) ? $runner->getState() : ''; ?>"></figure>
            <img src="../img/run.gif" alt="">
            <div id="buttons">
                <form method="post">
                    <div>
                        <button type="submit" name="action" value="run">Run</button>
                    </div>
                    <div>
                        <button type="submit" name="action" value="stop">Stop</button>
                    </div>
                    <div>
                        <button type="submit" name="action" value="jump">Jump</button>
                    </div>
                </form>
            </div>
        </section>
    </main>
</body>
</html>

<?php

class Runner {
    private $name;
    private $age;
    private $number;
    private $state;
    private $frame;

    public function __construct($name, $age, $number) {
        $this->name = $name;
        $this->age = $age;
        $this->number = $number;
        $this->state = 'stop';
        $this->frame = 1; // Inicia con el primer frame
    }

    public function run() {
        $this->state = 'run';
        $this->animateRun();
    }

    public function stop() {
        $this->state = 'stop';
        $this->frame = 1; // Reinicia el frame cuando se detiene
    }

    public function jump() {
        $this->state = 'jump';
        $this->animateJump();
    }

    public function getState() {
        return $this->state;
    }

    private function animateRun() {
        return '../../img/run.png';
    }

    private function animateJump() {
        // Lógica de animación de salto aquí
    }
}

// Manejar acciones del formulario
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $action = $_POST["action"];
    $runner = new Runner('Usain Bolt', 35, 105); // Crear instancia de Runner

    switch ($action) {
        case 'run':
            $runner->run();
            break;
        case 'stop':
            $runner->stop();
            break;
        case 'jump':
            $runner->jump();
            break;
        default:
            break;
    }
}

?>
