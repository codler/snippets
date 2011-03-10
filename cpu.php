define('MEMORY_INIT', memory_get_usage()); // For memory debug
define('TIME_INIT', microtime(true)); // For load time debug




if (DEBUG) {
	function convert($size) {
		$unit=array('b','kb','mb','gb','tb','pb');
		return @round($size/pow(1024,($i=floor(log($size,1024)))),2).' '.$unit[$i];
	}
	echo "Memory usage: (start)".convert(MEMORY_INIT);
	echo " (end)".convert(memory_get_usage());
	echo " (peak)".convert(memory_get_peak_usage());
	echo "<br />";
	$data = getrusage();  
	echo "User time: ".  
	($data['ru_utime.tv_sec'] +  
	$data['ru_utime.tv_usec'] / 1000000);  
	echo "<br />";
	echo "System time: ".  
	($data['ru_stime.tv_sec'] +  
	$data['ru_stime.tv_usec'] / 1000000);  
	echo "<br />";
	echo "Load time: ".(microtime(true) - TIME_INIT);
}