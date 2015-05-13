/**
 * Created by Arte 01 on 11/05/2015.
 */
angular.module('AppServices', ['ui.bootstrap'])

    .factory('Sistema', function($rootScope){
        return {
            //Liga desliga do icone de loading
            showLoading : function(state) {
                if(state) {
                    $rootScope.loading = true;
                    $rootScope.load_check = false;
                } else {
                    $rootScope.loading = false;
                    $rootScope.load_check = true;

                }
            }
        }
    })

    .factory('Contato', function($http){
        return {
            getById : function(id) {
                return $http.get('/contatos/contato-by-id/' + id);
            },
            save    : function(contatoData, entidadeData) {

                var url = '/contatos/novo/' + entidadeData.entidade + '/' + entidadeData.entidade_id;

                return $http({
                    method  : 'post',
                    url     : url,
                    headers : {'Content-type' : 'application/x-www-form-urlencoded'},
                    data    : $.param(contatoData)
                })
            },
            update  : function(id, contato) {
                return $http({
                    method  : 'put',
                    url     : '/contatos/altera-contato' + id,
                    headers : {'Content-type' : 'application/x-www-form-urlencoded'},
                    data    : $.param(contato)
                })
            }
        }
    })
    .factory('Scopes', function($rootScope){
        var mem = {}

        return {
            store : function(key, value) {
                $rootScope.$emit('scope.stored', key);
                mem[key] = value;
            },

            get : function(key) {
                return mem[key];
            }
        }
    })