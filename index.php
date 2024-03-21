<?php

include('main.php');
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="styles.css">
    <title>News Website</title>
</head>
<style>
    body {
        font-family: 'Arial', sans-serif;
        margin: 0;
        padding: 0;
        box-sizing: border-box;
    }

    header {
        background-color: #333;
        color: #fff;
        text-align: center;
        padding: 15px;
    }

    form {
        margin-top: 10px;
    }

    section {
        display: flex;
        flex-wrap: wrap;
        justify-content: space-around;
        padding: 20px;
    }

    .news-block {
        width: 30%;
        margin: 10px 0;
        background-color: #f4f4f4;
        padding: 10px;
        box-shadow: 0 0 5px rgba(0, 0, 0, 0.1);
    }

    img {
        max-width: 100%;
        height: auto;
    }


</style>

<body>
<header>
    <h1><span id="currentDate"><?php echo $year?></span></h1>
    <form id="emailForm" method="post">
        <label for="emailInput">Subscribe to our newsletter:</label>
        <input type="email" id="emailInput" name="email" placeholder="Enter your email">
        <button type="submit">Subscribe</button>
    </form>
    <h1 style="color: green"><?php echo $mes;  ?></h1>
</header>

<section id="newsSection">
    <?php
    while ($row = $result->fetch_assoc()) {
        $News = new News($row['title'], $row['descr'], $row['image']);
        $News->displayDetails();
    }
    ?>

</section>
<footer>
    <a class="weatherwidget-io" href="https://forecast7.com/uk/50d6226d25/rivne/" data-label_1="RIVNE" data-label_2="WEATHER" data-theme="original" >RIVNE WEATHER</a>
    <script>
        !function(d,s,id){var js,fjs=d.getElementsByTagName(s)[0];if(!d.getElementById(id)){js=d.createElement(s);js.id=id;js.src='https://weatherwidget.io/js/widget.min.js';fjs.parentNode.insertBefore(js,fjs);}}(document,'script','weatherwidget-io-js');
    </script>
</footer>


</body>

</html>
