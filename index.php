<?php
function outTableForm()
{
	echo '<div class="container">';
	if (isset($_GET['content'])) {
		echo '<table>';
		echo '<tbody>';
		outTable($_GET['content']);
		echo '</tbody>';
		echo '</table>';
	} else {
		for ($i = 2; $i < 10; $i++) {
			echo '<table>';
			echo '<tbody>';
			outTable($i);
			echo '</tbody>';
			echo '</table>';
		}
	}
	echo '</div>';
}

function outDivForm()
{
	echo '<div class="container">';
	if (isset($_GET['content'])) {
		echo '<div class="ttSingleRow">';
		outRow($_GET['content']);
		echo '</div>';
	} else {
		for ($i = 2; $i < 10; $i++) {
			echo '<div class="ttRow">';
			outRow($i);
			echo '</div>';
		}
	}
	echo '</div>';
}

function outTable($n)
{
	for ($i = 2; $i <= 9; $i++) {
		echo '<tr>';
		echo '<td>';
		echo outNumAsLink($n) . ' x ' . outNumAsLink($i);
		echo '</td>';
		echo '<td>';
		echo outNumAsLink($i * $n);
		echo '</td>';
		echo '</tr>';
	}
}

function outRow($n)
{
	for ($i = 2; $i <= 9; $i++) {
		echo outNumAsLink($n) . ' x ' . outNumAsLink($i) . ' = ' .
			outNumAsLink($i * $n) . '<br>';
	}
}

function outNumAsLink($x)
{
	if ($x <= 9)
		return '<a href="?content=' . $x . '"> ' . $x . '</a>';
	else
		return $x;
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link rel="stylesheet" href="header.css">
	<link rel="stylesheet" href="footer.css">
	<link rel="stylesheet" href="style.css">
	<title>Дубровских Никита 221-361 лаб 11</title>
</head>

<body>
	<header>
		<div id="main_menu">
			<?php
			echo '<a href="?html_type=TABLE';
			if (isset($_GET['content']))
				echo '&content=' . $_GET['content'];
			echo '"';
			if (array_key_exists('html_type', $_GET) && $_GET['html_type'] == 'TABLE')
				echo ' class="selected"';
			echo '>Табличная форма</a>';

			echo '<a href="?html_type=DIV';
			if (isset($_GET['content']))
				echo '&content=' . $_GET['content'];
			echo '"';
			if (array_key_exists('html_type', $_GET) && $_GET['html_type'] == 'DIV')
				echo ' class="selected"';
			echo '>Блоковая форма</a>';
			?>
		</div>
	</header>
	<div id="product_menu">
		<?php
		echo '<a href="';
		if (isset($_GET['html_type']))
			echo '?html_type=' . $_GET['html_type'];
		echo '"';
		if (!isset($_GET['content']))
			echo ' class="selected-product"';
		echo '>Вся таблица умножения</a>';
		for ($i = 2; $i <= 9; $i++) {
			echo '<a href="?content=' . $i;
			if (isset($_GET['html_type']))
				echo '&html_type=' . $_GET['html_type'];
			echo '" ';
			if (isset($_GET['content']) && $_GET['content'] == $i)
				echo ' class="selected-product"';
			echo '>Таблица умножения на ' . $i . '</a>';
		}
		?>
	</div>
	<?php
	if (isset($_GET['html_type'])) {
		if ($_GET['html_type'] == 'TABLE') {
			outTableForm();
		} else {
			outDivForm();
		}
	} else {
		outTableForm();
	}
	?>
	<footer>
		<?php
		if (!isset($_GET['html_type']) || $_GET['html_type'] == 'TABLE')
			$s = 'Табличная верстка. ';
		else
			$s = 'Блочная верстка. ';
		if (!isset($_GET['content']))
			$s .= 'Таблица умножения полностью. ';
		else
			$s = 'Столбец таблицы умножения на ' . $_GET['content'] . '. ';
		echo $s . date('d.Y.M h:i:s');
		?>
	</footer>
</body>


</html>