<?xml version="1.0" encoding="UTF-8"?>
<bixos>
    <?php foreach ($dados as $bixo) { ?>
        <bixo>
            <id><?=$bixo->id; ?></id>
            <nome><?=$bixo->nome;?></nome>
            <descricao><?=$bixo->descricao;?></descricao>
            <vida><?=$bixo->vida;?></vida>
            <ataque><?=$bixo->ataque;?></ataque>
            <defesa><?=$bixo->defesa;?></defesa>
            <foto><?=$bixo->foto ?></foto>
            <latitude><?=$bixo->lati;?></latitude>
            <longitude><?=$bixo->long;?></longitude>
        </bixo>
    <?php } ?>
</bixos>