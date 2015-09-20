<?php
$server_username = "root"; // điền username đăng nhập mysql
$server_password = ""; // điền password đăng nhập mysql
$server_host = "localhost";// điền tện host
$database = 'kungfuphp'; // tên database
 
// tạo biến kết nối tới database
$conn = mysqli_connect($server_host,$server_username,$server_password,$database) or die("không thể kết nối tới database");
if(isset($_GET["getUser"])){
        // kiểm tra định dạng dữ liểu trả ra là json hay xml          
	$format = strtolower($_GET['format']) == 'json' ? 'json' : 'xml';
	
        //tạo mạng users để lưu thông tin toàn bộ user trong db
        $users = array();
        
        //gọi file kết nối db
	$conn = mysqli_connect($server_host,$server_username,$server_password,$database) or die("không thể kết nối tới database");
	//truy vấn lấy toàn bộ thông tin trong bảng users
        $sql = "select * from users";
	$query = mysqli_query($conn,$sql);
	while ($user = mysqli_fetch_assoc($query)) {
		$users[] = array('user' => $user);
	}
        // trả ra dữ liệu dưới dạng json
	if ($format == 'json') {
		header('Content-type: application/json');
		echo json_encode(array('users'=>$users));
	}else{
        // trả ra dữ liệu dưới dạng xml
		header('Content-type: text/xml');
		echo '<users>';
		foreach($users as $index => $user) {
			if(is_array($user)) {
				foreach($user as $key => $value) {
					echo '<',$key,'>';
					if(is_array($value)) {
						foreach($value as $tag => $val) {
							echo '<',$tag,'>',htmlentities($val),'</',$tag,'>';
						}
					}
					echo '</',$key,'>';
				}
			}
		}
		echo '</users>';
	}
	mysqli_close($conn);
}else{
    echo "Không có dữ liệu trả về";
}