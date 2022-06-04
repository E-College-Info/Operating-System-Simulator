<?php
    session_start();
    function search($key, $arr)
    {
        for($i = 0; $i < sizeof($arr); $i++)
        {
            if($arr[$i] == $key)
                return $i;
        }
        return -1;
    }
    function LruHit($page, $pn, $fn, $hit, $faults, $order, $status, $table)
    {
        for($i = 0; $i < $pn; $i++)
        {
            //if page is already present.
            $table->push(new \Ds\Vector());
            $table[$i]->push($page[$i]);
            if(search($page[$i], $order) != -1)
            {
                $order->remove(search($page[$i], $order));
                $order->push($page[$i]);
                $hit = $hit + 1;
                $status = "Hit";
            }
            //if page is not present, check if there is space left, if yes add directly
            else if(sizeof($order) < $fn)
            {
                $order->push($page[$i]);
                $faults = $faults + 1;
                $status = "Miss";
            }
            //if space is not there, use predict to find the page to be replaced and replace it
            else
            {
                $order->shift();
                $order->push($page[$i]);
                $faults = $faults + 1;
                $status = "Miss";
            }
            $table[$i]->push($status);
            //To show the frames currently present
            for($k = 0; $k < $fn ; $k++)
            {
                if($k < sizeof($order))
                    $table[$i]->push($order[$k]);
                else
                    $table[$i]->push(" ");
            }
        }
        $table->push(new \Ds\Vector());
        $table[$pn]->push($faults);
        $table[$pn]->push($pn);
    }

    //Driver Code
    $hit = 0; //To keep track of number of page hits
    $faults = 0; //To keep track of number of page faults
    $order = new \Ds\Vector(); //To store order od pages
    $status = "Miss";
    $table = new \Ds\Vector(); //To keep the page frames after each page replacement

    //Taking input from the input tag with name 'refstring' using POST method
    $input1 = $_POST['refstring'];
    $trimmedInput = trim($input1);
    $arr = explode(" ",$trimmedInput);  
    //Taking input from the textbox with name 'noFrames' using POST method
    $input2 = $_POST['noFrames'];
    $size = sizeof($arr);
    
    //Call the Algorithm implementation funtion
    LruHit($arr, $size, $input2, $hit, $faults, $order, $status, $table);
    $_SESSION['table'] = $table;
    header("location: ../HTML/lru.php");
?>