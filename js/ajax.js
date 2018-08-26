/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */


function loadResult(url, cbFunc) {
    let xhttp;

    xhttp = new XMLHttpRequest();
    xhttp.onreadystatechange = function () {
        if (this.readyState == 4 && this.status == 200) {
            cbFunc(this);
        }
    };

    xhttp.open("GET", url, true);
    xhttp.send();
}

// Item Session value setter
const changeSessionValue = (elementName) => {
    const curElement = document.getElementById(elementName);
    sessionStorage.setItem(elementName, curElement.value);
};

// Item listener
const listenItem = (elementIDForListen) => {
    const cur = document.getElementById(elementIDForListen);
    cur.addEventListener("change",
            function () {
                changeSessionValue(elementIDForListen);
            });
};

const listen = (elementIds = []) => {
    return elementIds.map((el) => listenItem(el));
}

const putValueFromSession = (fieldId) => {
    if (sessionStorage.getItem(fieldId)) {
        document.getElementById(fieldId).value = sessionStorage.getItem(fieldId);
        document.getElementById(fieldId).onchange();
    } else {
        return;
    }
};

// Answer callback

function getPrice(companyType, serviceType, toSelector = 'result') {
    return loadResult('req/ajax/getPrice.php?ct=' + companyType + '&st=' + serviceType, (xhttp) => {
        document.getElementById(toSelector).innerHTML = xhttp.responseText;
        //putValueFromSession('company');
        //putValueFromSession('service');
    });
}

function getPriceIfCompany(companyType) {
    const serviceValue = $('#st').val();
   return getPrice(companyType, serviceValue); 
};

function getPriceIfService(serviceType) {
    const companyValue = $('#ct').val();
   return getPrice(companyValue, serviceType); 
};

$(document).ready(function(){
  const serviceValue = $('#st').val(); 
  const companyValue = $('#ct').val();
  getPrice(companyValue, serviceValue);
})

//listen(['ct', 'st']);