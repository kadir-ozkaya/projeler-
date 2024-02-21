
<?php






class database {
    private static $pdo;

    public static function baglan() {
        $host = 'localhost';
        $dbname = 'database'; 
        $user = 'root';
        $password = '';

        try {
            self::$pdo = new PDO("mysql:host=$host;dbname=$dbname;charset=utf8", $user, $password);
            self::$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            echo "Veritabanına bağlantı kuruldu!<br>";
        } catch (PDOException $e) {
            die("Bağlantı kurulamadı. Bağlantı hatası: " . $e->getMessage());
        }
    }

    public static function kullanici() {
        $query = "SELECT * FROM kullanici";

        $stmt = self::$pdo->query($query);
        $users = $stmt->fetchAll(PDO::FETCH_ASSOC);

        return $users;
    }

    public static function kitaplar() {
        $query = "SELECT * FROM kitaplar";

        $stmt = self::$pdo->query($query);
        $kitaplar = $stmt->fetchAll(PDO::FETCH_ASSOC);

        return $kitaplar;
    }
}

class kullanici {
    public $id;
    public $ad;
    public $email;

    public function __construct($id, $ad, $email) {
        $this->id = $id;
        $this->ad = $ad;
        $this->email = $email;
    }
}

class kitap{
    public $id;
    public $kitapAdi;
    public $yazar;
    public $user_id;

    public function __construct($id, $kitapAdi, $yazar, $user_id) {
        $this->id = $id;
        $this->kitapAdi = $kitapAdi;
        $this->yazar = $yazar;
        $this->user_id = $user_id;
    }
}

database::baglan();

$kullanicilarData = database::baglan();
$kitaplarData = database::baglan();


$kullanicilar = [];
foreach ($kullanicilarData as $kullaniciData) {
    $kullanici = new kullanici($kullaniciData['id'], $kullaniciData['ad'], $kullaniciData['email']);
    $kullanicilar[] = $kullanicilar;
}

$kitaplar = [];    
foreach ($kitaplarData as $kitapData) {
    $kitap = new kitap($kitapData['id'], $kitapData['kitapAdi'], $kitapData['yazar'], $kitapData['user_id']);
    $kitaplar[] = $kitap;
}

echo "Kullanıcılar:<br>";
foreach ($kullanicilar as $kullanici) {
    echo "ID: {$kullanici->id}, Ad: {$kullanici->ad}, Email: {$kullanici->email}<br>";
}

echo "<br>Kitaplar:<br>";
foreach ($kitaplar as $kitap) {
    echo "ID: {$kitap->id}, Kitap Adı: {$kitap->kitapAdi}, Yazar: {$kitap->yazar}, Kullanıcı ID: {$kitap->user_id}<br>";
}





?>