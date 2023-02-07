  <!-- General JS Scripts -->
  <script src="<?=base_url()?>assets/js/app.min.js"></script>
  <!-- JS Libraies -->
  <script src="<?=base_url()?>assets/bundles/apexcharts/apexcharts.min.js"></script>
  <!-- Page Specific JS File -->
  <script src="<?=base_url()?>assets/js/page/index.js"></script>
  <!-- Template JS File -->
  <script src="<?=base_url()?>assets/js/scripts.js"></script>
  <!-- Custom JS File -->
  <script src="<?=base_url()?>assets/js/custom.js"></script>
  <script src="<?=base_url()?>assets/bundles/sweetalert/sweetalert.min.js"></script>
  <!-- Page Specific JS File -->
  <script src="<?=base_url()?>assets/js/page/sweetalert.js"></script>


<!-- Script -->
<script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-beta.1/dist/js/select2.min.js"></script>
<script>
// In your Javascript (external.js resource or <script> tag)
$(document).ready(function() {
    $('.select2').select2();
});
</script>
</body>
</html>

 <!-- Shop Modal -->
 <script>
        $(document).ready(function()
        {
          $('#shop_savebtn').click(function()
          {
            var form_data=$("#shop_form").serialize();
            event.preventDefault();
           // alert('ok')
            $.ajax({
              type: 'post',
              url: '<?=base_url()?>Dashboard/shop_update',
              data: form_data,
              success: function(data){
                if(data!='corect')
                {
                  alert('data is saved');
                  location.reload();
                }
                else
                {
                  alert('data is not saved')
                }
              }
            });
          });
        });
      </script>
      <!-- Shop Modal -->

      <!-- Profile Modal -->
 <script>
        $(document).ready(function()
        {
          $('#profile_savebtn').click(function()
          {
            var form_data=$("#profile_form").serialize();
            event.preventDefault();
            alert('ok')
            $.ajax({
              type: 'post',
              url: '<?=base_url()?>Dashboard/profile_update',
              data: form_data,
              success: function(data){
                if(data!='corect')
                {
                  alert('data is saved');
                  location.reload();
                }
                else
                {
                  alert('data is not saved')
                }
              }
            });
          });
        });
      </script>
      <!-- Profile Modal -->