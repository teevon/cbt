<?php
$score = 0;
$ansSheet = $_POST["ansString"];
$answers = explode(",", $ansSheet);

$jsonFile = fopen("answers.json", "r") or die("unable to view marking scheme!");
$jsonStr = fread($jsonFile, filesize("answers.json"));
fclose($jsonFile);

$mScheme = json_decode($jsonStr, true);
$mSchemeAnswers = $mScheme['answers'];
$mSchemeLength = count($mSchemeAnswers);

for ($i=0; $i < $mSchemeLength;$i++ ) {
	if ($answers[$i] == $mSchemeAnswers[$i]["answer"]) {
		$score = $score + $mSchemeAnswers[$i]["weight"];
	}
}

echo ($score);

?>