<?php
require_once("src/LoginHtmlTagNames.php");
?>
<html>
    <head>
        <meta charset="UTF-8">
        <title></title>
    </head>
    <body>
		<?php
		if (isset($_POST[LoginHtmlTagNames::LoginButton]))
		{
			echo 'Login Button Pressed';
			$username = $_POST[LoginHtmlTagNames::UsernameInput];
			echo $username;
		}
		// put your code here
		?>
    </body>
</html>
