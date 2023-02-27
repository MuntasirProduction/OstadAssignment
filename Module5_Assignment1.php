<?php
class Person
{
    private $name, $email;

    function __construct()
    {
    }

    public function setName($name)
    {
        $this->name = $name;
    }
    public function getName()
    {
        return $this->name;
    }

    public function setEmail($email)
    {
        $this->email = $email;
    }
    public function getEmail()
    {
        return $this->email;
    }
}

$person = new Person();
$person->setName("Mr. Bee");
$person->setEmail("beehive@gmail.com");


?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Assignment</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
</head>

<body>


    <h1 class="h1 text-center m-3">HTML, Basic OOP, and Superglobal Variables in PHP</h1>
    <div class="container bg-light p-5 mt-3">
        <h2>Task: 1</h2>

        <div class="row">
            <form method="POST" class="form">
                <div class="form-group col-md-5">
                    <label for="name">Name</label>
                    <input class="form-control" type="text" name="name" id="name">
                </div>

                <div class="form-group col-md-5">
                    <label for="email">Email</label>
                    <input class="form-control" type="email" name="email" id="email">
                </div>

                <button class="btn btn-primary mt-2" type="submit">Submit</button>
            </form>
        </div>
    </div>

    <div class="container mt-5 bg-light p-3">
        <h2>Task: 2</h2>
        <div>
            <p>Person: </p>
            <?php
            echo "Name: " . $person->getName() . "<br>";

            echo "Email: " . $person->getEmail() . "<br>";
            ?>
        </div>
    </div>

    <div class="container mt-5 bg-light text-dark">
        <h2>Task 3:</h2>

        <?php
        $person2 = new Person();
        if (isset($_POST['name']) && !empty(($_POST['name']))) {
            $person2->setName($_POST['name']);
        }

        if (isset($_POST['email']) && !empty(($_POST['email']))) {
            $person2->setEmail($_POST['email']);
        }
        ?>
        <div>
            <?php
            if (!empty($person2->getName()) || !empty($person2->getEmail())) { ?>

                <p>Submitted Person: </p>

            <?php } ?>

            <?php
            if (!empty($person2->getName()))
                echo "Name: " . $person2->getName() . "<br>";

            if (!empty($person2->getEmail()))
                echo "Email: " . $person2->getEmail() . "<br>";
            ?>
        </div>

    </div>


</body>

</html>
