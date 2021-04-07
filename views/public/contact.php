<?php ob_start(); ?>

<div id="contact" class="container">
    <h1 class="text-center mt-5">Contactez nous</h1>

    <div class="row col-12">

        <form class="col-12 mt-5 col-md-6 offset-md-1">
            <div class="row mb-2">
                <div class="mb-3 col-6">
                    <label for="nom" class="form-label">Nom</label>
                    <input type="text" class="form-control" id="nom" name="nom">

                </div>
                <div class="mb-3 col-6">
                    <label for="prenom" class="form-label">Prénom</label>
                    <input type="text" class="form-control" id="prenom" name="prenom">

                </div>
            </div>
            <div class="row mb-2">
                <div class="mb-3 col-6">
                    <label for="telephone" class="form-label">Telephone</label>
                    <input type="phone" class="form-control" id="telephone" name="telephone">

                </div>
                <div class="mb-3 col-6">
                    <label for="email" class="form-label">E-mail</label>
                    <input type="email" class="form-control" id="email" name="email" placeholder="exemple@mail.com">

                </div>
            </div>
            <div>
                <label for="message" class="form-label">Message</label>
                <textarea class="form-control" id="message" name="message" rows="8" placeholder="Votre message ici..."></textarea>
            </div>
            <button id="btnCont" type="submit" class="offset-3 col-6 btn btn-primary mt-4">Envoyer</button>
        </form>

        <div id="cont" class="col-12 col-md-5">
            <p class="text-center"><i class="fas fa-map-marked-alt"></i></p>
            <p class="text-center">109-133 Rue Bernard Adour, 33200 Bordeaux</p>
            <p class="text-center"><i class="fas fa-phone-square-alt"></i></p>
            <p class="text-center">( +33 ) 521478965</p>
            <p class="text-center"><i class="fas fa-at"></i></p>
            <p class="text-center">actuweb@contact.com</p>

        </div>

    </div>

    <div>
    <iframe id="laCarte" src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d1414.5823287201406!2d-0.6058653417082849!3d44.838579994774626!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x0%3A0x0!2zNDTCsDUwJzE4LjkiTiAwwrAzNicxNy4yIlc!5e0!3m2!1sfr!2sfr!4v1617802694264!5m2!1sfr!2sfr" style="border:0;" allowfullscreen="" loading="lazy"></iframe>
    </div>
</div>

<?php
$contenu = ob_get_clean();
require_once('./views/public/templatePublic.php');
?>