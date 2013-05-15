 <title>超馬選手查詢</title>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
<form action="sel.php">第
<select name="day">
 <option>1</option>
 <option>2</option>
 <option >3</option>
 <option >4</option>
 </select>天成績排名   
  排序方式依賽程分類
 <select name ="cat">
 <option value="1">單日賽 </option>
 <option value="2">雙日賽</option>
 <option value="0">全程賽</option>
 </select>
 
  和<select name ="sex">排名
 <option>Female</option>
 <option>Male</option>
</select>

<input type="submit" value="確定"
       style="color: #FFFFFF; font-size: 12pt;
       background-color: #FF8901" /><br>
	   </form>
<form action="sel.php">第
<select name="dayall">
 <option>1</option>
 <option>2</option>
 <option>3</option>
 <option>4</option>
</select> 天總表排名
<input type="submit" value="確定"
       style="color: #FFFFFF; font-size: 12pt;
       background-color: #FF8901" /><br>
	   </form>
	   
<?php
$a=$_GET["sex"];
$bb=$_GET["day"];
$c=$_GET["dayall"];
$ca=$_GET["cat"];
 if($ca==1){
 $st="單日賽";
 }
 else if($ca==2){
 $st="雙日賽";
 }
 else if($ca==0){
 $st="全程賽";
 }
 
if($a=="Male")
{$a="M";
 $gg="男性";
}
else if($a=="Female"){
$a="F";
$gg="女性";
} 
if($bb==1){
$str="SELECT*FROM`runday$bb` WHERE`Gender`='$a' AND `Cate`='$ca' order by `Time` ;";  
$dd = "一";
echo $str;
}
if($bb==2){
$str="SELECT*FROM `runday2` WHERE`Gender`='$a' AND `Cate`='$ca' order by `Time` ;";  
$dd = "二";
echo $str;
}
if($bb==3){
$str="SELECT*FROM `runday3` WHERE`Gender`='$a' AND `Cate`='$ca'  order by `Time` ;";  
$dd = "三";
echo $str;
}
if($bb==4){
$str="SELECT*FROM`runday$bb` WHERE`Gender`='$a' AND `Cate`='$ca' order by `Time` ;";  
$dd = "四";
echo $str;
}
if($c==1){
$str="SELECT*FROM`runday$c`   order by `Time` ;";  
echo $str;
}
if($c==2){
$str="SELECT*FROM`runday$c`    order by `Time` ;";  
echo $str;
}
if($c==3){
$str="SELECT*FROM`runday$c`   order by `Time` ;";  
echo $str;
}
if($c==4){
$str="SELECT*FROM`runday$c`   order by `Time` ;";  
echo $str;
}
$link_ID = mysql_connect("127.0.01","root","1111");  
mysql_select_db("fj");  
mysql_query("SET NAMES BIG5");
//mysql_query("SET CHARACTER_SET utf8");
$result = mysql_query($str,$link_ID);  
$sn_index = mysql_num_rows($result); //查詢結果的記錄筆數（rows）
?>
<H1 align="center">第<?php echo$dd.$c?>天<?php echo $st .$gg?>選手排名</H1>
<HR>
<h2 align="center">選手排名</h2>
 
<br><br><br>
<TABLE ALIGN=center BORDER=5 >
<TR ALIGN =CENTER>
<TD>
排名
</TD>
<TD>
號碼
</TD>
<TD WIDTH = 100>
ID編號
</TD>
<TD WIDTH = 120>
抵達時間
</TD>
<TD WIDTH = 120>
花費時間
</TD>
<TD >
性名
</TD>
<TD  >
性別
</TD>
<TD>
組別
</TD>
<TD>
產生證書
</TD>
</TR> 
<? 
$tt=0;
while (list($a,$b,$c,$d,$e,$f,$g)=mysql_fetch_row($result)){
$tt ++; 
?>
<TR ALIGN =CENTER>
<TD><?echo $tt;?></TD> 
<TD><?echo $a;?></TD> 
<TD WIDTH = 100><?echo $b;?></TD> 
<TD WIDTH = 120><?echo $c;?></TD>
<TD WIDTH = 120><?echo $d;?></TD>
<TD WIDTH = 150><?echo $e=iconv("big5","UTF-8",$e);?></TD> 
<TD ><?echo $f;?></TD> 
<TD><?echo $g;?></TD> 
<TD>
<form   action="paper.php" >
<input type="hidden" name="q"  value="<?php echo $c?>">
<input type="hidden" name="w"  value="<?php echo $e?>">
<input type="hidden" name="r"  value="<?php echo $d?>">
<input type="hidden" name="t"  value="<?php echo $ca?>">
<input  type="submit" value="產生證書">
</form>
  

</TD> 
</TR>
<?}; 
mysql_close($link_ID); 

?>