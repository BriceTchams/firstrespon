$( function() {
    var availableTags = [
     
      "Douala",
      "Bafoussam",  "Yaounde",  "Buea",  "Limbe",   "kribi",  "Bertoua", "Bandjoun","Bamenda",
      "Manfhe","Bafia","Obala","Tonga", "Kumba","Garoua","Mbouda","ngaroundéré","Ebolowa"

    ];
    $( "#champVille" ).autocomplete({
      source: availableTags
    });
  } );


//   autocomplete pour la barre de rechercher 

$( function() {
    var available = [
     
      "Douala",
      "Bafoussam",  "Yaounde",  "Buea",  "Limbe",   "kribi",  "Bertoua", "Bandjoun","Bamenda",
      "Manfhe","Bafia","Obala","Tonga", "Kumba","Garoua","Mbouda","ngaroundéré","Ebolowa"

    ];
    $( "#Rechercher" ).autocomplete({
      source: available
    });
  } );
