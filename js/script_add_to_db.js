/**
 * Created by Maciej on 2017-06-05.
 */

var services = [];

//czyszczenie formy dodawania osoby
function clear_reg_form(){
    document.getElementById('name').value = "";
    document.getElementById('surname').value = "";
    document.getElementById('birthday').value = "";
    document.getElementById('sex').value = "";
    document.getElementById('photo').value = "";
    document.getElementById('description').value = "";
}
// dodawanie osoby
function add_person( object ) {

    var json = JSON.stringify(object);
    var label;

    var xhttp = new XMLHttpRequest();
    xhttp.onreadystatechange = function() {
        if (this.readyState == 4 && this.status == 200) {
            console.log( JSON.parse( this.responseText ) );
            document.getElementById('label_info').innerHTML = "Osoba została dodana.";
        }
    };
    xhttp.open("POST", "../php/dbengine.php", true);
    xhttp.send( json );
}

function valid_form_add_person(){
    event.preventDefault(event);

    var name, surname, birthday, sex, photo, description;
        name = document.getElementById('name').value;
        surname = document.getElementById('surname').value;
        birthday = document.getElementById('birthday').value;
        sex = document.getElementById('sex').value;
        photo = document.getElementById('photo').value;
        description = document.getElementById('description').value;

    if ( name != "" && surname != "" && sex != "") {

            var obj;
            var obj = {
                imie: name,
                nazwisko: surname,
                data_urodzenia: birthday,
                plec: sex,
                zdjecia: photo,
                opis: description
            };
            add_person(obj);

    }else
    {
        var label = document.getElementById('label_info');
        label.innerHTML = "Proszę wypełnić wszystkie wymagane pola!";
    }
}

//dodawanie adresu
function clear_address_form(){
    document.getElementById('id_person').value = "";
    document.getElementById('street').value = "";
    document.getElementById('house_number').value = "";
    document.getElementById('flat_number').value = "";
    document.getElementById('code').value = "";
    document.getElementById('city').value = "";
}

function valid_form_add_address(){
    event.preventDefault(event);

    var id_person, street, house_number, flat_number, code, city;
    id_person = document.getElementById('id_person').value;
    street = document.getElementById('street').value;
    house_number = document.getElementById('house_number').value;
    flat_number = document.getElementById('flat_number').value;
    code = document.getElementById('code').value;
    city = document.getElementById('city').value;

    if ( id_person != "" && street != "" && house_number != "" && code != "" && city!= "") {

        var obj;

        var obj = {
            id_osoby: id_person,
            ulica: street,
            numer_budynku: house_number,
            numer_mieszkania: flat_number,
            kod_pocztowy: code,
            miasto: city
        };
        add_address(obj);

    }else
    {
        var label = document.getElementById('label_info');
        label.innerHTML = "Proszę wypełnić wszystkie wymagane pola!";
    }
}

function add_address( object ) {

    var json = JSON.stringify(object);
    var label;

    var xhttp = new XMLHttpRequest();
    xhttp.onreadystatechange = function() {
        if (this.readyState == 4 && this.status == 200) {
            console.log( JSON.parse( this.responseText ) );
            document.getElementById('label_info').innerHTML = "Osoba została dodana.";
        }
    };
    xhttp.open("POST", "../php/dbengine.php", true);
    xhttp.send( json );
}