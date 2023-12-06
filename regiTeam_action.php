<!DOCTYPE html>
<html lang="ko">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>팀 등록</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
            background-color: #f4f4f4;
        }

        header {
            background-color: #333;
            color: #fff;
            text-align: center;
            padding: 10px;
        }

        main {
            padding: 20px;
        }

        form {
            background-color: #fff;
            border-radius: 8px;
            padding: 15px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            max-width: 400px;
            margin: auto;
        }

        label {
            display: block;
            margin-bottom: 8px;
        }

        input {
            width: 100%;
            padding: 8px;
            margin-bottom: 15px;
            box-sizing: border-box;
        }
    </style>
</head>
<body>

    <header>
        <h1>팀 등록</h1>
    </header>
    
        <form method="get" action="regiTeam_action.php">
            
            <label for="exhibitID">공모전 아이디</label>
            <input type="integer" name="exhibitID" id="exhibitID" placeholder="Enter Exhibition ID">

            <label for="teamSize">모집 인원 (1~4명)</label>
            <input type="number" id="teamSize" name="teamSize"/>

            <label for="userId">유저 ID</label>
            <input type="text" id="userId" name="userId" placeholder="Enter your ID" />

            <label for="password">패스워드</label>
            <input type="password" id="password" name="password" placeholder="Enter your password" />

            <button type="submit" class="btn btn-warning" style="float:right;" id="submit">팀 등록</button>
            
        </form>

<?php
    include 'connect.php'; // mysql이랑 연결해주는 php파일 

    // 데이터 읽어오기
    $exhibitID = isset($_GET['exhibitID']) ? $_GET['exhibitID'] : '';
    $teamSize = isset($_GET['teamSize']) ? $_GET['teamSize'] : '';
    $userID = isset($_GET['userID']) ? $_GET['userID'] : '';
    $password = isset($_GET['password']) ? $_GET['password'] : '';

    

    if (!empty($userID)) {

        $sql = "INSERT into team (uid, people, cid)
              values('$userID', '$teamSize', '$exhibitID')";

        $result = $connect->query($sql);

        if ($result) { ?>
            <script> alert('팀 등록이 완료되었습니다.'); location.href="regiTeam_action.php"; </script>
            <?php } else { echo "Error: " . mysqli_error($connect); // 에러 메시지 출력
            ?>
            <script> alert('팀 등록에 실패했습니다. \n다시 시도해 주세요'); location.href="regiTeam_action.php"; </script>
            <?php } 
        }else {
            die(" ");
        }
?>

</body>
</html>