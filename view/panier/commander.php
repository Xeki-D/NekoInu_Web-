<div>
    <h1><?= $macommande['titre'] ?></h1>
    <?php if(!isset($macommande['autre'])){

    ?>
    <form action="<?= WEBROOT?>panier/commander" class="tm-contact-form" method="POST">
        <fieldset>
            <legend>Informations CB</legend>
            <ol>
                <li>
                    <fieldset>
                        <legend>Type de carte bancaire</legend>
                        <ol>
                            <li>
                                <input id="visa" name="type_de_carte" type="radio">
                                <label for="visa">VISA</label>
                            </li>
                            <li>
                                <input id="mastercard" name="type_de_carte" type="radio">
                                <label for="mastercard">Mastercard</label>
                            </li>
                        </ol>
                    </fieldset>
                </li>
                <li>
                    <label for="numero_de_carte">N° de carte</label>
                    <input id="numero_de_carte" name="numero_de_carte" type="number" required>
                </li>
                <li>
                    <label for="securite">Code sécurité</label>
                    <input id="securite" name="securite" type="number" required>
                </li>
                <li>
                    <label for="nom_porteu"r>Nom du porteur</label>
                    <input id="nom_porteur" name="nom_porteur" type="text" placeholder="Même nom que sur la carte" required>
                </li>
            </ol>
        </fieldset>

        <fieldset>
            <button type="submit">ACHETER</button>
        </fieldset>
    </form>
    <?php
    }else{
        echo "<p>".$macommande['autre']."</p>";
    }
    ?>
</div>