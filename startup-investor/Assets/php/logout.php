<?php
unset($_SESSION['user_id']);
session_destroy();
echo "<script>
      window.location.href = '../../index.php';
      alert('Logged Out');
    </script>"; 
?>