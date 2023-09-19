<?php
    if(session_id() === "") session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Consultar Local de Votação</title>
    <link rel="stylesheet" href="style.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
</head>
<body>
    <header> <img src="logo.png" alt="" srcset=""> </header>
    <main>
        <h1 class='center'>Eleição do Conselho 2023</h1>
        <hr>
        <h2>Buscar</h2>
        <form action="getLocal.php" method="post">
            <div class="mb-3 px-2">
                <label for="zona" class="form-label">Zona</label>
                <select name="zona" id="zona" class="form-select">
                    <option <?php if(isset($_SESSION['zona']) && $_SESSION['zona'] == "75") echo "selected"; else "" ?>  value="75">75</option>
                    <option <?php if(isset($_SESSION['zona']) && $_SESSION['zona'] == "76") echo "selected"; else "" ?>  value="76">76</option>
                    <option <?php if(isset($_SESSION['zona']) && $_SESSION['zona'] == "98") echo "selected"; else "" ?>  value="98">98</option>
                    <option <?php if(isset($_SESSION['zona']) && $_SESSION['zona'] == "129") echo "selected"; else "" ?>  value="129">129</option>
                </select>
            </div>
            <div class="mb-3 px-2">
                <label for="secao" class="form-label">Seção</label>
                <input class="form-control" type="number" name="secao" id="secao" min="1" max="426" value = <?php if(isset($_SESSION['secao'])) echo $_SESSION['secao'] ?>  >
            </div>
            <div class="mb-3 center">
                <input type="submit" value="ENVIAR" id="btn-1" class="btn w-50">
            </div>
        </form>
        <hr>
        <section class="mb-3 px-2">
            <?php
                if(isset( $_SESSION['response'])){
                    echo "<h2>Resultado</h2>";
                    if ($_SESSION['response'] == 0) {
                        echo "
                        <div class='alert alert-warning' role='alert'>
                            A combinação Zona e Seção não retornaram resultado válido.
                        </div>
                        <div class='alert alert-warning' role='alert'>
                            Por favor reavalie os valores e tente novamente.
                        </div>
                        ";
                    } else {
                        echo "<div class='alert alert-light m-0 py-1' role='alert'>Urna - ". utf8_encode($_SESSION['response'][0]) . "</div>";
                        echo "<div class='alert alert-light m-0 py-1' role='alert'>Local da Votação:<br>". utf8_encode($_SESSION['response'][1]) . "</div>";
                        echo "<div class='alert alert-light m-0 py-1' role='alert'>Endereço:<br>". utf8_encode($_SESSION['response'][2]) . "</div>";
                    }
                }
            ?>
        </section>
    </main>
</body>
</html>