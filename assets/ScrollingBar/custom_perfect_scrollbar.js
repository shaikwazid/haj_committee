/* ------------------------------------------------------------------------------
 *
 *  # Layout - fixed navbar and sidebar with custom scrollbar
 *
 * ---------------------------------------------------------------------------- */


// Setup module
// ------------------------------

var FixedSidebarCustomScroll = function() {


    //
    // Setup module components
    //
    
    // Perfect scrollbar
    var _componentPerfectScrollbar = function() {
        if (typeof PerfectScrollbar == 'undefined') {
            console.warn('Warning - perfect_scrollbar.min.js is not loaded.');
            return;
        }
    
        // Initialize
        var ps = new PerfectScrollbar('#sidebar', {
            wheelSpeed: 2,
            wheelPropagation: true
        });
    };
    
    
    //
    // Return objects assigned to module
    //
    
    return {
        init: function() {
            _componentPerfectScrollbar();
        }
    }
    }();
    
    
    // Initialize module
    // ------------------------------
    
    document.addEventListener('DOMContentLoaded', function() {
    FixedSidebarCustomScroll.init();
    });
    