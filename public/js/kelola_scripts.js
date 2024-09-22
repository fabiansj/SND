$(document).ready(function () {
    // Toggle Sidebar
    $('#sidebarToggle').click(function () {
        $('#sidebar').toggleClass('active');
        $('#content').toggleClass('active');
    });

    // Sidebar Collapse Button
    $('#sidebarCollapse').click(function () {
        $('#sidebar').toggleClass('active');
        $('#content').toggleClass('active');
    });

    // Account Menu Toggle
    $('#accountMenu').click(function () {
        // Redirect to login page if not already on login page
        if (window.location.pathname !== '/login') {
            window.location.href = '/login';
        }
    });
});
