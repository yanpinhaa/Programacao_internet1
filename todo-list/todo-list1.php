<?php
# conectar ao banco

$localhost = 'localhost';
$usuario = 'root';
$senha = '';
$database = 'todo_list';
$conn = new mysqli($localhost, $usuario, $senha, $database);

if($conn -> connect_error){
    die('Deu erro ao tentar conectar'.mysqli_connect_error());
}


#criação tarefa

if(isset($_POST['descricao']) && !empty(trim($_POST['descricao']))){
    $descricao = $conn -> real_escape_string(trim($_POST['descricao']));
    $sqlcreate = "INSERT INTO tarefas (descricao) VALUES ('$descricao')";

    if($conn -> query(query: $sqlcreate) == TRUE){
        header("location: todo-list1.php");
}
}

#apagar tarefas

if(isset($_GET['delete'])){
    $id = intval($_GET['delete']);
    $sqlDelete = "DELETE FROM tarefas WHERE id = $id";

    if($conn->query(query: $sqlDelete) == TRUE){
        header(header: "location: todo-list1.php");
    }
}

#listar tarefas
$tarefas = [];

$sqlselect = "SELECT * FROM tarefas ORDER BY data_criacao DESC";
$result = $conn -> query($sqlselect);

if($result -> num_rows > 0){
    while($row = $result -> fetch_assoc()){
        $tarefas[] = $row;
}
}



?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Todo-list</title>
</head>
<body>

    <h1>TO-DO List</h1>
    <form action="todo-list1.php" method="POST">
        <input type="text" placeholder="Descrição da sua tarefa" name="descricao"/>
        <button type="submit">Adicionar</button> 
    </form>

    <h2>Suas tarefas</h2>
    <?php if(!empty($tarefas)):?>
        <ul>
            <?php foreach($tarefas as $tarefa):?>
                <li>
                    <?php echo $tarefa['descricao']?>
                    <a href="todo-list1.php?delete=<?php echo $tarefa['id']?>">Excluir</a>
                </li>

            <?php endforeach;?>
        </ul>
    <?php else:?>
    <h3>Não tem tarefas</h3>
    <?php endif;?>

</body>
</html>