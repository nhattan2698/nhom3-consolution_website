$(document).ready(function(){
  $('.productlistindex').each(function(index, el) {
    var page = 1;
    loadData2(page);
  });
  // PHƯƠNG THỨC LOAD KẾT QUẢ 
  function loadData2(page){
    $.ajax
    ({
      type: "POST",
      url: "ajax_paging/index.php",
      data: {page},
      success: function(data)
      {
        $('.productlistindex').html(data);
        initAnimation($('.productlistindex'));
      }
    });
  }
  $('.productlistindex').on('click','.pagination li.active',function(){
    var page = $(this).attr('p');
    loadData2(page);
  });
//////////////////////////////////////////////////////////////
});