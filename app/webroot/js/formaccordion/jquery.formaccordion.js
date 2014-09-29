(function($) {

    var methods = {
        init: function(options) {
            // Gets the form container
            var container = $(this);

            // Gets the form elements
            var formElements = container.find("div");

            // The complete container
            var completeContainer = $("<div id='accordion-container' class='accordion-form-container'></div>");

            // A temporal div container
            var temporalDiv = $("<div></div>");

            // Sets the current group
            var currentGroup = "Año";
            $.each(formElements, function(index, element) {
                // Gets the element group
                var elementGroup = $(element).attr("group");

                // Checks the current group and the element group
                if (currentGroup != elementGroup) {
                    // Sets a new title
                    completeContainer.append("<h3>" + currentGroup + "</h3>");

                    // Appends the current elements
                    completeContainer.append(temporalDiv);

                    // Sets the new current group
                    currentGroup = elementGroup;

                    // Creates a new temporal container for the group
                    temporalDiv = $("<div></div>");
                }

                // Removes the agroup attribute since si no longer needed
                $(element).removeAttr("group");

                // Puts the element into the temporal container of the group
                temporalDiv.append(element);
            });

            //Sets the title of the last group
            completeContainer.append("<h3>" + currentGroup + "</h3>");

            // Appends the last group
            completeContainer.append(temporalDiv);

            // Appends the accordion container
            container.append(completeContainer);
        }
    };

    $.fn.formaccordion = function(method) {

        // Method calling logic
        if (methods[method]) {
            return methods[ method ].apply(this, Array.prototype.slice.call(arguments, 1));
        } else if (typeof method === 'object' || !method) {
            return methods.init.apply(this, arguments);
        } else {
            $.error('Method ' + method + ' does not exist on jQuery.formaccordion');
        }

    };

})(jQuery);