<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <title>Lista</title>
</head>

<?php
   
    $host     = 'localhost';
    $username = 'root';
    $password = '';
    $dbname   = 'cadastro';

    $conn = new mysqli($host, $username, $password, $dbname);

    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

   
    $sql = "SELECT * FROM usuarios";
    $result = $conn->query($sql);
    $qtd = $result->num_rows;

    
    

    if($qtd > 0){
        print "<div class=main-list>";
        
        print "<header class=title>Listagem de usuários</header>";
        print("<div class=table-wrap>");
        print"<table class=main>";
           
            print "<tr>";
            print "<th>#</th>";
            print "<th>email</th>";
            print "<th>ações</th>";
            print "</tr>";
        while($row = $result->fetch_object()){
            print "<tr>";
            print "<td>".$row->id. "</td>";
            print "<td>".$row->email. "</td>";
            print "<td>
            <button class='actions edit' onclick=\"window.location.href='editar.php?&id=".$row->id."';\" />editar</button>
            <button class='actions delete' onclick=\"if(confirm('Tem certeza que deseja excluir o usuário?')){location.href='delete.php?id=".$row->id."';}else{false;}\">Excluir</button>
            </td>";
            print "</tr>";
        }
        print("</table>");
        print("</div>");
        print("<input type='button' value='Voltar' class='voltar-btn' onclick=\"window.location.href='index.php';\" />");
        print "</div>";
    } else {
        echo "<p class='sem-cad'>Não há cadastros no momento</p>";
    }
?>





