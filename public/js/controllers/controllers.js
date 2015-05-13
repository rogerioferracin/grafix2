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
    .controller('ContatoCrtl', function($http, $scope, $modal, $window ,Scopes){

            $scope.contato = {}


            /**
             * Cria novo contato
             * @param $entidade Classe da entidade que possui o contato
             * @param $entidade_id Id da entidade
             */
            $scope.novoContato = function($entidade, $entidade_id)
            {
                var $entidadeData = {
                    entidade    : $entidade,
                    entidade_id : $entidade_id
                }

                //abre janela modal
                var modalInstance = $modal.open({
                    templateUrl : '/dialogs/contato-modal',
                    controller  : 'ModalNovoContatoCrtl',
                    size        : 'lg',
                    windowClass : 'contato-modal-class',
                    resolve     :  {
                        entidadeData : function() {
                            return $entidadeData
                        }
                    }
                });

                modalInstance.result.then(function(result)
                {
                    if(result) {
                        alert(result);
                        $window.location.reload();
                    }
                });
            }

            $scope.atualizaContato = function($id) {

            if(angular.isNumber($id)) {
                $scope.contato.id = $id
            }

            //guarda contato no Scopes de compartilhamento
            Scopes.store('contato', $scope.contato);

            //cria janela modal
            var modalInstance = $modal.open({
                templateUrl : '/dialogs/contato-modal',
                controller  : 'ModalContatoCrtl',
                size        : 'lg',
                windowClass : 'contato-modal-class',
            })

            //Se a janela modal for encerrada executa este metodo
            modalInstance.result.then(function(result){
                alert(result);
                $window.location.reload();
            })
        }
            })

        .controller('ModalNovoContatoCrtl', function($scope, $modalInstance, Contato, entidadeData, Sistema){
            $scope.contatoData = {};
            Sistema.showLoading(false)
            $scope.btn_atualiza = true;

            $scope.atualiza = function() {
                if(confirm('Deseja gravar novo contato?')) {
                    Sistema.showLoading(true);

                    Contato.save($scope.contatoData, entidadeData)
                        .success(function(result){

                            if(result.success) {
                                Sistema.showLoading(false);
                                $modalInstance.close(result.mensagem);
                            }

                        })
                        .error(function(result){
                            $scope.errors = data.errors;
                            $scope.panel_error = true;
                            Sistema.showLoading(false);
                        })
                }
            }
            $scope.cancel = function()
            {
                $modalInstance.dismiss();
            }

        })

        //controller do Modal de contato
        .controller('ModalContatoCrtl', function($scope, $modalInstance, Contato, Scopes){

            $scope.masterData = {};
            $scope.contatoData = {};
            $scope.loading = true;

            var contato = Scopes.get('contato');

            if(contato.id) {
                Contato.getById(contato.id)
                    .success(function(result){
                        if(result.success) {
                            $scope.contatoData = result.contato;
                            $scope.loading = false;
                        }
                    });
            } else {
                $scope.loading = false;
            }

            $scope.grava = function() {

                $scope.panel_error = false;
                $scope.loading = true;

                var confirma = confirm('Salva alterações em contato?');

                if(confirma) {
                    Contato.save(contato, $scope.contatoData)
                    .success(function(data) {
                            if(data.success) {
                                $modalInstance.close(data.mensagem);
                            } else if(data.error) {
                                alert(data.mensagem);
                                $scope.errors = data.errors;
                                $scope.panel_error = true;
                                $scope.loading = false;
                            }
                    })
                    .error (function(data) {
                        $scope.errors = data.errors;
                        $scope.panel_error = true;
                        $scope.loading = false;
                    })
                }
            }

            $scope.cancel = function() {
                $modalInstance.dismiss(false);
            }
    })
