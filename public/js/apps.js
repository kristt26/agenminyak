angular.module('apps', [
    'adminctrl',
    'helper.service',
    'auth.service',
    'services',
    'datatables',
    'ngLocale',
    'ui.utils.masks'
])
    .controller('indexController', function ($scope) {
        $scope.titleHeader = "Agen Minyak Tanah";
        $scope.header = "";
        $scope.breadcrumb = "";

        $scope.$on("SendUp", function (evt, data) {
            $scope.header = data.title;
            $scope.header = data.header;
            $scope.breadcrumb = data.breadcrumb;
        });
        $.LoadingOverlay("show");
    });
