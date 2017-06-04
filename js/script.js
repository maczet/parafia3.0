/**
 * Created by Maciej on 2017-05-28.
 */

var services = [];

function logIn(){
    var obj, username, password, json;
    username = document.getElementById('username').value;
    password = document.getElementById('password').value;

    obj = {
        username: username,
        password: password
    };

    json = JSON.stringify(obj);

    var xhttp = new XMLHttpRequest();
    xhttp.onreadystatechange = function() {
        if (this.readyState == 4 && this.status == 200) {

            var response = JSON.parse(this.responseText);
            if( response == 'error' ){
                document.getElementById('error').innerHTML = "Błędne dane logowania!";
            }else if( response == 'noUser'){
                document.getElementById('error').innerHTML = "Nie ma takiego użytkonika";
            }else if( response == 'incorrectPassword' ){
                document.getElementById('error').innerHTML = "Hasło niepoprawne!";
            }else{
                console.log(response);
                sessionStorage.setItem('loggedUser', response );
                window.location.assign('main.html');
            }
        }
    };
    xhttp.open("POST", "php/user.php", true);
    xhttp.setRequestHeader("Content-type", "application/json");
    xhttp.send(json);
}


function logOut( string ){
    var xhttp = new XMLHttpRequest();
    xhttp.onreadystatechange = function() {
        if (this.readyState == 4 && this.status == 200) {

            //var response = JSON.parse(this.response);
            console.log(this.response);
            if( this.response == 'success' ){
                sessionStorage.clear();
                window.location.assign('../index.html');
            }else{
                alert('Ups! Coś poszło nie tak.');
            }
        }
    };
    xhttp.open("GET", string, true);
    xhttp.send();
}

function validForm(){
    event.preventDefault(event);

    var firstName, lastName, username, password, password2, email, number_phone;
    firstName = document.getElementById('firstName').value;
    lastName = document.getElementById('lastName').value;
    username = document.getElementById('username').value;
    password = document.getElementById('password').value;
    password2 = document.getElementById('password2').value;
    email = document.getElementById('email').value;
    number_phone = document.getElementById('number').value;

    if ( password.length >= 3 ) {

        if (password === password2)
        {
            var obj;

            var obj = {
                firstName: firstName,
                lastName: lastName,
                username: username,
                password: password,
                email: email,
                phone_number: number_phone
            };

            createUser(obj);

        } else {
            var label = document.getElementById('password_warning');
            label.innerHTML = "Hasło musi być identyczne!";
        }
    }
    else
    {
        var label = document.getElementById('password_warning');
        label.innerHTML = "Hasło nie może być krótsze niż 3 znaki!";
    }
}

function createUser( object) {

    var json = JSON.stringify(object);
    var label;

    var xhttp = new XMLHttpRequest();
    xhttp.onreadystatechange = function() {
        if (this.readyState == 4 && this.status == 200) {

            console.log(this.response);
            var response = JSON.parse(this.responseText);
            if( response == 'userExist' ){
                label = document.getElementById('error');
                label.style.color = "red";
                label.innerHTML = "Ta nazwa użytkownika jest już zajęta!";
            }else if( response == 'success' ){
                label = document.getElementById('success');

                alert("Rejestracja powiodła się. Nastąpi automatyczne logowanie po naciśnięciu OK.");
                logIn( );

                clear_reg_form();
            }
        }
    };
    xhttp.open("POST", "php/create_user.php", true);
    xhttp.setRequestHeader("Content-type", "application/json");
    xhttp.send(json);
}

function clear_reg_form()
{
    document.getElementById('firstName').value = "";
    document.getElementById('username').value = "";
    document.getElementById('lastName').value = "";
    document.getElementById('password').value = "";
    document.getElementById('password2').value = "";
    document.getElementById('email').value = "";
    document.getElementById('number').value = "";

}