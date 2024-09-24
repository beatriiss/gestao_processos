<nav class="navbar">
    <img src="assets/gestao.png" alt="Logo">
    <ul>
        <li><a href="create.php">Adicionar Processo</a></li>
        <li><a href="read.php">Listar Processos</a></li>
    </ul>
</nav>

<style>

    .navbar {
        background-color: #fff;
        padding: 1em;
        text-align: center;
        display: flex;
        justify-content: space-between;
        align-items: center;
        border-radius: 10px;
        box-shadow: 0 4px 8px rgba(0, 0, 0, 0.2);
        margin-top: 15;
        margin-bottom: 15;
        width: 1200;
    }

    .navbar img {
        width: 90px;
        height: 35px;
        margin-right: 20px;
    }

    .navbar ul {
        list-style: none;
        margin: 0;
        padding: 0;
        display: flex;
        justify-content: flex-end;
    }

    .navbar li {
        margin-right: 20px;
    }

    .navbar a {
        color: #000;
        text-decoration: none;
    }

    .navbar a:hover {
        color: #ccc;
    }
</style>
