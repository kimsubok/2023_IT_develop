<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>공모전 등록 화면</title>
</head>

<body>
    <h2>공모전 등록하기</h2> <hr>

    <form method="post" action="regiExhibit_action.php">

        <table>
            <tr>
                <td><label for="title">공모전 이름</label></td>
                <td><input type="text" name="title" id="title" required></td>
            </tr>

            <tr>
                <td><label for="area">분야</label></td>
                <td><input type="text" name="area" id="area" required></td>
            </tr>

            <tr>
                <td><label for="com_date">모집 완료일</label></td>
                <td><input type="date" name="com_date" id="com_date" required></td>
            </tr>

            <tr>
                <td><label for="host">주최측</label></td>
                <td><input type="text" name="host" id="host" required></td>
            </tr>

            <tr>
                <td><label for="content">내용</label></td>
                <td><input type="text" name="content" id="content" required></td>
            </tr>
        </table>

        <button type="submit" class="btn btn-warning" style="float:right;" id="submit">제출하기</button>
    </form>

    <?php

# 데이터 읽어오기
$title = isset($_POST['title']) ? $_POST['title'] : '';
$area = isset($_POST['area']) ? $_POST['area'] : '';
$com_date = isset($_POST['com_date']) ? $_POST['com_date'] : '';
$host = isset($_POST['host']) ? $_POST['host'] : '';
$content = isset($_POST['content']) ? $_POST['content'] : '';

# 데베 연결 정보
$hostname = "localhost";
$username = "root";
$password = "root";
$dbname = "autoing";

$con = mysqli_connect($hostname, $username, $password, $dbname) or die("Can't access DB");

if (!empty($com_date) && strtotime($com_date)) {
    $com_date = date("Y-m-d", strtotime($com_date));

    # 수정된 부분: 데이터베이스에 데이터 삽입
    $query = "INSERT INTO contest_exhibit (title, area, com_date, host, content)
              VALUES ('$title', '$area', '$com_date', '$host', '$content')";

    $result = mysqli_query($con, $query);

    if ($result) { ?>
        <script> alert('공모전 등록이 완료되었습니다.'); location.href = "/"; </script>
    <?php } else { ?>
        <script> alert('공모전 등록에 실패했습니다. \n다시 시도해 주세요'); location.href = "/"; </script>
    <?php }
} else {
    die("Invalid date provided");
}
?>

</body>
</html>
