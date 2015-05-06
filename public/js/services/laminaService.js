/**
 * Created by Arte 01 on 28/04/2015.
 */

angular.module('laminaService', [])

.factory('Lamina', function($http){
        return {
            //get Laminas from cache
            get : function(cacheId) {
                return $http.get('/laminas/laminas-from-cache/' + cacheId);
            },
            save : function(laminaData) {
                return $http({
                    method  : 'PUT',
                    url     : '/laminas/lamina-on-cache/',
                    headers : {'Content-type' : 'application/x-www-form-urlencoded'},
                    data    : $.param(laminaData)
                })

            }
        }
    })
    .factory('Insumos', function($http){
        return {
            papel : function() {
                return $http.get('/papeis/dropdown-data');
            },
            tinta : function() {
                return $http.get('/tintas/dropdown-data');
            },
            acabamentos : function() {
                return $http.get('/acabamentos/dropdown-data');
            }
        }
    })
