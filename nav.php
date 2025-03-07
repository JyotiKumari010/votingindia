<?php
if (session_status() == PHP_SESSION_NONE) {
    session_start(); // Start the session only if it's not already started
}
$current_page = basename($_SERVER['PHP_SELF']); // Get the current page name
?>
<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Voting India</title>
    <link rel="shortcut icon" type="image/png" href="images/1.png" />
    <link rel="stylesheet"  href="css/style.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">

    <style>
/* Navbar */
.navbar {
    display: flex;
    justify-content: space-between;
    align-items: center;
    background-color: #003366; /* Dark blue background */
    padding: 10px 20px;
    position: relative;
}

/* Logo */
.navbar .logo {
    display: flex;
    align-items: center;
}

.logo-img {
    width: 60px;
    height: auto;
    margin-right: 1px;
}

.navbar .logo a {
    color: #fff;
    font-size: 28px;
    text-decoration: none;
}

/* Navigation Links */
.nav-links {
    list-style: none;
    display: flex;
    align-items: center;
}

.nav-links li {
   
    margin: 0 15px;
}

.nav-link:hover {
    transform: scale(1.1);
    color: #FFD700 !important;
  }

.nav-links li a {
    color: #fff;
    text-decoration: none;
    font-size: 18px;
    padding: 8px 16px;
    transition: transform 0.2s ease-in-out, color 0.2s ease-in-out, background-color 0.2s ease-in-out;
}

/* Hover Effects */
.nav-links li a:hover {
    transform: scale(1.1) !important; /* Enlarges on hover */
    color: #FFD700 !important; /* Gold color on hover */
    background-color: #575757; /* Dark background */
    border-radius: 4px;
}

/* Mobile Menu Icon */
.menu-icon {
    display: none;
    font-size: 30px;
    color: #fff;
    cursor: pointer;
}

/* Authentication & Search */
.auth-search-container {
    display: flex;
    align-items: center;
    justify-content: flex-start; /* Aligns buttons and search bar to the left */
    gap: 20px; /* Adds space between items */
}

.auth-btn {
    padding: 8px 16px;
    font-size: 16px;
    color: #fff;
    background-color: #007bff; /* Blue background */
    border: none;
    border-radius: 4px;
    cursor: pointer;
    transition: background-color 0.3s ease;
}

.auth-btn:hover {
    background-color: #0056b3; /* Darker blue */
}

/* Search Bar */
.search-container {
    display: flex;
    align-items: center;
}

#search-bar {
    padding: 5px;
    font-size: 16px;
    border: none;
    border-radius: 4px;
    margin-right: 10px; /* Adds space between input and button */
}

.search-container button {
    padding: 6px 12px;
    font-size: 16px;
    background-color: #fff;
    border: none;
    cursor: pointer;
    border-radius: 4px;
    transition: background-color 0.3s ease;
}

.search-container button:hover {
    background-color: #575757;
    color: #fff;
}

/* Mobile Responsiveness */
@media (max-width: 768px) {
    .nav-links {
        display: none;
        width: 100%;
        flex-direction: column;
        align-items: center;
        position: absolute;
        top: 60px;
        left: 0;
        background-color: #003366;
    }

    .nav-links li {
        margin: 10px 0;
    }

    .menu-icon {
        display: block;
    }

    .auth-search-container {
        display: block;
        width: 100%;
        margin-top: 10px;
        text-align: center;
    }

    .auth-btn {
        margin-bottom: 10px;
        width: 80%;
    }

    .search-container {
        display: block;
        width: 100%;
        text-align: center;
    }

    #search-bar {
        width: 80%;
        margin: 5px 0;
    }

    .nav-links.active {
        display: flex;
    }
}
    </style>
</head>
<body>

 <!---navbar--->

 <nav class="navbar navbar-expand-lg navbar-dark bg-dark-blue">
  <div class="container-fluid">
    <!-- Logo Section -->
    <div class="logo d-flex align-items-center">
      <a class="navbar-brand" href="#">
        <img src="images/1.png" alt="Logo" class="logo-img" style="height: 40px;"> VOTING INDIA
      </a>
    </div>

    <!-- Toggler Button for Mobile View -->
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>

    <!-- Menu Section -->
    <div class="collapse navbar-collapse" id="navbarNav">
  <ul class="navbar-nav me-auto mb-2 mb-lg-0">
    <li class="nav-item">
      <a class="nav-link text-white" href="home.php" 
         style="transition: transform 0.3s ease, color 0.3s ease;" 
         onmouseover="this.style.transform='scale(1.1)'; this.style.color='#FFD700';" 
         onmouseout="this.style.transform='scale(1)'; this.style.color='white';">
        Home
      </a>
    </li>
    <li class="nav-item">
      <a class="nav-link text-white" href="about.php" 
         style="transition: transform 0.3s ease, color 0.3s ease;" 
         onmouseover="this.style.transform='scale(1.1)'; this.style.color='#FFD700';" 
         onmouseout="this.style.transform='scale(1)'; this.style.color='white';">
        About
      </a>
    </li>
    <li class="nav-item">
      <a class="nav-link text-white" href="dashboard.php" 
         style="transition: transform 0.3s ease, color 0.3s ease;" 
         onmouseover="this.style.transform='scale(1.1)'; this.style.color='#FFD700';" 
         onmouseout="this.style.transform='scale(1)'; this.style.color='white';">
        Dashboard
      </a>
    </li>
    <li class="nav-item">
      <a class="nav-link text-white" href="election.php" 
         style="transition: transform 0.3s ease, color 0.3s ease;" 
         onmouseover="this.style.transform='scale(1.1)'; this.style.color='#FFD700';" 
         onmouseout="this.style.transform='scale(1)'; this.style.color='white';">
        Election
      </a>
    </li>
    <li class="nav-item">
      <a class="nav-link text-white" href="voting.php" 
         style="transition: transform 0.3s ease, color 0.3s ease;" 
         onmouseover="this.style.transform='scale(1.1)'; this.style.color='#FFD700';" 
         onmouseout="this.style.transform='scale(1)'; this.style.color='white';">
        Voting
      </a>
    </li>
    <li class="nav-item">
      <a class="nav-link text-white" href="result.php" 
         style="transition: transform 0.3s ease, color 0.3s ease;" 
         onmouseover="this.style.transform='scale(1.1)'; this.style.color='#FFD700';" 
         onmouseout="this.style.transform='scale(1)'; this.style.color='white';">
        Result
      </a>
    </li>
    <li class="nav-item">
      <a class="nav-link text-white" href="help.php" 
         style="transition: transform 0.3s ease, color 0.3s ease;" 
         onmouseover="this.style.transform='scale(1.1)'; this.style.color='#FFD700';" 
         onmouseout="this.style.transform='scale(1)'; this.style.color='white';">
        Contact
      </a>
    </li>
  </ul>
</div>

<div class="search-container">
    <input type="text" id="search-bar" class="search-input" placeholder="Search..." onkeypress="searchPage(event)">
    <i class="fa fa-search search-icon"></i>

</div>

<style>
.search-container {
    position: relative;
    display: inline-block;
}

.search-input {
    padding: 8px 30px 8px 10px; /* Space for icon */
    font-size: 16px;
    border: 1px solid #ccc;
    border-radius: 20px;
    outline: none;
}

.search-icon {
    position: absolute;
    right: 10px;
    top: 50%;
    transform: translateY(-50%);
    color: gray;
    cursor: pointer;
}
</style>
<script>
document.addEventListener("DOMContentLoaded", function() {
    const searchInput = document.getElementById("search-bar");
    
    searchInput.addEventListener("input", function() {
        let searchText = searchInput.value.trim().toLowerCase();
        let contentArea = document.body; // search full page
        let found = false;

        // remove the previous highlighted text
        let highlightedText = document.querySelectorAll(".highlight");
        highlightedText.forEach(span => {
            let parent = span.parentNode;
            parent.replaceChild(document.createTextNode(span.textContent), span);
        });

        if (searchText === "") return; // if search section is empty 

        function highlightText(node) {
            if (node.nodeType === 3) { // only search the text node
                let text = node.nodeValue.toLowerCase();
                let index = text.indexOf(searchText);
                if (index !== -1) {
                    let span = document.createElement("span");
                    span.classList.add("highlight");
                    span.style.backgroundColor = "yellow";
                    span.style.color = "black";
                    span.textContent = node.nodeValue.substring(index, index + searchText.length);

                    let beforeText = document.createTextNode(node.nodeValue.substring(0, index));
                    let afterText = document.createTextNode(node.nodeValue.substring(index + searchText.length));

                    let parent = node.parentNode;
                    parent.replaceChild(afterText, node);
                    parent.insertBefore(span, afterText);
                    parent.insertBefore(beforeText, span);

                    found = true;
                }
            } else {
                node.childNodes.forEach(child => highlightText(child));
            }
        }

        highlightText(contentArea);

        // No Data Found
        let noDataMsg = document.getElementById("no-data-found");
        if (!found) {
            if (!noDataMsg) {
                noDataMsg = document.createElement("div");
                noDataMsg.id = "no-data-found";
                noDataMsg.textContent = "No data found!";
                noDataMsg.style.color = "red";
                noDataMsg.style.fontWeight = "bold";
                document.body.appendChild(noDataMsg);
            }
        } else if (noDataMsg) {
            noDataMsg.remove(); // remove the search
        }
    });
});
</script>


    <!-- Authentication Buttons -->
<div class="d-flex align-items-center">
  <?php if (isset($_SESSION['user'])): ?>
    <a href="logout.php" style="transition: transform 0.3s ease, color 0.3s ease;" 
       onmouseover="this.style.transform='scale(1.1)'; this.style.color='#FFD700';" 
       onmouseout="this.style.transform='scale(1)'; this.style.color='white';">
      <button class="btn btn-outline-light me-2">Logout</button>
    </a>
  <?php else: ?>
    <a href="signup.php" style="transition: transform 0.3s ease, color 0.3s ease;" 
       onmouseover="this.style.transform='scale(1.1)'; this.style.color='#FFD700';" 
       onmouseout="this.style.transform='scale(1)'; this.style.color='white';">
      <button class="btn btn-outline-light me-2">Sign Up</button>
    </a>
    <a href="login.php" style="transition: transform 0.3s ease, color 0.3s ease;" 
       onmouseover="this.style.transform='scale(1.1)'; this.style.color='#FFD700';" 
       onmouseout="this.style.transform='scale(1)'; this.style.color='white';">
      <button class="btn btn-outline-light me-2">Login</button>
    </a>
  <?php endif; ?>
</div>
      
    </div>
  </div>
</nav>

</body>
</html>