        <div class="table_container" style="width: 500px;">
        <div class="table_header">
          <table width="100%" cellpadding="0" cellspacing="0">
            <tr>
             <td>Skills</td>
             <td align="right">    
              </td>
             </tr>        
           </table>
        </div>
  
         <table class="table_content2" width="100%">
  <? if (isset($skills)):?>
           <tr>
            <td align="center" width="25%"><strong>SkillID</strong></td>
            <td align="center" width="50%"><strong>Name</strong></td>
            <td align="center" width="25%"><strong>Difficulty</strong></td>
            <th width="5%"></th>
           </tr>
  <?$x=0; foreach($skills as $skills=>$v):?>
          <tr bgcolor="#<? echo ($x % 2 == 0) ? "BBBBBB" : "AAAAAA";?>">
            <td align="center" width="25%"><?=$v['skillid']?></td>
            <td align="center" width="50%"><?=$v['name']?></td>   
            <td align="center" width="25%"><?=$v['difficulty']?></td>
            <td align="right">      
              <a href="index.php?editor=server&skillid=<?=$v['skillid']?>&action=64"><img src="images/edit2.gif" border="0" title="Edit Entry"></a>          
            </td>
          </tr>
          <?$x++; endforeach;?>
          </table>
          <?endif;?>
  <? if (!isset($skills)):?>
          <tr>
            <td align="left" width="100" style="padding: 10px;">No skills</td>
          </tr>
<?endif;?>