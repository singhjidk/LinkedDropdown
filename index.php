<?php
$con=mysqli_connect('localhost','root','','db_ex');
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
</head>
<body>
    <form class="form-inline">
    <div class="row">
    <div class="col-sm-3">
    <div class="form-group">
    <label>Country:</label>
    <select class="form-control" id="country">
    <option disabled selected>----select country-----</option>
    <?php
    $query="SELECT * from countries";
    $res=mysqli_query($con,$query);
    if(mysqli_num_rows($res)){
        while($data=mysqli_fetch_array($res)){
            echo "<option value=" .$data[country_id].">" .$data[country_name]. "</option>";
        }
    }
    ?>
    </select>
    </div>
    </div>
    <div class="col-sm-3">
    <div class="form-group" >
    <label>States:</label>
    <select class="form-control" id="state">
    <option selected disabled>------select state------</option>
    </select>
    </div></div>
    <div class="col-sm-3" >
    <div class="form-group">
    <label>Cities:</label>
    <select class="form-control" id="city">
    <option selected disabled>------select city------</option>
    </select>
    </div>
    </div>
    </div>
    </form>


<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
<script>
    $(document).ready(function(){
        $('#country').change(function(){ 
          $("#state").children().remove();
          var countryId=$(this).val();
          if (countryId!=""){
            $.ajax({
              type: "POST",
              url: "ajax.php",
              data: "get=state&countryId=" + countryId
              }).done(function( result ) 
              {     
                      $("#state").append($(result));
                  
              });
          }
        });

        $('#state').change(function(){ 
          $("#city").children().remove();
          var stateId=$(this).val();
          if (stateId!=""){
            $.ajax({
              type: "POST",
              url: "ajax.php",
              data: "get=city&stateId=" + stateId
              }).done(function( result ) 
              {     
                      $("#city").append($(result));
                  
              });
          }
        });
    });
</script>
</body>
</html>