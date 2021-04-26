<?php

$connect = mysqli_connect("localhost",  "root", "", "student");
mysqli_query($connect,"SET NAMES 'utf8'");

$query = "SELECT * FROM sinhvien";
$data = mysqli_query($connect, $query);

/*
while($row = mysqli_fetch_assoc($data)){
	echo $row['MSSV'] . '<br/>';
	echo $row['NameStu'] . '<br/>';
	echo $row['BuoiHoc'] . '<br/>';
}
*/

//1. tạo class sinhvien
class SinhVien{
	public $MSSV;
	public $NameStu;
	public $BuoiHoc;
	
	function __construct($mssv, $nameStu, $buoiHoc){
		$this->MSSV = $mssv;
		$this->NameStu = $nameStu;
		$this->BuoiHoc = $buoiHoc;
	}
	function SinhVien($mssv, $nameStu, $buoiHoc){
		$this->MSSV = $mssv;
		$this->NameStu = $nameStu;
		$this->BuoiHoc = $buoiHoc;
	}
}
// 2.tạo mảng
$mangSV = array();
//3.thêm phần tử vào mảng


while($row = mysqli_fetch_assoc($data)){
	//echo $row['MSSV'] . '<br/>';
	//echo $row['NameStu'] . '<br/>';
	//echo $row['BuoiHoc'] . '<br/>';
	//tmp = new SinhVien;
	$mangSV[] = new SinhVien($row['MSSV'], $row['NameStu'], $row['BuoiHoc']);
}

//array_push($mangSV, "51900621", "Lê Thị Hằng", 10);
//array_push($mangSV, "51900621", "Lê Thị Hằng", 10);
//array_push($mangSV, "51900231", "Lê Thị Hằng", 10);

//4.chuyển định dạng của mảng -> JSON
echo json_encode($mangSV);

?>