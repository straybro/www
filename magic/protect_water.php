<?
session_start();
$login=$_SESSION['login'];
$spell=$_GET['spell'];
switch ($mtype) 
{
	case "water50": $add = 50;break;
	case "water75": $add = 75;break;
	case "water125": $add = 125;break;
}
$zaman=time()+90*60;
$my_id=$db["id"];

$type='mg_water';
if($db["battle"])
{
	say($login, "�� �� ������ ��������� ��� �������� �������� � ���!", $login);
}
else
{
	mysql_query("DELETE FROM effects WHERE user_id=".$my_id." and type='".$type."'");
	mysql_query("INSERT INTO effects (user_id,type,elik_id,protect_water,end_time) VALUES ('$my_id','$type','$elik_id','$add','$zaman')");
	$_SESSION["message"]="�� ������ ������������ ���������� <b>&laquo;".$name."&raquo;</b>";
	drop($spell,$DATA);
}
echo "<script>location.href='main.php?act=inv&otdel=magic'</script>";
?>