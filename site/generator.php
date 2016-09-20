<?php

    require('wordlist.php');

$DEFAULT_WORD_COUNT = '4';

$KEY_WORD_COUNT = 'words';
$KEY_INCL_NUMBER = 'useNumber';
$KEY_INCL_SYMBOL = 'useSymbol';

$SEPARATOR = '-';

/**
 * Safely retrieves or defaults an entry from the $_REQUEST array.
 * @param string $entryName The key of the entry to retrieve.
 * @param string $defaultValue: The value to return if the entry is not present in $_REQUEST;
 * @return string The entry from $_REQUEST, if present, or the $defaultValue.
 */
function getRequestEntry($entryName, $defaultValue = NULL) {
    if(isset($_REQUEST[$entryName])) {
        return $_REQUEST[$entryName];
    }
    return $defaultValue;
}

/**
 * Gets an array of random words.
 * @param int $count The number of words to retrieve.
 * @return string[$count] Randomly fetched english words. 
 */
function getRandomWordAray($count) {
    global $WORDLIST;
    $selected = [];
    for($i=0; $i<$count; $i++) {
        $j = rand(1, count($WORDLIST)) - 1;
        $selected[$i] = $WORDLIST[$j];
    }

    return $selected;
}

# Retrieve and parse wordCount.
$wordCount = getRequestEntry($KEY_WORD_COUNT, $DEFAULT_WORD_COUNT);
if(!($wordCount > 0)) { # NOTE: !(NAN > 0) ==> !(false) ==> true, don't change this!
    $wordCount = $DEFAULT_WORD_COUNT;
    $GeneratorErrors.Add("Invalid word count specified. Using $DEFAULT_WORD_COUNT.");
}

# Retrieve and parse includes.
$includeNumber = (boolean) getRequestEntry($KEY_INCL_NUMBER, FALSE);
$includeSymbol = (boolean) getRequestEntry($KEY_INCL_SYMBOL, FALSE);

$wordSequence = getRandomWordAray($wordCount);

if(isset($_REQUEST['debug']) && $_REQUEST['debug'] == 'generator.php') {
    print_r($wordSequence);
}

# Variables to include in output.
$generatedPassword = implode($SEPARATOR, $wordSequence);
$generatedWordCount = $wordCount;
$generatedDidIncludeNumber = $includeNumber;
$generatedDidIncludeSymbol = $includeSymbol;


function makeCheckboxCheck($checkedBoolean) {
    if ($checkedBoolean) {
        return 'checked="checked"';
    } else {
        return '';
    }
}
