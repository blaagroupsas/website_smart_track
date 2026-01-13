import './bootstrap';

// Dark Mode functionality
function initDarkMode() {
    // Check for saved user preference, if any, on page load
    const darkMode = localStorage.getItem('darkMode');
    
    if (darkMode === 'enabled') {
        document.documentElement.classList.add('dark');
    }
}

window.toggleDarkMode = function() {
    const html = document.documentElement;
    const isDark = html.classList.contains('dark');
    
    if (isDark) {
        html.classList.remove('dark');
        localStorage.setItem('darkMode', 'disabled');
    } else {
        html.classList.add('dark');
        localStorage.setItem('darkMode', 'enabled');
    }
};

// Initialize dark mode on page load
document.addEventListener('DOMContentLoaded', initDarkMode);

