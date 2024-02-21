<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="css/master.css">
</head>

<body>
    <main>
        <h1>02-Fundamentals</h1>
        <section>
            <figure>
                <?
                class Runner
                {
                    private $name;
                    private $age;
                    private $number;

                    public function __construct($name, $age, $number)
                    {
                        $this->name = $name;
                        $this->age = $age;
                        $this->number = $number;
                    }

                    public function run()
                    {
                        return "🏃‍♀️";
                    }

                    public function stop()
                    {
                        return "⏳";
                    }

                    public function jump()
                    {
                        return "🏃‍♂️💨";
                    }



                }

                $runner = new Runner('Usain Bolt', 35, 105);
                echo $runner->run();
                echo $runner->jump();
                echo $runner->stop();
                echo $runner->run();
                // Methods
                


                ?>
            </figure>
        </section>
    </main>
</body>

</html>