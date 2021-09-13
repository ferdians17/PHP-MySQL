<?php
class utama extends sistem_de
{
	function cek_login()
	{
		session_start();
		$mail = $_SESSION['mail'];
		$pass = $_SESSION['pass'];

		if (!empty($mail) && !empty($pass))
		{
			if ($this->data("telepon")->ceklog($mail, $pass) < 1)
			{
				header("Location: " . __URL__ . "/utama/login/");
			}
		}
		else
		{
			header("Location: " . __URL__ . "/utama/login/");
		}
	}

	function default()
	{
		$this->cek_login();
		$data['title'] = "Buku Telepon - Halaman Admin";
		$data['member'] = $this->data("telepon")->getMember();
		$this->tampil("template/header", $data);
		$this->tampil("home", $data);
		$this->tampil("template/footer");
	}

	function kosong()
	{
		$this->cek_login();
		$data['title'] = "Buku Telepon - Halaman Tidak Ditemukan";
		$this->tampil("template/header", $data);
		$this->tampil("error");
		$this->tampil("template/footer");
	}

	function settings()
	{	
		$this->cek_login();
		$data['title'] = "Buku Telepon - Pengaturan Data Diri";
		$data['me'] =  $this->data("telepon")->getMe();
		$this->tampil("template/header", $data);
		$this->tampil("settings", $data);
		$this->tampil("template/footer");
	}

	function loginpro()
	{
		$mail = $_POST['mail'];
		$pass = $_POST['pass'];
		if (!empty($mail) && !empty($pass))
		{
			$pass = md5($pass);
			if ($this->data("telepon")->ceklog($mail, $pass) > 0)
			{
				session_start();
				$_SESSION['mail'] = $mail;
				$_SESSION['pass'] = $pass;
				echo "success";
			}
			else
			{
				echo "Data tidak ditemukan!";
			}
		}
		else
		{
			echo "Data tidak boleh dikosongkan!";
		}
	}

	function logout()
	{
		session_start();
		session_destroy();
		header("Location:" . __URL__);
	}

	function login()
	{
		$data['title'] = "Buku Telepon - Halaman Masuk";
		$this->tampil("login", $data);
	}
}