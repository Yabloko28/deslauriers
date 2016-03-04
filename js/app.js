var wpApp = new angular.module('wpArtistTheme', ['ui.router', 'ngResource']);

wpApp.factory('Posts', function($q, $resource) {

	return $resource(appInfo.api_url + 'posts/:ID', {
		ID: '@id'
	});
});

wpApp.factory('Pages', function($q, $resource) {
	return $resource(appInfo.api_url + 'pages/')
});

wpApp.controller('WelcomeCtrl', ['$scope', 'Posts', function($scope, Posts) {
	console.log('WelcomeCtrl');
	Posts.query(function(res) {
		$scope.posts = res;
		console.log(res);
	});
}])

wpApp.controller('WorksCtrl', ['$scope', 'Posts', function($scope, Posts) {
	console.log('WorksCtrl');
	Posts.query(function(res) {
		$scope.posts = res;
	});
}])

wpApp.controller('PageCtrl', ['$scope', 'Pages', function($scope, Pages) {
	console.log('PageCtrl');
	Pages.query(function(res) {
		$scope.pages = res;
		console.log(res);
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
	        .state('welcome', {
	        	url: '/',
	        	controller: 'WelcomeCtrl',
	        	templateUrl: appInfo.template_directory + 'templates/welcome.html'
	        })
	        .state('paper-works', {
	        	url: '/paper-works',
	        	controller: 'WorksCtrl',
	        	templateUrl: appInfo.template_directory + 'templates/paper.html'
	        })
	        .state('video-works', {
	        	url: '/video-works',
	        	controller: 'WorksCtrl',
	        	templateUrl: appInfo.template_directory + 'templates/video.html'
	        })
	        .state('performative-works', {
	        	url: '/performative-works',
	        	controller: 'WorksCtrl',
	        	templateUrl: appInfo.template_directory + 'templates/performative.html'
	        })
	        .state('cv-bio', {
	        	url: '/cv-bio',
	        	controller: 'PageCtrl',
	        	templateUrl: appInfo.template_directory + 'templates/cv-bio.html'
	        })
        	.state('contact', {
	        	url: '/contact',
	        	controller: 'PageCtrl',
	        	templateUrl: appInfo.template_directory + 'templates/contact.html'
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