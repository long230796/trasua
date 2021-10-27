// mặc định muốn dùng angular sẽ có những dòng này 
var app = angular.module('myApp',['ngMaterial', 'ngMessages', 'ngRoute', 'ngCookies']);
app.controller('AppCtrl',  function($scope, $rootScope, $q, $timeout, $log, $mdConstant, $cookies, $http, $location, $interval){
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

  $scope.xoanguyenlieu = function (dataset, data) {

    var index = dataset.indexOf(data);
    if (index > -1) {
      dataset.splice(index, 1);
    }
    $scope.dataset = dataset
    console.log(dataset)

   
  }

  $scope.xoanguyenlieubosung = function (hienthinlbosung, data) {

    var index = hienthinlbosung.indexOf(data);
    if (index > -1) {
      hienthinlbosung.splice(index, 1);
    }
    $scope.hienthinlbosung = hienthinlbosung
    console.log(hienthinlbosung)

   
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
    $scope.sodienthoai = thongtin.SDT
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


  $scope.confirmCancelDondh = function () {
    //  trả về promise để khi jquery gọi thì nó sẽ đợi kết quả trả về từ angular (alert.js )
    return new Promise((resolve, reject) => {
    
      var urlApi = 'http://localhost:8080/trasua/admin/huydondathang/' + mahoadon
    
      $http.get(urlApi)
      .then(function(res) {
        if (res.data == "1") {
          resolve(res.data)
        } else if (res.data == "0"){
          reject("Không thể cập nhật trạng thái cho đơn đặt");

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


app.controller('donhang',  function($scope, $rootScope, $q, $timeout, $log, $mdConstant, $cookies, $http, $location, $interval){


  function phatrasua(madonhang, matrangthai, mahoadon) {

    var self = $scope, j= 0, counter = 0;

      self.mode = 'query';
      self.activated = true;
      self.determinateValue = 30;
      self.determinateValue2 = 30;

      self.showList = [];

      self.toggleActivation = function() {
          if (!self.activated) self.showList = [];
          if (self.activated) {
            j = counter = 0;
            self.determinateValue = 30;
            self.determinateValue2 = 30;
          }
      };

      $interval(function() {
        self.determinateValue += 1;
        self.determinateValue2 += 1.5;

        if (self.determinateValue == 100) {
          function test() {
           return new Promise((resolve, reject) => {
            
             var data = $.param({ 
               madonhang: madonhang,
               mahoadon: mahoadon,
               matrangthai: matrangthai
             }) 
             
             var urlApi = 'http://localhost:8080/trasua/admin/updatetrangthaidonhang'

             var config = {
               headers: {
                 'Content-Type': 'application/x-www-form-urlencoded;charset=UTF-8'
               }
             }
             
             $http.post(urlApi, data, config)
             .then(function(res) {
               $rootScope.disableXacnhanButton = false;
               resolve(res.data);
               

             }, function (res, err) {
               console.log(err)
             })

           })
          }


          test().then(function (data) {
            $scope.donhang = data
          })

        } 
        // if (self.determinateValue2 > 100) self.determinateValue2 = 30;

          // Incrementally start animation the five (5) Indeterminate,
          // themed progress circular bars

          if ((j < 2) && !self.showList[j] && self.activated) {
            self.showList[j] = true;
          }
          if (counter++ % 4 === 0) j++;

          // Show the indicator in the "Used within Containers" after 200ms delay
          if (j == 2) self.contained = "indeterminate";

      }, 100, 0, true);

      $interval(function() {
        self.mode = (self.mode == 'query' ? 'determinate' : 'query');
      }, 7200, 0, true);
  }





  $scope.xacnhan = function (madonhang, matrangthai, mahoadon) {
    var data = $.param({ 
      madonhang: madonhang,
      mahoadon: mahoadon,
      matrangthai: matrangthai
    }) 
    
    var urlApi = 'http://localhost:8080/trasua/admin/updatetrangthaidonhang'

    var config = {
      headers: {
        'Content-Type': 'application/x-www-form-urlencoded;charset=UTF-8'
      }
    }
    
    $http.post(urlApi, data, config)
    .then(function(res) {
      temps = res.data

      $scope.donhang = temps;

      $rootScope.disableXacnhanButton = true;
      phatrasua(madonhang, 3, mahoadon)

    }, function (res, err) {
      console.log(err)
    })
  }



  $scope.giaohang = function (madonhang, matrangthai, mahoadon) {
    var data = $.param({ 
      mahoadon: mahoadon,
      madonhang: madonhang,
      matrangthai: matrangthai
    }) 
    
    var urlApi = 'http://localhost:8080/trasua/admin/updatetrangthaidonhang'

    var config = {
      headers: {
        'Content-Type': 'application/x-www-form-urlencoded;charset=UTF-8'
      }
    }
    
    $http.post(urlApi, data, config)
    .then(function(res) {
      $scope.donhang = res.data;

    }, function (res, err) {
      console.log(err)
    })
  }



  // version2
  function phatrasua2(madonhang, matrangthai, mahoadon) {

    var self = $scope, j= 0, counter = 0;

      self.mode = 'query';
      self.activated = true;
      self.determinateValue = 30;
      self.determinateValue2 = 30;

      self.showList = [];

      self.toggleActivation = function() {
          if (!self.activated) self.showList = [];
          if (self.activated) {
            j = counter = 0;
            self.determinateValue = 30;
            self.determinateValue2 = 30;
          }
      };

      $interval(function() {
        self.determinateValue += 1;
        self.determinateValue2 += 1.5;

        if (self.determinateValue == 100) {
          function test() {
           return new Promise((resolve, reject) => {
            
             var data = $.param({ 
               madonhang: madonhang,
               mahoadon: mahoadon,
               matrangthai: matrangthai
             }) 
             
             var urlApi = 'http://localhost:8080/trasua/admin/updatetrangthaidonhang2'

             var config = {
               headers: {
                 'Content-Type': 'application/x-www-form-urlencoded;charset=UTF-8'
               }
             }
             
             $http.post(urlApi, data, config)
             .then(function(res) {
               resolve(res.data);
               

             }, function (res, err) {
               console.log(err)
             })

           })
          }


          test().then(function (data) {
            $scope.donhang = data
          })

        } 
        // if (self.determinateValue2 > 100) self.determinateValue2 = 30;

          // Incrementally start animation the five (5) Indeterminate,
          // themed progress circular bars

          if ((j < 2) && !self.showList[j] && self.activated) {
            self.showList[j] = true;
          }
          if (counter++ % 4 === 0) j++;

          // Show the indicator in the "Used within Containers" after 200ms delay
          if (j == 2) self.contained = "indeterminate";

      }, 100, 0, true);

      $interval(function() {
        self.mode = (self.mode == 'query' ? 'determinate' : 'query');
      }, 7200, 0, true);
  }





  $scope.xacnhan2 = function (madonhang, matrangthai, mahoadon) {
    var data = $.param({ 
      madonhang: madonhang,
      mahoadon: mahoadon,
      matrangthai: matrangthai
    }) 
    
    var urlApi = 'http://localhost:8080/trasua/admin/updatetrangthaidonhang2'

    var config = {
      headers: {
        'Content-Type': 'application/x-www-form-urlencoded;charset=UTF-8'
      }
    }
    
    $http.post(urlApi, data, config)
    .then(function(res) {
      temps = res.data

      $scope.donhang = temps;


      phatrasua2(madonhang, 3, mahoadon)

    }, function (res, err) {
      console.log(err)
    })
  }



  $scope.giaohang2 = function (madonhang, matrangthai, mahoadon) {
    var data = $.param({ 
      mahoadon: mahoadon,
      madonhang: madonhang,
      matrangthai: matrangthai
    }) 
    
    var urlApi = 'http://localhost:8080/trasua/admin/updatetrangthaidonhang2'

    var config = {
      headers: {
        'Content-Type': 'application/x-www-form-urlencoded;charset=UTF-8'
      }
    }
    
    $http.post(urlApi, data, config)
    .then(function(res) {
      $scope.donhang = res.data;

    }, function (res, err) {
      console.log(err)
    })
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

  

  $scope.displayHoadon = function (hoadon) {
    hoadon.display = !hoadon.display

  }

  mahoadon = ''
  $scope.getMahoadon = function (mahd) {
    mahoadon = mahd;
  }


  $scope.readmoreHoadon = function (soluonghoadon) {
    soluonghoadon = parseInt(soluonghoadon) + 10;
    $scope.soluonghoadon = soluonghoadon
    console.log(soluonghoadon)
   }
})






app.controller('sidebar',  function($scope, $rootScope, $http, $http, $cookies) {
   $http.get('http://localhost:8080/trasua/admin/user')
   .then(function (res) {
    console.log(res.data)
    $scope.anhdaidien = res.data.anhdaidien
    $scope.hovaten = res.data.tennv
    $scope.vaitro = res.data.role
    $scope.bophan = res.data.bophan
   }, function (err) {
    console.log(err)
   })

})



app.controller('chitietsanpham',  function($scope, $rootScope, $q, $timeout, $log, $mdConstant, $cookies, $http, $location) {
  $scope.displayForm = function (value) {
    $scope.displayCol12 = !value
    console.log($scope.displayCol12)
  }

  $scope.parseInt = function(string) {
    console.log(string)
    return parseFloat(string)
  }

  $scope.changeDonvi = function (ctloai, nguyenlieu) {
    ctloai.DONVI = nguyenlieu.DONVI

  }

  $scope.addNl = function (nguyenlieu, index) {
    nguyenlieu.splice(index+1, 0, {})
  }


  $scope.delNl = function (nguyenlieu, index) {
    nguyenlieu.splice(index, 1)
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


  $scope.confirmDelete = function () {
    //  trả về promise để khi jquery gọi thì nó sẽ đợi kết quả trả về từ angular (alert.js )
    return new Promise((resolve, reject) => {
      var data = $.param({ 
        maloaitrasua: maloaitrasua
      }) 
    
      var urlApi = 'http://localhost:8080/trasua/admin/deletesanpham'

      var config = {
        headers: {
          'Content-Type': 'application/x-www-form-urlencoded;charset=UTF-8'
        }
      }
    
      $http.post(urlApi, data, config)
      .then(function(res) {
        if (res.data == "1") {
          resolve(maloaitrasua)
        } else {
          reject(res.data)

        } 
      }, function (res, err) {
        console.log(res.data)
        reject('Có lỗi xảy ra vui lòng kiểm tra lại')
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
  
  // $scope.callJqueryFun = function () {
  //   $().JqueryFunction();
  // }

  //Khởi tạo giá trị mỗi khi f5 cho biểu đồ
  // this.myDate = new Date();
  // this.isOpen = false;

  // $scope.getDatePicker = function (datepicked) {
  //   console.log("hsdfsdf")
  //    alert(((datepicked.getMonth() > 8) ? (datepicked.getMonth() + 1) : ('0' + (datepicked.getMonth() + 1))) + '/' + ((datepicked.getDate() > 9) ? datepicked.getDate() : ('0' + datepicked.getDate())) + '/' + datepicked.getFullYear());
  //   // console.log(datepicked)
  // }


  $scope.getDatePicker_custom = function (datepicked) {
    var dem = 0;
    for (var i = 0; i < datepicked.length; i++) {
      if (datepicked.charAt(i) === "/") {
        dem++
      }
    }

    if (dem !== 2) {
      alert("Sai định dạng, vui lòng nhập định dạng dd/mm/yy")
      return;
    } else {
      var arrayString = datepicked.split("/")
      for (var i = 0; i < arrayString.length; i++) {
        arrayString[i] = parseInt(arrayString[i])
        if (!arrayString[i] && arrayString[i] !== 0) {
          alert("Sai định dạng, vui lòng nhập định dạng dd/mm/yy")
          return;
        }
      }

      switch (arrayString[1]) {
        case 0:
          if (arrayString[0]) {
            alert("Sai định dạng ngày");
            return;
          } else if (arrayString[2] < 2018) {
            alert("Năm phải lớn hơn 2018")

            return;
          }
          break;
        case 1:
          if (arrayString[0] > 31 || arrayString[0] < 0) {
            alert("Sai định dạng ngày");
            return;
          }  else if (arrayString[2] < 2018) {
            alert("Năm phải lớn hơn 2018")
            return;
          }
          break;
        case 2:
          if (arrayString[0] > 29 || arrayString[0] < 0) {
            alert("Sai định dạng ngày");
            return;
          } else if (arrayString[2] < 2018) {
            alert("Năm phải lớn hơn 2018")
            return;
          }
          break;
        case 3:
          if (arrayString[0] > 31 || arrayString[0] < 0) {
            alert("Sai định dạng ngày");
            return;
          } else if (arrayString[2] < 2018) {
            alert("Năm phải lớn hơn 2018")
            return;
          }
          break;
        case 4:
          if (arrayString[0] > 30 || arrayString[0] < 0) {
            alert("Sai định dạng ngày");
            return;
          } else if (arrayString[2] < 2018) {
            alert("Năm phải lớn hơn 2018")
            return;
          }
          break;
        case 5:
          if (arrayString[0] > 31 || arrayString[0] < 0) {
            alert("Sai định dạng ngày");
            return;
          } else if (arrayString[2] < 2018) {
            alert("Năm phải lớn hơn 2018")
            return;
          }
          break;
        case 6:
          if (arrayString[0] > 30 || arrayString[0] < 0) {
            alert("Sai định dạng ngày");
            return;
          } else if (arrayString[2] < 2018) {
            alert("Năm phải lớn hơn 2018")
            return;
          }
          break;
        case 7:
          if (arrayString[0] > 31 || arrayString[0] < 0) {
            alert("Sai định dạng ngày");
            return;
          } else if (arrayString[2] < 2018) {
            alert("Năm phải lớn hơn 2018")
            return;
          }
          break;
        case 8:
          if (arrayString[0] > 31 || arrayString[0] < 0) {
            alert("Sai định dạng ngày");
            return;
          } else if (arrayString[2] < 2018) {
            alert("Năm phải lớn hơn 2018")
            return;
          }
          break;
        case 9:
          if (arrayString[0] > 30 || arrayString[0] < 0) {
            alert("Sai định dạng ngày");
            return;
          } else if (arrayString[2] < 2018) {
            alert("Năm phải lớn hơn 2018")
            return;
          }
          break;
        case 10:
          if (arrayString[0] > 31 || arrayString[0] < 0) {
            alert("Sai định dạng ngày");
            return;
          } else if (arrayString[2] < 2018) {
            alert("Năm phải lớn hơn 2018")
            return;
          }
          break;
        case 11:
          if (arrayString[0] > 30 || arrayString[0] < 0) {
            alert("Sai định dạng ngày");
            return;
          } else if (arrayString[2] < 2018) {
            alert("Năm phải lớn hơn 2018")
            return;
          }
          break;
        case 12:
          if (arrayString[0] > 31 || arrayString[0] < 0) {
            alert("Sai định dạng ngày");
            return;
          } else if (arrayString[2] < 2018) {
            alert("Năm phải lớn hơn 2018")
            return;
          }
          break;
        default:
          alert("sai định dạng tháng")
          return;
      }

      // pass filter success
      arrayString = arrayString.join("/")

      var urlApi = 'http://localhost:8080/trasua/admin/filterthunhapByMonthYear/' + arrayString
      
      $http.get(urlApi)
      .then(function(res) {
          console.log(res.data)
         $().thuNhapChart(res.data);
         $scope.message = "Tổng doanh thu là: " 
         $scope.doanhthutheothang = Math.ceil(res.data.mota) + " VND"
      }, function (res, err) {
        console.log(err)
      })


    }
  }

  $scope.getDatePicker_custom2 = function (datepickedfrom, datepickedto) {

    function filterInput(picked) {
      // body...
      var arrayString = picked.split("/")
      for (var i = 0; i < arrayString.length; i++) {
        arrayString[i] = parseInt(arrayString[i])
        if (!arrayString[i] && arrayString[i] !== 0) {
          alert("Sai định dạng, vui lòng nhập định dạng dd/mm/yy")
          return;
        }
      }

      switch (arrayString[1]) {
        case 1:
        if (arrayString[0] > 31 || arrayString[0] <= 0) {
          alert("Sai định dạng ngày");
          return;
        }  else if (arrayString[2] < 2018) {
          alert("Năm phải lớn hơn 2018")
          return;
        }
        break;
        case 2:
        if (arrayString[0] > 29 || arrayString[0] <= 0) {
          alert("Sai định dạng ngày");
          return;
        } else if (arrayString[2] < 2018) {
          alert("Năm phải lớn hơn 2018")
          return;
        }
        break;
        case 3:
        if (arrayString[0] > 31 || arrayString[0] <= 0) {
          alert("Sai định dạng ngày");
          return;
        } else if (arrayString[2] < 2018) {
          alert("Năm phải lớn hơn 2018")
          return;
        }
        break;
        case 4:
        if (arrayString[0] > 30 || arrayString[0] <= 0) {
          alert("Sai định dạng ngày");
          return;
        } else if (arrayString[2] < 2018) {
          alert("Năm phải lớn hơn 2018")
          return;
        }
        break;
        case 5:
        if (arrayString[0] > 31 || arrayString[0] <= 0) {
          alert("Sai định dạng ngày");
          return;
        } else if (arrayString[2] < 2018) {
          alert("Năm phải lớn hơn 2018")
          return;
        }
        break;
        case 6:
        if (arrayString[0] > 30 || arrayString[0] <= 0) {
          alert("Sai định dạng ngày");
          return;
        } else if (arrayString[2] < 2018) {
          alert("Năm phải lớn hơn 2018")
          return;
        }
        break;
        case 7:
        if (arrayString[0] > 31 || arrayString[0] <= 0) {
          alert("Sai định dạng ngày");
          return;
        } else if (arrayString[2] < 2018) {
          alert("Năm phải lớn hơn 2018")
          return;
        }
        break;
        case 8:
        if (arrayString[0] > 31 || arrayString[0] <= 0) {
          alert("Sai định dạng ngày");
          return;
        } else if (arrayString[2] < 2018) {
          alert("Năm phải lớn hơn 2018")
          return;
        }
        break;
        case 9:
        if (arrayString[0] > 30 || arrayString[0] <= 0) {
          alert("Sai định dạng ngày");
          return;
        } else if (arrayString[2] < 2018) {
          alert("Năm phải lớn hơn 2018")
          return;
        }
        break;
        case 10:
        if (arrayString[0] > 31 || arrayString[0] <= 0) {
          alert("Sai định dạng ngày");
          return;
        } else if (arrayString[2] < 2018) {
          alert("Năm phải lớn hơn 2018")
          return;
        }
        break;
        case 11:
        if (arrayString[0] > 30 || arrayString[0] <= 0) {
          alert("Sai định dạng ngày");
          return;
        } else if (arrayString[2] < 2018) {
          alert("Năm phải lớn hơn 2018")
          return;
        }
        break;
        case 12:
        if (arrayString[0] > 31 || arrayString[0] <= 0) {
          alert("Sai định dạng ngày");
          return;
        } else if (arrayString[2] < 2018) {
          alert("Năm phải lớn hơn 2018")
          return;
        }
        break;
        default:
        alert("sai định dạng tháng")
        return;
      }

      return arrayString;
    }

    // lần 1
    var dem = 0;
    for (var i = 0; i < datepickedfrom.length; i++) {
      if (datepickedfrom.charAt(i) === "/") {
        dem++
      }
    }

    if (dem !== 2) {
      alert("Sai định dạng, vui lòng nhập định dạng dd/mm/yy")
      return;
    } else {

      fromDate = filterInput(datepickedfrom);

      // lần 2
      var dem = 0;
      for (var i = 0; i < datepickedto.length; i++) {
        if (datepickedto.charAt(i) === "/") {
          dem++
        }
      }

      if (dem !== 2) {
        alert("Sai định dạng, vui lòng nhập định dạng dd/mm/yy")
        return;
      } else {

        toDate = filterInput(datepickedto);

        // turn input to y-m-d format
        var dFrom = Date.parse(fromDate[2] + "-" + fromDate[1] + "-" + fromDate[0]);
        var dTo = Date.parse(toDate[2] + "-" + toDate[1] + "-" + toDate[0]);
        
        console.log(dFrom)
        console.log(dTo)

        if (dTo < dFrom) {
          alert("thời gian kết thúc phải nhỏ hơn thời gian bắt đầu")
          return
        }

        // pass filter success
        fromDate = fromDate[2] + "/" + fromDate[1] + "/" + fromDate[0]
        toDate = toDate[2] + "/" + toDate[1] + "/" + toDate[0];
        console.log(fromDate)
        console.log(toDate)

        var data = $.param({ 
          fromDate: fromDate,
          toDate: toDate
        }) 
        
        var urlApi = 'http://localhost:8080/trasua/admin/filterthunhap'

        var config = {
          headers: {
            'Content-Type': 'application/x-www-form-urlencoded;charset=UTF-8'
          }
        }


        
        $http.post(urlApi, data, config)
        .then(function(res) {
          console.log(res.data)
         $().thuNhapChart(res.data);
         $scope.message = "Tổng doanh thu là: " 
         $scope.doanhthutheothang = Math.ceil(res.data.mota) + " VND"
        }, function (res, err) {
          console.log(err)
        })


      }
    }
  }


  var urlApi = 'http://localhost:8080/trasua/admin/initthunhapchart'
  
  $http.get(urlApi)
  .then(function(res) {
     $().thuNhapChart(res.data);
     $scope.message = "Tổng doanh thu trong tháng là: " 
     $scope.doanhthutheothang = Math.ceil(res.data.mota) + " VND"
  }, function (res, err) {
    console.log(err)
  })

  
})




app.controller('biendonggia',  function($scope, $rootScope, $q, $timeout, $log, $mdConstant, $cookies, $http, $location) {
  
  $scope.getDatePicker_custom = function (datepickedfrom, datepickedto,  maloaitrasua) {

    function filterInput(picked) {
      // body...
      var arrayString = picked.split("/")
      for (var i = 0; i < arrayString.length; i++) {
        arrayString[i] = parseInt(arrayString[i])
        if (!arrayString[i] && arrayString[i] !== 0) {
          alert("Sai định dạng, vui lòng nhập định dạng dd/mm/yy")
          return;
        }
      }

      switch (arrayString[1]) {
        case 1:
        if (arrayString[0] > 31 || arrayString[0] <= 0) {
          alert("Sai định dạng ngày");
          return;
        }  else if (arrayString[2] < 2018) {
          alert("Năm phải lớn hơn 2018")
          return;
        }
        break;
        case 2:
        if (arrayString[0] > 29 || arrayString[0] <= 0) {
          alert("Sai định dạng ngày");
          return;
        } else if (arrayString[2] < 2018) {
          alert("Năm phải lớn hơn 2018")
          return;
        }
        break;
        case 3:
        if (arrayString[0] > 31 || arrayString[0] <= 0) {
          alert("Sai định dạng ngày");
          return;
        } else if (arrayString[2] < 2018) {
          alert("Năm phải lớn hơn 2018")
          return;
        }
        break;
        case 4:
        if (arrayString[0] > 30 || arrayString[0] <= 0) {
          alert("Sai định dạng ngày");
          return;
        } else if (arrayString[2] < 2018) {
          alert("Năm phải lớn hơn 2018")
          return;
        }
        break;
        case 5:
        if (arrayString[0] > 31 || arrayString[0] <= 0) {
          alert("Sai định dạng ngày");
          return;
        } else if (arrayString[2] < 2018) {
          alert("Năm phải lớn hơn 2018")
          return;
        }
        break;
        case 6:
        if (arrayString[0] > 30 || arrayString[0] <= 0) {
          alert("Sai định dạng ngày");
          return;
        } else if (arrayString[2] < 2018) {
          alert("Năm phải lớn hơn 2018")
          return;
        }
        break;
        case 7:
        if (arrayString[0] > 31 || arrayString[0] <= 0) {
          alert("Sai định dạng ngày");
          return;
        } else if (arrayString[2] < 2018) {
          alert("Năm phải lớn hơn 2018")
          return;
        }
        break;
        case 8:
        if (arrayString[0] > 31 || arrayString[0] <= 0) {
          alert("Sai định dạng ngày");
          return;
        } else if (arrayString[2] < 2018) {
          alert("Năm phải lớn hơn 2018")
          return;
        }
        break;
        case 9:
        if (arrayString[0] > 30 || arrayString[0] <= 0) {
          alert("Sai định dạng ngày");
          return;
        } else if (arrayString[2] < 2018) {
          alert("Năm phải lớn hơn 2018")
          return;
        }
        break;
        case 10:
        if (arrayString[0] > 31 || arrayString[0] <= 0) {
          alert("Sai định dạng ngày");
          return;
        } else if (arrayString[2] < 2018) {
          alert("Năm phải lớn hơn 2018")
          return;
        }
        break;
        case 11:
        if (arrayString[0] > 30 || arrayString[0] <= 0) {
          alert("Sai định dạng ngày");
          return;
        } else if (arrayString[2] < 2018) {
          alert("Năm phải lớn hơn 2018")
          return;
        }
        break;
        case 12:
        if (arrayString[0] > 31 || arrayString[0] <= 0) {
          alert("Sai định dạng ngày");
          return;
        } else if (arrayString[2] < 2018) {
          alert("Năm phải lớn hơn 2018")
          return;
        }
        break;
        default:
        alert("sai định dạng tháng")
        return;
      }

      return arrayString;
    }

    // lần 1
    var dem = 0;
    for (var i = 0; i < datepickedfrom.length; i++) {
      if (datepickedfrom.charAt(i) === "/") {
        dem++
      }
    }

    if (dem !== 2) {
      alert("Sai định dạng, vui lòng nhập định dạng dd/mm/yy")
      return;
    } else {

      fromDate = filterInput(datepickedfrom);

      // lần 2
      var dem = 0;
      for (var i = 0; i < datepickedto.length; i++) {
        if (datepickedto.charAt(i) === "/") {
          dem++
        }
      }

      if (dem !== 2) {
        alert("Sai định dạng, vui lòng nhập định dạng dd/mm/yy")
        return;
      } else {

        toDate = filterInput(datepickedto);

        // turn input to y-m-d format
        var dFrom = Date.parse(fromDate[2] + "-" + fromDate[1] + "-" + fromDate[0]);
        var dTo = Date.parse(toDate[2] + "-" + toDate[1] + "-" + toDate[0]);
        
        console.log(dFrom)
        console.log(dTo)

        if (dTo < dFrom) {
          alert("thời gian kết thúc phải nhỏ hơn thời gian bắt đầu")
          return
        }

        // pass filter success
        fromDate = fromDate[2] + "/" + fromDate[1] + "/" + fromDate[0]
        toDate = toDate[2] + "/" + toDate[1] + "/" + toDate[0];
        console.log(fromDate)
        console.log(toDate)

        var data = $.param({ 
          fromDate: fromDate,
          toDate: toDate,
          maloaitrasua: maloaitrasua
        }) 
        
        var urlApi = 'http://localhost:8080/trasua/admin/filterbiendonggia'

        var config = {
          headers: {
            'Content-Type': 'application/x-www-form-urlencoded;charset=UTF-8'
          }
        }


        
        $http.post(urlApi, data, config)
        .then(function(res) {
          console.log(res.data)
          if (typeof res.data === 'string') {
            alert(res.data)
            return;
          }

          $().biendonggiaChart(res.data);
        }, function (res, err) {
          console.log(err)
        })


      }
    }
  } 

  // var urlApi = 'http://localhost:8080/trasua/admin/inittonkhochart'
  
  // $http.get(urlApi)
  // .then(function(res) {
  //    $().biendonggiaChart(res.data);
  // }, function (res, err) {
  //   console.log(err)
  // })

  
})


app.controller('tonkho',  function($scope, $rootScope, $q, $timeout, $log, $mdConstant, $cookies, $http, $location) {
  
  $scope.getDatePicker_custom = function (datepicked) {
    var dem = 0;
    for (var i = 0; i < datepicked.length; i++) {
      if (datepicked.charAt(i) === "/") {
        dem++
      }
    }

    if (dem !== 2) {
      alert("Sai định dạng, vui lòng nhập định dạng dd/mm/yy")
      return;
    } else {
      var arrayString = datepicked.split("/")
      for (var i = 0; i < arrayString.length; i++) {
        arrayString[i] = parseInt(arrayString[i])
        if (!arrayString[i] && arrayString[i] !== 0) {
          alert("Sai định dạng, vui lòng nhập định dạng dd/mm/yy")
          return;
        }
      }

      switch (arrayString[1]) {
        case 0:
          if (arrayString[0]) {
            alert("Sai định dạng ngày");
            return;
          } else if (arrayString[2] < 2018) {
            alert("Năm phải lớn hơn 2018")
            return;
          }
          break;
        case 1:
          if (arrayString[0] > 31 || arrayString[0] < 0) {
            alert("Sai định dạng ngày");
            return;
          }  else if (arrayString[2] < 2018) {
            alert("Năm phải lớn hơn 2018")
            return;
          }
          break;
        case 2:
          if (arrayString[0] > 29 || arrayString[0] < 0) {
            alert("Sai định dạng ngày");
            return;
          } else if (arrayString[2] < 2018) {
            alert("Năm phải lớn hơn 2018")
            return;
          }
          break;
        case 3:
          if (arrayString[0] > 31 || arrayString[0] < 0) {
            alert("Sai định dạng ngày");
            return;
          } else if (arrayString[2] < 2018) {
            alert("Năm phải lớn hơn 2018")
            return;
          }
          break;
        case 4:
          if (arrayString[0] > 30 || arrayString[0] < 0) {
            alert("Sai định dạng ngày");
            return;
          } else if (arrayString[2] < 2018) {
            alert("Năm phải lớn hơn 2018")
            return;
          }
          break;
        case 5:
          if (arrayString[0] > 31 || arrayString[0] < 0) {
            alert("Sai định dạng ngày");
            return;
          } else if (arrayString[2] < 2018) {
            alert("Năm phải lớn hơn 2018")
            return;
          }
          break;
        case 6:
          if (arrayString[0] > 30 || arrayString[0] < 0) {
            alert("Sai định dạng ngày");
            return;
          } else if (arrayString[2] < 2018) {
            alert("Năm phải lớn hơn 2018")
            return;
          }
          break;
        case 7:
          if (arrayString[0] > 31 || arrayString[0] < 0) {
            alert("Sai định dạng ngày");
            return;
          } else if (arrayString[2] < 2018) {
            alert("Năm phải lớn hơn 2018")
            return;
          }
          break;
        case 8:
          if (arrayString[0] > 31 || arrayString[0] < 0) {
            alert("Sai định dạng ngày");
            return;
          } else if (arrayString[2] < 2018) {
            alert("Năm phải lớn hơn 2018")
            return;
          }
          break;
        case 9:
          if (arrayString[0] > 30 || arrayString[0] < 0) {
            alert("Sai định dạng ngày");
            return;
          } else if (arrayString[2] < 2018) {
            alert("Năm phải lớn hơn 2018")
            return;
          }
          break;
        case 10:
          if (arrayString[0] > 31 || arrayString[0] < 0) {
            alert("Sai định dạng ngày");
            return;
          } else if (arrayString[2] < 2018) {
            alert("Năm phải lớn hơn 2018")
            return;
          }
          break;
        case 11:
          if (arrayString[0] > 30 || arrayString[0] < 0) {
            alert("Sai định dạng ngày");
            return;
          } else if (arrayString[2] < 2018) {
            alert("Năm phải lớn hơn 2018")
            return;
          }
          break;
        case 12:
          if (arrayString[0] > 31 || arrayString[0] < 0) {
            alert("Sai định dạng ngày");
            return;
          } else if (arrayString[2] < 2018) {
            alert("Năm phải lớn hơn 2018")
            return;
          }
          break;
        default:
          alert("sai định dạng tháng")
          return;
      }

      // pass filter success
      arrayString = arrayString.join("/")

      var urlApi = 'http://localhost:8080/trasua/admin/filterTonkhoByMonthYear/' + arrayString
      
      $http.get(urlApi)
      .then(function(res) {
          console.log(res.data)
         $().tonKhoChart(res.data);
      }, function (res, err) {
        console.log(err)
      })


    }
  }

  $scope.getDatePicker_custom2 = function (datepickedfrom, datepickedto) {

    function filterInput(picked) {
      // body...
      var arrayString = picked.split("/")
      for (var i = 0; i < arrayString.length; i++) {
        arrayString[i] = parseInt(arrayString[i])
        if (!arrayString[i] && arrayString[i] !== 0) {
          alert("Sai định dạng, vui lòng nhập định dạng dd/mm/yy")
          return;
        }
      }

      switch (arrayString[1]) {
        case 1:
        if (arrayString[0] > 31 || arrayString[0] <= 0) {
          alert("Sai định dạng ngày");
          return;
        }  else if (arrayString[2] < 2018) {
          alert("Năm phải lớn hơn 2018")
          return;
        }
        break;
        case 2:
        if (arrayString[0] > 29 || arrayString[0] <= 0) {
          alert("Sai định dạng ngày");
          return;
        } else if (arrayString[2] < 2018) {
          alert("Năm phải lớn hơn 2018")
          return;
        }
        break;
        case 3:
        if (arrayString[0] > 31 || arrayString[0] <= 0) {
          alert("Sai định dạng ngày");
          return;
        } else if (arrayString[2] < 2018) {
          alert("Năm phải lớn hơn 2018")
          return;
        }
        break;
        case 4:
        if (arrayString[0] > 30 || arrayString[0] <= 0) {
          alert("Sai định dạng ngày");
          return;
        } else if (arrayString[2] < 2018) {
          alert("Năm phải lớn hơn 2018")
          return;
        }
        break;
        case 5:
        if (arrayString[0] > 31 || arrayString[0] <= 0) {
          alert("Sai định dạng ngày");
          return;
        } else if (arrayString[2] < 2018) {
          alert("Năm phải lớn hơn 2018")
          return;
        }
        break;
        case 6:
        if (arrayString[0] > 30 || arrayString[0] <= 0) {
          alert("Sai định dạng ngày");
          return;
        } else if (arrayString[2] < 2018) {
          alert("Năm phải lớn hơn 2018")
          return;
        }
        break;
        case 7:
        if (arrayString[0] > 31 || arrayString[0] <= 0) {
          alert("Sai định dạng ngày");
          return;
        } else if (arrayString[2] < 2018) {
          alert("Năm phải lớn hơn 2018")
          return;
        }
        break;
        case 8:
        if (arrayString[0] > 31 || arrayString[0] <= 0) {
          alert("Sai định dạng ngày");
          return;
        } else if (arrayString[2] < 2018) {
          alert("Năm phải lớn hơn 2018")
          return;
        }
        break;
        case 9:
        if (arrayString[0] > 30 || arrayString[0] <= 0) {
          alert("Sai định dạng ngày");
          return;
        } else if (arrayString[2] < 2018) {
          alert("Năm phải lớn hơn 2018")
          return;
        }
        break;
        case 10:
        if (arrayString[0] > 31 || arrayString[0] <= 0) {
          alert("Sai định dạng ngày");
          return;
        } else if (arrayString[2] < 2018) {
          alert("Năm phải lớn hơn 2018")
          return;
        }
        break;
        case 11:
        if (arrayString[0] > 30 || arrayString[0] <= 0) {
          alert("Sai định dạng ngày");
          return;
        } else if (arrayString[2] < 2018) {
          alert("Năm phải lớn hơn 2018")
          return;
        }
        break;
        case 12:
        if (arrayString[0] > 31 || arrayString[0] <= 0) {
          alert("Sai định dạng ngày");
          return;
        } else if (arrayString[2] < 2018) {
          alert("Năm phải lớn hơn 2018")
          return;
        }
        break;
        default:
        alert("sai định dạng tháng")
        return;
      }

      return arrayString;
    }

    // lần 1
    var dem = 0;
    for (var i = 0; i < datepickedfrom.length; i++) {
      if (datepickedfrom.charAt(i) === "/") {
        dem++
      }
    }

    if (dem !== 2) {
      alert("Sai định dạng, vui lòng nhập định dạng dd/mm/yy")
      return;
    } else {

      fromDate = filterInput(datepickedfrom);

      // lần 2
      var dem = 0;
      for (var i = 0; i < datepickedto.length; i++) {
        if (datepickedto.charAt(i) === "/") {
          dem++
        }
      }

      if (dem !== 2) {
        alert("Sai định dạng, vui lòng nhập định dạng dd/mm/yy")
        return;
      } else {

        toDate = filterInput(datepickedto);

        // turn input to y-m-d format
        var dFrom = Date.parse(fromDate[2] + "-" + fromDate[1] + "-" + fromDate[0]);
        var dTo = Date.parse(toDate[2] + "-" + toDate[1] + "-" + toDate[0]);
        
        console.log(dFrom)
        console.log(dTo)

        if (dTo < dFrom) {
          alert("thời gian kết thúc phải nhỏ hơn thời gian bắt đầu")
          return
        }

        // pass filter success
        fromDate = fromDate[2] + "/" + fromDate[1] + "/" + fromDate[0]
        toDate = toDate[2] + "/" + toDate[1] + "/" + toDate[0];
        console.log(fromDate)
        console.log(toDate)

        var data = $.param({ 
          fromDate: fromDate,
          toDate: toDate
        }) 
        
        var urlApi = 'http://localhost:8080/trasua/admin/filtertonkho'

        var config = {
          headers: {
            'Content-Type': 'application/x-www-form-urlencoded;charset=UTF-8'
          }
        }


        
        $http.post(urlApi, data, config)
        .then(function(res) {
          console.log(res.data)
          $().tonKhoChart(res.data);
        }, function (res, err) {
          console.log(err)
        })


      }
    }
  }
  

  var urlApi = 'http://localhost:8080/trasua/admin/inittonkhochart'
  
  $http.get(urlApi)
  .then(function(res) {
     $().tonKhoChart(res.data);
  }, function (res, err) {
    console.log(err)
  })


  
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

  $scope.displaysize = function (size, khoiluong) {
    size.KHOILUONGRIENGMOI = khoiluong
    size.hienthi = !size.hienthi
    size.DONE = false

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


  $scope.displayDone = function (size) {
    size.DONE = true
  }

  nl = ''
  $scope.getNguyenlieu = function (acc) {
    nl = acc;
  }

  size = ''
  $scope.getSize = function (sizes) {
    size = sizes;
  }

  $scope.confirmDone = function () {
    //  trả về promise để khi jquery gọi thì nó sẽ đợi kết quả trả về từ angular (alert.js )
    return new Promise((resolve, reject) => {
      if (nl.TENNLMOI == null) {
        reject("Vui lòng nhập tên nguyên liệu")
        return
      } 
      if (nl.DONGIAMOI == null) {
        reject("Đơn giá nhập trong khoảng 5000 và 50000")
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

  $scope.confirmDoneSize = function () {
    //  trả về promise để khi jquery gọi thì nó sẽ đợi kết quả trả về từ angular (alert.js )
    return new Promise((resolve, reject) => {
     
      if (size.KHOILUONGRIENGMOI == null) {
        reject("Khối lượng riêng trong khoảng 0.5 và 2")
        return
      } 

      if (size.KHOILUONGRIENGMOI < 0.5 || size.KHOILUONGRIENGMOI > 2) {
        reject("Khối lượng riêng trong khoảng 0.5 và 2")
        return
      } 

      if (size.KHOILUONGRIENG == size.KHOILUONGRIENGMOI.toString()) {
        reject("Không có thay đổi nào")
        return
      }


      var data = $.param({ 
        masize: size.MASIZE,
        khoiluongmoi: size.KHOILUONGRIENGMOI
      }) 
    
      var urlApi = 'http://localhost:8080/trasua/admin/chitietsize'

      var config = {
        headers: {
          'Content-Type': 'application/x-www-form-urlencoded;charset=UTF-8'
        }
      }
    
      $http.post(urlApi, data, config)
      .then(function(res) {
        console.log(res.data)
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



app.controller('nguoidung',  function($scope, $rootScope, $q, $timeout, $log, $mdConstant, $cookies, $http, $location) {
  
    $scope.dispayEditPass = function (nv) {
      nv.displayPass = !nv.displayPass
    }
    

    nv = ''
    $scope.getNhanvien = function (nhanvien) {
      nv = nhanvien;
    }

    $scope.confirmChangePass = function () {
    //  trả về promise để khi jquery gọi thì nó sẽ đợi kết quả trả về từ angular (alert.js )
    return new Promise((resolve, reject) => {
      if (nv.MATKHAUMOI !== nv.CONFIRMMATKHAUMOI) {
        reject("Nhập lại mật khẩu không chính xác")
        return
      } 

      var data = $.param({ 
        manv: nv.MANV,
        mataikhoan: nv.MATAIKHOAN,
        matkhaucu: nv.MATKHAUCU,
        matkhaumoi: nv.MATKHAUMOI
      }) 
    
      var urlApi = 'http://localhost:8080/trasua/admin/changePassword'

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


  $scope.setNhanvien = function (nhanvien) {
    console.log(nhanvien)
    $scope.single = nhanvien
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


  $scope.confirmDeleteTaikhoan = function () {
    //  trả về promise để khi jquery gọi thì nó sẽ đợi kết quả trả về từ angular (alert.js )
    return new Promise((resolve, reject) => {
    
      var urlApi = 'http://localhost:8080/trasua/admin/deleteTaikhoan/' + mataikhoan
    
      $http.get(urlApi)
      .then(function(res) {
        if (res.data == "1") {
          resolve(res.data)
        } else {
          reject(res.data);
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


// frequency = [0.0817, 0.0150, 0.0278, 0.0425, 0.1270, 0.0223, 0.0202, 0.0609, 0.0697, 0.0015, 0.0077, 0.0403, 0.0241, 0.0675, 0.0751, 0.0193, 0.0010, 0.0599, 0.0633, 0.0906, 0.0276, 0.0098, 0.0236, 0.0015, 0.0197, 0.0007]

// letterFrequency = {
//  A: 0.0817,
//  B: 0.0150,
//  C: 0.0278,
//  D: 0.0425,
//  E: 0.1270,
//  F: 0.0223,
//  G: 0.0202,
//  H: 0.0609,
//  I: 0.0697,
//  J: 0.0015,
//  K: 0.0077,
//  L: 0.0403,
//  M: 0.0241,
//  N: 0.0675,
//  O: 0.0751,
//  P: 0.0193,
//  Q: 0.0010,
//  R: 0.0599,
//  S: 0.0633,
//  T: 0.0906,
//  U: 0.0276,
//  V: 0.0098,
//  W: 0.0236,
//  X: 0.0015,
//  Y: 0.0197,
//  Z: 0.0007

// }


