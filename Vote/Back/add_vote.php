<div class="container-box add_vote">
    <form action="./api/add_vote.php" method="post">
    <!-- <form action="./api/test.php" method="post"> -->

        <div >
            <!-- 投票主題 -->
            <label for="subject">Topic：</label>
            <input type="text" name="subject" id="subject" required>
        </div>


        <div>
            <label>Category：</label>
            <select name="type_str" id="types">
                <?php
                $types = all("types");
                foreach ($types as $type) {
                ?>
                    <option value="<?= $type['id'] ?>+<?= $type['name'] ?>">
                                   <?= $type['name'] ?>
                    </option>
                <?php
                }
                ?>
            </select>
        </div>
        

        
        <div style="padding-right: 60px">
                <!-- 投票有效時間 -->
                <label >Expires On：</label>
                <input type="date" name="end" required>
        </div>

        <div>
            &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
            <input type="radio" name="multiple" value="0" checked>
            <label>Single Choose</label>
            <input type="radio" name="multiple" value="1">
            <label>Multiple Choose</label>
        </div>
        <div id="options">
            
            <input type="button" value="Add New Option" onclick="more()" id="addopt">
            <br>
            <div>
                <label>Answers Option：</label>
                <input type="text" name="option[]"  required>
            </div>
        </div>
        <input type="submit" value="Add Vote" id="submit">

    </form>
</div>


<script>
    function more() {
        let opt = `<div><label>Option：</label><input type="text" name="option[]"></div>`;
        let opts = document.getElementById('options').innerHTML;
        opts = opts + opt;
        document.getElementById('options').innerHTML = opts;
    }
</script>


