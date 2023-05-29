// Login form

function clearMain() {
    document.getElementById('main').innerHTML = ''
}

function showLogin() {
    clearMain()

    const mainElement = document.getElementById('main');

    const modalDialogElement = document.createElement('div');
    modalDialogElement.classList.add('modal-dialog');
    modalDialogElement.setAttribute('role', 'document');
    modalDialogElement.style.width = '500px';
    modalDialogElement.style.height = '500px';

    const modalContentElement = document.createElement('div');
    modalContentElement.classList.add('modal-content');
    modalContentElement.style.color = 'black';
    modalContentElement.style.height = '400px';

    const formElement = document.createElement('form');
    formElement.setAttribute('method', 'post');

    const modalHeaderElement = document.createElement('div');
    modalHeaderElement.classList.add('modal-header');

    const modalTitleElement = document.createElement('h5');
    modalTitleElement.classList.add('modal-title');
    modalTitleElement.textContent = 'Connexion';

    const closeButtonElement = document.createElement('button');
    closeButtonElement.setAttribute('type', 'button');
    closeButtonElement.classList.add('close');
    closeButtonElement.setAttribute('data-dismiss', 'modal');
    closeButtonElement.setAttribute('aria-label', 'Close');

    const closeSpanElement = document.createElement('span');
    closeSpanElement.setAttribute('aria-hidden', 'true');
    closeSpanElement.textContent = '×';
    closeSpanElement.addEventListener('click', closeForm);


    closeButtonElement.appendChild(closeSpanElement);
    modalHeaderElement.appendChild(modalTitleElement);
    modalHeaderElement.appendChild(closeButtonElement);

    const modalBodyElement = document.createElement('div');
    modalBodyElement.classList.add('modal-body');

    const formGroup1Element = document.createElement('div');
    formGroup1Element.classList.add('form-group');
    formGroup1Element.setAttribute('id', 'formGroup1Element');

    const pseudonymeLabelElement = document.createElement('label');
    pseudonymeLabelElement.classList.add('col-form-label');
    pseudonymeLabelElement.textContent = 'Pseudonyme';

    const pseudonymeInputElement = document.createElement('input');
    pseudonymeInputElement.setAttribute('type', 'text');
    pseudonymeInputElement.classList.add('form-control');
    pseudonymeInputElement.setAttribute('placeholder', 'Pseudo');
    pseudonymeInputElement.setAttribute('name', 'pseudo');
    pseudonymeInputElement.setAttribute('required', 'required');

    formGroup1Element.appendChild(pseudonymeLabelElement);
    formGroup1Element.appendChild(pseudonymeInputElement);

    const formGroup2Element = document.createElement('div');
    formGroup2Element.classList.add('form-group');

    const passwordLabelElement = document.createElement('label');
    passwordLabelElement.textContent = 'Password';

    const passwordInputElement = document.createElement('input');
    passwordInputElement.setAttribute('type', 'password');
    passwordInputElement.classList.add('form-control');
    passwordInputElement.setAttribute('id', 'exampleInputPassword1');
    passwordInputElement.setAttribute('placeholder', 'Password');
    passwordInputElement.setAttribute('name', 'password');
    passwordInputElement.setAttribute('required', 'required');

    formGroup2Element.appendChild(passwordLabelElement);
    formGroup2Element.appendChild(passwordInputElement);

    const forgotPasswordLinkElement = document.createElement('a');
    forgotPasswordLinkElement.style.color = 'blue';
    forgotPasswordLinkElement.style.fontSize = '13px';
    forgotPasswordLinkElement.style.marginLeft = '5px';
    forgotPasswordLinkElement.setAttribute('href', '#');
    forgotPasswordLinkElement.textContent = 'Mot de passe oublié';

    modalBodyElement.appendChild(formGroup1Element);
    modalBodyElement.appendChild(formGroup2Element);
    modalBodyElement.appendChild(forgotPasswordLinkElement);

    const modalFooterElement = document.createElement('div');
    modalFooterElement.classList.add('modal-footer');

    const createAccButtonElement = document.createElement('button');
    createAccButtonElement.setAttribute('type', 'button');
    createAccButtonElement.classList.add('btn', 'btn-success');
    createAccButtonElement.setAttribute('id', 'createAcc');
    createAccButtonElement.textContent = 'Créer un compte';
    createAccButtonElement.addEventListener('click', showRegister);


    const loginButtonElement = document.createElement('input');
    loginButtonElement.setAttribute('type', 'submit');
    loginButtonElement.classList.add('btn', 'btn-primary');
    loginButtonElement.setAttribute('value', 'Se connecter');
    loginButtonElement.setAttribute('name', 'login');

    modalFooterElement.appendChild(createAccButtonElement);
    modalFooterElement.appendChild(loginButtonElement);

    formElement.appendChild(modalHeaderElement);
    formElement.appendChild(modalBodyElement);
    formElement.appendChild(modalFooterElement);

    modalContentElement.appendChild(formElement);

    modalDialogElement.appendChild(modalContentElement);

    mainElement.appendChild(modalDialogElement);


    // Ajouter le "main" au corps du document
}

function showRegister() {
    clearMain();

    const mainElement = document.getElementById('main');

    const modalDialogElement = document.createElement('div');
    modalDialogElement.classList.add('modal-dialog');
    modalDialogElement.setAttribute('role', 'document');
    modalDialogElement.style.width = '500px';
    modalDialogElement.style.height = '500px';

    const modalContentElement = document.createElement('div');
    modalContentElement.classList.add('modal-content');
    modalContentElement.style.color = 'black';
    modalContentElement.style.height = '550px';

    const modalHeaderElement = document.createElement('div');
    modalHeaderElement.classList.add('modal-header');

    const modalTitleElement = document.createElement('h5');
    modalTitleElement.classList.add('modal-title');
    modalTitleElement.textContent = 'Créer un compte';

    const closeButtonElement = document.createElement('button');
    closeButtonElement.setAttribute('type', 'button');
    closeButtonElement.classList.add('close');
    closeButtonElement.setAttribute('data-dismiss', 'modal');
    closeButtonElement.setAttribute('aria-label', 'Close');

    const closeSpanElement = document.createElement('span');
    closeSpanElement.setAttribute('aria-hidden', 'true');
    closeSpanElement.textContent = '×';
    closeSpanElement.addEventListener('click', closeForm);

    closeButtonElement.appendChild(closeSpanElement);
    modalHeaderElement.appendChild(modalTitleElement);
    modalHeaderElement.appendChild(closeButtonElement);

    const modalBodyElement = document.createElement('div');
    modalBodyElement.classList.add('modal-body');

    const formGroup1Element = document.createElement('div');
    formGroup1Element.classList.add('form-group');

    const pseudonymeLabelElement = document.createElement('label');
    pseudonymeLabelElement.classList.add('col-form-label');
    pseudonymeLabelElement.textContent = 'Pseudonyme';

    const pseudonymeInputElement = document.createElement('input');
    pseudonymeInputElement.setAttribute('type', 'text');
    pseudonymeInputElement.classList.add('form-control');
    pseudonymeInputElement.setAttribute('placeholder', 'Pseudo');
    pseudonymeInputElement.setAttribute('name', 'pseudo');
    pseudonymeInputElement.setAttribute('required', 'required');

    formGroup1Element.appendChild(pseudonymeLabelElement);
    formGroup1Element.appendChild(pseudonymeInputElement);

    const formGroup2Element = document.createElement('div');
    formGroup2Element.classList.add('form-group');

    const emailLabelElement = document.createElement('label');
    emailLabelElement.setAttribute('for', 'exampleInputEmail1');
    emailLabelElement.textContent = 'Adresse email';

    const emailInputElement = document.createElement('input');
    emailInputElement.setAttribute('type', 'email');
    emailInputElement.classList.add('form-control');
    emailInputElement.setAttribute('id', 'exampleInputEmail1');
    emailInputElement.setAttribute('placeholder', 'Email');
    emailInputElement.setAttribute('name', 'email');
    emailInputElement.setAttribute('required', 'required');


    const emailHelpElement = document.createElement('small');
    emailHelpElement.setAttribute('id', 'emailHelp');
    emailHelpElement.classList.add('form-text', 'text-muted');
    emailHelpElement.textContent = "Nous ne partagerons jamais votre e-mail avec quelqu'un d'autre.";

    formGroup2Element.appendChild(emailLabelElement);
    formGroup2Element.appendChild(emailInputElement);
    formGroup2Element.appendChild(emailHelpElement);

    const formGroup3Element = document.createElement('div');
    formGroup3Element.classList.add('form-group');

    const passwordLabelElement = document.createElement('label');
    passwordLabelElement.textContent = 'Mot de passe';

    const passwordInputElement = document.createElement('input');
    passwordInputElement.setAttribute('type', 'password');
    passwordInputElement.classList.add('form-control');
    passwordInputElement.setAttribute('id', 'exampleInputPassword1');
    passwordInputElement.setAttribute('placeholder', 'Mot de passe');
    passwordInputElement.setAttribute('required', 'required');

    formGroup3Element.appendChild(passwordLabelElement);
    formGroup3Element.appendChild(passwordInputElement);

    const formGroup4Element = document.createElement('div');
    formGroup4Element.classList.add('form-group');

    const confirmationLabelElement = document.createElement('label');
    confirmationLabelElement.textContent = 'Confirmation';

    const confirmationInputElement = document.createElement('input');
    confirmationInputElement.setAttribute('type', 'password');
    confirmationInputElement.classList.add('form-control');
    confirmationInputElement.setAttribute('id', 'exampleInputPassword1');
    confirmationInputElement.setAttribute('placeholder', 'Confirmez le mot de passe');
    confirmationInputElement.setAttribute('required', 'required');

    formGroup4Element.appendChild(confirmationLabelElement);
    formGroup4Element.appendChild(confirmationInputElement);

    modalBodyElement.appendChild(formGroup1Element);
    modalBodyElement.appendChild(formGroup2Element);
    modalBodyElement.appendChild(formGroup3Element);
    modalBodyElement.appendChild(formGroup4Element);

    const modalFooterElement = document.createElement('div');
    modalFooterElement.classList.add('modal-footer');

    const loginAccButtonElement = document.createElement('button');
    loginAccButtonElement.setAttribute('type', 'button');
    loginAccButtonElement.classList.add('btn', 'btn-success');
    loginAccButtonElement.setAttribute('id', 'loginAcc');
    loginAccButtonElement.textContent = "J'ai déjà un compte";
    loginAccButtonElement.addEventListener('click', showLogin);

    const registerButtonElement = document.createElement('button');
    registerButtonElement.setAttribute('type', 'button');
    registerButtonElement.classList.add('btn', 'btn-primary');
    registerButtonElement.textContent = "S'enregistrer";

    modalFooterElement.appendChild(loginAccButtonElement);
    modalFooterElement.appendChild(registerButtonElement);

    modalContentElement.appendChild(modalHeaderElement);
    modalContentElement.appendChild(modalBodyElement);
    modalContentElement.appendChild(modalFooterElement);

    modalDialogElement.appendChild(modalContentElement);

    mainElement.appendChild(modalDialogElement);
}


function closeForm() {
    clearMain()
}
