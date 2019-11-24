(function () {
    'use strict';

    angular
        .module('emsAdmin')
        .controller('videoCtrl', videoCtrl);

    videoCtrl.$inject = ['$scope', '$http', '$rootScope', 'localStorageService', 'toaster', '$state','NgTableParams'];

    /* @ngInject */
    function videoCtrl($scope, $http, $rootScope, localStorageService, toaster, $state,NgTableParams) {
        $scope.ldata = {};
        $scope.path = '../api/upload/';
        $scope.upFile = [];
        $scope.getFileDetails = function (e) {
            $scope.upFile = [];
            $scope.$apply(function () {
                // STORE THE FILE OBJECT IN AN ARRAY.
                for (var i = 0; i < e.files.length; i++) {
                    $scope.upFile.push(e.files[i])
                }
            });
        };
        $scope.message = "Upload Data"
        $scope.addvideo = function (ldata,userForm) {
            $scope.submitted = true;
           

            if (userForm.$valid) {
                $scope.message = "Uploading......";
                var file = $scope.upFile;
                var fd = new FormData();
                fd.append('file', file);
                fd.append('page', ldata.page);
                fd.append('title', ldata.title);
                fd.append('description', ldata.description);

                $http.post($rootScope.ApiUrl + 'addVideo', fd, {
                    transformRequest: angular.identity,
                    headers: { 'Content-Type': undefined }
                }).then(function (data) {
                    if (data.data.status) {
                        toaster.pop('success', "Success", "addded successfully.");
                        $scope.upFile = [];
                        $scope.ldata.page='';
                        $scope.ldata.title='';
                        $scope.ldata.description='';
                        userForm.$setPristine();
                        $scope.getVideoList()
                        $scope.message = "Upload Data"
                    } else {
                        toaster.pop('error', "Error", "Rename image name & try again.");
                        $scope.message = "Upload Data"
                    }
                });

            }
        };
 
        
        function setValue() {
            $scope.viewby = 5;
            $scope.totalItems = $scope.videoList.length;
            $scope.currentPage = 1;
            $scope.itemsPerPage = $scope.viewby;
            $scope.maxSize = 5; //Number of pager buttons to show                    
        }
        $scope.setPage = function (pageNo) {
            $scope.currentPage = pageNo;
        };
        $scope.setItemsPerPage = function (num) {
            $scope.itemsPerPage = num;
            $scope.currentPage = 1; //reset to first page
        }

        $scope.deletelocation = function (x) {
            $scope.delobj = x;
            $('#deletemodel').modal('show');
        };

        $scope.getCategory = function () {
            $http.get($rootScope.ApiUrl + 'getCategory').then(function (data) {
                if (data) {
                    $scope.categories = angular.copy(data.data.data);
                }
            });
        };
        $scope.getVideoList = function () {
            $http.get($rootScope.ApiUrl + 'getVideoList').then(function (data) {
                if (data) {
                    var data = angular.copy(data.data.data);
                    $scope.tableParams = new NgTableParams({}, { dataset: data});
                }
            });
        };

        $scope.viewImage = function (x) {
            $scope.image = '../api/upload/' + x.url;

            $('#viewmodel').modal('show');
        }
        $scope.editImage=function(x){
            $scope.ldata1 = x;           
            $('#editmodel').modal('show');   
        }
        $scope.updatevideo=function(ldata1,userFormEdit){
            var file = $scope.upFile;
            var fd = new FormData();
            fd.append('file', file);
            fd.append('page', $scope.ldata1.page);
            fd.append('title', $scope.ldata1.title);
            fd.append('description', $scope.ldata1.description); 
            fd.append('id', $scope.ldata1.id); 
            $http.post($rootScope.ApiUrl + 'updateVideo', fd, {
                transformRequest: angular.identity,
                headers: { 'Content-Type': undefined }
            }).then(function (data) {
                if (data.data.status) {
                    toaster.pop('success', "Success", "updated successfully.");
                    $scope.upFile = [];
                    $scope.ldata1.page='';
                    $scope.ldata1.title='';
                    $scope.ldata1.description='';
                    userFormEdit.$setPristine();
                    $scope.getVideoList()
                    $scope.message = "Upload Data";
                    $('#editmodel').modal('hide');
                } else {
                    toaster.pop('error', "Error", "Rename image name & try again.");
                    $scope.message = "Upload Data"
                    $('#editmodel').modal('hide');
                }
            });            
        }
        $scope.deleteVideorecord = function (customer) {
            $http.post($rootScope.ApiUrl + 'deleteVideo', customer).then(function (data) {

                if (data.data.status) {
                    toaster.pop('success', "Success", "Deleted successfully.");
                    $scope.getVideoList()
                } else {
                    toaster.pop('error', "Error", "Error While deleting video.");
                }
                $('#deletemodel').modal('hide');
            });
        };
        $scope.getCategory()
        $scope.getVideoList()
    }
})();
 