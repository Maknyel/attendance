
<script src="https://cdn.ckeditor.com/4.17.1/standard/ckeditor.js"></script>

<section class="content">
  <div class="container-fluid">
    <form id="submit_dynamic_content">
      <div class="card">
        <div class="card-header">
          <div class="control-group">
              <div class="form-group floating-label-form-group controls mb-0 pb-2">
                  <label>Name</label>
                  <input class="form-control" type="text" value="<?=get_settings_field('1','name')?>" required name="name" id="name"/>
              </div>
          </div>
        </div>
        <div class="card-body">
          <div class="control-group">
              <div class="form-group floating-label-form-group controls mb-0 pb-2">
                  <label>Content</label>
                  <textarea class="form-control" type="text" required name="value" id="value"><?=get_settings_field('1','value')?></textarea>
              </div>
          </div>
        </div>
        <div class="card-footer text-right">
          <button class="btn btn-info" type="submit">Submit</button>
        </div>
      </div>
    </form>
  </div>
</section>
<script>
        CKEDITOR.replace( 'value' );
  $(document).on('submit','#submit_dynamic_content',function(e){
    e.preventDefault();
    var base_url = `<?=base_url()?>`;
    var name = $('#submit_dynamic_content #name').val();
    var value = $('#submit_dynamic_content #value').val();
        var data_all = {'name':name,'value':value};
      // alert(JSON.stringify(data_all));
      $.ajax({
          type:'POST',
          dataType:'JSON',
          url:base_url+'Admin/update_content',
          data:data_all,
          success:function(data_return)
          {


              if(data_return['is_success'] != 0){
                alert(data_return['message']);
                location.reload();
              }else{
                  alert(data_return['message']);
              }
          },
          error: function(XMLHttpRequest, textStatus, errorThrown) {
            if (textStatus == 'timeout') {

            alert('Timeout Error');

            } else {

            alert('Network problem. Please try again');

            }
          }
      });
  });
</script>