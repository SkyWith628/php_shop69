<?php
if (!function_exists('mypagination')) {
    include "common.php"; 
    $findtext = isset($_REQUEST["find_text"]) ? $_REQUEST["find_text"] : '';
}
$cookie_id = $_COOKIE["cookie_id"] ?? 0;
$jumun_link = $cookie_id ? "jumun.php" : "jumun_login.php";
?>

<!doctype html>
<html lang="ko">
<head> 
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Stüssy</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body {
            background-color: #fff;
            color: #000;
            font-family: 'Segoe UI', sans-serif;
        }
        .navbar {
            background-color: #000;
        }
        .navbar a, .navbar-brand {
            color: white !important;
        }
        .navbar a:hover {
            color: #ddd !important;
        }
        .carousel-caption {
            background-color: rgba(0, 0, 0, 0.6);
            border-radius: 10px;
            padding: 15px;
        }
        .nav-link.active {
            font-weight: bold;
            text-decoration: underline;
        }
        footer {
            padding: 20px 0;
            background-color: #f1f1f1;
            text-align: center;
            margin-top: 40px;
        }
    </style>
    <script src="https://code.jquery.com/jquery-3.7.1.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</head>

<body>

<!-- ✅ Navigation Bar -->
<nav class="navbar navbar-expand-lg navbar-dark">
    <div class="container">
        <a class="navbar-brand fs-3" href="index.html">Stüssy</a>
        <div class="collapse navbar-collapse justify-content-end">
            <ul class="navbar-nav me-3">
                <li class="nav-item">
                    <a class="nav-link" href="index.html">Home</a>
                </li>
                <?php if (!$cookie_id): ?>
                    <li class="nav-item"><a class="nav-link" href="member_login.php">로그인</a></li>
                    <li class="nav-item"><a class="nav-link" href="member_join.php">회원가입</a></li>
                <?php else: ?>
                    <li class="nav-item"><a class="nav-link" href="member_logout.php">로그아웃</a></li>
                    <li class="nav-item"><a class="nav-link" href="member_edit.php">회원정보수정</a></li>
                <?php endif; ?>
                <li class="nav-item"><a class="nav-link" href="cart.php">장바구니</a></li>
                <li class="nav-item"><a class="nav-link" href="<?= $jumun_link ?>">주문조회</a></li>
                <li class="nav-item"><a class="nav-link" href="qa.php">Q & A</a></li>
                <li class="nav-item"><a class="nav-link" href="faq.php">FAQ</a></li>
            </ul>
        </div>
    </div>
</nav>

<!-- ✅ Carousel -->
<div id="carouselExampleIndicators" class="carousel slide" data-bs-ride="carousel" data-bs-interval="4000">
    <div class="carousel-indicators">
        <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="0" class="active" aria-current="true"></button>
        <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="1"></button>
        <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="2"></button>
    </div>
    <div class="carousel-inner">
        <div class="carousel-item active">
            <img src="images/main1.jpg" class="d-block w-100" alt="Fashion 1">
            <div class="carousel-caption d-none d-md-block">
                <h2>New Fashion 1</h2>
                <p>당신을 위한 패션 제안 1</p>
            </div>
        </div>
        <div class="carousel-item">
            <img src="images/main2.jpg" class="d-block w-100" alt="Fashion 2">
            <div class="carousel-caption d-none d-md-block">
                <h2>New Fashion 2</h2>
                <p>당신을 위한 패션 제안 2</p>
            </div>
        </div>
        <div class="carousel-item">
            <img src="images/main3.jpg" class="d-block w-100" alt="Fashion 3">
            <div class="carousel-caption d-none d-md-block">
                <h2>New Fashion 3</h2>
                <p>당신을 위한 패션 제안 3</p>
            </div>
        </div>
    </div>
    <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide="prev">
        <span class="carousel-control-prev-icon"></span>
        <span class="visually-hidden">Previous</span>
    </button>
    <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide="next">
        <span class="carousel-control-next-icon"></span>
        <span class="visually-hidden">Next</span>
    </button>
</div>

<!-- ✅ 메뉴 및 검색 -->
<div class="container mt-4">
    <div class="d-flex justify-content-between align-items-center border-bottom pb-2 mb-3">
        <ul class="nav">
            <?php
            for ($i = 1; $i < $n_menu; $i++) {
                echo '<li class="nav-item"><a class="nav-link" href="menu.php?menu=' . ($i + 1) . '">' . $a_menu[$i] . '</a></li>';
            }
            ?>
        </ul>
        <form name="form1" method="post" action="product_search.php" class="d-flex">
            <input class="form-control me-2" type="search" name="find_text" value="<?= $findtext ?>" placeholder="상품검색">
            <button class="btn btn-outline-dark" type="submit">Search</button>
        </form>
    </div>
</div>



</body>
</html>