<?php include 'db_connect.php'; ?> 
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>WoolLife Cycle Management - Home</title>
    <link rel="stylesheet" href="styles1.css">
</head>
<body>
    <!-- Header Section -->
    <header>
        <h1>WoolLife Cycle Management</h1>
        <p>Your guide from sheep to fabric</p>
    </header>

    <!-- Navigation Bar -->
    <nav>
        <ul>
            <li><a href="index.php">Home</a></li>
            <li><a href="user_dashboard.php">Buy Products</a></li>
            <li><a href="wool_price.php">Current Wool Price</a></li>
            <li><a href="login.php">Admin Login</a></li>
            <li><a href="signup.php">User Login</a></li>
        </ul>
    </nav>

    <!-- Main Content Section -->
    <section id="home">
        <h2>The Wool Process: From Farm to Fabric</h2>
        <p>Discover the journey of wool from sheep farms to beautiful fabrics. This process involves:</p>
        <ol>
        <h1>Stages of Wool Processing</h1>
            <div class="stage">
                <h2>1. Fencing</h2>
                <p><b><h3>Purpose:</h3></b> Fencing is essential in sheep farming to protect the flock from predators and keep them in designated areas.</br></p>
                 <p><b><h3>Details:</h3></b>
                    Strong fences prevent sheep from wandering off.
                    It helps in rotational grazing, managing pastures, and preventing overgrazing.
                    Fencing also ensures the sheep are easily accessible during shearing time.
                    </p>
                <img src="fencing.jpg" alt="Fencing image" style="width: 50%;">
                
            </div>

            <div class="stage">
                <h2>2. Shearing</h2>
                <p><b><h3>Purpose:</h3></b> Shearing is the process of cutting the wool fleece from the sheep.</p>
                 <p><b><h3>Details:</h3></b>
                    Usually done once a year, typically in spring, to prevent the sheep from overheating in summer.
                    Shearing is done by professional shearers, and it requires skill to ensure it is done quickly and without injuring the sheep.
                    The fleece is sheared in one large piece, which is then processed further.</p>
                <img src="shearing.jpg" alt="Shearing image" style="width: 50%;">
            </div>

            <div class="stage">
                <h2>3. Sorting</h2>
                <p><b><h3>Purpose:</h3></b> Sorting helps to separate wool of different qualities for various end uses.</p>
                 <p><b><h3>Details:</h3></b>
                    Wool from different parts of the sheep has varying textures. For example, wool from the shoulders is finer and softer compared to wool from the legs.
                    The sorting process ensures that only high-quality fibers are used for products like clothing, while coarser wool can be used for carpets or insulation.
                  </p>
                <img src="sorting.jpg" alt="Sorting image" style="width: 50%;">
            </div>

            <div class="stage">
                <h2>4. Dyeing</h2>
                <p><b><h3>Purpose:</h3></b>Dyeing wool involves adding color to the raw fibers before they are spun into yarn.</p>
                <p><b><h3>Details:</h3></b>
                    Wool can be dyed at various stages: as fleece, yarn, or even fabric.
                    Natural dyes (like those from plants) and synthetic dyes are both used, depending on the desired color and sustainability considerations.
                    The dyeing process needs to be controlled to ensure uniform coloring, especially for large batches of wool.
                </p>
                <img src="dyeing.jpg" alt="Dyeing image" style="width: 50%; height: 300px;">
            </div>

            <div class="stage">
                <h2>5. Drying</h2>
                <p>
                <b><h3>Purpose:</h3></b> After dyeing, the wool must be dried to remove excess moisture before it can be spun into yarn.</p>
                <p><b><h3>Details:</h3></b>
                    Wool is sensitive to high temperatures, so it must be dried carefully, typically through air-drying or gentle mechanical drying.
                    Drying ensures the wool retains its softness and texture, preventing shrinkage or damage to the fibers.
                    Proper drying is crucial to prepare wool for the spinning process.
                </p>
                <img src="drying.jpg" alt="Drying image" style="width: 50%;">
            </div>

            <div class="stage">
                <h2>6. Making Yarn</h2>
                <p>
                <b><h3>Purpose:</h3></b> Wool is spun into yarn, which is the final step before it can be woven or knitted into textiles.
                <b><h3>Details:</h3></b>
                    The spinning process twists wool fibers together to create long, continuous strands of yarn.
                    Different types of yarn (such as fine, medium, or coarse) are created depending on the end use—finer yarn for garments, coarser yarn for rugs or upholstery.
                    Modern spinning methods use machinery, but traditional hand-spinning is still practiced in some regions, producing unique artisanal yarns.
                </p>
                <img src="yarn.jpg" alt="Making Yarn image" style="width: 50%;">
            </div>
        </ol>
    </section>

    <!-- Footer Section -->
    <footer>
        <p>&copy; 2024 Wool Life Cycle Management</p>
    </footer>
</body>
</html>
