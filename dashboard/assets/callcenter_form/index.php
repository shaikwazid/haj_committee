<?php
include('../include/session.php');
 ?>
               
                <!-- End Breadcrumbs-->
                <!-- Content Area-->
                <section class="content-area" id="adminForm">
                    <script>
                    setState('adminForm','<?php echo SECURE_PATH ?>callcenter_form/process.php','addForm=1');
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
        <script type="text/javascript">
        function addList()
        {
            cnt = $('#session_list').val();
            new_cnt = parseInt(cnt)+1;
            subcenter = $('#subcenter').val();
            $('#session_list').val(new_cnt);

            html = '<div class="list" id="list'+new_cnt+'"></div>';

            $('#dates_list').append(html);

            setState('list'+new_cnt,'<?php echo SECURE_PATH;?>callcenter_form/process.php','add_listing='+new_cnt);
        }
        function removeList(id){

            cnt = $('#session_list').val();
            $('#list'+id).remove();
            new_cnt = parseInt(cnt)-1;
            $('#session_list').val(new_cnt);
        }
        function calconditions(){
            var retval = '';
            $('#dates_list .list').each(function(){
                retval+= $(this).find('.source').val()+'_'+$(this).find('.value').val()+'_'+$(this).find('.comid').val()+'^';
            });
             //alert(retval);
            return retval;

        }

        function isNumber(evt,ref,len)
    {
        evt = (evt) ? evt : window.event;
        var charCode = (evt.which) ? evt.which : evt.keyCode;
        if(charCode == 8 || charCode == 9 ){
        return true;
        }
        var ctrlDown = evt.ctrlKey||evt.metaKey // Mac support

        if (charCode > 31 && (charCode < 48 || charCode > 57) && charCode != 46 || charCode == 8 || charCode == 37 || charCode == 39 || ( ctrlDown && charCode==86)) {
        return false;
        }
        else if(ref.val().length >= len){
        return false;
        }
        return true;
}

function isMobile( evt, ref, len )
{
  evt = ( evt ) ? evt : window.event;
  var charCode = ( evt.which ) ? evt.which : evt.keyCode;
  if ( charCode == 8 || charCode == 9 ) {
    return true;
  }

  var ctrlDown = evt.ctrlKey || evt.metaKey // Mac support

  if ( charCode > 31 && ( charCode < 48 || charCode > 57 ) && charCode != 46 || charCode == 8 || charCode == 37 || charCode == 39 || ( ctrlDown && charCode == 86 ) ) {
    return false;
  } else if ( ref.val().length >= len ) {

    return false;
  }

  if ( parseInt( ref.val().charAt( 0 ) ) < 6 ) {
    $( '#vert' ).html( " * Invalid Mobile Number" );
    return false;
  }

  $( '#vert' ).html( "" );
  return true;
}

        </script>
    </body>

</html>
