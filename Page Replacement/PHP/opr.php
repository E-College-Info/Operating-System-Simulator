<?php
    //function to check if a key is present in the array
    session_start();
    function search($key, $arr)
    {
        foreach($arr as $i)
        {
            if($i == $key)
                return true;
        }
        return false;
    }
    //Function to predict the page to be replaced
    function predict($page, $arr, $pn, $index)
    {
        $res = -1;
        $farthest = $index;
        $i = 0;
        for($i = 0; $i < sizeof($arr); $i++)
        {
            $j = 0;
            for($j = $index; $j < $pn; $j++)
            {
                if($arr[$i] == $page[$j])
                {
                    if($j > $farthest)
                    {
                        $farthest = $j;
                        $res = $i;
                    }
                    break;
                }
            } 
            if($j == $pn)
                return $i;
        }
        if($res == -1)
            return 0;
        else
            return $res;
    }
    //The function to implement Optimal Page Replecement Algorithm
    function OptimalHit($page, $pn, $fn, $hit, $faults, $fr, $status, $table)
    {
        for($i = 0; $i < $pn; $i++)
        {
            //if page is already present.
            $table->push(new \Ds\Vector());
            $table[$i]->push($page[$i]);
            //If page is already present, use it.
            if(search($page[$i], $fr))
            {
                $hit++;
                $status = 1;
                $status = "Hit";
            }
            //if page is not present, check if there is space left, if yes add directly
            else if(sizeof($fr) < $fn)
            {
                $fr->push($page[$i]);
                $status = "Miss";
                $faults++;
            }
            //if space is not there, use predict to find the page to be replaced and replce it
            else
            {
                $j = predict($page, $fr, $pn, $i + 1);
                $fr[$j] = $page[$i];
                $status = "Miss";
                $faults++;
            }
            //To show the frames currently present
            $table[$i]->push($status);
            for($k = 0; $k < $fn ; $k++)
            {
                if($k < sizeof($fr))
                {
                    $table[$i]->push($fr[$k]);
                }
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

    $hit = 0; //To keep track of page hits
    $faults = 0; //To keep track of page faults
    $fr = new \Ds\Vector(); //To keep track of rames currently present in MM
    $status = 0; //To keep track of current status of request ie hit or miss
    $table = new \Ds\Vector(); //To keep the page frames after each page replacement

    //Call the Algorithm implementation funtion
    OptimalHit($arr, $size, $input2, $hit, $faults, $fr, $status, $table);
    $_SESSION['table'] = $table;
    header("location: ../HTML/opr.php");
?>