<?php
   include('session.php');
?>
<html lang="en">

<head>

    <title>Administration page</title>

    <!-- Bootstrap Core CSS -->
    <link href="css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom CSS -->
    <link href="css/sb-admin.css" rel="stylesheet">
	<style>
	body {
    background-color: black;
    background: url(background.jpg) no-repeat center center fixed; 
    -webkit-background-size: cover;
    -moz-background-size: cover;
    -o-background-size: cover;
    background-size: cover;
	}
	.navbar{
		background-color:#3A211C;
	}
	.nav{
		background-color:#3A211C;
	}
	</style>

</head>

<body>

    <div id="wrapper">

        <!-- Navigation -->
        <nav class="navbar navbar-inverse navbar-fixed-top" role="navigation">
            <!-- Brand and toggle get grouped for better mobile display -->
            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-ex1-collapse">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand" href="index.html">SB Admin</a>
            </div>
            <!-- Top Menu Items -->
            <ul class="nav navbar-right top-nav">
                
                <li class="dropdown">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown"><i class="fa fa-user"></i> <?php echo $login_session; ?> <b class="caret"></b></a>
                    <ul class="dropdown-menu">
                        <li>
                            <a href="#"><i class="fa fa-fw fa-user"></i> Profile</a>
                        </li>
                        
                        <li class="divider"></li>
                        <li>
                            <a href="logout.php"><i class="fa fa-fw fa-power-off"></i> Log Out</a>
                        </li>
                    </ul>
                </li>
            </ul>
            <!-- Sidebar Menu Items - These collapse to the responsive navigation menu on small screens -->
            <div class="collapse navbar-collapse navbar-ex1-collapse">
                <ul class="nav navbar-nav side-nav">
                    <li>
                        <a href="index.php"><i class="fa fa-fw fa-dashboard"></i> Dashboard</a>
                    </li>
                    <li class="active">
                        <a href="tables.php"><i class="fa fa-fw fa-table"></i> Tables</a>
                    </li>
                    <li>
                        <a href="logout.php"><i class="fa fa-fw fa-sign-out"></i> Sign out</a>
                    </li>
                </ul>
            </div>
            <!-- /.navbar-collapse -->
        </nav>

        <div id="page-wrapper">

            <div class="container-fluid">

                <!-- Page Heading -->
                <div class="row">
                    <div class="col-lg-12">
                        <h1 class="page-header">
                            Tables
                        </h1>
                        <ol class="breadcrumb">
                            <li>
                                <i class="fa fa-dashboard"></i>  <a href="index.html">Dashboard</a>
                            </li>
                            <li class="active">
                                <i class="fa fa-table"></i> Tables
                            </li>
                        </ol>
                    </div>
                </div>
                <!-- /.row -->

                <div class="row">
                    <div class="col-md-12">
                        <h2>List of users</h2>
                        <div class="table-responsive">
                            <table class="table table-bordered table-hover">
                                <thead>
                                    <tr>
                                        <th>First name</th>
                                        <th>Middle name</th>
                                        <th>Family name</th>
                                        <th>Gender</th>
                                        <th>Date of birth</th>
                                        <th>Phone</th>
                                        <th>Email</th>
                                        <th>Country</th>
                                        <th>City</th>
                                        <th>Address</th>
                                        <th>Postcode</th>
                                        <th>Path to photo</th>
                                        <th>Qualification</th>
                                        <th>Area of expertise</th>
                                        <th>Role</th>
                                        <th>Edit</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
												$conn = mysqli_connect("localhost", "root", "", "assignment2");
												$sql = "SELECT * FROM personal_data;";
												$result = mysqli_query($conn, $sql);
												if (mysqli_num_rows($result) > 0) {
    												while($row = mysqli_fetch_assoc($result)) {
														$id = $row["id"];
        												echo "<tr><td>".$row["firstname"]."</td><td>".$row["midname"]."</td><td>".$row["lastname"]."</td><td>".$row["gender"]."</td><td>".$row["birthday"]."</td><td>".$row["phone"]."</td><td>".$row["email"]."</td><td>".$row["countryID"]."</td><td>".$row["cityID"]."</td><td>".$row["address"]."</td><td>".$row["postcode"]."</td><td>".$row["photo"]."</td><td>".$row["qualification"]."</td><td>".$row["areas"]."</td><td>".$row["role"]."</td><td><a href='delete.php?action=delete&id=$id'>Delete</a><br /><a href='update.php?action=update&id=$id''>Edit</a></td></tr>";
    												}
												} else {
    												echo "0 results";
												}
																								
											?>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
                <!-- /.row -->
				<div class="text-right">
                                    <a href="add.php">Add new user<i class="fa fa-arrow-circle-right"></i></a>
                                </div>
            </div>
            <!-- /.container-fluid -->

        </div>
        <!-- /#page-wrapper -->

    </div>
    <!-- /#wrapper -->

    <!-- jQuery -->
    <script src="js/jquery.js"></script>

    <!-- Bootstrap Core JavaScript -->
    <script src="js/bootstrap.min.js"></script>

</body>

</html>
