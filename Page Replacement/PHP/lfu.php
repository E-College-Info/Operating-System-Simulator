<?php
    session_start();
    //To find index of a key in a given array
    function search($key, $arr)
    {
        for($i = 0; $i < sizeof($arr); $i++)
        {
            if($arr[$i][0] == $key)
            {
                return $i;
            }
        }
        return -1;
    }
    //To increment count of a page in the list
    function incCount($que, $pg)
    {
        for($i = 0; $i < sizeof($que); $i++)
        {
            if($que[$i][0] == $pg)
            {
                $que[$i][1]++;
                break;
            }
        }
    }
    //To find index of page to be replaced using LFU approach
    function findReplacement($fr)
    {
        $min = $fr[0][1]; $ind = 0;
        for($i = 0; $i < sizeof($fr); $i++)
        {
            if($fr[$i][1] < $min)
            {
                $min = $fr[$i][1];
                $ind = $i;
            }
        }
        return $ind;
    }
    //LFU Implementation
    function LfuHit($page, $pn, $fn, $hit, $faults, $fr, $status, $table)
    {
        for($i = 0; $i < $pn; $i++)
        {
            //if page is already present.
            //echo "On request of $page[$i]: ";
            $table->push(new \Ds\Vector());
            $table[$i]->push($page[$i]);
            //if page is already present.
            if(search($page[$i], $fr) != -1)
            {
                $hit++;
                $status = "Hit";
                incCount($fr, $page[$i]);
            }
            //if page is not present, check if there is space left, if yes add directly
            else if(sizeof($fr) < $fn)
            {
                $vec = new \Ds\Vector();
                $vec->push($page[$i]);
                $vec->push(1);
                $fr->push($vec);
                $status = "Miss";
                $faults++;
            }
            //if space is not there, use predict to find the page to be replaced and replace it
            else
            {
                $fr->remove(findReplacement($fr));
                $vec = new \Ds\Vector();
                $vec->push($page[$i]);
                $vec->push(1);
                $fr->push($vec);
                $status = "Miss";
                $faults++;
            }
            //Push all the frame sets in table
            $table[$i]->push($status);
            for($k = 0; $k < $fn; $k++)
            {
                if($k < sizeof($fr))
                    $table[$i]->push($fr[$k][0]);
                else
                    $table[$i]->push(" ");
            }
        }
        $table->push(new \Ds\Vector());
        $table[$pn]->push($faults);
        $table[$pn]->push($pn);
    }

    //Driver Code

    //Taking input from the input tag with name 'refstring' using POST method
    $input1 = $_POST['refstring'];
    $trimmedInput = trim($input1);
    $arr = explode(" ",$trimmedInput);   
    //Taking input from the textbox with name 'noFrames' using POST method
    $input2 = $_POST['noFrames'];
    $size = sizeof($arr);

    $hit = 0; //To keep track of number of page hits
    $faults = 0; //To keep track of number of page faults
    $table = new \Ds\Vector(); //To record the page frames after each page request
    $fr = new \Ds\Vector(); //To keep current page frames in PT

    //Call the Algorithm implementation funtion
    
    $status = "Miss"; //To keep track of request status i.e. Page hit or miss
    LfuHit($arr, $size, $input2, $hit, $faults, $fr, $status, $table);
    $_SESSION['table'] = $table;
    header("location: ../HTML/lfu.php");
?>