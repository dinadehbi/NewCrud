<?php

$input_data = json_decode(file_get_contents('php://input'), true); // Supprimez le deuxième paramètre true car file_get_contents retourne déjà une chaîne JSON
$word = $input_data['wordS']; // Modifiez 'wordS' selon le nom de la clé JSON que vous envoyez depuis votre application front-end

try {
    $servername = 'localhost';
    $dbname = 'insertuser';
    $username = 'root';
    $password = '';

    $connection = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
    $connection->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    
    $stmt = $connection->prepare("SELECT * FROM users WHERE fullname LIKE :word");
    $stmt->execute([':word' => "%$word%"]); 
    
    $results = $stmt->fetchAll();

    if (count($results) == 0) {
        echo "<tr><td>No results</td></tr>";
    } else {
        foreach ($results as $result) {
            echo "<tr>
                    <td>{$result['id']}</td>
                    <td>{$result['fullname']}</td>
                    <td><a href='edit.html?id={$result['id']}'><img src='edite.png'></td></a>
                    <td><a href='edite.php'><img src='delete.png'></td></a>
                 </tr>";
        }
    }
} catch (PDOException $e) {
    echo $e->getMessage();
}
?>