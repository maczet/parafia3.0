<?php
/**
 * Created by PhpStorm.
 * User: Maciej
 * Date: 2017-06-04
 * Time: 15:14
 */
?>


<h2>Dodaj nowego parafianina do bazy.</h2>

<form onsubmit="valid_form_add_person()">
    <div id="add">
        <div class="square">
            Imię*
            <br/>
            <input type="text" id="name" />
            <br/><br/>
            Nazwisko*
            <br/>
            <input type="text" id="surname" />
            <br/><br/>
            Data urodzienia
            <br/>
            <input type="date" id="birthday" />
            <br/><br/>
            Płeć*
            <br/>
            <input type="text" id="sex" title="Podaj K lub M" />
            <br/><br/>
        </div>

        <div class="square">
            Zdjęcie
            <br/>
            <input type="file" id="photo" />
            <br/><br/>
            Opis
            <br/>
            <input type="text" id="description" />
            <br/><br/>
        </div>
        <div style="clear: both">
            <button type="submit" class="apply">Dodaj</button>
            <button onclick="clear_add_person()" class="cancel">Wyczyść</button>
            <br/><br/>
            *Wymagane
        </div>
    </div>
</form>
<div>
    <label id="label_info"></label><label id="success"></label>
</div>
