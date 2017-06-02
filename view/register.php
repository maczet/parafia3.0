<?php
/**
 * Created by PhpStorm.
 * User: realy
 * Date: 02.06.2017
 * Time: 18:34
 */

?>

<div class="mainContainer">
    <div id="registerForm">
        <form onsubmit="validForm()">

            <table>
                <tr>
                    <th><label for="firstName">Imię:*</label></th>
                    <th><input id="firstName" type="text" required></th>

                    <td><label for="username">Nazwa użytkownika:*</label></td>
                    <td><input id="username" type="text" required></td>
                </tr>
                <tr>
                    <td><label for="lastName">Nazwisko:*</label></td>
                    <td><input id="lastName" type="text" required></td>
                    <th><label for="email">e-mail:*</label></th>
                    <th><input id="email" type="email" required> </th>
                </tr>
                <tr>
                    <td><label for="password">Hasło:*</label></td>
                    <td><input id="password" type="password" required></td>
                    <td><label for="number">Numer telefonu:</label></td>
                    <td><input id="number" type="tel"></td>
                </tr>
                <tr>
                    <td><label for="password2">Powtórz hasło:*</label></td>
                    <td><input id="password2" type="password" required></td>
                </tr>
            </table>

            <br>
            <br>
            <button type="submit">Rejestruj</button>
            <button class="denied" type="reset">Wyczyść</button>
            <br>
            <h3>*pola wymagane</h3>

        </form>
    </div>

    <label id="error"></label><label id="success"></label>
</div>
