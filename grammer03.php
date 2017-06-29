<?php
echo "<h3>条件语句</h3>";
//if 
$t = date("H");

if ($t<"10")
{
    echo "Have a good morning!";
}
else if ($t<"20")
{
    echo "Have a good day!";
}
else
{
	echo "Have a good night!";
}

//switch

?>