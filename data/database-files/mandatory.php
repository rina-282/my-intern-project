<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Mandatory Public Disclosure</title>
    <style>
        /* General Styles */
body {
    font-family: Arial, sans-serif;
    margin: 0;
    padding: 0;
    box-sizing: border-box;
    background-color: #f5f5f5; /* Light background for contrast */
}

a {
    text-decoration: none;
    color: white;
}

ul {
    list-style-type: none;
    padding: 0;
}

/* Navbar Styles */
.navbar {
    background-color: #800000;
    padding: 10px;
    text-align: center;
}

.nav-list li {
    display: inline;
    margin: 0 15px;
}

.nav-list a {
    color: #fff;
    font-weight: bold;
    font-size: 16px;
}

/* Banner Section */
.banner {
    background-image: url('images/sarhad_school.jpg'); /* Make sure the image URL is correct */
    background-size: cover;
    background-position: center;
    height: 250px;
    position: relative;
    display: flex;
    justify-content: center;
    align-items: center;
    color: white;
    text-align: center;
}

.banner-content h1 {
    font-size: 40px;
    margin-bottom: 5px;
}

.banner-content p {
    font-size: 16px;
}

/* Overlay for Banner */
.banner::before {
    content: '';
    position: absolute;
    top: 0;
    left: 0;
    right: 0;
    bottom: 0;
    background-color: rgba(128, 0, 0, 0.6); /* Maroon color with transparency */
    z-index: 1; /* Ensures overlay appears above the background image */
}

.banner-content {
    position: relative;
    z-index: 2; /* Ensures the text appears above the overlay */
}

/* Content Section */
.content {
    text-align: center;
    padding: 40px;
    background-color: #fff; /* White background for content section */
    box-shadow: 0 4px 8px rgba(0,0,0,0.1);
    margin: 20px;
    border-radius: 10px;
}

.buttons-container {
    display: flex;
    flex-wrap: wrap; /* Allows buttons to wrap to the next line */
    justify-content: center; /* Centers the buttons horizontally */
    gap: 20px; /* Adds space between buttons */
    margin-top: 20px;
}

/* Button Styling */
button {
    background-color: #800000;
    color: white;
    border: none;
    padding: 15px 30px;
    font-size: 16px;
    border-radius: 25px; /* Rounded buttons */
    cursor: pointer;
    transition: background-color 0.3s ease;
    min-width: 250px; /* Ensure consistent width for buttons */
    margin: 10px; /* Add some margin for better spacing */
}

button:hover {
    background-color: #660000;
}

        </style>
</head>
<body>
    <!-- Navbar -->
    <header>
        <nav class="navbar">
            <ul class="nav-list">
                <li><a href="#">Home</a></li>
                <li><a href="#">About Us</a></li>
                <li><a href="#">Admission</a></li>
                <li><a href="#">Facilities</a></li>
                <li><a href="#">Academics</a></li>
                <li><a href="#">Achievements</a></li>
                <li><a href="#">Gallery</a></li>
                <li><a href="#">Mandatory Public Disclosure</a></li>
                <li><a href="#">Careers</a></li>
                <li><a href="#">Contact Us</a></li>
            </ul>
        </nav>
    </header>

    <!-- Banner Section -->
    <section class="banner">
        <div class="banner-content">
            <h1>Mandatory Public Disclosure</h1>
            <p><a href="#">Home</a> / Mandatory Public Disclosure</p>
        </div>
    </section>

    <!-- Content Section -->
    <section class="content">
        <div class="buttons-container">
            <button><a href="pdf/Maharashtra.pdf">CBSC:AFFILIATION</a></button>
            <button><a href="pdf/Self.pdf">SELF AFFIDAVIT</a></button>
            <button>RECOGNITION CERTIFICATE</button>
            <button>DEO CERTIFICATE</button>
            <button>TRUST CERTIFICATE</button>
            <button>NO OBJECTION CERTIFICATE</button>
            <tr><button>FIRE NOC</button>
            <button>BUILDING SAFETY CERTIFICATE</button>
            <button>SAFE DRINKING WATER AND SANITATION CERTIFICATE</button>
            <button>MANDATORY PUBLIC DISCLOSURE</button> 
        </div>
    </section>
</body>
</html>
