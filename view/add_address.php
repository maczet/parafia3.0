<?php
/**
 * Created by PhpStorm.
 * User: Maciej
 * Date: 2017-06-04
 * Time: 17:32
 */
?>

<h2>Dodaj nowy adres do bazy.</h2>

<form>
    <div id=add>
        <div class="square">
            Id osoby*
            <br/>
            <input type="text" name="id_person" />
            <br/><br/>
            Ulica*
            <br/>
            <input type="text" name="street" />
            <br/><br/>
            Numer budynku*
            <br/>
            <input type="text" name="house_number" />
            <br/><br/>
            Numer mieszkania
            <br/>
            <input type="text" name="flat_number" />
            <br/><br/>
        </div>

        <div class="square">
            Kod pocztowy*
            <br/>
            <input type="text" name="code" />
            <br/><br/>
            Miasto*
            <br/>
            <input type="text" name="city" />
        </div>
        <div style="clear: both">
            <input type="submit" value="Dodaj nową osobę">
            <br/><br/>
            *Wymagane
        </div>
    </div>
</form>
