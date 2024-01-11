<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Buton ile Div Değiştirme</title>
    <style>
        #div1 {
            display: block;
        }

        #div2 {
            display: none;
        }
    </style>
</head>
<body>
    <button onclick="degistirDiv()">Değiştir</button>

    <div id="div1">
        <!-- Div 1 İçeriği -->
        <p>Div 1 İçeriği</p>
    </div>

    <div id="div2">
        <!-- Div 2 İçeriği -->
        <p>Div 2 İçeriği</p>
    </div>

    <script src="script.js"></script>
    <script>
    function degistirDiv() {
    var div1 = document.getElementById('div1');
    var div2 = document.getElementById('div2');

    if (div1.style.display !== 'none') {
        div1.style.display = 'none';
        div2.style.display = 'block';
    } else {
        div1.style.display = 'block';
        div2.style.display = 'none';
    }
}
</script>

</body>
</html>
