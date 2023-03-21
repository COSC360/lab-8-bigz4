<!DOCTYPE html>
<head>

</head>
<body>
    <?php
    $data = file("data.txt") or die("File not found");
    $data2 = array();
    foreach($data as $i){
        $temp = explode(',',$i,2);
        $temp2 = explode(',',$temp[1]);
        $data2[$temp[0]] = $temp2;

    }
    if($_SERVER["REQUEST_METHOD"] === "GET"){
        $firstname = $_GET["first-name"];
        $key = $_GET["key"];

        $keys = array_keys($data2);
        $users = array();
        foreach($data2 as $i){
            $users[] = $i[0];
        }
        
        $testuser1 = strcasecmp($firstname, $users[0]);
        $testuser2 = strcasecmp($firstname, $users[1]);

        $testkey1 = strcasecmp($key, $keys[0]);
        $testkey2 = strcasecmp($key,$keys[1]);
        if(isset($firstname) && isset($key) && ($testkey1 == 0 || $testkey2 == 0) && ($testuser1 == 0 || $testuser2 == 0)){
            foreach($data2 as $i){
                echo "<h1>".$i[1]."</h1>";
                echo "<figure>";
                echo "<img src=\"". $i[2]. "\"alt=\"".$i[1]."\">";
                echo "<figcaption>".$i[1]."</figcaption>";
                echo "</figure>";
            }
            
        }else{
            echo "Enter first name and key";
        }

    }elseif($_SERVER["REQUEST_METHOD"] === "POST"){
        $firstname = $_POST["first-name"];
        $key = $_POST["key"];
        
        $keys = array_keys($data2);
        $users = array();
        foreach($data2 as $i){
            $users[] = $i[0];
        }

        $testuser1 = strcasecmp($firstname, $users[0]);
        $testuser2 = strcasecmp($firstname, $users[1]);

        $testkey1 = strcasecmp($key, $keys[0]);
        $testkey2 = strcasecmp($key,$keys[1]);
        if(isset($firstname) && isset($key) && ($testkey1 == 0 || $testkey2 == 0) && ($testuser1 == 0 || $testuser2 == 0)){
            foreach($data2 as $i){
                echo "<h1>".$i[1]."</h1>";
                echo "<figure>";
                echo "<img src=\"". $i[2]. "\"alt=\"".$i[1]."\">";
                echo "<figcaption>".$i[1]."</figcaption>";
                echo "</figure>";
            }
            
        }else{
            echo "Enter first name and key";
        }

    }else{
        echo "Error in sending form";
    }
    

    ?>
</body>

</html>