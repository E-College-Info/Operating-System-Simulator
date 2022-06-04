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
    <title>Least Frequently Used</title>
</head>

<body>

    <div class="heading">
        <h1 style="color: rgb(18, 38, 58, 0.9);">Least Frequently Used</h1>
    </div>

    <div class="cointainer">
        <h6>Definition</h6>
        <ul>
            <li>The LFU page replacement algorithm stands for the Least Frequently Used.</li>
            <li>It is also called as "Not Frequently Used" Page Replacement Algorithm</li>
            <li>In the LFU page replacement algorithm, the page with the least visits in a given period of time is removed.</li>
            <li>It replaces the least frequently used pages.</li>
            <li>If the frequency of pages remains constant, the page that comes first is replaced first.</li>
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
                <li>If all the frames allocated to the process are occupied, replace the page in the page table referenced least number of times with the requested page.</li>
                <li>If there exist multiple such pages, replace the oldest added page among them.</li>
            </ul>
        </ul>
    </div>

    <div class="cointainer">
        <h6>Advantages</h6>
        <ul>
            <li>Page fault of highly used page get decressed.</li>
            <li>Efficient when specific frame repeat.</li>
        </ul>
    </div>

    <div class="cointainer">
        <h6>Disadvantages</h6>
        <ul>
            <li>Counter of each frame are required to maintain the frequency of page.</li>
            <li>More memory is required to store counters of frame.</li>
        </ul>
    </div>

    <div class="cointainer">
        <h6>References</h6>
        <ul>
            <li><a href="https://en.wikipedia.org/wiki/Least_frequently_used" target="_blank">Wikipedia</a></li>
            <li><a href="https://www.slideshare.net/anirbanmitra9231/lfu" target="_blank">Slide Share</a></li>
            <li><a href="https://www.javatpoint.com/lru-vs-lfu-page-replacement-algorithm" target="_blank">JavaTPoint</a></li>
        </ul>
    </div>

    <div class="cointainer">
        <h6>Inputs</h6>
        <form action="../PHP/lfu.php" method="POST">
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
                $pfr = $faults/$pn;
                echo $pfr;
                }
                unset($_SESSION['table']);
            ?>
        </div>
    </div>

</body>
</html>