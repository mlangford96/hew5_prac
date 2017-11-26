<!DOCTYPE html>
    <title> Profile </title>
    <link rel="stylesheet" href = "../css/common.css" />
    <link rel="stylesheet" href = "../css/search.css" />
    <link rel="stylesheet" href = "../css/profile_page.css" />
    <link href="fonts/Roboto" rel="font">
    
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

        </div>

        <footer>
            <p class = "text" > Created by Matthew Langford 2017. </p>
        </footer>
    </main>
</html>
