import $ from "jquery";
import "select2/dist/js/select2.min";

import handleNavigation from './modules/navigation';
import handleInput from './modules/input';
import handleSelect from './modules/select';
import handleTabs from './modules/tabs';
import handleDatepicker from './modules/datepicker';
import handleRoute from './modules/route';

//import '../scss/main.scss';

$(document).ready(() => {
alert(123);
    handleNavigation();
    handleInput();
    handleSelect();
    handleTabs();
    handleDatepicker();
    handleRoute();
});
