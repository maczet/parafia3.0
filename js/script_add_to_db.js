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
