
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
 * Template Name: Hospital and Beds
 * description: >-
  Page template without sidebar
 */
//get_header();

try
{
$url = "https://api.rootnet.in/covid19-in/hospitals/beds";
$response = file_get_contents($url);
$json_array = json_decode($response, true);



 $date = $json_array['lastRefreshed']; 
        $date = str_replace("T", " ", $date);
        $date = substr($date, 0, -5);
        
        
        ?>
Last Updated: <?php echo $date; ?>
<div id="summary" style="overflow-x:auto; ">
            <h2>Summary Hospitals and Beds</h2>
            <table id="summary-table">
                <tr>
                    <th>Hospitals in Rural Areas</th>
                    <th>Beds in Rural Areas</th>
                    <th>Hospitals in Urban Areas</th>
                    <th>Beds in Rural Areas</th>
                    <th>Total Hospitals</th>
                    <th>Total Beds</th>
                </tr>
                <tr>
                    <td><?php echo $json_array['data']['summary']['ruralHospitals']; ?></td>
                    <td><?php echo $json_array['data']['summary']['ruralBeds']; ?></td>
                    <td><?php echo $json_array['data']['summary']['urbanHospitals']; ?></td>
                    <td><?php echo $json_array['data']['summary']['urbanBeds']; ?></td>
                    <td><?php echo $json_array['data']['summary']['totalHospitals']; ?></td>
                    <td><?php echo $json_array['data']['summary']['totalBeds']; ?></td>
                </tr>
            </table>
</div>
<br><br>
        <div id="statewisedata">
            <h2>State Wise Data of Hospitals and Beds</h2>
            <table id="statewise" >
                <thead>
                <tr>
                    <th>State</th>
                    <th>Hospitals in Rural Areas</th>
                    <th>Beds in Rural Areas</th>
                    <th>Hospitals in Urban Areas</th>
                    <th>Beds in Urban Areas</th>
                    <th>Total Hospitals</th>
                    <th>Total Beds</th>
                    <th>As on</th>
                </tr>
                </thead>
                <?php for($i=0; $i<=36; $i++) {?>
                
                <tr>
                    
                    <td><?php echo $json_array['data']['regional'][$i]['state']; ?></td>
                    <td><?php echo $json_array['data']['regional'][$i]['ruralHospitals']; ?></td>
                    <td><?php echo $json_array['data']['regional'][$i]['ruralBeds']; ?></td>
                    <td><?php echo $json_array['data']['regional'][$i]['urbanHospitals']; ?></td>
                    <td><?php echo $json_array['data']['regional'][$i]['urbanBeds']; ?></td>
                    <td><?php echo $json_array['data']['regional'][$i]['totalHospitals']; ?></td>
                    <td><?php echo $json_array['data']['regional'][$i]['totalBeds']; ?></td>
                    <td><?php echo substr($json_array['data']['regional'][$i]['asOn'],0,-14); }?></td>
                </tr>
                
            </table>
        </div>
<br><br>
Source: <a href="<?php echo $json_array['data']['sources'][0]['url']; ?>">Visit to Check Source</a>
<?php
}
catch(Exception $e)
{
    echo $e->getMessage();
}
?>
<?php //get_footer(); ?>
<style>
        
        #summary-table
        {
            margin-left: auto; margin-right: auto
        }
        #summary-table tr th{
            background-color: green;
            color: white;
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