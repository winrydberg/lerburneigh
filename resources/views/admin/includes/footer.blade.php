 </div>
  <!-- /.content-wrapper -->
  <footer class="main-footer">
    <div class="pull-right hidden-xs">Version 1.0</div>
    Copyright © 2021 Lerburneigh Farms. All rights reserved.</footer>
</div>
<!-- ./wrapper --> 

<!-- jQuery 3 --> 
<script src="{{asset('dist/js/jquery.min.js')}}"></script> 

<script src="https://npmcdn.com/tether@1.2.4/dist/js/tether.min.js"></script>
<!-- v4.0.0-alpha.6 --> 
<script src="{{asset('dist/bootstrap/js/bootstrap.min.js')}}"></script> 

<!-- template --> 
<script src="{{asset('dist/js/niche.js')}}"></script> 


<script src="https://cdn.jsdelivr.net/npm/sweetalert2@10"></script>

<script>
  setTimeout(function(){
      $('.alert').slideUp();
  }, 2000)
</script>
@yield('bottom_scripts')
</body>

</html>