<?php 


///* --> Conecta no LocalHost
function connect() {
    $username = 'root';
    $password = '';

    $pdo = new PDO('mysql:host=localhost;dbname=lojasilascou;charset=utf8', $username, $password);
    
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    $pdo->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_OBJ);

    return $pdo;
}
/* --> Conecta no Server
function connect() {
    $username = 'epiz_34143761';
    $password = 'BdOLPG9xVu';

    $pdo = new PDO('mysql:host=sql205.epizy.com;dbname=epiz_34143761_lojasilascou;charset=utf8', $username, $password);
    
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    $pdo->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_OBJ);

    return $pdo;
}
*/

?>