'use strict';

/**
 * AngularJs Controller para usuarios
 */


var grafixApp = angular.module('grafixApp', ['ui.bootstrap', 'AppServices', 'ngSanitize'], function($interpolateProvider){
    $interpolateProvider.startSymbol('<%');
    $interpolateProvider.endSymbol('%>');
});

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

    })

    //Controle de cadastro e atualização de contatos
    .controller('ContatoCrtl', function($http, $scope, $modal, Scopes){

        $scope.alteraContato = function($id) {

            Scopes.store('contatoId', $id);

            var modalInstance = $modal.open({
                templateUrl : '/dialogs/contato-modal',
                controller  : 'ModalContatoCrtl',
                size        : 'lg',
                windowClass : 'contato-modal-class'
            })

            modalInstance.result.then(function(result){
                alert(result);
            })
        }
    })

    .controller('ModalContatoCrtl', function($scope, $modalInstance, Contato, Scopes){

            $scope.masterData = {};
            $scope.contatoData = {};

            $scope.loading = true;

            var $id = Scopes.get('contatoId');

            Contato.getById($id)
                .success(function(result){
                    if(result.success) {
                        $scope.contatoData = result.contato;
                        $scope.loading = false;
                    }
                });

            $scope.ok = function() {

                var confirma = confirm('Salva alterações em contato?');

                if(confirma) {
                    Contato.save($id, $scope.contatoData)
                        .success(function(data) {
                            $modalInstance.close(true)
                        })
                        .error (function(data) {
                            $scope.errors = data.errors;
                            $scope.panel_error = true;

                            console.log(data)
                        })


                }
            }

            $scope.cancel = function() {
                $modalInstance.dismiss(false);
            }
    })
