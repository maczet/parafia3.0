/**
 * Created by Maciej on 2017-06-05.
 */

var services = [];

//add person
//czyszczenie formularza
function clear_add_person_form(){
    document.getElementById('name').value = "";
    document.getElementById('surname').value = "";
    document.getElementById('birthday').value = "";
    document.getElementById('sex').value = "";
    //document.getElementById('photo').value = "";
    //document.getElementById('description').value = "";
}
//przesłanie zwalodowanego obiektu z danymi
function add_person( object ) {

    var json = JSON.stringify(object);
    // var label;

    var xhttp = new XMLHttpRequest();
    xhttp.onreadystatechange = function() {
        if (this.readyState == 4 && this.status == 200) {
            console.log( JSON.parse( this.responseText ) );
            if ( this.responseText == 'success')
                document.getElementById('label_info').innerHTML = "Osoba została dodana.";
            else
                document.getElementById('label_info').innerHTML = "Błąd: " + this.responseText;
        }
    };
    xhttp.open("POST", "../php/create_person.php", true);
    xhttp.send( json );
}
//pobieranie wartości z formularza i walidacja czy zostały wprowadzone pola wymagane
function valid_form_add_person(){
    event.preventDefault(event);
    //pobieranie wartości wprowadzonych przez użytkownika
    var name, surname, birthday, sex, photo, description;
        name = document.getElementById('name').value;
        surname = document.getElementById('surname').value;
        birthday = document.getElementById('birthday').value;
        sex = document.getElementById('sex').value;
        //photo = document.getElementById('photo').value;
        //description = document.getElementById('description').value;
    //sprawdzenie czy wymagane pola nie są puste
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
            clear_add_person_form()

    }else
    {
        var label = document.getElementById('label_info');
        label.innerHTML = "Proszę wypełnić wszystkie wymagane pola!";
    }
}

//add address
function clear_add_address_form(){
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
    //sprawdzenie czy wymagane pola nie są puste
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

        if (add_address(obj))
          clear_add_address_form();

    }else
    {
        var label = document.getElementById('label_info');
        label.innerHTML = "Proszę wypełnić wszystkie wymagane pola!";
    }
}

function add_address( object ) {

    var json = JSON.stringify(object);
    // var label;

    var xhttp = new XMLHttpRequest();
    xhttp.onreadystatechange = function() {
        if (this.readyState == 4 && this.status == 200) {
            console.log( JSON.parse( this.responseText ) );
            document.getElementById('success').innerHTML = "Adres został dodany prawidłowo";
            return true;
        }
    };
    xhttp.open("POST", "../php/create_address.php", true);
    xhttp.send( json );
}

//ADD Contact
function clear_add_contact_form() {
    document.getElementById('id_person').value = "";
    document.getElementById('phone').value = "";
    document.getElementById('mobile').value = "";
    document.getElementById('email').value = "";
}
function valid_form_add_contact() {
    event.preventDefault(event);

    var id_person, phone, phone, mobile, email;
    id_person = document.getElementById('id_person').value;
    phone = document.getElementById('phone').value;
    mobile = document.getElementById('mobile').value;
    email = document.getElementById('email').value;
    //sprawdzenie czy wymagane pola nie są puste
    if ( id_person != "") {

        var obj;
        var obj = {
            id_osoby: id_person,
            numer_stacjonarny: phone,
            numer_komurkowy: mobile,
            email: email,
        };

        add_contact(obj);
        clear_add_contact_form()

    }else
    {
        var label = document.getElementById('label_info');
        label.innerHTML = "Proszę wypełnić wszystkie wymagane pola!";
    }
}

function add_contact( object ) {

    var json = JSON.stringify(object);
    var label;

    var xhttp = new XMLHttpRequest();
    xhttp.onreadystatechange = function() {
        if (this.readyState == 4 && this.status == 200) {
            console.log( JSON.parse( this.responseText ) );
            document.getElementById('label_info').innerHTML = "Kontakt został dodany prawidołowo.";
        }
    };
    xhttp.open("POST", "../php/create_contact.php", true);
    xhttp.send( json );
}