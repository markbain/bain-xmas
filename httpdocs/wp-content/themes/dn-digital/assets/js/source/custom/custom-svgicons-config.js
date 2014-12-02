var svgIconConfig = {
	plus : { 
		url : (directory_uri.stylesheet_directory_uri) + '/assets/svg/plus.svg',
		animation : [
			{ 
				el : 'path:nth-child(2)', 
				animProperties : { 
					from : { val : '{"transform" : "r0 32 32", "opacity" : 1}' }, 
					to : { val : '{"transform" : "r180 32 32", "opacity" : 0}' }
				} 
			},
			{ 
				el : 'path:nth-child(3)', 
				animProperties : { 
					from : { val : '{"transform" : "r0 32 32"}' }, 
					to : { val : '{"transform" : "r180 32 32"}' }
				} 
			}
		]
	},
	hamburgerCross : {
		url : (directory_uri.stylesheet_directory_uri) + '/assets/svg/hamburger.svg',
		animation : [
			{ 
				el : 'path:nth-child(2)', 
				animProperties : { 
					from : { val : '{"path" : "m 5.0916789,20.818994 53.8166421,0"}' }, 
					to : { val : '{"path" : "M 12.972944,50.936147 51.027056,12.882035"}' }
				} 
			},
			{ 
				el : 'path:nth-child(3)', 
				animProperties : { 
					from : { val : '{"transform" : "s1 1", "opacity" : 1}', before : '{"transform" : "s0 0"}' }, 
					to : { val : '{"opacity" : 0}' }
				} 
			},
			{ 
				el : 'path:nth-child(4)', 
				animProperties : { 
					from : { val : '{"path" : "m 5.0916788,42.95698 53.8166422,0"}' }, 
					to : { val : '{"path" : "M 12.972944,12.882035 51.027056,50.936147"}' }
				} 
			}
		]
	},
	navUpArrow : {
		url : (directory_uri.stylesheet_directory_uri) + '/assets/svg/nav-up-arrow.svg',
		animation : [
			{ 
				el : 'path', 
				animProperties : { 
					from : { val : '{"path" : "M 9.8831175,48.502029 31.978896,15.316152 54.116883,48.502029"}' }, 
					to : { val : '{"path" : "M 9.8831175,33.502029 31.978896,0.316152 54.116883,33.502029"}' }
				} 
			}
		]
	},
	zoom : {
		url :  (directory_uri.stylesheet_directory_uri) + '/assets/svg/zoom.svg',
		animation : [
			{ 
				el : 'path:nth-child(1)', 
				animProperties : { 
					from : { val : '{"transform" : "s 1 1"}' }, 
					to : { val : '{"transform" : "s 1.1 1.1"}' }
				} 
			},
			{ 
				el : 'path:nth-child(2)', 
				animProperties : { 
					from : { val : '{"transform" : "s 1 1", "stroke-width" : "1"}' }, 
					to : { val : '{"transform" : "s 2 2", "stroke-width" : "2"}' }
				} 
			}
		]
	},
};
