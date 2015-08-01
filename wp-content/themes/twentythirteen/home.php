<?php
/*
	Template Name: owghat
*/
?>

<form action="owghat" dir="rtl" action="" method="post">
	<select  id="city" name="city">
	<option value="tehran">تهران</option>
	<option value="mashhad">مشهد</option>
	<option value="ahvaz">اهواز</option>
	<option value="esfahan">اصفهان</option>
	<option value="tabriz">تبریز</option>
	<option value="shiraz">شیراز</option>
	<option value="birjand">بیرجند</option>
	<option value="zahedan">زاهدان</option>
	<option value="esfahan">اصفهان</option>
	<option value="semnan">سمنان</option>
	<option value="karaj">کرج</option>
	<option value="urmia">ارومیه</option>
	<option value="rasht">رشت</option>
	<option value="Zanjan">زنجان</option>
	<option value="Qazvin">قزوین</option>
	<option value="Kerman">کرمان</option>
		  
	
	</select>
	
	<select id="month" name="month">
    <option value="1" >فروردین</option>
    <option value="2">اردیبهشت</option>
    <option value="3">خرداد</option>
    <option value="4">تیر</option>
    <option value="5">مرداد</option>
    <option value="6">شهریور</option>
    <option value="7">مهر</option>
    <option value="8">آبان</option>
    <option value="9">آذر</option>
    <option value="10">دی</option>
    <option value="11">بهمن</option>
    <option value="12">اسفند</option>
    </select>
	
	<select id="day" name="day">   
	
	<?php  for ($i=1 ; $i<32 ; $i++){?>
    <option value="<?php echo $i ?>" > <?php echo $i ?></option>
    <?php } ?>
	</select>
    <input type="button" value="محاسبه" onclick="check_click()"></td>
</form>
	

<script>
	function check_click(){
		var e = document.getElementById("city");
		var strUser = e.options[e.selectedIndex].value;
		var a = document.getElementById("month");
		var strUser1 = a.options[a.selectedIndex].value;
		var b = document.getElementById("day");
		var strUser2 = b.options[b.selectedIndex].value;
		window.location.href= "mohasebe?city=" + strUser  +"&month=" + strUser1 + "&day=" + strUser2 ; 
	}
</script>