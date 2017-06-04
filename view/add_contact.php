<?php
/**
 * Created by PhpStorm.
 * User: Maciej
 * Date: 2017-06-04
 * Time: 15:21
 */
?>

<h2>Dodaj nowego parafianina do bazy.</h2>

<form method="post">
    <div id=add>
        <div class="square">
            Id osoby*
            <br/>
            <input type="text" name="id_person" />
            <br/><br/>
            Numer stacjonarny
            <br/>
            <input type="number" name="phone" />
            <br/><br/>
            Numer komurkowy
            <br/>
            <input type="number" name="mobile" />
            <br/><br/>
            Adres email
            <br/>
            <input type="email" name="email" />
            <br/><br/>
        </div>

        <div class="square">

        </div>
        <div style="clear: both">
            <input type="submit" value="Dodaj nową osobę">
            <br/><br/>
            *Wymagane
        </div>
    </div>
</form>