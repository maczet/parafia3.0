<?php
/**
 * Created by PhpStorm.
 * User: Maciej
 * Date: 2017-06-04
 * Time: 17:32
 */
?>

<h2>Dodaj nowy adres do bazy.</h2>

<form onsubmit="valid_form_add_address()">
    <div id=add>
        <div class="square">
            Id osoby*
            <br/>
            <input type="text" id="id_person" />
            <br/><br/>
            Ulica*
            <br/>
            <input type="text" id="street" />
            <br/><br/>
            Numer budynku*
            <br/>
            <input type="text" id="house_number" />
            <br/><br/>
            Numer mieszkania
            <br/>
            <input type="text" id="flat_number" />
            <br/><br/>
        </div>

        <div class="square">
            Kod pocztowy*
            <br/>
            <input type="text" id="code" />
            <br/><br/>
            Miasto*
            <br/>
            <input type="text" id="city" />
        </div>
        <div style="clear: both">
            <button type="submit" class="apply">Dodaj</button>
            <button onclick="clear_address_form()" class="cancel">Wyczyść</button>
            <br/><br/>
            *Wymagane
            <br/>
        </div>

    </div>
</form>
<div>
    <label id="label_info"></label>
</div>