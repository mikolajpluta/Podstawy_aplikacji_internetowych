function isWhiteSpaceOrEmpty(str) {
    return /^[\s\t\r\n]*$/.test(str);
}

function isEmailInvalid(email) {
    let emailPattern = /^[a-zA-Z_0-9\.]+@[a-zA-Z_0-9\.]+\.[a-zA-Z]{2,}$/;
    return !emailPattern.test(email);
}

function checkStringAndFocus(obj, msg, validationFn) {
    let str = obj.value;
    let errorFieldName = "e_" + obj.name.substr(2);
    if (validationFn(str)) {
        document.getElementById(errorFieldName).innerHTML = msg;
        obj.focus();
        return false;
    } else {
        document.getElementById(errorFieldName).innerHTML = "";
        return true
    }
}


function validate(form) {
    if (
        checkStringAndFocus(form.elements["f_imie"], "Podaj imię!", isWhiteSpaceOrEmpty) &&
        checkStringAndFocus(form.elements["f_nazwisko"], "Podaj nazwisko!", isWhiteSpaceOrEmpty) &&
        checkStringAndFocus(form.elements["f_email"], "Podaj właściwy e-mail!", isEmailInvalid) &&
        checkStringAndFocus(form.elements["f_kod"], "Podaj kod pocztowy!", isWhiteSpaceOrEmpty) &&
        checkStringAndFocus(form.elements["f_ulica"], "Podaj ulicę!", isWhiteSpaceOrEmpty) &&
        checkStringAndFocus(form.elements["f_miasto"], "Podaj miasto!", isWhiteSpaceOrEmpty)
    ) {
        console.log("Wysyłam formularz");
        return true;
    } else {
        return false;
    }
}

function showElement(elementId) {
    document.getElementById(elementId).style.visibility = 'visible';
    console.log("kliknieto show")
}

function hideElement(elementId) {
    document.getElementById(elementId).style.visibility = 'hidden';
    console.log("kliknieto hide")
}

function alterRows(i, e) {
    if (e) {
        if (i % 2 == 1) {
            e.setAttribute("style", "background-color: Aqua;");
        }
        e = e.nextSibling;
        while (e && e.nodeType != 1) {
            e = e.nextSibling;
        }
        alterRows(++i, e);
    }
}

function nextNode(e) {
    while (e && e.nodeType != 1) {
        e = e.nextSibling;
    }
    return e;
}

function prevNode(e) {
    while (e && e.nodeType != 1) {
        e = e.previousSibling;
    }
    return e;
}

function swapRows(b) {
    let tab = prevNode(b.previousSibling);
    let tBody = nextNode(tab.firstChild);
    let lastNode = prevNode(tBody.lastChild);
    tBody.removeChild(lastNode);
    let firstNode = nextNode(tBody.firstChild);
    tBody.insertBefore(lastNode, firstNode);
}

function cnt(form, msg, maxSize) {
    if (form.value.length > maxSize)
    form.value = form.value.substring(0, maxSize);
    else
    msg.innerHTML = maxSize - form.value.length;
    }

    