<?xml version="1.0" encoding="UTF-8"?>
<coisas>
    <?php foreach ($dados as $coisa) { ?>
        <coisa>
            <id><?=$coisa->id;?></id>
            <nome><?=$coisa->nome;?></nome>
            <bonus><?=$coisa->bonus;?></bonus>
            <valor><?=$coisa->valor;?></valor>
            <foto><?=$coisa->img;?></foto>
        </coisa>
    <?php } ?>
</coisas>