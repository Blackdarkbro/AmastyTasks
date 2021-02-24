<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="styles.css">
    <title>Банкомат</title>
</head>
<body>
    <div class="cashmachine">
        <h1>Банкомат</h1>
        <form action="">
            <div class="inputField">
                <label for="bills">Номинал в наличии</label><input type="text" value="5, 20, 50, 100" id="bills">
                <span class="error"></span>
            </div>
            <div class="inputField">
                <label for="sum">Ваша сумма</label><input type="text" value="2021" id="sum">
                <span class="error"></span>
            </div>
            <button id="submit">Отправить</button>
        </form>
        <section>
            <span>Ответ:</span>
            <div id="answerWindow">

            </div>
        </section>
    </div>
 
    <script src="script.js"></script>
</body>
</html>