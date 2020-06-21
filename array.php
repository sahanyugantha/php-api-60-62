<?php 


    $companies = array("Sri Lankan", "Emirates", "Cathey Pacific", "Jet Airways", "Etihad", "Quatar Airways");

    foreach($companies as $company){
        echo "Company - ".$company."<br/>";
    }

    //Associative Arrays​
    $user = array("name"=>"Shimar", "age"=>20, "married"=>false, "weight"=>60.5);

    echo "<br/><br/>";

    foreach($user as $key=>$value){
        echo $key." - ".$value."<br/>";
    }

    //Mulidimentional Associative Array
    $dashboard_data = array(
        array("company"=>"Sri Lankan", "no"=>"UL-301", "type"=>"Arrival",  "time"=>"22-03-2020 2200"),
        array("company"=>"Etihad", "no"=>"ET78", "type"=>"Depature", "time"=>"22-03-2020 2340"),
        array("company"=>"Sri Lankan", "no"=>"UL-634", "type"=>"Arrival", "time"=>"23-03-2020 0040"),
        array("company"=>"Quatar Airways", "no"=>"QT301", "type"=>"Depature", "time"=>"23-03-2020 0100"),
        array("company"=>"Spicejet", "no"=>"SJ309", "type"=>"Arrival", "time"=>"23-03-2020 0230")
    );

    echo "<br/><br/>";

    foreach($dashboard_data as $data){
        echo "Comapany - ".$data["company"]. " ";
        echo "Flight no  - ".$data["no"]." ";
        echo "Type  - ".$data["type"]." ";
        echo "Time - ".$data["time"]." ";
        echo "<br/>";
    }

?>