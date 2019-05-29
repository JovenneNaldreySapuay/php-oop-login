<?php  
// https://github.com/aantal85/PHP-OOP-Login-Register-System
// stop here: https://www.youtube.com/watch?v=rWon2iC-cQ0&list=PLfdtiltiRHWF5Rhuk7k4UAU1_yLAZzhWc&index=11

require_once 'core/init.php';

// $user = DB::getInstance()->query("SELECT * FROM users");
// $user = DB::getInstance()->get('users', array('username', '=', 'jovenne'));

// if(!$user->count()) {
// 	echo 'No user';
// } else {
// 	echo $user->first()->username;
// }

// $user = DB::getInstance()->insert('users', array(
// 	'username' => 'Gary',
// 	'password' => 'pass123',
// 	'salt'     => 'salt',
// 	'name'     => 'Gary Vay'
// ));

// $user = DB::getInstance()->update('users', 5, array(
// 	'password' => 'strong123',
// 	'name' => 'Gary Vaynerchuk'
// ));

if(Session::exists('home')) {
	echo Session::flash('home');
}

// echo Session::get(Config::get('session/session_name'));

$user = new User();
// echo $user->data()->username;
if($user->isLoggedIn()) { ?>
<p>Hello <a href="profile.php?user=<?php echo escape($user->data()->username); ?>"><?php echo escape($user->data()->username); ?></a>!</p>
<ul>
	<li><a href="logout.php">Log out</a></li>
	<li><a href="update.php">Update details</a></li>
	<li><a href="changepassword.php">Change password</a></li>
</ul>

<?php
	if($user->hasPermission('moderator')) {
		echo '<p>You are moderator</p>';
	}

} else { 
	echo '<p>You need to <a href="login.php">log in</a> or <a href="register.php">register</a>.</p>';
} ?>
	

