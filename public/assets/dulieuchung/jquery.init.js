// Block body scroll overlay
(function (name) {
    function BNS() {
        var settings = {
            prevScroll: 0, prevPosition: '', prevOverflow: '', prevClasses: '', on: false, classes: ''
        };

        var getPrev = function () {
            settings.prevScroll = (window.pageYOffset || document.documentElement.scrollTop) - (document.documentElement.clientTop || 0);
            settings.prevPosition = document.body.style.position;
            settings.prevOverflow = document.body.style.overflow;
            settings.prevClasses = document.body.className;
        };

        return {
            set: function (data) {
                settings.classes = data.classes;
            }, isOn: function () {
                return settings.on;
            }, on: function (additionalClasses) {
                if (typeof additionalClasses === 'undefined') additionalClasses = '';

                if (settings.on) return;
                settings.on = true;

                getPrev();

                document.body.className = document.body.className + ' ' + settings.classes + ' ' + additionalClasses;
                if (iOS()) {
                    if (settings.prevScroll == 0) {
                        settings.prevScroll = -1
                    }
                    document.body.style.top = -settings.prevScroll + 'px';
                    setTimeout(function () {
                        document.body.style.position = 'fixed';
                    }, 0); // WebKit/Blink bugfix
                }
                document.body.style.overflow = 'hidden';
            }, off: function () {
                if (!settings.on) return;
                settings.on = false;
                document.body.className = settings.prevClasses;
                if (iOS()) {
                    document.body.style.top = 0;
                }
                ;document.body.style.position = '';
                document.body.style.overflow = settings.prevOverflow;
                window.scrollTo(0, settings.prevScroll);
            }
        };
    }

    window[name] = new BNS();
})('BNS');
// Block body scroll overlay
//====================JQUERY BASIC INIT=================//

var deviceIsMobile = false; //At the beginning we set this flag as false. If we can detect the device is a mobile device in the next line, then we set it as true.
if (/(android|bb\d+|meego).+mobile|avantgo|bada\/|blackberry|blazer|compal|elaine|fennec|hiptop|iemobile|ip(hone|od)|ipad|iris|kindle|Android|Silk|lge |maemo|midp|mmp|netfront|opera m(ob|in)i|palm( os)?|phone|p(ixi|re)\/|plucker|pocket|psp|series(4|6)0|symbian|treo|up\.(browser|link)|vodafone|wap|windows (ce|phone)|xda|xiino/i.test(navigator.userAgent) || /1207|6310|6590|3gso|4thp|50[1-6]i|770s|802s|a wa|abac|ac(er|oo|s\-)|ai(ko|rn)|al(av|ca|co)|amoi|an(ex|ny|yw)|aptu|ar(ch|go)|as(te|us)|attw|au(di|\-m|r |s )|avan|be(ck|ll|nq)|bi(lb|rd)|bl(ac|az)|br(e|v)w|bumb|bw\-(n|u)|c55\/|capi|ccwa|cdm\-|cell|chtm|cldc|cmd\-|co(mp|nd)|craw|da(it|ll|ng)|dbte|dc\-s|devi|dica|dmob|do(c|p)o|ds(12|\-d)|el(49|ai)|em(l2|ul)|er(ic|k0)|esl8|ez([4-7]0|os|wa|ze)|fetc|fly(\-|_)|g1 u|g560|gene|gf\-5|g\-mo|go(\.w|od)|gr(ad|un)|haie|hcit|hd\-(m|p|t)|hei\-|hi(pt|ta)|hp( i|ip)|hs\-c|ht(c(\-| |_|a|g|p|s|t)|tp)|hu(aw|tc)|i\-(20|go|ma)|i230|iac( |\-|\/)|ibro|idea|ig01|ikom|im1k|inno|ipaq|iris|ja(t|v)a|jbro|jemu|jigs|kddi|keji|kgt( |\/)|klon|kpt |kwc\-|kyo(c|k)|le(no|xi)|lg( g|\/(k|l|u)|50|54|\-[a-w])|libw|lynx|m1\-w|m3ga|m50\/|ma(te|ui|xo)|mc(01|21|ca)|m\-cr|me(rc|ri)|mi(o8|oa|ts)|mmef|mo(01|02|bi|de|do|t(\-| |o|v)|zz)|mt(50|p1|v )|mwbp|mywa|n10[0-2]|n20[2-3]|n30(0|2)|n50(0|2|5)|n7(0(0|1)|10)|ne((c|m)\-|on|tf|wf|wg|wt)|nok(6|i)|nzph|o2im|op(ti|wv)|oran|owg1|p800|pan(a|d|t)|pdxg|pg(13|\-([1-8]|c))|phil|pire|pl(ay|uc)|pn\-2|po(ck|rt|se)|prox|psio|pt\-g|qa\-a|qc(07|12|21|32|60|\-[2-7]|i\-)|qtek|r380|r600|raks|rim9|ro(ve|zo)|s55\/|sa(ge|ma|mm|ms|ny|va)|sc(01|h\-|oo|p\-)|sdk\/|se(c(\-|0|1)|47|mc|nd|ri)|sgh\-|shar|sie(\-|m)|sk\-0|sl(45|id)|sm(al|ar|b3|it|t5)|so(ft|ny)|sp(01|h\-|v\-|v )|sy(01|mb)|t2(18|50)|t6(00|10|18)|ta(gt|lk)|tcl\-|tdg\-|tel(i|m)|tim\-|t\-mo|to(pl|sh)|ts(70|m\-|m3|m5)|tx\-9|up(\.b|g1|si)|utst|v400|v750|veri|vi(rg|te)|vk(40|5[0-3]|\-v)|vm40|voda|vulc|vx(52|53|60|61|70|80|81|83|85|98)|w3c(\-| )|webc|whit|wi(g |nc|nw)|wmlb|wonu|x700|yas\-|your|zeto|zte\-/i.test(navigator.userAgent.substr(0, 4))) {
    deviceIsMobile = true;
}

function iOS() {

    var iDevices = ['iPad Simulator', 'iPhone Simulator', 'iPod Simulator', 'iPad', 'iPhone', 'iPod'];

    if (!!navigator.platform) {
        while (iDevices.length) {
            if (navigator.platform === iDevices.pop()) {
                return true;
            }
        }
    }

    return false;
}

//====================END JQUERY BASIC INIT=================//
//====================JQUERY INPUT=================//
$(document).ready(function () {
    //input clear
    $('.input-ic-clear').on('mousedown', function () {
        //console.log("Clear");
        var input = $(this).closest('.input-inner-wrap').find('.input');
        input.val('');
        input.trigger('input');
        $(".domestic-bank").each(function (index) {
            $(this).removeClass('hidden');
        });
        $(".list-app-qr").each(function (index) {
            $(this).removeClass('hidden');
        });
    });
    $('.input-has-clear').on('paste keyup change', function () {
        //console.log("Remove");
        var inputClear = $(this).closest('.input-inner-wrap').find('.input-ic-clear');
        if ($(this).val()) {
            inputClear.addClass('show');
        } else {
            inputClear.removeClass('show');
            $(".domestic-bank").each(function (index) {
                $(this).removeClass('hidden');
            });
            $(".list-app-qr").each(function (index) {
                $(this).removeClass('hidden');
            });
        }
    });
    //end input clear
});

//====================END JQUERY INPUT=================//