<!DOCTYPE html>
<html>
<head>
  <meta name="description" content="website description" />
  <meta name="keywords" content="website keywords, website keywords" />
  <meta http-equiv="content-type" content="text/html; charset=windows-1252" />
  <link rel="stylesheet" type="text/css" href="style/style.css" />
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
</head>
<body>
<div id="main">
    <div id="header">
      <div id="logo">
        <div id="logo_text">
          <h1><a href="data_insert_house_type.html">BRMS<span class="logo_colour"><br>Bachelor Rental Management System</span></a></h1>
        </div>
      </div>
      <div id="menubar">
        <ul id="menu">
          <li><a href="data_insert_house_type.html">House Type</a></li>
          <li><a href="data_insert_living_area.html">Living Area</a></li>
          <li><a href="data_insert_price.html">Price List</a></li>
        </ul>
      </div>
    </div>
    <div id="content_header"></div>
    <div id="sidebar_container">
    </div>
    </div> 
      <br>
      <center  style="color: green; font-size: 20px;">Here is the list of House details with region</center>
<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "brms";
$conn = new mysqli($servername, $username, $password, $dbname);
if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}
$sql = "SELECT h.house_type_no, h.house_type, l.area_name
FROM house_type AS h JOIN living_area AS l ON h.serial_fk = l.serial_no
ORDER BY house_type_no ASC";
$result = $conn->query($sql);
$files = mysqli_fetch_all($result,MYSQLI_ASSOC);
$conn->close();
?>
<table style="width:100% ">
  <thead>
    <th> Serial </th>
    <th> House Category </th>
    <th> Area Name </th> 
  </thead>
  <tbody id="table">
    <?php 
    foreach($files as $file): ?>
      <tr>
        <td><?php echo $file['house_type_no'];?></td>
        <td><?php echo $file['house_type'];?></td>
        <td><?php echo $file['area_name'];?></td>
      </tr>
    <?php endforeach ; ?>
    </tbody>
</table>
<!-- 
<script>
  $.ajax({
    url: "read_house_type.php",
    type: "POST",
    cache: false,
    success: function(data){
      alert(data);
      $('#table').html(data); 
    }
  });
</script> -->
<div id="content_footer"></div>
    <div id="footer">
      <p><a href="data_insert_house_type.html">House Type</a> | <a href="data_insert_living_area.html">Living Area</a> | <a href="data_insert_price.html">Price List</a></p>
      <p>Copyright &copy; Bachelor Rental Management System</p>
    </div>   
    
</body>
</html>

