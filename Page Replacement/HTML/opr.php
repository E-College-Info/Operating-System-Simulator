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
    <title>Optimal Page Replacement</title>
</head>

<body>

    <div class="heading">
        <h1>Optimal Page Replacement</h1>
    </div>

    <div class="cointainer">
        <h6>Definition</h6>
            <ul>
                <li>If new page is already present, it is used.</li>
                <li>If new page is not present and there exists a page that is never referenced in future, then it is replaced with the new page.</li>
                <li>If no such page exists, replace the page that is referenced farthest in future with new page.</li>
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
                <li>If all the frames allocated to the process are occupied, replace the page which is referenced after longest time in future with the requested page.</li>
            </ul>
        </ul>
            </ul>
        </ul>
    </div>

    <div class="cointainer">
        <h6>Advantages</h6>
        <ul>
            <li>If new page is already present, it is used.</li>
            <li>Using this algorithm guarantees the lowest possible page-fault rate for a given number of frames.</li>
            <li>It will never suffer from Belady's anomaly.</li>
        </ul>
    </div>
    
    <div class="cointainer">
        <h6>Disadvantages</h6>
        <ul>
            <li>It is perfect, but not possible practically as the operating system cannot know future requests.</li>
            <li>Error handling is difficult.</li>
        </ul>
    </div>

    <div class="cointainer">
        <h6>References</h6>
        <ul>
            <li><a href="https://www.geeksforgeeks.org/advantages-and-disadvantages-of-various-page-replacement-algorithms/" target="_blank">Geeks For Geeks</a></li>
            <li><a href="https://www.youtube.com/watch?v=DXU7SqsYDvg&feature=youtu.be" target="_blank">Jenny's Lecture</a></li>
            <li><a href="https://en.wikipedia.org/wiki/Page_replacement_algorithm#The_theoretically_optimal_page_replacement_algorithm" target="_blank">Wikipedia</a></li>
        </ul>
    </div>

    <div class="cointainer">
        <h6>Inputs</h6>
        <form action="../PHP/opr.php" method="POST">
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