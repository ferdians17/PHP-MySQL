<?php
class database
{
	protected $koneksi;
	protected $perintah;
	protected $jumlah;

	function __construct()
	{
		$this->koneksi =  new mysqli(HOST_NAME, HOST_USER, HOST_PASS, HOST_DATA);
		
		if ($this->koneksi->connect_error)
		{
			echo "Koneksi ke server bermasalah!";
		}
	}

	function query($sql)
	{
		return $this->perintah = $this->koneksi->query($sql);
	}

	function num_rows()
	{
		return $this->jumlah = $this->perintah->num_rows;
	}

	function fetch_all()
	{
		$array = array();
		while ($data =  $this->perintah->fetch_assoc())
		{
			array_push($array, $data);
		}
		return $array;
	}

	function fetch_one()
	{
		return $this->perintah->fetch_assoc();
	}
}