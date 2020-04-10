<?php

/*
putenv('LC_ALL=es_MX');
    setlocale(LC_ALL, 'es_MX');
    bindtextdomain('messages','./locale');
    bind_textdomain_codeset('messages', 'UTF-8');
    textdomain('messages');


echo gettext("Thu");
*/


?>

<?php
// Set language to German
/*
setlocale(LC_TIME, "");
putenv('LC_ALL=es_MX');
setlocale(LC_ALL, 'es_MX');

// Specify location of translation tables
bindtextdomain("messages", "./locale");

bind_textdomain_codeset('domain', "UTF-8");

// Choose domain
textdomain("messages");

// Translation is looking for in ./locale/es_MX/LC_MESSAGES/myPHPApp.mo now

// Print a test message
echo gettext("Thu");

echo "<br>";
// Or use the alias _() for gettext()
echo _("Thu");

echo "<br>";

var_dump(localeconv());
*/
?>

<?php
$locale = 'es';
$locale = "es_MX";

$domain = 'default';

$results = putenv("LC_ALL=$locale");
if (!$results) {
    exit ('putenv failed');
}

// http://msdn.microsoft.com/en-us/library/39cwe7zf%28v=vs.100%29.aspx
$results = setlocale(LC_ALL, $locale, 'spanish');
if (!$results) {
    exit ('setlocale failed: locale function is not available on this platform, or the given local does not exist in this environment');
}

$results = bindtextdomain($domain, "./locale");
echo 'new text domain is set: ' . $results. "\n";

$results = textdomain($domain);
echo 'current message domain is set: ' . $results. "\n";

$results = gettext("Female");
if ($results === "Thu") {
    echo "original English was returned. Something wrong\n";
}
echo $results . "\n";

var_dump(localeconv());