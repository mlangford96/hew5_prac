<!DOCTYPE html>
    <title> Profile </title>
    <link rel="stylesheet" href = "../css/common.css" />
    <link rel="stylesheet" href = "../css/profile_page.css" />
    <link href="fonts/Roboto" rel="font">
    
    <?php
        error_reporting(E_ALL);
        require_once "common.php";
        $email = $_GET['email'];
        $conn = connect_to_database();
        $query = $conn->prepare("SELECT * FROM profiles WHERE EMAIL = ?");
        $query->execute(array($email));
        $profile = $query->fetch(PDO::FETCH_ASSOC);
    ?>
    <header>
        <h1 class = "text"> Online Researcher Profiles </h1>
    </header>

    <nav>
        <a class = "nav-button" href = "../index.html"> Home </a>
        <a class = "nav-button" href = "search.php"> Search Profiles </a>        
        <a class = "nav-button" href = "../help.html"> Help </a>
    </nav>

    <main>
        <div id = main-content>
            <div id = "profile-pane">
                <img src = <?php echo "../profile_pictures/".$email."/".$profile['PROFILEPIC'] ?>>
            </div>

            <div id = "info-pane">
                <h2> <?php echo $profile['FIRSTNAME'] ." ". $profile['LASTNAME']; ?> </h2>
                <p id = "job-title"> <?php echo $profile['JOBTITLE']; ?> </p>
                <p id = "email"> <?php echo $profile['EMAIL']; ?> </p>
                <h3> Biography </h3>
                <p id = "bio"> <?php echo $profile['BIO']; ?> </p>
            </div>            
        </div>

        <footer>
            <p class = "text" > Created by Matthew Langford 2017. </p>
        </footer>
    </main>
</html>
