(function($){


        $.fn.collectionsAdd = function(){

        var divParent = $(this).parent();

        var formParent = divParent.parent();

        var ordenesColeccion = formParent.find($('table tbody'));

        ordenesColeccion.data('index', ordenesColeccion.find(':input').length);

        var prototype = ordenesColeccion.data('prototype');

        var index = ordenesColeccion.data('index');

        var nuevaOrden = prototype.replace(/__name__/g, index);

        ordenesColeccion.data('index', index + 1);

        $(ordenesColeccion).append(nuevaOrden);

        $('.delete-collection').on('click', function(){
            $(this).collectionsDelete();
        });
    }

})(jQuery);