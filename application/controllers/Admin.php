<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Admin extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->model('admin_model');
	}

	public function index()
	{
		$cookie = get_cookie("SESSIONID");

		if ($this->checkCookie($cookie)) {
			$this->load->view('index_view');		
		}

	}

	public function login()
	{
		if ($this->input->server('REQUEST_METHOD') === 'GET') {
			$this->load->view('login_view');
		} else {
			$this->requestLogin();
		}


	}


	public function requestLogin()
	{
		$username = $this->input->post('username');
		$password = md5($this->input->post('password'));

	

		$this->db->select('*');
		$this->db->where('TAIKHOAN', $username);
		$dl = $this->db->get('taikhoan')->result_array();

		if (empty($dl)) {
			$message["message"] = array('Sai thông tin đăng nhập');
			$this->load->view('success_view', $message);
			return;
		}

		// lấy mã nhân viên
		$this->db->select('MANV');
	 	$this->db->where('MATAIKHOAN', $dl[0]["MATAIKHOAN"]);
	 	$manv = $this->db->get('nhanvien')->result_array();

	 	// kiểm tra vai trò
	 	$this->db->select('*');
	 	$this->db->where('MANVQL', $manv[0]['MANV']);
	 	$isAdmin = $this->db->get('bophan')->result_array();


		

		$passwordDb = $dl[0]["MATKHAU"];

		if ($password == $passwordDb) {

			if ($dl[0]["TAIKHOAN"] == "root@gmail.com") {
				$role = "boss";
			} else if(!empty($isAdmin)) {
				$role = "admin"; 
			} else {
				$role = "nhanvien";
			}
				

			date_default_timezone_set("Asia/Ho_Chi_Minh");
			// ngay het han
			// echo "The time is " . date("d/m/Y H:i:sa", strtotime('+1 hours')); 

			$sessionId = md5($dl[0]["TAIKHOAN"].$dl[0]["MATKHAU"].date("d/m/Y H:i:sa", strtotime('+174 seconds')));

			$newData = array(
				'id' => $sessionId,
				'username' => $dl[0]['TAIKHOAN'], 
				'ipaddress' => $this->input->ip_address(), 
				'useragent' => $this->input->user_agent(), 
				'manv' => $manv[0]['MANV'],
				'role' => $role,
				'createdate' => date("d/m/Y H:i:sa"), 
				'expiredate' => date("d/m/Y H:i:sa", strtotime('+3000 seconds')), 
			);

			$newDatas = array();

			array_push($newDatas, $newData);

			$newDatasJson = json_encode($newDatas);
			
			
			$isSetSession = $this->admin_model->setSession($newDatasJson, $dl[0]["TAIKHOAN"] );

			if (!$isSetSession) {
				echo "khong co thay doi row";
				return;
			} else {
				$this->input->set_cookie('SESSIONID', $newData['id'], 3000);
			}
			

			// $this->session->set_userdata('level', $dl[0]["level"]);
		

			$message["message"] = array('Đăng nhập thành công');
			redirect(base_url() . 'admin','refresh');
			return;
		}

		$message["message"] = array('Sai thông tin đăng nhậpAA');
		$this->load->view('success_view', $message);
		return;
		
	}


	public function checkCookie($cookie)
	{
		date_default_timezone_set("Asia/Ho_Chi_Minh");

		$dl = $this->admin_model->getSession();
		
		foreach ($dl as $key => $value) {
			$data = json_decode($value["SESSION"], true);
			if (is_array($data) || is_object($data)) {
				foreach ($data as $subData) {
					if ($cookie == $subData['id']) {
						// tim thay cookie
						if (date("d/m/Y H:i:sa") >= $subData["expiredate"]) {
							delete_cookie("SESSIONID");
							redirect(base_url() . 'admin/login','refresh');
							return false;
						} else {
							return array(
								'role' => $subData['role'], 
								'manv' => $subData['manv'] 

							);

						}
					} 

				}	
			}


		}

		delete_cookie("SESSIONID");
		redirect(base_url() . 'admin/login','refresh');
		return false;

		
	} 



	public function dondathang()
	{	

		if ($this->input->server('REQUEST_METHOD') === 'GET') {
			$cookie = get_cookie("SESSIONID");

			if ($this->checkCookie($cookie)) {

				$nhacungcap = $this->admin_model->getNhacungcap();
				$nguyenlieu = $this->admin_model->getNguyenlieu();
				
				$data['mangdulieu'] = array(
					'nhacungcap' => $nhacungcap, 
					'nguyenlieu' => $nguyenlieu 
				);

				
				$this->load->view('dondathang_view', $data);
			}
		} else {  // post
			$cookie = get_cookie("SESSIONID");
			$infoSession = $this->checkCookie($cookie);
			if ($infoSession) {
				$nhacungcapcu = $this->input->post('nhacungcapcu');
				$nhacungcapmoi = $this->input->post('nhacungcapmoi');
				$manhacungcapmoi = 'ncc' . uniqid();
				$sodienthoainhacungcap = $this->input->post('sodienthoainhacungcap');
				$nguyenlieucu = $this->input->post('nguyenlieucu');
				
				$nguyenlieumoi = $this->input->post('nguyenlieumoi');
				$soluong = $this->input->post('soluong');
				$diachinhacungcap = $this->input->post('diachinhacungcap');
				$note = $this->input->post('note');
				$donvi = $this->input->post('donvi');
				$madondh = 'ddh' . uniqid();

				
				function tachmanguyenlieucu($nguyenlieucu) {
					$arraymanlcu = array();
					foreach ($nguyenlieucu as $key ) {
						if ($key) {
							array_push($arraymanlcu, explode("_", $key)[1]);

						} else {
							array_push($arraymanlcu, "");							
						}
					}

					return $arraymanlcu;
				}

				function taomanguyenlieumoi($nguyenlieucu) {
					$arraymanlmoi = array();
					foreach ($nguyenlieucu as $key ) {
						if ($key) {
							array_push($arraymanlmoi, "");							

						} else {
							array_push($arraymanlmoi, "nl". uniqid());
						}
					}

					return $arraymanlmoi;
				}

				function remakeNguyenlieumoi($nguyenlieumoi, $nguyenlieucu) {
					$array = array();
					$dem = 0;
					foreach ($nguyenlieucu as $key ) {
						if ($key) {
							array_push($array, "");							

						} else {
							array_push($array, $nguyenlieumoi[$dem]);
							$dem++;
						}
					}

					return $array;
				}

			
				$manguyenlieucu = tachmanguyenlieucu($nguyenlieucu);
				$manguyenlieumoi = taomanguyenlieumoi($nguyenlieucu);
				$nguyenlieumoi = remakeNguyenlieumoi($nguyenlieumoi, $nguyenlieucu);

				$manguyenlieu = array();
				for ($i=0; $i < count($manguyenlieucu); $i++) { 
					if ($manguyenlieucu[$i]) {
						$manguyenlieu[$i] = $manguyenlieucu[$i];
					} else {
						$manguyenlieu[$i] = $manguyenlieumoi[$i];
					}
				}

				if ($nhacungcapcu) {
					$manhacungcapcu = explode("_", $nhacungcapcu)[1];
				}


				
				function taoDonDatHang($mancc, $thiss, $madondh, $manv) {
					if($thiss->admin_model->insertDondathang($madondh, $mancc, $manv)) {
						echo "lap don dh thanh cong";
					}
				}

				if ($nhacungcapmoi) {
					if ($this->admin_model->insertNhacungcap($manhacungcapmoi, $nhacungcapmoi, $sodienthoainhacungcap, $diachinhacungcap)) {

						echo "them thanh cong";
						// insert dondathang
						taoDonDatHang($manhacungcapmoi, $this, $madondh, $infoSession["manv"]);
					}

					
				} else {
					taoDonDatHang($manhacungcapcu, $this, $madondh, $infoSession["manv"]);
				}

				if (!empty($nguyenlieumoi)) {
					$isRowAffect = $this->admin_model->insertNguyenlieumoi($manguyenlieumoi, $nguyenlieumoi);

					if ($isRowAffect) {
						echo "them thanh cong";
					}


				} 

				// insert ctdondathang
				if ($this->admin_model->insertCtdondathang($madondh, $manguyenlieu, $soluong, $donvi, $note)) {
					echo "insert ct dondathang thanh cong";
				}

				// echo '<pre>';
				// echo var_dump($nguyenlieucu, $soluong);
				// echo '</pre>';
				// tách mã nhà cung cấp kiểm tra mảng nguyenlieu và solong

				

			}


		}
		
	}


	public function  donnhaphang() 
	{
		// GET method
		if ($this->input->server('REQUEST_METHOD') === 'GET') {
			$cookie = get_cookie("SESSIONID");

			if ($this->checkCookie($cookie)) {

				$nhacungcap = $this->admin_model->getNhacungcap();
				$nguyenlieu = $this->admin_model->getNguyenlieu();
				$dondathang = $this->admin_model->getDondathang();
				
				$data['mangdulieu'] = array(
					'nhacungcap' => $nhacungcap, 
					'nguyenlieu' => $nguyenlieu, 
					'dondathang' => json_encode($dondathang)
				);


				$this->load->view('donnhaphang_view', $data);
				// lapphieunhap, ct phieunhap, ctcungcap

			}
		} else {
			$cookie = get_cookie("SESSIONID");
			$infoSession = $this->checkCookie($cookie);
			if ($infoSession) {
				$nhacungcapcu = $this->input->post('nhacungcapcu');
				$dondathang = $this->input->post('dondathang');
				$nguyenlieucu = $this->input->post('nguyenlieucu');
				$soluong = $this->input->post('soluong');
				$dongia = $this->input->post('dongia');
				$donvi = $this->input->post('donvi');
				$note = $this->input->post('note');
				$mactcungcap = 'ctcc' . uniqid();
				$maphieunhap = 'pn' . uniqid();
				$manv = $infoSession['manv'];

				// them vao ct cung cap

				if ($this->admin_model->insertCtcungcap($mactcungcap, $nhacungcapcu, $nguyenlieucu, $soluong, $dongia)) {
					echo "them ct cung cap thanh cong";

					// insert soluong vao nguyenlieu
					if ($this->admin_model->updateNguyenlieuTonkho($nguyenlieucu, $soluong, $donvi)) {
						echo "insert nguyen lieu thanh cong";
					}
				}

				// TAO PHIEU NHAP 
				if ($this->admin_model->insertPhieunhap($maphieunhap, $dondathang, $manv)) {
					// insert ct phieunhap
					if ($this->admin_model->insertCtphieunhap($nguyenlieucu, $maphieunhap, $soluong, $donvi, $note)) {
						echo "tao phieu nhap, insert ct phieunhap thanh cong";
					}
				}
			}
		}
	}

	public function taotrasua()
	{
		// GET method
		if ($this->input->server('REQUEST_METHOD') === 'GET') {
			$cookie = get_cookie("SESSIONID");

			if ($this->checkCookie($cookie)) {

				// $nhacungcap = $this->admin_model->getNhacungcap();
				$nguyenlieu = $this->admin_model->getNguyenlieu();
				// $dondathang = $this->admin_model->getDondathang();
				
				$data['mangdulieu'] = array(
					'nguyenlieu' => $nguyenlieu, 
				);


				$this->load->view('taotrasua_view', $data);
				// lapphieunhap, ct phieunhap, ctcungcap

			}
		} else {
			$cookie = get_cookie("SESSIONID");
			$infoSession = $this->checkCookie($cookie);
			if ($infoSession) {

				$tenloai = $this->input->post('tenloai');
				$mota = $this->input->post('mota');
				$gia = $this->input->post('gia');
				$trangthai = $this->input->post('trangthai');

				$nguyenlieucu = $this->input->post('nguyenlieucu');
				$soluong = $this->input->post('soluong');
				$donvi = $this->input->post('donvi');
				$note = $this->input->post('note');
				$maloaitrasua = 'ts' . uniqid();

				$isUploaded = $this->uploadFile($_FILES);
				if ($isUploaded) {
					if ($this->admin_model->insertLoaitrasua($maloaitrasua, $tenloai, $mota, $gia, $isUploaded, $trangthai)) {
						echo "Thêm trà sữa thành công";

						// Insert ctloaitrasua
						if ($this->admin_model->insertCtloaitrasua($maloaitrasua, $nguyenlieucu, $soluong, $note)) {
							echo "thêm ct loaitrasua thanh cong";
						} else {
							echo "có lỗi xảy ra bảng ctloaitrasua";
						}
					} else {
						echo "loại này đã tồn tại";
					}


				} else {
					echo "ko upload ddc";
				}

				// $maphieunhap = 'pn' . uniqid();
				// $manv = $infoSession['manv'];


				// insert loaitrasua





				// // them vao ct cung cap

				// if ($this->admin_model->insertCtcungcap($mactcungcap, $nhacungcapcu, $nguyenlieucu, $soluong, $dongia)) {
				// 	echo "them ct cung cap thanh cong";
				// }

				// // TAO PHIEU NHAP 
				// if ($this->admin_model->insertPhieunhap($maphieunhap, $dondathang, $manv)) {
				// 	// insert ct phieunhap
				// 	if ($this->admin_model->insertCtphieunhap($nguyenlieucu, $maphieunhap, $soluong, $donvi, $note)) {
				// 		echo "tao phieu nhap, insert ct phieunhap thanh cong";
				// 	}
				// }
			}
		}
	}



	public function laphoadon()
	{
		// GET method
		if ($this->input->server('REQUEST_METHOD') === 'GET') {
			$cookie = get_cookie("SESSIONID");

			if ($this->checkCookie($cookie)) {

				$loaitrasua = $this->admin_model->getLoaitrasua();
				$khachhang = $this->admin_model->getKhachhang();
				$nguyenlieu = $this->admin_model->getNguyenlieu();
				
				
				$data['mangdulieu'] = array(
					'loaitrasua' => $loaitrasua,
					'khachhang' => json_encode($khachhang),
					'nguyenlieu' => $nguyenlieu
				);


				$this->load->view('admin/taohoadon_view', $data);
				// // lapphieunhap, ct phieunhap, ctcungcap

			

			}
		} else {
			$cookie = get_cookie("SESSIONID");
			$infoSession = $this->checkCookie($cookie);
			if ($infoSession) {

				$sodienthoai = $this->input->post('sodienthoai');
				$makh = $this->input->post('makh');
				$hokh = $this->input->post('hokh');
				$tenkh = $this->input->post('tenkh');
				$matk = $this->input->post('matk');
				$matenloai = $this->input->post('matenloai');
				$soluongmua = $this->input->post('soluongmua');

				$nguyenlieuthem = $this->input->post('nguyenlieucu');
				$trasuamuonbosung = $this->input->post('matrasuathem');
				$soluongthem = $this->input->post('soluong');
				$donvi = $this->input->post('donvi');
				$mahoadon = 'hd' . uniqid();
				$manv = $infoSession["manv"];


				// kiểm tra nguyên liệu đủ hay không

				// lấy dữ liệu từ bảng ctloaitrasua
				$ctloaitrasua = $this->admin_model->getCtloaitrasuaByMaloai($matenloai);

				// lấy dữ liệu từ bảng nguyenlieu
				$kho = $this->admin_model->getNguyenlieu();

				$giatrasua = $this->admin_model->getGiaLoaitrasua($matenloai, $soluongmua);

				$gianguyenlieuthem = $this->admin_model->getGianguyenlieuthem($nguyenlieuthem, $soluongthem);

				$newArrayNguyenlieu = array();
			

				for ($i=0; $i < count($kho); $i++) { 
					foreach ($ctloaitrasua as $key => $value) {
						foreach ($value as $subKey => $subValue) {
							if ($kho[$i]["MANGUYENLIEU"] == $subValue["MANGUYENLIEU"]) {
								if ($kho[$i]["TONKHO"] < $subValue["LIEULUONG"] * $soluongmua[$key]) {
									echo $subKey;
									echo "khong du nguyen lieu";
									return;
								} else {
									$kho[$i]["TONKHO"] -= $subValue["LIEULUONG"] * $soluongmua[$key];
									// array_push($newArrayNguyenlieu, array(
									// 	'MANGUYENLIEU' => $kho[$i]["MANGUYENLIEU"],
									// 	'TONKHO' => $kho[$i]["TONKHO"] - ($ctloaitrasua[$j]["LIEULUONG"] * $soluongmua)
									// ));
								}
							}
						}

					}
				}

				$nguyenlieubosung = array();
				$tempArr = array();

				if ($trasuamuonbosung) {
					for ($i=0; $i < count($kho); $i++) { 
						for ($j=0; $j < count($trasuamuonbosung); $j++) { 
							if ($kho[$i]["MANGUYENLIEU"] == $nguyenlieuthem[$j]) {
								if ($kho[$i]["TONKHO"] < $soluongthem[$j]) {
									echo "khong du so luong custom";
								} else {
									$kho[$i]["TONKHO"] -= $soluongthem[$j];
								}
							}
						}
					}

					for ($i=0; $i < count($matenloai); $i++) { 
						for ($j=0; $j < count($trasuamuonbosung); $j++) { 
							if ($trasuamuonbosung[$j] == $matenloai[$i]) {
								$temp = array(
									"nguyenlieu" => $gianguyenlieuthem[$j][0]["TENNL"],
									"soluongthem" => $soluongthem[$j],
									"donvi" => $donvi[$j],
									"gia" => $gianguyenlieuthem[$j][0]["DONGIA"]

								);

								array_push($tempArr, $temp);

							} 
						}
						$nguyenlieubosung[$i] = $tempArr;
						$tempArr = array();
					}
				}

				 // gia cuoi cung
				$finalPrices = array();
				for ($i=0; $i < count($nguyenlieubosung) ; $i++) { 
					if (!empty($nguyenlieubosung[$i])) {
						$tong = $giatrasua[$i][0]["GIA"];
						for ($j=0; $j < count($nguyenlieubosung[$i]); $j++) { 
							$tong += $nguyenlieubosung[$i][$j]["gia"];
						}
						$finalPrices[$i] = $tong;
					} else {
						$finalPrices[$i] = $giatrasua[$i][0]["GIA"];

					}
				}



				echo '<pre>';
				echo var_dump($giatrasua);
				echo '</pre>';

				echo '<pre>';
				echo var_dump($gianguyenlieuthem);
				echo '</pre>';

				echo '<pre>';
				echo var_dump($nguyenlieubosung);
				echo '</pre>';

				echo '<pre>';
				echo var_dump($finalPrices);
				echo '</pre>';

				echo '<pre>';
				echo var_dump($kho);
				echo '</pre>';

				

				// Tạo hóa đơn và CThoadon
				if ($this->admin_model->insertHoadon($mahoadon, $manv, $makh)) {
					echo "insert hoa don thanh cong";
					if ($this->admin_model->insertCthoadon($mahoadon, $matenloai, $soluongmua, $nguyenlieubosung, $finalPrices)) {
						echo "Them cthoadon thanhcong";

						if ($this->admin_model->updateNguyenlieu($kho)) {
							echo "cap nhat nguyen lieu thanh cong";
						}
					}

				}	



				// echo $ctloaitrasua[0]["LIEULUONG"] * $soluongmua;


				echo '<pre>';
				echo var_dump("sodienthoai: ".$sodienthoai);
				echo '</pre>';

				echo "--------------------------";
				

				echo '<pre>';
				echo var_dump("makh: ".$makh);
				echo '</pre>';

				echo "--------------------------";

				echo '<pre>';
				echo var_dump("hokh: ".$hokh);
				echo '</pre>';

				echo "--------------------------";

				echo '<pre>';
				echo var_dump("tenkh: ".$tenkh);
				echo '</pre>';

				echo "--------------------------";

				echo '<pre>';
				echo var_dump("matk: ".$matk);
				echo '</pre>';

				echo "--------------------------";


				echo '<pre>';
				echo "matenloai: ";
				echo var_dump($matenloai);
				echo '</pre>';

				echo "--------------------------";

				echo '<pre>';
				echo "soluongmua: ";
				echo var_dump($soluongmua);
				echo '</pre>';

				echo "--------------------------";

				echo '<pre>';
				echo "tra sua muon bo sung : ";
				echo var_dump($trasuamuonbosung);
				echo '</pre>';

				echo "--------------------------";

				echo '<pre>';
				echo "nguyenlieuthem: ";
				echo var_dump($nguyenlieuthem);
				echo '</pre>';

				echo "--------------------------";

				echo '<pre>';
				echo "soluongthem: ";
				echo var_dump($soluongthem);
				echo '</pre>';

				echo "--------------------------";

				echo '<pre>';
				echo "donvi: ";
				echo var_dump($donvi);
				echo '</pre>';

				echo "--------------------------";

				

			}
		}
	}


	public function themnhanvien()
	{
		// GET method
		if ($this->input->server('REQUEST_METHOD') === 'GET') {
			$cookie = get_cookie("SESSIONID");

			if ($this->checkCookie($cookie)) {

				$bophan = $this->admin_model->getBophan();
				
				$data['mangdulieu'] = array(
					'bophan' => $bophan 
				);


				$this->load->view('admin/themnhanvien_view', $data);

			}
		} else {
			$cookie = get_cookie("SESSIONID");
			$infoSession = $this->checkCookie($cookie);
			if ($infoSession) {

				$taikhoan = $this->input->post('taikhoan');
				$matkhau = md5($this->input->post('matkhau'));
				$vaitro = (int)$this->input->post('vaitro');
				$trangthai = $this->input->post('trangthai');

				$ho = $this->input->post('ho');
				$ten = $this->input->post('ten');
				$sdt = $this->input->post('sdt');
				$bophan = $this->input->post('bophan');
				$mataikhoan = 'tk' . uniqid();
				$manv = 'nv' . uniqid();

				
				$isUploaded = $this->uploadFile($_FILES);
				if ($isUploaded) {
					if ($vaitro == 1) {
						// Kiểm tra bộ phận còn trống không
						if ($this->admin_model->checkEmptyAdminBophan($bophan)) {
							// them vao bang tai khoan
							if ($this->admin_model->insertTaikhoan($mataikhoan, $taikhoan, $matkhau, $vaitro, $trangthai)) {
								echo "them tai khoan thanh cong";
								
								if ($this->admin_model->insertNhanvien($manv, $ho, $ten, $sdt, $isUploaded, $bophan, $mataikhoan)) {
									echo "thêm nhân viên thành công";
									if ($this->admin_model->updateManvqlBophan($bophan, $manv)) {
										echo "cập nhật nhân viên quản lí thành công";
									}
								}
							}
						} else {
							echo "không còn trống";
						}

					} else if ($vaitro == 2) {
						// them vao bang tai khoan
						if ($this->admin_model->insertTaikhoan($mataikhoan, $taikhoan, $matkhau, $vaitro, $trangthai)) {
							echo "them tai khoan thanh cong";
							
							if ($this->admin_model->insertNhanvien($manv, $ho, $ten, $sdt, $isUploaded, $bophan, $mataikhoan)) {
								echo "thêm nhân viên thành công";
							}
						}
					}

				} else {
					echo "ko upload ddc";
				}

				
			}
		}
	}



	public function quanliTaikhoanTongquat()
	{
		// GET method
		if ($this->input->server('REQUEST_METHOD') === 'GET') {
			$cookie = get_cookie("SESSIONID");

			if ($this->checkCookie($cookie)) {
				$taikhoan = $this->admin_model->getTaikhoan();
				$nhanvien = $this->admin_model->getNhanvien();
				$bophan = $this->admin_model->getBophan();


				function findManhanvien ($mataikhoan, $nhanvien, $bophan) {
					foreach ($nhanvien as $key => $value) {
						if ($value["MATAIKHOAN"] == $mataikhoan) {
							return findTenbophan($value["MABP"], $bophan);
						}
					}
				}

				function findTenbophan ($mabophan, $bophan) {
					foreach ($bophan as $key => $value) {
						if ($value["MABP"] == $mabophan) {
							return $value["TENBOPHAN"] . "_" . $value["MABP"];
						}
					}
				}

				$newArrayTaikhoan = array();
				foreach ($taikhoan as $key => $value) {
					if ($value["VAITRO"] != "0") {
						if ($value["VAITRO"] == "1") {
							$value["VAITRO"] = "Quản lí";
						} else if ($value["VAITRO"] == "2") {
							$value["VAITRO"] = "Nhân viên";
						} else if ($value["VAITRO"] == "3") {
							$value["VAITRO"] = "Khách hàng";
						}

						$temp = findManhanvien($value["MATAIKHOAN"], $nhanvien, $bophan);
						$value["BOPHAN"] = explode("_",$temp)[0];
						$value["MABOPHANCU"] = explode("_",$temp)[1];
						$value["NGAYTAO"] = date("d/m/Y", $value["NGAYTAO"]);
						array_push($newArrayTaikhoan, $value);
					}
				}


				$data['mangdulieu'] = array(
					'taikhoan' => $newArrayTaikhoan,
					'bophan' => $bophan
				);

				// $this->load->view('admin/taikhoantongquat_view', $data);
				$this->load->view('admin/taikhoan_view', $data);

			}

			
		} else {
			$cookie = get_cookie("SESSIONID");
			$infoSession = $this->checkCookie($cookie);
			if ($infoSession) {

				$taikhoan = $this->input->post('taikhoan');
				$matkhau = md5($this->input->post('matkhau'));
				$vaitro = (int)$this->input->post('vaitro');
				$trangthai = $this->input->post('trangthai');

				$ho = $this->input->post('ho');
				$ten = $this->input->post('ten');
				$sdt = $this->input->post('sdt');
				$bophan = $this->input->post('bophan');
				$mataikhoan = 'tk' . uniqid();
				$manv = 'nv' . uniqid();

				
				$isUploaded = $this->uploadFile($_FILES);
				if ($isUploaded) {
					if ($vaitro == 1) {
						// Kiểm tra bộ phận còn trống không
						if ($this->admin_model->checkEmptyAdminBophan($bophan)) {
							// them vao bang tai khoan
							if ($this->admin_model->insertTaikhoan($mataikhoan, $taikhoan, $matkhau, $vaitro, $trangthai)) {
								echo "them tai khoan thanh cong";
								
								if ($this->admin_model->insertNhanvien($manv, $ho, $ten, $sdt, $isUploaded, $bophan, $mataikhoan)) {
									echo "thêm nhân viên thành công";
									if ($this->admin_model->updateManvqlBophan($bophan, $manv)) {
										echo "cập nhật nhân viên quản lí thành công";
									}
								}
							}
						} else {
							echo "không còn trống";
						}

					} else if ($vaitro == 2) {
						// them vao bang tai khoan
						if ($this->admin_model->insertTaikhoan($mataikhoan, $taikhoan, $matkhau, $vaitro, $trangthai)) {
							echo "them tai khoan thanh cong";
							
							if ($this->admin_model->insertNhanvien($manv, $ho, $ten, $sdt, $isUploaded, $bophan, $mataikhoan)) {
								echo "thêm nhân viên thành công";
							}
						}
					}

				} else {
					echo "ko upload ddc";
				}

				
			}
		}
	}


	public function lockAccount()
	{
		// GET method
		if ($this->input->server('REQUEST_METHOD') === 'GET') {
			$cookie = get_cookie("SESSIONID");

			if ($this->checkCookie($cookie)) {
				
			} else {
				return redirect(base_url()."admin/login"); 
			}
		} else {
			$cookie = get_cookie("SESSIONID");
			$infoSession = $this->checkCookie($cookie);
			if ($infoSession) {

				$mataikhoan = $this->input->post('matk');

				if ($this->admin_model->lockAccount($mataikhoan)) {
					echo '1';
				} else {
					echo '0';
				}
			}
		}
	}


	public function unlockAccount()
	{
		// GET method
		if ($this->input->server('REQUEST_METHOD') === 'GET') {
			$cookie = get_cookie("SESSIONID");

			if ($this->checkCookie($cookie)) {
				return redirect('/admin');
			} else {
				return redirect('/login'); 
			}
		} else {
			$cookie = get_cookie("SESSIONID");
			$infoSession = $this->checkCookie($cookie);
			if ($infoSession) {

				$mataikhoan = $this->input->post('matk');

				if ($this->admin_model->unlockAccount($mataikhoan)) {
					echo '1';
				} else {
					echo '0';
				}
			}
		}
	}


	public function changePermission()
	{
		// GET method
		if ($this->input->server('REQUEST_METHOD') === 'GET') {
			$cookie = get_cookie("SESSIONID");

			if ($this->checkCookie($cookie)) {
				return redirect('/admin');
			} else {
				return redirect('/login'); 
			}
		} else {
			$cookie = get_cookie("SESSIONID");
			$infoSession = $this->checkCookie($cookie);
			if ($infoSession) {

				$mataikhoan = $this->input->post('matk');
				$mabophanmoi = $this->input->post('bophanmoi');
				$mabophancu = $this->input->post('bophancu');
				$mavaitromoi = $this->input->post('vaitromoi');
				$mavaitrocu = $this->input->post('vaitrocu');
				$manv = $this->admin_model->findManhanvien($mataikhoan);

				if ($mavaitromoi == "Quản lí") {

					// cập nhật vai trò tài khoản
					$this->admin_model->updateVaitroTaikhoan($mataikhoan, 1);
					// check bộ phận có ai quản lí chưa
					if ($this->admin_model->checkEmptyAdminBophan($mabophanmoi)) {
						if ($this->admin_model->updateMabophanNhanvien($manv[0]["MANV"], $mabophanmoi)) {
							if ($this->admin_model->updateManvqlBophan($mabophanmoi, $manv[0]["MANV"])) {
								echo "1";
								return;
							}
							
						}
					} else {
						echo "Bộ phận này đã có người quản lí";
					}
					

				} else if ($mavaitromoi == "Nhân viên") {
					if ($mavaitrocu == "Quản lí") {
						// ngắt quyền
						if ($this->admin_model->updateManvqlBophan($mabophancu, NULL)) {
							if ($this->admin_model->updateVaitroTaikhoan($mataikhoan, 2)) {
								if ($this->admin_model->updateMabophanNhanvien($manv[0]["MANV"], $mabophanmoi)) {
									echo "1";
									return;
								}
							}
						} else {
							echo $mabophancu;
						}
					} else if ($mavaitrocu == "Nhân viên"){
						if ($this->admin_model->updateMabophanNhanvien($manv[0]["MANV"], $mabophanmoi)) {
									echo "1";
									return;
								}					
					}
				}

			}
		}
	}


	public function uploadFile()
	{
		// upload image
		$target_dir = "FileUpload/";
		$target_file = $target_dir . basename($_FILES["avatar"]["name"]);
		$uploadOk = 1;
		$imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));

		// Check if image file is a actual image or fake image
		if(isset($_POST["submit"])) {
		  $check = getimagesize($_FILES["avatar"]["tmp_name"]);
		  if($check !== false) {
		    echo "File is an image - " . $check["mime"] . ".";
		    $uploadOk = 1;
		  } else {
		    echo "File is not an image.";
		    $uploadOk = 0;
		  }
		}

		// Check if file already exists
		// if (file_exists($target_file)) {
		//   echo "Sorry, file already exists.";
		//   $uploadOk = 0;
		// }

		// Check file size
		if ($_FILES["avatar"]["size"] > 5000000) {
		  echo "Sorry, your file is too large.";
		  $uploadOk = 0;
		}

		// Allow certain file formats
		if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg"
		&& $imageFileType != "gif" ) {
		  echo "Sorry, only JPG, JPEG, PNG & GIF files are allowed.";
		  $uploadOk = 0;
		}

		// Check if $uploadOk is set to 0 by an error
		if ($uploadOk == 0) {
		  echo "Sorry, your file was not uploaded.";
		// if everything is ok, try to upload file
		} else {
		  if (move_uploaded_file($_FILES["avatar"]["tmp_name"], $target_file)) {
		    echo "The file ". htmlspecialchars( basename( $_FILES["avatar"]["name"])). " has been uploaded.";
		  } else {
		    echo "Sorry, there was an error uploading your file.";
		  }
		}


		if ($uploadOk == 1) {
			$anhAvatar = base_url() . "FileUpload/" . $_FILES["avatar"]["name"];

			return $anhAvatar;
		} else {
			return false;
		}
		
	}




}

/* End of file Admin.php */
/* Location: ./application/controllers/Admin.php */