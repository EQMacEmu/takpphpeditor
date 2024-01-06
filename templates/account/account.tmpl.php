<div class="table_container">
    <div class="table_header">
        <div style="float:right">
            <a onClick="alert('Not yet!');"><img src="images/c_table.gif" alt="Table Icon" style="border:0;"
                                                 title="Edit this Account"/></a>
            <?php global $character_array;
            if (!empty($character_array)) { // This behavior doesn't seem to work correctly yet, and it is not clear how $character_array is set.
                echo '<a onClick="alert(\'Unable to delete account yet. Delete all characters associated with this account first!\');"><img src="images/table.gif" alt="Edit Table" style="border:0;" title="Characters Still Exist on this Account!" /></a>';
            } else {
                $name = $name ?? "";
                echo '<a onClick="return confirm(\'Really delete account ' . trim($name) . ' (' . ($acctid ?? "") . ')?\');" href="index.php?editor=account&acctid=' . ($acctid ?? "") . '&action=4"><img src="images/table.gif" alt="Crossed Out Table Icon" style="border:0;" title="Delete this Account" /></a>';
            }
            ?>
        </div>
        <?= $id ?? "" ?> - <?php echo trim(($name ?? "")); ?>
    </div>
    <div class="table_content">
        <?php if (isset($online) && $online) echo "<h2><div class='center'><span class='alert-danger'>WARNING! THIS ACCOUNT IS ONLINE...</span></div></h2>"; ?>
        <table style="border-collapse: collapse; border-spacing: 0; border: 0; width: 100%;">
            <tr>
                <td style="width: 100%;">
                    <table style="border-collapse: collapse; border-spacing: 0; border: 0; width: 100%;">
                        <tr>
                            <td style="width:45%;">
                                <div>
                                    <fieldset>
                                        <legend><strong>General Account Info</strong></legend>
                                        Account ID: <?= $id ?? "N/A" ?><br/>
                                        Account Created: <?= (isset($time_creation) ? get_real_time($time_creation) : "Unknown") ?><br />
                                        Forum ID: <?= $forum_id ?? "" ?><br />
                                        Karma: <?= $karma ?? "N/A" ?><br/>
                                        LS Name: <?= $name ?? "N/A" ?><br/>
                                        LS ID: <?= $lsaccount_id ?? "N/A" ?><br/>
                                        Minilogin IP: <?= $minilogin_ip ?? "N/A" ?><br/>
                                        Password: <?= $password ?? "N/A" ?><br/>
                                        Rules Flag: <?= $rulesflag ?? "N/A" ?><br/>
                                        <a href="index.php?editor=account&acctid=<?= $id ?? "" ?>&action=7"
                                           title="Edit Account Status">Status</a>: <?= $status ?? "N/A" ?><br/>
                                        Shared Platinum: <?= $sharedplat ?? "N/A" ?><br/>
                                    </fieldset>
                                </div>
                            </td>
                            <td style="width:55%;">
                                <fieldset><legend><strong>Admin Actions</strong></legend>
                                    <div style="padding-bottom: 28px;">
                                        <?php if (isset($yesno)): ?>
                                            Mule: <?= (isset($mule) ? $yesno[$mule] : "unk") ?><br/>
                                            Expansion: <?= $expansion ?? "Undefined" ?><br />
                                            IP_Exemption_Multiplier: <?= $ip_exemption_multiplier ?? "Undefined" ?><br />
                                            Ban Reason: <?php echo (isset($ban_reason) && $ban_reason != "") ? $ban_reason : "N/A"; ?><br/>
                                            Revoked: <?= (isset($revoked) ? $yesno[$revoked] : "unk") ?><br/>
                                            Revoked Until: <?= $revokeduntil ?? "" ?><br />
                                            Suspended: <?php echo (isset($suspendeduntil) && $suspendeduntil > 0) ? $suspendeduntil : "N/A"; ?><br/>
                                            Suspend Reason: <?php echo (isset($suspend_reason) && $suspend_reason != "") ? $suspend_reason : "N/A"; ?><br/>
                                            Suspended Until: <?= $suspendeduntil ?? "" ?><br />
                                        <?php endif ?>
                                    </div>
                                </fieldset>
                            </td>
                        </tr>
                        <tr>
                            <td style="width:45%;">
                                <fieldset>
                                    <legend><strong>GM-Only Properties</strong></legend>
                                    <?php if (isset($yesno)): ?>
                                        GM Speed: <?= (isset($gmspeed) ? $yesno[$gmspeed] : "unk") ?><br/>
                                        Hide Me: <?= (isset($hideme) ? $yesno[$hideme] : "unk") ?><br/>
                                        GM Invul: <?= (isset($gminvul) ? $yesno[$gminvul] : "unk") ?><br/>
                                        Flymode: <?= (isset($flymode) ? $yesno[$flymode] : "unk") ?><br/>
                                        Ignore Tells: <?= (isset($ignore_tells) ? $yesno[$ignore_tells] : "unk") ?><br/>
                                    <?php endif ?>
                                </fieldset>
                            </td>
                            <td style="width:55%;">
                                <fieldset><legend><strong>IP Address Info</strong></legend>
                                    <div style="padding-bottom: 36px;">
                                    <table>
                                        <tr>
                                            <td style="width: 40%;"><div class="center">IP Address</div></td>
                                            <td style="width: 20%;"><div class="center">Login Count</div></td>
                                            <td style="width: 40%;"><div class="center">Last Login</div></td>
                                        </tr>
                                        <?php
                                        if (isset($ips) && $ips) {
                                            foreach ($ips as $ip_address) {
                                                echo '<tr>';
                                                echo '<td style="width: 40%;"><div class="center">' . $ip_address['ip'] . '</div></td>';
                                                echo '<td style="width: 20%;"><div class="center">' . $ip_address['count'] . '</div></td>';
                                                echo '<td style="width: 40%;"><div class="center">' . $ip_address['lastused'] . '</div></td>';
                                                echo '</tr>';
                                            }
                                        }
                                        ?>
                                    </table>
                                    </div>
                                </fieldset>
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <fieldset>
                                    <legend><strong>Characters</strong></legend>
                                    <?php
                                    if (isset($characters) && $characters) {
                                        $count = 0;
                                        echo '<table style="border-collapse: collapse; border-spacing: 0; border: 0; width: 100%;">';
                                        foreach ($characters as $character) {
                                            $count++;
                                            echo '<tr>';
                                            echo '<td style="width: 25%;">Character' . $count . ': </td>';
                                            echo '<td style="width: 60%;">';
                                            echo ($character['id'] != '') ? '<a href="index.php?editor=player&playerid=' . $character['id'] . '">' . $character['name'] . '</a>  (' . $character['id'] . ')' : 'EMPTY';
                                            echo '</td>';
                                            echo '<td style="width: 15%; text-align: right;"><a href="index.php?editor=account&acctid=' . ($acctid ?? "") . '&playerid=' . $character['id'] . '&action=5"><img src="images/user.gif" alt="User" height="13" width="13" title="Transfer this Character"></a> <a onClick="return confirm(\'Really delete player ' . $character['name'] . ' (' . $character['id'] . ') from this account?\');" href="index.php?editor=player&playerid=' . $character['id'] . '&acctid=' . ($id ?? "") . '&action=4"><img src="images/remove.gif" alt="Remove" title="Delete this Character"></a></td>';
                                            echo '</tr>';
                                        }
                                        echo '</table>';
                                    } else {
                                        echo '<br/><br/><div class="center">NO CHARACTERS ON THIS ACCOUNT</div><br/>';
                                    }
                                    echo '<br/>';
                                    ?>
                                    Last Character
                                    Used: <?php echo (isset($charname) && $charname != '') ? $charname : 'Never Logged a Character'; ?>
                                    <br/>
                                </fieldset>
                            </td>
                        </tr>
                    </table>
                </td>
            </tr>
        </table>
    </div>
</div>
