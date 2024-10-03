!(function (c) {

    function NotificationApp() {}

    NotificationApp.prototype.send = function (heading, text, position, loaderBg, icon, hideAfter = 3000, stack = 1, transition = "fade") {
        let options = {
            heading: heading,
            text: text,
            position: position || 'top-right',
            loaderBg: loaderBg || 'rgba(0,0,0,0.2)',
            icon: icon,
            hideAfter: hideAfter,
            stack: stack,
            showHideTransition: transition
        };
        // Triggering toast
        c.toast().reset("all");
        c.toast(options);
    };

    c.NotificationApp = new NotificationApp();

})(window.jQuery);

// Function to trigger toast based on session message
function showToast(type, message) {
    let icon = "";
    let loaderBg = "";

    switch (type) {
        case 'success':
            icon = "success";
            loaderBg = "#5ba035"; // Success background
            break;
        case 'error':
            icon = "error";
            loaderBg = "#bf441d"; // Error background
            break;
        case 'warning':
            icon = "warning";
            loaderBg = "#da8609"; // Warning background
            break;
        case 'info':
            icon = "info";
            loaderBg = "#3b98b5"; // Info background
            break;
    }

    // Trigger the toast
    $.NotificationApp.send(
        type.charAt(0).toUpperCase() + type.slice(1), // Capitalize first letter of type
        message,
        'top-right',
        loaderBg,
        icon
    );
}
