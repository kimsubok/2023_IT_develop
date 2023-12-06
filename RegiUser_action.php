<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>사용자 등록 화면</title>
</head>

<body>
    <h2>사용자 등록하기</h2> <hr>

<form method="get" action="RegiUser_action.php">

    <table>
        <tr>
            <td><label for="name">이름</label></td>
            <td><input type="varchar(20)" name="name" id="name"></td>
        </tr>

        <tr>
            <td><label for="studentNum">학번</label></td>
            <td><input type="integer" name="studentNum" id="studentNum"></td>
        </tr>

        <tr>
            <td><label for="majorID">전공id</label></td>
            <td><input type="integer" name="majorID" id="majorID"></td>
        </tr>

        <tr>
            <td><label for="email">이메일</label></td>
            <td><input type="email" name="email" id="email"></td>
        </tr>

        <tr>
            <td><label for="progress">팀 진행 여부</label></td>
            <td><input type="integer" name="progress" id="progress"></td>
        </tr>
    </table>

    <button type="submit" class="btn btn-warning" stype="float:right;"
        id="submit">등록하기</button>
</form>

<?php 
    include 'connect.php'; // mysql이랑 연결해주는 php파일 

    # 데이터 읽어오기
    $name = isset($_GET['name']) ? $_GET['name'] : '';
    $majorID = isset($_GET['majorID']) ? $_GET['majorID'] : '';
    $email = isset($_GET['email']) ? $_GET['email'] : '';
    $progress = isset($_GET['progress']) ? $_GET['progress'] : '';
    $studentNum = isset($_GET['studentNum']) ? $_GET['studentNum'] : '';

    if (!empty($studentNum)) {
   
    
        # 수정된 부분: 데이터베이스에 데이터 삽입
        $sql = "INSERT INTO user (name, majorID, email, progress, uid)
                  VALUES ('$name', '$majorID', '$email', '$progress', '$studentNum')";
    
        $result = $connect->query($sql);
    
        if ($result) { ?>
            <script> alert('사용자 등록이 완료되었습니다.'); location.href = "regiUser_action.php"; </script>
        <?php } else { echo "Error: " . mysqli_error($connect); ?>
            <script> alert('사용자 등록에 실패했습니다. \n다시 시도해 주세요'); location.href = "regiUser_action.php"; </script>
        <?php }
    } else {
        die(" ");
    }
?>

</body>
</html>