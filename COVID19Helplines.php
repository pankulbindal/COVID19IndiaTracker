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
 * Template Name: covid19 Helplines
 * description: >-
  Page template without sidebar
 */
//get_header();

try
{
$url = "https://api.rootnet.in/covid19-in/contacts";
$response = file_get_contents($url);
$json_array = json_decode($response, true);



 $date = $json_array['lastRefreshed']; 
        $date = str_replace("T", " ", $date);
        $date = substr($date, 0, -5);
        
        
        ?>
Last Updated: <?php echo $date; ?>
            
<div id="primarycontacts">
    <h2>Primary Contact Details</h2>
    <table id="summary-table" >
                <thead>
                <tr>
                    <th>Number</th>
                    <th>Toll-Free Number</th>
                    
                    <th>Email</th>
                    <th>Twitter</th>
                    <th>Facebook</th>
                    
                </tr>
                </thead>
                 <tr>
                    
                    <td><?php echo $json_array['data']['contacts']['primary']['number']; ?></td>
                    <td><?php echo $json_array['data']['contacts']['primary']['number-tollfree']; ?></td>
                    <td><?php echo $json_array['data']['contacts']['primary']['email']; ?></td>
                    <td><a href="<?php echo $json_array['data']['contacts']['primary']['twitter'];?>">Twitter</a> </td>
                    <td><a href="<?php echo $json_array['data']['contacts']['primary']['facebook']; ?>">Facebook</a></td>
                    
                    
                    
                </tr>
    </table>
</div>
        <div id="statewisedata">
            <h2>State Wise Data of Medical Colleges</h2>
            <table id="statewise" >
                <thead>
                <tr>
                    <th>State</th>
                    <th>Number</th>
                    
                    
                </tr>
                </thead>
                <?php for($i=0; $i<=36; $i++) {?>
                
                <tr>
                    
                    <td><?php echo $json_array['data']['contacts']['regional'][$i]['loc']; ?></td>
                    <td><?php echo $json_array['data']['contacts']['regional'][$i]['number']; }?></td>
                    
                </tr>
                
            </table>
        </div>
<br><br>
Source: <a href="<?php echo $json_array['data']['contacts']['primary']['media'][0]; ?>">Visit to Check Source</a>
<?php
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