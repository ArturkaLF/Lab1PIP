<!DOCTYPE html>
<html>
<head>
    <link href="styles/style1.css" rel="stylesheet">
    <link href="styles2/wave.css" rel="stylesheet">
    <meta charset="utf-8">
	<title>Лабораторная работа №1.</title>

</head>
<body>
	<script type="text/javascript">

		function valid_letters(input) {
   			let value = input.value;


            value = value.replace(/[^0-9,.]+/, '');
            input.value = value;


            input.value = document.getElementById('y-value-input').value.replace(/,/, '.');
    		if (input.value < -5) input.value = -5;
    		if (input.value > 5)  input.value = 5;

    		empty_check(input);

		}

		function empty_check() {
            let but = document.getElementById("button");
            but.disabled = document.getElementById("y-value-input").value === "";
        }

	</script>

	<header>
		<h1>Шайхатаров Артур Ринатович P3212</h1>
		<h2>Вариант: 212022</h2>

	</header>

	<div>

		<div class="child left-side"><img src="pictures/img.png" alt="График варианта"></div>

		<div class="child right-side">
			<form id="form" method="post" action="action.php">

				X:<select name="x" id="x" class="x">
					<option value="-3">-3</option>
					<option value="-2">-2</option>
					<option value="-1">-1</option>
					<option value="0">0</option>
					<option value="1" selected>1</option>
					<option value="2">2</option>
					<option value="3">3</option>
					<option value="4">4</option>
					<option value="5">5</option>
				</select>

				<br>

				Y:<input type="text" name="y" id="y-value-input" oninput="empty_check()" onkeyup="return valid_letters(this);" placeholder="-5 ... 5" class="y" autocomplete="off"="">

				<br>

				R:<select name="r" class="r">
					<option value="1">1</option>
					<option value="2">2</option>
					<option value="3" selected>3</option>
					<option value="4">4</option>
					<option value="5">5</option>

				</select>

				<br>

                <button type="submit" id="button" onclick="empty_check()" class="button">Отправить<br>данные</button>

			</form>

		</div>

	</div>


    <div class="header"></div>
    <div class="content">
        <div class="wave">
            <div class="wave__one"></div>
            <div class="wave__two"></div>
        </div>
    </div>

    <script>
        empty_check();
    </script>
</body>
</html>