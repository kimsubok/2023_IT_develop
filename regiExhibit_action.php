<?php 

# 데이터 읽어오기
$title=$_POST['title'];
$area=$_POST['area'];
$com_date=$_POST['com_date'];
$host=$_POST['host'];
$content=$_content['content'];

#데베연결정보
$hostname="localhost";
$username="root";
$password="root";
$dbname="autoing";


$con = mysqli_connect($hostname, $username, $password, $dbname) or die ("Can't access DB");
$query = "insert into contest_exhibit (title, area, com_date, host, content)
values('".$title."', '".$area."', '".$com_date."', '".$host."', '".$content."')";
$result = mysqli_query($con, $query);

if (!$result)
{?>
    <script> alert('공모전 등록이 완료되었습니다.'); location.href=".."; </script>
<?php
} else {?>
    <script> alert('공모전 등록에 실패했습니다. \n다시 시도해 주세요'); location.href=".."; </script>
<?php } ?>