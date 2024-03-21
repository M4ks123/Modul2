<?php
$year = date("j F Y");

class News {
    public $title;
    public $description;
    public $image;

    public function __construct($title, $description,$image) {
        $this->title = $title;
        $this->description = $description;
        $this->image = $image;

    }

    public function displayDetails() {

        echo '
          <div class="news-block">
          <img src="' . $this->image . '" alt="News Image 1">
        <h2>' . $this->title . '</h2>
        <p>' . $this->description . '</p>
        
    </div>
         ';
    }
}
require_once('DB.php');
$conn=connect();


$query = "SELECT * FROM News";
$stmt = $conn->prepare($query);
$stmt->execute();

$result = $stmt->get_result();

$stmt->close();
close($conn);

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $email = $_POST["email"];

    $conn = connect();
    $sql = "INSERT INTO email (email) VALUES ('$email')";

    if ($conn->query($sql) === TRUE) {
       $mes= 'Subscription successful!';
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }

    close($conn);
}
