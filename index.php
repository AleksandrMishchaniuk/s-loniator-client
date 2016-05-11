<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Scloniator</title>
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <script src="js/jquery-2.1.4.min.js"></script>
    <script src="js/main-functions.js"></script>
    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
      <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->
  </head>
  <body>
    <h1 class="text-center">Scloniator</h1>
    <hr/> 
    <div class="container">
      <div class="row">
        <div class="col-md-4" style="margin-bottom: 20px;">
          <form action="app/scloniator.php" role="form" class="form_word">
            <div class="form-group">
              <label for="input_word">Введите слово</label>
              <input type="text" class="form-control" id="input_word" 
                        placeholder="Введите слово" name="word" autofocus>
            </div>
            <button type="submit" class="btn btn-primary">Просклонять</button>
          </form>
        </div>
        <div class="col-md-8">
          <textarea class="sclonenya form-control" style="min-height: 300px; resize: vertical;"></textarea>
        </div>
      </div>
    </div>
      
    <script src="js/bootstrap.min.js"></script>
  </body>
</html>