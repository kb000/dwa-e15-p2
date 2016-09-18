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
            <div class="row" />
                <div class="col-xs-8 col-xs-offset-2">
                    <div class="panel">
                        <?php echo $generatedPassword; ?>
                    </div>
                </div>
            </div>
            <div id="options-form panel">
                <form class="form-horizontal">
                    <div class="form-group">
                        <!-- Number of words -->
                        <label for="requestedWordCountInput">Number of words:</label>
                        <input type="number" class="form-control" id="requestedWordCountInput" min="1" value="4" max="16" step="1">
                    </div>
                    <div class="form-group">
                        <!-- Include a number? -->
                        <label for="requestedIncludeANumber">Include a Number?</label>
                        <input type="checkbox" class="form-control" id="requestedIncludeANumber">
                    </div>
                    <div class="form-group">
                        <!-- Include special symbols? -->
                        <label for="requestedIncludeSymbols">Include special symbols?</label>
                        <input type="checkbox" class="form-control" id="requestedIncludeSymbols">
                    </div>
                    <div class="form-group">

                </form>
            </div>
        </div>
    </div>
    <script src="script/jquery-3.1.0.slim.js"></script>
    <script src="script/bootstrap.js"></script>
</body>

</html>