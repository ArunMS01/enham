      <footer class="footer">
        <div class=" container-fluid ">
          <nav>
            <!-- <ul>
              <li>
                <a href="https://www.creative-tim.com">
                  Creative Tim
                </a>
              </li>
              <li>
                <a href="http://presentation.creative-tim.com">
                  About Us
                </a>
              </li>
              <li>
                <a href="http://blog.creative-tim.com">
                  Blog
                </a>
              </li>
            </ul> -->
          </nav>
          <div class="copyright" id="copyright">
            &copy; <script>
              document.getElementById('copyright').appendChild(document.createTextNode(new Date().getFullYear()))
            </script> Developed by <a href="https://www.maidenstride.com" target="_blank">Maiden stride</a>.
          </div>
        </div>
      </footer>
      </div>
      </div>
      <!--   Core JS Files   -->
      <script src="./assets/js/core/jquery.min.js"></script>
      <script src="./assets/js/dataTables.min.js"></script>
      <script src="./assets/js/core/popper.min.js"></script>
      <script src="./assets/js/core/bootstrap.min.js"></script>
      <script src="./assets/summernote/summernote-bs4.min.js"></script>
      <script src="./assets/js/plugins/perfect-scrollbar.jquery.min.js"></script>
      <!--  Google Maps Plugin    -->
      <script src="https://maps.googleapis.com/maps/api/js?key=YOUR_KEY_HERE"></script>
      <!-- Chart JS -->
      <script src="./assets/js/plugins/chartjs.min.js"></script>
      <!--  Notifications Plugin    -->
      <script src="./assets/js/plugins/bootstrap-notify.js"></script>
      <!-- Control Center for Now Ui Dashboard: parallax effects, scripts for the example pages etc -->
      <script src="./assets/js/now-ui-dashboard.min.js?v=1.5.0" type="text/javascript"></script><!-- Now Ui Dashboard DEMO methods, don't include it in your project! -->

      <script>
        $('#summernote').summernote({
          placeholder: 'Product Description',
          tabsize: 2,
          height: 100
        });

        $('#summernote2').summernote({
          placeholder: 'Product Description',
          tabsize: 2,
          height: 100
        });


        $('#summernoteedit').summernote({
          placeholder: 'Product Description',
          tabsize: 2,
          height: 100
        });
        $('#summernoteall').summernote({
          placeholder: 'General Information',
          tabsize: 2,
          height: 100
        });

        $(document).ready(function() {
          $('#myTable').DataTable();
        });
        // $(document).ready(function() {
        //   // Javascript method's body can be found in assets/js/demos.js
        //   demo.initDashboardPageCharts();

        // });

        $(document).ready(function() {
          var current = location.pathname;
          $('#navcontainer li a').each(function() {
            var currentelement = $(this);
            // console.log(currentelement.attr('href'));
            // console.log(current.split("/").pop());
            
            // if the current path is like this link, make it active
            if (currentelement.attr('href') == current.split("/").pop()) {
              console.log("match");
              currentelement.addClass('active-nav');
            }
          })
        })
      </script>
      </body>

      </html>