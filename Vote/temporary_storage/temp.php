<ul id='voteList'>
        
        
        
        
                <a href='?do=vote_result&id=<?= $subject['id'] ?>'>
                    <li id='voteList-items'>
                        <!-- 投票名稱 -->
                        <div><?= $subject['subject'] ?></div>
            <?php
                        if ($subject['multiple'] == 0) {
            ?>
                            <div class='text-center'>單選題</div>
            <?php
                        } else {
            ?>
                            <div class='text-center'>複選題</div>
                        <?php
                        }
            ?>
        
        
                        <!-- 時間 -->
                        <div class='text-center'>
                            <?= $subject['start'] . " ~ " . $subject['end'] ?>
                        </div>
                        <div class='text-center'>
        
        
                        <!-- 剩餘天數 -->
            <?php
                        //計算剩餘天數
                        if ((strtotime($subject['end']) - strtotime("now")) > 0) {
                            $remain = floor((strtotime($subject['end']) - strtotime("now")) / (60 * 60 * 24));
            ?>
                        <p>倒數<?= $remain ?>天結束</p>
            <?php
                            } else {
            ?>
                        <span style='color:grey'>投票已結束</span>
            <?php
                            }
            ?>
                        </div>
        
                        <!-- 人數 -->
                        <div class='text-center'>
                            <?= $subject['total'] ?>
                        </div>
                    </li>
                </a>
                </ul>