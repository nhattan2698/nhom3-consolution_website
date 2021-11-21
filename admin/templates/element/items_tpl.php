<div class="control_frm" style="margin-top:25px;">
  <div class="bc">
    <ul id="breadcrumbs" class="breadcrumbs">
      <li><a href="index.php?com=element&act=man"><span>Element</span></a></li>
      <li class="current"><a href="#" onclick="return false;">All</a></li>
    </ul>
    <div class="clear"></div>
  </div>
</div>
<script language="javascript">
  function CheckDelete(l){
    if(confirm('Bạn có chắc muốn xoá mục này?'))
    {
      location.href = l;  
    }
  } 
  function ChangeAction(str){
    if(confirm("Bạn có chắc chắn?"))
    {
      document.f.action = str;
      document.f.submit();
    }
  }   
</script>
<form name="f" id="f" method="post">
  <div class="control_frm" style="margin-top:0;">
    <div style="float:left;">
      <input type="button" class="blueB" value="Thêm" onclick="location.href='index.php?com=element&act=add'" />
      <input type="button" class="blueB" value="Hiện" onclick="ChangeAction('index.php?com=element&act=man&multi=show');return false;" />
      <input type="button" class="blueB" value="Ẩn" onclick="ChangeAction('index.php?com=element&act=man&multi=hide');return false;" />
      <input type="button" class="blueB" value="Xóa" onclick="ChangeAction('index.php?com=element&act=man&multi=del');return false;" />
    </div>    
  </div>
  <div class="widget">
    <div class="title"><span class="titleIcon">
      <input type="checkbox" id="titleCheck" name="titleCheck" />
    </span>
    <h6>Danh sách dữ liệu</h6>
  </div>
  <table cellpadding="0" cellspacing="0" width="100%" class="sTable withCheck mTable" id="checkAll">
    <thead>
      <tr>
        <td></td>
        <td class="tb_data_small"><a href="#" class="tipS" style="margin: 5px;">STT</a></td>
        <td width="200"><div>Tên<span></span></div></td>
        <td class="sortCol"><div>Chi nhánh<span></span></div></td>
        <td class="sortCol"><div>Số tài khoản<span></span></div></td>
        <td class="tb_data_small">Ân/Hiện</td>
        <td width="200">Tùy chọn</td>
      </tr>
    </thead>
    <tfoot>
      <tr>
        <td colspan="10">
          <div class="pagination">
            <?=pagesListLimitadmin($url_link , $totalRows , $pageSize, $offset)?>            
          </div></td>
        </tr>
      </tfoot>
      <tbody>
        <?php for($i=0, $count=count($items); $i<$count; $i++){?>
        <tr>
          <td>
            <input type="checkbox" name="iddel[]" value="<?=$items[$i]['id']?>" id="check<?=$i?>" />
          </td>
          <td align="center">
            <input type="text" value="<?=$items[$i]['stt']?>" name="ordering[]" onkeypress="return OnlyNumber(event)" class="tipS smallText" original-title="Nhập số thứ tự danh mục" id="number<?=$items[$i]['id']?>" onchange="return updateNumber('element', '<?=$items[$i]['id']?>')" />
            <div id="ajaxloader"><img class="numloader" id="ajaxloader<?=$items[$i]['id']?>" src="images/loader.gif" alt="loader" /></div>
          </td>       
          <td>
            <a href="index.php?com=element&act=edit&id=<?=$items[$i]['id']?>" class="tipS SC_bold"><?=$items[$i]['name_vi']?></a>
          </td>
          <td class="title_name_data">
            <a href="index.php?com=element&act=edit&id=<?=$items[$i]['id']?>" class="tipS SC_bold"><?=$items[$i]['address_vi']?></a>
          </td>
          <td class="title_name_data">
            <a href="index.php?com=element&act=edit&id=<?=$items[$i]['id']?>" class="tipS SC_bold"><?=$items[$i]['geo']?></a>
          </td>
          <td>
            <a data-val2="table_<?=$_GET['com']?>" rel="<?=$items[$i]['display']?>" data-val3="display" class="diamondToggle <?=($items[$i]['display']==1)?"diamondToggleOff":""?>" data-val0="<?=$items[$i]['id']?>" ></a>   
          </td>
          <td class="actBtns">
            <a href="index.php?com=element&act=edit&id=<?=$items[$i]['id']?>" title="" class="smallButton tipS" original-title="Sửa danh mục"><img src="./images/icons/dark/pencil.png" alt=""></a>
            <a href="" onclick="CheckDelete('index.php?com=element&act=delete&id=<?=$items[$i]['id']?>'); return false;" title="" class="smallButton tipS" original-title="Xóa danh mục"><img src="./images/icons/dark/close.png" alt=""></a>
          </td>
        </tr>
        <?php } ?> 
      </tbody>
    </table>
  </div>
</form>               