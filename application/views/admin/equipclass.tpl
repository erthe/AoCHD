<div class="window-container">

	{$item.item_name} 装備クラス一覧	
    <form id="edit-equip" method="post" action="equipupdate">
        <fieldset>
            <table class="table-center">
                
                {$trno = 0}
                {$tdno = 1}
                {$no = 0}
                {$class_id = 1}
                
                <tr id="trno_{$no}" class="list">
                {foreach item=class from=$classes}
                	{$classid = 'classid_'|cat:$class_id}
	                <td><label>{$class.class_name}: </label></td>
	                <td><select name="classid_{$tdno}">
							<option value="0" {if $item.$classid == '0'}selected{/if}>☓</option>
                       		<option value="1" {if $item.$classid == '1'}selected{/if}>○</option>
                       	</select>
					</td>
	                {$tdno = $tdno + 1}
	                {$trno = $trno + 1}
	                {$no = $no + 1}
	                {if $trno >= 5}</tr><tr id="trno_{$no}" class="list">{$trno = 0}{/if}
	                {$class_id = $class_id + 1} 
				{/foreach}
				</tr>
                
                <tr>
                    <td>
                        <input type="hidden" name="equip_class_id" value="{$item.equip_class_id}">
                        <input id="equip_update" type="submit" value="送信"><input type="reset" value="リセット"></td>
                </tr>
                                
                <tr>
                	<td colspan="2">
                		<input type="button" id="closetb" value="閉じる">
                	</td>
                </tr>
            </table>
        </fieldset>
    </form>

</div>
<script "text/javascript" src="../themes/js/thickboxuseadmin.js"></script>