<div class="container">
    
    <section id="welcome">
        <h1>Avalie seu Banco</h1>
        <h2>Bem vindo ao site que avalia com seus usuarios o contentamento 
            com as empresas de serviços financeiros</h2>
    </section>
    
    <hr />
    
    <div class="row">
        <div class="span6">
            <h2>Melhores Avaliações</h2>
            <section class="ranking-list well">
                <ul class="clear no-margin-left">
                <?php 
                foreach( $stuff as $item ) {
                    ?>
                    <li><a href="/ranking/<?php echo $item['id'] ?>" data-id="<?php echo $item['id'] ?>">
                        <img src="" alt="Banco" />
                        <?php echo $item['name'] ?>
                    </a></li>
                    <?php
                }
                ?>
                </ul>
            </section>
        </div>
        <div class="span6">
            <h2>Piores Avaliações</h2>
            <section class="ranking-list well">
                <ul class="clear no-margin-left">
                <?php 
                foreach( $stuff as $item ) {
                    ?>
                    <li><a href="/ranking/<?php echo $item['id'] ?>">
                        <img src="" alt="Banco" />
                        <?php echo $item['name'] ?>
                    </a></li>
                    <?php
                }
                ?>
                </ul>
            </section>
        </div>
    </div>
</div>