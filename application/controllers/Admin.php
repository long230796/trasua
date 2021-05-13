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
		$this->db->select('*');
	 	$this->db->where('MATAIKHOAN', $dl[0]["MATAIKHOAN"]);
	 	$manv = $this->db->get('nhanvien')->result_array();

	 	// Lấy mã bộ phận
	 	$mabophan = $manv[0]["MABP"];

	 	// kiểm tra vai trò
	 	$this->db->select('*');
	 	$this->db->where('MANVQL', $manv[0]['MANV']);
	 	$isAdmin = $this->db->get('bophan')->result_array();


		

		$passwordDb = $dl[0]["MATKHAU"];

		if ($password == $passwordDb) {

			if ($dl[0]["TAIKHOAN"] == "root@gmail.com") {
				$role = "Boss";
			} else if(!empty($isAdmin)) {
				$role = "Quản lí"; 
			} else {
				$role = "Nhân viên";
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
				'mabophan' => $mabophan,
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
			} else 
			{
			    $dl= $this->admin_model->checktrangthai($username);

			    foreach ($dl as $key => $value) 
			    {
			    	if($value["TRANGTHAI"]=='1')
			    	{
			    		date_default_timezone_set("Asia/Ho_Chi_Minh");
			    		$mataikhoan = $this->admin_model->getMataikhoanByUsername($username);
			    		$malichsuhoatdong = 'lshd' . uniqid();
			    		$thoigianhoatdong   = date("d/m/Y H:i:sa");

			    		// Thêm lịch sử hoat dộng
			    		if($this->admin_model->insertLichsuhoatdong($malichsuhoatdong, $mataikhoan[0]["MATAIKHOAN"], $thoigianhoatdong)) {

			    			$this->input->set_cookie('SESSIONID', $newData['id'], 3000);

			    		}
			    		else {
			    			echo " Đăng nhập không thành công";
			    		}

			    	}
			    	else
			    	{
			    		echo "Tài khoản này đã bị khóa!! ";
			    		delete_cookie("SESSIONID");
			    	}
			    }	
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
									'mabophan' => $subData['mabophan'],
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


	



	public function initThunhapChart()
	{
		// GET method
		if ($this->input->server('REQUEST_METHOD') === 'GET') {
			$cookie = get_cookie("SESSIONID");
			$infoSession = $this->checkCookie($cookie);
			if ($infoSession) {
				if ($infoSession["role"] == "Quản lí" || $infoSession["mabophan"] == "BPBANHANG" && $infoSession["role"] == "Boss") {

					date_default_timezone_set("Asia/Ho_Chi_Minh");

					$dateNow = date("d/m/Y");
					$dateNow = explode("/", $dateNow);

					$d=cal_days_in_month(CAL_GREGORIAN,$dateNow[1],$dateNow[2]);

					$thunhapngaytheothang = array('Thu nhập tháng '.$dateNow[1], 0);
					$thunhapthangnay = $this->Thongke_gia('00', $dateNow[1], $dateNow[2]);


					for ($i=1; $i <= $d; $i++) { 
						$temp = $this->Thongke_gia((string)$i, $dateNow[1], $dateNow[2]);
						array_push($thunhapngaytheothang, $temp);
					}

					$jsonThunhap = array();

					$jsonThunhap["thunhapngay"] = $thunhapngaytheothang;
					$jsonThunhap["thunhapthang"] = $thunhapthangnay;


					echo json_encode($jsonThunhap);

					return;
				}


				$this->load->view('403_view');
				

			}
		} else {
			$cookie = get_cookie("SESSIONID");
			$infoSession = $this->checkCookie($cookie);
			if ($infoSession) {

			}
		}
	}



	public function filterthunhapchart($day, $month, $year)
	{
		// GET method
		if ($this->input->server('REQUEST_METHOD') === 'GET') {
			$cookie = get_cookie("SESSIONID");
			$infoSession = $this->checkCookie($cookie);
			if ($infoSession) {
				if (($infoSession["role"] == "Quản lí" && $infoSession["mabophan"] == "BPBANHANG") || $infoSession["role"] == "Boss") {


					$arrayFilter = $day . "/" . $month . "/" . $year;
					
					$arrayFilter = explode("/", $arrayFilter);

					if ((int)$arrayFilter[0]) {
						$thunhaptheofilter = $this->Thongke_gia($arrayFilter[0], $arrayFilter[1], $arrayFilter[2]);
						// lấy tất cả ngày thu nhập của tháng(khởi tạo)
						$thunhapngaytheothang = array('Thu nhập tháng '.$arrayFilter[1], 0);
						$d=cal_days_in_month(CAL_GREGORIAN,$arrayFilter[1],$arrayFilter[2]);


						for ($i=1; $i <= $d; $i++) { 
							$temp = $this->Thongke_gia((string)$i, $arrayFilter[1], $arrayFilter[2]);
							array_push($thunhapngaytheothang, $temp);
						}

						$jsonThunhap = array();

						$jsonThunhap["thunhapngay"] = $thunhapngaytheothang;
						$jsonThunhap["thunhapthang"] = $thunhaptheofilter;

						echo json_encode($jsonThunhap);

					} else if ((int)$arrayFilter[1]) {
						$thunhaptheofilter = $this->Thongke_gia('00', $arrayFilter[1], $arrayFilter[2]);
						// lấy tất cả ngày thu nhập của tháng(khởi tạo 1 mang)
						$thunhapngaytheothang = array('Thu nhập tháng '.$arrayFilter[1], 0);
						$d=cal_days_in_month(CAL_GREGORIAN,$arrayFilter[1],$arrayFilter[2]);


						for ($i=1; $i <= $d; $i++) { 
							$temp = $this->Thongke_gia((string)$i, $arrayFilter[1], $arrayFilter[2]);
							array_push($thunhapngaytheothang, $temp);
						}

						$jsonThunhap = array();

						$jsonThunhap["thunhapngay"] = $thunhapngaytheothang;
						$jsonThunhap["thunhapthang"] = $thunhaptheofilter;

						echo json_encode($jsonThunhap);
					} else {
						$thunhaptheofilter = $this->Thongke_gia('00', '00', $arrayFilter[2]);
						// lấy tất cả ngày thu nhập của tháng(khởi tạo 1 mang)
						$thunhapngaytheothang = array('Thu nhập năm '.$arrayFilter[2], 0);


						for ($i=1; $i <= 12; $i++) { 
							$temp = $this->Thongke_gia('00', (string)$i, $arrayFilter[2]);
							array_push($thunhapngaytheothang, $temp);
						}

						$jsonThunhap = array();

						$jsonThunhap["thunhapngay"] = $thunhapngaytheothang;
						$jsonThunhap["thunhapthang"] = $thunhaptheofilter;

						echo json_encode($jsonThunhap);
					}

				} else {
					$this->load->view('403_view');
				}

				

			}
		} else {
			$cookie = get_cookie("SESSIONID");
			$infoSession = $this->checkCookie($cookie);
			if ($infoSession) {

			}
		}
	}




	public function filtertonkhochart($day, $month, $year)
	{
		// GET method
		if ($this->input->server('REQUEST_METHOD') === 'GET') {
			$cookie = get_cookie("SESSIONID");
			$infoSession = $this->checkCookie($cookie);
			if ($infoSession) {

				if (($infoSession["role"] == "Quản lí" && $infoSession["mabophan"] == "BPKHO" ) || $infoSession["role"] == "Boss") {

					if ($day) {
						$soluongtieuthu = array('Tiêu thụ trong ngày '.$day);

					} else if ($month) {
						$soluongtieuthu = array('Tiêu thụ trong tháng '.$month);

					} else if ($year) {
						$soluongtieuthu = array('Tiêu thụ trong năm '.$year);

					}

					$tennguyenlieu = array('x');
					$nguyenlieutieuthu = $this->Thongke_kho($day, $month, $year);

					for ($i=0; $i < count($nguyenlieutieuthu); $i++) { 
						array_push($tennguyenlieu, $nguyenlieutieuthu[$i]["TENNL"]);
						array_push($soluongtieuthu, $nguyenlieutieuthu[$i]["LIEULUONG"]);

					}

					$jsontonkho = array();

					$jsontonkho["soluongtieuthu"] = $soluongtieuthu;
					$jsontonkho["tennguyenlieu"] = $tennguyenlieu;


					echo json_encode($jsontonkho);
					
					return;
				}

				$this->load->view('403_view');

			}
		} else {
			$cookie = get_cookie("SESSIONID");
			$infoSession = $this->checkCookie($cookie);
			if ($infoSession) {

			}
		}
	}





	public function initTonkhoChart()
	{
		// GET method
		if ($this->input->server('REQUEST_METHOD') === 'GET') {
			$cookie = get_cookie("SESSIONID");
			$infoSession = $this->checkCookie($cookie);
			if ($infoSession) {
				if (($infoSession["role"] == "Quản lí" && $infoSession["mabophan"] == "BPKHO" ) || $infoSession["role"] == "Boss") {

					date_default_timezone_set("Asia/Ho_Chi_Minh");

					$dateNow = date("d/m/Y");
					$dateNow = explode("/", $dateNow);

					// $d=cal_days_in_month(CAL_GREGORIAN,$dateNow[1],$dateNow[2]);

					$soluongtieuthu = array('Tiêu thụ trong tháng '.$dateNow[1]);
					$tennguyenlieu = array('x');
					$nguyenlieutieuthu = $this->Thongke_kho('00', $dateNow[1], $dateNow[2]);

					for ($i=0; $i < count($nguyenlieutieuthu); $i++) { 
						array_push($tennguyenlieu, $nguyenlieutieuthu[$i]["TENNL"]);
						array_push($soluongtieuthu, $nguyenlieutieuthu[$i]["LIEULUONG"]);

					}


					$jsontonkho = array();

					$jsontonkho["soluongtieuthu"] = $soluongtieuthu;
					$jsontonkho["tennguyenlieu"] = $tennguyenlieu;


					echo json_encode($jsontonkho);
					return;
				}

				$this->load->view('403_view');
				

			}
		} else {
			$cookie = get_cookie("SESSIONID");
			$infoSession = $this->checkCookie($cookie);
			if ($infoSession) {

			}
		}
	}



	public function Thongke_gia($day,$month,$year)
	{
		$this->db->select('*');
		$dl= $this->db->get('hoadon')->result_array();
		$tong=0;
		$tongmonth=0;
		$tongyear=0;
		for ($i=0; $i < count($dl); $i++) { 
			$dl[$i]["NGAYLAP"] = date("d/m/Y", $dl[$i]["NGAYLAP"]);
		}
		$dayArray = array();
		foreach ($dl as $key => $value) {
			$temp = explode("/", $value["NGAYLAP"]);
			
			if ($day == $temp[0] && $month == $temp[1] && $year == $temp[2]) {
				array_push($dayArray, $value["MAHOADON"]);
			}
		}
		$this->db->select('*');
		$result= $this->db->get('cthoadon')->result_array();
		for ($i=0; $i <count($result) ; $i++) { 
			$ss=array_shift($dayArray);
			foreach ($result as $key => $value) {
				if ($ss == $value["MAHOADON"]) {
					$tong=$tong + $value["GIA"];
				}
			}
		}
		$dayArray2=array();
		foreach ($dl as $key => $value) {
			$temp = explode("/", $value["NGAYLAP"]);
			
			if ($day == 00 &&$month == $temp[1] && $year == $temp[2]) {
				array_push($dayArray2, $value["MAHOADON"]);
			}			
		}
		for ($i=0; $i <count($result) ; $i++) { 
			$ss2=array_shift($dayArray2);
			foreach ($result as $key => $value) {
				if ($ss2 == $value["MAHOADON"]) {
					$tongmonth=$tongmonth + $value["GIA"];
				}
			}
		}
		$dayArray3=array();
		foreach ($dl as $key => $value) {
			$temp = explode("/", $value["NGAYLAP"]);
			
			if ($day == 00 &&$month == 00 && $year == $temp[2]) {
				array_push($dayArray3, $value["MAHOADON"]);
				}			
		}
		for ($i=0; $i <count($result) ; $i++) { 
			$ss3=array_shift($dayArray3);
			foreach ($result as $key => $value) {
				if ($ss3 == $value["MAHOADON"]) {
					$tongyear=$tongyear + $value["GIA"];
				}
			}
		}


		if ($tong) {
			return $tong;
		} else if ($tongmonth) {
			return $tongmonth;
		} else {
			return $tongyear;
		}

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
				if ($infoSession["mabophan"] == "BPKHO" || $infoSession["role"] == "Boss") {

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
					return;
				}

				$this->load->view('403_view');

			}
		} else {  // post
			$cookie = get_cookie("SESSIONID");
			$infoSession = $this->checkCookie($cookie);
			if ($infoSession) {
				if ($infoSession["mabophan"] == "BPKHO"  || $infoSession["role"] == "Boss") {

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
						if($thiss->admin_model->insertDondathang($madondh, $mancc, $manv, 3)) {
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
				} else {
					$this->load->view('403_view');
				}

				

			}


		}
		
	}


	public function day($day, $month, $year)
	{
		$this->load->model('admin_model');
		$this->admin_model->GetNLL($day,$month,$year);
	}





	public function chitietdondathang($madondh)
	{
		// GET method
		if ($this->input->server('REQUEST_METHOD') === 'GET') {
			$cookie = get_cookie("SESSIONID");
			$infoSession = $this->checkCookie($cookie);
			if ($infoSession) {
				if ($infoSession["mabophan"] == "BPKHO" || $infoSession["role"] == "Boss") {

					$dondathang = $this->admin_model->getDondathangByMa($madondh);
					if (empty($dondathang)) {
						return redirect(base_url()."admin");
					}


					for ($i=0; $i < count($dondathang); $i++) { 

						// lọc ngày
						$dondathang[$i]["NGAYLAP"] = date("d/m/Y", $dondathang[$i]["NGAYLAP"]);


						$dondathang[$i]["CTNHACUNGCAP"] = $this->admin_model->getNhacungcapByMa($dondathang[$i]["MANHACUNGCAP"]);

						$dondathang[$i]["CTNHANVIENLAP"] = $this->admin_model->getNhanvienByMa($dondathang[$i]["NGUOILAP"]);

						$dondathang[$i]["CTTRANGTHAI"] = $this->admin_model->getTrangthaiDondathangByMa($dondathang[$i]["TRANGTHAI"])[0];

						$ctdondh = $this->admin_model->getCtDondathangByMadondh($dondathang[$i]["MADONDH"]);

						// lấy tên nguyên liệu theo mã
						for ($j=0; $j < count($ctdondh); $j++) { 
							$ctdondh[$j]["TENNL"] = $this->admin_model->getTennlByManl($ctdondh[$j]["MANGUYENLIEU"])[0]["TENNL"];
						}

						$dondathang[$i]["CTDONDATHANG"] = $ctdondh;



					}
					
					$data['mangdulieu'] = array(
						'dondathang' => $dondathang,
						'anhdaidien' => $infoSession["anhdaidien"],
						'tennv' => $infoSession["tennv"],
						'role' => $infoSession['role']
					);


					$this->load->view('admin/chitietdondathang_view', $data);
					// lapphieunhap, ct phieunhap, ctcungcap
					return;

				}
				$this->load->view('403_view');
			}
		} else {
			$cookie = get_cookie("SESSIONID");
			$infoSession = $this->checkCookie($cookie);
			if ($infoSession) {

			}
		}
	}


	public function huydondathang($madondh)
	{
		// GET method
		if ($this->input->server('REQUEST_METHOD') === 'GET') {
			$cookie = get_cookie("SESSIONID");
			$infoSession = $this->checkCookie($cookie);
			if ($infoSession) {
				if ($infoSession["mabophan"] == "BPBANHANG" || $infoSession["role"] == "Boss") {
					if ($this->admin_model->updateTrangthaiDondh($madondh, 2)) {
						echo "1";
						return;
					} else {
						echo "0";
					}

					return;
				}

				$this->load->view('403_view');

			}
		} else {
			$cookie = get_cookie("SESSIONID");
			$infoSession = $this->checkCookie($cookie);
			if ($infoSession) {

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
				if ($infoSession["mabophan"] == "BPKHO" || $infoSession["role"] == "Boss") {

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
					return;

				}

				$this->load->view('403_view');

			}
		} else {
			$cookie = get_cookie("SESSIONID");
			$infoSession = $this->checkCookie($cookie);
			if ($infoSession) {

				if ($infoSession["mabophan"] == "BPKHO" || $infoSession["role"] == "Boss") {

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

					return;
				}

				$this->load->view('403_view');
			}
		}
	}


	public function  nhaphang($madondh) 
	{
		// GET method
		if ($this->input->server('REQUEST_METHOD') === 'GET') {
			$cookie = get_cookie("SESSIONID");
			$infoSession = $this->checkCookie($cookie);
			if ($infoSession) {

				if ($infoSession["mabophan"] == "BPKHO" || $infoSession["role"] == "Boss") {

					$dondathang = $this->admin_model->getDondathangByMa($madondh);
					if (empty($dondathang)) {
						return redirect(base_url()."admin");
					}


					for ($i=0; $i < count($dondathang); $i++) { 

						// lọc ngày
						$dondathang[$i]["NGAYLAP"] = date("d/m/Y", $dondathang[$i]["NGAYLAP"]);


						$dondathang[$i]["CTNHACUNGCAP"] = $this->admin_model->getNhacungcapByMa($dondathang[$i]["MANHACUNGCAP"]);

						$dondathang[$i]["CTNHANVIENLAP"] = $this->admin_model->getNhanvienByMa($dondathang[$i]["NGUOILAP"]);

						$dondathang[$i]["CTTRANGTHAI"] = $this->admin_model->getTrangthaiDondathangByMa($dondathang[$i]["TRANGTHAI"])[0];

						$ctdondh = $this->admin_model->getCtDondathangByMadondh($dondathang[$i]["MADONDH"]);

						// lấy tên nguyên liệu theo mã
						for ($j=0; $j < count($ctdondh); $j++) { 
							$ctdondh[$j]["TENNL"] = $this->admin_model->getTennlByManl($ctdondh[$j]["MANGUYENLIEU"])[0]["TENNL"];
						}

						$dondathang[$i]["CTDONDATHANG"] = $ctdondh;



					}

					
					$data['mangdulieu'] = array(
						'dondathang' => $dondathang,
						'anhdaidien' => $infoSession["anhdaidien"],
						'tennv' => $infoSession["tennv"],
						'role' => $infoSession['role']
					);


					$this->load->view('admin/donnhaphang_view', $data);
					// lapphieunhap, ct phieunhap, ctcungcap
					return;
				}

				$this->load->view('403_view');

			}
		} else {
			$cookie = get_cookie("SESSIONID");
			$infoSession = $this->checkCookie($cookie);
			if ($infoSession) {

				if ($infoSession["mabophan"] == "BPKHO" || $infoSession["role"] == "Boss") {

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
						if ($this->admin_model->updateNguyenlieuTonkho($nguyenlieucu, $soluong, $donvi, $dongia)) {
							echo "insert nguyen lieu thanh cong";
						}
					}

					// TAO PHIEU NHAP 
					if ($this->admin_model->insertPhieunhap($maphieunhap, $dondathang, $manv)) {
						// insert ct phieunhap
						if ($this->admin_model->insertCtphieunhap($nguyenlieucu, $maphieunhap, $soluong, $donvi, $note)) {
							echo "tao phieu nhap, insert ct phieunhap thanh cong";
							if ($this->admin_model->updateTrangthaiDondh($dondathang, 1)) {
								echo "Update trạng thái đơn đặt thành công";
							}
							// update trang thai don dat hang

						}
					}
					return;
				}

				$this->load->view('403_view');
			}
		}
	}

	public function getSizeApi($cookie)
	{
		$infoSession = $this->checkCookie($cookie);
		if ($infoSession) {

			$sizecosan = $this->admin_model->getSize();

			echo json_encode($sizecosan);

		} else {
			$this->load->view('403_view');
		}
	}


	public function taotrasua()
	{
		// GET method
		if ($this->input->server('REQUEST_METHOD') === 'GET') {
			$cookie = get_cookie("SESSIONID");
			$infoSession = $this->checkCookie($cookie);
			if ($infoSession) {
				if ($infoSession["role"] == "Boss") {
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
				
					return;
				}

				$this->load->view('403_view');

			}
		} else {
			$cookie = get_cookie("SESSIONID");
			$infoSession = $this->checkCookie($cookie);
			if ($infoSession) {

				if ($infoSession["role"] == "Boss") {
				
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
					
					echo '<pre>';
					echo var_dump($donvi);
					echo '</pre>';

					foreach ($size as $key => $value) {
						if ($value) {
							array_push($tensize, explode("_", $value)[0]);
							array_push($masize, explode("_", $value)[1]); 

						}
					}


					// echo '<pre>';
					// echo var_dump($tensize);
					// echo '</pre>';

					// echo '<pre>';
					// echo var_dump($masize);
					// echo '</pre>';

					// echo '<pre>';
					// echo var_dump($nguyenlieucu);
					// echo '</pre>';

					// echo '<pre>';
					// echo var_dump($soluong);
					// echo '</pre>';

					

					for ($i=0; $i < count($nguyenlieucu); $i++) { 
						$thanhphan[$i] = array(
							'MANGUYENLIEU' => $nguyenlieucu[$i], 
							'LIEULUONG' => $soluong[$i],
							'DONVI' => $donvi[$i],
							'GHICHU' => $note[$i]
						);
					}


					// check duplicate nguyenlieu
					foreach (array_count_values($nguyenlieucu) as $key => $value) {
						if ($value > 1) {
							echo "Nguyên liệu bị trùng !";
							return;
						}
					}

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
											// lấy khối lượng riêng
											$khoiluongrieng = (float)$thiss->admin_model->getkhoiluongriengByMasize($masize[$i])[0]["KHOILUONGRIENG"];

											$thanhphantheosize = $thanhphan;
											for ($j=0; $j < count($thanhphantheosize); $j++) { 
												$thanhphantheosize[$j]["LIEULUONG"] *= $khoiluongrieng;
											}
											$giatheosize = $gia * $khoiluongrieng;
											if (!$thiss->admin_model->insertCtSize($maloaitrasua, $masize[$i], $khoiluongrieng, $giatheosize, json_encode($thanhphantheosize))) 
												{echo "insertCtsize error"; return;}

											break;
										case 'SizeM':
											// lấy khối lượng riêng
											$khoiluongrieng = (float)$thiss->admin_model->getkhoiluongriengByMasize($masize[$i])[0]["KHOILUONGRIENG"];

											if (!$thiss->admin_model->insertCtSize($maloaitrasua, $masize[$i], $khoiluongrieng, $gia, json_encode($thanhphantheosize)))
												{echo "insertCtsize error"; return;}

											break;
										case 'SizeL':
											// lấy khối lượng riêng
											$khoiluongrieng = (float)$thiss->admin_model->getkhoiluongriengByMasize($masize[$i])[0]["KHOILUONGRIENG"];

											$thanhphantheosize = $thanhphan;
											for ($j=0; $j < count($thanhphantheosize); $j++) { 
												$thanhphantheosize[$j]["LIEULUONG"] *= $khoiluongrieng;
											}

											$giatheosize = $gia * $khoiluongrieng;
											if (!$thiss->admin_model->insertCtSize($maloaitrasua, $masize[$i], $khoiluongrieng, $giatheosize, json_encode($thanhphantheosize))) 
												{echo "insertCtsize error"; return;}

											break;
										case 'SizeXL':
											// lấy khối lượng riêng
											$khoiluongrieng = (float)$thiss->admin_model->getkhoiluongriengByMasize($masize[$i])[0]["KHOILUONGRIENG"];

											$thanhphantheosize = $thanhphan;
											for ($j=0; $j < count($thanhphantheosize); $j++) { 
												$thanhphantheosize[$j]["LIEULUONG"] *= $khoiluongrieng;
											}
											$giatheosize = $gia * $khoiluongrieng;
											if (!$thiss->admin_model->insertCtSize($maloaitrasua, $masize[$i], $khoiluongrieng, $giatheosize, json_encode($thanhphantheosize))) 
												{echo "insertCtsize error"; return;}

											break;
										default:
											# code...
											break;
									}

								}
							} else {
								echo "Nguyên liệu bị trùng";
							}
						} else {
							echo "loại này đã tồn tại";
						}


					} else {
						echo "ko upload ddc";
					}
				} else {
					$this->load->view('403_view');
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
				if ($infoSession["mabophan"] == "BPBANHANG"  || $infoSession["role"] == "Boss") {
				
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
					return;
				}

				$this->load->view('403_view');

			

			}
		} else {
			$cookie = get_cookie("SESSIONID");
			$infoSession = $this->checkCookie($cookie);
			if ($infoSession) {
				if ($infoSession["mabophan"] == "BPBANHANG" || $infoSession["role"] == "Boss") { 
				
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
					$madonhang = 'dh' . uniqid();
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
										"manl" => $gianguyenlieuthem[$j][0]["MANGUYENLIEU"],
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
							if ($this->admin_model->insertHoadon($mahoadon, $manv, $makhmoi, 2)) {
								echo "insert hoa don thanh cong";
								// insert đơn hàng 
								if ($this->admin_model->insertDonhang($madonhang, $mahoadon, 1)) {
									if ($this->admin_model->insertCthoadon($mahoadon, $tensize, $matenloai, $soluongmua, $nguyenlieubosung, $finalPrices, $size)) {
										echo "Them cthoadon thanhcong";

										if ($this->admin_model->updateNguyenlieu($kho)) {
											echo "cap nhat nguyen lieu thanh cong";
										}
									}

								}

							}	

						}

						return;
					} else {
						if ($this->admin_model->insertHoadon($mahoadon, $manv, $makh, 2)) {
							echo "insert hoa don thanh cong";
							if ($this->admin_model->insertDonhang($madonhang, $mahoadon, 1)) {
								if ($this->admin_model->insertCthoadon($mahoadon, $tensize, $matenloai, $soluongmua, $nguyenlieubosung, $finalPrices, $size)) {
									echo "Them cthoadon thanhcong";

									if ($this->admin_model->updateNguyenlieu($kho)) {
										echo "cap nhat nguyen lieu thanh cong";
									}
								}

							}

						}	
					}




				


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

					return;
				}

				$this->load->view('403_view');

				

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



	public function danhsachdondathang()
	{
		// GET method
		if ($this->input->server('REQUEST_METHOD') === 'GET') {
			$cookie = get_cookie("SESSIONID");
			$infoSession = $this->checkCookie($cookie);
			if ($infoSession) {
				if ($infoSession["mabophan"] == "BPKHO" || $infoSession["role"] == "Boss") {
				
					$dondathang = $this->admin_model->getAllDondathang();
					for ($i=0; $i < count($dondathang); $i++) { 

						// lọc ngày
						$dondathang[$i]["NGAYLAP"] = date("d/m/Y", $dondathang[$i]["NGAYLAP"]);

						$dondathang[$i]["CTNHACUNGCAP"] = $this->admin_model->getNhacungcapByMa($dondathang[$i]["MANHACUNGCAP"]);

						$dondathang[$i]["CTNHANVIENLAP"] = $this->admin_model->getNhanvienByMa($dondathang[$i]["NGUOILAP"]);

						$dondathang[$i]["CTTRANGTHAI"] = $this->admin_model->getTrangthaiDondathangByMa($dondathang[$i]["TRANGTHAI"])[0];

						$ctdondh = $this->admin_model->getCtDondathangByMadondh($dondathang[$i]["MADONDH"]);

						// lấy tên nguyên liệu theo mã
						for ($j=0; $j < count($ctdondh); $j++) { 
							$ctdondh[$j]["TENNL"] = $this->admin_model->getTennlByManl($ctdondh[$j]["MANGUYENLIEU"])[0]["TENNL"];
						}

						$dondathang[$i]["CTDONDATHANG"] = $ctdondh;



					}

	 				

					

					
					$data['mangdulieu'] = array(
						'dondathang' => $dondathang,
						'anhdaidien' => $infoSession["anhdaidien"],
						'tennv' => $infoSession["tennv"],
						'role' => $infoSession['role']
					);

					$this->load->view('admin/danhsachdondathang_view', $data);
					// // lapphieunhap, ct phieunhap, ctcungcap
					return;
				}

				$this->load->view('403_view');

			

			}
		} else {
			$cookie = get_cookie("SESSIONID");
			$infoSession = $this->checkCookie($cookie);
			if ($infoSession) {

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
				if ($infoSession["role"] == "Boss") {
				
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
											// lấy khối lượng riêng
											$khoiluongrieng = (float)$thiss->admin_model->getkhoiluongriengByMasize($masize[$i])[0]["KHOILUONGRIENG"];

											$thanhphantheosize = $thanhphan;
											for ($j=0; $j < count($thanhphantheosize); $j++) { 
												$thanhphantheosize[$j]["LIEULUONG"] *= $khoiluongrieng;
											}
											$giatheosize = $gia * $khoiluongrieng;
											if (!$thiss->admin_model->updateCtsize($maloaitrasua, $masize[$i], $khoiluongrieng, $giatheosize, json_encode($thanhphantheosize))) 
												{echo "updateCtsize error"; return;}

											break;
										case 'SizeM':
											// lấy khối lượng riêng
											$khoiluongrieng = (float)$thiss->admin_model->getkhoiluongriengByMasize($masize[$i])[0]["KHOILUONGRIENG"];

											if (!$thiss->admin_model->updateCtsize($maloaitrasua, $masize[$i], $khoiluongrieng, $gia, json_encode($thanhphan)))
												{echo "updateCtsize error"; return;}

											break;
										case 'SizeL':
										// lấy khối lượng riêng
											$khoiluongrieng = (float)$thiss->admin_model->getkhoiluongriengByMasize($masize[$i])[0]["KHOILUONGRIENG"];

											$thanhphantheosize = $thanhphan;
											for ($j=0; $j < count($thanhphantheosize); $j++) { 
												$thanhphantheosize[$j]["LIEULUONG"] *= $khoiluongrieng;
											}
											$giatheosize = $gia * $khoiluongrieng;
											if (!$thiss->admin_model->updateCtsize($maloaitrasua, $masize[$i], $khoiluongrieng, $giatheosize, json_encode($thanhphantheosize))) 
												{echo "updateCtsize error"; return;}

											break;
										case 'SizeXL':
											// lấy khối lượng riêng
											$khoiluongrieng = (float)$thiss->admin_model->getkhoiluongriengByMasize($masize[$i])[0]["KHOILUONGRIENG"];

											$thanhphantheosize = $thanhphan;
											for ($j=0; $j < count($thanhphantheosize); $j++) { 
												$thanhphantheosize[$j]["LIEULUONG"] *= $khoiluongrieng;
											}
											$giatheosize = $gia * $khoiluongrieng;
											if (!$thiss->admin_model->updateCtsize($maloaitrasua, $masize[$i], $khoiluongrieng, $giatheosize, json_encode($thanhphantheosize))) 
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

					return;
				}

				$this->load->view('403_view');

				
			}
		}
	}



	


	public function danhsachhoadon()
	{
		// GET method
		if ($this->input->server('REQUEST_METHOD') === 'GET') {
			$cookie = get_cookie("SESSIONID");
			$infoSession = $this->checkCookie($cookie);
			if ($infoSession) {
				if ($infoSession["mabophan"] == "BPBANHANG" || $infoSession["role"] == "Boss") {
				
					$loaitrasua = $this->admin_model->getLimitLoaitrasua();
					$khachhang = $this->admin_model->getKhachhang();
					$nguyenlieu = $this->admin_model->getNguyenlieu();
					$hoadon = $this->admin_model->getAllHoadon();
					$ctsize = $this->admin_model->getCtSizeWithTensize();
					

					for ($i=0; $i < count($hoadon); $i++) { 
						if ($hoadon[$i]["MATRANGTHAI"] == '1') {
							$hoadon[$i]["TRANGTHAITEXT"] = "Đã thanh toán";
						} else if ($hoadon[$i]["MATRANGTHAI"] == '2') {
							$hoadon[$i]["TRANGTHAITEXT"] = "Chưa thanh toán";
						}
					}

					
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

					$this->load->view('admin/danhsachhoadon_view', $data);
					// // lapphieunhap, ct phieunhap, ctcungcap
					return;
				}

				$this->load->view('403_view');

			

			}
		} else {
			$cookie = get_cookie("SESSIONID");
			$infoSession = $this->checkCookie($cookie);
			if ($infoSession) {

			}
		}
	}



	public function danhsachdonhang()
	{
		// GET method
		if ($this->input->server('REQUEST_METHOD') === 'GET') {
			$cookie = get_cookie("SESSIONID");
			$infoSession = $this->checkCookie($cookie);
			if ($infoSession) {
				if ($infoSession["mabophan"] == "BPBANHANG" || $infoSession["role"] == "Boss") {
				
					$donhang = $this->admin_model->getDonhang();

					for ($i=0; $i < count($donhang); $i++) { 
						$matrangthai = $donhang[$i]["TRANGTHAIDONHANG"];
						$donhang[$i]["TRANGTHAITEXT"] = $this->admin_model->getTrangthaidonhangByMa($matrangthai)[0]["TENTRANGTHAI"];
						$donhang[$i]["NGAYTAO"] = date("d/m/Y", $donhang[$i]["NGAYTAO"]);
						$donhang[$i]["ARRAYTRANGTHAI"] = array();
						$donhang[$i]["display"] = false;


						for ($j=0; $j < 4; $j++) { 
							if ($j < (int)$matrangthai-1) {
								$donhang[$i]["ARRAYTRANGTHAI"][$j] = "success";
							}
							if ($j == (int)$matrangthai-1) {
								$donhang[$i]["ARRAYTRANGTHAI"][$j] = "active";
							}
							if ($j > (int)$matrangthai-1) {
								$donhang[$i]["ARRAYTRANGTHAI"][$j] = "waiting";
							}
						}						
					}


					$data['mangdulieu'] = array(
						'donhang' => $donhang,
						'anhdaidien' => $infoSession["anhdaidien"],
						'tennv' => $infoSession["tennv"],
						'role' => $infoSession['role']
					);

					$this->load->view('admin/danhsachdonhang_view', $data);
					// // lapphieunhap, ct phieunhap, ctcungcap
					return;
				}

				$this->load->view('403_view');

			

			}
		} else {
			$cookie = get_cookie("SESSIONID");
			$infoSession = $this->checkCookie($cookie);
			if ($infoSession) {

			}
		}
	}


	public function xacnhandonhang()
	{
		// GET method
		if ($this->input->server('REQUEST_METHOD') === 'GET') {
			$cookie = get_cookie("SESSIONID");
			$infoSession = $this->checkCookie($cookie);
			if ($infoSession) {
				if ($infoSession["mabophan"] == "BPBANHANG" || $infoSession["role"] == "Boss") {
				}
				

				$this->load->view('403_view');

			

			}
		} else {
			$cookie = get_cookie("SESSIONID");
			$infoSession = $this->checkCookie($cookie);
			if ($infoSession) {

			}
		}
	}




	public function updatetrangthaidonhang()
	{
		// GET method
		if ($this->input->server('REQUEST_METHOD') === 'GET') {
			$cookie = get_cookie("SESSIONID");
			$infoSession = $this->checkCookie($cookie);
			if ($infoSession) {


				$this->load->view('403_view');


			}
		} else {
			$cookie = get_cookie("SESSIONID");
			$infoSession = $this->checkCookie($cookie);
			if ($infoSession) {
				if ($infoSession["mabophan"] == "BPBANHANG" || $infoSession["role"] == "Boss") {
				
					$madonhang = $this->input->post('madonhang');
					$matrangthai = $this->input->post('matrangthai');
					$mahoadon = $this->input->post('mahoadon');
					
					if ($this->admin_model->updateTrangthaiDonhang($madonhang, $matrangthai)) {

						if ($matrangthai == '4') {
							// update trang thai hoa don
							$this->admin_model->updateTrangthaiHoadon($mahoadon, 1);

							
						}

						$donhang = $this->admin_model->getDonhang();

						for ($i=0; $i < count($donhang); $i++) { 
							$matrangthai = $donhang[$i]["TRANGTHAIDONHANG"];
							$donhang[$i]["TRANGTHAITEXT"] = $this->admin_model->getTrangthaidonhangByMa($matrangthai)[0]["TENTRANGTHAI"];
							$donhang[$i]["NGAYTAO"] = date("d/m/Y", $donhang[$i]["NGAYTAO"]);
							$donhang[$i]["ARRAYTRANGTHAI"] = array();

							if ($donhang[$i]["MADONHANG"] != $madonhang) {
								$donhang[$i]["display"] = false;
							} else {
								$donhang[$i]["display"] = true;
							}


							for ($j=0; $j < 4; $j++) { 
								if ($j < (int)$matrangthai-1) {
									$donhang[$i]["ARRAYTRANGTHAI"][$j] = "success";
								}
								if ($j == (int)$matrangthai-1) {
									$donhang[$i]["ARRAYTRANGTHAI"][$j] = "active";
								}
								if ($j > (int)$matrangthai-1) {
									$donhang[$i]["ARRAYTRANGTHAI"][$j] = "waiting";
								}
							}						
						}

						echo json_encode($donhang);
					}

					return;
				}
			}
		}
	}




	public function chitiethoadon($mahoadon)
	{
		// GET method
		if ($this->input->server('REQUEST_METHOD') === 'GET') {
			$cookie = get_cookie("SESSIONID");
			$infoSession = $this->checkCookie($cookie);
			if ($infoSession) {

				$loaitrasua = $this->admin_model->getLimitLoaitrasua();
				$khachhang = $this->admin_model->getKhachhang();
				$nguyenlieu = $this->admin_model->getNguyenlieu();
				$hoadon = $this->admin_model->getLimitHoadonByMaloai($mahoadon);
				$ctsize = $this->admin_model->getCtSizeWithTensize();
				

				for ($i=0; $i < count($hoadon); $i++) { 
					if ($hoadon[$i]["MATRANGTHAI"] == '1') {
						$hoadon[$i]["TRANGTHAITEXT"] = "Đã thanh toán";
					} else if ($hoadon[$i]["MATRANGTHAI"] == '2') {
						$hoadon[$i]["TRANGTHAITEXT"] = "Đã hủy";
					}
				}

				
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

				$this->load->view('admin/chitiethoadon_view', $data);

			}
		} else {
			$cookie = get_cookie("SESSIONID");
			$infoSession = $this->checkCookie($cookie);
			if ($infoSession) {

			}
		}
	}




	public function huyhoadon($mahoadon)
	{
		// GET method
		if ($this->input->server('REQUEST_METHOD') === 'GET') {
			$cookie = get_cookie("SESSIONID");
			$infoSession = $this->checkCookie($cookie);
			if ($infoSession) {
				if ($infoSession["mabophan"] == "BPBANHANG" || $infoSession["role"] == "Boss") {
				
				    $arrayNguyenlieu = array();
				    $size = array();

					// getsize and maloaits in cthoadon				
					$data = $this->admin_model->getCthoadonByMahoadon2($mahoadon);

					foreach ($data as $key => $value) {
						if ($value["NGUYENLIEUBOSUNG"] !== "null" && $value["NGUYENLIEUBOSUNG"] !== "[]" && $value["NGUYENLIEUBOSUNG"] !== "") {
							$arraynlbosung = json_decode($value["NGUYENLIEUBOSUNG"], true);
							foreach ($arraynlbosung as $key1 => $value1) {
								array_push($arrayNguyenlieu, array(
									'manl' => $value1["manl"],
									'soluong' => $value1["soluongthem"]
								));
							}
							
						}

						array_push($size, $this->admin_model->getMasizeByTensize($value["TENSIZE"]));
						

					}


					// Lấy công thức trong bảng ctsize
					$thanhphanctsize = $this->admin_model->getCtsizeBymaloaimasize($data, $size);

					// ttách nguyên liệu từ ctsize

					foreach ($thanhphanctsize as $key => $value) {
						$arrayThanhphan = json_decode($value["THANHPHAN"], true);
						foreach ($arrayThanhphan as $key1 => $value1) {
							if (!empty($arrayNguyenlieu)) {
								for ($i=0; $i < count($arrayNguyenlieu); $i++) { 
									if ($arrayNguyenlieu[$i]["manl"] == $value1["MANGUYENLIEU"]) {

										$arrayNguyenlieu[$i]["soluong"] = (float)$arrayNguyenlieu[$i]["soluong"] + (float)$value1["LIEULUONG"];
									} else {
										// 
									}
								}
								// không trùng thì push
								$dem = 0;
								for ($i=0; $i < count($arrayNguyenlieu); $i++) {
									if ($arrayNguyenlieu[$i]["manl"] != $value1["MANGUYENLIEU"]) {
										$dem++;
										if ($dem == count($arrayNguyenlieu)) {
											array_push($arrayNguyenlieu, array(
												'manl' => $value1["MANGUYENLIEU"], 
												'soluong' => $value1["LIEULUONG"] 
											));
										}
									}
									
								}	

							} else {
								array_push($arrayNguyenlieu, array(
									'manl' => $value1["MANGUYENLIEU"], 
									'soluong' => $value1["LIEULUONG"] 
								));
							}
						}
					}

					// trả về nguyên liệu và cập nhật lại trạng thái cho hoadon

					$tonkho = $this->admin_model->getNguyenlieu();
					foreach ($arrayNguyenlieu as $key => $value) {
						for ($i=0; $i < count($tonkho); $i++) { 
							if ($value["manl"] == $tonkho[$i]["MANGUYENLIEU"]) {
								$tonkho[$i]["TONKHO"] = (float)$tonkho[$i]["TONKHO"] + (float)$value["soluong"];
							}
						}
					}

					// cập nhật kho
					if ($this->admin_model->updateNguyenlieu($tonkho)) {
						// cập nhật trạng thái đơn hàng
						if ($this->admin_model->updateTrangthaiHoadon($mahoadon, 2)) {
							echo "1";
							return;
						} else {
							echo "Cập nhật trạng thái hóa đơn thất bại";
							return;
						}
					} else {
						echo "Cập nhật kho thất bại";
					}

					// echo '<pre>';
					// echo var_dump($size);
					// echo '</pre>';

					// echo '<pre>';
					// echo var_dump($arrayNguyenlieu);
					// echo '</pre>';

					// echo '<pre>';
					// echo var_dump($thanhphanctsize);
					// echo '</pre>';

					// echo '<pre>';
					// echo var_dump($tonkho);
					// echo '</pre>';
					return;
				}

				$this->load->view('403_view');

				

			}
		} else {
			$cookie = get_cookie("SESSIONID");
			$infoSession = $this->checkCookie($cookie);
			if ($infoSession) {


				// $diachigiaohang = $this->input->post('diachi');
				// $mahoadon = $this->input->post('mahoadon');
				// $manhanviengiao = $this->input->post('manhanvien');
				// $maphieugiao = 'PG' . uniqid();


				// $hoadon = $this->admin_model->getHoadonByMa($mahoadon);

				// // echo '<pre>';
				// // echo var_dump($hoadon);
				// // echo '</pre>';

				// if ($this->admin_model->insertPhieugiao($maphieugiao, $mahoadon, $infoSession['manv'], $manhanviengiao, 1)) {

				// 	if ($this->admin_model->insertCtphieugiao($hoadon[0]["CTHOADON"], $maphieugiao, $diachigiaohang)) {
				// 		echo "insert hoadon va cthoadon thanh cong";
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
				if ($infoSession["role"] == "Boss") {
				
					$bophan = $this->admin_model->getBophan();
					
					$data['mangdulieu'] = array(
						'bophan' => $bophan,
						'anhdaidien' => $infoSession["anhdaidien"],
						'tennv' => $infoSession["tennv"],
						'role' => $infoSession['role']
					);


					$this->load->view('admin/themnhanvien_view', $data);
					return;
				}

				$this->load->view('403_view');

			}
		} else {
			$cookie = get_cookie("SESSIONID");
			$infoSession = $this->checkCookie($cookie);
			if ($infoSession) {
				if ($infoSession["role"] == "Boss") {
				
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

					return;
				}

				$this->load->view('403_view');

				
			}
		}
	}



	public function danhsachtaikhoan()
	{
		// GET method
		if ($this->input->server('REQUEST_METHOD') === 'GET') {
			$cookie = get_cookie("SESSIONID");
			$infoSession = $this->checkCookie($cookie);
			if ($infoSession) {
				if ($infoSession["role"] == "Boss") {
				
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
					return;
				}

				$this->load->view('403_view');
			}

			
		} else {
			$cookie = get_cookie("SESSIONID");
			$infoSession = $this->checkCookie($cookie);
			if ($infoSession) {
				if ($infoSession["role"] == "Boss") {
				
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

					return;
				}

				$this->load->view('403_view');

				
			}
		}
	}



	public function danhsachnguyenlieu()
	{
		// GET method
		if ($this->input->server('REQUEST_METHOD') === 'GET') {
			$cookie = get_cookie("SESSIONID");
			$infoSession = $this->checkCookie($cookie);
			if ($infoSession) {
				if ($infoSession["mabophan"] == "BPKHO" || $infoSession["role"] == "Boss") {
				
					$nguyenlieu = $this->admin_model->getNguyenlieu();


					$data['mangdulieu'] = array(
						'nguyenlieu' => $nguyenlieu,
						'anhdaidien' => $infoSession["anhdaidien"],
						'tennv' => $infoSession["tennv"],
						'role' => $infoSession['role']

					);

					// $this->load->view('admin/taikhoantongquat_view', $data);
					$this->load->view('admin/nguyenlieu_view', $data);
					return;
				}

				$this->load->view('403_view');

			}

			
		} else {
			$cookie = get_cookie("SESSIONID");
			$infoSession = $this->checkCookie($cookie);
			if ($infoSession) {
				if ($infoSession["mabophan"] == "BPKHO" || $infoSession["role"] == "Boss") {
				
					$manl = $this->input->post('manl');
					$tennlmoi = $this->input->post('tennlmoi');
					$dongiamoi = $this->input->post('dongiamoi');


					if ($this->admin_model->updateNguyenlieuByManl($manl, $tennlmoi, $dongiamoi)) {
						echo "1";
					}		

					return;
				}

				$this->load->view('403_view');
			}
		}
	}


	public function deleteNguyenlieu()
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
				if ($infoSession["role"] == "Boss") {
				
					$manguyenlieu = $this->input->post('manl');

					// echo $manguyenlieu;
					$result = $this->admin_model->deleteNguyenlieu($manguyenlieu);
					if ($result == "ctloaitrasua") {
						echo "2";
					} else {
						echo "1";
					}
					return;
				}

				$this->load->view('403_view');
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
				if ($infoSession["role"] == "Boss") {
				
					$mataikhoan = $this->input->post('matk');

					if ($this->admin_model->lockAccount($mataikhoan)) {
						echo '1';
					} else {
						echo '0';
					}

					return;
				}

				$this->load->view('403_view');
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
				if ($infoSession["role"] == "Boss") {
				
					$mataikhoan = $this->input->post('matk');

					if ($this->admin_model->unlockAccount($mataikhoan)) {
						echo '1';
					} else {
						echo '0';
					}

					return;
				}

				$this->load->view('403_view');
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
				
				if (($infoSession["role"] == "Quản lí" && $infoSession["mabophan"] == "BPBANHANG" ) || $infoSession["role"] == "Boss") {
				
					$maloaitrasua = $this->input->post('maloaitrasua');

					if ($this->admin_model->lockProduct($maloaitrasua)) {
						echo '1';
					} else {
						echo '0';
					}

					return;
				}

				$this->load->view('403_view');
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

				if (($infoSession["role"] == "Quản lí" && $infoSession["mabophan"] == "BPBANHANG" ) || $infoSession["role"] == "Boss") {
				
					$maloaitrasua = $this->input->post('maloaitrasua');

					if ($this->admin_model->unlockProduct($maloaitrasua)) {
						echo '1';
					} else {
						echo '0';
					}

					return;
				}

				$this->load->view('403_view');
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

				if ($infoSession["role"] == "Boss") {
				
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

					return;
				}

				$this->load->view('403_view');

			}
		}
	}


	public function thunhap()
	{
		// GET method
		if ($this->input->server('REQUEST_METHOD') === 'GET') {
			$cookie = get_cookie("SESSIONID");
			$infoSession = $this->checkCookie($cookie);
			if ($infoSession) {	
				if (($infoSession["role"] == "Quản lí" && $infoSession["mabophan"] == "BPBANHANG" ) || $infoSession["role"] == "Boss") {
				
					$this->load->view('admin/thunhap_view');

					return;
				}

				$this->load->view('403_view');
				
			}

			
		} else {
			$cookie = get_cookie("SESSIONID");
			$infoSession = $this->checkCookie($cookie);
			if ($infoSession) {

				

			}
		}
	}


	public function deletesanpham()
	{

		// GET method
		if ($this->input->server('REQUEST_METHOD') === 'GET') {
			$cookie = get_cookie("SESSIONID");
			$infoSession = $this->checkCookie($cookie);
			if ($infoSession) {
				
			}

			
		} else {
			$cookie = get_cookie("SESSIONID");
			$infoSession = $this->checkCookie($cookie);
			if ($infoSession) {

				if ($infoSession["role"] == "Boss") {
					$s = $this->input->post('maloaitrasua');

					$this->db->select('*');
					$dl=$this->db->get('cthoadon')->result_array();
					$a=0;
					foreach ($dl as $key => $value) {
						if ($value["MALOAITRASUA"]==$s) {
							$a++;
						} 			
					}
					if ($a==0) {
						$this->db->where('MALOAITRASUA', $s);
						$this->db->delete('ctloaitrasua');
						$this->db->affected_rows();
						// Thêm phần xóa ở bảng SIZE
						$this->db->where('MALOAITRASUA', $s);
						$this->db->delete('ctsize');
						$this->db->affected_rows();
						// Thêm phần xóa ở lịch sử chỉnh sửa
						$this->db->where('MALOAITRASUA', $s);
						$this->db->delete('lichsuchinhsua');
						$this->db->affected_rows();


				 		$this->db->where('MALOAITRASUA', $s);
						$this->db->delete('loaitrasua');
						$result = $this->db->affected_rows();

						if ($result) {
							echo "1";
						}
					} else {
						echo "Sản phẩm đã có giao dịch";
					}	
					return;

				}

				$this->load->view('403_view');


			}
		}
			
	}





	public function deleteTaikhoan($mataikhoan)
	{
		if ($this->input->server('REQUEST_METHOD') === 'GET') {

			$cookie = get_cookie("SESSIONID");
			$infoSession = $this->checkCookie($cookie);
			if ($infoSession) {
				if ($infoSession["role"] == "Boss") {

					// lấy mã nhân viên dựa theo mã tài khoản
					$this->db->select('MANV');
					$this->db->where('MATAIKHOAN', $mataikhoan);
					$s = $this->db->get('nhanvien')->result_array();
					if (!empty($s)) {

						$s = $s[0]["MANV"];	

						$this->db->select('*');
						$dl1=$this->db->get('hoadon')->result_array();

						$this->db->select('*');
						$dl2=$this->db->get('phieunhap')->result_array();

						$a=0; $b=0; $c=0; $d=0;

						$this->db->select('*');
						$dl3=$this->db->get('bophan')->result_array();

						$this->db->select('*');
						$dl4=$this->db->get('dondh')->result_array();

						foreach ($dl1 as $key => $value) {
							if ($value["MANV"]==$s) {
								$a++;
							}
						}

						foreach ($dl2 as $key => $value) {
							if ($value["MANV"]==$s) {
								$b++;
							}
						}

						foreach ($dl3 as $key => $value) {
							if ($value["MANVQL"]==$s) {
								$c++;
							}
						}

						foreach ($dl4 as $key => $value) {
							if ($value["NGUOILAP"]==$s) {
								$d++;
							}
						}

						if ($a != 0 | $b != 0 | $d != 0) {
							echo "Nhân viên đã thực hiện giao dịch";
						} else {

							if ($c!=0) {
								echo "Không thể xóa nhân viên quản lí";
							} else {

								$this->db->select('MATAIKHOAN');
								$this->db->where('MANV', $s);
								$z=$this->db->get('nhanvien')->result_array();
								
								$this->db->where('MANV', $s);
								$this->db->delete('nhanvien');
								if ($this->db->affected_rows()) {

									$this->db->where('MATAIKHOAN', $z[0]["MATAIKHOAN"]);
									$this->db->delete('taikhoan');
									if ($this->db->affected_rows()) {
										echo "1";
										return;
									} 

									echo "Xóa tài khoản thất bại";
									return;
								}

								echo "Xóa nhân viên thất bại";
							}
						}		
					}
					

				}
			}
		} else {
			$cookie = get_cookie("SESSIONID");
			$infoSession = $this->checkCookie($cookie);
			if ($infoSession) {

			}
		}
					
	}





	public function Thongke_kho($day,$month,$year)
	{	
		$thanhphan = array();
		$mahoadon = array();
		$loaitrasua = array();
		$nguyenlieutieuthu = array();


		$this->db->select('*');
		$this->db->where('MATRANGTHAI', 1);
		$hoadon = $this->db->get('hoadon')->result_array();

		// chuyen ngaylap ve dd/mm/yy
		for ($i=0; $i < count($hoadon); $i++) { 
			$hoadon[$i]["NGAYLAP"] = date("d/m/Y", $hoadon[$i]["NGAYLAP"]);
			$hoadon[$i]["EXPLODEDATE"] = explode("/", $hoadon[$i]["NGAYLAP"]);
		}


		if ((int)$day) {
			foreach ($hoadon as $key => $value) {
				if ($value["EXPLODEDATE"][0] == $day && $value["EXPLODEDATE"][1] == $month && $value["EXPLODEDATE"][2] == $year) {
					array_push($mahoadon, $value["MAHOADON"]);	

				}
			}
		} else if ((int)$month) {
			foreach ($hoadon as $key => $value) {
				if ($value["EXPLODEDATE"][1] == $month && $value["EXPLODEDATE"][2] == $year) {
					array_push($mahoadon, $value["MAHOADON"]);	

				}
			}
		} else {
			foreach ($hoadon as $key => $value) {
				if ($value["EXPLODEDATE"][2] == $year) {
					array_push($mahoadon, $value["MAHOADON"]);	

				}
			}
		}

		

		// Lấy MALOAITRASUA và TENSIZE bằng mahoadon

		foreach ($mahoadon as $key => $value) {
			$this->db->select('*');
			$this->db->where('MAHOADON', $value);
			$temp = $this->db->get('cthoadon')->result_array();
			array_push($loaitrasua, $temp);
		}

		// lấy khoiluongrieng bằng masize
		for ($i=0; $i < count($loaitrasua); $i++) { 
			for ($j=0; $j < count($loaitrasua[$i]); $j++) { 
				$this->db->select('*');
				$this->db->where('MASIZE', $loaitrasua[$i][$j]["MASIZE"]);
				$dl = $this->db->get('khoiluongsize')->result_array();
				$loaitrasua[$i][$j]["KHOILUONGRIENG"] = $dl[0]["KHOILUONGRIENG"];
			}
		}



		// lấy công thức loaitrasua
		foreach ($loaitrasua as $key => $value) {
			foreach ($value as $key1 => $value1) {
				$this->db->select('MANGUYENLIEU, LIEULUONG');
				$this->db->where('MALOAITRASUA', $value1["MALOAITRASUA"]);
				$temp = $this->db->get('ctloaitrasua')->result_array();

				// Tính số lượng nl theo size và theo số lượng mua
				foreach ($temp as $keyTemp => $valueTemp) {
					$soluongnl = (float)$valueTemp["LIEULUONG"] * (float)$value1["SOLUONG"];
					$soluongsaucung = array(
						'MANGUYENLIEU' => $valueTemp["MANGUYENLIEU"], 
						'LIEULUONG' => $soluongnl * (float)$value1["KHOILUONGRIENG"]
					);
					array_push($thanhphan, $soluongsaucung);
				}

				// kiểm tra có nguyên liệu bổ sung không
				if ($value1["NGUYENLIEUBOSUNG"] != "null") {
					$decode = json_decode($value1["NGUYENLIEUBOSUNG"], true);
					foreach ($decode as $keyDecode => $valueDecode) {
						$soluongnl = (float)$valueDecode["soluongthem"] * (float)$value1["SOLUONG"];
						$soluongsaucung = array(
							'MANGUYENLIEU' => $valueDecode["manl"], 
							'LIEULUONG' => $soluongnl * (float)$value1["KHOILUONGRIENG"]
						);

						array_push($thanhphan, $soluongsaucung);
					}
				}


			}
		}


		// lấy tên nguyên liệu theo mã nguyên liệu
		
		foreach ($thanhphan as $key => $value) {

			
			$this->db->select('TENNL');
			$this->db->where('MANGUYENLIEU', $value["MANGUYENLIEU"]);
			$temp = $this->db->get('nguyenlieu')->result_array();

			
			array_push($nguyenlieutieuthu, array(
				'TENNL' => $temp[0]["TENNL"], 
				'MANGUYENLIEU' => $value["MANGUYENLIEU"],
				'LIEULUONG' => $value["LIEULUONG"]
			));

				
			
		}

		
		
		// cộng nguyên liệu trùng lặp
		for ($i=0; $i < count($nguyenlieutieuthu)-1; $i++) { 
			for ($j=$i+1; $j < count($nguyenlieutieuthu);) { 
				if ($nguyenlieutieuthu[$i]["MANGUYENLIEU"] == $nguyenlieutieuthu[$j]["MANGUYENLIEU"]) {
					$nguyenlieutieuthu[$i]["LIEULUONG"] += $nguyenlieutieuthu[$j]["LIEULUONG"];
					array_splice($nguyenlieutieuthu,$j,1);

				} else {
					$j++;
				}
			}
		}

		return $nguyenlieutieuthu;
		


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
				if (($infoSession["role"] == "Quản lí" && $infoSession["mabophan"] == "BPBANHANG" ) || $infoSession["role"] == "Boss") {
				

					return;
				}

				$this->load->view('403_view');

				

			}
		}
	}



	public function tonkho()
	{
		// GET method
		if ($this->input->server('REQUEST_METHOD') === 'GET') {
			$cookie = get_cookie("SESSIONID");
			$infoSession = $this->checkCookie($cookie);
			if ($infoSession) {
				if ($infoSession["mabophan"] == "BPKHO" || $infoSession["role"] == "Boss") {
					
					$this->load->view('admin/tonkho_view');
				
					return;
				}

				$this->load->view('403_view');

			}

			
		} else {
			$cookie = get_cookie("SESSIONID");
			$infoSession = $this->checkCookie($cookie);
			if ($infoSession) {


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