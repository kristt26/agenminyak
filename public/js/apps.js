angular.module('apps', [
    'adminctrl',
    'helper.service',
    'auth.service',
    'services',
    'datatables'
])
    .controller('indexController', function ($scope) {
        $scope.titleHeader = "SPK SAW";
        $scope.header = "";
        $scope.breadcrumb = "";

        $scope.$on("SendUp", function (evt, data) {
            $scope.header = data.title;
            $scope.header = data.header;
            $scope.breadcrumb = data.breadcrumb;
        });
    });
