
/* global date_utilities */

var form_utilities = {};

form_utilities.setFieldValues = function (formSelector, fieldValues) {

    for (var key in fieldValues) {

        var isDatePicker = $(formSelector + " [name=" + key + "]").hasClass('datetimepicker');


        if (isDatePicker) {
            var dateValue = new Date(fieldValues[key]);
            var dateStringValue = date_utilities.dateToDateTimeString(dateValue, "view");
            $(formSelector + " [name=" + key + "]").val(dateStringValue);
        } else {
            $(formSelector + " [name=" + key + "]").val(fieldValues[key]);
            $(formSelector + " [name=" + key + "]").trigger("change");
        }

    }

};
