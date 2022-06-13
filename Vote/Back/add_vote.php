<form action="../api/add_vote.php" method="post">
    <div>
        <label for="subject">投票主題</label>
        <input type="text" name="subject" id="subject">
        <input type="button" value="新增選項" onclick="more()" >
    </div>
    <div id="options">
        <label for="option"></label><input type="text" name="option[]">
    </div>
    <input type="submit" value="新增" >

</form>
<script>
    function more(){
        let opt=`<label for="option"></label><input type="text" name="option[]">`
    }
</script>