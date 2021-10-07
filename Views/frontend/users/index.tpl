<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- Latest compiled and minified CSS -->
    <link rel="stylesheet" href="//netdna.bootstrapcdn.com/bootstrap/3.3.4/css/bootstrap.min.css">
    

    <title>Users</title>
</head>
<body>
    <br>
    <div class= "container">
        <nav class="navbar navbar-inverse">
            <div class="navbar-header">
                <a class="navbar-brand" href="/mvcproject/index.php?controller=user">List all</a>
            </div>
            <ul class="nav navbar-nav">
                <li><a href="/mvcproject/index.php?controller=user&action=createForm">Create a user</a>

            </ul>
        </nav>      
        <table class ="table table-hover">
                <thead>
                    <tr>
                        <th>id</th>
                        <th>username</th>
                        <th>level</th>
                        <th>action</th>
                        
                    </tr>
                </thead>
                <tbody>
                {foreach $users as $user}
                    <tr>
                        <td>{$user.id}</td>
                        <td>{$user.username}</td>
                        <td>{$user.level}</td>
                        <td>
                            <a href="/mvcproject/index.php?controller=user&action=updateForm&id={$user.id}" class="btn">edit</a>
                            <a href="/mvcproject/index.php?controller=user&action=delete&id={$user.id}" class="btn">delete</a>
                        </td>
                    </tr>
                {/foreach}  
                </tbody>
            </table>
    </div>
</body>
</html>




