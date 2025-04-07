<?php
include('../include/session.php');
 ?>
                <section class="admin-breadcrumbs mt-3 mb-4 px-2">
                    <div class="d-flex align-items-center">
                        <div class="db-box">
                            <i class="fal fa-userst f22" aria-hidden="true"></i>
                        </div>
                        <h3 class="db-title">Contractors</h3>
                    </div>
                </section>
                <!-- End Breadcrumbs-->
                <!-- Content Area-->
                <section class="content-area" id="adminForm">
                    <script>
                    setState('adminForm','<?php echo SECURE_PATH ?>contractors/process.php','addForm=1');
                    </script>
                </section>


        <script>
            $( document ).ready(function() {
                $(".side-menu .nav-item").click(function(){
                    $(".side-menu .nav-item").removeClass("active");
                    $(this).addClass("active");
                });
                $(".sub-menu .subnav-item").click(function(){
                    $(".sub-menu .subnav-item").removeClass("active");
                    $(this).addClass("active");
                });
                $('#history').multiselect(
                {
                    maxHeight: 220,
                    buttonWidth: '100%',
                    includeSelectAllOption: true,
                    numberDisplayed: 1,
                    disableIfEmpty: true,
                    enableFiltering: true,
                    enableCaseInsensitiveFiltering: true,
                });
                $("#start").datepicker(

               // format: 'yyyy-mm-dd',
                    // autoclose: true,
                    // todayHighlight: true,
                  //  startDate: '-1M',
                 //   endDate : 'today'
            );
                $("#startend").datepicker(

               // format: 'yyyy-mm-dd',
                    // autoclose: true,
                    // todayHighlight: true,
                  //  startDate: '-1M',
                 //   endDate : 'today'
            );
                $("#tenderdate").datepicker(

               // format: 'yyyy-mm-dd',
                    // autoclose: true,
                    // todayHighlight: true,
                  //  startDate: '-1M',
                 //   endDate : 'today'
            );
            });
        </script>
    </body>

</html>
