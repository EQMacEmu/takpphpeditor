<div class="center">
    <iframe id='searchframe' src='templates/iframes/itemsearch.php'></iframe>
    <input id="button" type="button" value='Hide Item Search' onclick='hideSearch();'
           style='display:none; margin-bottom: 20px;'>
</div>
<form method="post" action="index.php?editor=tradeskill&ts=<?= $ts ?>&rec=<?= $rec ?>&action=8">
    <div class="edit_form" style="width: 250px;">
        <div class="edit_form_header">Add Recipe Component</div>
        <div class="edit_form_content">
            <strong><label for="id">Item ID:</label></strong> (<a href="javascript:showSearch();">search</a>)<br>
            <input class="indented" id="id" type="text" name="item_id" size="7" value=""><br><br>
            <strong><label for="type">Item is a:</label></strong><br>
            <select class="indented" name="type" id="type" onChange="toggleComponentType()">
                <option value="0">Combine Container</option>
                <option value="1">Component</option>
                <option value="2">Product</option>
            </select><br><br>
            <table style="width: 100%">
                <tr>
                    <td style="text-align: center; width: 5%"><a href="javascript:toggleContainer();"
                                                                 id="ContainerCollapsed" style="display:inline;">[+]</a><a
                                href="javascript:toggleContainer();" id="ContainerExpanded"
                                style="display:none;">[-]</a></td>
                    <td style="width: 30%"><strong>Common Containers</strong></td>
                </tr>
            </table>
            <br>
            <table id="ContainerTable" style="display:none; width: 100%">
                <tr>
                    <td style="text-align: center; width: 10%"><strong>ID</strong></td>
                    <td style="width: 30%"><strong>Name</strong></td>
                </tr>
                <tr>
                    <td style="text-align: center; width: 10%"><a
                                href="javascript:document.getElementById('id').value='9';document.getElementById('type').value='0';toggleContainer();">9</a>
                    </td>
                    <td style="width: 30%">Medicine Bag</td>
                </tr>
                <tr>
                    <td style="text-align: center; width: 10%"><a
                                href="javascript:document.getElementById('id').value='15';document.getElementById('type').value='0';toggleContainer();">15</a>
                    </td>
                    <td style="width: 30%">Oven</td>
                </tr>
                <tr>
                    <td style="text-align: center; width: 10%"><a
                                href="javascript:document.getElementById('id').value='16';document.getElementById('type').value='0';toggleContainer();">16</a>
                    </td>
                    <td style="width: 30%">Loom</td>
                </tr>
                <tr>
                    <td style="text-align: center; width: 10%"><a
                                href="javascript:document.getElementById('id').value='17';document.getElementById('type').value='0';toggleContainer();">17</a>
                    </td>
                    <td style="width: 30%">Forge</td>
                </tr>
                <tr>
                    <td style="text-align: center; width: 10%"><a
                                href="javascript:document.getElementById('id').value='18';document.getElementById('type').value='0';toggleContainer();">18</a>
                    </td>
                    <td style="width: 30%">Fletching Kit</td>
                </tr>
                <tr>
                    <td style="text-align: center; width: 10%"><a
                                href="javascript:document.getElementById('id').value='19';document.getElementById('type').value='0';toggleContainer();">19</a>
                    </td>
                    <td style="width: 30%">Brew Barrel</td>
                </tr>
                <tr>
                    <td style="text-align: center; width: 10%"><a
                                href="javascript:document.getElementById('id').value='20';document.getElementById('type').value='0';toggleContainer();">20</a>
                    </td>
                    <td style="width: 30%">Jeweler's Kit</td>
                </tr>
                <tr>
                    <td style="text-align: center; width: 10%"><a
                                href="javascript:document.getElementById('id').value='21';document.getElementById('type').value='0';toggleContainer();">21</a>
                    </td>
                    <td style="width: 30%">Pottery Wheel</td>
                </tr>
                <tr>
                    <td style="text-align: center; width: 10%"><a
                                href="javascript:document.getElementById('id').value='22';document.getElementById('type').value='0';toggleContainer();">22</a>
                    </td>
                    <td style="width: 30%">Kiln</td>
                </tr>
                <tr>
                    <td style="text-align: center; width: 10%"><a
                                href="javascript:document.getElementById('id').value='24';document.getElementById('type').value='0';toggleContainer();">24</a>
                    </td>
                    <td style="width: 30%">Wizard Lexicon</td>
                </tr>
                <tr>
                    <td style="text-align: center; width: 10%"><a
                                href="javascript:document.getElementById('id').value='25';document.getElementById('type').value='0';toggleContainer();">25</a>
                    </td>
                    <td style="width: 30%">Magician Lexicon</td>
                </tr>
                <tr>
                    <td style="text-align: center; width: 10%"><a
                                href="javascript:document.getElementById('id').value='26';document.getElementById('type').value='0';toggleContainer();">26</a>
                    </td>
                    <td style="width: 30%">Necromancer Lexicon</td>
                </tr>
                <tr>
                    <td style="text-align: center; width: 10%"><a
                                href="javascript:document.getElementById('id').value='27';document.getElementById('type').value='0';toggleContainer();">27</a>
                    </td>
                    <td style="width: 30%">Enchanter Lexicon</td>
                </tr>
                <tr>
                    <td style="text-align: center; width: 10%"><a
                                href="javascript:document.getElementById('id').value='32';document.getElementById('type').value='0';toggleContainer();">32</a>
                    </td>
                    <td style="width: 30%">Teir`Dal Forge</td>
                </tr>
                <tr>
                    <td style="text-align: center; width: 10%"><a
                                href="javascript:document.getElementById('id').value='33';document.getElementById('type').value='0';toggleContainer();">33</a>
                    </td>
                    <td style="width: 30%">Oggok Forge</td>
                </tr>
                <tr>
                    <td style="text-align: center; width: 10%"><a
                                href="javascript:document.getElementById('id').value='38';document.getElementById('type').value='0';toggleContainer();">38</a>
                    </td>
                    <td style="width: 30%">Cabilis Forge</td>
                </tr>
                <tr>
                    <td style="text-align: center; width: 10%"><a
                                href="javascript:document.getElementById('id').value='46';document.getElementById('type').value='0';toggleContainer();">46</a>
                    </td>
                    <td style="width: 30%">Tackle Box</td>
                </tr>
                <tr>
                    <td style="text-align: center; width: 10%"><a
                                href="javascript:document.getElementById('id').value='17162';document.getElementById('type').value='0';toggleContainer();">17162</a>
                    </td>
                    <td style="width: 30%">Collapsible Mixing Bowl</td>
                </tr>
                <tr>
                    <td style="text-align: center; width: 10%"><a
                                href="javascript:document.getElementById('id').value='17906';document.getElementById('type').value='0';toggleContainer();">17906</a>
                    </td>
                    <td style="width: 30%">Mixing Bowl</td>
                </tr>
            </table>
            <fieldset>
                <legend><strong><span style="font-size: 12px;">Components:</span></strong></legend>
                <label for="componentcount">Qty Required:</label><br>
                <input class="indented" type="text" id="componentcount" name="componentcount" size="7" value="0"
                       disabled><br><br>
                <label for="failcount">Qty Returned on Fail:</label><br>
                <input class="indented" type="text" id="failcount" name="failcount" size="7" value="0" disabled>
            </fieldset>
            <br><br>
            <fieldset>
                <legend><strong><span style="font-size: 12px;">Products:</span></strong></legend>
                <label for="successcount">Qty Produced:</label> <br>
                <input class="indented" type="text" id="successcount" name="successcount" size="7" value="0" disabled>
            </fieldset>
            <br>
            <div class="center">
                <input type="hidden" name='iscontainer' value="1">
                <input type="hidden" name="recipe_id" value="<?= $rec ?>">
                <input type="submit" name="submit" value="Submit Changes" onClick="enable();">
            </div>
        </div>
    </div>
</form>
