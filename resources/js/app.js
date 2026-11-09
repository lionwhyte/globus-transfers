import './bootstrap';
import Pikaday from 'pikaday';
import moment from 'moment';

var today = new Date();
var twoDaysFromNow = new Date();
twoDaysFromNow.setDate(today.getDate() + 2);

var picker = new Pikaday({
field: document.getElementById('datepicker'),
minDate: twoDaysFromNow,
format: 'MMMM-DD-YYYY',
toString(date, format) {
        // Using moment.js to format the date
        return moment(date).format(format);
    },
    parse(dateString, format) {
        // Using moment.js to parse the date
        return moment(dateString, format).toDate();
    }
});