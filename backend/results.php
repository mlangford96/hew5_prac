<!DOCTYPE html>
    <title> Profile </title>
    <link rel="stylesheet" href = "../css/common.css" />
    <link rel="stylesheet" href = "../css/results.css" />
    <link rel="stylesheet" href = "../css/search.css" />
    <link href="fonts/Roboto" rel="font">
    
    <?php
        require_once "common.php";
        $search = $_POST['search'];
        $conn = connect_to_database();
        $query = $conn->prepare("SELECT * FROM profiles WHERE EMAIL LIKE ? OR FIRSTNAME LIKE ? OR LASTNAME LIKE ?");
        $query->execute(array($search, $search, $search));
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
            <form action = "results.php" method = "POST">
                <input type="text" name="search" placeholder = "Search by firstname, lastname or email">
                <input class = "submit" type="submit" value = "Search">
            </form>

            <table>
            <?php
            $count = 0;
            while ($profile = $query->fetch(PDO::FETCH_ASSOC)) {
                echo "<tr> <td>".$profile['FIRSTNAME']."</td>";
                echo "<td>".$profile['LASTNAME']."</td>";
                echo "<td>".$profile['EMAIL']."</td>";               
                echo "<td> <a class=\"search-link\" href=\"profile_page.php?email=".$profile['EMAIL']."\"> View Profile</a> </tr>";
                    $count++;          
            }
            if (!$count) {
                echo "<p> No profiles like that </p>";
            }
            ?>
            </table>
        </div>

        <footer>
            <p class = "text" > Created by Matthew Langford 2017. </p>
        </footer>
    </main>
</html>
