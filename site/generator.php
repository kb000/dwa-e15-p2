<?php

$DEFAULT_WORD_COUNT = '4';

$KEY_WORD_COUNT = 'words';
$KEY_INCL_NUMBER = 'useNumber';
$KEY_INCL_SYMBOL = 'useSymbol';

$SEPARATORS = [' ', '-'];

#
# Safely retrieves or defaults an entry from the $_REQUEST array.
#
function getRequestEntry($entryName, $defaultValue = NULL) {
    if(isset($_REQUEST[$entryName])) {
        return $_REQUEST[$entryName];
    }
    return $defaultValue;
}

# Retrieve and parse wordCount.
$wordCount = getRequestEntry($KEY_WORD_COUNT, $DEFAULT_WORD_COUNT);
if(!($wordCount > 0)) { # NOTE: !(NAN > 0) ==> !(false) ==> true, don't change this!
    $wordCount = $DEFAULT_WORD_COUNT;
    $GeneratorErrors.Add("Invalid word count specified. Using $DEFAULT_WORD_COUNT.");
}

# TODO: retrieve and parse booleans.

# Static stubs
$generatedPassword = "this-is-an-example";
$generatedWordCount = 4;
$generatedDidIncludeNumber = false;
$generatedDidIncludeSymbol = false;


function makeCheckboxCheck($checkedBoolean) {
    if ($checkedBoolean) {
        return 'checked="checked"';
    } else {
        return '';
    }
}
