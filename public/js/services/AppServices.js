/**
 * Created by Arte 01 on 11/05/2015.
 */
angular.module('AppServices', ['ui.bootstrap'])

    .factory('Contato', function($http){
        return {
            getById : function(id) {
                return $http.get('/contatos/contato-by-id/' + id);
            },
            save    : function(id, contatoData) {
                return $http({
                    method  : 'put',
                    url     : '/contatos/altera-contato/' + id,
                    headers : {'Content-type' : 'application/x-www-form-urlencoded'},
                    data    : $.param(contatoData)
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