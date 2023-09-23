
<div class="container">
        <h3 class="text-muted text-center mt-3">Create Read Update Delete List</h3>
</div>

<script>
        <?php
        if(isset($_SESSION['error'])){
          echo "
            toastr.error('".$_SESSION['error']."', 'Error');
            toastr.options.timeOut = 3000;
          ";
          unset($_SESSION['error']);
        }
        if(isset($_SESSION['success'])){
          echo "
            toastr.success('".$_SESSION['success']."', 'Success');
            toastr.options.timeOut = 3000;
          ";
          unset($_SESSION['success']);
        }
        ?>
    </script>