<html lang="en">
<?php
   include('session.php');
?>

<head>

    <title>Update page</title>

    <!-- Bootstrap Core CSS -->
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <link href="css/bootstrap-datepicker.css" rel="stylesheet">

    <!-- Custom CSS -->
    <link href="css/sb-admin.css" rel="stylesheet">

    <script src="js/jquery.js"></script>
    <script src="js/bootstrap-datepicker.js"></script>   
    <style>
	body {
    background-color: black;
    background: url(background.jpg) no-repeat center center fixed; 
    -webkit-background-size: cover;
    -moz-background-size: cover;
    -o-background-size: cover;
    background-size: cover;
	}
	</style>

</head>

<body>
<?php
if(($_GET['action'] == 'update') && isset($_GET['id'])) { // if delete was requested AND an id is present...

$sql = "SELECT * FROM personal_data WHERE id = '".$_GET['id']."'";

$result = mysqli_query($conn, $sql);
if($result) {

//echo 'Data selected!';

}
}
if (mysqli_num_rows($result) > 0) {
	$row = mysqli_fetch_assoc($result);
}
else{
	echo "0 result";
}
?>
    <div class="container">
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                <div class="login-panel panel panel-default">
                    <div class="panel-heading">
                        <h3 class="panel-title">Update information</h3>
                    </div>
                    <div class="panel-body">
                        <form id="registrationForm" data-toggle="validator" role="form" method="post" enctype="multipart/form-data">
                            <fieldset>
                                <div class="form-group">
                                    <input class="form-control" value="<?php echo $row["firstname"];?>" placeholder="First name" name="firstname" type="text" autofocus required>
                                </div>
                                <div class="form-group">
                                    <input class="form-control" value="<?php echo $row["midname"];?>" placeholder="Middle name" name="mname" type="mname">
                                </div>
                                <div class="form-group">
                                    <input class="form-control" value="<?php echo $row["lastname"];?>" placeholder="Last name" name="lastname" type="lastname" required>
                                </div>
                                <div class="form-group row">
                                	<label class="col-md-3">Gender:</label>
                                    <div class="col-md-9">
                                    	<label class="radio-inline"><input type="radio" name="gender" value="male" required>
                                        	Male
                                        </label>
										<label class="radio-inline"><input type="radio" name="gender" value="female" required>
                                        	Female
                                        </label>
                                    </div>
                                </div>
                                <div class="form-group row">
                                	<label for="datePicker" class="col-md-3">Date of birth:</label>
                           				<div class="col-md-9">
            							<div class="input-group date" id="datePicker">
                							<input type="date" value="<?php echo $row["birthday"];?>" class="form-control" name="birthdate" placeholder="MM/DD/YYYY" />
                							<span class="input-group-addon">
                                            <i class="glyphicon glyphicon-calendar"></i></span>
            							</div>
        								</div>
                           		 </div>
                                <div class="form-group row">
                                	<label for="phone" class="col-md-3">Phone number:</label>
                                    <div class="col-md-9">
                                    <input class="form-control" value="<?php echo $row["phone"];?>" id="phone" placeholder="022 1234567" pattern="^[_0-9]{1,}$" maxlength="10" data-minlength="10" name="phone" type="text" required>
                                    </div>
                                    <span class="glyphicon form-control-feedback" aria-hidden="true"></span>
    								<div class="help-block with-errors col-md-10 col-md-offset-3"></div>
                                </div>
                                <div class="form-group">
                                    <input class="form-control" value="<?php echo $row["email"];?>" placeholder="E-mail" name="email" type="email" data-error="Email address is invalid" required>
                                    <div class="help-block with-errors"></div>
                                </div>
                                <div class="form-group row">
                                	<div class="col-md-6">
                                    	<input class="form-control" placeholder="Password" data-minlength="6" name="password" id="inputPassword" type="password" required>
                                        <div class="help-block">Minimum of 6 characters</div>
                                    </div>
                                    <div class="col-md-6">
                                    	<input class="form-control" name="confirmation" type="password"  data-match="#inputPassword" data-match-error="Whoops, these don't match" placeholder="Confirm" required>
                                        <div class="help-block with-errors"></div>
                                    </div>
                                </div>      
                                <div class="form-group">
                                	<label>Address:</label>
                                <textarea class="form-control" value="<?php echo $row["address"];?>" rows="3" name="address"></textarea>
                            	</div>        
                                <div class="form-group">
                                	<label>Country:</label>
                                	<select class="form-control" name="country_id" onchange="fetch_select(this.value)" required>                                
                                    	<option>Select...</option>
                                    	<?php
											$sql1="SELECT country_name FROM countries WHERE id='".$row['id']."'";
											$result1 = mysqli_query($conn,$sql1);
											
											if (mysqli_num_rows($result1) > 0) {
    										// output data of each row
											$row1 = mysqli_fetch_assoc($result1);
        										echo "<option value=".$row["id"].">" . $row1["country_name"]. "</option>";
											}
										?>										
                               		</select>
                            	</div>   
                                <div class="form-group">
                                	<label>City:</label>
                                	<select class="form-control" id="new_select" name="city_id" required>
                                    	<option>Choose country first</option>                                        
                                    </select>
                                </div>               
                                <div class="form-group">
                                    <input class="form-control" value="<?php echo $row["postcode"];?>" placeholder="Postcode" name="postcode" type="postcode" required>
                                </div>
                                <div class="form-group">
                                	<label>Most recent academic qualification:</label>
                                	<select class="form-control" value="<?php echo $row["qualification"];?>" name="qualification" required>
                                    	<option>Bachelor</option>
                                    	<option>Master</option>
                                    	<option>Diploma</option>
                                    	<option>None</option>
                                    	<option>Arhimage</option>
                                	</select>
                            	</div>
                                <div class="form-group">
                                	<label>Areas of expertise:</label>
                                	<select multiple class="form-control" name="area[]" required>
                                    	<?php
											$sql2="SELECT area_name FROM area_of_expertise";
											$result2 = mysqli_query($conn,$sql2);
											
											if (mysqli_num_rows($result2) > 0) {
    										// output data of each row
    										while($row = mysqli_fetch_assoc($result2)) {
        										echo "<option>" . $row["area_name"]. "</option>";
   												}
											} else {
   											echo "0 results";
											}
											
										?>
										
                               		</select>
                            	</div>                                            
                                 
                                <br />
                                
                                <input type="submit" class="btn btn-lg btn-default btn-block" value="Update" name="Submitting">
                                
                            </fieldset>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        
    </div>
    
    <script>
		function fetch_select(val)
		{

			  $.ajax({
				type: 'post',
				url: '',
				data: {
				get_option:val
				},
				success: function (response) {
                document.getElementById("new_select").innerHTML=response; 
				}
			});

		}
		
		$("#registrationForm").submit(function(e) {
    var url = "updateconf.php?id=<?php echo $row["id"];?>"; // the script where you handle the form input.
    $.ajax({
           type: "POST",
           url: url,
           data: $("#registrationForm").serialize(), // serializes the form's elements.
           success: function(data)
           {
               alert(data); // show response from the php script.
           		window.location.assign("tables.php");
		   },
		   failure: function(data, x, y)
		   {
			   alert(data);
			   alert(x);
			   alert(y);
		   }
         });

    e.preventDefault(); // avoid to execute the actual submit of the form.
});
		</script>

    <script src="js/validator.js"></script>
</body>


</html>
