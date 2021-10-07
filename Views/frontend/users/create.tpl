<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Create User</title>
    <!-- Latest compiled and minified CSS -->
    <link rel="stylesheet" href="//netdna.bootstrapcdn.com/bootstrap/3.3.4/css/bootstrap.min.css">
    
</head>
<body>
<br>
<div class="container">
    <nav class="navbar navbar-inverse">
        <div class="navbar-header">
            <a class="navbar-brand" href="/mvcproject/index.php?controller=user">List all</a>
        </div>

    </nav>
</div>
<h2>Create user</h2>
<form action="/mvcproject/index.php?controller=user&action=store" method= "post">
  <div class="form-group">
    <label for="user_name">Username:</label>
    <input type="text" class="form-control" name="user_name">
  </div>
  <div class="form-group">
    <label for="pw">Password:</label>
    <input type="password" class="form-control" name="pw">
  </div>
  <div class="form-group">
    <label for="level">Level:</label>
    <input type="number" class="form-control" name="level">
  </div>
  <button type="submit" class="btn btn-default">Submit</button>
</form>
</body>

</html>