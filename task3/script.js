const sumInput = document.querySelector("#sum");
const billsInput = document.querySelector("#bills");
const submitButton = document.querySelector("#submit");
const answerWindow = document.querySelector("#answerWindow");
const errorsMessages = document.querySelectorAll(".error");

sumInput.addEventListener("blur", checkSumInput);
billsInput.addEventListener("blur", checkBillsInput);

submitButton.addEventListener("click", e => {
    e.preventDefault();

    let isValid = checkBillsInput() && checkSumInput();
    let formData = new FormData();
    formData.append("bills", billsInput.value);
    formData.append("sum", sumInput.value);


    if (isValid) {
       fetch("server.php", {
            method: "POST",
            body: formData
        }).then(response => {  
            return response.text();
        }).then(obj => {
            renderResult(obj);
        })
        .catch(err => {
            console.log(err);
        });
    }
})

function checkSumInput(){
    let value = sumInput.value;
    const errorMessage = errorsMessages[1];

    if (isNaN(value)){
        errorMessage.textContent = "Введите пожалуйста число";
        return false;
    } else {
        errorMessage.textContent = "";
        return true;
    }
}

function checkBillsInput(){
    let value = billsInput.value;
    const regexp = /^(\d+,\s)*\d*$/;
    const errorMessage = errorsMessages[0];

    let correct = regexp.test(value);
    if (correct) {
        errorMessage.textContent = "";
        return true;
    } else {
        errorMessage.textContent = "Введите номинал через запятые (пример 15, 20, 30)";
        return false;
    }
}

function renderResult(jsonResponse){
    const response = JSON.parse(jsonResponse);

    if (response.isCorrectSum) {
        renderTable(response);
    } else {
        renderException(response);
    }
}

function renderTable(responce){
    const header = `<table>
    <tr>
        <th>Номинал</th>
        <th>Количество</th>
    </tr>`;
    let body = "";
    const footer = `</table>`;

    for(key in responce) {
        if (key !== "isCorrectSum") {
            body += `<tr> <td>${key}</td> <td>${responce[key]}</td> </tr>`;
        }
    }

    answerWindow.innerHTML = header + body + footer;
}

function renderException(responce){
    answerWindow.innerHTML = `
    <div class="incorrectSum">
    <p>Неверная сумма. Выберите <span>${responce.first}</span> или 
    <span>${responce.second}</span>.</p>
</div>`
}

