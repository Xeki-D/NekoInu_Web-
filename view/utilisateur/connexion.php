<style>
      form {
      margin: 10px;
      text-align: left;
      }
      input[type=text], input[type=password],input[type=email] {
        
      width: 100%;
      padding: 16px 8px;
      margin: 8px 0;
      display: inline-block;
      }
      /* Change styles for span on extra small screens */
      @media screen and (max-width: 300px) {
      span.psw {
      display: block;
      float: none;
      }
    }
    </style>

<form action="<?= WEBROOT.'utilisateur/connexion'?> " method="POST" >
<h2>Connexion</h2>
<p>Email<input name="email" type="email" /></p>

<p>Mots de passe<input name="mdp" type="password" /></p>

<p><input name="Valider" type="submit" value="valider" /></p>
<div>
    <h3>Pas de compte ?</h3>
    <a href="<?= WEBROOT.'utilisateur/inscription'?>">Cliquez ici</a>
</div>
</form>