<br><br>

<footer class="container-fluid text-center">
  <p>&copy;  FDDI - 2018 Developed By NSPL </p>
</footer>


  <script src="//maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
  <script src="//cdn.datatables.net/1.10.16/js/jquery.dataTables.min.js"></script>
  
   <script>
   
   $(document).ready( function () {
    $('#mydata').DataTable();
} );
   
   
  $('ul.nav li.dropdown').hover(function() {
  $(this).find('.dropdown-menu').stop(true, true).delay(200).fadeIn(500);
}, function() {
  $(this).find('.dropdown-menu').stop(true, true).delay(200).fadeOut(500);
});
  </script>

</body>
</html>
