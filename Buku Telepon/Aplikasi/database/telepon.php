<?php
class telepon extends database
{
	function addNew($a, $b, $c, $d)
	{
		return  $this->query("INSERT INTO member VALUES (NULL, '$a', '$b', '$c', '$d')");
	}

	function proedit($a, $b, $c, $d, $e)
	{
		return  $this->query("UPDATE member SET nama='$a', nomor='$b', kelamin='$c', alamat='$d' WHERE id='$e'");
	}

	function dell($a)
	{
		return  $this->query("DELETE FROM member WHERE id='$a'");
	}

	function getMember()
	{
		$this->query("SELECT * FROM member ORDER BY id DESC");
		return $this->fetch_all();
	}

	function getMe()
	{
		$this->query("SELECT * FROM admin WHERE id='1'");
		return $this->fetch_one();
	}

	function getSearch($a)
	{
		$this->query("SELECT * FROM member WHERE nama LIKE '%$a%'");
		return $this->fetch_all();
	}

	function getMid($a)
	{
		$this->query("SELECT * FROM member WHERE id='$a'");
		return $this->fetch_one();
	}

	function prome($a, $b, $c, $d)
	{
		return $this->query("UPDATE admin SET nama='$a', email='$b', password='$c' WHERE id='$d'");
	}

	function ceklog($a, $b)
	{
		$this->query("SELECT * FROM admin WHERE email='$a' AND password='$b'");
		return $this->num_rows();
	}
}