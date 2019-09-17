<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Job Application</title>
</head>
<body>
    <h1>Hello World 5556</h1>
    <h2>Hello World 2 </h2>

    <?php 
        include_once("controller/DatabaseConnection.php");
        $db = new DatabaseConnection();

        /*$db->exec('CREATE TABLE foo (bar STRING)');
        $db->exec("INSERT INTO foo (bar) VALUES ('This is a test')");*/

        $result = $db->query('SELECT * FROM customer');
        var_dump($result->fetchArray());
    
    ?>

</body>
</html>