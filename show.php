<?php
 include('con1.php');
 SESSION_start();
 $urname=$_POST['username'];
 $urpass=$_POST['password'];
 $sql="select * from tbl_login where hname='$urname' and pass='$urpass'";
 $result=mysqli_query($con,$sql);
 $rowcount=mysqli_num_rows($result);
 if($rowcount!=0)
{
	
	while($row=mysqli_fetch_array($result))
	{
		$dbu_name=$row['hname'];
		$dbu_pass=$row['pass'];
		$dbu_status=$row['u_status'];
        $_SESSION['hname']=$dbu_name;
        $_SESSION['pass']=$dbu_pass;
		
		
		
		if($dbu_name==$urname && $dbu_pass==$urpass)
		{			
			if($dbu_status==0)	
			{
				//$_SESSION['hname']=$dbu_name;
				$_SESSION['u_status']=$dbu_status;
						  header("location:../healthcenter/admin1/adminindex.php");
			}
			else if($dbu_status==1)
			{
			    //$_SESSION['hname']=$dbu_name;
				$_SESSION['u_status']=$dbu_status;
						  header("location:../healthcenter/user/userhome.php");
			}
			else
						 header("location:../healthcenter/user/login.php");
			     
			}
 else
              {
			  
			   header("location:../../healthcenter/login.php?error='wrong password/username'");
              }
   }
   }

else
{
			   header("location:../../healthcenter/login.php?error='wrong password/username'");	
	
}
?>

