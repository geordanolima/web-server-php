<?xml version="1.0" encoding="UTF-8"?>
<viventes>
    <?php foreach ($dados as $vivente) { ?>
        <vivente>
            <id><?=$vivente->id; ?></id>
            <nome><?=$vivente->nome;?></nome>
            <apelido><?=$vivente->apelido;?></apelido>
            <genero><?=$vivente->genero;?></genero>
            <email><?=$vivente->email;?></email>
            <foto><?=$vivente->img;?></foto>
        </vivente>
    <?php } ?>
</viventes>