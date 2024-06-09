<?php
	if(isset($_POST['submit']))
	{
		include 'koneksidb.php';

		$username =  $_POST['username'];
		$pass = md5($_POST['password']);

		echo $username;
		echo $pass;

		$query = mysqli_query($koneksi, "SELECT * FROM user WHERE username = '".$username."' AND password = '".$pass."' "); 

		$data = mysqli_fetch_array($query);
		

		if (mysqli_num_rows($query)>0) 
		{
			$user_login = $data['username'];
			$user_role = $data['user_role'];

			session_start();
			$_SESSION['username'] = $username;
			$_SESSION['user_role'] = $user_role;

			echo "berhasil login";
			if ($user_role == 'admin') 
			{
				header('location: admin/admin.php');
			}
			elseif ($user_role == 'staff') 
			{
				header('location: nasabah/staff.php');
			}
		} 
		else 
		{
			header('location: ogin.php');
		}
	}
?>
