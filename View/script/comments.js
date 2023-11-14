

document.addEventListener('DOMContentLoaded', function () {
    var formulaire = document.getElementById('cmn_form');
    var submitBtn = document.getElementById('btn_cmn');

    formulaire.addEventListener('input', function () {
        var tousLesChampsRemplis = Array.from(formulaire.elements).every(function (champ) {
            return champ.tagName !== 'BUTTON' ? champ.value.trim() !== '' : true;
        });

        submitBtn.disabled = !tousLesChampsRemplis;
    });
});


var b=document.getElementById("btn_cmn");
b.addEventListener("click", function controle(){
  //controle de saisie pour les lettres et les chiffres
const regexLettres = /^[a-zA-Z]+$/;
const regexChiffres = /^\d{8}$/;
//champ first name
var name_saisie = document.getElementById("f_name");
var nameInput = name_saisie.value;
var spanNom = document.getElementById("parag_fname");
//verifier le prenom saisie
if (nameInput.length >= 1 && regexLettres.test(nameInput)) {
    return true;
  } else {
    spanNom.textContent = "Veuillez entrer un prénom valide (lettres uniquement)";
    spanNom.style.color = "red";
  }

  //champ last name
var lname_saisie = document.getElementById("l_name");
var lnameInput = lname_saisie.value;
var spanlNom = document.getElementById("parag_lname");
//verifier le nom saisie
if (lnameInput.length >= 1 && regexLettres.test(lnameInput)) {
    return true;
  } else {
    spanlNom.textContent = "Veuillez entrer un nom valide (lettres uniquement)";
    spanlNom.style.color = "red";
  }

  //mail
  var mail = document.getElementById("email");
mail.addEventListener("keyup", function verif() {
  //champ email
  var mail_saisie = document.getElementById("email");
  var emailInput = mail_saisie.value;
  var spanmail = document.getElementById("parag_email");
  //controle de saisie sur le mail
  //const v = /.+@gmail.com/;
  const emailRegex = /^[A-Za-z0-9._%+-]+@gmail.com$/;
  //verifier l'email
  if (emailRegex.test(emailInput)) {
    return true;
    /*spanmail.textContent = "correct";
    spanmail.style.color = "green";*/
  } else {
    spanmail.textContent =
      "votre email doit inclure l'expression '@gmail.com'";
    spanmail.style.color = "red";
  }
});
});