
     <!-- Footer
    ================================================== -->
    <footer id="head" class="footer">
      <div class="container">
        <p><a href="#">Clinique de l'espoir</a></p>
        <p>Develop by <a href="#"></a>@hope service</p>
        <p><a href="#" target="_blank">@Simms word Copyrhit</a> </p>
      </div>
    </footer>

    <!-- Le javascript
    ================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->
    <script>
        function imprimer(divName) {
         var printContents = document.getElementById(divName).innerHTML;    
         var originalContents = document.body.innerHTML;      
         document.body.innerHTML = printContents;     
         window.print();     
         document.body.innerHTML = originalContents;
   }
</script>
    <script type="text/javascript" src="js/widgets.txt"></script>
    <script src="js/jquery.txt"></script>
    <script src="js/bootstrap-transition.txt"></script>
    <script src="js/bootstrap-alert.txt"></script>
    <script src="js/bootstrap-modal.txt"></script>
    <script src="js/bootstrap-dropdown.txt"></script>
    <script src="js/bootstrap-scrollspy.txt"></script>
    <script src="js/bootstrap-tab.txt"></script>
    <script src="js/bootstrap-tooltip.txt"></script>
    <script src="js/bootstrap-popover.txt"></script>
    <script src="js/bootstrap-button.txt"></script>
    <script src="js/bootstrap-collapse.txt"></script>
    <script src="js/bootstrap-carousel.txt"></script>
    <script src="js/bootstrap-typeahead.txt"></script>
    <script src="js/bootstrap-affix.txt"></script>
    <script src="js/holder.txt"></script>
    <script src="js/prettify.txt"></script>
    <script src="js/application.txt"></script>
    <script type="text/javascript" src="../controleur/Controleur.js"></script>
    <script type="text/javascript" src="js/datatable.js"></script> 

    <!-- Analytics
    ================================================== -->
    <script>
      var _gauges = _gauges || [];
      (function() {
        var t   = document.createElement('script');
        t.type  = 'text/javascript';
        t.async = true;
        t.id    = 'gauges-tracker';
        t.setAttribute('data-site-id', '4f0dc9fef5a1f55508000013');
        t.src = '//secure.gaug.es/track.js';
        var s = document.getElementsByTagName('script')[0];
        s.parentNode.insertBefore(t, s);
      })();
    </script>
  </body>
</html>