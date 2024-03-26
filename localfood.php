<?php 
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

session_start();

include 'header.php'; 

$dbHost = 'localhost'; // or your host
$dbUsername = 'root';
$dbPassword = '';
$dbName = 'joojo';

// Establish a new database connection
$conn = new mysqli($dbHost, $dbUsername, $dbPassword, $dbName);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// SQL to select recipes and their authors' names
$sql = "SELECT r.title, r.imagePath, r.description, r.ingredients, r.instructions, r.datePosted, u.uname,
        (SELECT COUNT(*) FROM recipes WHERE regionFlag = 'local') AS numRecipes
        FROM recipes r
        INNER JOIN users u ON r.userID = u.userID
        WHERE r.regionFlag = 'local' ORDER BY R.datePosted DESC";

$result = $conn->query($sql);
$numRecipes = 0;
$recipes = [];

if ($result && $result->num_rows > 0) {
    while($row = $result->fetch_assoc()) {
        if ($numRecipes === 0) {
            $numRecipes = $row['numRecipes'];
        }
        $recipes[] = $row;
    }
}


$conn->close();
?>


<main>

    <div class="container text-center">
        <h1>Local Food Section</h1>
    </div>
    <div class="container-sm text-center">
    </div>
    <div class="container-sm">
        <div class="accordion" id="accordionExample">
            <?php foreach ($recipes as $index => $recipe): ?>
            <div class="accordion-item">
                <h2 class="accordion-header">
                    <button class="accordion-button" type="button" data-bs-toggle="collapse"
                        data-bs-target="#collapse<?= $index ?>" aria-expanded="true"
                        aria-controls="collapse<?= $index ?>">
                        <?= htmlspecialchars($recipe['title']) ?>
                    </button>
                </h2>
                <div id="collapse<?= $index ?>" class="accordion-collapse collapse <?= $index == 0 ? 'show' : '' ?>"
                    data-bs-parent="#accordionExample">
                    <div class="accordion-body">
                        <div class="container">
                            <div class="row">
                                <div class="col-5 text-center">
                                    <img src="<?= htmlspecialchars($recipe['imagePath']) ?>" class="img-fluid"
                                        alt="...">
                                </div>
                                <div class="col-7">
                                    <div class="row">
                                        <p><strong>By</strong> <?= htmlspecialchars($recipe['uname']) ?><br>
                                            <em><?= date('j F, Y', strtotime($recipe['datePosted'])) ?></em>
                                        </p>
                                    </div>
                                    <div class="row">
                                        <strong>Description</strong>
                                        <p><?= htmlspecialchars($recipe['description']) ?></p>
                                    </div>
                                    <div class="row">
                                        <strong>Ingredients</strong>
                                        <p>
                                        <ul class="ps-4">
                                            <?php foreach(explode(',', $recipe['ingredients']) as $ingredient): ?>
                                            <li><?= htmlspecialchars(trim($ingredient)) ?></li>
                                            <?php endforeach; ?>
                                        </ul>
                                        </p>
                                    </div>
                                    <div class="row">
                                        <strong>Instructions</strong>
                                        <p>
                                            <?php echo str_replace("\\r\\n", "<br>", htmlspecialchars($recipe['instructions'], ENT_QUOTES, 'UTF-8')); ?>
                                        </p>

                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <?php endforeach; ?>
        </div>
    </div>
</main>