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

		// // GET method
		// if ($this->input->server('REQUEST_METHOD') === 'GET') {
		// 	$cookie = get_cookie("SESSIONID");

		// 	if ($this->checkCookie($cookie)) {
		// 		return redirect(base_url()."admin");
		// 	} else {
		// 		$this->load->view('login_view');
		// 	}
		// } else {
		// 	$this->requestLogin();
		// }


	}


	public function logout()
	{
		$cookie = get_cookie("SESSIONID");

		date_default_timezone_set("Asia/Ho_Chi_Minh");

		$dl = $this->admin_model->getSession();
		
		foreach ($dl as $key => $value) {
			$data = json_decode($value["SESSION"], true);
			if (is_array($data) || is_object($data)) {
				foreach ($data as $subData) {
					if ($cookie == $subData['id']) {
						// tim thay cookie

						$rowEffect = $this->admin_model->deleteSession($subData['username']);

						if ($rowEffect) {
							delete_cookie('SESSIONID');
							redirect(base_url() . 'admin/login','refresh');

						}
						return;

					} 
				}			

			}

		}
		
		// nếu không tìm thấy bất kì id nào thì xóa
		echo 0;
		delete_cookie("SESSIONID");

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
				// if (trangthai==1) {thhì mới setcookie}
				$this->input->set_cookie('SESSIONID', $newData['id'], 3000);
			}
			

			// $this->session->set_userdata('level', $dl[0]["level"]);
		

			$message["message"] = array('Đăng nhập thành công');
			redirect(base_url() . 'admin','refresh');
			return;
		}

		$message["message"] = array('Sai thông tin đăng nhập');
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
							$nhanvien = $this->admin_model->findNhanvienByMa($subData["manv"]); 
							if (!empty($nhanvien)){
								// $user = array(
								// 	'role' => $infoSession['role'], 
								// 	'manv' => $infoSession['manv'],
								// 	'tennv' => $nhanvien[0]["HO"] . " " . $nhanvien[0]["TEN"],
								// 	'anhdaidien' => $nhanvien[0]["AVATAR"]

								// );
								// echo json_encode($user);
								return array(
									'role' => $subData['role'], 
									'manv' => $subData['manv'],
									'tennv' => $nhanvien[0]["HO"] . " " . $nhanvien[0]["TEN"],
									'anhdaidien' => $nhanvien[0]["AVATAR"]
								);
							}


						}
					} 

				}	
			}


		}

		delete_cookie("SESSIONID");
		redirect(base_url() . 'admin/login','refresh');
		return false;

		
	} 


	public function user()
	{
		// GET method
		if ($this->input->server('REQUEST_METHOD') === 'GET') {
			$cookie = get_cookie("SESSIONID");
			$infoSession = $this->checkCookie($cookie);
			if ($infoSession) {
				$nhanvien = $this->admin_model->findNhanvienByMa($infoSession["manv"]); 
				if (!empty($nhanvien)){
					$user = array(
						'role' => $infoSession['role'], 
						'manv' => $infoSession['manv'],
						'tennv' => $nhanvien[0]["HO"] . " " . $nhanvien[0]["TEN"],
						'anhdaidien' => $nhanvien[0]["AVATAR"]

					);
					echo json_encode($user);
				}
			}
		} else {
			$cookie = get_cookie("SESSIONID");
			$infoSession = $this->checkCookie($cookie);
			if (!$infoSession) {
				//redirect login
			}
		}
	}



	public function dondathang()
	{	

		if ($this->input->server('REQUEST_METHOD') === 'GET') {
			$cookie = get_cookie("SESSIONID");
			$infoSession = $this->checkCookie($cookie);
			if ($infoSession) {

				$nhacungcap = $this->admin_model->getNhacungcap();
				$nguyenlieu = $this->admin_model->getNguyenlieu();
				
				$data['mangdulieu'] = array(
					'nhacungcap' => $nhacungcap, 
					'nguyenlieu' => $nguyenlieu,
					'anhdaidien' => $infoSession["anhdaidien"],
					'tennv' => $infoSession["tennv"],
					'role' => $infoSession['role']
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






	public function demo($day, $month)
	{
		$this->admin_model->getDaytest($day, $month);
	}


	public function  donnhaphang() 
	{
		// GET method
		if ($this->input->server('REQUEST_METHOD') === 'GET') {
			$cookie = get_cookie("SESSIONID");
			$infoSession = $this->checkCookie($cookie);
			if ($infoSession) {

				$nhacungcap = $this->admin_model->getNhacungcap();
				$nguyenlieu = $this->admin_model->getNguyenlieu();
				$dondathang = $this->admin_model->getDondathang();
				
				$data['mangdulieu'] = array(
					'nhacungcap' => $nhacungcap, 
					'nguyenlieu' => $nguyenlieu, 
					'dondathang' => json_encode($dondathang),
					'anhdaidien' => $infoSession["anhdaidien"],
					'tennv' => $infoSession["tennv"],
					'role' => $infoSession['role']
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

	public function getSizeApi($cookie)
	{
		if ($this->checkCookie($cookie)) {

			$sizecosan = $this->admin_model->getSize();

			echo json_encode($sizecosan);

		} else {
			echo "you dont have permission";
		}
	}


	public function taotrasua()
	{
		// GET method
		if ($this->input->server('REQUEST_METHOD') === 'GET') {
			$cookie = get_cookie("SESSIONID");
			$infoSession = $this->checkCookie($cookie);
			if ($infoSession) {

				// $nhacungcap = $this->admin_model->getNhacungcap();
				$nguyenlieu = $this->admin_model->getNguyenlieu();
				$sizecosan = $this->admin_model->getSize();
				
				$data['mangdulieu'] = array(
					'nguyenlieu' => $nguyenlieu, 
					'sizecosan' => json_encode($sizecosan),
					'anhdaidien' => $infoSession["anhdaidien"],
					'tennv' => $infoSession["tennv"],
					'role' => $infoSession['role']
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
				$size = $this->input->post('sizes');
				$maloaitrasua = 'ts' . uniqid();
				$thanhphan = array();
				$tensize = array();
				$masize = array();

				echo '<pre>';
				echo var_dump($size);
				echo '</pre>';
				

				foreach ($size as $key => $value) {
					if ($value) {
						array_push($tensize, explode("_", $value)[0]);
						array_push($masize, explode("_", $value)[1]); 

					}
				}

				echo '<pre>';
				echo var_dump($tensize);
				echo '</pre>';

				echo '<pre>';
				echo var_dump($masize);
				echo '</pre>';

				echo '<pre>';
				echo var_dump($nguyenlieucu);
				echo '</pre>';

				echo '<pre>';
				echo var_dump($soluong);
				echo '</pre>';

				

				for ($i=0; $i < count($nguyenlieucu); $i++) { 
					$thanhphan[$i] = array(
						'MANGUYENLIEU' => $nguyenlieucu[$i], 
						'LIEULUONG' => $soluong[$i],
						'DONVI' => $donvi[$i],
						'GHICHU' => $note[$i]
					);
				}

				
				echo count($tensize);

				$isUploaded = $this->uploadFile($_FILES);
				if ($isUploaded) {
					if ($this->admin_model->insertLoaitrasua($maloaitrasua, $tenloai, $mota, $gia, $isUploaded, $trangthai)) {
						echo "Thêm trà sữa thành công";

						// Insert ctloaitrasua
						if ($this->admin_model->insertCtloaitrasua($maloaitrasua, $nguyenlieucu, $soluong, $donvi, $note)) {
							echo "thêm ct loaitrasua thanh cong";
							// insert size
							for ($i=0; $i < count($tensize); $i++) { 
								switch ($tensize[$i]) {
									case 'SizeS':

										$thanhphantheosize = $thanhphan;
										for ($j=0; $j < count($thanhphantheosize); $j++) { 
											$thanhphantheosize[$j]["LIEULUONG"] *= 0.7;
										}
										$giatheosize = $gia * 0.7;
										if (!$this->admin_model->insertCtSize($maloaitrasua, $masize[$i], 0.7, $giatheosize, json_encode($thanhphantheosize))) 
											{echo "insertCtsize error"; return;}

										break;
									case 'SizeM':
										if (!$this->admin_model->insertCtSize($maloaitrasua, $masize[$i], 1, $gia, json_encode($thanhphantheosize)))
											{echo "insertCtsize error"; return;}

										break;
									case 'SizeL':

										$thanhphantheosize = $thanhphan;
										for ($j=0; $j < count($thanhphantheosize); $j++) { 
											$thanhphantheosize[$j]["LIEULUONG"] *= 1.2;
										}
										$giatheosize = $gia * 1.2;
										if (!$this->admin_model->insertCtSize($maloaitrasua, $masize[$i], 1.2, $giatheosize, json_encode($thanhphantheosize))) 
											{echo "insertCtsize error"; return;}

										break;
									case 'SizeXL':

										$thanhphantheosize = $thanhphan;
										for ($j=0; $j < count($thanhphantheosize); $j++) { 
											$thanhphantheosize[$j]["LIEULUONG"] *= 1.5;
										}
										$giatheosize = $gia * 1.5;
										if (!$this->admin_model->insertCtSize($maloaitrasua, $masize[$i], 1.5, $giatheosize, json_encode($thanhphantheosize))) 
											{echo "insertCtsize error"; return;}

										break;
									default:
										# code...
										break;
								}

							}
						} else {
							echo "có lỗi xảy ra bảng ctloaitrasua";
						}
					} else {
						echo "loại này đã tồn tại";
					}


				} else {
					echo "ko upload ddc";
				}

				
			}
		}
	}



	public function laphoadon()
	{
		// GET method
		if ($this->input->server('REQUEST_METHOD') === 'GET') {
			$cookie = get_cookie("SESSIONID");
			$infoSession = $this->checkCookie($cookie);
			if ($infoSession) {

				$loaitrasua = $this->admin_model->getLimitLoaitrasua();
				$khachhang = $this->admin_model->getKhachhang();
				$nguyenlieu = $this->admin_model->getNguyenlieu();
				$hoadon = $this->admin_model->getLimitHoadon();
				$ctsize = $this->admin_model->getCtSizeWithTensize();
				
				
				$data['mangdulieu'] = array(
					'loaitrasua' => $loaitrasua,
					'khachhang' => json_encode($khachhang),
					'nguyenlieu' => $nguyenlieu,
					'hoadon' => $hoadon,
					'ctsize' => $ctsize,
					'anhdaidien' => $infoSession["anhdaidien"],
					'tennv' => $infoSession["tennv"],
					'role' => $infoSession['role']
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
				$size = $this->input->post('size');
				$tensize = array();
				$makhmoi = 'kh' . uniqid();
				$mahoadon = 'hd' . uniqid();
				$manv = $infoSession["manv"];

				// Lọc ten size
				for ($i=0; $i < count($size); $i++) { 
					$tensize[$i] = explode("_", $size[$i])[2];
				}

				// Lọc mã size
				for ($i=0; $i < count($size); $i++) { 
					$size[$i] = explode("_", $size[$i])[0];
				}


				
				// kiểm tra nguyên liệu đủ hay không

				// lấy dữ liệu từ bảng ctsize
				$ctloaitrasua = $this->admin_model->getCtSize($matenloai, $size);
				// $ctloaitrasua = $this->admin_model->getCtloaitrasuaByMaloai($matenloai);
				
				// lấy dữ liệu từ bảng nguyenlieu
				$kho = $this->admin_model->getNguyenlieu();

				// $giatrasua = $this->admin_model->getGiaLoaitrasua($matenloai, $soluongmua);
				$giatrasua = $this->admin_model->getGiaCtSize($matenloai, $soluongmua, $size);


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
									return;
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
				if (!empty($nguyenlieubosung)) {
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

				} else {
					for ($i=0; $i < count($giatrasua); $i++) { 
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
				if ($hokh && $tenkh) {
					// insert khachhang
					if ($this->admin_model->insertKhachhang($makhmoi, $hokh, $tenkh, $sodienthoai)) {
						if ($this->admin_model->insertHoadon($mahoadon, $manv, $makhmoi)) {
							echo "insert hoa don thanh cong";
							if ($this->admin_model->insertCthoadon($mahoadon, $tensize, $matenloai, $soluongmua, $nguyenlieubosung, $finalPrices)) {
								echo "Them cthoadon thanhcong";

								if ($this->admin_model->updateNguyenlieu($kho)) {
									echo "cap nhat nguyen lieu thanh cong";
								}
							}

						}	

					}

					return;
				} else {
					if ($this->admin_model->insertHoadon($mahoadon, $manv, $makh)) {
						echo "insert hoa don thanh cong";
						if ($this->admin_model->insertCthoadon($mahoadon, $tensize, $matenloai, $soluongmua, $nguyenlieubosung, $finalPrices)) {
							echo "Them cthoadon thanhcong";

							if ($this->admin_model->updateNguyenlieu($kho)) {
								echo "cap nhat nguyen lieu thanh cong";
							}
						}

					}	
				}



				echo $ctloaitrasua[0]["LIEULUONG"] * $soluongmua;

			


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


	public function danhsachsanpham()
	{
		// GET method
		if ($this->input->server('REQUEST_METHOD') === 'GET') {
			$cookie = get_cookie("SESSIONID");
			$infoSession = $this->checkCookie($cookie);
			if ($infoSession) {

				$loaitrasua = $this->admin_model->getLoaitrasua();


				for ($i=0; $i < count($loaitrasua); $i++) { 
					$loaitrasua[$i]["TRANGTHAI"] = (int)$loaitrasua[$i]["TRANGTHAI"];
					if ($loaitrasua[$i]["TRANGTHAI"] == 0) {
						$loaitrasua[$i]["TRANGTHAITEXT"] = "Ngừng kinh doanh";
					}
				}
				

				$data['mangdulieu'] = array(
					'loaitrasua' => $loaitrasua,
					'anhdaidien' => $infoSession["anhdaidien"],
					'tennv' => $infoSession["tennv"],
					'role' => $infoSession['role']
				);



				$this->load->view('admin/danhsachsanpham_view', $data);
				// lapphieunhap, ct phieunhap, ctcungcap

			}
		} else {
			$cookie = get_cookie("SESSIONID");
			$infoSession = $this->checkCookie($cookie);
			if ($infoSession) {


				$diachigiaohang = $this->input->post('diachi');
				$mahoadon = $this->input->post('mahoadon');
				$manhanviengiao = $this->input->post('manhanvien');
				$maphieugiao = 'PG' . uniqid();


				$hoadon = $this->admin_model->getHoadonByMa($mahoadon);

				// echo '<pre>';
				// echo var_dump($hoadon);
				// echo '</pre>';

				if ($this->admin_model->insertPhieugiao($maphieugiao, $mahoadon, $infoSession['manv'], $manhanviengiao, 1)) {

					if ($this->admin_model->insertCtphieugiao($hoadon[0]["CTHOADON"], $maphieugiao, $diachigiaohang)) {
						echo "insert hoadon va cthoadon thanh cong";
					}
				}



			}
		}
	}



	public function chitietsanpham($maloaitrasua)
	{
		// GET method
		if ($this->input->server('REQUEST_METHOD') === 'GET') {
			$cookie = get_cookie("SESSIONID");
			$infoSession = $this->checkCookie($cookie);
			if ($infoSession) {

				$loaitrasua = $this->admin_model->getLoaitrasuaByMaloai($maloaitrasua);
				$nguyenlieu = $this->admin_model->getNguyenlieu();
				$sizecosan = $this->admin_model->getSize();
				

				for ($i=0; $i < count($loaitrasua); $i++) { 
					$loaitrasua[$i]["NGAYTAO"] = date("d/m/Y", $loaitrasua[$i]["NGAYTAO"]);
					$loaitrasua[$i]["GIA"] = (int)$loaitrasua[$i]["GIA"];
					$loaitrasua[$i]["SOLUONGNGUYENLIEU"] = count($loaitrasua[$i]["CTLOAITRASUA"]);

					if ($loaitrasua[$i]["TRANGTHAI"] == "1") {
						$loaitrasua[$i]["TRANGTHAI"] = (int)$loaitrasua[$i]["TRANGTHAI"];
						$loaitrasua[$i]["TRANGTHAITEXT"] = "Mở bán";
					} else {
						$loaitrasua[$i]["TRANGTHAI"] = (int)$loaitrasua[$i]["TRANGTHAI"];
						$loaitrasua[$i]["TRANGTHAITEXT"] = "Đã khóa";
					}
				}

				
				$data['mangdulieu'] = array(
					'nguyenlieu' => $nguyenlieu, 
					'sizecosan' => json_encode($sizecosan),
					'loaitrasua' => $loaitrasua,
					'anhdaidien' => $infoSession["anhdaidien"],
					'tennv' => $infoSession["tennv"],
					'role' => $infoSession['role']
				);

				// echo '<pre>';
				// echo var_dump($loaitrasua);
				// echo '</pre>';

				$this->load->view('admin/chitietsanpham_view', $data);
				// lapphieunhap, ct phieunhap, ctcungcap

			}
		} else {
			$cookie = get_cookie("SESSIONID");
			$infoSession = $this->checkCookie($cookie);
			if ($infoSession) {

				$tenloai = $this->input->post('tenloai');
				$tenloaicu = $this->input->post('tenloaicu');
				$mota = $this->input->post('mota');
				$motacu = $this->input->post('motacu');
				$gia = $this->input->post('gia');
				$giacu = $this->input->post('giacu');
				$trangthai = $this->input->post('trangthai');
				$trangthaicu = $this->input->post('trangthaicu');

				$nguyenlieucu = $this->input->post('nguyenlieucu');
				$soluong = $this->input->post('soluong');
				$donvi = $this->input->post('donvi');
				$note = $this->input->post('note');
				$size = $this->input->post('sizes');
				$maloaitrasua = $this->input->post('maloaitrasua');
				$machinhsua = 'chinhsua' . uniqid();
				$thanhphan = array();
				$tensize = array();
				$masize = array();
				$tatcasize = array();

				echo '<pre>';
				echo var_dump($size);
				echo '</pre>';
				

				foreach ($size as $key => $value) {
					if ($value) {
						array_push($tensize, explode("_", $value)[0]);
						array_push($masize, explode("_", $value)[1]); 

					}
				}

				echo '<pre>';
				echo var_dump($tensize);
				echo '</pre>';

				echo '<pre>';
				echo var_dump($masize);
				echo '</pre>';

				echo '<pre>';
				echo var_dump($nguyenlieucu);
				echo '</pre>';

				echo '<pre>';
				echo var_dump($soluong);
				echo '</pre>';

				// nếu có chỉnh sửa thành phần thì thêm vào không thì lấy thành phần cũ
				if (!empty($nguyenlieucu)) {
					for ($i=0; $i < count($nguyenlieucu); $i++) { 
						$thanhphan[$i] = array(
							'MANGUYENLIEU' => $nguyenlieucu[$i], 
							'LIEULUONG' => $soluong[$i],
							'DONVI' => $donvi[$i],
							'GHICHU' => $note[$i]
						);
					}
				} else {
					$temp = $this->admin_model->getCtloaitrasuaByMaloai2($maloaitrasua);
					for ($i=0; $i < count($temp); $i++) { 
						$thanhphan[$i] = array(
							'MANGUYENLIEU' => $temp[$i]["MANGUYENLIEU"], 
							'LIEULUONG' => $temp[$i]["LIEULUONG"],
							'DONVI' => $temp[$i]["DONVI"],
							'GHICHU' => $temp[$i]["GHICHU"]	
						);
						
					}
				}				


				for ($i=0; $i < count($masize); $i++) { 
					$tatcasize[$i] = array(
						'TENSIZE' => $tensize[$i], 
						'MASIZE' => $masize[$i]
					);
				}



				echo '<pre>';
				echo var_dump($thanhphan);
				echo '</pre>';
				
				$makhoiluong = $this->admin_model->getkhoiluongsizeByMasize($masize);

				echo '<pre>';
				echo var_dump($makhoiluong);
				echo '</pre>';

				date_default_timezone_set("Asia/Ho_Chi_Minh");
				$newProduct = array(
					'MALOAITRASUA' => $maloaitrasua, 
					'TENLOAI' => $tenloai, 
					'MOTA' => $mota, 
					'GIA' => $gia, 
					'HINHANH' => $_FILES["avatar"]["name"],
					'TRANGTHAI' => $trangthai,
					'NGAYCHINHSUA' => date("d/m/Y H:i:sa"),
					'CTLOAITRASUA' => $thanhphan,
					'CTSIZE' => $tatcasize


				);

				function callUpdateLoaitrasua($maloaitrasua, $data, $field, $thiss) {
					if ($thiss->admin_model->updateLoaitrasua($maloaitrasua, $data, $field)) {
						return true;
					}
				}

				function updateLoaivaCtloai($tenloai, $tenloaicu, $mota, $motacu, $gia, $giacu, $trangthai, $trangthaicu, $file, $thiss, $masize, $tensize, $thanhphan, $maloaitrasua, $machinhsua, $tatcasize, $nguyenlieucu, $donvi, $soluong, $note)
				{
					if ($tenloai != $tenloaicu) {
							$result = callUpdateLoaitrasua($maloaitrasua, $tenloai, "TENLOAI", $thiss);
							if ($result) {
								echo "Chỉnh sửa tên loại thành công";
							}
						}

						if ($mota != $motacu) {
							$result = callUpdateLoaitrasua($maloaitrasua, $mota, "MOTA", $thiss);
							if ($result) {
								echo "Chỉnh sửa mô tả thành công";
							}
						}


						if ($gia != $giacu) {
							$result = callUpdateLoaitrasua($maloaitrasua, $gia, "GIA", $thiss);
							if ($result) {
								echo "Chỉnh sửa giá  thành công";
							}
						}

						if ($trangthai != $trangthaicu) {
							$result = callUpdateLoaitrasua($maloaitrasua, $trangthai, "TRANGTHAI", $thiss);
							if ($result) {
								echo "Chỉnh sửa trạng thái thành công";
							}
						}

						if ($file["avatar"]["name"]) {
							$isUploaded = $thiss->uploadFile($file);
							if ($isUploaded) {
								$result = callUpdateLoaitrasua($maloaitrasua, $isUploaded, "HINHANH", $thiss);
								if ($result) {
									echo "Chỉnh sửa trạng thái thành công";
								}
							}
						}

						
						if ($masize) {
							// delete all size by masize
							$thiss->admin_model->deleteSizeByMaloai($maloaitrasua);
							for ($i=0; $i < count($tensize); $i++) { 
								switch ($tensize[$i]) {
									case 'SizeS':

										$thanhphantheosize = $thanhphan;
										for ($j=0; $j < count($thanhphantheosize); $j++) { 
											$thanhphantheosize[$j]["LIEULUONG"] *= 0.7;
										}
										$giatheosize = $gia * 0.7;
										if (!$thiss->admin_model->updateCtsize($maloaitrasua, $masize[$i], 0.7, $giatheosize, json_encode($thanhphantheosize))) 
											{echo "updateCtsize error"; return;}

										break;
									case 'SizeM':
										if (!$thiss->admin_model->updateCtsize($maloaitrasua, $masize[$i], 1, $gia, json_encode($thanhphan)))
											{echo "updateCtsize error"; return;}

										break;
									case 'SizeL':

										$thanhphantheosize = $thanhphan;
										for ($j=0; $j < count($thanhphantheosize); $j++) { 
											$thanhphantheosize[$j]["LIEULUONG"] *= 1.2;
										}
										$giatheosize = $gia * 1.2;
										if (!$thiss->admin_model->updateCtsize($maloaitrasua, $masize[$i], 1.2, $giatheosize, json_encode($thanhphantheosize))) 
											{echo "updateCtsize error"; return;}

										break;
									case 'SizeXL':

										$thanhphantheosize = $thanhphan;
										for ($j=0; $j < count($thanhphantheosize); $j++) { 
											$thanhphantheosize[$j]["LIEULUONG"] *= 1.5;
										}
										$giatheosize = $gia * 1.5;
										if (!$thiss->admin_model->updateCtsize($maloaitrasua, $masize[$i], 1.5, $giatheosize, json_encode($thanhphantheosize))) 
											{echo "updateCtsize error"; return;}

										break;
									default:
										# code...
										break;
								}

							}
						}

						if (!empty($nguyenlieucu)) {
							$thiss->admin_model->deleteCtloaitrasuaByMaloai($maloaitrasua);
							if ($thiss->admin_model->updateCtloaitrasua($maloaitrasua, $nguyenlieucu, $soluong, $donvi, $note)) {
										echo "update ctloaitrasua thanh cong";
								}
						}
					
				}







				// kiểm tra trên trong lichsuchinh sửa đã có lần chỉnh sửa nào chưa
				$checkMaloai = $this->admin_model->KiemtraMaloaiTrongLichsuchinhsua($maloaitrasua);

				// insert lichsuchinhsua
				if ($checkMaloai) {
					if ($this->admin_model->insertLichsuChinhsua($machinhsua, $maloaitrasua, $newProduct)) {
						updateLoaivaCtloai($tenloai, $tenloaicu, $mota, $motacu, $gia, $giacu, $trangthai, $trangthaicu, $_FILES, $this, $masize, $tensize, $thanhphan, $maloaitrasua, $machinhsua, $tatcasize, $nguyenlieucu, $donvi, $soluong, $note);
					}
				} else {
					$oldProduct = $this->admin_model->getLoaitrasuaByMaloai($maloaitrasua);
					if ($this->admin_model->insertLichsuChinhsua($machinhsua, $maloaitrasua, $oldProduct)) {
						$machinhsua = 'chinhsua' . uniqid();
						if ($this->admin_model->insertLichsuChinhsua($machinhsua, $maloaitrasua, $newProduct)) {
							// cap nhat loaitrasua va ctloai
							updateLoaivaCtloai($tenloai, $tenloaicu, $mota, $motacu, $gia, $giacu, $trangthai, $trangthaicu, $_FILES, $this, $masize, $tensize, $thanhphan, $maloaitrasua, $machinhsua, $tatcasize, $nguyenlieucu, $donvi, $soluong, $note);
						}
					}
				}

				// if ($_FILES["avatar"]["name"]) {
				// 	$isUploaded = $this->uploadFile($_FILES);
				// 	if ($isUploaded) {
				// 		if ($this->admin_model->insertLoaitrasua($maloaitrasua, $tenloai, $mota, $gia, $isUploaded, $trangthai)) {
				// 			echo "Thêm trà sữa thành công";

				// 			// Insert ctloaitrasua
				// 			if ($this->admin_model->insertCtloaitrasua($maloaitrasua, $nguyenlieucu, $soluong, $donvi, $note)) {
				// 				echo "thêm ct loaitrasua thanh cong";
				// 				// insert size
				// 				for ($i=0; $i < count($tensize); $i++) { 
				// 					switch ($tensize[$i]) {
				// 						case 'SizeS':

				// 							$thanhphantheosize = $thanhphan;
				// 							for ($j=0; $j < count($thanhphantheosize); $j++) { 
				// 								$thanhphantheosize[$j]["LIEULUONG"] *= 0.7;
				// 							}
				// 							$giatheosize = $gia * 0.7;
				// 							if (!$this->admin_model->updateCtsize($maloaitrasua, $masize[$i], 0.7, $giatheosize, json_encode($thanhphantheosize))) 
				// 								{echo "insertCtsize error"; return;}

				// 							break;
				// 						case 'SizeM':
				// 							if (!$this->admin_model->insertCtSize($maloaitrasua, $masize[$i], 1, $gia, json_encode($thanhphantheosize)))
				// 								{echo "insertCtsize error"; return;}

				// 							break;
				// 						case 'SizeL':

				// 							$thanhphantheosize = $thanhphan;
				// 							for ($j=0; $j < count($thanhphantheosize); $j++) { 
				// 								$thanhphantheosize[$j]["LIEULUONG"] *= 1.2;
				// 							}
				// 							$giatheosize = $gia * 1.2;
				// 							if (!$this->admin_model->insertCtSize($maloaitrasua, $masize[$i], 1.2, $giatheosize, json_encode($thanhphantheosize))) 
				// 								{echo "insertCtsize error"; return;}

				// 							break;
				// 						case 'SizeXL':

				// 							$thanhphantheosize = $thanhphan;
				// 							for ($j=0; $j < count($thanhphantheosize); $j++) { 
				// 								$thanhphantheosize[$j]["LIEULUONG"] *= 1.5;
				// 							}
				// 							$giatheosize = $gia * 1.5;
				// 							if (!$this->admin_model->insertCtSize($maloaitrasua, $masize[$i], 1.5, $giatheosize, json_encode($thanhphantheosize))) 
				// 								{echo "insertCtsize error"; return;}

				// 							break;
				// 						default:
				// 							# code...
				// 							break;
				// 					}

				// 				}
				// 			} else {
				// 				echo "có lỗi xảy ra bảng ctloaitrasua";
				// 			}
				// 		} else {
				// 			echo "loại này đã tồn tại";
				// 		}


				// 	} else {
				// 		echo "ko upload ddc";
				// 	}

				// }
			}
		}
	}




	public function themnhanvien()
	{
		// GET method
		if ($this->input->server('REQUEST_METHOD') === 'GET') {
			$cookie = get_cookie("SESSIONID");
			$infoSession = $this->checkCookie($cookie);
			if ($infoSession) {

				$bophan = $this->admin_model->getBophan();
				
				$data['mangdulieu'] = array(
					'bophan' => $bophan,
					'anhdaidien' => $infoSession["anhdaidien"],
					'tennv' => $infoSession["tennv"],
					'role' => $infoSession['role']
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
			$infoSession = $this->checkCookie($cookie);
			if ($infoSession) {
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
					'bophan' => $bophan,
					'anhdaidien' => $infoSession["anhdaidien"],
					'tennv' => $infoSession["tennv"],
					'role' => $infoSession['role']

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


	public function lockProduct()
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

				$maloaitrasua = $this->input->post('maloaitrasua');

				if ($this->admin_model->lockProduct($maloaitrasua)) {
					echo '1';
				} else {
					echo '0';
				}
			}
		}
	}


	public function unlockProduct()
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

				$maloaitrasua = $this->input->post('maloaitrasua');

				if ($this->admin_model->unlockProduct($maloaitrasua)) {
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

						$this->admin_model->updateMabophanNhanvien($manv[0]["MANV"], $mabophanmoi);

						if ($this->admin_model->updateManvqlBophan($mabophanmoi, $manv[0]["MANV"])) {
							echo "1";
							return;
						} else {
							echo "Không thể cập nhật manvql " . $manv[0]["MANV"];
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
							echo "1";
							return;
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


	public function thunhap()
	{
		// GET method
		if ($this->input->server('REQUEST_METHOD') === 'GET') {
			$cookie = get_cookie("SESSIONID");


			$this->load->view('admin/thunhap_view');
			
		} else {
			$cookie = get_cookie("SESSIONID");
			$infoSession = $this->checkCookie($cookie);
			if ($infoSession) {

				// $mataikhoan = $this->input->post('matk');
				// $mabophanmoi = $this->input->post('bophanmoi');
				// $mabophancu = $this->input->post('bophancu');
				// $mavaitromoi = $this->input->post('vaitromoi');
				// $mavaitrocu = $this->input->post('vaitrocu');
				// $manv = $this->admin_model->findManhanvien($mataikhoan);

				// if ($mavaitromoi == "Quản lí") {

				// 	// cập nhật vai trò tài khoản
				// 	$this->admin_model->updateVaitroTaikhoan($mataikhoan, 1);
				// 	// check bộ phận có ai quản lí chưa
				// 	if ($this->admin_model->checkEmptyAdminBophan($mabophanmoi)) {

				// 		$this->admin_model->updateMabophanNhanvien($manv[0]["MANV"], $mabophanmoi);

				// 		if ($this->admin_model->updateManvqlBophan($mabophanmoi, $manv[0]["MANV"])) {
				// 			echo "1";
				// 			return;
				// 		} else {
				// 			echo "Không thể cập nhật manvql " . $manv[0]["MANV"];
				// 		}
							
						
				// 	} else {
				// 		echo "Bộ phận này đã có người quản lí";
				// 	}
					

				// } else if ($mavaitromoi == "Nhân viên") {
				// 	if ($mavaitrocu == "Quản lí") {
				// 		// ngắt quyền
				// 		if ($this->admin_model->updateManvqlBophan($mabophancu, NULL)) {
				// 			if ($this->admin_model->updateVaitroTaikhoan($mataikhoan, 2)) {
				// 				if ($this->admin_model->updateMabophanNhanvien($manv[0]["MANV"], $mabophanmoi)) {
				// 					echo "1";
				// 					return;
				// 				}
				// 			}
				// 			echo "1";
				// 			return;
				// 		}
				// 	} else if ($mavaitrocu == "Nhân viên"){
				// 		if ($this->admin_model->updateMabophanNhanvien($manv[0]["MANV"], $mabophanmoi)) {
				// 					echo "1";
				// 					return;
				// 				}					
				// 	}
				// }

			}
		}
	}




	public function biendonggia()
	{
		// GET method
		if ($this->input->server('REQUEST_METHOD') === 'GET') {
			$cookie = get_cookie("SESSIONID");


			$this->load->view('admin/biendonggia_view');
			
		} else {
			$cookie = get_cookie("SESSIONID");
			$infoSession = $this->checkCookie($cookie);
			if ($infoSession) {

				// $mataikhoan = $this->input->post('matk');
				// $mabophanmoi = $this->input->post('bophanmoi');
				// $mabophancu = $this->input->post('bophancu');
				// $mavaitromoi = $this->input->post('vaitromoi');
				// $mavaitrocu = $this->input->post('vaitrocu');
				// $manv = $this->admin_model->findManhanvien($mataikhoan);

				// if ($mavaitromoi == "Quản lí") {

				// 	// cập nhật vai trò tài khoản
				// 	$this->admin_model->updateVaitroTaikhoan($mataikhoan, 1);
				// 	// check bộ phận có ai quản lí chưa
				// 	if ($this->admin_model->checkEmptyAdminBophan($mabophanmoi)) {

				// 		$this->admin_model->updateMabophanNhanvien($manv[0]["MANV"], $mabophanmoi);

				// 		if ($this->admin_model->updateManvqlBophan($mabophanmoi, $manv[0]["MANV"])) {
				// 			echo "1";
				// 			return;
				// 		} else {
				// 			echo "Không thể cập nhật manvql " . $manv[0]["MANV"];
				// 		}
							
						
				// 	} else {
				// 		echo "Bộ phận này đã có người quản lí";
				// 	}
					

				// } else if ($mavaitromoi == "Nhân viên") {
				// 	if ($mavaitrocu == "Quản lí") {
				// 		// ngắt quyền
				// 		if ($this->admin_model->updateManvqlBophan($mabophancu, NULL)) {
				// 			if ($this->admin_model->updateVaitroTaikhoan($mataikhoan, 2)) {
				// 				if ($this->admin_model->updateMabophanNhanvien($manv[0]["MANV"], $mabophanmoi)) {
				// 					echo "1";
				// 					return;
				// 				}
				// 			}
				// 			echo "1";
				// 			return;
				// 		}
				// 	} else if ($mavaitrocu == "Nhân viên"){
				// 		if ($this->admin_model->updateMabophanNhanvien($manv[0]["MANV"], $mabophanmoi)) {
				// 					echo "1";
				// 					return;
				// 				}					
				// 	}
				// }

			}
		}
	}



	public function tonkho()
	{
		// GET method
		if ($this->input->server('REQUEST_METHOD') === 'GET') {
			$cookie = get_cookie("SESSIONID");


			$this->load->view('admin/tonkho_view');
			
		} else {
			$cookie = get_cookie("SESSIONID");
			$infoSession = $this->checkCookie($cookie);
			if ($infoSession) {

				// $mataikhoan = $this->input->post('matk');
				// $mabophanmoi = $this->input->post('bophanmoi');
				// $mabophancu = $this->input->post('bophancu');
				// $mavaitromoi = $this->input->post('vaitromoi');
				// $mavaitrocu = $this->input->post('vaitrocu');
				// $manv = $this->admin_model->findManhanvien($mataikhoan);

				// if ($mavaitromoi == "Quản lí") {

				// 	// cập nhật vai trò tài khoản
				// 	$this->admin_model->updateVaitroTaikhoan($mataikhoan, 1);
				// 	// check bộ phận có ai quản lí chưa
				// 	if ($this->admin_model->checkEmptyAdminBophan($mabophanmoi)) {

				// 		$this->admin_model->updateMabophanNhanvien($manv[0]["MANV"], $mabophanmoi);

				// 		if ($this->admin_model->updateManvqlBophan($mabophanmoi, $manv[0]["MANV"])) {
				// 			echo "1";
				// 			return;
				// 		} else {
				// 			echo "Không thể cập nhật manvql " . $manv[0]["MANV"];
				// 		}
							
						
				// 	} else {
				// 		echo "Bộ phận này đã có người quản lí";
				// 	}
					

				// } else if ($mavaitromoi == "Nhân viên") {
				// 	if ($mavaitrocu == "Quản lí") {
				// 		// ngắt quyền
				// 		if ($this->admin_model->updateManvqlBophan($mabophancu, NULL)) {
				// 			if ($this->admin_model->updateVaitroTaikhoan($mataikhoan, 2)) {
				// 				if ($this->admin_model->updateMabophanNhanvien($manv[0]["MANV"], $mabophanmoi)) {
				// 					echo "1";
				// 					return;
				// 				}
				// 			}
				// 			echo "1";
				// 			return;
				// 		}
				// 	} else if ($mavaitrocu == "Nhân viên"){
				// 		if ($this->admin_model->updateMabophanNhanvien($manv[0]["MANV"], $mabophanmoi)) {
				// 					echo "1";
				// 					return;
				// 				}					
				// 	}
				// }

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