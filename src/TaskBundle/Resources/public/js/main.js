$(function(){
  $('.ajax-task-complete').on({
    click: function(e){
      e.preventDefault();
      var $href = $(this).attr('href');
      
      
      $('<div></div>').load($href, function(){
        
        //set form
        var $form = $(this).children('form');
        
        //set checkbox
        var $ckb = $form.find('input[type="checkbox"]');
        
        //toggle
        $ckb.prop('checked', !$ckb.prop('checked'));
        
        // form action url
        var $url = $form.attr('action');
        
        // set data
        $data = $form.serialize();
        
        $.ajax({
          url: $href,
          method: 'POST',
          data: $data,
          dataType: 'json',
          cache: false,
          success: function(obj){
            var $tic = $('#task-complete-' + obj.id + ' .ajax-task-complete');
            if (obj.complete){
              $tic.text('X');
            } else {
              $tic.text('O');
            }
          },
          complete: function(){
            console.log('complete!');
          },
          error: function(err){
            console.log(err)
          }
        });
      });
    }
  });
})