<?php
include './../../config/database.php';

$registration_success = false;
$error_message = '';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $username = trim($_POST['username']);
    $email = trim($_POST['email']);
    $password = $_POST['password'];
    $repassword = $_POST['repassword'];
    $gender = trim($_POST['gender']);

    if (empty($username) || empty($email) || empty($password) || empty($repassword) || empty($gender)) {
        $error_message = 'يرجى ملء جميع الحقول!';
    } elseif (!preg_match("/^[a-zA-Z]*$/", $username)) {
        $error_message = 'يرجى إدخال اسم صحيح بدون أرقام!';
    } elseif ($password !== $repassword) {
        $error_message = 'كلمة المرور غير متطابقة';
    }elseif (!in_array($gender, ['male', 'fmale'])) {
        $error_message = 'يرجى اختيار جنس صحيح (male/fmale)';
    }


    if (empty($error_message)) {
        $hashed_password = password_hash($password, PASSWORD_DEFAULT);
        
        $sql = "INSERT INTO users (username, email, password_hash, gender) VALUES (?, ?, ?, ?)";
        $stmt = $conn->prepare($sql);
        $stmt->bind_param('ssss', $username, $email, $hashed_password, $gender);

        if ($stmt->execute()) {
            $registration_success = true;
        } else {
            $error_message = 'خطأ: ' . $stmt->error;
        }

        $stmt->close();
    }

    $conn->close();
}
?>

<!DOCTYPE html>
<html lang="ar">
    <style>
        .modal {
            display: none;
            position: fixed;
            z-index: 1;
            left: 0;
            top: 0;
            width: 100%;
            height: 100%;
            overflow: auto;
            background-color: rgb(0,0,0);
            background-color: rgba(0,0,0,0.4);
        }
        .modal-content {
            background-color: #fefefe;
            margin: 15% auto;
            padding: 20px;
            border: 1px solid #888;
            width: 80%;
            text-align: center;
        }
        .close {
            color: #aaa;
            float: right;
            font-size: 28px;
            font-weight: bold;
        }
        .close:hover,
        .close:focus {
            color: black;
            text-decoration: none;
            cursor: pointer;
        }
    </style>
    <script>
        function redirectToHome() {
            setTimeout(function() {
                window.location.href = '../index.php';
            }, 3000);
        }
    </script>
<body>
    <div id="successModal" class="modal" style="display: <?= $registration_success ? 'block' : 'none' ?>">
        <div class="modal-content">
            <span class="close" onclick="document.getElementById('successModal').style.display='none'">&times;</span>
            <h2>تم التسجيل بنجاح</h2>
            <p>مرحبًا بك في موقع MOLLIE</p>
            <p>ستتم إعادة توجيهك إلى الصفحة الرئيسية...</p>
        </div>
    </div>

    <div id="errorModal" class="modal" style="display: <?= !empty($error_message) ? 'block' : 'none' ?>">
        <div class="modal-content">
            <span class="close" onclick="document.getElementById('errorModal').style.display='none'">&times;</span>
            <h2>خطأ!</h2>
            <p><?= $error_message ?></p>
            <button onclick="window.location.href='sign_up.html'">إغلاق</button>
        </div>
    </div>

    <script>
        <?php if ($registration_success): ?>
            redirectToHome();
        <?php else: ?>
            if ("<?= addslashes($error_message) ?>" !== "") {
                document.getElementById('errorModal').style.display = 'block';
            }
        <?php endif; ?>
    </script>
</body>
</html>
