// mặc định muốn dùng angular sẽ có những dòng này 
var app = angular.module('myApp',['ngMaterial', 'ngMessages', 'ngRoute']);
app.controller('AppCtrl',  function($scope, $rootScope){
	$scope.project = {
    description: 'Nuclear Missile Defense System',
    rate: 500,
    special: true

    
  };

  $scope.themnguyenlieu = function (soluong) {
  	datas = [];
  	for(i = 0; i < soluong; i++) {
  		datas[i] = i + 1
  	}

  	$scope.dataset = datas
  }

  $scope.themtrasua = function (soluong) {
    datas = [];
    for(i = 0; i < soluong; i++) {
      datas[i] = i + 1
    }

    $scope.soluongtrasua = datas
  }

  $scope.themnguyenlieubosung = function (soluong) {
    datas = [];
    for(i = 0; i < soluong; i++) {
      datas[i] = i + 1
    }
    console.log(datas)
    $scope.hienthinlbosung = datas
   
  }

  $scope.parJson = function (json) {
     return angular.fromJson(json);
  }

  $scope.findNcc = function (json, mancc) {
    newArray = [];
    for (arr of json) {
      if (arr.MANHACUNGCAP == mancc) {
        newArray.push(arr);
      }
    }

    $scope.items = newArray;
    $scope.hienthidondathang = false
  }


  $scope.findKhachhang = function (json, mancc) {
    newArray = [];
    for (arr of json) {
      if (arr.MANHACUNGCAP == mancc) {
        newArray.push(arr);
      }
    }

    $scope.items = newArray;
    $scope.hienthidondathang = false
  }

  $scope.setDondh = function (madondh) {
    $scope.dondathang = madondh
    $scope.hienthidondathang = false;
  }

  $scope.showListMadondh = function () {
    $scope.hienthidondathang = true;
  }


  $scope.showListkhachhang = function () {
    $scope.hienthikhachhang = true
    $scope.buttonNhapthongtin = true
    $scope.hienthiFormKH = false
    $scope.thongtinKH = false
    $scope.hienthiListTenloai = false;

  }

   $scope.setkhachhang = function (thongtin) {
    array = [thongtin]
    $scope.thongtinKH = array
    $scope.sodienthoai = parseInt(thongtin.SDT)
    $scope.hienthiFormKH = false
    $scope.buttonNhapthongtin = false
    $scope.hienthikhachhang = false;

   }

   $scope.formKH = function (sodienthoai) {
    $scope.hienthiFormKH = true
    $scope.buttonNhapthongtin = false
    $scope.hienthikhachhang = false
   }


   $scope.setLoaitrasua = function(item) {
    $scope.tenloai = item.TENLOAI
    $scope.matenloai = item.MALOAITRASUA
    $scope.hienthiListTenloai = false
    console.log(item.MALOAITRASUA)

   }


   $scope.arrayMaloaits = function (tenloaits, maloaits, arrayts) {
    if (!arrayts) {
      arrayts = []
    }
    for (arr of arrayts) {
      if (arr.maloai == maloaits ) {
        return
      }
    }
    var object = {
      'tenloai': tenloaits,
      'maloai': maloaits
    }
    arrayts.push(object)
    $scope.arrayts = arrayts
    $scope.arrayloaits = arrayts
    console.log(arrayts)
   }

   
}) 


app.controller('managedAccount',  function($scope, $rootScope, $http) {
  $scope.getEmptyBophan = function (bophan) {
    emptyNvql = [];
    for (arr of bophan) {
      if (!arr.MANVQL) {
        emptyNvql.push(arr);
      }
    }
    $scope.allBophan = emptyNvql;
  }


  $scope.getBophan = function (bophan) {
    notEmptyNvql = [];
    for (arr of bophan) {
      if (arr.MANVQL) {
        notEmptyNvql.push(arr);
      }
    }
    $scope.allBophan = notEmptyNvql;
  }

  $scope.parJson = function (json) {
     return angular.fromJson(json);
     console.log(angular.fromJson(json))
  }

  $scope.display = function (acc, vaitro, bophan) {
    acc.VAITROMOI = ''
    acc.BOPHANMOI = ''
    acc.hienthi = !acc.hienthi
    acc.DONE = false

  }


  mataikhoan = ''
  $scope.getMatk = function (matk) {
    mataikhoan = matk;
  }

  // confirm delete 
  $scope.confirmLock = function () {
    //  trả về promise để khi jquery gọi thì nó sẽ đợi kết quả trả về từ angular (alert.js )
    return new Promise((resolve, reject) => {
      var data = $.param({ 
        matk: mataikhoan
      }) 
    
      var urlApi = 'http://localhost:8080/trasua/admin/lockAccount'

      var config = {
        headers: {
          'Content-Type': 'application/x-www-form-urlencoded;charset=UTF-8'
        }
      }
    
      $http.post(urlApi, data, config)
      .then(function(res) {
        if (res.data != "0") {
          resolve(res.data)
        } else {
          reject(res.data)

        } 
      }, function (res, err) {
        console.log(err)
      })


    })
  }


  $scope.confirmUnlock = function () {
    //  trả về promise để khi jquery gọi thì nó sẽ đợi kết quả trả về từ angular (alert.js )
    return new Promise((resolve, reject) => {
      var data = $.param({ 
        matk: mataikhoan
      }) 
    
      var urlApi = 'http://localhost:8080/trasua/admin/unlockAccount'

      var config = {
        headers: {
          'Content-Type': 'application/x-www-form-urlencoded;charset=UTF-8'
        }
      }
    
      $http.post(urlApi, data, config)
      .then(function(res) {
        if (res.data != "0") {
          resolve(res.data)
        } else {
          reject(res.data)

        } 
      }, function (res, err) {
        console.log(err)
      })


    })
  }


  $scope.displayDone = function (acc) {
    acc.DONE = true
  }

  account = ''
  $scope.getAccount = function (acc) {
    account = acc;
  }

  $scope.confirmDone = function () {
    //  trả về promise để khi jquery gọi thì nó sẽ đợi kết quả trả về từ angular (alert.js )
    return new Promise((resolve, reject) => {
      if (account.BOPHANMOI == '') {
        reject("Vui lòng chọn bộ phận")
        return
      } else if ((account.VAITRO == account.VAITROMOI) && (account.MABOPHANCU == account.BOPHANMOI)) {
        reject("Không có thay đổi nào")
        return
      }


      var data = $.param({ 
        matk: account.MATAIKHOAN,
        vaitromoi: account.VAITROMOI,
        vaitrocu: account.VAITRO,
        bophanmoi: account.BOPHANMOI,
        bophancu: account.MABOPHANCU
      }) 
    
      var urlApi = 'http://localhost:8080/trasua/admin/changePermission'

      var config = {
        headers: {
          'Content-Type': 'application/x-www-form-urlencoded;charset=UTF-8'
        }
      }
    
      $http.post(urlApi, data, config)
      .then(function(res) {
        if (res.data == "1") {
          resolve(res.data)
        } else {
          reject(res.data)

        } 
      }, function (res, err) {
        console.log(err)
      })


    })
  }

})


