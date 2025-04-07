/* ------------------------------------------------------------------------------
 *
 *  # BlockUI extension
 *
 *  Demo JS code for extension_blockui.html page
 *
 * ---------------------------------------------------------------------------- */


// Setup module
// ------------------------------

var BlockUi = function() {


    //
    // Setup module components
    //

    // BlockUI
    var _componentBlockUi = function() {
        if (!$().block) {
            console.warn('Warning - blockui.min.js is not loaded.');
            return;
        }


        // Page elements
        // ------------------------------

        // Block card
        
        $('#block-card').on('click', function() {
            var block = $(this).closest('.table');
            $(block).block({ 
                message: '<span class="font-weight-semibold"><i class="icon-spinner4 spinner mr-2"></i>&nbsp; Updating data</span>',
                timeout: 2000, //unblock after 2 seconds
                overlayCSS: {
                    backgroundColor: '#000',
                    opacity: 0.8,
                    cursor: 'wait'
                },
                css: {
                     border: 0,
                    padding: '10px 15px',
                    color: '#fff',
                    width: 'auto',
                    '-webkit-border-radius': 3,
                    '-moz-border-radius': 3,
                    backgroundColor: '#333'
                }
            });
        });

        // Block page
        $('#block-page').on('load', function() {
            $.blockUI({ 
                message: '<i class="icon-spinner4 spinner"></i>',
                timeout: 2000, //unblock after 2 seconds
                overlayCSS: {
                    backgroundColor: '#1b2024',
                    opacity: 0.8,
                    zIndex: 1200,
                    cursor: 'wait'
                },
                css: {
                    border: 0,
                    color: '#fff',
                    padding: 0,
                    zIndex: 1201,
                    backgroundColor: 'transparent'
                }
            });
        });


        // Overlays
        // ------------------------------

        // Basic overlay
        $('#basic-overlay').on('click', function() {
            var block = $(this).closest('.card');
            $(block).block({ 
                message: '<i class="icon-spinner4 spinner"></i>',
                timeout: 2000, //unblock after 2 seconds
                overlayCSS: {
                    backgroundColor: '#fff',
                    opacity: 0.8,
                    cursor: 'wait'
                },
                css: {
                    border: 0,
                    padding: 0,
                    backgroundColor: 'transparent'
                }
            });
        });

      
       


        // Messages
        // ------------------------------

       

    
        // Custom message
        $('#custom-message').on('click', function() {
            var block = $(this).closest('.card');
            $(block).block({
                message: '<span class="font-weight-semibold"><i class="icon-spinner4 spinner mr-2"></i>&nbsp; Updating data</span>',
                timeout: 2000, //unblock after 2 seconds
                overlayCSS: {
                    backgroundColor: '#fff',
                    opacity: 0.8,
                    cursor: 'wait'
                },
                css: {
                    border: 0,
                    padding: '10px 15px',
                    color: '#fff',
                    width: 'auto',
                    '-webkit-border-radius': 3,
                    '-moz-border-radius': 3,
                    backgroundColor: '#333'
                }
            });
        });

       


    

     
    };


    //
    // Return objects assigned to module
    //

    return {
        init: function() {
            _componentBlockUi();
        }
    }
}();


// Initialize module
// ------------------------------





/* ------------------------------------------------------------------------------
 *
 *  # Checkboxes and radios
 *
 *  Demo JS code for form_checkboxes_radios.html page
 *
 * ---------------------------------------------------------------------------- */


// Setup module
// ------------------------------

var InputsCheckboxesRadios = function () {
      var _componentUniform = function() {
        if (!$().uniform) {
            console.warn('Warning - uniform.min.js is not loaded.');
            return;
        }
        // Default initialization
        $('.form-check-input-styled').uniform();
        //
        // Contextual colors
        //

        // Primary
        $('.form-check-input-styled-primary').uniform({
            wrapperClass: 'border-primary-600 text-primary-800'
        });

        // Danger
        $('.form-check-input-styled-danger').uniform({
            wrapperClass: 'border-danger-600 text-danger-800'
        });

        // Success
        $('.form-check-input-styled-success').uniform({
            wrapperClass: 'border-success-600 text-success-800'
        });

        // Warning
        $('.form-check-input-styled-warning').uniform({
            wrapperClass: 'border-warning-600 text-warning-800'
        });

        // Info
        $('.form-check-input-styled-info').uniform({
            wrapperClass: 'border-info-600 text-info-800'
        });

        // Custom color
        $('.form-check-input-styled-custom').uniform({
            wrapperClass: 'border-indigo-600 text-indigo-800'
        });
    };

  

    //
    // Return objects assigned to module
    //

    return {
        initComponents: function() {
            _componentUniform();
          
        }
    }
}();


// Initialize module
// ------------------------------





document.addEventListener('DOMContentLoaded', function() {
    
    BlockUi.init();
    InputsCheckboxesRadios.initComponents();
});
