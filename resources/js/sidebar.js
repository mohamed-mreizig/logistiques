document.addEventListener('DOMContentLoaded', function() {
    const sidebar = document.getElementById('sidebar');
    const sidebarToggle = document.getElementById('sidebarToggle');
    const sidebarOverlay = document.getElementById('sidebarOverlay');

    function toggleSidebar() {
        sidebar.classList.toggle('-translate-x-full');
        sidebarOverlay.classList.toggle('hidden');
        document.body.classList.toggle('overflow-hidden');
    }

    sidebarToggle.addEventListener('click', toggleSidebar);
    
    sidebarOverlay.addEventListener('click', toggleSidebar);
    
    // Close sidebar when clicking a link on mobile
    document.querySelectorAll('#sidebar a').forEach(link => {
        link.addEventListener('click', function() {
            if (window.innerWidth < 1024) {
                toggleSidebar();
            }
        });
    });
    
    // Initialize main dropdowns
    const dropdownToggles = document.querySelectorAll('.dropdown-toggle');
    const nestedDropdownToggles = document.querySelectorAll('.nested-dropdown-toggle');
    const menuLinks = document.querySelectorAll('.menu-link, .active-link');
    
    // Initialize main dropdowns
    dropdownToggles.forEach(toggle => {
        const targetId = toggle.getAttribute('data-target');
        const targetMenu = document.getElementById(targetId);
        const icon = toggle.querySelector('svg');
        
        // Check if this dropdown contains an active link (including nested)
        const hasActiveLink = targetMenu.querySelector('.active-link') !== null;
        
        if (hasActiveLink) {
            targetMenu.classList.remove('hidden');
            toggle.classList.add('active-dropdown');
            icon.classList.add('rotate-180');
            
            // Find the specific nested dropdown that contains active link
            const activeNestedLink = targetMenu.querySelector('.active-link');
            if (activeNestedLink) {
                const activeNestedDropdown = activeNestedLink.closest('ul').previousElementSibling;
                if (activeNestedDropdown && activeNestedDropdown.classList.contains('nested-dropdown-toggle')) {
                    const nestedTargetId = activeNestedDropdown.getAttribute('data-target');
                    const nestedTargetMenu = document.getElementById(nestedTargetId);
                    const nestedIcon = activeNestedDropdown.querySelector('svg');
                    
                    nestedTargetMenu.classList.remove('hidden');
                    activeNestedDropdown.classList.add('active-dropdown');
                    nestedIcon.classList.add('rotate-180');
                }
            }
        } else {
            targetMenu.classList.add('hidden');
            icon.classList.remove('rotate-180');
            toggle.classList.remove('active-dropdown');
        }
    });

    // Handle nested dropdown toggles
    nestedDropdownToggles.forEach(toggle => {
        toggle.addEventListener('click', function(e) {
            e.stopPropagation();
            const targetId = this.getAttribute('data-target');
            const targetMenu = document.getElementById(targetId);
            const icon = this.querySelector('svg');
            
            targetMenu.classList.toggle('hidden');
            this.classList.toggle('active-dropdown');

            icon.classList.toggle('rotate-180');
        });
    });

    // Handle dropdown toggles
    dropdownToggles.forEach(toggle => {
        toggle.addEventListener('click', function() {
            const targetId = this.getAttribute('data-target');
            const targetMenu = document.getElementById(targetId);
            const icon = this.querySelector('svg');
            
            // Toggle current menu
            targetMenu.classList.toggle('hidden');
            this.classList.toggle('active-dropdown');
            
            // Update icon
            if (targetMenu.classList.contains('hidden')) {
                icon.classList.remove('rotate-180');
            } else {
                icon.classList.add('rotate-180');
            }
            
            // Close other menus
            document.querySelectorAll('.dropdown-toggle').forEach(otherToggle => {
                if (otherToggle !== this) {
                    const otherTargetId = otherToggle.getAttribute('data-target');
                    const otherMenu = document.getElementById(otherTargetId);
                    const otherIcon = otherToggle.querySelector('svg');
                    
                    otherMenu.classList.add('hidden');
                    otherToggle.classList.remove('active-dropdown');
                    otherIcon.classList.remove('rotate-180');
                }
            });
        });
    });

    // Handle menu link clicks
    menuLinks.forEach(link => {
        link.addEventListener('click', function() {
            // Remove active class from all links
            menuLinks.forEach(l => l.classList.remove('active-link'));
            
            // Add active class to clicked link
            this.classList.add('active-link');
            
            // Open parent dropdown if closed
            const parentDropdown = this.closest('ul').previousElementSibling;
            if (parentDropdown && parentDropdown.classList.contains('dropdown-toggle')) {
                const targetId = parentDropdown.getAttribute('data-target');
                const targetMenu = document.getElementById(targetId);
                const icon = parentDropdown.querySelector('svg');
                
                if (targetMenu.classList.contains('hidden')) {
                    targetMenu.classList.remove('hidden');
                    parentDropdown.classList.add('active-dropdown');
                    icon.classList.add('rotate-180');
                }
            }
        });
    });
});

// User menu toggle
const userMenuButton = document.getElementById('userMenuButton');
const userMenu = document.getElementById('userMenu');

userMenuButton.addEventListener('click', function(e) {
    e.stopPropagation();
    userMenu.classList.toggle('hidden');
});

// Close menu when clicking outside
document.addEventListener('click', function(e) {
    if (!userMenu.contains(e.target) && e.target !== userMenuButton) {
        userMenu.classList.add('hidden');
    }
});