<!DOCTYPE html>
<?php
require "db.php";

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    try {
        $variety = $_POST['variety'];
        $origin = $_POST['origin'];
        $roastDegree = $_POST['roastDegree'];
        $flavorProfile = $_POST['flavorProfile'];
        $aromaProfile = $_POST['aromaProfile'];
        $urunId = $_POST['urunId'];

        $updateQuery = "UPDATE urun SET 
                        Cesit = :variety, 
                        Koken = :origin, 
                        Kavurma_Derecesi = :roastDegree, 
                        Lezzet_Profili = :flavorProfile, 
                        Aroma_Profili = :aromaProfile
                        WHERE ID = :urunId";

        $stmt = $DBConnection->prepare($updateQuery);
        $stmt->bindParam(':variety', $variety);
        $stmt->bindParam(':origin', $origin);
        $stmt->bindParam(':roastDegree', $roastDegree);
        $stmt->bindParam(':flavorProfile', $flavorProfile);
        $stmt->bindParam(':aromaProfile', $aromaProfile);
        $stmt->bindParam(':urunId', $urunId);

        if ($stmt->execute()) {
            echo "Ürün başarıyla güncellendi.";
        } else {
            echo "Ürün güncelleme hatası: " . $stmt->errorInfo()[2];
        }
    } catch (PDOException $e) {
        echo "Database error: " . $e->getMessage();
    }
}
?>
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ürün Düzenleme</title>
</head>
<body>
    <div>
        <h2>Ürün Düzenleme Sayfası</h2>
        
        <label for="variety">Çeşit:</label>
        <input type="text" id="variety" required>
        
        <label for="origin">Köken:</label>
        <input type="text" id="origin" required>

        <label for="roastDegree">Kavurma Derecesi:</label>
        <input type="text" id="roastDegree" required>

        <label for="flavorProfile">Lezzet Profili:</label>
        <input type="text" id="flavorProfile" required>

        <label for="aromaProfile">Aroma Profili:</label>
        <input type="text" id="aromaProfile" required>
        
        <button onclick="saveProduct()">Kaydet</button>

        <div id="result"></div>
        <?php
        if (isset($_GET['ID'])) {
            try {
                $urunId = $_GET['ID'];
                $selectQuery = "SELECT * FROM urun WHERE ID = :urunId";
                $stmt = $DBConnection->prepare($selectQuery);
                $stmt->bindParam(':urunId', $urunId);
                $stmt->execute();
                $product = $stmt->fetch(PDO::FETCH_ASSOC);

                if ($product) {
        ?>
                    <form method="POST" action="">
                        <input type="hidden" name="urunId" value="<?php echo $product['ID']; ?>">

                        <!-- Form inputs remain unchanged -->

                        <button type="submit">Kaydet</button>
                    </form>
        <?php
                } else {
                    echo "Ürün bulunamadı.";
                }
            } catch (PDOException $e) {
                echo "Database error: " . $e->getMessage();
            }
        } else {
            echo "Ürün ID bilgisi eksik.";
        }
        ?>
    </div>

    <script>
        function saveProduct() {
            var variety = document.getElementById("variety").value;
            var origin = document.getElementById("origin").value;
            var roastDegree = document.getElementById("roastDegree").value;
            var flavorProfile = document.getElementById("flavorProfile").value;
            var aromaProfile = document.getElementById("aromaProfile").value;

            // Burada, gerçek bir veritabanına veya depolama mekanizmasına kaydetme işlemini gerçekleştirmeniz gerekir.
            // Bu örnek sadece kullanıcının girdilerini ekrana yazdırmaktadır.

            var resultDiv = document.getElementById("result");
            resultDiv.innerHTML = "Ürün Bilgileri Kaydedildi:<br>Çeşit: " + variety + "<br>Köken: " + origin +
                "<br>Kavurma Derecesi: " + roastDegree + "<br>Lezzet Profili: " + flavorProfile + 
                "<br>Aroma Profili: " + aromaProfile;
        }
    </script>
</body>
</html>