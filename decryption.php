<?php
$content=$_POST['content'];
$key=$_POST['key'];
$zifu=array(chr(33),chr(34),chr(35),chr(36),chr(37),chr(38),chr(39),chr(40),chr(41),chr(42),
            chr(43),chr(44),chr(45),chr(46),chr(47),chr(58),chr(59),chr(60),chr(61),chr(62),
            chr(63),chr(64),chr(91),chr(92),chr(93),chr(94),chr(95),chr(96),chr(123),chr(124),
            chr(125),chr(126));
for($i=0;$i<strlen($content);$i++)
{ 
	if($content[$i]>='a'&&$content[$i]<='z')
	{
		$content[$i]=chr(ord('a')+(ord($content[$i])-ord('a')-$key%26+26)%26);
	}
	elseif($content[$i]>='A'&&$content[$i]<='Z')
	{
		$content[$i]=chr(ord('A')+(ord($content[$i])-ord('A')-$key%26+26)%26);
	}
	elseif($content[$i]>='0'&&$content[$i]<='9')
	{
		$content[$i]='0'+($content[$i]-'0'-$key%10+10)%10;
	}
	else
	{
		for($j=0;$j<32;$j++)
			if($content[$i]==$zifu[$j])
			{
				$k=($j-$key%32+32)%32;
			}
		$content[$i]=$zifu[$k];
	}
}
echo $content;
?>