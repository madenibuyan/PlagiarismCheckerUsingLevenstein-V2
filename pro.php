<?php

echo '<p style="text-align:left; font-weight:bold; font-size:20px; color:#ff0066;"><font style="text-decoration:underline;">Text:</font> <font style="color:black;">'.$exp[0].'</font></p>';
			
	$file1 = 'plagtext1.txt';
	$text1=str_replace(" ", "+", trim($exp[0]));
	$text = '%22'.$text1.'%22';
	
		$re= file_get_contents('https://www.google.com/search?q='.$text);
		$myfile = fopen($file1, "w");
		fwrite($myfile, $re);
		fclose($myfile);
		
		$myf = fopen($file1, "r");
		$res= fread($myf,filesize($file1));
		fclose($myf);
		
		$res1=explode('<div class="ZINbbc xpd O9g5cc uUPGi">',$res);
		//echo $res1[1];
		
		$res2=explode('</div><div class="ZINbbc xpd O9g5cc uUPGi">',$res1[1]);
	
	 if((strpos($res2[0], "No results found for")) || (strpos($res2[0], "Search instead for"))) {
		$one=0;
			echo '<div align="center" style="margin-top:8px; border:dashed 1px lavender; padding:8px;">
			'.$exp[0].'<hr>
			<p style="font-family:Arial; color:#00cc66;"> <span style="font-size:28px; color:black;">PLAGIARISED RATE : </span> <span style="font-weight:900; font-size:34px;">0%</span> &nbsp; </p></div>';
	}else{
		$one=50;
	echo '<div align="center" style="margin-top:8px; border:dashed 1px lavender; padding:8px;">'.$exp[0].'<hr>
			<p style="font-family:Arial; color:red;"> <span style="font-size:28px; color:black;">PLAGIARISED RATE : </span> <span style="font-weight:900; font-size:34px;">100%</span> &nbsp; </p><hr>';
		echo $result = '
		<p style="text-decoration:underline;text-align:left; font-weight:bold; font-size:20px; color:#ff0066;">Source</p> <div style="border:1px dashed lavender; padding:15px;"><div class="ZINbbc xpd O9g5cc uUPGi" style="text-align:left;">'.str_ireplace('/url?q=','',$res2[0]).'</div></div><hr><br>'; 
	}
	
	$file2 = 'plagtext2.txt';
	$text2=str_replace(" ", "+", trim($exp[1]));
	$texts = '%22'.$text2.'%22';
	
		$re2= file_get_contents('https://www.google.com/search?q='.$texts);
		$myfile2 = fopen($file2, "w");
		fwrite($myfile2, $re2);
		fclose($myfile2);
		
		$myf2 = fopen($file2, "r");
		$res22= fread($myf2,filesize($file2));
		fclose($myf2);
		
		$res1a=explode('<div class="ZINbbc xpd O9g5cc uUPGi">',$res22);
		//echo $res1[1];
		
		$res2a=explode('</div><div class="ZINbbc xpd O9g5cc uUPGi">',$res1a[1]);
	
	 if((strpos($res2a[0], "No results found for")) || (strpos($res2a[0], "Search instead for"))) {
		$two=0;
			echo '<div align="center" style="margin-top:8px; border:dashed 1px lavender; padding:8px;">
			'.$exp[1].'<hr>
			<p style="font-family:Arial; color:#00cc66;"> <span style="font-size:28px; color:black;">PLAGIARISED RATE : </span> <span style="font-weight:900; font-size:34px;">0%</span> &nbsp; </p></div>';
	}else{
		$two=50;
	echo '<div align="center" style="margin-top:8px; border:dashed 1px lavender; padding:8px;">'.$exp[1].'<hr>
			<p style="font-family:Arial; color:red;"> <span style="font-size:28px; color:black;">PLAGIARISED RATE : </span> <span style="font-weight:900; font-size:34px;">100%</span> &nbsp; </p><hr>';
		echo '
		<p style="text-decoration:underline;text-align:left; font-weight:bold; font-size:20px; color:#ff0066;">Source</p> <div style="border:1px dashed lavender; padding:15px;"><div class="ZINbbc xpd O9g5cc uUPGi" style="text-align:left;">'.str_ireplace('/url?q=','',$res2a[0]).'</div></div><hr><br>'; 
	}
	
	$tot=$one+$two;
	if($tot<=50){
		$col='#00cc66;';
	}else{
		$col='red';
	}
	
	echo '<p style="text-decoration:underline;text-align:left; font-weight:bold; font-size:20px; color:#ff0066;">Total</p><div align="center" style="margin-top:8px; border:dashed 3px lavender; padding:8px;">
			<p style="font-family:Arial; color:'.$col.';"> <span style="font-size:28px; color:black;">PLAGIARISED RATE : </span> <span style="font-weight:900; font-size:34px;">'.$tot.'%</span> &nbsp; </p><hr>';
	
	?>