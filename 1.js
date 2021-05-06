// mặc định muốn dùng angular sẽ có những dòng này 
var app = angular.module('myApp',['ngMaterial', 'ngMessages', 'ngRoute', 'ngCookies']);
app.controller('AppCtrl',  function($scope, $rootScope, $q, $timeout, $log, $mdConstant, $cookies, $http, $location){
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
    console.log(soluong)
    datas = [];
    for(i = 0; i < soluong; i++) {
      datas[i] = i + 1
    }

    $scope.soluongtrasua = datas
  }

  $scope.xoatrasua = function (soluongtrasua, data) {

    var index = soluongtrasua.indexOf(data);
    if (index > -1) {
      soluongtrasua.splice(index, 1);
    }
    $scope.soluongtrasua = soluongtrasua
    console.log(soluongtrasua)

   
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
    $scope.hienthikhachhang = !$scope.hienthikhachhang
    $scope.buttonNhapthongtin = !$scope.buttonNhapthongtin
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

   $scope.readmoreHoadon = function (soluonghoadon) {
    soluonghoadon = parseInt(soluonghoadon) + 10;
    $scope.soluonghoadon = soluonghoadon
    console.log(soluonghoadon)
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

   $scope.displayHoadon = function (hoadon) {
    hoadon.display = !hoadon.display

   }
   

   $scope.test = function () {
    $scope.testvalue = !$scope.testvalue
    console.log($scope.testvalue)
   }


   $scope.findMasize = function (size) {
    console.log(size)
   }





   $scope.setDonvi = function (json, manl, index) {
    for (obj of json) {
      if (obj.MANGUYENLIEU == manl) {
        // console.log(document.getElementsByClassName("donvi")[index-1].value)

        document.getElementsByClassName("donvi")[index-1].value = obj.DONVI
      }
    }
   }
  
  mahoadon = ''
  $scope.getMahoadon = function (mahd) {
    mahoadon = mahd;
  }

   // confirm delete 
  $scope.confirmCancelHoadon = function () {
    //  trả về promise để khi jquery gọi thì nó sẽ đợi kết quả trả về từ angular (alert.js )
    return new Promise((resolve, reject) => {
    
      var urlApi = 'http://localhost:8080/trasua/admin/huyhoadon/' + mahoadon
    
      $http.get(urlApi)
      .then(function(res) {
        if (res.data == "1") {
          resolve(res.data)
        } else if (res.data == "Cập nhật trạng thái hóa đơn thất bại"){
          reject("Không thể cập nhật trạng thái cho hóa đơn");

        } else if (res.data == "Cập nhật kho thất bại") {
          reject("Cập nhật kho thất bại");
          
        }
      }, function (res, err) {
        console.log(err)
      })


    })
  }
     

   $http.get('http://localhost:8080/trasua/admin/getsizeapi/' + $cookies.get('SESSIONID'))
   .then(function (res) {
     // nếu là cookie dỏm
       if (res.data == "0") {     
         $location.path("/login")
         return; 
       } else {
        var contacts = []
        var masize = []
         for (arr of res.data) {
           contacts.push(arr.TENSIZE)
           masize.push(arr.MASIZE)
         }
         $scope.masizes = masize
       }

       var self = $scope;
       var pendingSearch, cancelSearch = angular.noop;
       var lastSearch;

       self.allContacts = loadContacts(contacts, masize);
       self.contacts = [self.allContacts[0]];
       self.asyncContacts = [];
       self.keys = [$mdConstant.KEY_CODE.COMMA];

       self.querySearch = querySearch;
       self.delayedQuerySearch = delayedQuerySearch;
       self.onModelChange = onModelChange;

       /**
        * Search for contacts; use a random delay to simulate a remote call
        */
       function querySearch (criteria) {
         return criteria ? self.allContacts.filter(createFilterFor(criteria)) : [];
       }

       /**
        * Async search for contacts
        * Also debounce the queries; since the md-contact-chips does not support this
        */
       function delayedQuerySearch(criteria) {
         if (!pendingSearch || !debounceSearch())  {
           cancelSearch();

           return pendingSearch = $q(function(resolve, reject) {
             // Simulate async search... (after debouncing)
             cancelSearch = reject;
             $timeout(function() {

               resolve(self.querySearch(criteria));

               refreshDebounce();
             }, Math.random() * 500, true);
           });
         }

         return pendingSearch;
       }

       function refreshDebounce() {
         lastSearch = 0;
         pendingSearch = null;
         cancelSearch = angular.noop;
       }

       /**
        * Debounce if querying faster than 300ms
        */
       function debounceSearch() {
         var now = new Date().getMilliseconds();
         lastSearch = lastSearch || now;

         return ((now - lastSearch) < 300);
       }

       /**
        * Create filter function for a query string
        */
       function createFilterFor(query) {
         var lowercaseQuery = query.toLowerCase();

         return function filterFn(contact) {
           return (contact._lowername.indexOf(lowercaseQuery) !== -1);
         };

       }

       function onModelChange(newModel) {
         $log.log('The model has changed to ' + JSON.stringify(newModel) + '.');

       }

       function loadContacts(contacts, masize) {
         
         return contacts.map(function (c, index) {

           var cParts = c.split(' ');
           var email = cParts[0][0].toLowerCase() + '.' + cParts[1].toLowerCase() + '@example.com';
           // var hash = CryptoJS.MD5(email);

           var contact = {
             name: c,
             email: email,
             image: '',
             tempImage: function () {
               temp = this.name.split(" ")
               this.image = 'http://localhost:8080/trasua/FileUpload/icons/' + temp[0] + temp[1] + ".jpg"
               return 'http://localhost:8080/trasua/FileUpload/icons/' + temp[0] + temp[1] + ".jpg"
             }
           };
           contact._lowername = contact.name.toLowerCase();
           return contact;
         });
       }


       
   }, function (res) {
     console.log("Can't send the request")
   })
    


   
   
}) 






app.controller('sidebar',  function($scope, $rootScope, $http, $http, $cookies) {
   $http.get('http://localhost:8080/trasua/admin/user')
   .then(function (res) {
    console.log(res.data)
    $scope.anhdaidien = res.data.anhdaidien
    $scope.hovaten = res.data.tennv
    $scope.vaitro = res.data.role
   }, function (err) {
    console.log(err)
   })

})



app.controller('chitietsanpham',  function($scope, $rootScope, $q, $timeout, $log, $mdConstant, $cookies, $http, $location) {
  $scope.displayForm = function (value) {
    $scope.displayCol12 = !value
    console.log($scope.displayCol12)
  }


  $scope.themnguyenlieu = function (soluong) {
    datas = [];
    for(i = 0; i < soluong; i++) {
      datas[i] = i + 1
    }

    $scope.dataset = datas
  }

  maloaitrasua = ''
  $scope.getMaloai = function (maloai) {
    maloaitrasua = maloai;
    console.log(maloai);
  }

  // confirm delete 
  $scope.confirmLock = function () {
    //  trả về promise để khi jquery gọi thì nó sẽ đợi kết quả trả về từ angular (alert.js )
    return new Promise((resolve, reject) => {
      var data = $.param({ 
        maloaitrasua: maloaitrasua
      }) 
    
      var urlApi = 'http://localhost:8080/trasua/admin/lockProduct'

      var config = {
        headers: {
          'Content-Type': 'application/x-www-form-urlencoded;charset=UTF-8'
        }
      }
    
      $http.post(urlApi, data, config)
      .then(function(res) {
        if (res.data != "0") {
          resolve(maloaitrasua)
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
        maloaitrasua: maloaitrasua
      }) 
    
      var urlApi = 'http://localhost:8080/trasua/admin/unlockProduct'

      var config = {
        headers: {
          'Content-Type': 'application/x-www-form-urlencoded;charset=UTF-8'
        }
      }
    
      $http.post(urlApi, data, config)
      .then(function(res) {
        if (res.data != "0") {
          resolve(maloaitrasua)
        } else {
          reject(res.data)

        } 
      }, function (res, err) {
        console.log(err)
      })


    })
  }

  $http.get('http://localhost:8080/trasua/admin/getsizeapi/' + $cookies.get('SESSIONID'))
   .then(function (res) {
     // nếu là cookie dỏm
       if (res.data == "0") {     
         $location.path("/login")
         return; 
       } else {
        var contacts = []
        var masize = []
         for (arr of res.data) {
           contacts.push(arr.TENSIZE)
           masize.push(arr.MASIZE)
         }
         $scope.masizes = masize
       }

       var self = $scope;
       var pendingSearch, cancelSearch = angular.noop;
       var lastSearch;

       self.allContacts = loadContacts(contacts, masize);
       self.contacts = [self.allContacts[0]];
       self.asyncContacts = [];
       self.keys = [$mdConstant.KEY_CODE.COMMA];

       self.querySearch = querySearch;
       self.delayedQuerySearch = delayedQuerySearch;
       self.onModelChange = onModelChange;

       /**
        * Search for contacts; use a random delay to simulate a remote call
        */
       function querySearch (criteria) {
         return criteria ? self.allContacts.filter(createFilterFor(criteria)) : [];
       }

       /**
        * Async search for contacts
        * Also debounce the queries; since the md-contact-chips does not support this
        */
       function delayedQuerySearch(criteria) {
         if (!pendingSearch || !debounceSearch())  {
           cancelSearch();

           return pendingSearch = $q(function(resolve, reject) {
             // Simulate async search... (after debouncing)
             cancelSearch = reject;
             $timeout(function() {

               resolve(self.querySearch(criteria));

               refreshDebounce();
             }, Math.random() * 500, true);
           });
         }

         return pendingSearch;
       }

       function refreshDebounce() {
         lastSearch = 0;
         pendingSearch = null;
         cancelSearch = angular.noop;
       }

       /**
        * Debounce if querying faster than 300ms
        */
       function debounceSearch() {
         var now = new Date().getMilliseconds();
         lastSearch = lastSearch || now;

         return ((now - lastSearch) < 300);
       }

       /**
        * Create filter function for a query string
        */
       function createFilterFor(query) {
         var lowercaseQuery = query.toLowerCase();

         return function filterFn(contact) {
           return (contact._lowername.indexOf(lowercaseQuery) !== -1);
         };

       }

       function onModelChange(newModel) {
         $log.log('The model has changed to ' + JSON.stringify(newModel) + '.');

       }

       function loadContacts(contacts, masize) {
         
         return contacts.map(function (c, index) {

           var cParts = c.split(' ');
           var email = cParts[0][0].toLowerCase() + '.' + cParts[1].toLowerCase() + '@example.com';
           // var hash = CryptoJS.MD5(email);

           var contact = {
             name: c,
             email: email,
             image: '',
             tempImage: function () {
               temp = this.name.split(" ")
               this.image = 'http://localhost:8080/trasua/FileUpload/icons/' + temp[0] + temp[1] + ".jpg"
               return 'http://localhost:8080/trasua/FileUpload/icons/' + temp[0] + temp[1] + ".jpg"
             }
           };
           contact._lowername = contact.name.toLowerCase();
           return contact;
         });
       }


       
   }, function (res) {
     console.log("Can't send the request")
   })
})



app.controller('thunhap',  function($scope, $rootScope, $q, $timeout, $log, $mdConstant, $cookies, $http, $location) {
  


  
})


app.controller('biendonggia',  function($scope, $rootScope, $q, $timeout, $log, $mdConstant, $cookies, $http, $location) {
  


  
})


app.controller('tonkho',  function($scope, $rootScope, $q, $timeout, $log, $mdConstant, $cookies, $http, $location) {
  


  
})




app.controller('managedStock',  function($scope, $rootScope, $http) {
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

  $scope.display = function (acc, dongia, tennl) {
    acc.DONGIAMOI = dongia
    acc.TENNLMOI = tennl
    acc.hienthi = !acc.hienthi
    acc.DONE = false

  }


  manguyenlieu = ''
  $scope.getManl = function (manl) {
    manguyenlieu = manl;
  }

  // confirm delete 
  $scope.confirmDelete = function () {
    //  trả về promise để khi jquery gọi thì nó sẽ đợi kết quả trả về từ angular (alert.js )
    return new Promise((resolve, reject) => {
      var data = $.param({ 
        manl: manguyenlieu
      }) 
    
      var urlApi = 'http://localhost:8080/trasua/admin/deleteNguyenlieu'

      var config = {
        headers: {
          'Content-Type': 'application/x-www-form-urlencoded;charset=UTF-8'
        }
      }
    
      $http.post(urlApi, data, config)
      .then(function(res) {
        if (res.data == "2") {
          reject("Nguyên liệu này đã được sử dụng")
        } else {
          resolve(res.data)

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

  nl = ''
  $scope.getNguyenlieu = function (acc) {
    nl = acc;
  }

  $scope.confirmDone = function () {
    //  trả về promise để khi jquery gọi thì nó sẽ đợi kết quả trả về từ angular (alert.js )
    return new Promise((resolve, reject) => {
      if (nl.TENNLMOI == null) {
        reject("Vui lòng nhập tên nguyên liệu")
        console.log("nlmoi rong")
        return
      } 
      if (nl.DONGIAMOI == null) {
        reject("Vui lòng nhập đơn giá")
        return
      } 

      if (nl.DONGIAMOI < 5000 || nl.DONGIAMOI > 50000) {
        reject("Đơn giá nhập trong khoảng 5000 và 50000")
        return
      } 

      if ((nl.TENNL == nl.TENNLMOI) && (nl.DONGIA == nl.DONGIAMOI.toString())) {
        reject("Không có thay đổi nào")
        return
      }


      var data = $.param({ 
        manl: nl.MANGUYENLIEU,
        tennlmoi: nl.TENNLMOI,
        dongiamoi: nl.DONGIAMOI
      }) 
    
      var urlApi = 'http://localhost:8080/trasua/admin/danhsachnguyenlieu'

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


