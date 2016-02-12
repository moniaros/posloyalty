
var date_utilities = {};

date_utilities.dateToDateString = function (date, type) {
    if (type === "view") {
        return date_utilities.pad(date.getDate(), 2) + "/" + date_utilities.pad((date.getMonth() + 1), 2) + "/" + date.getFullYear();
    } else {
        return date.getFullYear() + "-" + date_utilities.pad((date.getMonth() + 1), 2) + "-" + date_utilities.pad(date.getDate(), 2);
    }
};

date_utilities.dateToTimeString = function (date, type) {
    if (type === "view") {

        var hours = (hours + 24 - 2) % 24;
        var mid = 'AM';
        if (hours === 0) { //At 00 hours we need to show 12 am
            hours = 12;
        }
        else if (hours > 12) {
            hours = hours % 12;
            mid = 'PM';
        }

        return date_utilities.pad(date.getHours(), 2) + ":" + date_utilities.pad(date.getMinutes(), 2) + " " + mid;
    } else {
        return date_utilities.pad(date.getHours(), 2) + ":" + date_utilities.pad(date.getMinutes(), 2) + ":" + date_utilities.pad(date.getSeconds(), 2);
    }
};

date_utilities.dateToDateTimeString = function (date, type) {
    return date_utilities.dateToDateString(date, type) + " " + date_utilities.dateToTimeString(date, type);
};

date_utilities.pad = function (stringToPad, paddingWidth, padding) {
    padding = padding || '0';
    stringToPad = stringToPad + '';
    return stringToPad.length >= paddingWidth ? stringToPad : new Array(paddingWidth - stringToPad.length + 1).join(padding) + stringToPad;
};

date_utilities.getFormattedCurrentDate = function () {
    var date = new Date();
    var str = date.getFullYear() + "-" + (date.getMonth() + 1) + "-" + date.getDate() + " " + date.getHours() + ":" + date.getMinutes() + ":" + date.getSeconds();

    return str;
};