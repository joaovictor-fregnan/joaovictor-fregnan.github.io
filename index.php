<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<html>
    <head>
        <meta charset="UTF-8">
        <title>Pokédex</title>
        <style>
            html, body
            {                
                font-size: 4px;
                min-height: 100%;
            }

            body
            {            
                padding: 0;
                margin: 0;                
                font-family: Calibri;
                background-color: rgb(51, 51, 51);                
            }
            
            #content
            {
                width: 1024px;
                background-color: white;                
                margin: auto;
                padding: 5% 0 5% 0;
                text-align: center;
            }
                                    
            .pokemon
            {
                display: inline-table;
                width: 20%;   
                text-align: left;
                padding: 0 1% 8% 1%;
            }
                                    
            .pokemon img
            {
                width: 100%;
                background-color: rgb(235, 235, 235);
                border-radius: 1rem;
            }
            
            .pokemon p
            {
                margin: 0 0 4% 0;
                font-size: 4rem;
                color: rgb(128, 128, 128);
                text-align: left;
                font-weight: bold;
            }
            
            .pokemon h2
            {
                font-size: 8rem;
                color: rgb(51, 51, 51);
                margin: 0 0 2% 0;
                text-align: left;
            }
            
            .pokemon-type
            {
                width: 20%;                
                background-color: green;
                font-size: 3rem;
                padding: 2% 8% 2% 8%;
                border-radius: 4px;
                line-height: 1;
                vertical-align: middle;
                display: inline-block;
                margin: 0 2% 0 0;  
                text-align: center;
                color: white;
            }
            
        </style>
        
        <script type="text/javascript" src="js/jquery-3.5.1.min.js"></script>
        
        <script>
            
            function getPokemon(id) 
            {
                
                /*$("button").click(function(){
                $.ajax({url: "demo_test.txt", success: function(result){
                  $("#div1").html(result);
                }});
              });*/
                $.post("controllers/PokemonController.php",
                {
                  acao: "getPokemon",
                  id: id
                },
                function(data, status){
                    var pokemon = JSON.parse(data); 
                   
                    var types = "";
                        
                    for(var j=0; j<pokemon.types.length; j++)
                    {
                        types = types.concat("<div class='pokemon-type'>" + pokemon.types[j] + "</div>");
                    }
                   
                   $("#content").append("<div class='pokemon'><img src='" + pokemon.img + "' alt=''><p>Nº " + pokemon.number + "</p><h2>" + pokemon.name + "</h2>" + types + "</div>");
                });                
            }
            
            function getNext12(start_id) 
            {                
                $.post("controllers/PokemonController.php",
                {
                  acao: "getNext12",
                  start_id: start_id
                },
                function(data, status){
                    var pokemons = JSON.parse(data);
                    for(var i=0; i<pokemons.length; i++)
                    {
                        var types = "";
                        
                        for(var j=0; j<pokemons[i].types.length; j++)
                        {
                            types = types.concat("<div class='pokemon-type'>" + pokemons[i].types[j] + "</div>");
                        }
                                                                        
                        $("#content").append("<div class='pokemon'><img src='" + pokemons[i].img + "' alt=''><p>Nº " + pokemons[i].number + "</p><h2>" + pokemons[i].name + "</h2>" + types + "</div>");
                    }
                });                
            }
            
            //getPokemon(800);
            
            getNext12(140);
        
        </script>
        
    </head>
    <body>
        <div id="content">            
        </div>
    </body>
</html>
