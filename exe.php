<?php
if(isset($_POST['detect'])){

	echo '<h3 style="color:#ff0066; font-weight:bold; text-decoration:underline;">Analysis Result</h3><br><div class="row" style="margin-bottom:30px;"><br>';
	
	$exp=explode(".", $_POST['text1']);
	$count=count($exp);
	if($count<=3){
			
			
			if(($count==1) || ($exp[1]=='') || ($exp[1]==' ')){
			
	echo '<p style="text-align:left; font-weight:bold; font-size:20px; color: #1a75ff;"><font style="text-decoration:underline;">Text:</font> <font style="color:black;">'.$_POST['text1'].'</font></p>';
	echo '<p style="text-align:left; font-weight:bold; font-size:20px; color: #1a75ff;"><font style="text-decoration:underline;">Num Characters:</font> <font style="color:black;">'.strlen($_POST['text1']).'</font></p>';
	echo '<p style="text-align:left; font-weight:bold; font-size:20px; color: #1a75ff;"><font style="text-decoration:underline;">Num Words:</font> <font style="color:black;">'.str_word_count($_POST['text1']).'</font></p><br>';
			
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
	
	 if((strpos($res2[0], "No results found for")) || (strpos($res2[0], "Search instead for")) || (strpos($res2[0], "did not match any documents"))) {
		
			echo '<div align="center" style="margin-top:8px; border:dashed 1px lavender; padding:8px;">
			<p style="font-family:Arial; color:#00cc66;"> <span style="font-size:28px; color:black;">PLAGIARISED RATE : </span> <span style="font-weight:900; font-size:34px;">0%</span> &nbsp; </p></div>';
	}else{
	echo '<div align="center" style="margin-top:8px; border:dashed 1px lavender; padding:8px;">
			<p style="font-family:Arial; color:red;"> <span style="font-size:28px; color:black;">PLAGIARISED RATE : </span> <span style="font-weight:900; font-size:34px;">100%</span> &nbsp; </p></div>';
		echo $result = '
		<p style="text-decoration:underline;text-align:left; font-weight:bold; font-size:20px; color:#ff0066;">Source</p> <div style="border:1px dashed lavender; padding:15px;"><div class="ZINbbc xpd O9g5cc uUPGi" style="text-align:left;">'.str_ireplace('/url?q=','',$res2[0]).'</div><hr><br>'; 
	}
	
		
		
		
	}else if(($count>1) || ($exp[2]==' ') || ($exp[2]=='')){ 
		////////////////////////////////////
		echo '<p style="text-align:left; font-weight:bold; font-size:20px; color: #1a75ff;"><font style="text-decoration:underline;">Text:</font> <font style="color:black;">'.$_POST['text1'].'</font></p>';
	echo '<p style="text-align:left; font-weight:bold; font-size:20px; color: #1a75ff;"><font style="text-decoration:underline;">Num Characters:</font> <font style="color:black;">'.strlen($_POST['text1']).'</font></p>';
	echo '<p style="text-align:left; font-weight:bold; font-size:20px; color: #1a75ff;"><font style="text-decoration:underline;">Num Words:</font> <font style="color:black;">'.str_word_count($_POST['text1']).'</font></p><br>';
			
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
	
	 if((strpos($res2[0], "No results found for")) || (strpos($res2[0], "Search instead for")) || (strpos($res2[0], "did not match any documents"))) {
		$one=0;
			echo '<div align="center" style="margin-top:8px; border:dashed 1px lavender; padding:8px;background-color:#e5faff;">
			'.$exp[0].'<hr>
			<p style="font-family:Arial; color:#00cc66;"> <span style="font-size:28px; color:black;">PLAGIARISED RATE : </span> <span style="font-weight:900; font-size:34px;">0%</span> &nbsp; </p></div><br>';
	}else{
		$one=50;
	echo '<div align="center" style="margin-top:8px; border:dashed 1px lavender; padding:8px;background-color:#e5faff;">'.$exp[0].'<hr>
			<p style="font-family:Arial; color:red;"> <span style="font-size:28px; color:black;">PLAGIARISED RATE : </span> <span style="font-weight:900; font-size:34px;">100%</span> &nbsp; </p><hr>';
		echo $result = '
		<p style="text-decoration:underline;text-align:left; font-weight:bold; font-size:20px; color:#ff0066;">Source</p> <div style="border:1px dashed lavender; padding:15px;"><div class="ZINbbc xpd O9g5cc uUPGi" style="text-align:left;">'.str_ireplace('/url?q=','',$res2[0]).'</div></div><br>'; 
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
	
	 if((strpos($res2a[0], "No results found for")) || (strpos($res2a[0], "Search instead for")) || (strpos($res2a[0], "did not match any documents"))) {
		$two=0;
			echo '<div align="center" style="margin-top:8px; border:dashed 1px lavender; padding:8px; background-color:#e5faff;">
			'.$exp[1].'<hr>
			<p style="font-family:Arial; color:#00cc66;"> <span style="font-size:28px; color:black;">PLAGIARISED RATE : </span> <span style="font-weight:900; font-size:34px;">0%</span> &nbsp; </p></div>';
	}else{
		$two=50;
	echo '<div align="center" style="margin-top:8px; border:dashed 1px lavender; padding:8px; background-color:#e5faff;">'.$exp[1].'<hr>
			<p style="font-family:Arial; color:red;"> <span style="font-size:28px; color:black;">PLAGIARISED RATE : </span> <span style="font-weight:900; font-size:34px;">100%</span> &nbsp; </p><hr>';
		echo '
		<p style="text-decoration:underline;text-align:left; font-weight:bold; font-size:20px; color:#ff0066;">Source</p> <div style="border:1px dashed lavender; padding:15px;"><div class="ZINbbc xpd O9g5cc uUPGi" style="text-align:left;">'.str_ireplace('/url?q=','',$res2a[0]).'</div></div><br>'; 
	}
	
	$tot=$one+$two;
	if($tot<=50){
		$col='#00cc66;';
	}else{
		$col='red';
	}
	
	echo '<p style="text-decoration:underline;text-align:left; font-weight:bold; font-size:20px; color:#ff0066;">Total</p><div align="center" style="margin-top:8px; border:solid 3px #e6b800; padding:8px; background-color:#fffae5;">
			<p style="font-family:Arial; color:'.$col.';"> <span style="font-size:28px; color:black;">PLAGIARISED RATE : </span> <span style="font-weight:900; font-size:34px;">'.$tot.'%</span> &nbsp; </p></div><br><br>';
		
		
		///////////////////////////////////
	}else{ }
		
		
		
		
		
		
		
		
		

	//////////////////////////////////////////////////

		
		
	}else{
		echo '<div class="alert alert-danger alert-dismissable" style="margin-top:8px;">
			<p class="pull-left"><i class="fa fa-ban"></i> &nbsp; Oops! &nbsp; 2 Sentences exceeded.</p>
				<div class="clearfix"></div></div>';
	}
		}
	
	
	
	/* $rate=$r=0;
	$arr=str_ireplace(",","",str_ireplace(".","",$_POST['text1']));
	$em=str_split($_POST['text1'],20);
	if(count($em)>0){
			echo '<div class="col-md-6" style="border:1px solid gray;"> <br><h4 style="text-decoration:underline;">Plagisrized Phrases</h4><br><div align="left" style="max-height:500px; overflow-x:auto;">';
		$no=0;
	for($i=0; $i<count($em); $i++){
		$com = stristr($_POST['text2'],$em[$i]);
		if($com){
			$no=$no+1;
			$r=1;
			
			$highlighted_text = "<span style='font-weight:bold; color:#ffc300;'>".$em[$i]."</span>";
			echo $no.'. '.str_ireplace($em[$i], $highlighted_text, $_POST['text2']).'<hr>';
			
			
			
		}else{
			$no=$no+0;
			$r=0;
		}
		$rate +=$r;
	}
	echo '</div></div>';
	
	$per=(($rate/count($em))*100);
	if($per<=40){
		$color="green";
	}else if($per>40 && $per<=50){
		$color="#ffc300";
	}else if($per>50){
		$color="red";
	}

	echo '<div class="col-md-6" style="border:1px solid gray;"><br><h4 style="text-decoration:underline;">Detailed Analysis & Result </h4><br>';
	//to calc percentage
	echo 'Number of Text in Text Block 1 = '.strlen($_POST['text1']).'<br>';
	echo 'Number of Text in Text Block 2 = '.strlen($_POST['text2']).'<br>';
	echo 'Number of Chunk Similarities = '.$rate.'<br>';
	echo '<br><h4 style="font-weight:600;">Text 1 Plagiarism Rate= <span style="color:'.$color.';">'.round((($rate/count($em))*100),2).'%</span></h4><br>';
	
	echo '<br></div>';
	
	}else{
		echo '<div class="alert alert-danger alert-dismissable" style="margin-top:8px;">
			<p class="pull-left"><i class="fa fa-ban"></i> &nbsp; Oops! &nbsp; Unknown Request.</p>
				<div class="clearfix"></div></div>';
	}
	echo stristr("Hello world!","dos"); 
	
	echo '</div>';  */
	
	


?>