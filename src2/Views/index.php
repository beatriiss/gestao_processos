<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Gestão de Processos</title>
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@400;500&display=swap" rel="stylesheet">
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            font-family: 'Roboto', sans-serif;
            background-color: #f4f4f9;
            color: #333;
            display: flex;
            justify-content: center;
            align-items: center;
            min-height: 100vh;
        }

        .container {
            text-align: center;
            background: #fff;
            padding: 20px 30px;
            border-radius: 8px;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
        }

        h1 {
            color: #4a90e2;
            margin-bottom: 10px;
        }

        p {
            margin-bottom: 20px;
            font-size: 16px;
        }

        nav {
            margin-bottom: 20px;
            background: #fff;
            padding: 10px;
            border-radius: 5px;
        }

        nav a {
            color: #fff;
            text-decoration: none;
            margin: 0 10px;
            padding: 8px 15px;
            border-radius: 5px;
            background: #007bff;
            transition: background 0.3s;
            font-weight: 500;
        }

        nav a:hover {
            background: #0056b3;
        }

        .button {
            display: inline-block;
            background: #4a90e2;
            color: #fff;
            padding: 10px 20px;
            text-decoration: none;
            font-weight: 500;
            border-radius: 5px;
            margin: 10px 0;
            transition: background 0.3s ease;
        }

        .button:hover {
            background: #3a78c4;
        }
    </style>
</head>
<body>
    <div class="container">
        <h1>Gestão de Processos</h1>
        <p>Selecione a funcionalidade desejada:</p>
        <nav>
            <a href="cadastro.php">Cadastro de Processo</a>
            <a href="visualizar_processos.php">Visualizar Processos</a>
        </nav>
    </div>
</body>
</html>
