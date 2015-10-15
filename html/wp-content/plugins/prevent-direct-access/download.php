<?php
require_once( explode( "wp-content" , __FILE__ )[0] . "wp-load.php" );
require_once('includes/class-repository.php');

$mime_types = array("323" => "text/h323",
"acx" => "application/internet-property-stream",
"ai" => "application/postscript",
"aif" => "audio/x-aiff",
"aifc" => "audio/x-aiff",
"aiff" => "audio/x-aiff",
"asf" => "video/x-ms-asf",
"asr" => "video/x-ms-asf",
"asx" => "video/x-ms-asf",
"au" => "audio/basic",
"avi" => "video/x-msvideo",
"axs" => "application/olescript",
"bas" => "text/plain",
"bcpio" => "application/x-bcpio",
"bin" => "application/octet-stream",
"bmp" => "image/bmp",
"c" => "text/plain",
"cat" => "application/vnd.ms-pkiseccat",
"cdf" => "application/x-cdf",
"cer" => "application/x-x509-ca-cert",
"class" => "application/octet-stream",
"clp" => "application/x-msclip",
"cmx" => "image/x-cmx",
"cod" => "image/cis-cod",
"cpio" => "application/x-cpio",
"crd" => "application/x-mscardfile",
"crl" => "application/pkix-crl",
"crt" => "application/x-x509-ca-cert",
"csh" => "application/x-csh",
"css" => "text/css",
"dcr" => "application/x-director",
"der" => "application/x-x509-ca-cert",
"dir" => "application/x-director",
"dll" => "application/x-msdownload",
"dms" => "application/octet-stream",
"doc" => "application/msword",
"dot" => "application/msword",
"dvi" => "application/x-dvi",
"dxr" => "application/x-director",
"eps" => "application/postscript",
"etx" => "text/x-setext",
"evy" => "application/envoy",
"exe" => "application/octet-stream",
"fif" => "application/fractals",
"flr" => "x-world/x-vrml",
"gif" => "image/gif",
"gtar" => "application/x-gtar",
"gz" => "application/x-gzip",
"h" => "text/plain",
"hdf" => "application/x-hdf",
"hlp" => "application/winhlp",
"hqx" => "application/mac-binhex40",
"hta" => "application/hta",
"htc" => "text/x-component",
"htm" => "text/html",
"html" => "text/html",
"htt" => "text/webviewhtml",
"ico" => "image/x-icon",
"ief" => "image/ief",
"iii" => "application/x-iphone",
"ins" => "application/x-internet-signup",
"isp" => "application/x-internet-signup",
"jfif" => "image/pipeg",
"jpe" => "image/jpeg",
"jpeg" => "image/jpeg",
"jpg" => "image/jpeg",
"js" => "application/x-javascript",
"latex" => "application/x-latex",
"lha" => "application/octet-stream",
"lsf" => "video/x-la-asf",
"lsx" => "video/x-la-asf",
"lzh" => "application/octet-stream",
"m13" => "application/x-msmediaview",
"m14" => "application/x-msmediaview",
"m3u" => "audio/x-mpegurl",
"man" => "application/x-troff-man",
"mdb" => "application/x-msaccess",
"me" => "application/x-troff-me",
"mht" => "message/rfc822",
"mhtml" => "message/rfc822",
"mid" => "audio/mid",
"mny" => "application/x-msmoney",
"mov" => "video/quicktime",
"movie" => "video/x-sgi-movie",
"mp2" => "video/mpeg",
"mp3" => "audio/mpeg",
"mpa" => "video/mpeg",
"mpe" => "video/mpeg",
"mpeg" => "video/mpeg",
"mpg" => "video/mpeg",
"mpp" => "application/vnd.ms-project",
"mpv2" => "video/mpeg",
"ms" => "application/x-troff-ms",
"mvb" => "application/x-msmediaview",
"nws" => "message/rfc822",
"oda" => "application/oda",
"p10" => "application/pkcs10",
"p12" => "application/x-pkcs12",
"p7b" => "application/x-pkcs7-certificates",
"p7c" => "application/x-pkcs7-mime",
"p7m" => "application/x-pkcs7-mime",
"p7r" => "application/x-pkcs7-certreqresp",
"p7s" => "application/x-pkcs7-signature",
"pbm" => "image/x-portable-bitmap",
"pdf" => "application/pdf",
"pfx" => "application/x-pkcs12",
"pgm" => "image/x-portable-graymap",
"pko" => "application/ynd.ms-pkipko",
"pma" => "application/x-perfmon",
"pmc" => "application/x-perfmon",
"pml" => "application/x-perfmon",
"pmr" => "application/x-perfmon",
"pmw" => "application/x-perfmon",
"png" => "image/png",
"pnm" => "image/x-portable-anymap",
"pot" => "application/vnd.ms-powerpoint",
"ppm" => "image/x-portable-pixmap",
"pps" => "application/vnd.ms-powerpoint",
"ppt" => "application/vnd.ms-powerpoint",
"prf" => "application/pics-rules",
"ps" => "application/postscript",
"pub" => "application/x-mspublisher",
"qt" => "video/quicktime",
"ra" => "audio/x-pn-realaudio",
"ram" => "audio/x-pn-realaudio",
"ras" => "image/x-cmu-raster",
"rgb" => "image/x-rgb",
"rmi" => "audio/mid",
"roff" => "application/x-troff",
"rtf" => "application/rtf",
"rtx" => "text/richtext",
"scd" => "application/x-msschedule",
"sct" => "text/scriptlet",
"setpay" => "application/set-payment-initiation",
"setreg" => "application/set-registration-initiation",
"sh" => "application/x-sh",
"shar" => "application/x-shar",
"sit" => "application/x-stuffit",
"snd" => "audio/basic",
"spc" => "application/x-pkcs7-certificates",
"spl" => "application/futuresplash",
"src" => "application/x-wais-source",
"sst" => "application/vnd.ms-pkicertstore",
"stl" => "application/vnd.ms-pkistl",
"stm" => "text/html",
"svg" => "image/svg+xml",
"sv4cpio" => "application/x-sv4cpio",
"sv4crc" => "application/x-sv4crc",
"t" => "application/x-troff",
"tar" => "application/x-tar",
"tcl" => "application/x-tcl",
"tex" => "application/x-tex",
"texi" => "application/x-texinfo",
"texinfo" => "application/x-texinfo",
"tgz" => "application/x-compressed",
"tif" => "image/tiff",
"tiff" => "image/tiff",
"tr" => "application/x-troff",
"trm" => "application/x-msterminal",
"tsv" => "text/tab-separated-values",
"txt" => "text/plain",
"uls" => "text/iuls",
"ustar" => "application/x-ustar",
"vcf" => "text/x-vcard",
"vrml" => "x-world/x-vrml",
"wav" => "audio/x-wav",
"wcm" => "application/vnd.ms-works",
"wdb" => "application/vnd.ms-works",
"wks" => "application/vnd.ms-works",
"wmf" => "application/x-msmetafile",
"wps" => "application/vnd.ms-works",
"wri" => "application/x-mswrite",
"wrl" => "x-world/x-vrml",
"wrz" => "x-world/x-vrml",
"xaf" => "x-world/x-vrml",
"xbm" => "image/x-xbitmap",
"xla" => "application/vnd.ms-excel",
"xlc" => "application/vnd.ms-excel",
"xlm" => "application/vnd.ms-excel",
"xls" => "application/vnd.ms-excel",
"xlt" => "application/vnd.ms-excel",
"xlw" => "application/vnd.ms-excel",
"xof" => "x-world/x-vrml",
"xpm" => "image/x-xpixmap",
"xwd" => "image/x-xwindowdump",
"z" => "application/x-compress",
"zip" => "application/zip");

ignore_user_abort(true);
set_time_limit(0); // disable the time limit for this script

$home_url = get_home_url();
$is_direct_access = isset($_GET['is_direct_access']) ? $_GET['is_direct_access'] : '';
if($is_direct_access === 'true') {
    prevent_file();
} else {
    show_file();
}


function prevent_file() {
    $guid = $_SERVER['REQUEST_URI']; ///this is post's guid wp-content/uploads/2015/10/Screen-Shot-2015-10-06-at-12.36.44.png
    $repository = new Repository;
    $post = $repository->get_post_by_guid($guid);
    if(isset($post)) {
        $advance_file = $repository->get_advance_file_by_post_id($post->ID);
        if(isset($advance_file) && $advance_file->is_prevented === "1") { //the file is prevented 
            status_header(404);
            die('File not found.');
        } 
    }

    list($basedir) = array_values(array_intersect_key(wp_upload_dir(), array('basedir' => 1)))+array(NULL);
    $file =  rtrim($basedir,'/').'/'.str_replace('..', '', isset($_GET[ 'download_file' ])?$_GET[ 'download_file' ]:'');
    $file = preg_replace('{^/|\?.*}', ABSPATH, $guid);
    if (!$basedir || !is_file($file)) {
        status_header(404);
        die('404 &#8212; File not found.');
    }
    $mime = wp_check_filetype($file);
    if( false === $mime[ 'type' ] && function_exists( 'mime_content_type' ) )
        $mime[ 'type' ] = mime_content_type( $file );
    if( $mime[ 'type' ] )
        $mimetype = $mime[ 'type' ];
    else
        $mimetype = 'image/' . substr( $file, strrpos( $file, '.' ) + 1 );
    header( 'Content-Type: ' . $mimetype ); // always send this
    if ( false === strpos( $_SERVER['SERVER_SOFTWARE'], 'Microsoft-IIS' ) )
        header( 'Content-Length: ' . filesize( $file ) );
    $last_modified = gmdate( 'D, d M Y H:i:s', filemtime( $file ) );
    $etag = '"' . md5( $last_modified ) . '"';
    header( "Last-Modified: $last_modified GMT" );
    header( 'ETag: ' . $etag );
    header( 'Expires: ' . gmdate( 'D, d M Y H:i:s', time() + 100000000 ) . ' GMT' );
    // Support for Conditional GET
    $client_etag = isset( $_SERVER['HTTP_IF_NONE_MATCH'] ) ? stripslashes( $_SERVER['HTTP_IF_NONE_MATCH'] ) : false;
    if( ! isset( $_SERVER['HTTP_IF_MODIFIED_SINCE'] ) )
        $_SERVER['HTTP_IF_MODIFIED_SINCE'] = false;
    $client_last_modified = trim( $_SERVER['HTTP_IF_MODIFIED_SINCE'] );
    // If string is empty, return 0. If not, attempt to parse into a timestamp
    $client_modified_timestamp = $client_last_modified ? strtotime( $client_last_modified ) : 0;
    // Make a timestamp for our most recent modification...
    $modified_timestamp = strtotime($last_modified);
    if ( ( $client_last_modified && $client_etag )
        ? ( ( $client_modified_timestamp >= $modified_timestamp) && ( $client_etag == $etag ) )
        : ( ( $client_modified_timestamp >= $modified_timestamp) || ( $client_etag == $etag ) )
        ) {
        status_header( 304 );
        exit;
    }
    readfile( $file );
}

function show_file() {
    $private_url = $_GET['download_file'];
    $repository = new Repository;
    $advance_file = $repository->get_advance_file_by_url($private_url);
    //var_dump($advance_file);
    if(isset($advance_file)) {
        $post_id = $advance_file->post_id;
        $post = $repository->get_post_by_id($post_id);

        if(isset($post)) {
            download_file($post);
        } else {
            echo '<h2>Sorry! Invalid post!</h2>';
        }
    } else {
        echo '<h2>Sorry! Invalid url!</h2>';
    }
}

function download_file($post) {
    $fullPath = $post->guid;
    $site_url = get_site_url(); 
    $wpDir = ABSPATH; 
    $fullPath = str_replace($site_url . '/', $wpDir, $fullPath);
    if ($fd = fopen ($fullPath, "r")) {
        $fsize = filesize($fullPath);
        $path_parts = pathinfo($fullPath);
        $ext = strtolower($path_parts["extension"]);
        
        $mime_type = $post->post_mime_type;
        header("Content-type: " . $mime_type);
        header("Content-Disposition: attachment; filename=\"".$path_parts["basename"]."\""); // use 'attachment' to force a file download
        
        if ($mime_type == 'application/octet-stream') {
            header("Content-Disposition: filename=\"".$path_parts["basename"]."\"");
        }
        header("Content-length: $fsize");
        header("Cache-control: private"); //use this to open files directly
        while(!feof($fd)) {
             $buffer = fread($fd, 2048);
             echo $buffer;     }
    }
    fclose ($fd);
    exit;
}
