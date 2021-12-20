<?php

/**
 * Lets You Create A DB Connection With PDO
 *
 * @return PDO Database Connection Object
 */
function getDB(): PDO
{
    $host = "localhost:3306";
    $user  ="root";
    $pass = "";
    $db_name = "edusystem";
    $db = new PDO("mysql:host=$host;dbname=$db_name;charset=utf8mb4", $user, $pass);
    $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    return $db;
}

/**
 * Closes Active PDO Database Connection
 *
 * @param PDO $c Active Database Connection
 */
function closeDB(PDO $c)
{
    $c = null;
}

/**
 * Query With 1 Result
 *
 * @param $sqlQuery SQL Query
 * @param array $params List Of Parameters As (KEY -> VALUE) Array
 * @param PDO $c PDO Database Connection
 * @return array 1 Row Data As Array (KEY -> VALUE)
 */
function qW1R(string $sqlQuery, $params = array(), PDO $c) : array
{
    try
    {
        $query = $c->prepare($sqlQuery);
        $query->execute($params);
        $result = $query->fetch(PDO::FETCH_ASSOC);

        return $result;
    }
    catch (Exception $ex)
    {
        dbError($sqlQuery, $params, $ex);
    }
}

/**
 * Query With Multi Result
 *
 * @param string $sqlQuery SQL Query
 * @param array $params List Of Parameters As (KEY -> VALUE) Array
 * @param PDO $c PDO Database Connection
 * @return array N Row Data As Array( Array(KEY -> VALUE), Array(KEY -> VALUE), ... )
 */
function qWMR(string $sqlQuery, $params = array(), PDO $c) :array
{
    try {
        $query = $c->prepare($sqlQuery);
        $query->execute($params);
        $result = $query->fetchAll(PDO::FETCH_ASSOC);
        return $result;
    } catch (Exception $ex) {
        dbError($sqlQuery, $params, $ex);
    }
}

/**
 * Query With No Result
 *
 * @param string $sqlQuery SQL Query
 * @param array $params List Of Parameters As (KEY -> VALUE) Array
 * @param PDO $c PDO Database Connection
 * @return bool True As Confirmation
 */
function qWNR(string $sqlQuery, $params = array(), PDO $c) : bool
{
    try
    {
        $query = $c->prepare($sqlQuery);
        $result = $query->execute($params);

        return $result;
    } catch (Exception $ex)
    {
        dbError($sqlQuery, $params, $ex);
    }
}

/**
 * Prints PDO Database Exception
 *
 * @param $sqlQuery SQL Query
 * @param array $params Values Binded To SQL Query As Array(KEY -> VALUE)
 * @param Exception $ex Exception Object
 */
function dbError($sqlQuery, $params = array(), Exception $ex)
{

    echo "<pre>";
    $data = array
    (
        'File' => $ex->getFile(),
        'Line' => $ex->getLine(),
        'Code' => $ex->getCode(),
        'Message' => $ex->getMessage(),
        'SQL' => $sqlQuery,
        'Params' => print_r($params, true)
    );
    print_r($data);
    echo "</pre>";
}


/**
 * Returns Extension Of File Name
 *
 * @param $fileName File Name
 * @return string Extension (lowercase)
 */
function getFileExtension($fileName) : string
{
    return strtolower(pathinfo($fileName, PATHINFO_EXTENSION));
}

/**
 * Creates A Random File Name With The Same Extension
 *
 * @param $fileName Original File Name
 * @return string Random File Name With Original File Name's Extension
 */
function getRandomFileName($fileName) : string
{
    $fileType = getFileExtension($fileName);
    $newFileName = md5(uniqid(mt_rand(), true)) . "." . $fileType;
    return $newFileName;
}

/**
 * Saves A File With Random File Name And Returns New File Path
 *
 * @param $FILE File Array Element
 * @param $folder Destination Folder
 * @return string Newly Created File Name
 */
function saveFile($FILE, $folder) : string
{
    //$folder = "uploads/";
    $fPath = "";
    if ($FILE['size'] != "")
    {
        $dosyaAdi = getRandomFileName(basename($FILE["name"]));
        $fPath = $folder . $dosyaAdi;
         move_uploaded_file($FILE['tmp_name'], $fPath);
    }
    return $fPath;
}
/**
 * Saves A File With Random File Name And Returns New File Path
 * Use This Only From Mobile PHP
 *
 * @param $FILE File Array Element
 * @param $folder Destination Folder
 * @return string Newly Created File Name
 */
function saveFileFromRoot($FILE, $folder) : string
{
    $folder = "uploads/$folder/";
    $fPath = "";
    if ($FILE['size'] != "")
    {
        $dosyaAdi = getRandomFileName(basename($FILE["name"]));
        $fPath = $folder ."/". $dosyaAdi;
        move_uploaded_file($FILE['tmp_name'], $fPath);
    }
    return $fPath;
}


/**
 * Prints $_POST Data As Formatted As PHP Array
 */
function outPOST()
{
    echo '<pre>' . print_r($_POST, true) . '</pre>';
}

/**
 * Prints $_SESSION Data As Formatted As PHP Array
 */
function outSESSION()
{
    echo '<pre>' . print_r($_SESSION, true) . '</pre>';
}

/**
 * Prints $_GET Data As Formatted As PHP Array
 */
function outGET()
{
    echo '<pre>' . print_r($_GET, true) . '</pre>';
}

/**
 * Prints $_FILES Data As Formatted As PHP Array
 */
function outFILES()
{
    echo '<pre>' . print_r($_FILES, true) . '</pre>';
}

/**
 * Prints $data Content As Formatted As PHP Array
 * @param $data mixed Content
 */
function outDATA($data)
{
    echo '<pre>' . print_r($data, true) . '</pre>';
}

/**
 * Returns Value Of The Key Which Contains In $_POST, If There's No Key Value, Returns NAN
 *
 * @param string $op key Name
 * @return string $_POST['key'] value
 */
function p(string $op)  : string
{
    return isset($_POST[$op]) ? $_POST[$op] : "NAN";
}

/**
 * Returns Value Of The Key Which Contains In $_GET, If There's No Key Value, Returns NAN
 *
 * @param string $op key Name
 * @return string $_GET['key'] value
 */
function g(string $op) : string
{
    return isset($_GET[$op]) ? $_GET[$op] : "NAN";
}

/**
 * Returns Value Of The Key Which Contains In $_SESSION, If There's No Key Value, Returns NAN
 *
 * @param string $op key Name
 * @return string $_SESSION['key'] value
 */
function s(string $op) : string
{
    return isset($_SESSION[$op]) ? $_SESSION[$op] : "NAN";
}

/**
 * Returns Value Of The Key Which Contains In $_FILES, If There's No Key Value, Returns NAN
 *
 * @param string $op key Name
 * @return string $_FILES['key'] value
 */
function f(string $op) : mixed
{
    return ($_FILES[$op]['size'] != "") ? $_FILES[$op] : "NAN";
}

/**
 * Go To A Page Name
 *
 * @param string $pageName Destination Page Name (For Example exit.php)
 */
function go(string $pageName)
{
    header('Location: ' . $pageName);
}

/**
 * Converts A JSON String To A PHP Array
 *
 * @param string $json JSON Content
 * @return array PHP Array Which Contains (KEY -> VALUE)
 */
function toArr(string $json) : array
{
    $arr = json_decode($json, true);
    return $arr;
}

/**
 * Convert PHP Array To JSON
 *
 * @param array $arr PHP Array Contains (KEY -> VALUE)
 * @param bool $setHeader If True, JSON Content Type Header Will Be Added to Output
 * @param bool $return If False, JSON String Will Be Printed, Else, JSON String Will Be Returned
 * @return string If Return Is True, JSON String Will Be Returned, Else, Empty Strng Will Be Returned
 */
function toJSON(array $arr, bool $setHeader = true, bool $return = false) : string
{
    if ($setHeader)
    {
        header("Content-Type: application/json");
    }
    if (!$return)
    {
        echo json_encode($arr, JSON_UNESCAPED_UNICODE | JSON_PRETTY_PRINT);
        return "";
    }
    else
    {
        $jsonStr = json_encode($arr, JSON_UNESCAPED_UNICODE | JSON_PRETTY_PRINT);
        //header("Content-Length:".strlen($jsonStr));
        return $jsonStr;
    }

}


/**
 * Send E-Mail. Do Not Forget To Edit Credentials And PHPMailer Library Path
 *
 * @param $toWho Destination Address
 * @param $title Mail Title
 * @param $msg Mail Content
 * @return int Sent Status (If Got 1, It Means, Mail Send Successfully)
 */
function sendMail($toWho, $title, $msg) : int
{
    $php_mailer_path = "./Mailer";

    $mail_host          = "smtp.yandex.ru";
    $mail_port          = "587";
    $mail_cert_type     = "ssl";
    $mail_sender_name   = "Spell me";
    $mail_sender_user   = "market.lojistik@yandex.com";
    $mail_sender_pass   = "MLSerkan1453!";

    require_once $php_mailer_path.'/PHPMailer.php';
    require_once $php_mailer_path.'/Exception.php';
    require_once $php_mailer_path.'/SMTP.php';
    require_once $php_mailer_path.'/OAuth.php';

    $mail = new \PHPMailer\PHPMailer\PHPMailer(true);

    $mail->CharSet = 'UTF-8';
    $mail->setFrom($mail_sender_user, $mail_sender_name);
    $mail->addAddress($toWho);
    $mail->Subject = $title;
    $mail->Body = $msg;
    $mail->isHTML(true);

    $mail->isSMTP();
    $mail->Host = $mail_host;
    $mail->SMTPAuth = TRUE;

    $mail->Username = $mail_sender_user;
    $mail->Password = $mail_sender_pass;
    $mail->Port = $mail_port;


    return $mail->send();
}

/**
 * Append Custom Log To File As A Simple HTML Table.<br><br>
 * Log Will Include Log Type, Php File, Call Function, Title And Details<br>
 * <br>
 * Types : [E]rror, [W]arning, [D]ebug, [I]nfo, [V]erbose<br>
 *<br>
 * You Can Change Log Folder And Log File Name By Modifying Function<br>
 *
 * @param string $type Empty String, E, W, D, I, V
 * @param string $phpFile For Example : index.php@112
 * @param string $function If Log Is Added From A Function Type Function Name, Else Type Page Or Main
 * @param string $title Give A Title
 * @param string $details Give Detailed Description (Text, HTML, Formatted PHP Array or Formatted JSON)
 */
function logger(string $type = "", string $phpFile = "Undefined", string $function = "Undefined", string $title = "Undefined", string $details = "")
{
    $now = date("Y-m-d");
    $folderName = "logs";
    $nowTime = date("Y-m-d H:i:s");
    $fileName = $folderName."/".$now.".html";

    $divId = md5(uniqid(mt_rand(), true));

    if ($type == "")        $type = "V";
    if ($type == "E")       $type = "<span style='font-weight:bold;color:red'>ERROR</span>";
    if ($type == "D")       $type = "<span style='font-weight:bold;color:#0000ff'>DEBUG</span>";
    if ($type == "I")       $type = "<span style='font-weight:bold;color:#00be00'>INFO</span>";
    if ($type == "W")       $type = "<span style='font-weight:bold;color:#ffb50a'>WARNING</span>";
    if ($type == "V")       $type = "<span style='font-weight:bold;color:#000000'>VERBOSE</span>";
    if ($phpFile == "")     $phpFile = "<span style='font-weight:bold;color:red'>Undefined</span>";
    if ($function == "")    $function = "<span style='font-weight:bold;color:red'>Undefined</span>";
    if ($title == "")       $title = "<span style='font-weight:bold;color:red'>Undefined</span>";

    if (!file_exists($folderName))
    {
        mkdir("logs",0777);
        chmod($folderName, 0777);
    }

    $fp = fopen($fileName, 'a');
    $str = "<div style='padding:10px;margin-bottom:30px'>";
    $str .= "<table border='1' style='margin-bottom:10px;border-collapse: collapse;' cellpadding='10' width='100%'>";
    $str .= "<tr>";
    $str .= "<th style='background: #949494; color:white; width:20%;text-align:center'>Type</th>";
    $str .= "<th style='background: #949494; color:white; width:20%;text-align:center'>Date</th>";
    $str .= "<th style='background: #949494; color:white;width:20%;text-align:center'>PHP File</th>";
    $str .= "<th style='background: #949494; color:white;width:20%;text-align:center'>Function Name</th>";
    $str .= "<th style='background: #949494; color:white;width:20%;text-align:center'>Error Title</th>";
    $str .= "</tr>";
    $str .= "<tr>";
    $str .= "<td style='width:20%;text-align:center'>$type</td>";
    $str .= "<td style='width:20%;text-align:center'>$nowTime</td>";
    $str .= "<td style='width:20%;text-align:center'>$phpFile</td>";
    $str .= "<td style='width:20%;text-align:center'>$function</td>";
    $str .= "<td style='width:20%;text-align:center'>$title</td>";
    $str .= "</tr>";
    if ($details != "")
    {
        $str .= "<tr id='$divId' style='display:none'>";
        $str .= "<td colspan='5' style='background: #f1f1f1'>$details</td>";
        $str .= "</tr>";
    }
    $str .= "</table>";
    if ($details != "")
    {
        $str .= "<div style='float:right'><button onclick='show$divId();'>SHOW DETAILS</button>&nbsp;&nbsp;<button onclick='hide$divId();'>HIDE DETAILS</button></div>";
        $str .= "<script>";
        $str .= "function show$divId()\n";
        $str .= "{\n";
        $str .= "var x = document.getElementById(\"$divId\");\n";
        $str .= "x.style.display='';\n";
        $str .= "}\n\n";
        $str .= "function hide$divId()\n";
        $str .= "{\n";
        $str .= "var x = document.getElementById(\"$divId\");\n";
        $str .= "x.style.display='none';\n";
        $str .= "}\n";
        $str .= "</script>";
    }
    $str .= "</div>";


    fwrite($fp, $str);
    fclose($fp);
}
