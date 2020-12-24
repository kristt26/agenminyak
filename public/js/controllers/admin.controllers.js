angular.module('adminctrl', [])
    .controller('homeController', homeController)
    .controller('loginController', loginController)
    .controller('pelangganController', pelangganController)
    .controller('laporanController', laporanController)
    .controller('pembelianController', pembelianController)
    .controller('transaksiController', transaksiController)
    .controller('laporanPembelianController', laporanPembelianController)
    .controller('laporanPenjualanController', laporanPenjualanController)
    .controller('pesanController', pesanController)
    ;
function homeController($scope, HomeServices) {
    $scope.itemHeader = { title: "Home", breadcrumb: "Home", header: "Home" };
    $scope.$emit("SendUp", $scope.itemHeader);
    $scope.datas = [];
    $scope.datass = [];
    $scope.model = {};
    $scope.simpan = true;
    $scope.hasilAkhir = {};
    $scope.hasilAkhir.hasil = 0;
    $scope.periode = {};
    $scope.setValue;
    $.LoadingOverlay("hide");
    
}
function loginController($scope, AuthService, helperServices) {
    $scope.model = {};

    AuthService.login($scope.modal).then(x => {
        $.LoadingOverlay("hide");
        location.href = helperServices.url + "/home";
    })

}
function pelangganController($scope, helperServices, PelangganServices) {
    $scope.itemHeader = { title: "Pelanggan", breadcrumb: "Pelanggan", header: "Pelanggan" };
    $scope.$emit("SendUp", $scope.itemHeader);
    $scope.datas = [];
    $scope.status = helperServices.status
    $scope.model = {};
    $scope.simpan = true;
    PelangganServices.get().then(x => {
        $scope.datas = x;
        $.LoadingOverlay("hide");
    })
    $scope.edit = (item) => {
        $scope.model = angular.copy(item);
        $scope.simpan = false;
    }
    $scope.save = () => {
        $.LoadingOverlay("show");
        if ($scope.model.id) {
            PelangganServices.put($scope.model).then(result => {
                Swal.fire({
                    icon: 'success',
                    title: 'Success',
                    text: 'Proses Berhasil'
                })
                $scope.model = {};
                $.LoadingOverlay("hide");
            })
        } else {
            PelangganServices.post($scope.model).then(result => {
                Swal.fire({
                    icon: 'success',
                    title: 'Success',
                    text: 'Proses Berhasil'
                })
                $scope.model = {};
                $.LoadingOverlay("hide");
            })
        }
    }
}
function laporanController($scope, helperServices, LaporanServices) {
    $scope.itemHeader = { title: "Laporan", breadcrumb: "Laporan", header: "Laporan" };
    $scope.$emit("SendUp", $scope.itemHeader);
    $scope.model = {};
    $scope.datas = [];
    $scope.periodes = [];
    $scope.hasilAkhir = {};
    $scope.hasilAkhir.hasil = 0;
    $scope.periode = {};
    $scope.setValue;
    $scope.laporan = false;
    PeriodeServices.get().then(itemperiode => {
        $scope.periodes = itemperiode
        $.LoadingOverlay("hide");
    })

    $scope.tampil = (item) => {
        $.LoadingOverlay("show");
        var a = item.split(' - ');
        if(a[0]!==a[1]){
            $scope.model.awal = a[0];
            $scope.model.akhir = a[1];
            LaporanServices.get($scope.model).then(x=>{
                $scope.datas = x;
                $.LoadingOverlay("hide");
            })
        }
        $.LoadingOverlay("hide");
    }

    $scope.print = () => {
        $("#print").printArea();
    }
}
function pembelianController($scope, helperServices, PembelianServices) {
    $scope.itemHeader = { title: "Pembelian", breadcrumb: "Pembelian", header: "Pembelian" };
    $scope.sexs = helperServices.sex;
    $scope.$emit("SendUp", $scope.itemHeader);
    $scope.datas = [];
    $scope.model = {};
    $scope.simpan = true;
    $scope.totalStokSisa = 0;
    PembelianServices.get().then(x => {
        $scope.datas = x;
        $scope.setStok($scope.datas);
        $.LoadingOverlay("hide");
    })
    $scope.setStok = (item)=>{
        $scope.totalStokSisa = 0;
        item.forEach(element => {
            if(element.totaltransaksi){
                $scope.totalStokSisa += parseFloat(element.stok) - parseFloat(element.totaltransaksi);
            }else{
                $scope.totalStokSisa += parseFloat(element.stok);
            }
        });
        // return $scope.totalStokSisa;
    }
    $scope.edit = (item) => {
        $scope.model = angular.copy(item);
        $scope.model.tanggal = new Date($scope.model.tanggal);
        $scope.simpan = false;
    }
    $scope.clear = () => {
        $scope.simpan = true;
        $scope.model = {};
    }
    $scope.save = (item) => {
        $.LoadingOverlay("show");
        var dataItem = angular.copy(item)
        $scope.stringDate(dataItem)
        if (dataItem.id) {
            PembelianServices.put(dataItem).then(result => {
                Swal.fire({
                    icon: 'success',
                    title: 'Success',
                    text: 'Proses Berhasil'
                })
                $scope.model = {};
                $scope.simpan = true;
                $scope.setStok($scope.datas);
                $.LoadingOverlay("hide");
            })
        } else {
            PembelianServices.post(dataItem).then(result => {
                Swal.fire({
                    icon: 'success',
                    title: 'Success',
                    text: 'Proses Berhasil'
                })
                $scope.model = {};
                $scope.setStok($scope.datas);
                $.LoadingOverlay("hide");
            })
        }
    }
    $scope.stringDate = (item)=>{
        item.tanggal = item.tanggal.getFullYear() + "-" + (item.tanggal.getMonth() + 1) + "-" + (item.tanggal.getDate().length==1 ? "0"+item.tanggal.getDate(): item.tanggal.getDate());
    }
}
function transaksiController($scope, helperServices, TransaksiServices) {
    $scope.itemHeader = { title: "Transaksi Penjualan", breadcrumb: "Transaksi Penjualan", header: "Transaksi Penjualan" };
    $scope.$emit("SendUp", $scope.itemHeader);
    $scope.datas = [];
    $scope.status = helperServices.status
    $scope.model = {};
    $scope.model.totalharga = 0;
    $scope.model.kembalian = 0;
    $scope.simpan = true;
    TransaksiServices.get().then(x => {
        $scope.datas = x;
        $scope.setDate();
        $.LoadingOverlay("hide");
    })
    $scope.setDate = ()=>{
        var a = new Date();
        $scope.model.tanggal = a.getFullYear() + "-" + (a.getMonth() + 1) + "-" + (a.getDate().length==1 ? "0"+a.getDate(): a.getDate());
    }
    $scope.hitung = ()=>{
        if(($scope.datas.pembelian.stok - $scope.datas.pembelian.totaltransaksi) - $scope.model.jumlah < 0){
            $scope.model.jumlah = $scope.datas.pembelian.stok - $scope.datas.pembelian.totaltransaksi;
            Swal.fire({
                icon: 'info',
                title: 'Information',
                text: 'Jumlah liter yang anda masukkan melebihi Stok minyak yang tersedia'
            })
            $scope.hitung();
        }else{
            $scope.model.totalharga = $scope.model.jumlah ? parseFloat($scope.model.jumlah) * parseFloat($scope.datas.pembelian.hargajual) : 0;
            $scope.model.kembalian = $scope.model.totalharga !==0 && ($scope.model.totalbayar) ? parseFloat($scope.model.totalbayar) - parseFloat($scope.model.totalharga) : 0;
        }
        
    }
    $scope.edit = (item) => {
        $scope.model = angular.copy(item);
        $scope.model.pelanggan = $scope.datas.pelanggan.find(x=>x.id==item.pelangganid);
        $scope.model.jumlah = parseFloat(item.jumlah);
        $scope.hitung();
        $scope.simpan = false;
    }
    $scope.save = () => {
        $.LoadingOverlay("show");
        $scope.model.stokid = $scope.datas.pembelian.id
        if ($scope.model.id) {
            TransaksiServices.put($scope.model).then(result => {
                Swal.fire({
                    icon: 'success',
                    title: 'Success',
                    text: 'Proses Berhasil'
                })
                $scope.model = {};
                $scope.simpan = true;
                $scope.setDate();
                $.LoadingOverlay("hide");
            })
        } else {
            TransaksiServices.post($scope.model).then(result => {
                Swal.fire({
                    icon: 'success',
                    title: 'Success',
                    text: 'Proses Berhasil'
                })
                $scope.model = {};
                $scope.setDate();
                $.LoadingOverlay("hide");
            })
        }
    }
    $scope.clear = ()=>{
        $scope.model={}
        $scope.setDate();
        $scope.simpan = true;
    }
}
function laporanPembelianController($scope, helperServices, PembelianServices) {
    $scope.itemHeader = { title: "Laporan Pembelian", breadcrumb: "Laporan Pembelian", header: "Laporan Pembelian" };
    $scope.sexs = helperServices.sex;
    $scope.$emit("SendUp", $scope.itemHeader);
    $scope.datas = [];
    $scope.model = {};
    $scope.a = [];
    $.LoadingOverlay("hide");
    $scope.totalStokSisa = 0;
    $scope.totalStok = 0;
    $scope.totalTerjual = 0;
    // PembelianServices.get().then(x => {
    //     $scope.datas = x;
    //     $scope.setStok($scope.datas);
    //     $.LoadingOverlay("hide");
    // })
    $scope.tampil = (item) => {
        $.LoadingOverlay("show");
        var a = item.split(' - ');
        $scope.model.awal = a[0];
        $scope.model.akhir = a[1];
        PembelianServices.getLaporan($scope.model).then(x=>{
            $scope.datas = x;
            $scope.setStok($scope.datas);
            $.LoadingOverlay("hide");
        })
        // if(a[0]!==a[1]){
        // }else{
        //     $.LoadingOverlay("hide");
        // }
    }
    $scope.setStok = (item)=>{
        $scope.totalStokSisa = 0;
        item.forEach(element => {
            if(element.totaltransaksi){
                $scope.totalStokSisa += parseFloat(element.stok) - parseFloat(element.totaltransaksi);
            }else{
                $scope.totalStokSisa += parseFloat(element.stok);
            }
            $scope.totalStok += parseFloat(element.stok);
            element.stok = parseFloat(element.stok);
            element.totaltransaksi = element.totaltransaksi == null ? 0 : element.totaltransaksi;
            $scope.totalTerjual += element.totaltransaksi;
        });
        // return $scope.totalStokSisa;
    }
    $scope.print = () => {
        // var OPTION = {mode:"popup", popHt: 500, popWd: 400,popX: 500,popY: 600, popClose: true, strict: undefined};
        $("#print").printArea();
    }

}
function laporanPenjualanController($scope, helperServices, TransaksiServices) {
    $scope.itemHeader = { title: "Laporan Penjualan", breadcrumb: "Laporan Penjualan", header: "Laporan Penjualan" };
    $scope.sexs = helperServices.sex;
    $scope.$emit("SendUp", $scope.itemHeader);
    $scope.datas = [];
    $scope.model = {};
    $scope.a = [];
    $.LoadingOverlay("hide");
    $scope.totalTerjual = 0;
    $scope.totalPenjualan = 0;
    // PembelianServices.get().then(x => {
    //     $scope.datas = x;
    //     $scope.setStok($scope.datas);
    //     $.LoadingOverlay("hide");
    // })
    $scope.tampil = (item) => {
        $.LoadingOverlay("show");
        var a = item.split(' - ');
        $scope.model.awal = a[0];
        $scope.model.akhir = a[1];
        TransaksiServices.getLaporan($scope.model).then(x=>{
            $scope.datas = x;
            $scope.setStok($scope.datas.transaksi);
            $.LoadingOverlay("hide");
        })
        // if(a[0]!==a[1]){
        // }else{
        //     $.LoadingOverlay("hide");
        // }
    }
    $scope.setStok = (item)=>{
        $scope.totalTerjual = 0;
        $scope.totalPenjualan = 0;
        $scope.datas.pembelian.hargajual = parseFloat($scope.datas.pembelian.hargajual);
        item.forEach(element => {
            element.jumlah= parseFloat(element.jumlah);
            $scope.totalTerjual += element.jumlah;
            $scope.totalPenjualan += element.jumlah * $scope.datas.pembelian.hargajual;
        });
        // return $scope.totalStokSisa;
    }
    $scope.print = () => {
        // var OPTION = {mode:"popup", popHt: 500, popWd: 400,popX: 500,popY: 600, popClose: true, strict: undefined};
        $("#print").printArea();
    }

}
function pesanController($scope, helperServices, PesanServices) {
    $scope.itemHeader = { title: "Pesan Broadcast", breadcrumb: "Pesan Broadcast", header: "Pesan Broadcast" };
    $scope.sexs = helperServices.sex;
    $scope.$emit("SendUp", $scope.itemHeader);
    $scope.datas = [];
    $scope.model = {};
    $scope.a = [];
    $scope.totalTerjual = 0;
    $scope.totalPenjualan = 0;
    PesanServices.get().then(x => {
        if(x !== "null"){
            $scope.datas = x;
        }
        $.LoadingOverlay("hide");
    })
}