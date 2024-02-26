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
            <figure id="runner-container" class="stop"></figure>
            <div id="buttons">
                <button id="run-button">Run</button>
                <button id="stop-button">Stop</button>
                <button id="jump-button">Jump</button>
            </div>
        </section>
    </main>
    <script>
        document.addEventListener("DOMContentLoaded", function() {
    const runnerContainer = document.getElementById('runner-container');
    const runButton = document.getElementById('run-button');
    const stopButton = document.getElementById('stop-button');
    const jumpButton = document.getElementById('jump-button');
    
    class Runner {
        constructor(name, age, number) {
            this.name = name;
            this.age = age;
            this.number = number;
            this.state = 'stop';
            this.frame = 1; // Inicia con el primer frame
        }

        run() {
            this.state = 'run';
            runnerContainer.className = 'run';
            this.animateRun();
        }

        stop() {
            this.state = 'stop';
            runnerContainer.className = 'stop';
            this.frame = 1; // Reinicia el frame cuando se detiene
        }

        jump() {
            this.state = 'jump';
            runnerContainer.className = 'jump';
            this.animateJump();
        }

        animateRun() {
            const self = this;
            setInterval(function() {
                if (self.state === 'run') {
                    self.frame = (self.frame % 8) + 1; // Ciclo de 1 a 8
                    runnerContainer.style.backgroundImage = `url('img/run-${self.frame}.png')`;
                }
            }, 125); // 125ms para una animación de 8 frames a 1s
        }

        animateJump() {
            // Implementa la animación de salto aquí si es necesario
        }
    }

    const runner = new Runner('Usain Bolt', 35, 105);

    runButton.addEventListener('click', function() {
        runner.run();
    });

    stopButton.addEventListener('click', function() {
        runner.stop();
    });

    jumpButton.addEventListener('click', function() {
        runner.jump();
    });
});

    </script>
</body>

</html>