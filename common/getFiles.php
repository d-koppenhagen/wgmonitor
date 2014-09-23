<?php

//$queryfolder = POST['folder'];
//$startpath = "../".$queryfolder;
//echo '<script>alert("'.$testvar.'")</script>';

$startpath = "../gallery";

function dirToArray($dir) {
    $contents = array();
    foreach (scandir($dir) as $node) {
        if ($node == '.' || $node == '..' || $node == '.DS_Store') continue;
        if (is_dir($dir . '/' . $node)) {
            $contents[$node] = dirToArray($dir . '/' . $node);
        } else {
            $contents[] = $node;
        }
    }
    return $contents;
}

$r = dirToArray($startpath);
print_r(json_encode($r));

/*
$paths = array('../gallery');
    sort($paths);
    $array = array();
    foreach ($paths as $path) {
      $path = trim($path, '/');
      $list = explode('/', $path);
      $n = count($list);

      $arrayRef = &$array; // start from the root
      for ($i = 0; $i < $n; $i++) {
        $key = $list[$i];
        $arrayRef = &$arrayRef[$key]; // index into the next level
      }
    }

    function buildUL($array, $prefix,$firstrun) {
        $c = count($array);
      foreach ($array as $key => $value) {
            $path_parts = pathinfo($key);
            if($path_parts['extension'] != '') {
                $extension = $path_parts['extension'];
            } else {
                $extension = 'folder';
            }
            if ($prefix == '') { //its a folder
                echo ' { "data":"'.$key.'"';
            } else { //its a file
                echo '{"data" : {"title":"'.$key.'"},"attr":{"href": "'.$prefix.$key.'","id": "1239"},
                "icon": "images\/'.$extension.'-icon.gif"';
            }
            // if the value is another array, recursively build the list$key
            if (is_array($value)) {
                echo ',"children" : [ ';
                buildUL($value, "$prefix$key/",false);
            }
            echo "}";
            $c = $c-1;
            if($c != 0) {
                echo ",";
            }
      } //end foreach
     if($firstrun != true)
      echo "]";
    }

    echo '{ "data" : [';
    buildUL($array, '',true);
    echo '] }';
*/
?>
