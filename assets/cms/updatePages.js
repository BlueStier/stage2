document.getElementById("choixPhoto").style.display = 'none';
document.getElementById("choix_doc").style.display = 'none';


function invisible(txt) {
    for (var i = 2; i <= 10; i++) {
        document.getElementById(txt + i).style.display = 'none';
    }
}

function visibleP(choix) {
    (choix ? document.getElementById('choixPhoto').style.display = 'block' : document.getElementById('choixPhoto').style.display = 'none');
}

function visible_doc(choix) {
    (choix ? document.getElementById('choix_doc').style.display = 'block' : document.getElementById('choix_doc').style.display = 'none');
}

function visibleC(choix) {
    (choix ? document.getElementById('ajoutCar').style.display = 'block' : document.getElementById('ajoutCar').style.display = 'none');
}


function visibleAn(choix) {
    if (choix) {
        document.getElementById('an').style.display = 'block';
        document.getElementById("doc" + nbY).style.display = 'block';
        document.getElementById("moinsAn").style.display = 'none';
    } else {
        document.getElementById('an').style.display = 'none';
        invisible('doc');
    }
}

function addYear(bool) {
    if (document.getElementById("nbY").value >= 9) {
        document.getElementById("plusAn").style.display = 'none';
    } else {
        document.getElementById("plusAn").style.display = 'inline';
    }
    if (bool) {
        document.getElementById("nbY").value = An;
        document.getElementById("doc" + An).style.display = 'block';
        An++;
    } else {
        An--;
        document.getElementById("doc" + An).style.display = 'none';
        document.getElementById("nbY").value = An - 1;
    }
    if (document.getElementById("nbY").value > initial) {
        document.getElementById("moinsAn").style.display = 'inline';
    } else {
        document.getElementById("moinsAn").style.display = 'none';
    }
}

var nbBu = parseInt(document.getElementById("nbBu").value, 10);
var initialb = nbBu;
var Pbu = nbBu + 1;

function visibleBulle(choix) {
    if (choix) {
        document.getElementById("plusbulle").style.display = 'block';
        document.getElementById("bulle" + nbBu).style.display = 'block';
    } else {
        document.getElementById("plusbulle").style.display = 'none';
        invisible('bulle');
    }
}

function addBulle(bool) {
    if (document.getElementById("nbBu").value >= 9) {
        document.getElementById("plusBu").style.display = 'none';
    } else {
        document.getElementById("plusBu").style.display = 'inline';
    }
    if (bool) {
        document.getElementById("nbBu").value = Pbu;
        document.getElementById("bulle" + Pbu).style.display = 'block';
        Pbu++;
    } else {
        Pbu--;
        document.getElementById("bulle" + Pbu).style.display = 'none';
        document.getElementById("nbBu").value = Pbu - 1;
    }
    if (document.getElementById("nbBu").value > initialb) {
        document.getElementById("moinsBu").style.display = 'inline';
    } else {
        document.getElementById("moinsBu").style.display = 'none';
    }
}


function nom(nb) {
    var old_num = document.getElementById('nbform').value;
    var numero = parseInt(document.getElementById('nbform').value) + 1;
    var insert = document.getElementById("form");
    var div = document.createElement("div");
    div.setAttribute('class', 'form-group');
    div.setAttribute('id', 'formulaire' + numero);
    var hidden = document.createElement("input");
    hidden.setAttribute('type', 'hidden');
    hidden.setAttribute('name', 'input' + numero);
    var input2 = document.createElement("input");
    input2.setAttribute('required', 'required');
    switch (nb) {
        case 1:
            hidden.setAttribute('value', 'nom');
            var t = document.createTextNode("Champ NOM");
            input2.setAttribute('placeholder', 'ex:Votre nom');
            break;
        case 2:
            hidden.setAttribute('value', 'prenom');
            var t = document.createTextNode("Champ PRENOM");
            input2.setAttribute('placeholder', 'ex:Votre prenom');
            break;
        case 3:
            hidden.setAttribute('value', 'adresse');
            var t = document.createTextNode("Champ ADRESSE");
            input2.setAttribute('placeholder', 'ex:Votre adresse');
            break;
        case 4:
            hidden.setAttribute('value', 'date');
            var t = document.createTextNode("Champ DATE");
            input2.setAttribute('placeholder', 'ex:date de naissance');
            break;
        case 5:
            hidden.setAttribute('value', 'email');
            var t = document.createTextNode("Champ EMAIL");
            input2.setAttribute('placeholder', 'ex:Votre Email');
            break;
        case 6:
            hidden.setAttribute('value', 'area');
            var t = document.createTextNode("Champ ZONE DE TEXTE");
            input2.setAttribute('placeholder', 'ex:Votre message');
            break;
        case 7:
            hidden.setAttribute('value', 'nb');
            var t = document.createTextNode("Champ NOMBRE");
            input2.setAttribute('placeholder', 'ex:Nombre de participants');
            break;
        case 8:
            hidden.setAttribute('value', 'file');
            var t = document.createTextNode("Champ FICHIER");
            input2.setAttribute('placeholder', 'ex:Joindre une photo');
            break;
        case 9:
            hidden.setAttribute('value', 'liste');
            var t = document.createTextNode("Champ LISTE");
            input2.setAttribute('placeholder', 'ex:Choisir le service');
            var nb_item_by_liste = document.createElement('input');
            nb_item_by_liste.setAttribute('id', 'nbitembyliste' + numero);
            nb_item_by_liste.setAttribute('name', 'nbitembyliste' + numero);
            nb_item_by_liste.setAttribute('value', '1');
            nb_item_by_liste.setAttribute('type', 'hidden');
            //création de la partie propriété de la liste
            var div1 = document.createElement('div');
            div1.setAttribute('class', 'col-sm-1');
            var liste = document.createElement('div');
            liste.setAttribute('id', 'liste' + numero);
            liste.setAttribute('style', 'border-style: double;');
            liste.setAttribute('class', 'col-sm-10');
            var span = document.createElement('span');
            var text = document.createTextNode("Propiétés de la liste :  ");
            span.appendChild(text);
            var button = document.createElement('a');
            button.setAttribute('class', 'btn btn-info pull-right');
            button.setAttribute('onClick', 'liste(' + numero + ')');
            var text_btn = document.createTextNode("Ajouter un item");
            button.appendChild(text_btn);
            var esp1 = document.createElement('br');
            var esp2 = document.createElement('br');

            //div du form-group
            var formgroup = document.createElement('div');
            formgroup.setAttribute('class', 'form-group');
            var titre = document.createElement('label');
            titre.setAttribute('class', 'col-sm-2 control-label');
            var text_titre = document.createTextNode("Titre de l'item ");
            titre.appendChild(text_titre);

            var divcol1 = document.createElement('div');
            divcol1.setAttribute('class', 'col-sm-3');

            var inputtit = document.createElement('input');
            inputtit.setAttribute('class', 'form-control');
            inputtit.setAttribute('name', numero + 'titreitem1');
            inputtit.setAttribute('placeholder', 'obligatoire');

            divcol1.appendChild(inputtit);

            var adrMail = document.createElement('label');
            adrMail.setAttribute('class', 'col-sm-2 control-label');
            var text_mail = document.createTextNode("Adresse mail destinataire");
            adrMail.appendChild(text_mail);

            var divcol2 = document.createElement('div');
            divcol2.setAttribute('class', 'col-sm-3');

            var inputMail = document.createElement('input');
            inputMail.setAttribute('class', 'form-control');
            inputMail.setAttribute('name', numero + 'mailitem1');
            inputMail.setAttribute('placeholder', 'service.facultatif');
            var text_mail_dest = document.createTextNode("@oignies.fr");

            divcol2.appendChild(inputMail);


            //les élément de la div formgroup sont créés on assemble
            formgroup.appendChild(nb_item_by_liste);
            formgroup.appendChild(titre);
            formgroup.appendChild(divcol1);
            formgroup.appendChild(adrMail);
            formgroup.appendChild(divcol2);
            formgroup.appendChild(text_mail_dest);

            //construction de la div final
            liste.appendChild(span);
            liste.appendChild(button);
            liste.appendChild(esp1);
            liste.appendChild(esp2);
            liste.appendChild(formgroup);
            break;
        case 10:
            hidden.setAttribute('value', 'tel');
            var t = document.createTextNode("Champ Téléphone");
            input2.setAttribute('placeholder', "ex: 0123456789");
            break;
    }

    var label = document.createElement("label");
    label.setAttribute('class', 'col-sm-2 control-label');

    label.appendChild(t);

    var input = document.createElement("input");
    input.setAttribute('class', 'col-sm-2');
    input.setAttribute('type', 'checkbox');
    input.setAttribute('name', 'ch' + numero);
    var label2 = document.createElement("label");
    label2.setAttribute('class', 'control-label');
    var t2 = document.createTextNode("Obligatoire?");
    var div_check = document.createElement("div");
    div_check.setAttribute('class', 'col-sm-2 ');
    label2.appendChild(t2);
    div_check.appendChild(label2);
    div_check.appendChild(input);

    var label3 = document.createElement("label");
    label3.setAttribute('class', 'col-sm-2 control-label');
    var t3 = document.createTextNode("nom du champ :");
    label3.appendChild(t3);

    input2.setAttribute('class', 'col-sm-2');

    input2.setAttribute('name', 'champ' + numero);

    var div_at1 = document.createElement("div");
    div_at1.setAttribute('class', 'col-sm-1 ');

    var div_at2 = document.createElement("div");
    div_at2.setAttribute('class', 'col-sm-1 ');

    var a = document.createElement("a");
    a.setAttribute('class', 'btn btn-danger col-sm-2');
    a.setAttribute('onClick', 'supthis();');
    a.setAttribute('id', 'this' + numero);

    var t4 = document.createTextNode("Supprimer ce champ");
    a.appendChild(t4);
    div.appendChild(hidden);
    div.appendChild(label);
    div.appendChild(div_check);
    div.appendChild(label3);
    div.appendChild(input2);
    div.appendChild(div_at1);
    div.appendChild(a);
    div.appendChild(div_at2);

    if (nb == 9) {
        div.appendChild(esp1);
        div.appendChild(esp2);
        div.appendChild(div1);
        div.appendChild(liste);
    }

    insert.appendChild(div);

    document.getElementById('nbform').value = numero;

    if (numero > 1) {
        document.getElementById('this' + old_num).style.display = 'none';
    }
}
function supthis() {
    var old_num = parseInt(document.getElementById('nbform').value) - 1;
    var numero = parseInt(document.getElementById('nbform').value);
    var form = document.getElementById("form");
    var formulaire = document.getElementById('formulaire' + numero);
    form.removeChild(formulaire);
    if (numero > 1) {
        document.getElementById('this' + old_num).style.display = 'initial';
    }
    document.getElementById('nbform').value = old_num;

}

var nb_item_en_base = parseInt(document.getElementById('nbitembyliste' + n).value);
function liste(n) {
    var old_form = parseInt(document.getElementById('nbitembyliste' + n).value);
    var idform = parseInt(document.getElementById('nbitembyliste' + n).value) + 1;
    
    //div du form-group
    var formgroup = document.createElement('div');
    formgroup.setAttribute('class', 'form-group');
    formgroup.setAttribute('id', n + 'item' + idform);
    var titre = document.createElement('label');
    titre.setAttribute('class', 'col-sm-2 control-label');
    var text_titre = document.createTextNode("Titre de l'item ");
    titre.appendChild(text_titre);

    var divcol1 = document.createElement('div');
    divcol1.setAttribute('class', 'col-sm-3');

    var inputtit = document.createElement('input');
    inputtit.setAttribute('class', 'form-control');
    inputtit.setAttribute('name', n + 'titreitem' + idform);
    inputtit.setAttribute('placeholder', 'obligatoire');

    divcol1.appendChild(inputtit);

    var adrMail = document.createElement('label');
    adrMail.setAttribute('class', 'col-sm-2 control-label');
    var text_mail = document.createTextNode("Adresse mail destinataire");
    adrMail.appendChild(text_mail);

    var divcol2 = document.createElement('div');
    divcol2.setAttribute('class', 'col-sm-3');

    var inputMail = document.createElement('input');
    inputMail.setAttribute('class', 'form-control');
    inputMail.setAttribute('name', n + 'mailitem' + idform);
    inputMail.setAttribute('placeholder', 'facultatif@oignies.fr');

    divcol2.appendChild(inputMail);

    var butSup = document.createElement('a');
    butSup.setAttribute('class', 'btn btn-warning');
    butSup.setAttribute('id', n + 'butsup' + idform);
    butSup.setAttribute('onClick', 'supliste(' + n + ')');
    var text_bts = document.createTextNode("Supprimer l'item");
    butSup.appendChild(text_bts);

    //les élément de la div formgroup sont créés on assemble
    formgroup.appendChild(titre);
    formgroup.appendChild(divcol1);
    formgroup.appendChild(adrMail);
    formgroup.appendChild(divcol2);
    formgroup.appendChild(butSup);

    //construction de la div final
    var listeToUpdate = document.getElementById('liste' + n);
    listeToUpdate.appendChild(formgroup);
    if (old_form > nb_item_en_base) {
        document.getElementById(n + 'butsup' + old_form).style.display = 'none';
    }
    document.getElementById('nbitembyliste' + n).value = idform;

}

function supliste(n) {
    var old_form = parseInt(document.getElementById('nbitembyliste' + n).value) - 1;
    var idform = parseInt(document.getElementById('nbitembyliste' + n).value);
    var liste = document.getElementById('liste' + n);
    var item_sup = document.getElementById(n + 'item' + idform);
    liste.removeChild(item_sup);
    if (idform > 2) {
        document.getElementById(n + 'butsup' + old_form).style.display = 'initial';
    }
    document.getElementById('nbitembyliste' + n).value = old_form;
}

//fonction d'ajout d'un champ pour l'adresse mail de destinataire d'un formulaire

function ajoutmail() {
    var old_mail = document.getElementById('nbmail').value
    var nbmail = parseInt(document.getElementById('nbmail').value) + 1;
    var divformgrp = document.createElement('div');
    divformgrp.setAttribute('class', 'form-group');
    divformgrp.setAttribute('id', 'grpmail' + nbmail);

    var labelmail = document.createElement('label');
    labelmail.setAttribute('class', 'col-sm-2 control-label');
    var textlabel = document.createTextNode("Entrez l'adresse mail");
    labelmail.appendChild(textlabel);

    var divinput = document.createElement('div');
    divinput.setAttribute('class', 'col-sm-6');

    var inputmail = document.createElement('input');
    inputmail.setAttribute('type', 'text');
    inputmail.setAttribute('name', 'mail_dest' + nbmail);
    inputmail.setAttribute('placeholder', 'nom.prenom');

    var textoignies = document.createTextNode("@oignies.fr");
    divinput.appendChild(inputmail);
    divinput.appendChild(textoignies);

    var supmail = document.createElement('a');
    supmail.setAttribute('class', 'col-sm-2 btn btn-warning');
    supmail.setAttribute('onClick', 'supmail();');
    supmail.setAttribute('id', 'supmail' + nbmail);

    var nombut = document.createTextNode("Supprimer");
    supmail.appendChild(nombut);

    divformgrp.appendChild(labelmail);
    divformgrp.appendChild(divinput);
    divformgrp.appendChild(supmail);

    document.getElementById('destinataire').appendChild(divformgrp);

    if (nbmail > 2) {
        document.getElementById('supmail' + old_mail).style.display = 'none';
    }

    document.getElementById('nbmail').value = nbmail;
}

function supmail() {
    var old_mail = parseInt(document.getElementById('nbmail').value) - 1;
    var nbmail = parseInt(document.getElementById('nbmail').value);
    var divasup = document.getElementById('grpmail' + nbmail);
    document.getElementById('destinataire').removeChild(divasup);
    if (old_mail > 1) {
        document.getElementById('supmail' + old_mail).style.display = 'initial';
    }
    document.getElementById('nbmail').value = old_mail;
}