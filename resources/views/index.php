<!-- Grupo:
    Dierlys R
    Geordano L
    Madson N
    Rafael T
    Tiago W -->


<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" integrity="sha384-WskhaSGFgHYWDcbwN70/dfYBj47jz9qbsMId/iRN3ewGhXQFZCSftd1LZCfmhktB" crossorigin="anonymous">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.5.0/css/all.css" integrity="sha384-B4dIYHKNBt8Bc12p+WXckhzcICo0wtJAoU8YZTY5qE0Id1GSseTk6S+L3BlXeVIU" crossorigin="anonymous">

    <link rel="stylesheet" href="css/estilo.css">

    <link rel="icon" href="img/dog-w.png" type="image/x-icon" />
    <link rel="shortcut icon" href="img/dog-w.png" type="image/x-icon" />
    <script src="./js/funcoes.js"></script>
    <title>Inicio</title>
</head>
    <body >
        <div class="container">
            <hr/>
            <div class="input-group mb-3">
                <input 
                    type="text" 
                    class="form-control" 
                    placeholder="busca bixos" 
                    aria-describedby="button-addon2"
                    name="nome"
                    id="nome">
                <div class="input-group-append">
                    <button class="btn btn-outline-secondary" type="button" id="button-addon2" onclick="getTextInfo()"> buscar <i class="fas fa-search"></i> </button>
                </div>
            </div>
            <div id="arrei"></div>
        </div>
        <div class="container">
            <hr/>
            <h4>todos - JSON</h4>
            <a class="btn btn-outline-primary btn-lg" href="/item/json" role="button">item json</a>   
            <a class="btn btn-outline-secondary btn-lg" href="/jogador/json" role="button">jogador json</a> 
            <a class="btn btn-outline-success btn-lg" href="/pokemon/json" role="button">pokemon json</a> 
            <br/><hr/>
            <h4>todos - XML</h4>
            <a class="btn btn-outline-primary btn-lg" href="/item/xml" role="button">item xml</a>   
            <a class="btn btn-outline-secondary btn-lg" href="/jogador/xml" role="button">jogador xml</a> 
            <a class="btn btn-outline-success btn-lg" href="/pokemon/xml" role="button">pokemon xml</a> 
            <br/><hr/>
            <h4>1 - JSON</h4>
            <a class="btn btn-outline-primary btn-lg" href="/item/3/json" role="button">item json</a>   
            <a class="btn btn-outline-secondary btn-lg" href="/jogador/2/json" role="button">jogador json</a> 
            <a class="btn btn-outline-success btn-lg" href="/pokemon/2/json" role="button">pokemon json</a> 
            <br/><hr/>
            <h4>1 - XML</h4>
            <a class="btn btn-outline-primary btn-lg" href="/item/3/xml" role="button">item xml</a>   
            <a class="btn btn-outline-secondary btn-lg" href="/jogador/2/xml" role="button">jogador xml</a> 
            <a class="btn btn-outline-success btn-lg" href="/pokemon/2/xml" role="button">pokemon xml</a> 
            <br/><hr/>
        </div>
        <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js" integrity="sha384-smHYKdLADwkXOn1EmN1qk/HfnUcbVRZyYmZ4qpPea6sjB/pTJ0euyQp0Mk8ck+5T" crossorigin="anonymous"></script>

        <script src="./js/funcoes.js"></script>
    </body>
</html>