<?php
/**
 * Created by PhpStorm.
 * User: Maciej
 * Date: 2017-06-04
 * Time: 15:14
 */
?>

<h2>Dodaj nowego parafianina do bazy.</h2>

<form method="post">
    <div id="add">
        <div class="square">
            Imię*
            <br/>
            <input type="text" name="name" />
            <br/><br/>
            Nazwisko*
            <br/>
            <input type="text" name="surname" />
            <br/><br/>
            Data urodzienia
            <br/>
            <input type="date" name="birthday" />
            <br/><br/>
            Płeć*
            <br/>
            <input type="text" name="sex" title="Podaj K lub M" />
            <br/><br/>
        </div>

        <div class="square">
            Zdjęcie
            <br/>
            <input type="file" name="photo" />
            <br/><br/>
            Opis
            <br/>
            <input type="text" name="description" />
            <br/><br/>
        </div>
        <div style="clear: both">
            <input type="submit" value="Dodaj nową osobę">
            <br/><br/>
            *Wymagane
        </div>
    </div>
</form>