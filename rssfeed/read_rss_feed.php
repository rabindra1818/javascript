<?php

$content = file_get_contents("https://www.prameyanews7.com/feed/");
 
// Instantiate XML element
$a = new SimpleXMLElement($content);
     
echo "<ul>";
     
foreach($a->channel->item as $entry) {
//var_dump($entry);

echo "<li><a href='$entry->link' title='$entry->title'>" . $entry->title . "</a> <br> " . $entry->description."</li>";
}
    
echo "</ul>";

?>