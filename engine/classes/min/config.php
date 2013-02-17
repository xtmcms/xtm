<?php
$min_allowDebugFlag = false;
$min_errorLogger = false;
$min_enableBuilder = false;
$min_documentRoot = '';
$min_documentRoot = substr(dirname(__FILE__), 0, -19);
$min_cachePath = $min_documentRoot . '/engine/cache/system';
$min_cacheFileLocking = true;
$min_serveOptions['bubbleCssImports'] = false;
$min_serveOptions['maxAge'] = 15552000;
$min_serveOptions['minApp']['groupsOnly'] = false;
$min_serveOptions['minApp']['maxFiles'] = 20;
$min_symlinks = array();
$min_uploaderHoursBehind = 0;
$min_libPath = dirname(__FILE__) . '/lib';
@ini_set('zlib.output_compression', '0');
if (isset($_GET['charset'])) {
    $_GET['charset'] = @preg_replace("/[^a-zA-Z0-9\-_]/", '', $_GET['charset']);
    if ($_GET['charset']) $min_serveOptions['contentTypeCharset'] = $_GET['charset'];
} 
