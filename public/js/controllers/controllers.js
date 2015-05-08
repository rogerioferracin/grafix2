'use strict';

/**
 * AngularJs Controller para usuarios
 */


var grafixApp = angular.module('grafixApp', ['ui.bootstrap']);

/**
 * Controllers
 */

grafixApp.controller('UserCrtl', function($scope, $http, $modal){

    //delete user
    $scope.deleteUser = function(id){
        var modalInstance = $modal.open({
            templateUrl : '/_dlgs/confirmModalDlg.html',
            controller  : 'ModalConfirmCrtl',
            size        : 'sm'
        });

        modalInstance.result.then(function(result) {
            if(result) {
                alert('Código a ser implementado!')
            }
        });
    }

})
    .controller('ModalConfirmCrtl', function($scope, $modalInstance){

        $scope.ok = function() {
            $modalInstance.close(true);
        }

        $scope.cancel = function() {
            $modalInstance.dismiss(false);
        }

    });

grafixApp.directive('confirma-envio', function(){
    alert('Parando evento');
})