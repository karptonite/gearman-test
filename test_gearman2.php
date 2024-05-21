<?php

$server_host = "HOST_HERE";
$function_name = 'TEST_ACTION';

$worker = new GearmanWorker();
$worker->addServer( $server_host, 4730 );

$callback = function ( $job ) {
	return;
};

$worker->addFunction( $function_name, $callback );
$worker->setTimeout( 1000 );
while ( $worker->work() ) {
	echo "THERE WAS A JOB\n";
	exit;
};
echo "THERE WAS NO JOB\n";
exit;
