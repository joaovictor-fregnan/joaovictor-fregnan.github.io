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
                padding: 1% 8% 1% 8%;
                border-radius: 4px;
                line-height: 1;
                vertical-align: middle;
                display: inline-block;
                margin: 0 2% 0 0;  
                text-align: center;
            }
            
        </style>
    </head>
    <body>
        <div id="content">
            <div class="pokemon">
                <img src="img/bulbasaur.png" alt="">
                <p>Nº001</p>
                <h2>Bulbasaur</h2>
                <div class="pokemon-type">Grass</div>
                <div class="pokemon-type">Poison</div>
            </div>
            <div class="pokemon">
                <img src="img/bulbasaur.png" alt="">
                <p>Nº001</p>
                <h2>Bulbasaur</h2>
                <div class="pokemon-type">Grass</div>
                <div class="pokemon-type">Poison</div>
            </div>
            <div class="pokemon">
                <img src="img/bulbasaur.png" alt="">
                <p>Nº001</p>
                <h2>Bulbasaur</h2>
                <div class="pokemon-type">Grass</div>
                <div class="pokemon-type">Poison</div>
            </div>
            <div class="pokemon">
                <img src="img/bulbasaur.png" alt="">
                <p>Nº001</p>
                <h2>Bulbasaur</h2>
                <div class="pokemon-type">Grass</div>
                <div class="pokemon-type">Poison</div>
            </div>
            <div class="pokemon">
                <img src="img/bulbasaur.png" alt="">
                <p>Nº001</p>
                <h2>Bulbasaur</h2>
                <div class="pokemon-type">Grass</div>
                <div class="pokemon-type">Poison</div>
            </div>
            <div class="pokemon">
                <img src="img/bulbasaur.png" alt="">
                <p>Nº001</p>
                <h2>Bulbasaur</h2>
                <div class="pokemon-type">Grass</div>
                <div class="pokemon-type">Poison</div>
            </div>
        </div>
    </body>
</html>
