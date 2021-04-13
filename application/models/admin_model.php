<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class admin_model extends CI_Model {

	public $variable;

	public function __construct()
	{
		parent::__construct();
		
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

	public function getDondathang()
	{
		$this->db->select('MADONDH, MANHACUNGCAP');
		$dl = $this->db->get('dondh');

		return $dl->result_array();

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

	public function insertCthoadon($mahoadon, $matenloai, $soluongmua, $nguyenlieubosung, $finalPrices)
	{

		for ($i=0; $i < count($matenloai); $i++) { 
			$data = array(
				'MAHOADON' => $mahoadon, 
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



	public function getLoaitrasua()
	{
		$this->db->select('MALOAITRASUA, TENLOAI');
		$dl = $this->db->get('loaitrasua');

		return $dl->result_array();;



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
			array_push($dl, $temp);
			
			
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