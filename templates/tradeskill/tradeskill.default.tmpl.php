<?php
if (isset($ts) && ($ts > 0))
    $selected_skill = $tradeskills[$ts];
?>
<table class="edit_form">
    <tr>
        <td class="edit_form_header">
            Tradeskill Options
        </td>
    </tr>
    <tr>
        <td class="edit_form_content" style="text-align: center;">
            <a href="index.php?editor=tradeskill&action=10<?php echo (!empty($selected_skill)) ? '&ts=' . $ts : ''; ?>">Create
                a New <?php echo (!empty($selected_skill)) ? $selected_skill . ' ' : ''; ?>Recipe</a><br/>
        </td>
    </tr>
</table>
