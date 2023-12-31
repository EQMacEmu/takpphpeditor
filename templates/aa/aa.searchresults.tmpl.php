<?php
function getExpansionName($expid): string
{
    global $eqexpansions;
    if (!isset($expid)) return "";
    if ($expid < 0) return "$expid"; // Avoid hitting the 'None Selected'
    if (isset($eqexpansions[$expid + 1])) return $eqexpansions[$expid + 1];
    return "$expid";
}

function getClasses($classes, $berserker): string
{
    if ($berserker == 0 && $classes == 0) {
        return "None";
    }
    if ($berserker == 1 && $classes == 65534)
        return "ALL";
    else {
        $res = '';
        if ($berserker == 1) $res .= "BER ";
        if ($classes & 256) $res .= "BRD ";
        if ($classes & 32768) $res .= "BST ";
        if ($classes & 4) $res .= "CLR ";
        if ($classes & 64) $res .= "DRU ";
        if ($classes & 16384) $res .= "ENC ";
        if ($classes & 8192) $res .= "MAG ";
        if ($classes & 128) $res .= "MNK ";
        if ($classes & 2048) $res .= "NEC ";
        if ($classes & 8) $res .= "PAL ";
        if ($classes & 16) $res .= "RNG ";
        if ($classes & 512) $res .= "ROG ";
        if ($classes & 32) $res .= "SHD ";
        if ($classes & 1024) $res .= "SHM ";
        if ($classes & 2) $res .= "WAR ";
        if ($classes & 4096) $res .= "WIZ ";
        return rtrim($res, " ");
    }
}

?>
<div class="table_container" style="width:650px;">
    <div class="table_header">AA Search Results</div>
    <?php if (!empty($results)): ?>
        <table class="table_content2" style="width: 100%;">
            <tr>
                <th style="width: 7%; text-align: center;">ID</th>
                <th style="width: 7%; text-align: center;">Seq</th>
                <th style="width: 25%; text-align: center;">Name</th>
                <th style="width: 7%; text-align: center;">Prereq</th>
                <th style="width: 25%; text-align: center;">Classes</th>
                <th style="width: 20%; text-align: center;">Expansion</th>
            </tr>
            <?php $x = 0;
            foreach ($results as $result): extract($result); ?>
                <tr style="background-color: #<?php echo ($x % 2 == 0) ? "CCCCCC" : "AAAAAA";
                $x++; ?>">
                    <td style="text-align: center;"><?= $skill_id ?></td>
                    <td style="text-align: center;"></td>
                    <td style="text-align: center;"><a href="index.php?editor=aa&aaid=<?= $skill_id ?>"><?= $name ?></a>
                    </td>
                    <td style="text-align: center;"><?= $prereq_skill ?></td>
                    <td style="text-align: center;"><?= getClasses($classes, $berserker); ?></td>
                    <td style="text-align: center;"><?= getExpansionName($aa_expansion); ?></td>
                </tr>
            <?php endforeach; ?>
        </table>
    <?php endif; ?>
    <?php if (empty($results)): ?>
        <div class="table_content">Your search produced no results!</div>
    <?php endif; ?>
</div>
