<div id="searchbar">
    <table style="width: 100%;">
        <tr>
            <td style="text-align: left;">
                <strong>1.</strong>
                <label for="task_select"></label>
                &nbsp;<select id="task_select" OnChange="gotosite(this.options[this.selectedIndex].value)">
                    <option value="">Select a Task</option>
                    <?php if (isset($tasks)) { foreach ($tasks as $task): extract($task); ?>
                        <option value="index.php?editor=<?= $curreditor ?>&tskid=<?= $id ?>"<?php if ($currtask == $id): ?> selected<?php endif; ?>><?= $title ?></option>
                    <?php endforeach; }?>
                </select>
            </td>
            <td style="text-align: right;"> or <strong>2.</strong>
                <form action="index.php" method="GET">
                    <input type="hidden" name="editor" value="tasks">
                    <input type="hidden" name="action" value="34">
                    <label for="search"></label>
                    <input type="text" id="search" name="search" size="22" value="Task Name"
                           onFocus="clearField(document.forms[0].search);">
                    <input type="submit" value=" GO ">
                </form>
            </td>
        </tr>
    </table>
</div>