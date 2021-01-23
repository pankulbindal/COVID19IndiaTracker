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
 * Template Name: Testing Stats
 * description: >-
  Page template without sidebar
 */
//get_header();

try
{
$url = "https://api.rootnet.in/covid19-in/stats/testing/latest";
$response = file_get_contents($url);
$json_array = json_decode($response, true);



 $date = $json_array['lastRefreshed']; 
        $date = str_replace("T", " ", $date);
        $date = substr($date, 0, -5);
        
        ?>
Last Updated: <?php echo $date; ?>
<div id="summary" style="overflow-x:auto; ">
            <h2>Summary of COVID-19 Tests</h2>
            <table id="summary-table">
                <tr>
                    <th>Day</th>
                    <th>Total Samples Tested</th>
                    <th>Total Individuals Tested</th>
                    <th>Total Positive Cases</th>
                    
                </tr>
                <tr>
                    <td><?php echo $json_array['data']['day']; ?></td>
                    <td><?php echo $json_array['data']['totalSamplesTested']; ?></td>
                    <td><?php echo $json_array['data']['totalIndividualsTested']; ?></td>
                    <td><?php echo $json_array['data']['totalPositiveCases']; ?></td>
                    
                </tr>
            </table>
</div>


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