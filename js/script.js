/**
 * Created by Maciej on 2017-05-28.
 */

var services = [];

//logowanie użytkownika
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
            }else if( response == 'incorrectData' ){
                document.getElementById('error').innerHTML = "Niepoprawna nazwa użytkownika lub hasło!";
            }else{
                console.log(response);
                sessionStorage.setItem('loggedUser', response );
                window.location.assign('index.php');
            }
        }
    };
    xhttp.open("POST", "php/user.php", true);
    xhttp.setRequestHeader("Content-type", "application/json");
    xhttp.send(json);
}

//wylogowywanie użytkownika
function logOut( string ){
    var xhttp = new XMLHttpRequest();
    xhttp.onreadystatechange = function() {
        if (this.readyState == 4 && this.status == 200) {

            //var response = JSON.parse(this.response);
            console.log(this.response);
            if( this.response == 'success' ){
                sessionStorage.clear();
                window.location.assign('../index.php');
            }else{
                alert('Ups! Coś poszło nie tak.');
            }
        }
    };
    xhttp.open("GET", string, true);
    xhttp.send();
}

//rejestracja nowego użytkownika
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
            var label = document.getElementById('label_info');
            label.innerHTML = "Hasło musi być identyczne!";
        }
    }
    else
    {
        var label = document.getElementById('label_info');
        label.innerHTML = "Hasło nie może być krótsze niż 3 znaki!";
    }
}

//dodanie nowego użytkownika
// function valid_form_add_person(){
//     event.preventDefault(event);
//
//     var name, surname, birthday, sex;
//     name = document.getElementById('name').value;
//     surname = document.getElementById('surname').value;
//     birthday = document.getElementById('birthday').value;
//     sex = document.getElementById('sex').value;
//
//     if ( name.length == 0 ) {
//
//         if (surname.length == 0)
//         {
//             var obj;
//
//             var obj = {
//                 name: name,
//                 surname: surname,
//                 birthday: birthday,
//                 sex: sex,
//             };
//
//             createPerson(obj);
//
//         } else {
//             var label = document.getElementById('label_info');
//             label.innerHTML = "Proszę wpisać nazwisko!";
//         }
//     }
//     else
//     {
//         var label = document.getElementById('label_info');
//         label.innerHTML = "Prosze wpisać imię!";
//     }
// }
//
// function createPerson( object) {
//
//     var json = JSON.stringify(object);
//     var label;
//
//     var xhttp = new XMLHttpRequest();
//     xhttp.onreadystatechange = function() {
//         if (this.readyState == 4 && this.status == 200) {
//
//             console.log(this.response);
//             var response = JSON.parse(this.responseText);
//
//              if( response == 'success' ){
//                 label = document.getElementById('success');
//
//                 alert("Dodano osobę.");
//
//                 clear_reg_form_person();
//             } else {
//                  alert("Wystąpił błąd: " + response);
//              }
//         }
//     };
//     xhttp.open("POST", "php/create_person.php", true);
//     xhttp.setRequestHeader("Content-type", "application/json");
//     xhttp.send(json);
// }
//
// //czyszczenie formularza osoby
// function clear_reg_form_person()
// {
//     document.getElementById('name').value = "";
//     document.getElementById('surname').value = "";
//     document.getElementById('sex').value = "";
//     document.getElementById('birthday').value = "";
// }

function createUser( object) {

    var json = JSON.stringify(object);
    var label;

    var xhttp = new XMLHttpRequest();
    xhttp.onreadystatechange = function() {
        if (this.readyState == 4 && this.status == 200) {

            console.log(this.response);
            var response = JSON.parse(this.responseText);
            if( response == 'userExist' ){
                label = document.getElementById('label_info');
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
//czyszczenie formularza
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