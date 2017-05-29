/**
 * Created by Maciej on 2017-05-28.
 */

var services = [];

//logowanie i wylogowanie
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
                document.getElementById('loginError').innerHTML = "Błędne dane logowania!";
            }else if( response == 'noUser'){
                document.getElementById('loginError').innerHTML = "Nie ma takiego użytkonika";
            }else if( response == 'incorrectPassword' ){
                document.getElementById('loginError').innerHTML = "Hasło niepoprawne!";
            }else{
                console.log(response);
                sessionStorage.setItem('loggedUser', response );
                window.location.assign('main.html');
            }
        }
    };
    xhttp.open("POST", "../php/user.php", true);
    xhttp.setRequestHeader("Content-type", "application/json");
    xhttp.send(json);
}