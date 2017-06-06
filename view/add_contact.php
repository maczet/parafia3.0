<?php
/**
 * Created by PhpStorm.
 * User: Maciej
 * Date: 2017-06-04
 * Time: 15:21
 */
?>

<h2>Dodaj nowego parafianina do bazy.</h2>

<form onsubmit="valid_form_add_contact()">
    <div id=add>
        <div class="square">
            Id osoby*
            <br/>
            <input type="text" id="id_person" />
            <br/><br/>
            Numer stacjonarny
            <br/>
            <input type="number" id="phone" />
            <br/><br/>
            Numer komurkowy
            <br/>
            <input type="number" id="mobile" />
            <br/><br/>
            Adres email
            <br/>
            <input type="email" id="email" />
            <br/><br/>
        </div>

        <div class="square">

        </div>
        <div style="clear: both">
            <button type="submit" class="apply">Dodaj</button>
            <button onclick="clear_add_contact_form()" class="cancel">Wyczyść</button>
            <br/><br/>
            *Wymagane
        </div>
    </div>
</form>
<div>
    <label id="label_info"></label><label id="success"></label>
</div>