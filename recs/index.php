<?php
header("Content-type:text/html;charset=UTF-8");
    $host = 'http';
    $port = intval($_SERVER['SERVER_PORT']);
    if(isset($_SERVER['HTTPS'])){
        $host .= 's';
        if($port === getservbyname('https', 'tcp')) $port = 0;
    }else{
        if($port === getservbyname('http', 'tcp'))  $port = 0;
    }
    $host .= '://'.$_SERVER['SERVER_NAME'];
    if($port) $host .= ':'.$port;
    $base = $host.str_replace('index.php', '', $_SERVER['PHP_SELF']);
    ob_start();

?>
<!DOCTYPE HTML>
<html lang="ja">
    <head>
        <title>リプレイ解析</title>
        <meta http-equiv="Content-Language" content="ja" />
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
        <link rel="stylesheet" type="text/css" href="<?php echo $base; ?>style.css" media="screen" />
        <link href="<?php echo $base; ?>/bootstrap.min.css" rel="stylesheet" media="screen" />
        <link href="<?php echo $base; ?>/custom.css" rel="stylesheet" media="screen" />
        <script type="text/javascript" src="<?php echo $base; ?>jscript.js"></script>
        <script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/2.0.3/jquery.min.js"></script>
        <script type="text/javascript" src="<?php echo $base; ?>bootstrap.min.js"></script>
        <script type="text/javascript" src="<?php echo $base; ?>custom.js"></script>
        <base href="<?php echo $base; ?>" target="">
    </head>
    <body>
	<div id="deletable">
		<form action='' method='post' enctype='multipart/form-data'>
		    <div class='form-group'>
		        <label for='file' class='col-sm-2 control-label'>リプレイファイル:</label>
			<div class='col-sm-9'>	
		            <input type='file' name='file' id='file' class='btn btn-default' size='40' />
			    <p style='color:red' class='help-block'>リプレイファイルは【ZIP】でアップロードしてください。</p>
			</div>
		    </div>
		    <div class='form-group'>
			<div class='col-sm-2 control-label'></div>
			<div class='col-sm-9'>
		            <input type='submit' name='submit' class='btn btn-primary' value='アップロード' />
			</div>
		    </div>
	        </form>
	        <br />
	</div>
    </body>
</html>
<?php
require_once('common.php');

if (isset($_POST['submit']) && false != ($fileName = upload())) {

    // file was uploaded successfully, now we can try to analyze it
    require_once('RecAnalystView.php');

    $recAnalystView = new RecAnalystView();
    $recAnalystView->maxGames = 5; // analyze at most five (first) games in archive
    $recAnalystView->fileName = $fileName;
    if (isset($_GET['gamelog_id'])) {
        $gamelog_id = $_GET['gamelog_id'];
    } else {
        $gamelog_id = null;
    }

    try {
        $recAnalystView->analyze();
    	echo "<script language=javascript>$('#deletable').html('')</script>";
    	// set file max number for replay upload
    	$file_number = 1;
    	$data_dir = str_replace('/application/modules/default', '', dirname (dirname(__FILE__))) . '/data/replay/';
    	foreach (glob($data_dir."*.html") as $filename) {
		  $file_number++;
	   }

        echo $recAnalystView;
    	$uploaded_path = '../data/replay/';
        $path = $uploaded_path.$file_number.'.html';
    } catch (Exception $e) {
        echo "<p style='color:red' class='help-block'>Caught exception: ", $e->getMessage(), "\n</p>";
    }
    
    
    if(empty($path)){
        echo "<p style='color:red' class='help-block'>";
	   ob_end_flush();
	   echo "</p>";
    }else{
        file_put_contents($path, ob_get_contents(), LOCK_EX);
    	// update gamelog
    	try{
    	    if (!is_null($gamelog_id)) {    
        		$pdo = new PDO('mysql:host=localhost;dbname=aochd;charset=utf8', 'aochd', 'I1ghyBDkfyj2', array(PDO::ATTR_EMULATE_PREPARES => false));
        		$sql = "UPDATE gamelog SET replay_id = :replay_id WHERE gamelog_id = :gamelog_id";
        		$stmt = $pdo->prepare($sql);
        
        		$stmt->bindvalue(':replay_id', $file_number, PDO::PARAM_INT);
        		$stmt->bindvalue(':gamelog_id', $gamelog_id, PDO::PARAM_INT);
        		$stmt->execute();
    	    } else {
    	        header('Location: '.$host.str_replace('..', '', $path));
    	    }
    	        
    	}catch (PDOException $e){
    		print('Error:'.$e->getMessage());
    		$pdo = null;
    	}
    	
    }
    
    header('Location: '.$path);
} 
