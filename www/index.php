<!doctype html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <meta name="description" content="HTML5 Web Uploader">
  <title>HTML5 Web Uploader</title>
  <style>
    body {
      font-family: Helvetica, sans-serif;
    }

    h1 {
      padding: 1em;
      margin: auto;
      text-align: center;
    }

    #mydrop {
      width: 300px;
      height: 300px;
      border: 4px dashed blue;
      padding: 1em;
      margin: auto;
      text-align: center;
    }

    .dragover {
      box-shadow: #00f 0px 0px 8px 2px;
    }

  </style>
  <script src="./jquery-3.5.1.min.js"></script>
  <script src="./zeroupload.min.js"></script>
</head>

<body>
  <h1>HTML5 Web Uploader</h1>
  <div id="mydrop" onclick="ZeroUpload.chooseFiles();">
    <h2>
      myší sem přetáhni soubory, nebo klikni a&nbsp;vyber!
    </h2>
  </div>
  <br>
  <br>
  <div id="progress"></div>
  <br>
  <div id="results"></div>
  <script>
    $(document).ready(function () {
      ZeroUpload.setURL('upload.php');
      ZeroUpload.setMaxBytes(100 * 1024 * 1024); // 100 MB

      ZeroUpload.on('complete', function (response) {
        $('#results').html('<h2>Upload completed.</h2><pre>' + response.data + '</pre>');
      });

      ZeroUpload.on('start', function (files, userData) {
        $('#results').html('<h2>Upload has started.</h2>');
      });

      ZeroUpload.on('progress', function (progress, userData) {
        $('#progress').html(
          '<div><strong>Progress:</strong> ' + progress.percent + ', ' +
          progress.elapsedHuman + ' elapsed</div>' +
          '<div><strong>Sent:</strong> ' + progress.dataSentHuman + ' of ' +
          progress.dataTotalHuman + ' (' + progress.dataRateHuman + ')</div>' +
          '<div><strong>Remaining:</strong> ' + progress.remainingTimeHuman + '</div>'
        );
      });

      ZeroUpload.init();
      ZeroUpload.addDropTarget('#mydrop');
    });

  </script>
</body>

</html>