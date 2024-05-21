<?php

$server_host = "HOST HERE";
$function_name = 'TEST_ACTION';
$client = new GearmanClient();
$client->addServer( $server_host, 4730 );
$client->doBackground( $function_name, 'the_workload' );

$worker = new GearmanWorker();
$worker->addServer( $server_host, 4730 );

$callback = function ( $job ) {
	$workload = $job->workload();
	echo "Got the job, but exiting with an non-zero error code\n";
	exit( 255 );
};

$worker->addFunction( $function_name, $callback );
$result = $worker->work();
