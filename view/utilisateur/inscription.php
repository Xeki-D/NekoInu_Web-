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

<form action="<?= WEBROOT.'utilisateur/inscription'?> " method="POST" >

<p>Nom : <input name="nom" type="text" /></p>

<p>Prenom : <input name="prenom" type="text" /></p>

<p>Mots de passe : <input name="mdp" type="password" /></p>

<p>Email : <input name="adr" type="email" /></p>

<p>Ville : <input name="ville" type="text" /></p>

<p>Code Postal : <input name="cp" type="text" /></p>

<p><input name="Valider" type="submit" value="valider" /></p>

</form>

