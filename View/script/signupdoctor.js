const firstNameInput = document.getElementById("firstNameInput");
const errorFirstName = document.getElementById("error-message-firstname");
const lastNameInput = document.getElementById("lastNameInput");
const errorLastName = document.getElementById("error-message-lastname");
const emailInput = document.getElementById("email");
const errorEmail = document.getElementById("error-message-email");
const categorySelect = document.getElementById("select");
const errorCategory = document.getElementById("error-message-category");
const experienceTextarea = document.getElementById("experience");
const errorExperience = document.getElementById("error-message-experience");
const fileInput = document.getElementById("fileInput");
const errorFile = document.getElementById("error-message-file"); // Ajout du message d'erreur pour le fichier
const signupButton = document.getElementById("signupButton");
const passwordInput = document.getElementById("pwd");
const errorPassword = document.getElementById("error-message-pwd");
const adresseInput = document.getElementById("adresse");
const erroradresse = document.getElementById("error-message-adresse");
firstNameInput.addEventListener("keyup", validateFirstName);
lastNameInput.addEventListener("keyup", validateLastName);
emailInput.addEventListener("keyup", validateEmail);
categorySelect.addEventListener("keyup", validateCategory);
experienceTextarea.addEventListener("keyup", validateExperience);
passwordInput.addEventListener("keyup", validatePassword);
adresseInput.addEventListener("keyup", validateAdresse);

function validateFirstName() {
  const firstName = firstNameInput.value.trim();
  // Utilisez une expression régulière pour vérifier que le prénom ne contient que des lettres et des espaces
  if (/^[A-Za-z\s]*$/.test(firstName) && firstName.length > 3) {
    errorFirstName.textContent = "";
  } else {
    errorFirstName.textContent =
      "Le prénom doit contenir plus de 3 caractères et ne doit contenir que des lettres et des espaces.";
  }
  validateForm();
}



function validateLastName() {
  const lastName = lastNameInput.value.trim();
  // Utilisez une expression régulière pour vérifier que le nom de famille ne contient que des lettres et des espaces
  if (/^[A-Za-z\s]*$/.test(lastName) && lastName.length > 3) {
    errorLastName.textContent = "";
  } else {
    errorLastName.textContent =
      "Le nom de famille doit contenir plus de 3 caractères et ne doit contenir que des lettres et des espaces.";
  }
  validateForm();
}

function validateEmail() {
  const email = emailInput.value.trim();
  if (/^\S+@\S+\.\S+$/.test(email)) {
    errorEmail.textContent = "";
  } else {
    errorEmail.textContent = "Adresse e-mail non valide.";
  }
  validateForm();
}

function validateCategory() {
  const category = categorySelect.value.trim();
  if (/^[A-Za-z\s]*$/.test(category) && category.length > 3) {
    errorCategory.textContent = "";
  } else {
    errorCategory.textContent = "donner une specialite valide";
  }
  validateForm();
}
function validateAdresse() {
  const category = adresseInput.value.trim();
  if (/^[A-Za-z\s]*$/.test(category) && category.length > 3) {
    errorCategory.textContent = "";
  } else {
    errorCategory.textContent = "donner une specialite valide";
  }
  validateForm();
}


function validateExperience() {
  const experience = experienceTextarea.value.trim();
  if (experience.length > 10) {
    errorExperience.textContent = "";
  } else {
    errorExperience.textContent =
      "L'expérience doit contenir plus de 10 caractères.";
  }
  validateForm();
}
function validatePassword() {
  const password = passwordInput.value.trim();
  if (password.length > 5) {
    errorPassword.textContent = "";
  } else {
    errorPassword.textContent =
      "Le mot de passe doit contenir plus de 5 caractères.";
  }
  validateForm();
}
function validateForm() {
  const isFirstNameValid =
    firstNameInput.value.trim().length > 3 && !/\d/.test(firstNameInput.value);
  const isLastNameValid = lastNameInput.value.trim().length > 3;
  const isEmailValid = /^\S+@\S+\.\S+$/.test(emailInput.value.trim());
  const isCategoryValid = categorySelect.value !== "";
  const isExperienceValid = experienceTextarea.value.trim().length > 10;
  const isPasswordValid = passwordInput.value.trim().length > 5; // Nouvelle validation du mot de passe
  const isAdresseValid = adresseInput.value !== "";

  if (
    isFirstNameValid &&
    isLastNameValid &&
    isEmailValid && // Vérification du champ téléphone
    isCategoryValid &&
    isExperienceValid &&
    isPasswordValid &&
    isAdresseValid
  ) {
    signupButton.disabled = false; // Activation du bouton Signup
  } else {
    signupButton.enable = true; // Désactivation du bouton Signup
  }
}
