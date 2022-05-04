<?php
    session_start();
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../CSS/algorithm.css">
    <title>Least Recently Used</title>
</head>

<body>

    <div class="heading">
        <h1 style="color: rgb(18, 38, 58, 0.9);">Least Recently Used</h1>
    </div>

    <div class="cointainer">
        <h6>Definition</h6>
        <ul>
            <li>The LRU stands for the Least Recently Used.</li>
            <li>It keeps track of page usage in the memory over a short period of time.</li>
            <li>It works on the concept that pages that have been highly used in the past are likely to be significantly used again in the future.</li>
            <li>It removes the page that has not been utilized in the memory for the longest time.</li>
            <li>LRU is the most widely used algorithm because it provides fewer page faults than the other methods.</li>
        </ul>
    </div>

    <div class="cointainer">
        <h6>Algorithm</h6>
        <p style="color: #FFFCC9; font-size: 1.2rem; font-family: 'Roboto Mono', monospace;">When a page request comes up:</p>
        <ul class="tab">
            <li>If page already exists in the main memory, we use it.</li>
            <li>If page doesn't exist in main memory and</li>
            <ul class="tab">
                <li>If all frames allocated to the process are not yet occupied, bring the required page into main memory and add it into the page table.</li>
                <li>If all the frames allocated to the process are occupied, replace the page last referenced in past with the requested page.</li>
            </ul>
        </ul>
    </div>
    
    <div class="cointainer">
        <h6>Advantages</h6>
        <ul>
            <li>LRU doesn't suffer from Belady's Anomaly.</li>
            <li>The page in the main memory that hasn't been used in the longest will be chosen for replacement.</li>
            <li>It gives fewer page faults than any other page replacement algorithm. So, LRU is the most commonly utilized method.</li>
            <li>It is a very effective algorithm.</li>
            <li>It helps in the full analysis.</li>
        </ul>
    </div>

    <div class="cointainer">
        <h6>Disadvantages</h6>
        <ul>
            <li>It isn't to implement because it requires hardware assistance.</li>
            <li>It is expensive and more complex.</li>
            <li>It needs an additional data structure.</li>
        </ul>
    </div>

    <div class="cointainer">
        <h6>References</h6>
        <ul>
            <li><a href="https://en.wikipedia.org/wiki/Least_frequently_used#:~:text=Least%20Frequently%20Used%20(LFU)%20is,block%20is%20referenced%20in%20memory." target="_blank">Wikipedia</a></li>
            <li><a href="https://www.javatpoint.com/lru-vs-lfu-page-replacement-algorithm" target="_blank">JavaTPoint</a></li>
        </ul>
    </div>

    <div class="cointainer">
        <h6>Inputs</h6>
        <form action="../PHP/lru.php" method="POST">
            <span>Reference String</span>
            <input type="text" name="refstring" required>
            <span>Number Of Frames</span>
            <input type="text" name="noFrames" required>
            <input type="submit" value="Submit" class="button">
        </form>
    </div>

    <div class="cointainer">
        <h6>Output</h6>
        <table border = "1">
            <tr>
                <th>Requested Page</th>
                <th>Page Hit/Miss</th>
                <th>Frames in Page Table</th>
            </tr>
        <?php
            if(isset($_SESSION['table']))
            {
                $page = $_SESSION['table'];
                for($i = 0; $i < sizeof($page)-1; $i++)
                {
                    echo "<tr>";
                    for($j = 0; $j < 2; $j++)
                    {
                        $solution = $page[$i][$j];
                        echo "<td>$solution</td>";
                    }
                    echo "<td>";
                    for($j = 2; $j < sizeof($page[$i]); $j++)
                    {
                        $solution = $page[$i][$j];
                        echo " $solution ";
                    }
                    echo "</td>";
                    echo "</tr>";
                }
        ?>
        </table>
        <div class="output">
        <?php
            echo "<br>";
                $faults = $page[sizeof($page)-1][0];
                $pn = $page[sizeof($page)-1][1];
                echo "Total number of page faults = ";
                echo "$faults";
                echo "<br>";
                echo "Page fault rate = ";
                $pfr = intval($faults)/intval($pn);
                echo $pfr;
                }
                unset($_SESSION['table']);
            ?>
        </div>
    </div>

</body>
</html>