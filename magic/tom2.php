<?
session_start();
$login=$_SESSION['login'];
$spell=$_GET['spell'];	
$have_tom_sl9=mysql_fetch_array(mysql_query("SELECT count(*) FROM slots_priem WHERE user_id=".$db["id"]." and sl_name='sl9'"));
if ($have_tom_sl9[0])
{
	$have_tom_sl10=mysql_fetch_array(mysql_query("SELECT count(*) FROM slots_priem WHERE user_id=".$db["id"]." and sl_name='sl10'"));
	if ($have_tom_sl10[0])
	{	
		$_SESSION["message"]="�� ��� ������� ���� ���!";
	}
	else
	{
		mysql_query("INSERT INTO slots_priem (user_id,sl_name) values (".$db["id"].",'sl10')");
		$_SESSION["message"]="�� ������ ������������ ���������� <b>&laquo;".$name."&raquo;</b>";
		drop($spell,$DATA);
	}
}
else
{
	$_SESSION["message"]="������� ��� ��� �������!";
}
echo "<script>location.href='main.php?act=inv&otdel=magic'</script>";
die();
?>