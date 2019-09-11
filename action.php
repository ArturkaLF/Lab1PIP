<!DOCTYPE html>
<html>
<head>
    <title></title>
    <meta charset="utf-8">
    <link href="styles/style2.css" rel="stylesheet">
</head>
<body>
    <a onclick="history.back();"><button type='button' class="child">←Назад</button></a>
    <form action="clean.php" method="post" class="child"><button>✖Удалить историю</button></form>

    <?php

    session_start();

//    $start_time=microtime(true);

    $start = microtime(true);

//    $back = $_SERVER['HTTP_REFERER'];
//    echo "<a href=".$back."><button type='button'>".НАЗАД."</button></a>";

    $x=(int)$_POST['x'];
    $y=(float)$_POST['y'];
    $r=(int)$_POST['r'];

    if(!isset($_SESSION['x'])){
        $_SESSION['x'] = array();
    }
    if(!isset($_SESSION['y'])){
        $_SESSION['y'] = array();
    }
    if(!isset($_SESSION['r'])){
        $_SESSION['r'] = array();
    }
    if(!isset($_SESSION['res'])){
        $_SESSION['res'] = array();
    }
    if(!isset($_SESSION['time'])){
        $_SESSION['time'] = array();
    }

    if (valid($x,$y,$r)){

//        $t=(float)round(microtime(true)-$start_time,5);
        $time = round((microtime(true) - $start) * 1000, 3);

        $res = check($x,$y,$r);

        pt($x,$y,$r,$res,$time);

    }else{
        echo "<p>Данные не корректны</p>";
    }


    function pt($a_x, $a_y, $a_r, $a_res, $a_t){

        array_push($_SESSION['x'], $a_x);
        array_push($_SESSION['y'], $a_y);
        array_push($_SESSION['r'], $a_r);
        array_push($_SESSION['res'], $a_res);

        if ($a_t==0) array_push($_SESSION['time'], "Менее 0.0001");
        else array_push($_SESSION['time'], "$a_t");


        echo "<table>";

        echo "<td>X</td>";
        foreach($_SESSION['x'] as $i => $value) echo "<td>$value</td>";
        echo "<tr></tr>";

        echo "<td>Y</td>";
        foreach($_SESSION['y'] as $i => $value) echo "<td>$value</td>";
        echo "<tr></tr>";

        echo "<td>R</td>";
        foreach($_SESSION['r'] as $i => $value) echo "<td>$value</td>";
        echo "<tr></tr>";

        echo "<td>Result</td>";
        foreach($_SESSION['res'] as $i => $value) echo "<td>$value</td>";
        echo "<tr></tr>";

        echo "<td>Time(сек.)</td>";
        foreach($_SESSION['time'] as $i => $value) echo "<td>$value</td>";
        echo "<tr></tr>";

        echo "</table>";
        return true;
    }
    
    function valid($a_x,$a_y,$a_r){

        $a_y = str_replace(",", ".", $a_y);

        $x_values = array(-3, -2, -1, 0, 1, 2, 3, 4, 5);
        $r_values = array(1, 2, 3, 4, 5);

        if (!(is_numeric($a_x) && is_numeric($a_y) && is_numeric($a_r))) return false;

        if (!in_array($a_x, $x_values)) return false;
        if ($a_y > 5 || $a_y < -5) return false;
        if (!in_array($a_r, $r_values)) return false;

        return true;
    }


    function check($x, $y, $r) {
        if (($x <= 0 & $y >= 0 & $x >= (-$r/2) & $y <= $r) ||
            ($y >= ($x / 2 - $r / 2) & $y <= 0 & $x >= 0 & $x <= $r) ||
            ($x <= 0 & $y <= 0 & (pow($x, 2) + pow($y, 2)) <= (pow($r / 2, 2))))
            return "Yes";
        return "No";

    }

?>

</body>
</html>
