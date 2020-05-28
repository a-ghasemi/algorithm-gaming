<?php

//@error_reporting(E_ALL);

$content =<<<HTML
# heading
##heading
###   heading
####  heading
#####    heading
######heading
HTML;

$c = new MarkdownParser();
$c->addRule(new Header());
?>
<textarea><?php echo $c->render($content); ?></textarea>
