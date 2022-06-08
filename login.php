<?PHP

session_start();

include("config.php");
include("includes/DB.class.php");
include("includes/Pegawai.class.php");
include("includes/RiwayatLogin.class.php");

$pegawai = new Pegawai($db_host, $db_user, $db_pass, $db_name);
$riwayat_login = new RiwayatLogin($db_host, $db_user, $db_pass, $db_name);
$pegawai->open();
$riwayat_login->open();

$nip = $_POST['nip'];
$password = $_POST['pass'];
$password_md5 = md5($password);

if($nip != '' && $password != '') {
	$query = $pegawai->getLogin($nip, $password_md5);
	$data = $pegawai->getResult();

	$nip = $data['no_induk'];
	$tgl = date("Y-m-d");
	$waktu = date("h:i:sa");

	$riwayat_login->setRiwayatLogin($nip, $tgl, $waktu);

	if(mysqli_num_rows($query) < 1) {
		setcookie("message", "Login tidak berhasil! NIP atau Password salah.", time()+60);
		header('location: index.php');
	}else {
		$_SESSION['nip'] = $data['no_induk'];
		$_SESSION['nama'] = $data['nama_pegawai'];
		$_SESSION['jabatan'] = $data['jabatan'];
		$_SESSION['divisi'] = $data['divisi'];

		setcookie("message", "", time()+60);
		header("location: menu1_operator.php");
	}
}

?>
