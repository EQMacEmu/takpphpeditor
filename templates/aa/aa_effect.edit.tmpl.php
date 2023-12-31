<div class="edit_form" style="width:300px;">
    <div class="edit_form_header">
        <?php
        if (!empty($editmode) && $editmode == 1)
            echo "Edit AA Effect";
        else
            echo "Add New AA Effect";
        ?>
        <br/>
    </div>
    <div class="edit_form_content">
        <form name="aa_effect" method="post" action="index.php?editor=aa&aaid=<?php global $aaid;
        global $rank;
        echo($aaid - $rank + 1) ?>&rank=<?= $rank ?>&action=<?php if (!empty($editmode) && $editmode == 1) echo "13"; else echo "17"; ?>">
            <fieldset>
                <legend><b>Effect</b></legend>
                <table style="width: 100%;">
                    <tr>
                        <td>
                            <label for="slot">Slot:</label><br/>
                            <input type="text" id="slot" name="slot" size="5" value="<?= $slot ?? "" ?>"><br/><br/>
                        </td>
                        <td>
                            <label for="effectid">Effect:</label><br/>
                            <input type="text" id="effectid" name="effectid" size="5"
                                   value="<?= $effectid ?? "" ?>"><br/><br/>
                        </td>
                        <td>
                            <label for="base1">Base 1:</label><br/>
                            <input type="text" id="base1" name="base1" size="5" value="<?= $base1 ?? "" ?>"><br/><br/>
                        </td>
                        <td>
                            <label for="base2">Base 2:</label><br/>
                            <input type="text" id="base2" name="base2" size="5" value="<?= $base2 ?? "" ?>"><br/><br/>
                        </td>
                    </tr>
                </table>
            </fieldset>
            <fieldset>
                <legend><b>Attached to</b></legend>
                <table style="width: 100%;">
                    <tr>
                        <td>
                            <label for="ranksel">Rank:</label><br/>
                            <select id="ranksel" name="ranksel">
                                <?php global $rank_max;
                                for ($i = 1; $i <= $rank_max; $i++) { ?>
                                    <option value="<?= $i ?>"<?php if ($i == $rank) echo " selected"; ?>>
                                        Rank<?= $i ?></option>
                                <?php } ?>
                                <option value="useraw">Use Raw</option>
                            </select>
                        </td>
                        <td>
                            <label for="raw_aaid">Raw AAID:</label><br/>
                            <input type="text" id="raw_aaid" name="raw_aaid" size="5" value="<?= $aaid ?>"><br/>
                        </td>
                        <td style="text-align: right;">
                            <label for="id">Key ID:<br/>
                                <input type="text" id="id" name="id" size="5" value="<?= $id ?? "" ?>"><br/>
                        </td>
                    </tr>
                </table>
            </fieldset>
            <br/>
            <div class="center"><input type="submit" value="Submit Changes"></div>
            <input type="hidden" name="oldid" value="<?= $oldid ?? "" ?>">
        </form>
    </div>
</div>
<div class="center">
    <br/>
    <label for="splist">Known Effect Codes:</label><br/>
    <select id="splist" onchange="document.aa_effect.effectid.value=this.value;">
        <?php if (!empty($sp_effects)) {
            foreach ($sp_effects as $key => $value): ?>
                <option value="<?= $key ?>"<?php global $effectid;
                if ($key == $effectid) echo " selected"; ?>><?php echo "$key: $value"; ?></option>
            <?php endforeach;
        } ?>
    </select>
</div>
