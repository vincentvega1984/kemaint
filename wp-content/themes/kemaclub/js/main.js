'use strict'

window.addEventListener('load', () => {

    const itemHasChildItems = document.querySelectorAll('.header__main-menu ul.menu li.menu-item-has-children'),
        mainMenuMobileTrigger = document.querySelector('.header__main-burger'),
        siteBody = document.querySelector('body'),
        mobileMenuNav = document.querySelector('.header__main-menu-mobile-nav'),
        mobileMenuNavAll = document.querySelector('.header__main-menu-mobile-nav-all'),
        mobileMenuNavBack = document.querySelector('.header__main-menu-mobile-nav-back'),
        mobileMenuNavCurrent = document.querySelector('.header__main-menu-mobile-nav-current'),
        subMenus = document.querySelectorAll('.header__main-menu ul.menu ul.sub-menu'),
        modalOverlay = document.querySelector('.modal__overlay'),
        modalRequestForm = document.querySelector('#modal-request-form'),
        modalRequestFormTrigger = document.querySelectorAll('.request-form-trigger'),
        modalClose = document.querySelector('.modal__close'),
        filtersTrigger = document.querySelector('.category-page-tags__trigger'),
        filtersClose = document.querySelector('.category-page-tags .close'),
        scrollButton = document.querySelector('.scroll-top'),
        tabs = document.querySelectorAll('[data-tab]');

    // Main menu mobile

    mainMenuMobileTrigger.addEventListener('click', () => siteBody.classList.toggle('main-menu-active'))

    function updateSubMenus(element) {
        subMenus.forEach(function(item) {
            if (item.classList.contains('active')) {
              item.classList.remove('active');
            }
        });
        element.classList.add('active')
    }

    function getClickedLinkInfo(element) {
        mobileMenuNavCurrent.innerText = element.innerText;
        mobileMenuNavAll.href = element.href;
    }

    mobileMenuNavBack.addEventListener('click', () => {
        subMenus.forEach(function(item) {
            if (item.classList.contains('active')) {
                item.classList.remove('active');
                mobileMenuNav.classList.remove('active')

                let isParentSubMenu = item.parentElement?.closest('ul.sub-menu')

                if (isParentSubMenu !== null) {
                    isParentSubMenu.classList.add('active')
                    mobileMenuNav.classList.add('active')
                    mobileMenuNavCurrent.innerText = isParentSubMenu.parentNode.querySelector('a').innerText
                    console.log(isParentSubMenu.parentNode.querySelector('a').innerText)
                }
            }
        });
    })

    itemHasChildItems.forEach(item => {
        let link = item.querySelector('a');

        link.addEventListener('click', (event) => {
            let isMainMenuChild = item.parentNode.classList.contains('menu')
            event.preventDefault()
            mobileMenuNav.classList.add('active')
            updateSubMenus(event.currentTarget.nextElementSibling)
            mobileMenuNavAll.classList.toggle('hidden', isMainMenuChild);
            getClickedLinkInfo(link)
        })
    });
    
    function clickOverlay() {
        modalOverlay.classList.remove('active');
        modalRequestForm.classList.remove('show');
        siteBody.classList.remove('filters-open');
    }

    modalOverlay.addEventListener('click', clickOverlay); 
    
    // Modal request form

    function openModal() {
        modalRequestForm.classList.add('show')
        modalOverlay.classList.add('active')
    }

    function closeModal() {
        modalRequestForm.classList.remove('show')
        modalOverlay.classList.remove('active')
    }

    modalRequestFormTrigger.forEach(item => {
        item.addEventListener('click', openModal)
    });
    modalClose.addEventListener('click', closeModal)

    // Filters panel

    filtersTrigger?.addEventListener('click', () => {
        siteBody.classList.add('filters-open');
        modalOverlay.classList.add('active')
    })

    filtersClose?.addEventListener('click', () => {
        siteBody.classList.remove('filters-open');
        modalOverlay.classList.remove('active')
    })

    // Sticky header

    function toggleStickyClass(element, className) {
        let isSticky = false;
      
        function checkSticky() {
            const rect = element.getBoundingClientRect();
            const isElementAtTop = rect.top <= 0;
            const isPageAtTop = window.scrollY === 0;
        
            if (isElementAtTop && !isPageAtTop && !isSticky) {
                siteBody.classList.add(className);
                isSticky = true;
            } else if (isPageAtTop && isSticky) {
                siteBody.classList.remove(className);
                isSticky = false;
            }
        }
      
        window.addEventListener('scroll', checkSticky);
        checkSticky();
    }
      
    // Init sticky header
    
    const stickyElement = document.querySelector('.header__main');
    toggleStickyClass(stickyElement, 'sticky');

    // FAQ behavior

    const faqItems = document.querySelectorAll('.entry-content.faq h5')

    faqItems.forEach(item => {
        item.addEventListener('click', () => {
            item.classList.toggle('open')
        })
    });

    // Footer menu

    const footerMenus = document.querySelectorAll('.footer__column-title.menu-title')

    footerMenus.forEach(item => {
        item.addEventListener('click', () => {
            item.classList.toggle('open')
        })
    });

    // Move search block

    const mobileSearchTrigger = document.querySelector('.mobile-search-trigger'),
        mobileSearchClose = document.querySelector('.search-form-close'),
        searchSubmitBtn = document.querySelector('.search-submit'),
        searchSuccessBlock = document.querySelector('.search-success')

    mobileSearchTrigger.addEventListener('click', () => {
        siteBody.classList.add('search-open')
    })

    mobileSearchClose.addEventListener('click', () => {
        siteBody.classList.remove('search-open')
    })

    searchSubmitBtn.addEventListener('click', () => {
        searchSuccessBlock.classList.add('show')
    })

    // Scroll to top

    window.addEventListener('scroll', function() {
        if (window.pageYOffset >= 50) {
            scrollButton.classList.add('visible');
        } else {
            scrollButton.classList.remove('visible');
        }
    });

    scrollButton.addEventListener('click', function() {
        window.scrollTo({
            top: 0,
            behavior: 'smooth'
        });
    });

    // Tabs
    
    tabs.forEach(tab => {
        tab.addEventListener('click', () => {
            const targetPanel = document.querySelector(`[data-panel="${tab.dataset.tab}"]`);

            document.querySelectorAll('[data-tab], [data-panel]').forEach(el => {
                el.classList.remove('active');
            });
            
            tab.classList.add('active');
            targetPanel.classList.add('active');
        });
    });

    const phoneInputs = document.querySelectorAll("input[name=\"your-phone\"]");

    const prefixNumber = (str) => {

        if (str === "7") {
            return "7 (";
        }

        if (str === "8") {
            return "7 (";
        }

        if (str === "9") {
            return "7 (9";
        }

        return "7 (";
    };
    
    phoneInputs.forEach(input => {
        
        input.addEventListener("input", (e) => {
            const value = input.value.replace(/\D+/g, "");
            const numberLength = 11;

            let result;
            if (input.value.includes("+8") || input.value[0] === "8") {
                result = "";
            } else {
                result = "+";
            }

            for (let i = 0; i < value.length && i < numberLength; i++) {
                switch (i) {
                    case 0:
                    result += prefixNumber(value[i]);
                    continue;

                    case 4:
                    result += ") ";
                    break;

                    case 7:
                    result += "-";
                    break;

                    case 9:
                    result += "-";
                    break;

                    default:
                    break;
                }

                result += value[i];
            }

            input.value = result;
        });
    });
})

document.addEventListener( 'wpcf7mailsent', () => {
	location = 'https://kemaclub.ru/spasibo/';
}, false );