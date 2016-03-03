var wpApp = new angular.module('wpArtistTheme', ['ui.router', 'ngResource']);

wpApp.factory('Posts', function($q, $resource) {

	return $resource(appInfo.api_url + 'posts/:ID', {
		ID: '@id'
	});
});

wpApp.controller('ListCtrl', ['$scope', 'Posts', function($scope, Posts) {
	console.log('ListCtrl');
	$scope.page_title = 'Blog Listing';
	Posts.query(function(res) {
		$scope.posts = res;
		return res;
	});
}])

wpApp.controller('DetailCtrl', ['$scope', '$stateParams', 'Posts', function($scope, $stateParams, Posts) {
	console.log($stateParams);
	Posts.get({ID: $stateParams.id}, function(res) {
		$scope.post = res;
		console.log(res);
	})
}])

wpApp.config(function($stateProvider, $urlRouterProvider) {
	$urlRouterProvider.otherwise('/');
	$stateProvider
	        .state('works', {
	        	url: '/',
	        	controller: 'ListCtrl',
	        	templateUrl: appInfo.template_directory + 'templates/posts.html'
	        })
	        .state('detail', {
	        	url: '/posts/:id',
	        	controller: 'DetailCtrl',
	        	templateUrl: appInfo.template_directory + 'templates/detail.html'
	        })
})

wpApp.filter('to_trusted', ['$sce', function($sce) {
	return function(text) {
		return $sce.trustAsHtml(text);
	}
}])