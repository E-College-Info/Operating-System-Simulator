<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="Common/CSS/index.css">
    <title>Home</title>
</head>

<body>

    <header>
        <nav style="color: white;">
            <ul class="nav_links">
                <li><a href="">Home</a></li>
                <div class="dropdown">
                    <button class="dropbtn">Algorithms</button>
                    <div class="dropdown-content">
                        <a href="Page Replacement/HTML/fifo.php">First In First Out</a>
                        <a href="Page Replacement/HTML/lru.php">Least Recently Used</a>
                        <a href="Page Replacement/HTML/opr.php">Optimal Page Replacement</a>
                        <a href="Page Replacement/HTML/lfu.php">Least Frequently Used</a>
                    </div>
                </div>
                <li><a href="Common/HTML/aboutus.php">About Us</a></li>
                <li><a href="Common/HTML/feedback.php">Feedback</a></li>
            </ul>
        </nav>
    </header>

    <div class="information">

        <div class="sub-information">
            <h1>What is Paging?</h1>
            <p>
                <ul>
                    <li>Paging is a memory management technique which allows usage of Virtual Memory and eliminates need of continuous memory allocation. Thus, we can have non-contiguous memory allocation in the Physical Address Space (Main Memory).</li>
                    <li>This allows the Operating System to have a higher degree of multiprogramming and the restriction on maximum size of process is eliminated.</li>
                    <li>In paging, the Virtual Memory is divided in parts of a fixed size called 'Pages'. Similarly, the Main Memory is divided in parts of fixed size(same as that of a page) called 'Frames'.</li>
                    <li>The pages in the Secondary Memory corresponding to a process which is being executed in Main Memory are to be fetched into the Main Memory when required. This is called 'Demand Paging'.</li>
                </ul>
            </p>
        </div>
        
        <div class="sub-information">
            <h1>Why Page Replacement?</h1>
            <p>
                <ul>
                    <li>There is a limit for the number of frames allocated to a process in the Main Memory. Therefore, all the pages of the process cannot be brought into the Main Memory.</li>
                    <li>Thus, we bring only those pages which not present in the Main Memory and are being called by the CPU while execution of the process into the Main Memory.</li>
                    <li>In case, all the frames allocated to a process are already occupied and requirement of more pages comes up which are not present in the Main Memory,a page fault occurs and we need to REPLACE a PAGE present in the Main Memory by the required page. Which page is to be replaced for the upcoming page is to be decided using 'Page Replacement Algorithms'.</li>
                </ul>
            </p>
        </div>

        <div class="sub-information">
            <h1>Page Replacement Algorithms</h1>
            <p>
                <ul>
                    <li>In order to find the page to be replaced, there are many page replacement algorithms. (Click on the Algorithms to know more)
                        <br>Some of them are:</li>
                </ul>
                <ol style="margin-left: 5rem; margin-bottom: 2rem;">
                    <li><u><a href="Page Replacement/HTML/fifo.php">First In First Out</a></u></li>
                    <li><u><a href="Page Replacement/HTML/lru.php">Least Recently Used</a></u></li>
                    <li><u><a href="Page Replacement/HTML/opr.php">Optimal Page Replacement</a></u></li>
                    <li><u><a href="Page Replacement/HTML/lfu.php">Least Frequently Used</a></u></li>
                </ol>
            </p>
        </div>

    </div>
</body>
</html>