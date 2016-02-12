
/**
 * Namespace: select_utilities
 */
var select_utilities = {};

/**
 * Dynamically sets the options of a select element
 * @param String selectSelector 
 *  the selector of the select element. Ex. "select[name=rewards]"
 * @param Array options 
 *  the array of options to be set. Must be an array of objects with label and value keys each. Ex. [{label: "Reward", value: "reward"}]
 * @returns {undefined}
 */
select_utilities.setSelectOptions = function (selectSelector, options) {

    var optionsAsString = "";
    for (var i = 0; i < options.length; i++) {
        optionsAsString += "<option value='" + options[i].value + "'>" + options[i].label + "</option>";
    }
    $(selectSelector).html(optionsAsString);

};