<script>
    var member_id = '{$member_id}';
    var name = '{$name}';
    var result = '{$result}';

    {literal}
        if (result == 1) {
            var $form = $("insert_client");
            var data = $form.serializeArray();

            data.push({name: 'member_id', value: member_id});
            data.push({name: 'name', value: name});
            var url = 'redstone/index/memberregistration';

            submit_action(url, data, 'update');
        } else {
            alert('キャラクター名が存在しません。');
        }
    {/literal}
</script>
