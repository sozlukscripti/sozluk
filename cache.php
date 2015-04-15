<?
$cachesystem = 'yes'; // evet-hay�r
$rootpath='./'; // k�k dizin
$cache = 'cache'; // dosyalar�n cachelenece�i klas�r   
function cache_check ($file = 'cachefile') {
    global $cache,$rootpath,$cachesystem,$cacheident,$cachetime;
    if ($cachesystem == 'yes') {
        $cachefile = $rootpath.$cache . '/'.$file.'.html';
        $updatetime = $cachetime;
		$zaman=@filemtime($cachefile)+$updatetime;
        if (file_exists($cachefile) && ( time() < $zaman )   )
        {
            include_once($cachefile); 
            exit;
        } 
        ob_start();
    }else
        return;
}
   
function cache_save  ($file = 'cachefile') {
    global $cache,$rootpath,$cachesystem,$cacheident;
    if ($cachesystem == 'yes') {
        $cachefile = $rootpath.$cache . '/'.$file.'.html';
        @$fp = fopen($cachefile, 'w');
        @fwrite($fp, ob_get_contents());       
        @fclose($fp);         
        ob_end_flush();
    }else
        return;
}

#$cacheident = ($_SERVER['QUERY_STRING'] != '' ? md5($_SERVER['QUERY_STRING']) : 'noGet');

?>
