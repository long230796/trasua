<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class admin_model extends CI_Model {

	public $variable;

	public function __construct()
	{
		parent::__construct();
		
	}


	public function deleteSession($username)
	{

		$data = array(
			'SESSION' => ''
		);

		$this->db->where('TAIKHOAN', $username);
		$this->db->update('taikhoan', $data);
		return $this->db->affected_rows();
	}



	public function deleteSizeByMaloai($maloaitrasua)
	{
		$this->db->where('MALOAITRASUA', $maloaitrasua);
		$this->db->delete('ctsize');

		return $this->db->affected_rows();
	}

	public function deleteCtloaitrasuaByMaloai($maloaitrasua)
	{
		$this->db->where('MALOAITRASUA', $maloaitrasua);
		$this->db->delete('ctloaitrasua');

		return $this->db->affected_rows();
	}

	public function getDaytest($day, $month)
	{
		$this->db->select('*');
		$dl= $this->db->get('hoadon')->result_array();
		for ($i=0; $i < count($dl); $i++) { 
			$dl[$i]["NGAYLAP"] = date("d/m/Y", $dl[$i]["NGAYLAP"]);
		}
		
		$dayArray = array();
		foreach ($dl as $key => $value) {
			$temp = explode("/", $value["NGAYLAP"]);
			if ($day == $temp[0] && $month == $temp[1]) {
				array_push($dayArray, $value);
			}
		}

		
	}


	public function getThanhphanByMaloai($maloaitrasua)
	{
		$this->db->select('THANHPHAN');
		$this->db->where('MALOAITRASUA', $maloaitrasua);

		$dl = $this->db->get('ctsize');
		return $dl->result_array();
	}

	public function setSession($session, $username)
	{
		$data = array(
			'SESSION' => $session 
		);

		$this->db->where('TAIKHOAN', $username);
		$this->db->update('taikhoan', $data);
		return $this->db->affected_rows();
	}

	public function getSession() 
	{
		$this->db->select('SESSION');
		$dl = $this->db->get('taikhoan');
		$dl = $dl->result_array();
		return $dl;

	}

	public function getNhacungcap()
	{
		$this->db->select('*');
		$dl = $this->db->get('nhacungcap');
		$dl = $dl->result_array();
		return $dl;
	}

	public function getNhanvien()
	{
		$this->db->select('*');
		$dl = $this->db->get('nhanvien');
		return $dl->result_array();

	}

	public function getNguyenlieu()
	{
		$this->db->select('*');
		$dl = $this->db->get('nguyenlieu');
		$dl = $dl->result_array();
		return $dl;	
	}


	public function getKhachhang()
	{
		$this->db->select('*');
		$dl = $this->db->get('khachhang');

		return $dl->result_array();


	}


	public function getLimitHoadon()
	{
		$this->db->select('*');
		$this->db->order_by('NGAYLAP', 'desc');
		$dl = $this->db->get('hoadon', 5)->result_array();

		for ($i=0; $i < count($dl); $i++) { 
			$dl[$i]["NGAYLAP"] = date("d/m/Y", $dl[$i]["NGAYLAP"]);
		}


		$dl = $this->getCthoadonByMahoadon($dl);
		$dl = $this->getKhachhangBymahoadon($dl);
		return $dl;

	}


	public function getHoadonByMa($mahoadon)
	{
		$this->db->select('*');
		$this->db->where('MAHOADON', $mahoadon);
		$dl = $this->db->get('hoadon')->result_array();

		for ($i=0; $i < count($dl); $i++) { 
			$dl[$i]["NGAYLAP"] = date("d/m/Y", $dl[$i]["NGAYLAP"]);
		}


		$dl = $this->getCthoadonByMahoadon($dl);
		$dl = $this->getKhachhangBymahoadon($dl);
		return $dl;
	}

	public function getKhachhangBymahoadon($hoadon)
	{
		for ($i=0; $i < count($hoadon); $i++) { 
			$this->db->select('*');
			$this->db->where('MAKH', $hoadon[$i]["MAKHACHHANG"]);
			$dl = $this->db->get('khachhang')->result_array();
			$hoadon[$i]["KHACHHANG"] = $dl;
		}

		return $hoadon;
	}


	public function getCthoadonByMahoadon($hoadon)
	{	
		for ($i=0; $i < count($hoadon); $i++) { 
			$this->db->select('*');
			$this->db->where('MAHOADON', $hoadon[$i]["MAHOADON"]);
			$temp = $this->db->get('cthoadon')->result_array();
			$hoadon[$i]["CTHOADON"] = $temp;
			$hoadon[$i]["CTHOADON"]	= $this->getDongiaLoaitrasua($hoadon[$i]["CTHOADON"]);	

			$giahoadon = 0;
			for ($j=0; $j < count($hoadon[$i]["CTHOADON"]); $j++) { 
				$giahoadon += (int)$hoadon[$i]["CTHOADON"][$j]["GIA"] * $hoadon[$i]["CTHOADON"][$j]["SOLUONG"];					
			}	

			$hoadon[$i]["GIAHOADON"] = $giahoadon;
		
		}


		return $hoadon;


	}


	public function getDongiaLoaitrasua($arrayLoai)
	{
		for ($i=0; $i < count($arrayLoai); $i++) { 
			$this->db->select('TENLOAI, GIA');
			$this->db->where('MALOAITRASUA', $arrayLoai[$i]["MALOAITRASUA"]);
			$dl = $this->db->get('loaitrasua')->result_array();
			$dl[0]["TONG"] = $dl[0]["GIA"] * (int)$arrayLoai[$i]["SOLUONG"];

			for ($j=0; $j < count($dl); $j++) { 
				$arrayLoai[$i]["TENLOAI"] = $dl[$j]["TENLOAI"];
				$arrayLoai[$i]["DONGIA"] = $dl[$j]["GIA"];
				$arrayLoai[$i]["TONGCONG"] = $dl[$j]["TONG"];
				$arrayLoai[$i]["NGUYENLIEUBOSUNG"] = json_decode($arrayLoai[$i]["NGUYENLIEUBOSUNG"], true);
			}
		}

		return $arrayLoai;
	}


	

	public function getDondathang()
	{
		$this->db->select('MADONDH, MANHACUNGCAP');
		$dl = $this->db->get('dondh');

		return $dl->result_array();

	}


	public function getLimitLoaitrasua()
	{
		$this->db->select('MALOAITRASUA, TENLOAI, HINHANH');
		$dl = $this->db->get('loaitrasua');

		return $dl->result_array();;



	}


	public function getLoaitrasua()
	{
		$this->db->select('*');
		$dl = $this->db->get('loaitrasua')->result_array();

		for ($i=0; $i < count($dl); $i++) { 
			$dl[$i]["NGAYTAO"] = date("d/m/Y", $dl[$i]["NGAYTAO"]);
		}

		return $dl;
	}


	public function getLoaitrasuaByMaloai($maloaitrasua)
	{
		$this->db->select('*');
		$this->db->where('MALOAITRASUA', $maloaitrasua);
		$dl = $this->db->get('loaitrasua')->result_array();

		 
		$ctloai = $this->getCtloaitrasuaByMaloai(array($dl[0]["MALOAITRASUA"]));
		$dl[0]["CTLOAITRASUA"] = $ctloai[0];   // ctloai[0] 


		$size = $this->getCtSizeAndSizeByMaloaitrasua($dl[0]["MALOAITRASUA"]);
		$dl[0]["CTSIZE"] = $size;

		return $dl;

	}







	public function getBophan()
	{
		$this->db->select('*');
		$dl = $this->db->get('bophan');

		return $dl->result_array();
	}

	public function getGiaLoaitrasua($matenloai, $soluongmua)
	{
		$dl = array();
		for ($i=0; $i < count($matenloai); $i++) { 
			$this->db->select('MALOAITRASUA, GIA');
			$this->db->where('MALOAITRASUA', $matenloai[$i]);
			$temp = $this->db->get('loaitrasua')->result_array();
			$temp[0]["GIA"] *= (int)$soluongmua[$i];
			array_push($dl, $temp);
		}

		return $dl;
	}


	public function getGiaCtSize($matenloai, $soluongmua, $masize)
	{
		$dl = array();
		for ($i=0; $i < count($matenloai); $i++) { 
			$this->db->select('MALOAITRASUA, GIA, MASIZE, KHOILUONGRIENG');
			$this->db->where('MALOAITRASUA', $matenloai[$i]);
			$temp = $this->db->get('ctsize')->result_array();

			foreach ($temp as $keyTemp => $valueTemp) {
				if ($valueTemp["MASIZE"] == $masize[$i]) {
					$tempArray = array(
						'MALOAITRASUA' => $valueTemp["MALOAITRASUA"], 
						'GIA' => $valueTemp["GIA"] * (int)$soluongmua[$i]
					);

					array_push($dl, array($tempArray));
				}
			}

		}

		return $dl;
	}



	public function getGianguyenlieuthem($nguyenlieuthem, $soluongthem)
	{
		if ($nguyenlieuthem) {
			$dl = array();
			for ($i=0; $i < count($nguyenlieuthem); $i++) { 
				$this->db->select('TENNL, DONGIA');
				$this->db->where('MANGUYENLIEU', $nguyenlieuthem[$i]);
				$temp = $this->db->get('nguyenlieu')->result_array();
				$temp[0]["DONGIA"] *= $soluongthem[$i];
				array_push($dl, $temp);
			}

			return $dl;
		} 
	}


	public function getCtloaitrasuaByMaloai($maloaitrasua)
	{
		$dl = array();
		for ($i=0; $i < count($maloaitrasua); $i++) { 
			$this->db->where('MALOAITRASUA', $maloaitrasua[$i]);
			$temp = $this->db->get('ctloaitrasua')->result_array();

			// find tenNL
			for ($j=0; $j < count($temp); $j++) { 
				$this->db->select('TENNL');
				$this->db->where('MANGUYENLIEU', $temp[$j]["MANGUYENLIEU"]);
				$temp2 = $this->db->get('nguyenlieu')->result_array();
				$temp[$j]["TENNL"] = $temp2[0]["TENNL"];
			}
			array_push($dl, $temp);
			
			
		}
		
		return $dl;

	}


	public function getCtloaitrasuaByMaloai2($maloaitrasua)
	{
		$this->db->select('MANGUYENLIEU, LIEULUONG, DONVI, GHICHU');
		$this->db->where('MALOAITRASUA', $maloaitrasua);

		$dl = $this->db->get('ctloaitrasua');
		return $dl->result_array();
	}

	public function getCtSize($maloaitrasua, $masize)
	{
		$dl = array();
		$maloaitrasua = array_unique($maloaitrasua);
		for ($i=0; $i < count($maloaitrasua); $i++) { 
			$this->db->select('MALOAITRASUA, MASIZE, THANHPHAN');
			$this->db->where('MALOAITRASUA', $maloaitrasua[$i]);
			$temp = $this->db->get('ctsize')->result_array();

			foreach ($masize as $key => $value) {
				foreach ($temp as $keyTemp => $valueTemp) {
				 	if ($value == $valueTemp["MASIZE"]) {
				 		$thanhphan = json_decode($valueTemp["THANHPHAN"], true);
			 			$tempArray2 = array();

				 		foreach ($thanhphan as $keytp => $valuetp) {
				 			$valueTemp["MANGUYENLIEU"] = $valuetp["MANGUYENLIEU"];
				 			$valueTemp["LIEULUONG"] = $valuetp["LIEULUONG"];
				 			$valueTemp["DONVI"] = $valuetp["DONVI"];
				 			$valueTemp["GHICHU"] = $valuetp["GHICHU"];
					 		unset($valueTemp["THANHPHAN"]);
				 			array_push($tempArray2, $valueTemp);
				 		}

						array_push($dl, $tempArray2);
				 	}
				 } 
			}
			
			
		}
		
		return $dl;
	}


	public function getCtSizeAndSizeByMaloaitrasua($maloaitrasua)
	{
		$this->db->select('*');
		$this->db->where('MALOAITRASUA', $maloaitrasua);
		$dl = $this->db->get('ctsize')->result_array();

		for ($i=0; $i < count($dl); $i++) { 
			$this->db->select('*');
			$this->db->where('MASIZE', $dl[$i]["MASIZE"]);

			$temp = $this->db->get('size')->result_array();
			$dl[$i]["TENSIZE"] = $temp[0]["TENSIZE"];
		}

		return $dl;
	}



	public function getNguyenlieuByMa($manl)
	{
		$this->db->where('MANGUYENLIEU', $manl);
		$dl = $this->db->get('nguyenlieu')->result_array;

		return $dl;
	}


	public function getTaikhoan()
	{
		$this->db->select('*');

		$dl = $this->db->get('taikhoan');

		return $dl->result_array();
	}


	public function getSize()
	{
		$this->db->select('*');
		$dl = $this->db->get('size');
		return $dl->result_array();
	}


	public function getCtSizeWithTensize()
	{
		$this->db->select('MALOAITRASUA, MASIZE');
		$dl = $this->db->get('ctsize')->result_array();
		for ($i=0; $i < count($dl); $i++) { 
			$this->db->select('TENSIZE');
			$this->db->where('MASIZE', $dl[$i]["MASIZE"]);
			$temp = $this->db->get('size')->result_array();
			$dl[$i]["TENSIZE"] = $temp[0]["TENSIZE"];
			
		}
		return $dl;
	}


	public function getkhoiluongsizeByMasize($masize)
	{
		$dl = array();
		for ($i=0; $i < count($masize); $i++) { 
			$this->db->select('*');
			$this->db->where('MASIZE', $masize[$i]);
			$temp = $this->db->get('khoiluongsize')->result_array();

			array_push($dl, $temp[0]["KHOILUONGRIENG"]);
		}

		return $dl;
	}


	public function insertCtcungcap($mactcc, $mancc, $manl, $soluong, $dongia)
	{
		for ($i=0; $i < count($manl); $i++) { 
			$data = array(
				'MANHACUNGCAP' => $mancc, 
				'MANGUYENLIEU' => $manl[$i], 
				'MACTCUNGCAP' => $mactcc,
				'SOLUONG' => $soluong[$i], 
				'DONGIA' => $dongia[$i] 
			);

			$this->db->insert('ctcungcap', $data);
		}

		return $this->db->affected_rows();
	}


	public function insertKhachhang($makh, $ho, $ten, $sdt)
	{
		$data = array(
			'MAKH' => $makh, 
			'HO' => $ho, 
			'TEN' => $ten, 
			'SDT' => $sdt 
		);

		$this->db->insert('khachhang', $data);
		return $this->db->affected_rows();
	}


	public function insertPhieunhap($mapn, $maddh, $manv)
	{
		$data = array(
			'MAPHIEUNHAP' => $mapn, 
			'MADONDH' => $maddh, 
			'MANV' => $manv 
		);

		$this->db->insert('phieunhap', $data);
		return $this->db->affected_rows();
	}

	public function insertCtphieunhap($manl, $mapn, $soluong, $donvi, $ghichu)
	{
		for ($i=0; $i < count($manl); $i++) { 
			$data = array(
				'MANGUYENLIEU' => $manl[$i], 
				'MAPHIEUNHAP' => $mapn, 
				'SOLUONG' => $soluong[$i], 
				'DONVI' => $donvi[$i], 
				'GHICHU' => $ghichu[$i], 
			);

			$this->db->insert('ctphieunhap', $data);
		}

		return $this->db->affected_rows();
	}


	public function insertPhieugiao($maphieugiao, $mahoadon, $manv, $nhanviengiao, $trangthai)
	{
		$data = array(
			'MAPGH' => $maphieugiao, 
			'MAHOADON' => $mahoadon, 
			'MANV' => $manv, 
			'MANHANVIENGIAO' => $nhanviengiao,
			'TRANGTHAI' => $trangthai
			
		);

		$this->db->insert('phieugiao', $data);

		return $this->db->affected_rows();
		
	}


	public function insertCtphieugiao($cthoadon, $maphieugiao, $diachigiao)
	{
		for ($i=0; $i < count($cthoadon); $i++) { 
			$data = array(
				'MALOAITRASUA' => $cthoadon[$i]["MALOAITRASUA"], 
				'MAPGH' => $maphieugiao, 
				'diachigiao' => $diachigiao 
			);

			$this->db->insert('ctphieugiaohang', $data);

		}

		return $this->db->affected_rows();
	}



	public function insertLoaitrasua($maloaitrasua, $tenloai, $mota, $gia, $hinhanh, $trangthai)
	{
		$data = array(
			'MALOAITRASUA' => $maloaitrasua, 
			'TENLOAI' => $tenloai, 
			'MOTA' => $mota, 
			'GIA' => $gia, 
			'HINHANH' => $hinhanh, 
			'TRANGTHAI' => $trangthai, 
		);

		$this->db->insert('loaitrasua', $data);

		return $this->db->affected_rows();
	}


	public function insertCtloaitrasua($maloai, $manguyenlieu, $lieuluong, $donvi, $ghichu)
	{
		for ($i=0; $i < count($manguyenlieu); $i++) { 
			$data = array(
				'MALOAITRASUA' => $maloai, 
				'MANGUYENLIEU' => $manguyenlieu[$i], 
				'LIEULUONG' => $lieuluong[$i], 
				'DONVI' => $donvi[$i],
				'GHICHU' => $ghichu[$i] 
			);

			$this->db->insert('ctloaitrasua', $data);
		}

		return $this->db->affected_rows();
	}

	public function insertHoadon($mahoadon, $manv, $makh)
	{
		$data = array(
			'MAHOADON' => $mahoadon, 
			'MANV' => $manv, 
			'MAKHACHHANG' => $makh 
		);

		$this->db->insert('hoadon', $data);
		return $this->db->affected_rows();
	}

	public function insertCthoadon($mahoadon, $tensize, $matenloai, $soluongmua, $nguyenlieubosung, $finalPrices)
	{

		for ($i=0; $i < count($matenloai); $i++) { 
			$data = array(
				'MAHOADON' => $mahoadon, 
				'TENSIZE' => $tensize[$i], 
				'MALOAITRASUA' => $matenloai[$i], 
				'SOLUONG' => $soluongmua[$i], 
				'NGUYENLIEUBOSUNG' => json_encode($nguyenlieubosung[$i]),
				'GIA' => $finalPrices[$i]
			);
			
			$this->db->insert('cthoadon', $data);
		}

		return $this->db->affected_rows();

	}



	public function insertTaikhoan($mataikhoan, $taikhoan, $matkhau, $vaitro, $trangthai)
	{
		$dl = array(
			'MATAIKHOAN' => $mataikhoan, 
			'TAIKHOAN' => $taikhoan, 
			'MATKHAU' => $matkhau, 
			'VAITRO' => $vaitro, 
			'TRANGTHAI' => $trangthai 
		);	

		$this->db->insert('taikhoan', $dl);
		return $this->db->affected_rows();
	}

	public function insertNhanvien($manv, $ho, $ten, $sdt, $avatar, $mabp, $mataikhoan)
	{
		$dl = array(
			'MANV' => $manv, 
			'HO' => $ho, 
			'TEN' => $ten, 
			'SDT' => $sdt, 
			'AVATAR' => $avatar, 
			'MABP' => $mabp, 
			'MATAIKHOAN' => $mataikhoan 
		);

		$this->db->insert('nhanvien', $dl);
		return $this->db->affected_rows();
	}


	public function insertNhacungcap($manhacungcap, $ten, $sdt, $diachi)
	{
		$data = array(
			'MANHACUNGCAP' => $manhacungcap, 
			'TEN' => $ten, 
			'SDT' => $sdt,
			'DIACHI' => $diachi
		);

		$this->db->insert('nhacungcap', $data);
		return $this->db->affected_rows();
	}

	public function insertNguyenlieumoi($manguyenlieu, $tennl)
	{
		for ($i=0; $i < count($manguyenlieu); $i++) { 
			if ($manguyenlieu[$i]) {
				$data = array(
					'MANGUYENLIEU' => $manguyenlieu[$i], 
					'TENNL' => $tennl[$i] 

				);
				$this->db->insert('nguyenlieu', $data);
			}

		}
		return $this->db->affected_rows();	
	}



	public function insertDondathang($madondh, $manhacungcap, $nguoilap)
	{
		$data = array(
			'MADONDH' => $madondh, 
			'MANHACUNGCAP' => $manhacungcap, 
			'NGUOILAP' => $nguoilap,
			'NGAYLAP' => date("d/m/Y h:i:sa")
		);

		$this->db->insert('dondh', $data);
		return $this->db->affected_rows();
	}


	public function insertCtdondathang($madondh, $manguyenlieu, $soluong, $donvi, $ghichu) 
	{
		for ($i=0; $i < count($manguyenlieu); $i++) { 
			$data = array(
				'MADONDATHANG' => $madondh, 
				'MANGUYENLIEU' => $manguyenlieu[$i], 
				'SOLUONG' => $soluong[$i], 
				'DONVI' => $donvi[$i], 
				'GHICHU' => $ghichu[$i] 
			);
			$this->db->insert('ctdondathang', $data);
		}

		return $this->db->affected_rows();
	}



	// public function insertSize($masize, $tensize)
	// {
	// 	$data = array(
	// 		'MASIZE' => $masize, 
	// 		'TENSIZE' =>  $tensize
	// 	);

	// 	$this->db->insert('size', $data);
	// 	return $this->db->affected_rows();
	// }

	public function insertCtsize($maloaitrasua, $masize, $khoiluongrieng, $gia, $thanhphan)
	{
		$data = array(
			'MALOAITRASUA' => $maloaitrasua, 
			'MASIZE' => $masize, 
			'KHOILUONGRIENG' => $khoiluongrieng, 
			'GIA' => $gia, 
			'THANHPHAN' => $thanhphan 
		);
		// for ($i=0; $i < count($masize); $i++) { 
			
		// }
		$this->db->insert('ctsize', $data);
		return $this->db->affected_rows();

	}



	public function insertLichsuChinhsua($machinhsua, $maloaitrasua, $chitietchinhsua)
	{
		$dl = array(
			'MACHINHSUA' => $machinhsua,
			'MALOAITRASUA' => $maloaitrasua, 
			'CHITIETCHINHSUA' => json_encode($chitietchinhsua) 
		);

		$this->db->insert('lichsuchinhsua', $dl);
		return $this->db->affected_rows();
	}



	


	public function updateNguyenlieuTonkho($manl, $soluong, $donvi)
	{
		for ($i=0; $i < count($manl); $i++) { 
			
			$this->db->where('MANGUYENLIEU', $manl[$i]);
			$dl = $this->db->get('nguyenlieu')->result_array();
			$data = array(
				'TONKHO' => $soluong[$i]+=$dl[0]["TONKHO"],
				'DONVI' => $donvi[$i]
			);
			$this->db->where('MANGUYENLIEU', $manl[$i]);
			$this->db->update('nguyenlieu', $data);
		}

		return $this->db->affected_rows();
	}

	public function updateNguyenlieu($kho)
	{
		for ($i=0; $i < count($kho); $i++) { 
			$this->db->where('MANGUYENLIEU', $kho[$i]["MANGUYENLIEU"]);
			$dl = array(
				'TONKHO' => $kho[$i]["TONKHO"] 
			);

			$this->db->update('nguyenlieu', $dl);
		}
		return $this->db->affected_rows();
	}


	public function updateVaitroTaikhoan($matk, $vaitro)
	{
		$this->db->where('MATAIKHOAN', $matk);
		$dl = array(
			'VAITRO' => $vaitro 
		);

		$this->db->update('taikhoan', $dl);

		return $this->db->affected_rows();
	}


	public function updateManvqlBophan($mabp, $manvql)
	{
		$dl = array(
			'MANVQL' =>  $manvql
		);


		$this->db->where('MABP', $mabp);
		$this->db->update('bophan', $dl);

		return $this->db->affected_rows();
	}

	public function updateMabophanNhanvien($manv, $mabp)
	{
		$this->db->where('MANV', $manv);
		$dl = array(
			'MABP' => $mabp 
		);

		$this->db->update('nhanvien', $dl);

		return $this->db->affected_rows();


	}


	public function updateLoaitrasua($maloaitrasua, $data, $field)
	{
		$dl = array(
			$field => $data 
		);
		$this->db->where('MALOAITRASUA', $maloaitrasua);

		$this->db->update('loaitrasua', $dl);
		return $this->db->affected_rows();
	}



	public function updateCtloaitrasua($maloai, $manguyenlieu, $lieuluong, $donvi, $ghichu)
	{
		for ($i=0; $i < count($manguyenlieu); $i++) { 
			$data = array(
				'MALOAITRASUA' => $maloai, 
				'MANGUYENLIEU' => $manguyenlieu[$i], 
				'LIEULUONG' => $lieuluong[$i], 
				'DONVI' => $donvi[$i],
				'GHICHU' => $ghichu[$i] 
			);
			$this->db->insert('ctloaitrasua', $data);
		}

		return $this->db->affected_rows();
	}


	public function updateCtsize($maloaitrasua, $masize, $khoiluongrieng, $gia, $thanhphan)
	{
		$data = array(
			'MALOAITRASUA' => $maloaitrasua, 
			'MASIZE' => $masize, 
			'KHOILUONGRIENG' => $khoiluongrieng, 
			'GIA' => $gia, 
			'THANHPHAN' => $thanhphan 
		);
		$condition = array('MALOAITRASUA' => $maloaitrasua);

		$this->db->insert('ctsize', $data);
		return $this->db->affected_rows();

	}


	public function lockAccount($mataikhoan)
	{
		$this->db->where('MATAIKHOAN', $mataikhoan);
		$dl = array(
			'TRANGTHAI' => 0 
		);

		$this->db->update('taikhoan', $dl);
		return $this->db->affected_rows();
	}
	

	public function unlockAccount($mataikhoan)
	{
		$this->db->where('MATAIKHOAN', $mataikhoan);
		$dl = array(
			'TRANGTHAI' => 1 
		);

		$this->db->update('taikhoan', $dl);
		return $this->db->affected_rows();
	}

	public function lockProduct($maloaitrasua)
	{
		$this->db->where('MALOAITRASUA', $maloaitrasua);
		$dl = array(
			'TRANGTHAI' => 0 
		);

		$this->db->update('loaitrasua', $dl);
		return $this->db->affected_rows();
	}


	public function unlockProduct($maloaitrasua)
	{
		$this->db->where('MALOAITRASUA', $maloaitrasua);
		$dl = array(
			'TRANGTHAI' => 1 
		);

		$this->db->update('loaitrasua', $dl);
		return $this->db->affected_rows();
	}


	public function checkEmptyAdminBophan($mabp)
	{
		$this->db->select('MANVQL');
		$this->db->where('MABP', $mabp);
		$dl = $this->db->get('bophan')->result_array();

		if ($dl[0]["MANVQL"]) {
			return false;
		} else {
			return true;
		}
	}

	public function KiemtraMaloaiTrongLichsuchinhsua($maloaitrasua)
	{
		$this->db->select('MALOAITRASUA');
		$this->db->where('MALOAITRASUA', $maloaitrasua);
		$dl = $this->db->get('lichsuchinhsua')->result_array();

		if (!empty($dl)) {
			return true;
		} else {
			return false;
		}


	}


	public function findNhanvienByMa($manhanvien)
	{
		$this->db->select('*');
		$this->db->where('MANV', $manhanvien);
		$dl = $this->db->get('nhanvien')->result_array();

		return $dl;
	}


	public function findManhanvien($mataikhoan)
	{
		$this->db->where('MATAIKHOAN', $mataikhoan);
		$this->db->select('MANV');
		$dl = $this->db->get('nhanvien');

		return $dl->result_array();
	}



}

/* End of file admin_model.php */
/* Location: ./application/models/admin_model.php */