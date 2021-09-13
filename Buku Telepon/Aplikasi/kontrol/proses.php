<?php
class proses extends sistem_de
{
	function default()
	{
		echo "Hello!";
	}

	function add()
	{
		$nama = $_POST['nama'];
		$nomor = $_POST['nomor'];
		$kelamin = $_POST['kelamin'];
		$alamat = $_POST['alamat'];

		if($this->data("telepon")->addNew($nama, $nomor, $kelamin, $alamat))
		{
			echo "Thanks, added success!";
		}
		else
		{
			echo "Oh no, added failed!";
		}
	}

	function update()
	{
		$id = $_POST['id'];
		$nama = $_POST['nama'];
		$nomor = $_POST['nomor'];
		$kelamin = $_POST['kelamin'];
		$alamat = $_POST['alamat'];

		if($this->data("telepon")->proedit($nama, $nomor, $kelamin, $alamat, $id))
		{
			echo "Thanks, update success!";
		}
		else
		{
			echo "Oh no, update failed!";
		}
	}

	function delete()
	{
		$id = $_POST['id'];

		if($this->data("telepon")->dell($id))
		{
			echo "Thanks, success deleted!";
		}
		else
		{
			echo "Oh no, failed to delete!";
		}
	}

	function mid()
	{
		$id =  $_POST['id'];
		echo json_encode( $this->data("telepon")->getMid($id) );
	}

	function search()
	{
		$key =  $_POST['keyword'];
		echo json_encode( $this->data("telepon")->getSearch($key) );
	}

	function upMe()
	{
		$id = $_POST['id'];
		$nama = $_POST['nama'];
		$email = $_POST['email'];
		$admin_pass = $_POST['admin_pass'];
		$old_password = $_POST['old_password'];
		$new_password = $_POST['new_password'];
		$confirm_password = $_POST['confirm_password'];

		if ($admin_pass !== md5($old_password))
		{
			echo "Katasandi lama tidak sesuai dengan katasandi yang digunakan saat ini!";
		}

		else if ($new_password !== $confirm_password)
		{
			echo "Katasandi baru dengan konfirmasi katasandi tidak cocok, silahkan mengecek kembali!";
		}

		else
		{
			if ($this->data("telepon")->prome($nama, $email, md5($new_password), $id))
			{
				echo "Perubahan berhasil dilakukan!";
			}

			else
			{
				echo "Perubahan tidak berhasil dilakukan!";
			}
		}
	}
}