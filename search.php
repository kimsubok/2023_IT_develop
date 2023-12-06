<!DOCTYPE html>
<html>
<head>
    <title>공모전 검색 페이지</title>
    <style>
        body {
            display: flex;
            flex-direction: column;
            align-items: center;
        }

        #headerImage {
            width: 100%;
            max-width: 800px;
            height: auto;
            display: block;
            margin: 0 auto;
        }
    </style>
</head>
<body>
<img src="https://img1.daumcdn.net/thumb/R1280x0/?scode=mtistory2&fname=https%3A%2F%2Fblog.kakaocdn.net%2Fdn%2FlcGxV%2FbtsBrPhE8ZN%2FnGZJm2JhtpjK0pSdzqNXD1%2Fimg.png" 
    alt="공모전 검색하기" style="width: 50%; max-width: 100px;">
    <h1>공모전 검색</h1>
    <form action="search.php" method="GET">
        <label for="search">공모전 제목 입력:</label>
        <input type="text" id="search" name="search" placeholder="공모전 제목">
        
        <label for="area">분야 선택:</label>
        <select id="area" name="area">
            <option value="all">전체</option>
            <option value="기획">기획</option>
            <option value="마케팅">마케팅</option>
            <option value="리포트">리포트</option>
            <option value="영상">영상</option>
            <option value="디자인">디자인</option>
            <option value="IT">IT</option>
            <option value="과학">과학</option>
            <option value="문학">문학</option>
            <option value="건축">건축</option>
            <option value="슬로건">슬로건</option>
            <option value="예체능">예체능</option>
            <option value="서포터즈">서포터즈</option>
            <option value="봉사활동">봉사활동</option>
            <option value="창업">창업</option>
            <option value="해외">해외</option>
            <option value="기타">기타</option>

            <!-- 다른 분야 옵션들 추가 -->
        </select>
        
        <input type="submit" value="검색">
    </form>

    <div>
    <button onclick="window.location.href=\'다른페이지.php\'">다른 페이지로 이동</button>
    </div>


    <?php
        include 'connect.php'; // mysql이랑 연결해주는 php파일 

        // 초기 검색어와 분야 설정
        $search = isset($_GET['search']) ? $_GET['search'] : '';
        $area = isset($_GET['area']) ? $_GET['area'] : 'all';

        // 초기 검색어와 분야를 이용하여 autoing 데베에서 검색
        $sql = "SELECT * FROM contest_exhibit";

        // 특정 분야가 선택된 경우
        if ($area != 'all') {
            $sql .= " WHERE area = '$area'";
        }

        // 검색어가 입력된 경우
        if (!empty($search)) {
            if ($area != 'all') {
                $sql .= " AND title LIKE '%$search%'";
            } else {
                $sql .= " WHERE title LIKE '%$search%'";
            }
        }

        $result = $connect->query($sql);

        if ($result->num_rows > 0) {
            // 검색 결과 출력 (표 형식)
            echo "<table border='1'>";
            echo "<tr><th>이름</th><th>분야</th><th>마감 날짜</th><th>주최</th><th>내용</th></tr>";
            
            while($row = $result->fetch_assoc()) {
                echo "<tr>";
                echo "<td>" . $row["title"] . "</td>";
                echo "<td>" . $row["area"] . "</td>";
                echo "<td>" . $row["com_date"] . "</td>";
                echo "<td>" . $row["host"] . "</td>";
                echo "<td>" . $row["content"] . "</td>";
                echo "</tr>";
            }
            
            echo "</table>";
        } else {
            echo "<p>검색 결과가 없습니다.</p>";
        }
    ?>

<div style="position: absolute; top: 10px; right: 10px;">
        <button onclick="window.location.href='다른페이지.php'">다른 페이지로 이동</button>
    </div>

</body>
</html>
