<?php
    require('generator.php');
?><!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Passphrase Generator</title>
    <link rel="stylesheet" href="css/bootstrap.css" />
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Roboto+Slab" />
    <link rel="stylesheet" href="css/style.css" />
</head>

<body>
    <div class="content-wrapper">
        <div class="content container">
            <h1>Passphrase Generator</h1>
            <div class="alert-container"><?php echo $generatorAlerts; ?></div>
            <div class="password-panel row panel">
            Your randomly generated passphrase:
            <div class="password-display row h2">
                <?php echo $generatedPassword; ?>
            </div>
            <!-- TODO: Maybe add a refresh button here to use ajax to regenerate without changing options? -->
            </div>
            
            <div class="row">
                <div class="col-sm-8 col-sm-offset-2 col-xs-10 col-xs-offset-1">
                    <form class="form-horizontal" method="get">
                        <fieldset>
                            <legend>Generation Options</legend>
                            <div class="form-group">
                                <!-- Number of words -->
                                <label class="col-xs-4 control-label" for="requestedWordCountInput">Number of words:</label>
                                <div class="col-xs-4"/>
                                    <input class="form-control" name="<?= $KEY_WORD_COUNT ?>" type="number" id="requestedWordCountInput" min="1" value="<?php echo $generatedWordCount; ?>" max="16" step="1">
                                </div>
                            </div>
                            <div class="form-group">
                                <!-- Include a number? -->
                                <label class="col-xs-4 control-label" for="requestedIncludes">Include:</label>
                                <div class="col-xs-4"/>
                                    <div class="checkbox">
                                        <label for="requestedIncludesNumberInput">
                                            <input name="<?= $KEY_INCL_NUMBER ?>" type="checkbox" id="requestedIncludesNumberInput" <?php echo makeCheckboxCheck($generatedDidIncludeNumber); ?>>
                                            Number
                                        </label>
                                    </div>
                                    <!-- Include special symbols? -->
                                    <div class="checkbox">
                                        <label for="requestedIncludesSymbolInput">
                                            <input name="<?= $KEY_INCL_SYMBOL ?>" type="checkbox" id="requestedIncludesSymbolInput" <?php echo makeCheckboxCheck($generatedDidIncludeSymbol); ?>>
                                            Symbol
                                        </label>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="col-xs-4 col-xs-offset-4">
                                    <button class="btn btn-primary">Generate</input>
                                </div>
                            </div>
                        </fieldset>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <script src="script/jquery-3.1.0.slim.js"></script>
    <script src="script/bootstrap.js"></script>
</body>

</html>