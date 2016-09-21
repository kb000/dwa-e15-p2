<?php

    require('wordlist.php');

$DEFAULT_WORD_COUNT = '4';
$MAX_WORD_COUNT = '16';

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

function getRandomNumber() {
    return rand(0,99);
}

function getRandomSymbol() {
    $SYMBOLS = ['!','@','#','$','?','.'];
    return $SYMBOLS[rand(0, count($SYMBOLS) -1)];
}

class GeneratorErrors {
    private $messages = [];
    /**
     * Adds a message to be reported back to the user.
     */
    public function add($message) {
        array_push($this->messages, $message);
    }

    /**
     * Gets the HTML representation of the error messages.
     */
    public function getHtml() {
        # TODO: Build bootstrap error panels.
        if(isset($this->messages) && count($this->messages) > 0) {
            print_r($this->messages);
        }
    }
}

$generatorErrors = new GeneratorErrors();
print_r($generatorErrors);

# Retrieve and parse wordCount.
$wordCount = getRequestEntry($KEY_WORD_COUNT, $DEFAULT_WORD_COUNT);
if (!($wordCount > 0)) { # NOTE: !(NAN > 0) ==> !(false) ==> true, don't change this!
    $wordCount = $DEFAULT_WORD_COUNT;
    $generatorErrors->add("Invalid word count specified. Using $DEFAULT_WORD_COUNT.");
} elseif ($wordCount > $MAX_WORD_COUNT) {
    $wordCount = $MAX_WORD_COUNT;
    $generatorErrors->add("Word count too large. Using $MAX_WORD_COUNT.");
}

# Retrieve and parse includes.
$includeNumber = (boolean) getRequestEntry($KEY_INCL_NUMBER, FALSE);
$includeSymbol = (boolean) getRequestEntry($KEY_INCL_SYMBOL, FALSE);

$wordSequence = getRandomWordAray($wordCount);

if (isset($_REQUEST['debug']) && $_REQUEST['debug'] == 'generator.php') {
    print_r($wordSequence);
}

if ($includeNumber) {
    $wordSequence[0] .= getRandomNumber();
}

$appendSymbol = '';
if ($includeSymbol) {
    $appendSymbol = getRandomSymbol();
}

if (isset($_REQUEST['debug']) && $_REQUEST['debug'] == 'generator.php') {
    print_r(getRandomSymbol());
}

# Variables to include in output.
$generatedPassword = implode($SEPARATOR, $wordSequence) . $appendSymbol;
$generatedWordCount = $wordCount;
$generatedDidIncludeNumber = $includeNumber;
$generatedDidIncludeSymbol = $includeSymbol;


/**
 * Utility function to make a checkbox checked string on true.
 */
function makeCheckboxCheck($checkedBoolean) {
    if ($checkedBoolean) {
        return 'checked="checked"';
    } else {
        return '';
    }
}
