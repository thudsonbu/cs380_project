<?php
    //test user input to help prevent HTML injection
    // returns true if injection found

    function testHTMLInj($data){
        $original = $data;
        
        /*convert 5 predefined characters into HTML values.		
            They are > (&gt;), < (%lt;), " (&quot;), ' (&#039;), & (&amp;)   */			
        $data = htmlspecialchars($data);

        //check for possible html injection
        return !($data === $original);
    }