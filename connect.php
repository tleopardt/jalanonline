<?php 
 
class DB{
	protected $koneksi;

	 function bukakoneksi(){
	 	try {
	 		$this->koneksi = new PDO("mysql:host=localhost;dbname=jalanonline","root","",array(
	 			PDO::ATTR_PERSISTENT=>TRUE));
	 	} catch (PDOException $e) {
	 		echo $e->getMessage();
	 	}
	 	return $this->koneksi;
	 }
	function Login($email,$password){
	 	try {
	 		$sQL = $this->bukakoneksi()->prepare("select * from user where email=:email and password=:password");
	 		$sQL->bindParam(':email',$email);
	 		$sQL->bindParam(':password',$password);
	 		$sQL->execute();
	 		return $sQL;
	 	} catch (PDOException $e) {
	 		echo $e->getMessage();
	 	}
	 }
} 
class tampil extends DB{

	function GetData($kriteria){
	 	try {
	 		$sQL = $this->bukakoneksi()->prepare("Select * from destinasi");
	 		$sQL->execute();
	 		return $sQL;
	 	} catch (PDOException $e) {
	 		echo $e->getMessage();
	 	}
	 }
	}
	class tampils extends DB{

	function GetData($kriteria){
	 	try {
	 		$sQL = $this->bukakoneksi()->prepare("Select * from nota");
	 		$sQL->execute();
	 		return $sQL;
	 	} catch (PDOException $e) {
	 		echo $e->getMessage();
	 	}
	 }
	}

class Nama extends DB{

 	function GetData($kriteria){
 	 	try {
 	 		$sQL = $this->bukakoneksi()->prepare("Select * from user");
 	 		$sQL->execute();
 	 		return $sQL;
 	 	} catch (PDOException $e) {
 	 		echo $e->getMessage();
 	 	}
	 }
} 
class Toko extends DB{
	private $sQLInsert;
 	private $sQLRubah;
 	private $sQLHapus;
 	
	function __construct()
	{
		try{
	 		$this->sQLInsert = $this->bukakoneksi()->prepare("insert into destinasi(tujuan,transportasi,waktu,harga,desc) values(:tujuan, :transportasi, :waktu, :harga, :desc)");
	 		$this->sQLRubah = $this->bukakoneksi()->prepare("update destinasi set tujuan=:tujuan, transportasi=:transportasi, waktu=:waktu, harga=:harga, desc=:desc, foto=:foto where id=:id");
	 		$this->sQLHapus = $this->bukakoneksi()->prepare("delete from destinasi where id=:id");

	 	}
	 	catch (PDOException $e){
	 		echo $e->getMessage();
	 	}
	}
	 function Sotomatis(){
	 	try {
	 		$sQL = $this->bukakoneksi()->prepare("Select nik from penghuni order by nik DESC limit 1");
	 		$sQL->execute();
			$getcoba = $sQL->fetch();
        	

	 		$kode = substr($getcoba['nik'], 2);
	 		$kode = intval($kode) + 1;

	 		$kode = "00".$kode;
	 		
	 		return $kode;
	 	} catch (PDOException $e) {
	 		echo $e->getMessage();	
	 	}
	 }
	 function simpanjualan($tujuan, $transportasi, $waktu, $harga, $desc){
	 	try {
	 		$this->sQLInsert->bindParam(':tujuan',$tujuan);
	 		$this->sQLInsert->bindParam(':transportasi',$transportasi);
	 		$this->sQLInsert->bindParam(':waktu',$waktu);
	 		$this->sQLInsert->bindParam(':harga',$harga);
	 		$this->sQLInsert->bindParam(':desc',$desc);
	 		$this->sQLInsert->execute();
	 		return $this->sQLInsert;
	 	} catch (PDOException $e){
	 		echo $e->getMessage();	
	 	}
	 }
	 function rubahpeng( $tujuan, $transportasi, $waktu, $harga, $desc, $file){
	 	try {
	 		$this->sQLInsert->bindParam(':tujuan',$tujuan);
	 		$this->sQLInsert->bindParam(':transportasi',$transportasi);
	 		$this->sQLInsert->bindParam(':waktu',$waktu);
	 		$this->sQLInsert->bindParam(':harga',$harga);
	 		$this->sQLInsert->bindParam(':desc',$desc);
	 		$this->sQLInsert->bindParam(':file',$file);
	 		$this->sQLRubah->execute();
	 		return $this->sQLRubah;
	 	} catch (PDOException $e) {
	 		echo $e->getMessage();	
	 	}
	 }
	 function hapuspeng($id){
	 	try {
	 		$this->sQLHapus->bindParam(':id',$id);
	 		$this->sQLHapus->execute();
	 		return $this->sQLHapus;
	 	} catch (PDOException $e) {
	 		echo $e->getMessage();	
	 	}
	 }
	 function getNIK(){
	 	try {
	 		$sQL = $this->bukakoneksi()->prepare("Select nik,nama from penghuni");
	 		$sQL->execute();

	 		return $sQL;
	 	} catch (PDOException $e) {
	 		echo $e->getMessage();	
	 	}
	 }
}

?>