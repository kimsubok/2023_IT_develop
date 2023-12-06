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
            justify-content: space-between;
            padding: 20px;
        }

        .info {
            width: 30%;
            background-color: #fff;
            border-radius: 8px;
            padding: 15px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }

        .team-box {
            width: 65%;
            background-color: #fff;
            border-radius: 8px;
            padding: 15px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }
    </style>
</head>
<body>

    <header>
        <h1>공모전 정보</h1>
    </header>

    <main>
        <div class="info">
            <h2>공모전 이름</h2> <!--여기에 각 페이지 이름-->
            <p>분야: 분야명</p> <!--여기에 체크박스 넣어도 좋을 듯-->
            <p>마감 날짜: 2023년 12월 31일</p> <!--각각 업데이트-->
            <p>내용 <br> 내용 설명 </p> <!--채우기-->

        </div>

        <div class="team-box">
            <h2>모집중인 팀</h2> <!--자리 피그마처럼 이동하는 건 해올게...-->
            <!-- 여기에 모집중인 팀 정보를 동적으로 추가할 수 있습니다. -->
            <ul>
                <li>팀 1</li>
                <li>팀 2</li>
                <li>팀 3</li>
                <!-- 필요에 따라 추가 -->
            </ul>
        </div>
    </main>

</body>
</html>