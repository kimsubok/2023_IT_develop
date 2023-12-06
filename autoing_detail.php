<!DOCTYPE html>
<html lang="ko">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>공모전 정보</title>
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
            display: flex;
            flex-direction: column;
            justify-content: space-between;
            padding: 20px;
        }

        .info {
            width: 100%;
            margin-bottom: 15px;
            background-color: #fff;
            border-radius: 8px;
            padding: 15px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }

        .team-box {
            position: relative;
            width: 100%; 
            background-color: #fff;
            border-radius: 8px;
            padding: 15px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }

        .team-box button {
            position: absolute;
            top: 35px;
            right: 10px;
            padding: 8px 16px;
            background-color: #333;
            color: #fff;
            border: none;
            border-radius: 4px;
            cursor: pointer;
        }

        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 15px;
        }

        th, td {
            border: 1px solid #ddd;
            padding: 8px;
            text-align: left;
        }

        th {
            background-color: #f2f2f2;
        }

        /* 별개의 버튼 스타일링 */
        .separate-button {
            position: absolute;
            right: 5px;
            padding: 10px;
            background-color: #333;
            color: #fff;
            border: none;
            border-radius: 4px;
            cursor: pointer;
        }
    </style>
</head>
<body>

    <header>
        <h1>공모전 정보</h1>
    </header>

    <main>
        <div class="info">
            <h2>2023학년도 성신여대 STARTUP021 창업경진대회</h2> <!--여기에 각 페이지 이름-->
            <p>분야: 창업</p> <!--여기에 체크박스 넣어도 좋을 듯-->
            <p>마감 날짜: 2023년 11월 17일</p> <!--각각 업데이트-->
            <p>내용 <br> 우수 아이디어 고도화 및 사업화를 통한 
                창업 기회 제공 및 혁신적·성공적 창업 연계 </p>

        </div>

        <div class="team-box">
            <h2>모집중인 팀</h2> <!--자리 피그마처럼 이동하는 건 해올게...-->
            <!-- 여기에 모집중인 팀 정보를 동적으로 추가할 수 있습니다. -->
            <button>팀 참여하기</button>
            
                    <?php
                    include 'connect.php';

                    $sql = "SELECT tid, email, people FROM team, user WHERE tid = 1";

                    $result = $connect->query($sql);

                    if($result->num_rows > 0){
                        echo "<table border='1'>";
                        echo "<tr><th>팀 번호</th><th>팀장 메일</th><th>인원 수</th></tr>";

                        while($row = $result->fetch_assoc()) {
                            echo "<tr>";
                            echo '<td>' . $row["tid"] .'</td>';
                            echo "<td>" . $row["email"] . "</td>";
                            echo "<td>" . $row["people"] . "</td>";
                            echo "</tr>";
                        }
                        echo "</table>";
                    } else {
                         echo "<p>검색 결과가 없습니다.</p>";
                     }
            
                

                echo "<button>팀 참여하기</button>";
                ?>

        </div>
    </main>

    <button class="separate-button">팀 등록하기</button>

</body>
</html>