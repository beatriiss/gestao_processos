
<?php
require_once './classes/ProcessManager.php';

$processManager = new ProcessManager();

?>

<html>
<head>
    <title>Processos</title>
</head>
<body>
<?php
try {
    include('./components/navBar.php');
} catch (Exception $e) {
    echo 'Error including navBar.php: ' . $e->getMessage();
}
?>
    <h1>Processos</h1>
    <label>Futuramente um campo de busca centralizado na pagina</label>
    
</body>
</html>