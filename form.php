<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    
<form action="secu.php" method="post" enctype="multipart/form-data" >
        <div>
            <label for="imageUpload">Upload an profile image</label>    
            <input type="file" name="avatar" id="imageUpload" />  
        </div>
        <div>
            <label for="lastname">Lastname</label>
            <input type="text" name="lastname" id="lastname">
        </div>
        <div>
            <label for="firstname">Firstname</label>
            <input type="text" name="firstname" id="firstname">
        </div>
        <div>
            <label for="birthday">Birthday</label>
            <input type="date" value="2000-01-01" name="birthday" id="birthday">
        </div>
        <button name="send">Send</button>
</form>
</body>
</html>