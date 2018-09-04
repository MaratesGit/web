angular.module('AceApp').controller('ProfileCtrl', function($scope, $timeout, $rootScope) {
  
	$scope.alert = {
		shown: true,
		close: function() {
			$scope.alert.shown = false;
		}
	};

	
	//Editable plugin is jQuery based and therefore some settings hould be 
	
	//editables on profile page
	jQuery.fn.editable.defaults.mode = 'inline';
	jQuery.fn.editableform.loading = "<div class='editableform-loading'><i class='ace-icon fa fa-spinner fa-spin fa-2x light-blue'></i></div>";
    jQuery.fn.editableform.buttons = '<button type="submit" class="btn btn-info editable-submit"><i class="ace-icon fa fa-check"></i></button>'+
                                '<button type="button" class="btn editable-cancel"><i class="ace-icon fa fa-times"></i></button>';    
	
	
	$scope.avatar = {
		value: null,
		options: {
			type: 'image',
			name: 'avatar',
			'image': {
				btn_choose: 'Change Avatar',
				droppable: true,
				maxSize: 110000
			},
			url: function(params) {
				if("FileReader" in window) {
					//for browsers that have a thumbnail of selected image
					var thumb = jQuery('#avatar').next().find('img').data('thumb');
					if(thumb) jQuery('#avatar').get(0).src = thumb;
				}
			}
		}		
	};


	$scope.username = {
		value: 'alexdoe',
		options: {
			type: 'text',
			name: 'username'
		}
	};
	/**
	$scope.$watch('username.value', function(newValue) {
		console.log(newValue);
	});
	*/
	
	
	var cities = {
		'RU' : ["Москва", "Санкт-Петербург", "Псков", "Архангельск"]
	};
	
	$scope.country = {
		value: 'RU',
		options: {
			type: 'select',
			name: 'country',
			source: [
				{value: 'RU', text: 'Россия'}
				
			]
		}
	};
	$scope.city = {
		value: 'Amsterdam',
		options: {
			type: 'select',
			name: 'city',
			source: cities[$scope.country.value]
		}
	};
	$scope.$watch('country.value', function(newValue, oldValue) {
		$scope.city.options.source = cities[newValue];
	});

	
	
	//////////////	
	$scope.age = {
		value: 18,
		options: {
			type: 'spinner',
			name : 'age',
			spinner : {
				min : 16,
				max : 99,
				step: 1,
				on_sides: true
			}
		}
	};
	
	
	$scope.signup = {
		value: '2010/06/20',
		options: {
			name: 'signup',
			type: 'adate',
			date: {
				format: 'yyyy/mm/dd',
				viewformat: 'yyyy/mm/dd',
				weekStart: 1
			}
			
		}
	};
	
	
	$scope.login = {
		value: '3 hours ago',
		options: {
			type: 'select',
			name: 'login',
			slider : {
				min : 1,
				max: 50,
				width: 100
			},
			
			success: function(response, newValue) {
				return newValue + ' hours ago';
			}
		}
	};
	
	
	$scope.about = {
		value: 'Editable',
		options: {
			type: 'textarea',
			name: 'about'
		}
	};
	

	
	//activity box	
	$scope.activityScroll = {
		height: '250px',
		mouseWheelLock: true,
		alwaysVisible : true
	};
	
	//handle widget box reloading
	$scope.is_activity_reloading = false;
	$scope.activity_reload = function() {
		$timeout(function() {
			$scope.is_activity_reloading = false;
		}, 1500);
	};
	
});

