<?php

class Person
{
    private $name, $email, $password, $profilePicture;

    function __construct()
    {
    }

    public function setName($name)
    {
        $this->name = $name;
    }
    public function getName()
    {
        return $this->name;
    }

    public function setEmail($email)
    {
        $this->email = $email;
    }
    public function getEmail()
    {
        return $this->email;
    }

    public function setPassword($password)
    {
        $this->password = $password;
    }

    public function getPassword()
    {
        return $this->password;
    }

    public function setProfilePicture($profilePicture)
    {
        $this->profilePicture = $profilePicture;
    }

    public function getProfilePicture()
    {
        return $this->profilePicture;
    }
}

$person = new Person();

function checkEmail($email)
{
    $find1 = strpos($email, '@');
    $find2 = strpos($email, '.');
    return ($find1 !== false && $find2 !== false && $find2 > $find1);
}


[$name, $email, $password, $profilePicture] = [$_POST['name'], $_POST['email'], $_POST['password'], $_FILES["profilePicture"]["name"]];

if (isset($name) && !empty($name)) {
    $person->setName($name);
} else {
    echo "Name not set. <br>";
}
if (isset($email) && !empty($email)) {
    if (!checkEmail($email)) {
        echo "Not a valid email address. <br>";
    } else {
        $person->setEmail($email);
    }
} else {
    echo "Email not set. <br>";
}
if (isset($password) && !empty($password)) {
    $person->setPassword($password);
} else {
    echo "Password not set. <br>";
}

if (isset($profilePicture) && !empty($profilePicture)) {
    $person->setProfilePicture($profilePicture);
} else {
    echo " Profile picture not set. <br>";
}



$targetDir = "uploads/";
$fileName = uniqid() . "-" . date('Y-m-d_H-i-s') . "-" . basename($_FILES["profilePicture"]["name"]);
  $targetFile = $targetDir . $fileName;
  $uploadOk = 1;
  $fileType = strtolower(pathinfo($targetFile,PATHINFO_EXTENSION));

  // Check if file already exists
  if (file_exists($targetFile)) {
    echo "Sorry, file already exists.";
    $uploadOk = 0;
  }


  // Allow certain file formats
  if($fileType != "jpg" && $fileType != "png" && $fileType != "jpeg"
  && $fileType != "gif" ) {
    echo "Sorry, only JPG, JPEG, PNG & GIF files are allowed.";
    $uploadOk = 0;
  }

  // Check if $uploadOk is set to 0 by an error
  if ($uploadOk == 0) {
    echo "Sorry, your file was not uploaded.";
  // if everything is ok, try to upload file
  } else {
    if (move_uploaded_file($_FILES["profilePicture"]["tmp_name"], $targetFile)) {
      echo "The file ". htmlspecialchars( basename( $_FILES["profilePicture"]["name"])). " has been uploaded.";
    } else {
      echo "Sorry, there was an error uploading your file.";
    }
  }

  $personData = [
    $person->getName(),
    $person->getEmail(),
    $fileName
  ];

  if(!file_exists('users.csv')){
    $fp = fopen('users.csv', 'w+');

    fputcsv($fp, $personData);
    fclose($fp);
  } else{
    $fp = fopen('users.csv', 'a');

    fputcsv($fp, $personData);
    fclose($fp);
  }

  // Start the session
session_start();
$_SESSION["userName"] = $person->getName();

header('Location: display.php');
