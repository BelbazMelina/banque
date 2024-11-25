<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Document</title>
  <link rel="stylesheet" href="../vue/style/AjouterPiece.css">
</head>
<body>
    <header>
        <img src="../vue/logoAwaBank.png" alt="">
      </header>
    <div class="conteneur">
      <form action="frontal.php" method="post">
        <fieldset>
          <legend>Creer un type compte</legend>
          <p>
            <label>Nom du compte :</label>
            <input type="text" value="" name="motif" pattern="\w*{3,32}" required=""/>
          </p>
          <p>
            <label>Nombre de pièces requis</label>
            <input type='text' name='nbrpiece' id='nbrpiece' onblur=pieceChange() pattern='[0-9]+' required=""/>
          </p>
          <div id='ajoute'></div>
          <input type='submit' name='ajouterPieces' value="Valider"/>

          <?php echo $erreur ?>
          <?php echo  $confirmation ?>
        </fieldset>
      </form> 
    </div>
      <script type="text/javascript">
        function pieceChange(){
          var nbpieces = document.getElementById("nbrpiece").value;
          var chaine = "";
          if(parseInt(nbpieces)>0){
            for (var index = 0; index < nbpieces; index++) {
              chaine+='<p><label for="piece'+index+'">Piece '+index+': </label><input type="text" required="" name="piece'+index+'"/></p>';
              }
              document.getElementById('ajoute').innerHTML=chaine;
          }
          else{
            document.getElementById('ajoute').innerHTML=chaine;
          }
          
        }
      </script>
  </body>
  <style>
      fieldset{
      width: 450px;
    }
    form{
     margin-left:32%;
     margin-top:100px;
    }
  </style>
</html>