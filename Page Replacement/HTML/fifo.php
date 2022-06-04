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
    <title>First In First Out</title>
</head>

<body>

    <div class="heading">
        <h1>First In First Out</h1>
    </div>

    <div class="cointainer">
        <h6>Definition</h6>
        <ul>
            <li>In this algorithm, the OS maintains a queue that keeps track of all the pages in memory, with the oldest page at the front and the most recent page at the back.</li>
            <li>When there is a need for page replacement, the FIFO algorithm, swaps out the page at the front of the queue, that is the page which has been in the memory for the longest time.</li>
        </ul>
    </div>

    <div class="cointainer">
        <h6>Algorithm</h6>
        <p style="color: #FFFCC9; font-size: 1.2rem; font-family: 'Roboto Mono', monospace;">When a page request comes up:</p>
        <ul class="tab">
            <li>If page already exists in the main memory, we use it.</li>
            <li>If page doesn't exist in main memory and</li>
            <ul class="tab">
                <li>If all the frames allocated to the process are not yet occupied, bring the required page into main memory and add it into the page table.</li>
                <li>If all the frames allocated to the process are occupied, replace the first added(oldest) page in the page table with the requested page.</li>
            </ul>
        </ul>
    </div>

    <div class="cointainer">
        <h6>Advantages</h6>
        <ul>
            <li>Simple and easy to implement.</li>
            <li>Low overhead.</li>
        </ul>
    </div>

    <div class="cointainer">
        <h6>Disadvantages</h6>
        <ul>
            <li>Poor performance.</li>
            <li>Doesn't consider the frequency of use or last used time, simply replaces the oldest page.</li>
            <li>When we increase the number of frames while using FIFO, we are giving more memory to processes. So, page faults should decrease but here the page faults are increasing. This problem is known as Belady's Anomaly.</li>
        </ul>
    </div>

    <div class="cointainer">
        <h6>References</h6>
        <ul>
            <li><a href="https://www.geeksforgeeks.org/advantages-and-disadvantages-of-various-page-replacement-algorithms/" target="_blank">Geeks For Geeks</a></li>
            <li><a href="https://afteracademy.com/blog/what-are-the-page-replacement-algorithms" target="_blank">After Academy</a></li>
        </ul>
    </div>

    <div class="cointainer">
        <h6>Inputs</h6>
        <form action="../PHP/fifo.php" method="POST">
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