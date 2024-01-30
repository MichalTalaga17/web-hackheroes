function show_edit_table(which) {
    document.getElementById('fiszbox-' + which).style.height = "fit-content";
    document.getElementById('fiszbox-' + which).style.overflow = "show";
}

function hide_edit_table(which) {
    document.getElementById('fiszbox-' + which).style.height = "0";
    document.getElementById('fiszbox-' + which).style.overflow = "hidden";
}

function new_fisz_delete(id, ID) {
    let new_amount = parseInt(document.getElementById('new_amount' + ID).value);
    new_amount--;
    document.getElementById('new_amount' + ID).value = new_amount;
    const to_remove_parent = document.querySelector("#fiszbody-" + ID);
    const to_remove = document.querySelector("." + id);
    to_remove_parent.removeChild(to_remove);
    order_check(ID)
}

function create_new_fisz(id) {
    let new_amount = parseInt(document.getElementById('new_amount' + id).value);
    document.getElementById('new_amount' + id).value = new_amount;
    const fisz = document.getElementById('fiszbody-' + id);
    var new_el_number = parseInt(fisz.lastChild.firstElementChild.innerHTML) + 1;
    var el_number = new_el_number;
    if (isNaN(new_el_number)) new_el_number = 1;
    const fiszbox = document.getElementById('fiszbody-' + id);

    const tr = document.createElement('tr');
    tr.setAttribute("name", "nowy" + new_el_number);
    tr.setAttribute("class", "nowy" + new_el_number);
    tr.classList.add("nowy")

    const th = document.createElement('th');
    th.scope = "row";
    th.innerHTML = new_el_number;

    const td1 = document.createElement('td');
    const td2 = document.createElement('td');
    const td3 = document.createElement('td');

    const inputfront = document.createElement('input');
    inputfront.classList.add("form-control");
    inputfront.classList.add("edit_table_input");
    inputfront.name = "nowyfront";

    const inputback = document.createElement('input');
    inputback.classList.add("form-control");
    inputback.classList.add("edit_table_input");
    inputback.name = "nowyback";

    tr.appendChild(th);

    td1.appendChild(inputfront);
    tr.appendChild(td1);

    td2.appendChild(inputback);
    tr.appendChild(td2);

    td3.innerHTML = '<img class="edit_table_delete_icon" src="./icons/recycle-bin.svg" onclick="new_fisz_delete(`nowy' + new_el_number + '`, `' + id + '`)">';
    tr.appendChild(td3);

    fiszbox.appendChild(tr);
    if (!isNaN(el_number)) order_check(id, el_number);
    document.getElementById('new_amount' + id).value = document.querySelectorAll(".nowy").length;
}

function order_check(id) {
    let new_fiszs = document.querySelectorAll(".nowy");
    document.getElementById('new_amount' + id).value = new_fiszs.length;
    if (document.querySelector("#last_fisz" + String(id)) != null) var fisz_number = parseInt(document.querySelector("#last_fisz" + String(id)).firstElementChild.innerHTML) + 1;
    else var fisz_number = 1;
    for (i = 0; i < new_fiszs.length; i++) {
        new_fiszs[i].setAttribute('class', 'nowy' + String(fisz_number + i) + ' nowy');
        new_fiszs[i].setAttribute('name', 'nowy' + String(fisz_number + i));
        let front = new_fiszs[i].firstElementChild.nextElementSibling.firstElementChild;
        let back = new_fiszs[i].firstElementChild.nextElementSibling.nextElementSibling.firstElementChild;
        front.setAttribute('name', 'nowyfront' + String(fisz_number + i));
        back.setAttribute('name', 'nowyback' + String(fisz_number + i));
        new_fiszs[i].firstElementChild.innerHTML = fisz_number + i;
    }
}

function another_topic() {
    document.getElementById('choice').classList.add('visually-hidden');
    document.getElementById('text_area').setAttribute('class', 'form-floating mb-3');
}
var fiszka;
var zestaw;

function start(co) {
    fiszka = 0;
    zestaw = co;
    var wartosc = document.getElementById("fiszka_inside");
    var next = document.getElementById("nastepne");
    wartosc.innerHTML = co;
    wartosc.innerHTML = "";
    next.classList.remove('visually-hidden');
}

document.getElementById("nastepne").addEventListener('click', e => {
    var wartosc = document.getElementById("fiszka_inside");
    wartosc.innerHTML = zestaw[fiszka];
    wartosc.setAttribute('class', 'fs-5');
    var next = document.getElementById("nastepne");
    if (fiszka % 2 == 0) {
        next.innerHTML = "Pokaż odpowiedź";
    } else {
        next.innerHTML = "Następna fiszka";
    }
    if (fiszka == zestaw.length) {
        wartosc.innerHTML = "Koniec zestawu";
        next.classList.add('visually-hidden');
    }
    fiszka++;
});