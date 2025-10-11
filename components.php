
<?php
include 'data.php';

$github_username = 'lukagiorgilomidze';
$github_api_url = "https://api.github.com/users/{$github_username}/repos?sort=updated&per_page=10";

function getGitHubRepos($url) {
    $ch = curl_init();
    curl_setopt($ch, CURLOPT_URL, $url);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
    curl_setopt($ch, CURLOPT_HTTPHEADER, array(
        'User-Agent: Portfolio-Site',
        'Accept: application/vnd.github.v3+json'
    ));
    $response = curl_exec($ch);
    curl_close($ch);
    return json_decode($response, true);
}

$repos = getGitHubRepos($github_api_url);

$github_link = 'https://github.com/lukagiorgilomidze';

function custom_header($navbar_items) { ?>
<!DOCTYPE html>
<html lang="ka">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Luka Giorgilomidze - პორტფოლიო</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" rel="stylesheet">
    <link href="style.css" rel="stylesheet">
</head>
<body>
    <!-- ნავიგაცია -->
    <nav class="navbar navbar-expand-lg fixed-top">
        <div class="container">
            <a class="navbar-brand" href="index.php"><i class="fas fa-code"></i> Luka-Giorgi Lomidze</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav">
             <span style=" font-size: 27px;
    color: #fff ;">&#9776;</span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav ms-auto">
                    <?php foreach ($navbar_items as $item): ?>
                        <li class="nav-item">
                            <a class="nav-link" href="<?= $item['url'] ?>" <?= isset($item['cv']) ? 'target="_blank"' : '' ?>>
                                <?= isset($item['home']) ? $item['home'] : '' ?>
                                <?= isset($item['about']) ? $item['about'] : '' ?>
                                <?= isset($item['projects']) ? $item['projects'] : '' ?>
                                <?= isset($item['contact']) ? $item['contact'] : '' ?>
                                <?= isset($item['cv']) ? '<i class="fas fa-download"></i> ' . $item['cv'] : '' ?>
                            </a>
                        </li>
                    <?php endforeach; ?>
                </ul>
            </div>
        </div>
    </nav>
<?php } ?>

<?php function custom_footer() { ?>
    <!-- ფუტერი -->
    <footer class="text-center">
        <div class="container">
            <p>&copy; 2025 Luka Giorgilomidze. ყველა უფლება დაცულია.</p>
        </div>
    </footer>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    <script src="./data.js"></script>
</body>
</html>
<?php } ?>