<form method="post">
 <input type="number" name="number" placeholder="Enter an upper limit" required>
 <br>
 <button type="submit">Calculate</button>
 </form>   
 
 <?php
 if ($_SERVER["REQUEST_METHOD"] == "POST") {
 $n = intval($_POST['number']);
     if ($n > 0) {
         $sumSquares = 0;
                $sumCubes = 0;
                
                for ($i = 1; $i <= $n; $i++) {
                    $sumSquares += $i * $i;
                    $sumCubes += $i * $i * $i;
                }
                
                echo "<div class='result'>";
                echo "<p>The sum of Squares from 1 to $n is <strong>$sumSquares</strong>.</p>";
                echo "<p>The sum of Cubes from 1 to $n is <strong>$sumCubes</strong>.</p>";
                echo "</div>";
            } else {
                echo "<p style='color: red;'>Please enter a positive integer.</p>";
            }
        }
        ?>