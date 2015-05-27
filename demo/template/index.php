<?php
	require '/_lib/AltoRouter.php';
	$router = new AltoRouter();

	$router->setBasePath('/own_repo/phpdemo/demo/template');
	
	$router->map( 'GET|POST', '/', function() {
		require __DIR__ . '/base.php';
	});
	$router->map( 'GET|POST', '/login', function() {
		require __DIR__ . '/base.php';
	});
	$router->map( 'GET|POST', '/profile', function() {
		require __DIR__ . '/dashboard_in.php';
	});
	$match = $router->match();
	
	if($match) {
		call_user_func_array( $match['target'], $match['params'] ); 
	}
?>
