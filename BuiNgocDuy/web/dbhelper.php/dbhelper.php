<?php
// Kết nối đến cơ sở dữ liệu
function executeResult($sql) {
    // Thực hiện kết nối đến cơ sở dữ liệu ở đây
    $connection = mysqli_connect('hostname', 'username', 'password', 'database_name');

    // Kiểm tra kết nối
    if (!$connection) {
        die("Kết nối đến cơ sở dữ liệu thất bại: " . mysqli_connect_error());
    }

    // Thực hiện truy vấn
    $result = mysqli_query($connection, $sql);

    // Kiểm tra và lấy kết quả
    if ($result && mysqli_num_rows($result) > 0) {
        $data = [];
        while ($row = mysqli_fetch_assoc($result)) {
            $data[] = $row;
        }
        return $data;
    } else {
        return [];
    }

    // Đóng kết nối
    mysqli_close($connection);
}
?>
