

(function($){


    $.fn.collectionsDelete = function(){

        var row = $(this).closest('tr');

        row.fadeOut(300, function(){
            this.remove();
        });
    };

})(jQuery);