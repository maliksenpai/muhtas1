<?php
$content = file_get_contents($_COOKIE['api']);
$x = new SimpleXmlElement($content);
foreach($x->channel->item as $entry) {
    echo "<li><a href='$entry->link' title='$entry->title'>" . $entry->title . "</a></li>";
}
echo "</ul>";
?>