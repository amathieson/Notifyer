/**
 * Created by Adam on 09/07/2016.
 */
function notify(key, name, number, title, message, image) {
    $.get(
        "http://notifyer.ga/notify",
        {number : number, title : title, key : key, name : name, message : message, image : image},
        function(data) {
            document.write(data);
        }
);
}
