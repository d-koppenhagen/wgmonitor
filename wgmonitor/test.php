<?PHP

$dirlist = getFileList("./gallery", tue);


  // output file list in HTML TABLE format
  echo "<table border=\"1\">\n";
  echo "<thead>\n";
  echo "<tr><th>Name</th><th>Type</th><th>Size</th><th>Last Modified</th></tr>\n";
  echo "</thead>\n";
  echo "<tbody>\n";
  foreach($dirlist as $file) {
    echo "<tr>\n";
    echo "<td>{$file['name']}</td>\n";
    echo "<td>{$file['type']}</td>\n";
    echo "<td>{$file['size']}</td>\n";
    echo "<td>",date('r', $file['lastmod']),"</td>\n";
    echo "</tr>\n";
  }
  echo "</tbody>\n";
  echo "</table>\n\n";
?>

<?PHP
  // Original PHP code by Chirp Internet: www.chirp.com.au
  // Please acknowledge use of this code by including this header.

  function getFileList($dir, $recurse=false, $depth=false)
  {
    $retval = array();

    // add trailing slash if missing
    if(substr($dir, -1) != "/") $dir .= "/";

    // open pointer to directory and read list of files
    $d = @dir($dir) or die("getFileList: Failed opening directory $dir for reading");
    while(false !== ($entry = $d->read())) {
      // skip hidden files
      if($entry[0] == ".") continue;
      if(is_dir("$dir$entry")) {
        $retval[] = array(
          "name" => "$dir$entry/",
          "type" => filetype("$dir$entry"),
          "size" => 0,
          "lastmod" => filemtime("$dir$entry")
        );
        if($recurse && is_readable("$dir$entry/")) {
          if($depth === false) {
            $retval = array_merge($retval, getFileList("$dir$entry/", true));
          } elseif($depth > 0) {
            $retval = array_merge($retval, getFileList("$dir$entry/", true, $depth-1));
          }
        }
      } elseif(is_readable("$dir$entry")) {
        $retval[] = array(
          "name" => "$dir$entry",
          "type" => mime_content_type("$dir$entry"),
          "size" => filesize("$dir$entry"),
          "lastmod" => filemtime("$dir$entry")
        );
      }
    }
    $d->close();

    return $retval;
  }
?>