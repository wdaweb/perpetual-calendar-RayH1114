<html lang="zh-tw">
    <!DOCTYPE html>
    <head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>萬年曆製作_Ray</title>
    <link href="https://fonts.googleapis.com/css?family=Open+Sans+Condensed:300&display=swap" rel="stylesheet">
    <style>
    *{
        list-style-type:none;
        text-align:center;
        box-sizing:border-box;
        /* margin:0; */
        /* padding:0; */
    }

    body{
        background: #cf8dd8;
        background: linear-gradient(to bottom, #8395aa,  #485461); 
        width:98vw;
        height:97vh;
        position: relative;
        display:flex;
        justify-content:center;
        align-items:center;
    }

    #Pbody{
        /* width:100%; */
        /* height:100%; */
        /* position: absolute ; */
        /* top:170px;  */
        /* left:50%; */
        /* transform: translate(-50%); */
        display: inline-block;
        font-family:"微軟正黑體";
        filter: drop-shadow(12px 12px 7px  rgba(44, 55, 66, 0.2));
        transition: all 0.3s;
    }

    #Pbody:hover{
        filter: drop-shadow(12px 12px 7px rgba(44, 55, 66, 0.4));
    }

    #showY{
        display: inline-block;
        background: #654ea3;
        background: linear-gradient(to bottom, #654ea3,  #24268a); 
        border-top-left-radius: 10px;
        border-bottom-left-radius: 10px;
        width:100px;
        height: 474px;
        vertical-align: top;
        box-sizing: border-box;
        position: relative;
        line-height: 16px;
        font-family: 'Open Sans Condensed', sans-serif;
        font-size: 25px;
        padding-top: 10px;
    }
    #showY::before{
        display: inline-block;
        /* background: linear-gradient(to left, #4B4197,  #473E95);  */
        background:rgb(255, 255, 255); 
        width:25px;
        height: 25px;
        box-sizing: border-box;
        content:"";
        position: absolute ;
        left:90px;
        top:200px;
        transform: rotate(45deg);
    }
  
    #calendar_num{
        margin-left:-5px ;
        border-top-right-radius: 10px;
        border-bottom-right-radius: 10px;
        border-collapse: collapse;
        display: inline-block;
        background:rgb(255, 255, 255); 
        padding-left:15px;
        padding-right:5px;
        overflow: hidden;
    }

    td:nth-child(1){
        color:#b4b1b1;
	}

    td:nth-child(7){
        color:#b4b1b1;
	}

    .showM{
        font-size: 75px;
        padding-top:120px;

    }

    #ENmonth{
        padding-top:0px;
        padding-bottom:80px;
        font-family: 'Open Sans Condensed', sans-serif;
        font-size: 30px;
        color:rgb(255, 255, 255); 
        display: inline-block;

    }

    .btn{
        display: inline-block;
    }

    a{
        line-height:43px;
        font-size: 30px;
        text-decoration: none;
        color:rgb(255, 255, 255);  
        width:35px;
        height: 45px;
        display: inline-block;
        border-radius: 20px;
        /* background-color: #4B4197; */
        font-family: 'Open Sans Condensed', sans-serif;
        transition: all 0.3s;
    }

    a:hover{
        background-color: #6457c7; 
    }

    #weekname{
       color: #6457c7;
       position: relative;
       left: -5px;
       top:5px;
       font-size: 20px;
       top: 20px;
    }
    
    #weekname::after{
        display: inline-block;
        content: "";
        background-color: #e8e8e8;
        width: 110px;
        height: 2px;
        position: relative;
        left: -11px;
        top: 10px;

    }

    #weekname:nth-child(1){
        color:#d45353;
    }
    #weekname:nth-child(7){
        color:#d45353;
    }
    table td{
        display: inline-block;
        width:90px;
        height: 65px;
        box-sizing: border-box;
        line-height: 15px;
       }
    h2{
        text-align:center;
        color:rgb(255, 255, 255); 
        line-height: 0px; 
    }

    .SD_date::after{
        content: "";
        background:pink;
        display: inline-block;
        background: linear-gradient(to bottom, #654ea3,  #473E95); 
        color:rgb(255, 255, 255) !important;
        width: 80%;
        height: 3px;
        position: relative;
        top: 5px;
    } 
    </style>
</head>
<body>
<div id=Pbody>
<!-- 設定迴圈年-月-日&起始值 -->
<?php
    if(!empty($_GET['month'])){
        $month=$_GET['month'];
    }else{
        $month=date("m");
    }

    if(!empty($_GET['year'])){
        $year=$_GET['year'];
    }else{
        $year=date("Y");
    };


        $sd=[
            [1 =>""],
            [7 =>"生日"],
            [25 =>"聖誕節"]

        ];

        $today=date("Y-m-d");
        $todayDays=date("d");
        $start="$year-$month-01";
        $startDay=date("w",strtotime($start));
        $days=date("t",strtotime($start));
        $endDay=date("w",strtotime("$year-$month-$days"));
?>

<!-- 右邊<div>年曆內容 -->
<div id="showY">
    <!-- 顯示年曆數字＝>年 -->
    <?php echo "<h2>".date("Y",strtotime($start))."</h2>";?>
    <!-- 顯示年曆英文＝>月-->
    <?php
        if ($month==1) {
            echo "<div id='ENmonth'>Jun</div>";
        }
        if ($month==2) {
            echo "<div id='ENmonth'>Feb</div>";
        }
        if ($month==3) {
            echo "<div id='ENmonth'>Mar</div>";
        }
        if ($month==4) {
            echo "<div id='ENmonth'>Apr</div>";
        }
        if ($month==5) {
            echo "<div id='ENmonth'>May</div>";
        }
        if ($month==6) {
            echo "<div id='ENmonth'>jun</div>";
        }
        if ($month==7) {
            echo "<div id='ENmonth'>Jul</div>";
        }
        if ($month==8) {
            echo "<div id='ENmonth'>Aug</div>";
        }
        if ($month==9) {
            echo "<div id='ENmonth'>Sep</div>";
        }
        if ($month==10) {
            echo "<div id='ENmonth'>Oct</div>";
        }
        if ($month==11) {
            echo "<div id='ENmonth'>Nov</div>";
        }
        if ($month==12) {
            echo "<div id='ENmonth'>Dec</div>";
        }else {
            echo "";
        }
    ?>
    

    <!-- 顯示數字=>月 -->
    <div >
        <?php echo "<h2 class='showM'>".date("m",strtotime($start))."</h2>";?>
    </div>

        
    <!-- 上個月的<a>標籤連結 定義$month-1= 0 => 12的迴圈值-->
    <div class="btn">
            <?php
            if(($month-1)>0){
            ?>
                <a href="?year=<?=$year?>&month=<?=$month-1?>"><</a> 
            <?php
            }else{
            ?>
                <a href="?year=<?=$year-1?>&&month=12"><</a> 
            <?php
            }
            ?>
            
    </div>
    <!-- 下個月的<a>標籤連結 定義$month+1= 12 => 1的迴圈值 -->
    <div class="btn">
            <?php
            if(($month+1)<=12){
            ?>
                <a href="?year=<?=$year?>&month=<?=$month+1?>">></a> 
            <?php
            }else{
            ?>
                <a href="?year=<?=($year+1)?>&month=1">></a> 
            <?php
            }
            ?>
    </div>
</div>

<!-- 左邊<div>月曆內容 -->
<div id="calendar_num">
   <table>  
        <!-- 月曆Sun ~ Mon -->
        <tr>
            <td id="weekname">Sun</td>
            <td id="weekname">Mon</td>
            <td id="weekname">Tue</td>
            <td id="weekname">Wed</td>
            <td id="weekname">Thu</td>
            <td id="weekname">Fri</td>
            <td id="weekname">Sat</td>
        </tr>
        <!-- 月曆日期-->
        <?php
    for($i=0;$i<6;$i++){

        echo "<tr>";

        for($j=0;$j<7;$j++){
            if(!empty($sd[$i*7+$j+1-$startDay])){
                $str="";
            }else{
                $str="";
            }
            if($i==0){

                if($j<$startDay){
                    echo "<td></td>";

                }else{
                    if(($i*7+$j+1-$startDay)==$todayDays){
                        echo "<td class='bg'>".($i*7+$j+1-$startDay).$str."</td>";    
                    }else{
                        echo "<td>".($i*7+$j+1-$startDay).$str."</td>";    
                    }
                }
            }else{

                if(($i*7+$j+1-$startDay)<=$days){
                    
                    if((($i*7+$j+1-$startDay)==$todayDays)){
                        echo "<td class='SD_date'>".($i*7+$j+1-$startDay).$str."</td>"; 
                    }else{
                        echo "<td>".($i*7+$j+1-$startDay).$str."</td>";    
                    }
                }else{
                    echo "<td></td>";    
                }
            }
    }
        echo "</tr>";
    }
    ?>
    </table>
    </div>
</div>

</body>
</html>
