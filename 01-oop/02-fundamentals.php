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
            <figure id="runner-figure"></figure>
            <div id="buttons">
                <button id="run-button">Run</button>
                <button id="stop-button">Stop</button>
                <button id="jump-button">Jump</button>
            </div>
        </section>
    </main>
    <script>
        document.addEventListener("DOMContentLoaded", function() {
            const runnerFigure = document.getElementById('runner-figure');
            const runButton = document.getElementById('run-button');
            const stopButton = document.getElementById('stop-button');
            const jumpButton = document.getElementById('jump-button');
            
            class Runner {
                constructor(name, age, number) {
                    this.name = name;
                    this.age = age;
                    this.number = number;
                    this.state = 'stop';
                }

                run() {
                    this.state = 'run';
                    runnerFigure.innerHTML = "🏃‍♀️";
                }

                stop() {
                    this.state = 'stop';
                    runnerFigure.innerHTML = "⏳";
                }

                jump() {
                    this.state = 'jump';
                    runnerFigure.innerHTML = "🏃‍♂️💨";
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
