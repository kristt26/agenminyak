angular.module('services', [])
    .factory('UserServices', UserServices)
    .factory('PetugasServices', PetugasServices)
    .factory('PembelianServices', PembelianServices)
    .factory('PelangganServices', PelangganServices)
    .factory('LaporanServices', LaporanServices)
    .factory('HomeServices', HomeServices)
    .factory('TransaksiServices', TransaksiServices)
    .factory('PesanServices', PesanServices)
    ;

function UserServices($http, $q, helperServices) {
    var controller = helperServices.url + 'users';
    var service = {};
    service.data = [];
    service.instance = false;
    return {
        get: get, post: post, put: put
    };

    function get() {
        var def = $q.defer();
        if (service.instance) {
            def.resolve(service.data);
        } else {
            $http({
                method: 'get',
                url: controller,
                headers: AuthService.getHeader()
            }).then(
                (res) => {
                    service.instance = true;
                    service.data = res.data;
                    def.resolve(res.data);
                },
                (err) => {
                    def.reject(err);
                    message.error(err);
                }
            );
        }
        return def.promise;
    }
    function post(param) {
        var def = $q.defer();
        $http({
            method: 'post',
            url: helperServices.url + 'administrator/createuser/' + param.roles,
            data: param,
            headers: AuthService.getHeader()
        }).then(
            (res) => {
                service.data.push(res.data);
                def.resolve(res.data);
            },
            (err) => {
                def.reject(err);
                message.error(err);
            }
        );
        return def.promise;
    }
    function put(param) {
        var def = $q.defer();
        $http({
            method: 'put',
            url: helperServices.url + 'administrator/updateuser/' + param.id,
            data: param,
            headers: AuthService.getHeader()
        }).then(
            (res) => {
                var data = service.data.find(x => x.id == param.id);
                if (data) {
                    data.firstName = param.firstName;
                    data.lastName = param.lastName;
                    data.userName = param.userName;
                    data.email = param.email;
                }
                def.resolve(res.data);
            },
            (err) => {
                def.reject(err);
                message.error(err);
            }
        );
        return def.promise;
    }

}
function PetugasServices($http, $q, helperServices, AuthService) {
    var controller = helperServices.url + '/karyawan/';
    var service = {};
    service.data = [];
    service.instance = false;
    return {
        get: get, post: post, put: put, hapus: hapus
    };

    function get() {
        var def = $q.defer();
        if (service.instance) {
            def.resolve(service.data);
        } else {
            $http({
                method: 'get',
                url: controller + 'get',
                headers: AuthService.getHeader()
            }).then(
                (res) => {
                    service.instance = true;
                    service.data = res.data;
                    def.resolve(res.data);
                },
                (err) => {
                    console.log(err.data);
                    def.reject(err);

                }
            );
        }
        return def.promise;
    }
    function post(param) {
        var def = $q.defer();
        $http({
            method: 'post',
            url: controller + 'add',
            data: param,
            headers: AuthService.getHeader()
        }).then(
            (res) => {
                service.data.push(res.data);
                def.resolve(res.data);
            },
            (err) => {
                def.reject(err);
                message.error(err);
            }
        );
        return def.promise;
    }

    function put(param) {
        var def = $q.defer();
        $http({
            method: 'put',
            url: controller + 'update',
            data: param,
            headers: AuthService.getHeader()
        }).then(
            (res) => {
                var data = service.data.find(x => x.id == param.id);
                if (data) {
                    data.nik = param.nik;
                    data.nama = param.nama;
                    data.jabatan = param.jabatan;
                    data.status = param.status;
                }
                def.resolve(res.data);
            },
            (err) => {
                def.reject(err);
                message.error(err);
            }
        );
        return def.promise;
    }

    function hapus(param) {
        var def = $q.defer();
        $http({
            method: 'delete',
            url: helperServices.url + 'delete/' + param.id,
            data: param,
            headers: AuthService.getHeader()
        }).then(
            (res) => {
                var index = service.data.indexOf(param)
                service.data.splice(index, 1);
                def.resolve(res.data);
            },
            (err) => {
                def.reject(err);
            }
        );
        return def.promise;
    }

}
function PembelianServices($http, $q, helperServices, AuthService) {
    var controller = helperServices.url + '/pembelian/';
    var service = {};
    service.data = [];
    service.instance = false;
    return {
        get: get, post: post, put: put, hapus: hapus, getLaporan:getLaporan
    };

    function get() {
        var def = $q.defer();
        if (service.instance) {
            def.resolve(service.data);
        } else {
            $http({
                method: 'get',
                url: controller + 'get',
                headers: AuthService.getHeader()
            }).then(
                (res) => {
                    service.instance = true;
                    service.data = res.data;
                    def.resolve(res.data);
                },
                (err) => {
                    console.log(err.data);
                    def.reject(err);

                }
            );
        }
        return def.promise;
    }

    function getLaporan(param) {
        var def = $q.defer();
        $http({
            method: 'post',
            url: controller + 'getlaporan',
            data: param,
            headers: AuthService.getHeader()
        }).then(
            (res) => {
                service.instance = true;
                service.data = res.data;
                def.resolve(res.data);
            },
            (err) => {
                console.log(err.data);
                def.reject(err);

            }
        );
        return def.promise;
    }
    
    function post(param) {
        var def = $q.defer();
        $http({
            method: 'post',
            url: controller + 'add',
            data: param,
            headers: AuthService.getHeader()
        }).then(
            (res) => {
                service.data.push(res.data);
                def.resolve(res.data);
            },
            (err) => {
                def.reject(err);
                message.error(err);
            }
        );
        return def.promise;
    }

    function put(param) {
        var def = $q.defer();
        $http({
            method: 'put',
            url: controller + 'update',
            data: param,
            headers: AuthService.getHeader()
        }).then(
            (res) => {
                var data = service.data.find(x => x.id == param.id);
                if (data) {
                    data.tanggal = param.tanggal;
                    data.stok = param.stok;
                    data.hargabeli = param.hargabeli;
                    data.hargajual = param.hargajual;
                }
                def.resolve(res.data);
            },
            (err) => {
                def.reject(err);
                message.error(err);
            }
        );
        return def.promise;
    }

    function hapus(param) {
        var def = $q.defer();
        $http({
            method: 'delete',
            url: helperServices.url + 'delete/' + param.id,
            data: param,
            headers: AuthService.getHeader()
        }).then(
            (res) => {
                var index = service.data.indexOf(param)
                service.data.splice(index, 1);
                def.resolve(res.data);
            },
            (err) => {
                def.reject(err);
            }
        );
        return def.promise;
    }

}
function PelangganServices($http, $q, helperServices, AuthService) {
    var controller = helperServices.url + '/pelanggan/';
    var service = {};
    service.data = [];
    service.instance = false;
    return {
        get: get, post: post, put: put, getDetail: getDetail
    };

    function get() {
        var def = $q.defer();
        if (service.instance) {
            def.resolve(service.data);
        } else {
            $http({
                method: 'get',
                url: controller + 'get',
                headers: AuthService.getHeader()
            }).then(
                (res) => {
                    service.instance = true;
                    service.data = res.data;
                    def.resolve(res.data);
                },
                (err) => {
                    console.log(err.data);
                    def.reject(err);

                }
            );
        }
        return def.promise;
    }
    function getDetail(id) {
        var def = $q.defer();
        $http({
            method: 'get',
            url: controller + 'get/' + id,
            headers: AuthService.getHeader()
        }).then(
            (res) => {
                def.resolve(res.data);
            },
            (err) => {
                console.log(err.data);
                def.reject(err);

            }
        );
        return def.promise;
    }
    function post(param) {
        var def = $q.defer();
        $http({
            method: 'post',
            url: controller + 'add',
            data: param,
            headers: AuthService.getHeader()
        }).then(
            (res) => {
                service.data.push(res.data);
                def.resolve(res.data);
            },
            (err) => {
                def.reject(err);
                message.error(err);
            }
        );
        return def.promise;
    }

    function put(param) {
        var def = $q.defer();
        $http({
            method: 'put',
            url: controller + 'update',
            data: param,
            headers: AuthService.getHeader()
        }).then(
            (res) => {
                var data = service.data.find(x => x.id == param.id);
                if (data) {
                    data.kodepelanggan = param.kodepelanggan;
                    data.nama = param.nama;
                    data.kontak = param.kontak;
                    data.alamat = param.alamat;
                    data.email = param.email;
                }
                def.resolve(res.data);
            },
            (err) => {
                def.reject(err);
                Swal.fire({
                    icon: 'error',
                    title: 'Error',
                    text: err.data
                })
            }
        );
        return def.promise;
    }

}
function LaporanServices($http, $q, helperServices, AuthService) {
    var controller = helperServices.url + '/laporan/';
    var service = {};
    service.data = [];
    service.instance = false;
    return {
        get: get
    };

    function get(item) {
        var def = $q.defer();
        $http({
            method: 'post',
            url: controller + 'get',
            data: item,
            headers: AuthService.getHeader()
        }).then(
            (res) => {
                def.resolve(res.data);
            },
            (err) => {
                console.log(err.data);
                def.reject(err.data);
            }
        );
        return def.promise;
    }

}
function HomeServices($http, $q, helperServices, AuthService) {
    var controller = helperServices.url + '/home/';
    var service = {};
    service.data = [];
    service.instance = false;
    return {
        get: get
    };

    function get(item) {
        var def = $q.defer();
        $http({
            method: 'get',
            url: controller + 'get',
            headers: AuthService.getHeader()
        }).then(
            (res) => {
                def.resolve(res.data);
            },
            (err) => {
                console.log(err.data);
                def.reject(err.data);
                $.LoadingOverlay("hide");
            }
        );
        return def.promise;
    }

}
function TransaksiServices($http, $q, helperServices, AuthService) {
    var controller = helperServices.url + '/transaksi/';
    var service = {};
    service.data = [];
    service.instance = false;
    return {
        get: get, post: post, put: put, hapus: hapus, getLaporan:getLaporan
    };

    function get() {
        var def = $q.defer();
        if (service.instance) {
            def.resolve(service.data);
        } else {
            $http({
                method: 'get',
                url: controller + 'get',
                headers: AuthService.getHeader()
            }).then(
                (res) => {
                    service.instance = true;
                    res.data.pembelian.totaltransaksi = res.data.pembelian.totaltransaksi==null ? 0 : parseFloat(res.data.pembelian.totaltransaksi);
                    res.data.pembelian.stok = parseFloat(res.data.pembelian.stok);
                    service.data = res.data;
                    def.resolve(res.data);
                },
                (err) => {
                    console.log(err.data);
                    def.reject(err);

                }
            );
        }
        return def.promise;
    }

    function getLaporan(param) {
        var def = $q.defer();
        $http({
            method: 'post',
            url: controller + 'getlaporan',
            data: param,
            headers: AuthService.getHeader()
        }).then(
            (res) => {
                service.data = res.data;
                def.resolve(res.data);
            },
            (err) => {
                console.log(err.data);
                def.reject(err);

            }
        );
        return def.promise;
    }
    
    function post(param) {
        var def = $q.defer();
        $http({
            method: 'post',
            url: controller + 'add',
            data: param,
            headers: AuthService.getHeader()
        }).then(
            (res) => {
                service.data.pembelian.totaltransaksi += parseFloat(param.jumlah);
                service.data.transaksi.push(res.data);
                def.resolve(res.data);
            },
            (err) => {
                def.reject(err);
                message.error(err);
            }
        );
        return def.promise;
    }

    function put(param) {
        var def = $q.defer();
        $http({
            method: 'put',
            url: controller + 'update',
            data: param,
            headers: AuthService.getHeader()
        }).then(
            (res) => {
                var data = service.data.transaksi.find(x => x.id == param.id);
                if (data) {
                    service.data.pembelian.totaltransaksi += parseFloat(param.jumlah)-parseFloat(data.jumlah);
                    data.jumlah = param.jumlah;
                }
                def.resolve(res.data);
            },
            (err) => {
                def.reject(err);
                message.error(err);
            }
        );
        return def.promise;
    }

    function hapus(param) {
        var def = $q.defer();
        $http({
            method: 'delete',
            url: helperServices.url + 'delete/' + param.id,
            data: param,
            headers: AuthService.getHeader()
        }).then(
            (res) => {
                var index = service.data.indexOf(param)
                service.data.splice(index, 1);
                def.resolve(res.data);
            },
            (err) => {
                def.reject(err);
            }
        );
        return def.promise;
    }

}
function PesanServices($http, $q, helperServices, AuthService) {
    var controller = helperServices.url + '/pesan/';
    var service = {};
    service.data = [];
    service.instance = false;
    return {
        get: get
    };

    function get() {
        var def = $q.defer();
        if (service.instance) {
            def.resolve(service.data);
        } else {
            $http({
                method: 'get',
                url: controller + 'get',
                headers: AuthService.getHeader()
            }).then(
                (res) => {
                    service.instance = true;
                    service.data = res.data;
                    def.resolve(res.data);
                },
                (err) => {
                    console.log(err.data);
                    def.reject(err);

                }
            );
        }
        return def.promise;
    }
}

