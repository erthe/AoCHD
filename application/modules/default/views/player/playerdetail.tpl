{include file=$header}
    
<div class="window-container">
	<h1>プレイヤー名: <span class="text-italic">{$player_info.player_name|escape}</span></h1>
	<ul class="nav nav-tabs">
		<li {if {$tab_status} === ''} class="active"{/if}><a href="#detail" data-toggle="tab">プレイヤー詳細</a></li>
		<li {if {$tab_status} === 'result'} class="active"{/if}><a href="#result" data-toggle="tab">対戦履歴</a></li>
		<li><a href="#rategraph" data-toggle="tab">レート遷移図</a></li>
		<li  {if {$tab_status} === 'editlog'} class="active"{/if}><a href="#editlog" data-toggle="tab">変更履歴</a></li>
	</ul>
	<div class="tab-content">
		<div class="tab-pane" id="detail">
			{include file=$rate_tpl}
			{include file=$playernote_tpl}
		</div>
		
		<div class="tab-pane" id="result">
			{include file=$match_tpl}
		</div>
		
		<div class="tab-pane active" id="rategraph">
			{include file=$ratetransition_tpl}
		</div>
		
		<div class="tab-pane" id="editlog">
			{include file=$rateedit_tpl}
		</div>
	</div>
    
</div>
<br /><br />
	<script language="JavaScript">
		var tab_status= "{$tab_status}";
        // first of all, Morris.js is needing target's Div elem status 'active', after drawing graph, active div elem to detail. 
        if (tab_status === "result"){
        	$("#result").attr("class","tab-pane active");
        } else if(tab_status === "editlog"){
        	$("#editlog").attr("class","tab-pane active");
        } else {
        	$("#detail").attr("class","tab-pane active");
        }
        $("#rategraph").attr("class","tab-pane");
    </script>
{include file =$footer}