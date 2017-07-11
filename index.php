<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" type="text/css" href="style.css">
    <link rel="stylesheet" href="Semantic UI/semantic.css">
    <script src="Semantic UI/semantic.js"></script>
    <title>Title</title>
</head>

<body>

<main>
    <header>
        <?php
        include ("header.php");
        ?>
    </header>

<div>
    <h2> Exercice 1: Créez une fonction PHP qui affiche une boîte d’alerte à partir de la fonction JavaScript
    dont la syntaxe est alert("chaine_de caractères") . Cette fonction peut être appelée avec
    comme paramètre le texte du message à afficher. Elle est particulièrement utile pour affi
    cher des messages d’erreur de manière élégante, sans que ces derniers restent écrits dans
    la page."</h2>
    <input type="button" name="yes" value="yes or no" onclick="call();">
    <?php
    echo "
   <script type='text/javascript' language='javascript'>
        function call() {


        if (confirm('Vous désirez vraiment quitter?')) {
            alert('oui')
        }
        else {
            alert('non')
        }};
    </script>"
 ?>

</div>

    <h2> Exercice 2
      * Écrivez une fonction dont le paramètre **passé par référence** est un tableau de chaînes de
      caractères et qui transforme chacun des éléments du tableau de manière que le premier
      caractère soit en majuscule et les autres en minuscules, quelle que soit la casse initiale
      des éléments, même si elle est mixte.
      Le passage par référence c'est cela : http://php.net/manual/fr/language.references.pass.php
    </h2>

<h4>CI DESSOUS DESCRIPTION DU PASSAGE PAR REFERENCE AVEC "FOO" (voir code)</h4>
    <?php
    function foo(&$var) {
        $var++;
    }
    $a=5;
    foo ($a);
    // $a vaut 6 maintenant
    echo $a;
    ?>

    <h4>ici on va remplacer tous les caracteres d une chaine par minusc ou majusc</h4>

    <?php
    $foo = 'bonjour tout le monde!';
    $foo = ucfirst($foo);             // Bonjour tout le monde!
echo "$foo";
    $bar = 'BONJOUR TOUT LE MONDE!';
    echo "</br> $bar";
    $bar = ucfirst($bar);             // BONJOUR TOUT LE MONDE!
    $bar = ucfirst(strtolower($bar)); // Bonjour tout le monde!
    echo "<br/> $bar";
    ?>


    <p>Une autre maniere de faire avec UCFIRST et PREG_SPLIT</p>
    <?php
    function sentence_case($string) {
        $sentences = preg_split('/([.?!]+)/', $string, -1, PREG_SPLIT_NO_EMPTY|PREG_SPLIT_DELIM_CAPTURE);
        $new_string = '';
        foreach ($sentences as $key => $sentence) {
            $new_string .= ($key & 1) == 0?
                ucfirst(strtolower(trim($sentence))) :
                $sentence.' ';
        }
        return trim($new_string);
    }

    print sentence_case('HMM. WOW! WHAT?');

    // Outputs: "Hmm. Wow! What?"
    ?>

    <h4>REVENONS A L EXERCICE 2 : créons maintenant un tableau dans lequel nous modifions le premier caractere</h4>
<?php
$tableau= array('un', 'deux','trois', 'quatre', 'cinq');
echo "<p>petit var dump du tableau</p>";
var_dump($tableau);
echo "<p><br>la modif de la casse ci-dessous</p>";
function table(){
    $tableau= array('un', 'deux','trois', 'quatre', 'cinq');
    for($i=0, $size=count($tableau); $i < $size; $i++){
    $tableau[$i]=ucfirst(strtolower($tableau[$i]));
    echo ($tableau[$i].'<br>');
    }
    }
    table();
?>
<div>

<ul>
    <li><h2> ## Exercice 3</h2></li>
    <li> * **Petite Bataille Navale**</li>
    <li> * A partir de l'image du tableau Exo_php.png :</li>
    <li>* Construire le tableau associatif php, correspondants aux lignes et aux colonnes de l'image.</li>

    <li>* Vous devez créez une fonction qui prend deux arguments;
     -le premier argument de type char
     -le second de type int (coordonnées horizontales et verticales du tableau).
    </li>
    <li>* La fonction doit retourner trois valeurs différentes:</li>

    <li>Si les coordonnées correspondent à une case grise, alors la fonction affichera "Touché mon Capitaine!".</li>
    <li>Si les coordonnées correspondent à une case blanche, alors la fonction affichera "C'est rappé!".</li>
    <li>Si les coordonnées ne correspondent à aucune case, alors la fonction affichera hors-jeu.</li>
</ul>

    <form action="index.php" method="post">
        <input type="text" name="col" placeholder="ex : A, B, C..." value="">
        <input type="text" name="row" placeholder="ex : 1, 2, 3..." value="">
        <input type="submit" onclick="fight();" name"submit" value="Tirez !">
    </form>

    <?php
    $bateaux=NULL;
   // l idee ci-dessus est de permettre de ne rien avoir comme reaction au depart mais pour l instant ça ne fonctionne pas //

    function fight ($col, $row){
        $bateaux = array(array('f', 3),
            array('f', 4),
            array('i',5),
            array('i',6),
            array('c',9),
            array('d',9),
            array('e',9),
            array('f',9),
            array('d',9));
        $col = strtolower($col);
        $target = array($col, $row);
        if ($col > 'j' || $col < 'a' || $row  < 1 || $row  > 10)
        // utilisation de || pour signifier "ou" ceci "ou" cela //
        {
            return 'hors-jeu !';
        }
        else if (in_array($target, $bateaux)){
            return 'touché mon Capitaine !';
        }
        else{
            return 'C\'est rappé...';
        }
    }
    echo fight($_POST['col'], $_POST['row']);
    ?>


</div>

</main>

</body>
</html>