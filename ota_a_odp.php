<?php
class QnA {
    private $pdo;

    public function __construct($host, $dbname, $user, $pass) {
        $this->pdo = new PDO("mysql:host=$host;dbname=$dbname;charset=utf8", $user, $pass);
        $this->pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    }

    public function nacitajOtazky() {
        $stmt = $this->pdo->query("SELECT otazka, odpoved FROM qna");
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public function pridajOtazku($otazka, $odpoved) {
        $stmt = $this->pdo->prepare("INSERT INTO qna (otazka, odpoved) VALUES (?, ?)");
        $stmt->execute([$otazka, $odpoved]);
    }
}
?>
