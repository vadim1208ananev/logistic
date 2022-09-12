import AirDatepicker from 'air-datepicker';
import localeEn from 'air-datepicker/locale/en';

export default () => {
    const calendars = document.querySelectorAll('.calendar');

    if (!calendars.length) return;

    calendars.forEach(calendar => {
        let datepicker;

        const initDesktopDatepicker = () => {
            if (datepicker) datepicker.destroy();
            datepicker = new AirDatepicker(calendar, {
                locale: localeEn,
                selectedDates: [new Date()],
                autoClose: true,
                dateFormat: 'dd-MM-yyyy',
                position({$datepicker, $target, $pointer}) {
                    $pointer.style.display = 'none';
                    let coords = $target.getBoundingClientRect(),
                        dpWidth = $datepicker.clientWidth;

                    let top = coords.y - 2;
                    let left = coords.x + coords.width - dpWidth + 2;

                    $datepicker.style.left = `${left}px`;
                    $datepicker.style.top = `${top}px`;
                },
                navTitles: {
                    days: 'MMM yyyy'
                }
            });
        }

        const initMobileDatepicker = () => {
            if (datepicker) datepicker.destroy();
            datepicker = new AirDatepicker(calendar, {
                locale: localeEn,
                selectedDates: [new Date()],
                autoClose: true,
                isMobile: true,
                dateFormat: 'dd-MM-yyyy',
                navTitles: {
                    days: 'MMM yyyy'
                }
            });
        }

        const handleWindowResizing = () => {
            if (window.innerWidth < 992) {
                initMobileDatepicker();
            } else {
                initDesktopDatepicker();
            }
        };

        handleWindowResizing();

        window.addEventListener('resize', handleWindowResizing);
    });
}
