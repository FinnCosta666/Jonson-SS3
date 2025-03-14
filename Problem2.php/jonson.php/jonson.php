<style type="text/css">
body {
    background-color:rgb(22, 234, 230);
}
</style>
<body>
        <center>
    <h1>Calculate Sum of Squares and Cubes</h1>

    <form method="POST">
        <label for="limit">Enter the Upper Limit:</label>
        <input type="number" id="limit" name="limit" required>
        <button type="submit">Submit</button>
    </form>
    

    <?php
        if ($_SERVER["REQUEST_METHOD"] == "POST") { 
            
            $n = $_POST["limit"];
        if ($n > 0) 
            $squares = 0;
            $cubes = 0;

            
            $i = 1;
            for ($i = 1; $i <= $n;  $i++) {
                $squares += $i * $i;
                $cubes +=  $i * $i * $i;
            }
            echo "<divc class='result'>";
            echo "<h2>The sum of Squares from 1 to $n is $squares.</h2>";
            echo "<h2>The sum of Cubes from 1 to $n is $cubes.</h2>";
        }
        ?>

</body>
x
