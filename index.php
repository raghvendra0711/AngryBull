<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
<?php


$ch = curl_init();

$Axis_TodayTopGainers_indexCode = isset($_GET['Axis_TodayTopGainers_indexCode']) ? $_GET['Axis_TodayTopGainers_indexCode']: 20559;

curl_setopt($ch, CURLOPT_URL,"https://simplehai.axisdirect.in/app/index.php/market/equity/stockbuzztopgainer?exchange=nse&duration=today&id=gainer&index=$Axis_TodayTopGainers_indexCode&sector=-");
curl_setopt($ch, CURLOPT_POST, 1);

// in real life you should use something like:
curl_setopt($ch, CURLOPT_POSTFIELDS, 
          http_build_query(array('refresh' => '1')));

// receive server response ...
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);

$Axis_TodayTopGainers = curl_exec ($ch);

curl_close ($ch);

$Axis_TodayTopGainers = json_decode($Axis_TodayTopGainers,true);

?>
<div style="text-align: center;">

	<a style="text-align: center;font-size: 20px;margin: 10px;" href="javascript:void(0);" onclick="$('.Axis_TodayTopGainers_indexCode').toggle()">Axis Today Top Gainers</a>
	<div class="Axis_TodayTopGainers_indexCode" style="display: none;">
		<select id="Axis_TodayTopGainers_indexCode">
			<option>select Sector Code</option>
			<option value="27176">Nifty 100</option>
			<option value="51461">Nifty 100 Equal Weight</option>
			<option value="43706">Nifty 100 Liquid 15</option>
			<option value="72059">Nifty 100 Low Volatility 30</option>
			<option value="41356" selected="selected">Nifty 200</option>
			<option value="20559">Nifty 50</option>
			<option value="72058">Nifty 50 Equal Weight</option>
			<option value="22115">Nifty 500</option>
			<option value="42900">Nifty Alpha 50</option>
			<option value="41328">Nifty Auto</option>
			<option value="26753">Nifty Bank</option>
			<option value="41383">Nifty Commodities</option>
			<option value="41327">Nifty Consumption</option>
			<option value="44375">Nifty CPSE</option>
			<option value="41490">Nifty Dividend Opportunities 50</option>
			<option value="26768">Nifty Energy</option>
			<option value="41384">Nifty Financial Services</option>
			<option value="30183">Nifty FMCG</option>
			<option value="45645">Nifty Growth Sectors 15</option>
			<option value="28203">Nifty Infrastructure</option>
			<option value="24484">Nifty IT</option>
			<option value="41359">Nifty Media</option>
			<option value="41329">Nifty Metal</option>
			<option value="26771">Nifty Midcap 100</option>
			<option value="28303">Nifty Midcap 50</option>
			<option value="67025">Nifty Midcap Liquid 15</option>
			<option value="28647">Nifty MNC</option>
			<option value="22113">Nifty Next 50</option>
			<option value="26769">Nifty Pharma</option>
			<option value="67813">Nifty Private Bank</option>
			<option value="30186">Nifty PSE</option>
			<option value="28254">Nifty PSU Bank</option>
			<option value="28253">Nifty Realty</option>
			<option value="33917">Nifty Services Sector</option>
			<option value="40939">Nifty Smallcap 100</option>
			<option value="67027">Nifty100 Quality 30</option>
			<option value="44452">Nifty50 Value 20</option>
		</select>
		<ul class="curosal curosal_con-dis clearfix" style="position: relative; transition-duration: 0s; transform: translate3d(0px, 0px, 0px);">
			<?php 
				foreach ($Axis_TodayTopGainers as $Axis_TodayTopGainer) { 
					//echo "<pre>";print_r($Axis_TodayTopGainer);
			?>
			<li class="ui-tabs-active" style="float: left;list-style: none;position: relative;width: 275px;background: lightgreen;padding: 10px;margin: 5px;min-height: 150px !important;">
	           	<a href="<?= "https://www.google.co.in/search?q=NSE:".$Axis_TodayTopGainer['symbol'] ?>" target="_blank">
		           <p class="mar-name" id="stockbuzz_name_1745"><?= $Axis_TodayTopGainer['co_name'] ?></p>
		       	</a>
	           	<p class="mar-per mar-name-gap" id="stockbuzz_per_1745"><?= $Axis_TodayTopGainer['buyprice'] ?> (<?= round($Axis_TodayTopGainer['perchange'],2) ?> %)</p>
	           	<a href="javascript:void(0);" onclick="$(this).next('ul').toggle()">Show More</a>
	           	<ul style="display: none;margin: 0px;padding: 5px;">
	       		<?php foreach ($Axis_TodayTopGainer as $key => $param) { ?>
	       			<li style="list-style: none;"><?= $key ?> : <?= $param ?></li>
	       		<?php } ?>
	           	</ul>
			</li>
			<?php } ?>
		</ul>
	</div>
</div>
<br/>
<?php

$ch = curl_init();

$Axis_TopPerformers_indexCode = isset($_GET['Axis_TopPerformers_indexCode']) ? $_GET['Axis_TopPerformers_indexCode']: 20559;
$Axis_TopPerformers_Section = isset($_GET['Axis_TopPerformers_Section'])? $_GET['Axis_TopPerformers_Section']:'lumpsum';
$Axis_TopPerformers_Amount = $Axis_TopPerformers_Section == 'lumpsum'? 100000: 10000;
curl_setopt($ch, CURLOPT_URL,"https://simplehai.axisdirect.in/app/index.php/market/equity/getTopPerformerData?section=$Axis_TopPerformers_Section&exchange=NSE&investmentAmt=$Axis_TopPerformers_Amount&period=1&indexCode=$Axis_TopPerformers_indexCode&sectorCode=-");
curl_setopt($ch, CURLOPT_POST, 1);

// in real life you should use something like:
curl_setopt($ch, CURLOPT_POSTFIELDS, 
          http_build_query(array('refresh' => '1')));

// receive server response ...
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);

$Axis_TopPerformers = curl_exec ($ch);

curl_close ($ch);

$Axis_TopPerformers = json_decode($Axis_TopPerformers,true);
//echo "<pre>";print_r($Axis_TopPerformers);exit;

?>
<div style="text-align: center;">

	<a style="text-align: center;font-size: 20px;margin: 10px;" href="javascript:void(0);" onclick="$('.Axis_TopPerformers_indexCode').toggle()">Axis Top Performer - <?= $Axis_TopPerformers_Section ?> - Rs <?= $Axis_TopPerformers_Amount ?> (1 Year)</a>
	<div class="Axis_TopPerformers_indexCode" style="display: none;">
		<select id="Axis_TopPerformers_Section">
			<option value="lumpsum">Lumpsum</option>
			<option value="sip">SIP</option>
		</select>
		<select id="Axis_TopPerformers_Period">
			<option value="1">1 Year</option>
			<option value="2">2 Year</option>
		</select>
		<select id="Axis_TopPerformers_indexCode">
			<option>select Sector Code</option>
			<option value="27176">Nifty 100</option>
			<option value="51461">Nifty 100 Equal Weight</option>
			<option value="43706">Nifty 100 Liquid 15</option>
			<option value="72059">Nifty 100 Low Volatility 30</option>
			<option value="41356" selected="selected">Nifty 200</option>
			<option value="20559">Nifty 50</option>
			<option value="72058">Nifty 50 Equal Weight</option>
			<option value="22115">Nifty 500</option>
			<option value="42900">Nifty Alpha 50</option>
			<option value="41328">Nifty Auto</option>
			<option value="26753">Nifty Bank</option>
			<option value="41383">Nifty Commodities</option>
			<option value="41327">Nifty Consumption</option>
			<option value="44375">Nifty CPSE</option>
			<option value="41490">Nifty Dividend Opportunities 50</option>
			<option value="26768">Nifty Energy</option>
			<option value="41384">Nifty Financial Services</option>
			<option value="30183">Nifty FMCG</option>
			<option value="45645">Nifty Growth Sectors 15</option>
			<option value="28203">Nifty Infrastructure</option>
			<option value="24484">Nifty IT</option>
			<option value="41359">Nifty Media</option>
			<option value="41329">Nifty Metal</option>
			<option value="26771">Nifty Midcap 100</option>
			<option value="28303">Nifty Midcap 50</option>
			<option value="67025">Nifty Midcap Liquid 15</option>
			<option value="28647">Nifty MNC</option>
			<option value="22113">Nifty Next 50</option>
			<option value="26769">Nifty Pharma</option>
			<option value="67813">Nifty Private Bank</option>
			<option value="30186">Nifty PSE</option>
			<option value="28254">Nifty PSU Bank</option>
			<option value="28253">Nifty Realty</option>
			<option value="33917">Nifty Services Sector</option>
			<option value="40939">Nifty Smallcap 100</option>
			<option value="67027">Nifty100 Quality 30</option>
			<option value="44452">Nifty50 Value 20</option>
		</select>
		<ul class="curosal curosal_con-dis clearfix" style="position: relative; transition-duration: 0s; transform: translate3d(0px, 0px, 0px);">
			<?php 
				foreach ($Axis_TopPerformers['gridData'] as $Axis_TopPerformer) { 
					//echo "<pre>";print_r($Axis_TopPerformer);
			?>
			<li class="ui-tabs-active" style="float: left;list-style: none;position: relative;width: 275px;background: lightgreen;padding: 10px;margin: 5px;min-height: 150px !important;">
	           	<a href="<?= 'https://www.google.co.in/search?q=NSE:'.$Axis_TopPerformer['symbol'] ?>" target="_blank">
		           <p class="mar-name" id="stockbuzz_name_1745"><?= $Axis_TopPerformer['co_name'] ?> (<?= $Axis_TopPerformer['index_name'] ?>)</p>
		       	</a>
	           	<p class="mar-per mar-name-gap" id="stockbuzz_per_1745"> CMP: <?= $Axis_TopPerformer['close_price'] ?></p>
	           	<p>LumSum: <?= round($Axis_TopPerformer['LumpsumValue'],2) ?> (<?= round($Axis_TopPerformer['LumpSum_Returns'],2) ?> %)</p>
	           	<a href="javascript:void(0);" onclick="$(this).next('ul').toggle()">Show More</a>
	           	<ul style="display: none;margin: 0px;padding: 5px;">
	       		<?php foreach ($Axis_TopPerformer as $key => $param) { ?>
	       			<li style="list-style: none;"><?= $key ?> : <?= $param ?></li>
	       		<?php } ?>
	           	</ul>
			</li>
			<?php } ?>
		</ul>
	</div>
</div>
<script type="text/javascript">
$(function(){
  
	$("#Axis_TodayTopGainers_indexCode").change(function(){
		window.location='http://localhost:8080/?Axis_TodayTopGainers_indexCode=' + this.value
	});


	$("#Axis_TopPerformers_indexCode,#Axis_TopPerformers_Section").change(function(){
		var params = { Axis_TopPerformers_indexCode: $('#Axis_TopPerformers_indexCode').val(), Axis_TopPerformers_Section: $('#Axis_TopPerformers_Section').val() };
		var str = jQuery.param( params );
		window.location='http://localhost:8080/?' + str
	});

	$("#Axis_TodayTopGainers_indexCode").val(<?= $Axis_TodayTopGainers_indexCode ?>);
	$("#Axis_TopPerformers_indexCode").val(<?= $Axis_TopPerformers_indexCode ?>);
	$('#Axis_TopPerformers_Section').val(<?= $Axis_TopPerformers_Section ?>);
  
});
</script>