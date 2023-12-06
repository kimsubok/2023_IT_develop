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

        button {
            background-color: #333;
            color: #fff;
            padding: 10px;
            border: none;
            border-radius: 5px;
            cursor: pointer;
        }
    </style>
</head>
<body>

    <header>
        <h1>팀 등록</h1>
    </header>

    <main>
        <form method="get" action="regiTeam_action.php">
            <tr>
                <td><label for="exhibitID">공모전 아이디</label></td>
                <td><input type="integer" name="exhibitID" id="exhibitID" placeholder="Enter Exhibition ID"></td>
            </tr>

            <label for="teamSize">모집 인원 (1~4명)</label>
            <div>
                <input type="checkbox" id="teamSize1" name="teamSize" value="1">
                <label for="teamSize1">1명</label>

                <input type="checkbox" id="teamSize2" name="teamSize" value="2">
                <label for="teamSize2">2명</label>

                <input type="checkbox" id="teamSize3" name="teamSize" value="3">
                <label for="teamSize3">3명</label>

                <input type="checkbox" id="teamSize4" name="teamSize" value="4">
                <label for="teamSize4">4명</label>
            </div>

            <label for="userId">유저 ID</label>
            <input type="text" id="userId" name="userId" placeholder="Enter your ID" />

            <label for="password">패스워드</label>
            <input type="password" id="password" name="password" placeholder="Enter your password" />

            <button type="button" onclick="registerTeam()">팀 등록</button>
        </form>
    </main>

    <script>
        function registerTeam() {
            // 여기에 팀 등록 로직을 추가할 수 있습니다.
            alert('팀이 등록되었습니다!');
        }
    </script>

<?php
    include 'connect.php'; // mysql이랑 연결해주는 php파일 

    // 데이터 읽어오기
    $exhibitID = isset($_GET['exhibitID']) ? $_GET['exhibitID'] : '';
    $teamSize = isset($_GET['teamSize']) ? $_GET['teamSize'] : '';
    $userID = isset($_GET['userID']) ? $_GET['userID'] : '';
    $password = isset($_GET['password']) ? $_GET['password'] : '';

    $sql = "INSERT into contest_exhibit (uid, people, cid)
              values('$userID', '$teamSize', '$exhibitID')";
    $result = $connect->query($sql);

    if ($result) {
        ?>
        <script> alert('팀 등록이 완료되었습니다.'); location.href=".."; </script>
        <?php
    } else {
        echo "Error: " . mysqli_error($connect); // 에러 메시지 출력
        ?>
        <script> alert('팀 등록에 실패했습니다. \n다시 시도해 주세요'); location.href=".."; </script>
        <?php
    }
?>

</body>
</html>








