<
<?php
if (preg_match('/^[a-z\d_]{5,20}$/i', $uname) and preg_match('/^(?=.*\d)(?=.*[@#\-_$%^&+=§!\?])(?=.*[a-z])(?=.*[A-Z])[0-9A-Za-z@#\-_$%^&+=§!\?]{8,20}$/',$password)) 
	{
	    echo 'succeeded';
	    $allow=1;
	}
	else
	{
	    echo 'failed';
	    $allow=0;
	}
?>