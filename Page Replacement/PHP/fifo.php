<?php
    session_start();
    //To find a key index in an array
    function search($key, $arr)
    {
        for($i = 0; $i < sizeof($arr); $i++)
        {
            if($arr[$i] == $key)
            {
                return $i;
            }
        }
        return -1;
    }
    //FIFO implementation
    function FIFOHit($page, $pn, $fn, $hit, $faults, $fr, $que, $status, $table)
    {
        for($i = 0; $i < $pn; $i++)
        {
            $table->push(new \Ds\Vector());
            $table[$i]->push($page[$i]);
            //if page is already present.
            if(search($page[$i], $fr) != -1)
            {
                $hit++;
                $status = "Hit";
            }
            //if page is not present, check if there is space left, if yes add directly
            else if(sizeof($fr) < $fn)
            {
                $fr->push($page[$i]);
                $que->push($page[$i]);
                $status = "Miss";
                $faults++;
            }
            //if space is not there, use predict to find the page to be replaced and replce it
            else
            {
                $x = $que->peek();
                $que->pop();
                $que->push($page[$i]);
                $j = search($x, $fr);
                $fr[$j] = $page[$i];
                $status = "Miss";
                $faults++;
            }
            $table[$i]->push($status);
            for($k = 0; $k < $fn; $k++)
            {
                if($k < sizeof($fr))
                {
                    $table[$i]->push($fr[$k]);
                }
                else
                {
                    $table[$i]->push(" ");
                }
            }
        }
        $table->push(new \Ds\Vector());
        $table[$pn]->push($faults);
        $table[$pn]->push($pn);
    }
    $hit = 0; //To keep track of number of page hits
    $faults = 0; //To keep track of number of page faults
    $fr = new \Ds\Vector(); //To keep track of present frames
    $que = new \Ds\Queue(); //QUEUE for FIFO
    // $track = new \Ds\Vector();
    $status = "Miss"; //To keep track of request status ie hit or miss
    $table = new \Ds\Vector(); //To keep the page frames after each page replacement

    //Taking input from the input tag with name 'refstring' using POST method
    $input1 = $_POST['refstring'];
    $trimmedInput = trim($input1);
    $arr = explode(" ",$trimmedInput);   
    //Taking input from the textbox with name 'noFrames' using POST method
    $input2 = $_POST['noFrames'];
    $size = sizeof($arr);

    //Call the Algorithm implementation funtion
    FIFOHit($arr, $size, $input2, $hit, $faults, $fr, $que, $status, $table);
    $_SESSION['table'] = $table;
    header("location: ../HTML/fifo.php");
?>