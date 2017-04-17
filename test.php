<pre>
<?php
if(!empty($_POST) && !empty($_POST['login']) && !empty($_POST['pass']))
{
	$regist = false;

	$host = '127.0.0.1';
	$db   = 'practic';
	$user = 'root';
	$pass = '';
	$charset = 'utf8';
	$dsn = "mysql:host=$host;dbname=$db;charset=$charset";
	$opt = [
        PDO::ATTR_ERRMODE            => PDO::ERRMODE_EXCEPTION,
        PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
        PDO::ATTR_EMULATE_PREPARES   => false,
    ];
    $pdo = new PDO($dsn, $user, $pass, $opt);

    $login = $_POST['login'];
    $pass = md5($_POST['pass']);

    $stmt = $pdo->prepare("SELECT login FROM users WHERE login = ?");
	$stmt->execute(array($login));
	if(!$stmt->fetch())
	{
	    $stmt = $pdo->prepare("INSERT INTO users (login, pass) VALUES (:login, :pass)");
		$stmt->bindParam(':login', $login);
		$stmt->bindParam(':pass', $pass);
		$stmt->execute();
		if($pdo->lastInsertId() != 0)
		{
			$regist = true;
			unset($_POST);
		}
	}
	else
		$errorMassage = 'Данный логин уже используется пожалуйста введите другой';
}
?>

<?php
if($regist)
{
	?>
	<h1>Регистрация удачно завершена</h1>
	<?php
}
else
{
	if(isset($errorMassage))
	{
		?>
		<h1><?=$errorMassage?></h1>
		<?php
	}
	?>
	<form method="POST">
		<input type="text" name="login" value="<?=isset($_POST['login']) ? $_POST['login'] : '' ?>">
		<input type="text" name="pass" value="<?=isset($_POST['pass']) ? $_POST['pass'] : '' ?>">
		<button>отправить</button>
	</form>
	<?php
}
?>