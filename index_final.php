<?php
$dbCombos = array(
	array(
		"product_id" => 1,
		"combination_name" => "<a href=\"#\">Green</a> &bull; <a href=\"#\">128 GB</a>",
		"combination_string" => "Green, 128 GB",
	),
	array(
		"product_id" => 2,
		"combination_name" => "<a href=\"#\">Green</a> &bull; <a href=\"#\">256 GB</a>",
		"combination_string" => "Green, 256 GB",
	),
	array(
		"product_id" => 3,
		"combination_name" => "<a href=\"#\">Red</a> &bull; <a href=\"#\">128 GB</a>",
		"combination_string" => "Red, 128 GB",
	),
	array(
		"product_id" => 4,
		"combination_name" => "<a href=\"#\">Red</a> &bull; <a href=\"#\">256 GB</a>",
		"combination_string" => "Red, 256 GB",
	),
);

function match_product($name,$dbCombos,$id=0) {
	foreach ($dbCombos as $dbItem) {
		if ($id !== 0) continue;
		if (strpos($name,$dbItem['combination_string']) !== false) {
			$id =$dbItem['product_id'];
			break;
		}
	}
	return $id;
}

function possible_combos($dbCombos,$groups, $prefix='', $prefix2='', &$matches=[]) {
	$result = array();
	$group = array_shift($groups);

	foreach($group as $k => $selected) {
		if ($groups) {
			$result = array_merge($result, possible_combos($dbCombos,$groups, $prefix . '<a href="#">'.$selected.'</a>'. ' &bull; ', $prefix2 .$selected.', ', $matches));
		} else {
			$name = $prefix2.$selected;
			$id = match_product($name,$dbCombos);
			$result[] = [
				'product_id' => in_array($id, $matches)?0:$id,
				'combination_name' => $prefix . '<a href="#">'.$selected.'</a>',
				'combination_string' => $name,
			];
			$matches[] =$id;
		}
	}
	return $result;
}


// ------------- change variant
$dynamicCombos = [
	'Color' => ['Green','Red'],
	'Storage' => ['128 GB','256 GB','512 GB',],
	'Memory' => ['2 GB','4 GB'],
];
echo "\n\r\n\r Case:1 / add: Memory 2GB ==============================";
$res =possible_combos($dbCombos,$dynamicCombos);


echo "\n\r";

// var_dump($data2);