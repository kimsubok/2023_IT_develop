<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>공모전 등록 화면</title>
</head>

<body>
    <h2>공모전 등록하기</h2> <hr>

<form method="get" action="regiExhibit_action.php">

    <table>
        <tr>
            <td><label for="title">공모전이름</label></td>
            <td><input type="text" name="title" id="title"></td>
        </tr>

        <tr>
            <td><label for="area">분야</label></td>
            <td><input type="text" name="area" id="area"></td>
        </tr>

        <tr>
            <td><label for="com_date">모집완료일</label></td>
            <td><input type="date" name="com_date" id="com_date"></td>
        </tr>

        <tr>
            <td><label for="host">주최측</label></td>
            <td><input type="text" name="host" id="host"></td>
        </tr>

        <tr>
            <td><label for="content">내용</label></td>
            <td><input type="text" name="content" id="content"></td>
        </tr>
    </table>
    
    <button type="submit" class="btn btn-warning" stype="float:right;"
        id="submit">제출하기</button>
</form>

<?php
    include 'connect.php'; // mysql이랑 연결해주는 php파일 

    // 데이터 읽어오기
    $title = isset($_GET['title']) ? $_GET['title'] : '';
    $area = isset($_GET['area']) ? $_GET['area'] : '';
    $com_date = isset($_GET['com_date']) ? date('Y-m-d', strtotime($_GET['com_date'])) : '';
    $host = isset($_GET['host']) ? $_GET['host'] : '';
    $content = isset($_GET['content']) ? $_GET['content'] : '';

    $sql = "INSERT into contest_exhibit (title, area, com_date, host, content)
              values('$title', '$area', '$com_date', '$host', '$content')";
    $result = $connect->query($sql);

    if ($result) {
        ?>
        <script> alert('공모전 등록이 완료되었습니다.'); location.href=".."; </script>
        <?php
    } else {
        echo "Error: " . mysqli_error($connect); // 에러 메시지 출력
        ?>
        <script> alert('공모전 등록에 실패했습니다. \n다시 시도해 주세요'); location.href=".."; </script>
        <?php
    }
    ?>
</body>
</html>

