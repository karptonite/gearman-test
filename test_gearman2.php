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
$jobReceived = false;
while ( $worker->work() ) {
	$jobReceived = true;
};
if( $jobReceived) {
	echo "There was a job. Test passed.\n";
} else {
	echo "There was no job. Test failed.\n";
}
