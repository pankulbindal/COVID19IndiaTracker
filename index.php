<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<div class="topnav">
    <a class="active" href="index.php">Home</a>
    <a href="testingStats.php">COVID-19 Test Stats</a>
    <a href="HospitalsandBeds.php">Hospital and Beds</a>
    <a href="MedicalColleges.php">Medical Collges</a>
    <a href="COVID19Helplines.php">COVID-19 Helplines</a>
    <a href="COVID19Notifications.php">COVID-19 Notifications</a>
    <a href="https://techblicks.com/contact-us">Contact</a>
</div> 
<?php
/*
 * Template Name: Home Page
 * description: >-
  Page template without sidebar
 */
//get_header();


//CHD STATS
try {
    $chdurl = "http://chdcovid19.in/";
    $chdresponse = file_get_contents($chdurl);
    //$chd_json_array = json_decode($chdresponse, true);
    $chdconfirmed = "";
    $chdrecovered = "";
    $chddeaths = "";
    $chdtotalsampled = "";
    $chdpositivecase = "";
    $chdnegativecases = "";
    $chdrejectedsamples = "";
    $chdresultsawaited = "";
    $chdhomequarantined = "";
    $chdindividualvolunteer = "";
    $chdorganization = "";
    
} catch (Exception $ex) {
    echo $ex->getMessage();
    
}



//INDIA STATS
try
{
$url = "https://api.rootnet.in/covid19-in/stats/latest";
$response = file_get_contents($url);
$json_array = json_decode($response, true);



        $date = $json_array['lastRefreshed']; 
        $date = str_replace("T", " ", $date);
        $date = substr($date, 0, -5);
        $total = $json_array['data']['summary']['total'];
        $discharged = $json_array['data']['summary']['discharged'];
        $deaths = $json_array['data']['summary']['deaths'];
        $activecases = $total - ($discharged+$deaths);
        ?>

        
        Last Updated: <?php echo $date; ?>
        <div id="summary" style="overflow-x:auto; ">
            <h2>Summary</h2>
            <table id="summary-table">
                <tr>
                    <th>Total Confirmed Cases</th>
                    <th>Confirmed Cases - Indian</th>
                    <th>Confirmed Cases - Foreigners</th>
                    
                </tr>
                <tr>
                    <td><?php echo $json_array['data']['summary']['total']; ?></td>
                    <td><?php echo $json_array['data']['summary']['confirmedCasesIndian']; ?></td>
                    <td><?php echo $json_array['data']['summary']['confirmedCasesForeign']; ?></td>
                    
                </tr>
            </table>
            <table id="summary-table" >
                <tr>
                    <th>Deaths</th>
                    <th>Discharged</th>
                    <th>Confirmed but Location Unidentified</th>
                </tr>
                <tr>
                    <td><?php echo $json_array['data']['summary']['deaths']; ?></td>
                    <td><?php echo $json_array['data']['summary']['discharged']; ?></td>
                    <td><?php echo $json_array['data']['summary']['confirmedButLocationUnidentified']; ?></td>
                </tr>
            </table>
            <br>
            <table id="summary-table">
            <tr>
                <th>Total Active Cases</th>
            </tr>
            <tr>
                <td><?php echo $activecases ?></td>    
            </tr>
            </table>
        </div>
        <br><br>
        <div id="statewisedata">
            <h2>State Wise Data</h2>
            <table id="statewise" >
                <thead>
                <tr>
                    <th>State</th>
                    <th>Total Cases</th>
                    <th>Discharged</th>
                    <th>Deaths</th>
                </tr>
                </thead>
                <?php for($i=0; $i<=34; $i++) {?>
                
                <tr>
                    
                    <td><?php echo $json_array['data']['regional'][$i]['loc']; ?></td>
                    <td><?php echo $json_array['data']['regional'][$i]['totalConfirmed']; ?></td>
                    <td><?php echo $json_array['data']['regional'][$i]['discharged']; ?></td>
                    <td><?php echo $json_array['data']['regional'][$i]['deaths']; }?></td>
                </tr>
                
            </table>
        </div>
        <?php
//echo $json_array['data']['summary']['deaths'];
//display_array_recursive($json_array);
 
}


catch(Exception $e)
{
    echo $e->getMessage();
}
?>
<?php // get_footer(); ?>

    
    <style>
        
        #summary-table
        {
            margin-left: auto; margin-right: auto
        }
        #summary-table tr th{
            background-color: green;
            color: white;
            text-align: center;
            border: 1px solid #ddd;
  padding: 8px;
  width: 200px;
        }
        #summary-table tr td{
            background-color: wheat;
            text-align: center;
            border: 1px solid #ddd;
  padding: 8px;
        }
        #statewise
        {
            margin-left: auto; margin-right: auto
        }
        #statewise tr th{
            background-color: blue;
            color: white;
            text-align: center;
            border: 1px solid #ddd;
  padding: 8px;
  width: 120px;
        }
        #statewise tr td{
            background-color: wheat;
            text-align: center;
            border: 1px solid #ddd;
  padding: 8px;
        }
        h1
        {
            text-align: center;
        }
        h2
        {
            text-align: center;
        }
        
        
        /* Add a black background color to the top navigation */
.topnav {
  background-color: #333;
  overflow: hidden;
}

/* Style the links inside the navigation bar */
.topnav a {
  float: left;
  color: #f2f2f2;
  text-align: center;
  padding: 14px 16px;
  text-decoration: none;
  font-size: 17px;
}

/* Change the color of links on hover */
.topnav a:hover {
  background-color: #ddd;
  color: black;
}

/* Add a color to the active/current link */
.topnav a.active {
  background-color: #4CAF50;
  color: white;
}
    </style>

