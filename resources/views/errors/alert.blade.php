<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Cảnh Báo</title>
	<link href="{{asset('css/bootstrap.min.css')}}" rel="stylesheet">
</head>
<body>
	<div class="alert alert-danger">
		Bạn không đủ quyền để thực hiện tác vụ này.
		<br>Vui lòng Click vào <a href="{{route('home-user')}}">đây</a> để quay về trang chủ!
	</div>
</body>
</html>