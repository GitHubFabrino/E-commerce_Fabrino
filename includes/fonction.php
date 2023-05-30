<?php
    // function securisation($donnee)
    // {
    //     $donnee = trim($donnee);
    //     $donnee = stripslashes($donnee);
    //     $donnee = strip_tags($donnee);
    //     return $donnee;
    // }
    function securisation($donnee)
    {
        $donnee = trim($donnee); // Supprime les espaces en début et fin de chaîne
        $donnee = stripslashes($donnee); // Supprime les caractères d'échappement "\" ajoutés par la fonction addslashes()
        $donnee = htmlspecialchars($donnee, ENT_QUOTES, 'UTF-8'); // Convertit les caractères spéciaux en entités HTML
        $donnee = strip_tags($donnee);
        $donnee = filter_var($donnee, FILTER_SANITIZE_STRING); // Supprime les balises et les caractères dangereux
    
        return $donnee;
    }
    