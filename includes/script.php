<script src="js/sweetalert/dist/sweetalert.min.js"></script>
<?php
if(isset($_SESSION['success']) && $_SESSION['success'] !='')
{
?>
  <script>
  swal({
  title: "<?php echo $_SESSION['success']; ?>",
  icon: "<?php echo $_SESSION['success_code']; ?>",
  button: "Okay",
});
</script>
<?php unset($_SESSION['success']);
}
?>
<!-- <script>
  swal({
  title: "Good job!",
  text: "You clicked the button!",
  icon: "success",
  button: "Aww yiss!",
});
</script> -->
<script>
$(document).ready(fuction (){
   $('.delete_btn_ajax'),click(function (9){
     e.preventDefault();
      console.log('hello');
  });

});
</script>
