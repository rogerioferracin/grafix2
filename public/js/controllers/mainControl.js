/**
 * Created by Arte 01 on 28/04/2015.
 */

angular.module('ui.bootstrap.lamina', ['ui.bootstrap', 'AppServices'])
    .controller('LaminaModalController', function($scope, $http, $modal){
        //Objects
        $scope.masterData = {};
        $scope.laminaData = {};

        $scope.open = function(){
            console.log('Abrindo modal');
            var modalInstance = $modal.open({
                templateUrl : 'myModalContent.html',
                controller: 'ModalInstanceCtrl',
                resolve: {
                    items: function () {
                        return $scope.items;
                    }
                }
            });
        }

    })


/**ANGULAR MAIN CONTROLLER**/
angular.module('mainControl', ['ui.bootstrap'])
    .controller('laminaController', function($scope, $http, Lamina, Insumos){

        //Objects
        $scope.masterData = {};
        $scope.laminaData = {};
    })
    .controller('mainController', function($scope, $http, $modal, Lamina, Insumos){

        //objeto que vai conter a lamina
        $scope.masterData = {};
        $scope.laminaData = {};
        $scope.insumos = {}

        //show spinning load
        $scope.loading = true;


        //load all laminas
        Lamina.get($scope.cacheId)
            .success(function($data){
                $scope.laminas = $data;
                $scope.loading = false;
            });

        $scope.submitLamina = function() {
            $scope.loading = true;

            Lamina.save($scope.laminaData)
                .success(function(getData){
                    console.log(getData);
                    $scope.laminas = getData.laminas;
                    $scope.loading = false;
                    $scope.formLamina.$setPristine()
                    $scope.formLamina.$setUntouched();
                    $scope.laminaData = angular.copy($scope.masterData);
                })
                .error(function(data){
                    console.log(data);
                    $scope.loading = false;
                });
        }

        //load papel data
        Insumos.papel()
            .success(function($data){
                $scope.insumos.papeis = $data.data;
            });

        //load tintas data
        Insumos.tinta()
            .success(function($data){
                $scope.insumos.tintas = $data.data;
            });

        //load tintas data
        Insumos.acabamentos()
            .success(function($data){
                $scope.insumos.acabamentos = $data.data;
            });

        $scope.open = function() {
            var modalInstance = $modal.open({
                templateUrl : 'myModalContent.html',
            });
        }
    });