<?php
session_start(); 

//include('../control/search.php');
include('../control/updatecheck.php');


if(empty($_SESSION["username"])) // Destroying All Sessions
{
header("Location: ../control/login.php"); // Redirecting To Home Page
}

?>

<!DOCTYPE html>
<html>
<body>
<h2>Profile Page</h2>

<h3><?php echo $_SESSION["username"];?></h3>
<br><br>
<?php
//$connection1 = new db();
//$conobj1=$connection1->OpenCon();

//$userQuery1=$connection1->searchUser($conobj1,"student",$_POST["usernames"]);

?>

<?php
$user=$radio1=$radio2=$radio3="";
$firstname=$email="";
$connection = new db();
$conobj=$connection->OpenCon();

$userQuery=$connection->CheckUser($conobj,"student",$_SESSION["username"],$_SESSION["password"]);
$userQuery1=$connection->searchUser($conobj,"student",$_POST["usernames"]);
if ($userQuery->num_rows > 0) 
{

    // output data of each row
    while($row = $userQuery->fetch_assoc()) 
    {
      $firstname=$row["firstname"];
      $email=$row["email"];
     
      if(  $row["gender"]=="female" )
      { $radio1="checked"; }
      else if($row["gender"]=="male")
      { $radio2="checked"; }
      else{$radio3="checked";}
   
  } 
} 
  else {
    echo "0 results";
  }



?>
<form action='' method='post'>
Search by username : <input type='text' name='username' value="" >


     <input name='update' type='submit' value='seach'> </form>
<br><br>Profile Page.
<br><br>
<form action='' method='post'>
firstname : <input type='text' name='firstname' value="<?php echo $firstname; ?>" >

username : <input type='text' name='username' value="<?php echo $user; ?>" >
email : <input type='text' name='email' value="<?php echo $email; ?>" >
 Gender:
     <input type='radio' name='gender' value='female'<?php echo $radio1; ?>>Female
     <input type='radio' name='gender' value='male' <?php echo $radio2; ?> >Male
     <input type='radio' name='gender' value='other'<?php  $radio3; ?> > Other

     <input name='update' type='submit' value='Update'>  

     <?php echo $error; ?>
<br>
<br>
<a href="../view/pageone.php">Back </a>

<a href="../control/logout.php"> logout</a>

</body>
</html>