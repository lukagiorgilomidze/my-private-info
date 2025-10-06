<?php

$confirmation = '';
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['name'], $_POST['surname'], $_POST['email'], $_POST['message'])) {
    // ვალიდაცია
    $name = trim(htmlspecialchars($_POST['name']));
    $surname = trim(htmlspecialchars($_POST['surname']));
    $email = trim(htmlspecialchars($_POST['email']));
    $subject = trim(htmlspecialchars($_POST['subject'] ?? ''));
    $message = trim(htmlspecialchars($_POST['message']));
    
    if (empty($name) || empty($surname) || empty($email) || empty($message) || !filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $confirmation = 'შეცდომა: შეავსე ყველა ველი სწორად.';
    } else {
        // შეტყობინების შენახვა TXT-ში
        $dir = __DIR__ . '/../messages';
        if (!is_dir($dir)) {
            mkdir($dir, 0777, true);  // შექმენი საქაღალდე, თუ არ არსებობს
        }
        $filename = $dir . '/message_' . date('Ymd_His') . '_' . uniqid() . '.txt';
        $content = "სახელი: $name\n"
                 . "გვარი: $surname\n"
                 . "ელ.ფოსტა: $email\n"
                 . "თემა: $subject\n"
                 . "შეტყობინება:\n$message\n"
                 . "გაგზავნის თარიღი: " . date('Y-m-d H:i:s') . "\n"
                 . "--------------------------\n";
        if (file_put_contents($filename, $content)) {
            $confirmation = 'მადლობა კონტაქტისთვის! შენი შეტყობინება მიღებულია და მალე გიპასუხებ.';
        } else {
            $confirmation = 'შეცდომა: შეტყობინება ვერ შენახულა. სცადე მოგვიანებით.';
        }
    }
}

?>

<!-- კონტაქტი -->
<section class="section text-white">
    <div class="container">
        <h2 class="text-center mb-5">კონტაქტი</h2>
        
        <!-- Confirmation მესიჯი -->
        <?php if ($confirmation): ?>
            <div class="alert <?= strpos($confirmation, 'მადლობა') !== false ? 'alert-success' : 'alert-danger' ?> text-center mb-4">
                <?= $confirmation ?>
            </div>
        <?php endif; ?>
        
        <div class="row justify-content-center">
            <div class="col-md-8">
                <form class="contact-form" method="POST" action=""> <!-- action="" – იმუშავებს იმავე გვერდზე -->
                    <div class="row">
                        <div class="col-md-6 mb-3">
                            <label for="name" class="form-label">სახელი</label>
                            <input type="text" class="form-control" id="name" name="name" value="<?= htmlspecialchars($_POST['name'] ?? '') ?>" required>
                        </div>
                        <div class="col-md-6 mb-3">
                            <label for="surname" class="form-label">გვარი</label>
                            <input type="text" class="form-control" id="surname" name="surname" value="<?= htmlspecialchars($_POST['surname'] ?? '') ?>" required>
                        </div>
                    </div>
                    <div class="mb-3">
                        <label for="email" class="form-label">ელ.ფოსტა</label>
                        <input type="email" class="form-control" id="email" name="email" value="<?= htmlspecialchars($_POST['email'] ?? '') ?>" required>
                    </div>
                    <div class="mb-3">
                        <label for="subject" class="form-label">თემა (სურვილისამებრ)</label>
                        <input type="text" class="form-control" id="subject" name="subject" value="<?= htmlspecialchars($_POST['subject'] ?? '') ?>">
                    </div>
                    <div class="mb-3">
                        <label for="message" class="form-label">შეტყობინება</label>
                        <textarea class="form-control" id="message" name="message" rows="5" required><?= htmlspecialchars($_POST['message'] ?? '') ?></textarea>
                    </div>
                    <button type="submit" class="btn btn-custom w-100">გაგზავნა</button>
                </form>
            </div>
        </div>
    </div>
</section>
