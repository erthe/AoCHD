/**
*
*  timeValidate 1.0 - 簡易時刻チェック
*  Copyright (c) 2008 IRONHEARTS, Inc.
*
*  http://tech.ironhearts.com/blog/
*
*  Dual licensed under the MIT and GPL licenses:
*  http://www.opensource.org/licenses/mit-license.php
*  http://www.gnu.org/licenses/gpl.html
*
*  @description simple time validate
*
*  usage : ("#time_field").timeValidate();
*
*  入力された時刻が、H:i フォーマットであることをチェック
*
* ("#time_field").timeValidate({maxHour:12,maxMin:60);
*
*  
*
**/

function timeValidate(opt) {
	var maxHour = 24;
	var minHour = 0;
	var maxMin = 60;
	var minMin = 0;
	var maxSec = 60;
	var minSec = 0;
	var ret = false;
	var target = opt;
	var result = null;

	// 入力が空だった場合
	if(target == ""){
		return false;
	}else{
		//return true;
	}

	//
	// 秒を使う
	//
	result = target.match(/^([0-9]{1,2}):([0-9]{1,2}):([0-9]{1,2})$/);
	if(result != null){

		var h = parseInt(result[1],10);
		var m = parseInt(result[2],10);
		var s = parseInt(result[3],10);

		if((minHour <= h && h < maxHour) &&
			(minMin <= m && m < maxMin) &&
			(minSec <= s && s < maxSec)){
			
			ret = true;
		
		}else{
			// format error
			ret = false;
		}
	}
	return ret;
}